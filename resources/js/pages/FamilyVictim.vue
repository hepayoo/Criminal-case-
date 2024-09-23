<template>
    <div class="section">
      <div class="section-title">{{ post.victim_name }}</div>
      <div class="image-section">
        <img :src="`/storage/${post.victim_image}`" alt="Victim Image" />
      </div>
    </div>
  
    <div class="section biography">
      <div class="section-title">Case Description</div>
      <p>{{ post.description }}</p>
    </div>
  
    <div class="section murders">
      <div class="section-title">Case Images</div>
      <div v-if="post.case_image && post.case_image.length">
        <img v-for="(image, index) in post.case_image" :key="index" :src="`/storage/${image}`" alt="Case Image" />
      </div>
      <div v-else>No case images available.</div>
    </div>
  
    <div class="section arrest">
      <div class="section-title">Case Video</div>
      <div v-if="post.case_video && post.case_video.length">
        <video controls>
          <source v-for="(video, index) in post.case_video" :key="index" :src="`/storage/${video}`" type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </div>
      <div v-else>No case videos available.</div>
    </div>
  
    <div class="section arrest">
      <div class="section-title">Supporting Documents</div>
      <div v-if="post.case_file && post.case_file.length">
        <a v-for="(file, index) in post.case_file" :key="index" :href="`/storage/${file}`">Download Document {{ index + 1 }}</a>
      </div>
      <div v-else>No supporting documents available.</div>
    </div>
  
    <p><strong>Date Reported:</strong> {{ post.created_at }}</p>
  </template>
  
  <script>
  export default {
    props: ["slug"],
    data() {
      return {
        post: {
          victim_image: '', // Initialize this property
          case_image: [],
          case_video: [],
          case_file: [],
          description: '', // Initialize other properties if necessary
          created_at: '', // Initialize this property
        },
      };
    },
    mounted() {
      axios
        .get("/api/posts/" + this.slug)
        .then((response) => (this.post = response.data.data))
        .catch((error) => {
          console.log(error);
        });
    },
  };
  </script>
  
  <style scoped>
  @import 'resources/css/familydashboard.css';
  </style>
  