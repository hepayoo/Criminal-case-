<template>
    <div class="chat-container">
      <div class="chat-card">
        <div class="chat-header">
          <h3>Group Chat</h3>
        </div>
        <div class="chat-messages">
          <div
            class="message"
            v-for="(message, index) in allMessages"
            :key="index"
            :class="{
              'sent': user.id === message.user_id,
              'received': user.id !== message.user_id
            }"
          >
            <div class="message-info">
              <span class="user-name">{{ message.user.name }}</span>
              <div class="message-content">
                {{ message.message }}
              </div>
              <span class="message-time">{{ formatTime(message.created_at) }}</span>
            </div>
          </div>
        </div>
      </div>
  
      <div class="chat-footer">
        <textarea
          v-model="message"
          placeholder="Enter Message"
          @keyup.enter="sendMessage"
          @keydown.enter.prevent
        ></textarea>
        <button @click="sendMessage" class="send-btn">Send</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      user: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        message: '',
        allMessages: [],
      };
    },
    methods: {
      sendMessage() {
        if (!this.message) {
          return alert('Please enter a message');
        }
  
        axios.post('/messages', { message: this.message }).then(response => {
          this.message = '';
          this.fetchMessages();
        });
      },
      fetchMessages() {
        axios.get('/messages').then(response => {
          this.allMessages = response.data;
        });
      },
      formatTime(dateString) {
        const date = new Date(dateString);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      },
    },
    mounted() {
      console.log('User ID:', this.user.id); // Log the user ID
      Echo.private('lchat').listen('MessageSent', (e) => {
        this.allMessages.push(e.message);
        console.log('New Message User ID:', e.message.user_id); // Log new message user ID
      });
    },
    created() {
      console.log('User Prop:', this.user);
      this.fetchMessages();
    },
  };
  </script>
  
  
  
  
  <style scoped>
  .chat-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
  }
  
  .chat-card {
    background-color: #f0f0f0;
    color: black;
    padding: 20px;
    flex-grow: 1;
    overflow-y: auto;
  }
  
  .chat-header {
    text-align: center;
    font-size: 1.5rem;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
  }
  
  .chat-messages {
    flex-grow: 1;
    padding-bottom: 100px;
    display: flex;
    flex-direction: column;
  }
  
  .message {
    display: flex;
    margin-bottom: 10px;
  }
  
  .sent {
    justify-content: flex-end !important;
     /* Align sent messages to the right */
  }
  
  .received {
    justify-content: flex-start !important;
      /* Align received messages to the left */
  }
  
  .message-info {
    max-width: 70%;
  }
  
  .user-name {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .message-content {
    padding: 10px;
    border-radius: 10px;
    color: white;
    position: relative;
  }
  
  .sent .message-content {
    background-color: #007aff; /* Sent message color */
  }
  
  .received .message-content {
    background-color: #ececec; /* Received message color */
    color: black;
  }
  
  .message-time {
    font-size: 0.7rem;
    font-style: italic;
    margin-top: 5px;
  }
  
  .chat-footer {
    display: flex;
    padding: 10px;
    background-color: #fff;
  }
  
  textarea {
    width: 80%;
    height: 50px;
    padding: 10px;
    resize: none;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  
  .send-btn {
    width: 20%;
    background-color: #007aff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>
  
  