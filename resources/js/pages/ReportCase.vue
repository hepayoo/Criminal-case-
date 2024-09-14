<template>
     <div class="form-container">
            <h1 class="case-formula">Case Formula</h1>
    <form>
        <div class="input-group">
            <label for="full-name">Full Name</label>
            <input class="input-f" type="text" id="full-name">
        </div>
        <div class="input-group">
            <label for="victim-name">Victim Name</label>
            <input class="input-f" type="text" id="victim-name">
        </div>
        <div class="input-group">
            <label for="victim-image">Victim Image</label>
            <input class="input-f" type="file" id="victim-image">
        </div>
        <div class="input-group">
            <label for="description">Description</label>
            <input  class="input-f" type="text" id="description">
        </div>
        <div class="input-group">
            <label for="case-image">Case Image</label>
            <input class="input-f" type="file" id="case-image">
        </div>
        <div class="input-group">
            <label for="case-video">Case Video</label>
            <input class="input-f" type="file" id="case-video">
        </div>
        <div class="input-group">
            <label for="case-title">Case file</label>
            <input class="input-f" type="file" id="case-file">
        </div>
        <img :src="'/pics/Sealing wax.png'" class="Wax-f-l">
        <img :src="'/pics/Sealing wax.png'" class="Wax-f-r">
        <input type="submit" class="submit-btn" value="Submit">
    </form>
           
        </div>
</template>

<script>
  
export default {
  name: "ReportCase"
};
</script>

<style scoped>
  @import 'resources/css/familydashboard.css';
</style>