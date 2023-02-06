<script>
export default {
  name: "ParallaxJumbo",
};
</script>


<template>
  <div class="full-screen d-none d-lg-block"></div>
  <div class="mobile d-lg-none"></div>
</template>



<style lang="scss" scoped>
.full-screen, .mobile {
  height: 70vh;
  background-image: url("../assets/persona-pc.png");
  background-attachment: fixed;
}
.full-screen {
    background-size: cover;

}

.mobile {
    background-size: cover;
    background-position: center;
}
</style>
