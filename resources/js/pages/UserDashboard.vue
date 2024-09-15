<template>
  <div >
 
  
    <div id="wrapper">
     
  <!-- sidebar -->
  <div class="sidebar">
   
    <span class="closeButton">&times;</span>
    

    <div class="side-links">
      <ul>
       
        <li>  <router-link :to="{ name: 'Case' }">Cases</router-link ></li>
        <li> <router-link :to="{ name: 'About' }">About-us</router-link ></li>
        <li> <router-link :to="{ name: 'Communities' }">My communities</router-link ></li>
        
       
      </ul>
    </div>
    <!-- sidebar footer -->
  
  </div>
  <!-- Menu Button -->
  <div class="menuButton">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    
  </div>

  <!-- main -->
  <main class="family-container">
    <h1 class="welcome">Welcome {{ name }}🔍</h1>
      <div class="logout"><a href="#" @click="logout">Log out</a></div>
    <router-view></router-view>
   

    <!-- Main footer -->
  
  </main>
</div>
    
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
    };
  },
  mounted() {
    axios
      .get("/api/user")
      .then((response) => (this.name = response.data.name))
      .catch((error) => console.log(error));
  },

  methods: {
    logout() {
      axios
        .post("/api/logout")
        .then((response) => this.$router.push({ name: "Home" }))
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style scoped>

@import 'resources/css/familydashboard.css';
</style>
  