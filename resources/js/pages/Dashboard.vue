<template>

    <h1>helllo{{ name }}</h1>
    
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
};
</script>