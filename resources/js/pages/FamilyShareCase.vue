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
        <div class="pagination" id="pagination">
        <a
          href="#"
          v-for="(link, index) in links"
          :key="index"
          v-html="link.label"
          :class="{ active: link.active, disabled: !link.url }"
          @click="changePage(link)"
        ></a>
      </div>
    </div>
     
    </template>
    
    <script>
    export default {
      data() {
        return {
          posts: [],
          title: '',
          links: [],
         
          
        };
      },
      methods: { 
      changePage(link) {
        if (!link.url || link.active) {
          return; 
        }
        axios
          .get(link.url)
          .then((response) => {
            this.posts = response.data.data;
            this.links = response.data.meta.links;
          })
          .catch((error) => {
            console.log(error);
          });
      },
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
            this.links = response.data.meta.links;
            
          })
          .catch((error) => {
            console.log(error);
          });
      },
    },
  
      mounted() {
        axios
      .get("/api/posts")
      .then((response) => {
          this.posts = response.data.data;
          console.log(response.data.meta.links);
          this.links = response.data.meta.links;
        })
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