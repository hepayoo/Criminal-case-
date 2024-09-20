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

     

    

     

   

  

      <!-- pagination -->
      <div class="pagination" id="pagination">
        <a href="">&laquo;</a>
        <a class="active" href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">&raquo;</a>
      </div>
    </section>
</template>

<script>
export default {

data() {
  return {
    crimes: [],
  };
},

mounted() {
  axios
    .get("/api/home-crimes")
    .then((response) => (this.crimes = response.data.data))
    .catch((error) => {
      console.log(error);
    });
},
};
</script>

<style scoped>
@import 'resources/css/familydashboard.css';
</style>