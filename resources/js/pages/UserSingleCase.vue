<template>
  



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
  
  <div v-html="makeLinksClickable(crime.sources)"></div>
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
    methods: {
      // Convert plain URLs into clickable links
      makeLinksClickable(sources) {
        if (!sources) return '';
        
        // Regular expression to find URLs in the text
        return sources.replace(
          /(https?:\/\/[^\s]+)/g,
          '<a href="$1" target="_blank">$1</a><br>'
        );
      }
    },
  };
  </script>
  
  <style scoped>
  @import 'resources/css/familydashboard.css';
  </style>