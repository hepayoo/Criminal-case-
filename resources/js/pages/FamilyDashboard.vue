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
          <li> <router-link :to="{ name: 'ReportCase' }">Report a case </router-link ></li>
         
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
     
      <router-view></router-view>
     

      <!-- Main footer -->
    
    </main>
  </div>
      
    </div>
  </template>
  
  <script>
  
export default {
  name: "FamilyDashboard"
};
</script>

<style scoped>
  @import 'resources/css/familydashboard.css';
</style>