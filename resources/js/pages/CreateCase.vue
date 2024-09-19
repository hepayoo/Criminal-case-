<template>

    <div class="admin-bg">
    
      <!-- success message -->
      <div class="success-msg" v-if="success">
          <i class="fa fa-check"></i>
          Post created successfully
        </div>
    
    <div class="case-form-container">
        <form  @submit.prevent="submit" class="case-form" >
            <label for="criminal-name">Criminal Name:</label>
            <input type="text" id="criminal-name" v-model="fields.title"/>
            <span v-if="errors.title" class="error">{{ errors.title[0] }}</span>
    
            <label for="upload-image">Upload Image:</label>
            <input type="file" id="upload-image" @input="grabFile" />
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
    export default{
        data() {
    return {
      success: false,
      fields: {},
      errors: {},
      url:"",
      
    }

},
methods: {
      grabFile(e) {
        const file = e.target.files[0];
        this.fields.file = file;
        this.url = URL.createObjectURL(file);
        URL.revokeObjectURL(file);
      },
      submit() {
        axios
          .post("/api/crimes", this.fields, {
            headers: { "content-type": "multipart/form-data" },
          })
          .then(() => {
            this.fields = {};
            this.url = null;
            
            this.success = true;
            this.errors = {};
            setTimeout(() => {
              this.success = false;
            }, 2500);
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.success = false;
          });
      },
    },
    };
</script>
    
    <style scoped>
    
      @import 'resources/css/admin.css';
    </style>