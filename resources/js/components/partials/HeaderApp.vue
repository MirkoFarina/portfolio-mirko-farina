<script>
export default {
  name: "HeaderApp",
  data() {
    return {
      isCanvas: false,
      scrollPosition: null
    };
  },
  methods:
  {
    updateScroll(){
        this.scrollPosition = window.scrollY;
    }
  },
  mounted()
  {
    window.addEventListener('scroll', this.updateScroll);
  }
};
</script>


<template>
  <header :class="{'full-color': scrollPosition > 80}">
    <!-- VISUAL FOR PC OR BIG SCREEN -->
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <div class="logo-img"></div>
        </div>
      <nav class="d-none d-lg-block">
        <ul class="d-flex">
          <li>
            <router-link :to="{ name: 'home' }"> home </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'about' }"> Chi sono </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'projects' }"> PROJECTS </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'skills' }">
              CV &amp; Skills
            </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'contacts' }"> Contacts </router-link>
          </li>
        </ul>
      </nav>

      <!-- VISUAL FOR MOBILE AND IPAD   -->
      <div class="hamburger d-lg-none">
        <i @click="isCanvas = !isCanvas" class="fa-solid fa-bars"></i>
        <div :class="{ active: isCanvas }" class="mf-offcanvas">
          <i @click="isCanvas = false" class="fa-solid fa-xmark"></i>
          <nav>
            <ul>
              <li>
                <router-link @click="isCanvas = false" :to="{ name: 'home' }">
                  Home
                </router-link>
              </li>
              <li>
                <router-link @click="isCanvas = false" :to="{ name: 'about' }">
                  About
                </router-link>
              </li>
              <li>
                <router-link
                  @click="isCanvas = false"
                  :to="{ name: 'projects' }"
                >
                  PROJECTS
                </router-link>
              </li>
              <li>
                <router-link @click="isCanvas = false" :to="{ name: 'skills' }">
                  CV &amp; Skills
                </router-link>
              </li>
              <li>
                <router-link
                  @click="isCanvas = false"
                  :to="{ name: 'contacts' }"
                >
                  CONTACTS
                </router-link>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>


<style lang="scss" scoped>
@use "../../../scss/partials/variables" as *;
header {
  background-color: $transparent-bg;
  height: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  z-index: 998;
  width: 100vw;
  transition: all .6s;
  &.full-color {
    background-color: $bg-user;
  }
  .logo {
    .logo-img {
        width: 40px;
        aspect-ratio: 1/1;
        background-color: white;
        border-radius: 50%;
    }
  }
  ul {
    list-style: none;
    li {
        margin: 0 20px;
      a {
        color: $color-link;
        text-decoration: none;
        font-weight: 200;
        font-size: 1.4rem;
        transition: all 0.33s;
        text-transform: uppercase;
        &:hover {
          color: $secondary-color;
        }
        &.current-page {
          font-weight: 800;
          padding-bottom: 15px;
          border-bottom: 2px solid $color-link;
        }
      }
    }
  }
  .hamburger {
    text-align: end;
    li {
        margin: 20px 0
    }
    i {
      font-size: 1.8rem;
      color: $color-link;
      cursor: pointer;
    }
    .mf-offcanvas {
      position: absolute;
      z-index: 99;
      display: block;
      top: 0;
      left: -100%;
      height: 100vh;
      width: 70vw;
      background-color: $bg-user;
      padding: 10px;
      transition: all 0.55s;
      &.active {
        display: block;
        left: 0;
      }
      i {
        font-size: 1.1rem;
      }
      nav {
        text-align: left;
      }
    }
  }
}
</style>
