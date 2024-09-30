<template>
  
    <div>
      <div class="searchbar">
          <form action="">
            <input type="text" placeholder="Search...." name="search" v-model="title"/>
    
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
    
          </form>
        </div>
        <div class="categories">
          <ul>
            <li><a href="">Missing-people</a></li>
            <li><a href="">Canibal</a></li>
            <li><a href="">Violence</a></li>
            <li><a href="">Rapping</a></li>
          </ul>
        </div>
        <section class="cards-blog latest-blog">
        <div class="card-blog-content" v-for="post in posts" :key="post.id">
            <img :src="`/storage/${post.victim_image}`" alt="" />
          <p>
        {{ post.created_at }}
        <span style="float: right">Reported By: {{ post.full_name }}</span>
      </p>
      <h4 style="font-weight: bolder">
        <a href="single-blog.html"></a>
        <router-link
          :to="{
            name: 'FamilyVictim',
            params: { slug: post.slug },
          }"
          class="victim-name"  
          >{{ post.victim_name }}</router-link
        >
      </h4>
        </div>

      


      

   
        </section>
        <h3 v-if="!posts.length">Sorry, no match was found!</h3>
    </div>
     
    </template>
    
    <script>
    export default {
      data() {
        return {
          posts: [],
          title: '',
         
          
        };
      },
      watch: {
      title() {
        axios
          .get("/api/posts", {
            params: {
              search: this.title,
            },
          })
          .then((response) => {
            this.posts = response.data.data;
            
          })
          .catch((error) => {
            console.log(error);
          });
      },
    },
  
      mounted() {
        axios
      .get("/api/home-posts")
      .then((response) => (this.posts = response.data.data))
      .catch((error) => {
        console.log(error);
      });
      },
    };
    </script>
    
    <style scoped>
    @import 'resources/css/familydashboard.css';
    h3 {
      font-size: 30px;
      text-align: center;
      margin: 50px 0;
      color: #6B4935;
      font-family: 'Dancing Script', cursive;
    }
    .disabled {
      pointer-events: none;
    }
    .victim-name {
  color: #914F1E; 
  font-weight: bolder;
  text-decoration: underline; 
  cursor: pointer; 
}

.victim-name:hover {
  color: #654520;
  text-decoration: none; 
}


    </style>