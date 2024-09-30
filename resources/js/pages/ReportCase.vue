<template>
    <div class="form-container">
           <h1 class="case-formula">Case Formula</h1>

                 <!-- success message -->
     <div class="success-msg" v-if="success">
       <i class="fa fa-check"></i>
       Post created successfully
     </div>
   <form @submit.prevent="submit">
       <div class="input-group">
           <label for="full-name">Full Name</label>
           <input class="input-f" type="text" id="full-name"  v-model="fields.full_name"/>
           <span v-if="errors.full_name" class="error">{{ errors.full_name[0] }}</span>
       </div>
       <div class="input-group">
           <label for="victim-name">Victim Name</label>
           <input class="input-f" type="text" id="victim-name" v-model="fields.victim_name"/>
           <span v-if="errors.victim_name" class="error">{{ errors.victim_name[0] }}</span>
       </div>
       <div class="input-group">
           <label for="victim-image">Victim Image</label>
           <input class="input-f" type="file" id="victim-image" ref="victim_image" @change="grabFile('victim_image', $event)">
           <span v-if="errors.victim_image" class="error">{{ errors.victim_image[0] }}</span>
      
       </div>
       <div class="input-group">
           <label for="description">Description</label>
           <input  class="input-f" type="text" id="description" v-model="fields.description"/>
           <span v-if="errors.description" class="error">{{ errors.description[0] }}</span>
       </div>
       <div class="input-group">
           <label for="case-image">Case Image</label>
           <input class="input-f" type="file" id="case-image" ref="case_image" @change="grabFile('case_image', $event)" multiple accept="image/*" >
           <span v-if="errors.case_image" class="error">{{ errors.case_image[0] }}</span>
       </div>
       <div class="input-group">
           <label for="case-video">Case Video</label>
           <input class="input-f" type="file" id="case-video" ref="case_video" @change="grabFile('case_video', $event)" multiple accept="video/*">
           <span v-if="errors.case_video" class="error">{{ errors.case_video[0] }}</span>
       </div>
       <div class="input-group">
           <label for="case-title">Case file</label>
           <input class="input-f" type="file" id="case-file" ref="case_file" @change="grabFile('case_file', $event)" multiple accept=".pdf, .doc, .docx">
           <span v-if="errors.case_file" class="error">{{ errors.case_file[0] }}</span>
       </div>
       <img :src="'/pics/Sealing wax.png'" class="Wax-f-l">
       <img :src="'/pics/Sealing wax.png'" class="Wax-f-r">
       <input type="submit" class="submit-btn" value="Submit">
   </form>
          
       </div>
</template>

<script>
 
export default {
   data() {
   return {
     success: false,
     fields: {
           full_name: '', 
           victim_name: '',
           description: '',
           victim_image: null,
           case_image: [],
           case_video: [],
           case_file: []
       },
     errors: {},
     
   }
},
methods:{
   grabFile(field, event) {
       const files = event.target.files; // Get the FileList
   if (field === 'victim_image') {
       this.fields[field] = files[0]; // Single file for victim_image
   } else {
       this.fields[field] = Array.from(files); // Convert to array for other fields
   }
   },
   submit() {
   const formData = new FormData();

   // Append non-file fields to FormData
   for (const key in this.fields) {
       if (!(this.fields[key] instanceof File) && !(this.fields[key] instanceof Array)) {
           formData.append(key, this.fields[key]);
       }
   }

   // Append victim_image (single file)
   if (this.fields.victim_image) {
       formData.append('victim_image', this.fields.victim_image);
   }

   // Append case_image (multiple files)
   if (Array.isArray(this.fields.case_image)) {
       this.fields.case_image.forEach((file, index) => {
           formData.append(`case_image[${index}]`, file);
       });
   }

   // Append case_video (multiple files)
   if (Array.isArray(this.fields.case_video)) {
       this.fields.case_video.forEach((file, index) => {
           formData.append(`case_video[${index}]`, file);
       });
   }

   // Append case_file (multiple files)
   if (Array.isArray(this.fields.case_file)) {
       this.fields.case_file.forEach((file, index) => {
           formData.append(`case_file[${index}]`, file);
       });
   }

   // Submit the form using axios
   axios
       .post("/api/posts", formData, {
           headers: { "content-type": "multipart/form-data" },
       })
       .then(() => {
           this.fields = {}; // Reset form fields
           this.success = true; // Display success message
           this.errors = {}; // Clear errors

           // Reset file inputs
           this.$refs.victim_image.value = null;
           this.$refs.case_image.value = null;
           this.$refs.case_video.value = null;
           this.$refs.case_file.value = null;

           setTimeout(() => {
               this.success = false;
           }, 2500);
       })
       .catch((error) => {
           this.errors = error.response.data.errors; // Capture validation errors
           this.success = false; // Hide success message
       });
}




}


};
</script>

<style scoped>
 @import 'resources/css/familydashboard.css';
</style>