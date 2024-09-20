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
        '<a href="$1" target="_blank">$1</a>'
      );
    }
  },
};
</script>

<style scoped>
@import 'resources/css/familydashboard.css';
</style>