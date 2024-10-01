<template>
    <div class="chat-container">
      <div class="chat-card">
        <div class="chat-header">
          <h3>The Detective's Board</h3>
          <span class="chat-motto">"Follow the clues, uncover the truth"</span>
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
          setTimeout(this.scrollToEnd, 100);
        });
      },
      fetchMessages() {
        axios.get('/messages').then(response => {
          this.allMessages = response.data;
        });
      },
      
      scrollToEnd() {
  const chatMessages = this.$el.querySelector('.chat-messages');
  if (chatMessages) {
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
},
      formatTime(dateString) {
        const date = new Date(dateString);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      },
    },
    mounted() {
      console.log('User ID:', this.user.id); 
      Echo.private('lchat').listen('MessageSent', (e) => {
        this.allMessages.push(e.message);
        console.log('New Message User ID:', e.message.user_id); 
        setTimeout(this.scrollToEnd, 100);
      });
    },
    created() {
      console.log('User Prop:', this.user);
      this.fetchMessages();
    },
  };
  </script>
  
  
  
  

  <style scoped>
  /* Vintage Crime Theme */
  .chat-container {
    display: flex;
    flex-direction: column;
    height: 103vh;
    position: relative;
    font-family: 'Old Standard TT', serif; /* Vintage serif font */
    color: #e3c5b5; /* Old parchment text color */
    padding: 55px;
    width: 101%;
   
  }
  
  .chat-card {
    background-color: rgba(25, 25, 25, 0.9); /* Dark vintage look */
    border: 2px solid #5c5c5c; /* Dark brass border */
    padding: 10px;
    flex-grow: 1;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
    position: relative;
    overflow-y: auto;
    margin-bottom: 10px;
 
  }
  
  .chat-header {
    text-align: center;
    font-size: 2.5rem;
    color: #d8c48c; 
    border-bottom: 2px solid #e3c5b5;
    padding-bottom: 0px;
    font-family: 'Libre Baskerville', serif;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
    margin-bottom: 7px;
  }
  
  .chat-motto {
    font-size: 1.2rem;
    font-style: italic;
    color: #c2b29c;
  }
  
  .chat-messages {
    padding-bottom: 90px;
    display: flex;
    flex-direction: column;
    gap: 14px; 
  }
  
  .message {
    display: flex;
    font-size: 1.1rem;
    padding: 2px;
    border-radius: 10px;
    background: rgba(43, 43, 43, 0.8);
    border: 1px solid #7a6d58; 
    color: #e0d6cb; 
    animation: fadeIn 0.3s ease-in-out; 
  }
  
  .sent {
    justify-content: flex-end;
  }
  
  .received {
    justify-content: flex-start;
  }
  
  .message-info {
    max-width: 40%;
    padding: 4px;
    border-radius: 5px;
  }
  
  .user-name {
    font-size: 1.3rem;
    font-weight: bold;
    color: #d3b59d; 
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  
  .message-content {
    margin-top: 5px;
    color: #f1e8d7; 
  }
  
  .message-time {
    font-size: 0.8rem;
    font-style: italic;
    color: #b3a78a;
    text-align: right;
  }
  
  .chat-footer {
    display: flex;
    padding: 15px;
    background-color: rgba(0, 0, 0, 0.8);
    border-top: 2px solid #5c5c5c;
    border-radius: 13px;
  }
  
  textarea {
    width: 80%;
    height: 30px;
    padding: 15px;
    resize: none;
    font-size: 1.2rem;
    border-radius: 10px;
    background-color: rgba(43, 43, 43, 0.9);
    border: 2px solid #5c5c5c;
    color: #f2e3d2;
    font-family: 'Old Standard TT', serif;
  }
  
  .send-btn {
    width: 18%;
    background-color: #7a6353; 
    color: white;
    border: none;
    padding: 15px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
   
    transition: background-color 0.3s ease;
  }
  
  .send-btn:hover {
    background-color: #b39a7e; 
  }
  
 
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
  }
  .fade-enter, .fade-leave-to  {
    opacity: 0;
  }
  
  /* Fade in effect for messages */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  </style>
  
  
  
  
  