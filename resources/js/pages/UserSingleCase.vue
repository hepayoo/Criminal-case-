<template>
    <div class="searchbar">
   <form action="">
     <input type="text" placeholder="Search...." name="search" />
  
     <button type="submit">
       <i class="fa fa-search"></i>
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
  <div class="section">
   <div class="section-title">{{ crime.title }}</div>
   <div class="image-section">
       <img :src="'/' + crime.imagePath" alt="">
   </div>
  </div>
  
  <div class="section biography">
   <div class="section-title">Biography</div>
   {{ crime.biography }}
  </div>
  
  <div class="section murders">
   <div class="section-title">Murders</div>
   {{ crime.murders }}
   
  </div>
  
  <div class="section arrest">
   <div class="section-title">Arrest, Prison, and Death</div>
   {{ crime.arrests }}
  </div>
  <div class="section arrest">
  <div class="section-title">Virified Sources</div>
  {{ crime.sources }}
  <!-- Add more content based on your needs -->
  </div>
  </template>
  
  <script>
  export default {
   
    props: ["slug"],
    data() {
      return {
        crime: {},
        
      };
    },
    mounted() {
      axios
        .get("/api/crimes/" + this.slug)
        .then((response) => (this.crime = response.data.data))
        .catch((error) => {
          console.log(error);
        });
  
  
    },
  };
  </script>
  
  <style scoped>
  @import 'resources/css/familydashboard.css';
  </style>