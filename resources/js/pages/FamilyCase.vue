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
        <div class="card-blog-content" v-for="crime in crimes" :key="crime.id">
          <img :src="'/pics/file.svg'" alt="" />
          <div class="content-overlay">
            <h1> {{ crime.title }}</h1>
            <p>{{ crime.desc }}</p>
            <img :src="'/' + crime.imagePath" alt="Crime Image" class="jeffrey-img" />
            
            <router-link
          :to="{
            name: 'FamilySingleCase',
            params: { slug : crime.slug },
          }"
          ><button>Tap to see the Case</button></router-link >
        
          </div>
        </div>
  
       
  
      
  
       
  
     
  
    
  
    
    
      </section>
      <h3 v-if="!crimes.length">Sorry, no match was found!</h3>
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
        crimes: [],
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
            this.crimes = response.data.data;
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
          .get("/api/crimes", {
            params: {
              search: this.title,
            },
          })
          .then((response) => {
            this.crimes = response.data.data;
            this.links = response.data.meta.links;
          })
          .catch((error) => {
            console.log(error);
          });
      },
    },
    mounted() {
      axios
        .get("/api/crimes")
        .then((response) => {
          this.crimes = response.data.data;
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
  </style>