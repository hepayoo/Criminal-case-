<template>

    <div class="admin-bg">
    
      <!-- success message -->
      <div class="success-msg" v-if="success">
          <i class="fa fa-check"></i>
          Post edited successfully
        </div>
    
    <div class="case-form-container">
        <form  @submit.prevent="submit" class="case-form" >
            <label for="criminal-name">Criminal Name:</label>
            <input type="text" id="criminal-name" v-model="fields.title"/>
            <span v-if="errors.title" class="error">{{ errors.title[0] }}</span>

            <label for="criminal-description">Criminal description:</label>
            <input type="text" id="criminal-description" v-model="fields.desc"/>
            <span v-if="errors.desc" class="error">{{ errors.desc[0] }}</span>
    
            <label for="upload-image">Upload Image:</label>
            <input type="file" id="upload-image"  @change="grabFile" ref="fileInput"/>
            <span v-if="errors.file" class="error">{{ errors.file[0] }}</span>
            <div class="preview">
              <img :src="url" alt="" />
            </div>
            <br />
    
            <label for="biography">Biography:</label>
            <textarea id="biography"  rows="4" v-model="fields.biography"></textarea>
            <span v-if="errors.biography" class="error">{{ errors.biography[0] }}</span>
    
            <label for="murders">Murders:</label>
            <textarea id="murders"  rows="2" v-model="fields.murders"></textarea>
            <span v-if="errors.murders" class="error">{{ errors.murders[0] }}</span>
    
            <label for="arrest-prison-death">Arrest, Prison, and Death:</label>
            <textarea id="arrest-prison-death"  rows="3" v-model="fields.arrests"></textarea>
            <span v-if="errors.arrests" class="error">{{ errors.arrests[0] }}</span>
    
            <label for="validated-sources">Validated Sources:</label>
            <textarea id="validated-sources"  rows="2" v-model="fields.sources"></textarea>
            <span v-if="errors.sources" class="error">{{ errors.sources[0] }}</span>
    
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
    </div>
    </template>
    
    <script>
    export default {
      props: ["slug"],
      data() {
        return {
          success: false,
          fields: {
            title: '',
            desc: '',
            biography: '',
            murders: '',
            arrests: '',
            sources: '',
            file: null,
          },
          errors: {},
          url: '',
        };
      },
      
      methods: {
        grabFile(e) {
          const file = e.target.files[0];
          this.fields.file = file;
          if (this.url) {
    URL.revokeObjectURL(this.url); 
  }
  this.url = URL.createObjectURL(file);
        },
        
        submit() {
  const fd = new FormData();
  fd.append("title", this.fields.title);
  fd.append("desc", this.fields.desc);
  if (this.fields.file) {
    fd.append("file", this.fields.file);
  }
  fd.append("biography", this.fields.biography);
  fd.append("murders", this.fields.murders);
  fd.append("arrests", this.fields.arrests);
  fd.append("sources", this.fields.sources);
  fd.append("_method", "PUT");

  axios
    .post(`/api/crimes/${this.slug}`, fd, {
      headers: {
        "content-type": "multipart/form-data",
      },
    })
    .then((res) => {
      this.success = true; // Display success message
      setTimeout(() => {
        this.success = false; // Hide success message after 3 seconds
        this.$router.push({ name: "CaseManagement" });
      }, 3000); // Success message visible for 3 seconds
    })
    .catch((error) => {
      this.errors = error.response.data.errors;
      if (error.response.status === 403) {
        this.$router.push({ name: "CaseManagement" });
      }
    });
  },
      },
      
      mounted() {
        axios
          .get("/api/crimes/" + this.slug)
          .then((response) => {
            this.fields = response.data.data;
            this.url = "/" + response.data.data.imagePath;
          })
          .catch((error) => {
            console.log(error);
          });
      },
    };
    </script>
    
    
    <style scoped>
    
      @import 'resources/css/admin.css';
    </style>