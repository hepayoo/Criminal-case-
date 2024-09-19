<template>
    <div class="admin-bg">
      
          <img :src="'/pics/Espace admin.svg'" alt="Admin Background" class="full-bg-img">
  
         <div class="admin-headers">
  
          
          <a href="#"><router-link :to="{ name: 'Home' }">Home</router-link ></a>
          <a href="#" @click="logout">Log out</a>
         </div>
         
  
         <div class="menu-buttons">
          <router-link :to="{ name: 'CaseManagement' }"><p>Case Management</p></router-link >
          <p>Family Case Management</p>
          <p>Community Management</p>
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

  @import 'resources/css/admin.css';
</style>