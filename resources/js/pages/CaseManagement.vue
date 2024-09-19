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
 
         <div class="case-container">
             <p class="case-name">Jeffrey Dahmer</p> <!-- Change this to the actual case name -->
             <div class="case-actions">
                 <button>Edit</button>
                 <button>Delete</button>
             </div>
           
        
         </div>
         <hr>
         <div class="case-container">
             <p class="case-name">Raya and Sekina</p> <!-- Change this to the actual case name -->
             <div class="case-actions">
                 <button>Edit</button>
                 <button>Delete</button>
             </div>
           
        
         </div>
 
       
     
 
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