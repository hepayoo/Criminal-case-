<template>

    <h1>helllo{{ name }}</h1>
    <div class="logout"><a href="#" @click="logout">Log out</a></div>
    
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