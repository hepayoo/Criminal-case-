<template>
  <div class="admin-bg">

 
       
    <img :src="'pics/Case Management.svg'" alt="Admin Background" class="full-bg-img">

      <div class="admin-headers">
          <a href="#" ><router-link :to="{ name: 'CreateCase' }">add case</router-link ></a>
         <a href="#"><router-link :to="{ name: 'Home' }">Home</router-link ></a>
          <a href="#" @click="logout">Log out</a>
      
      
      </div>
      

      <div class="menu-buttons-cases">
       <p>Case Management</p>
      
   </div>

   <div class="admin-cases">
       <p>Case Name</p><hr>

       <div class="case-container" v-for="crime in crimes" :key="crime.id">
           <p class="case-name">{{crime.title}}</p> <!-- Change this to the actual case name -->
           <div class="case-actions">
              
               <router-link :to="{ name: 'EditCases', params: { slug: crime.slug } }" > <button>Edit</button></router-link>
               <button>Delete</button>
               
           </div>
         
      
       </div>
       <hr>
       

     
   

   </div>
  </div>

</template>


<script>
export default {
emits: ["updateSidebar"],

data() {
  return {
    name: "",
    crimes: [],
    success: false,
  };
},

mounted() {
  // Fetch user information "name"
  axios
    .get("/api/user")
    .then((response) => (this.name = response.data.name))
    .catch((error) => console.log(error));

  // Fetch dashboard posts to be displayed in page
  axios
    .get("/api/dashboard-crimes")
    .then((response) => (this.crimes = response.data.data))
    .catch((error) => {
      console.log(error);
    });
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