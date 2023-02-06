<script>
import ParallaxJumbo from "../components/ParallaxJumbo.vue";
import 'animate.css';
export default {
  name: "Home",
  components: {
    ParallaxJumbo,
  },
  data() {
    return {
      scrollPosition: null,
      isCircle: false,
      showSkills: false,
      showProjects: false
    };
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
    getClassCircle(){
        if(this.scrollPosition >= 200) {
           this.isCircle = true;
        }
    },
    getShowProjects(){
        if(this.scrollPosition >= 400){
            this.showProjects = true;
        }
    },
    getShowSkills(){
        if(this.scrollPosition >= 650){
            this.showSkills = true;
        }
    }
  },
  mounted() {
    window.addEventListener("scroll", this.updateScroll);
    window.addEventListener("scroll", this.getClassCircle);
    window.addEventListener("scroll", this.getShowProjects);
    window.addEventListener("scroll", this.getShowSkills);
  },
};
</script>


<template>
  <ParallaxJumbo />

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-start">
          <p>
            Crescere in una piccola città puo' farti sottovalutare le
            opportunità che il mondo offre. <br />
            <span>Non accontentarmi</span> è stato il mio punto di partenza.
          </p>
          <router-link class="btn btn-grey" :to="{ name: 'about' }">
            scopri di più</router-link
          >
        </div>
        <div class="col-12 col-lg-6 position-relative d-flex">
          <div>
            <img  src="../assets/img-battipaglia.jpg" alt="" />
            <img  src="../assets/img-bellizzi.jpg" alt="" />
          </div>
          <div class="circle">
            <div :class="{'d-block animate__animated animate__fadeIn' : isCircle}"></div>
            <div :class="{'d-block animate__animated animate__fadeIn' : isCircle}"></div>
            <div :class="{'d-block animate__animated animate__fadeIn' : isCircle}"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="projects" class="opacity-0" :class="{'opacity-100' : showProjects}">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-start">
          <h3>MY PROJECTS</h3>
          <router-link class="btn btn-black" :to="{ name: 'projects' }">
            scopri di più</router-link
          >
        </div>
        <div class="col-12 col-lg-6 text-center text-lg-start">
          <img src="../assets/pc.png" alt="pc" />
        </div>
      </div>
    </div>
  </section>
  <section id="skills" class="opacity-0" :class="{'opacity-100' : showSkills}">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-start">
          <h3>MY SKILLS</h3>
          <router-link class="btn btn-grey" :to="{ name: 'skills' }">
            scopri di più</router-link
          >
        </div>
        <div class="col-12 col-lg-6 mf-col text-center">
          <div class="top text-uppercase">
            <span :class="{'d-inline-block animate__animated animate__fadeIn' : showProjects}">Puntualità</span>
            <span :class="{' d-inline-block mx-2 animate__animated animate__fadeIn' : showProjects}">Open-minded</span>
            <span :class="{'d-inline-block animate__animated animate__fadeIn' : showProjects}">Dedizione</span>
          </div>
          <div class="bottom text-center base-t">
            <div class="my-4 ps-5">
              <span :class="{'d-block animate__animated animate__fadeIn first' : showProjects}">VUEJS</span>
            </div>
            <div class="mb-4 ps-5">
              <span :class="{'d-block animate__animated animate__fadeIn second' : showProjects}">MYSQL</span>
            </div>
            <div>
              <span class="ps-5" :class="{'d-block animate__animated animate__fadeIn third' : showProjects}">PHP</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>



<style lang="scss" scoped>
@use "../../scss/partials/variables" as *;
// GENERAL RULES
section {
  font-weight: 200;
}
h3 {
  font-size: 2.5rem;
  margin-bottom: 30px;
  letter-spacing: 7px;
}
a {
  display: inline-block;
  margin-bottom: 50px;
  transition: all 0.4s;
  &:hover {
    color: black;
  }
}

#about {
  background-color: $bg-user;
  color: $secondary-color;
  padding-top: 20px;
  p {
    font-size: 1.4rem;
    margin-bottom: 30px;
    letter-spacing: 2px;
    span {
      color: white;
      font-weight: bold;
    }
  }
  a:hover {
    color: $color-link;
  }
  .col-12 {
    img {
      width: 50%;
      filter: grayscale(1);
      padding-bottom: 300px;
      &:last-of-type {
        transform: translate(-30%, 30%);
      }
    }
  }
  .circle {
    position: absolute;
    bottom: 90px;
    left: 50px;
    div {
      width: 20px;
      aspect-ratio: 1/1;
      border-radius: 50%;
      background-color: $bg-secondary;
      margin-bottom: 30px;
      animation-duration: 2s;
      display: none;
      &:nth-child(2) {
        animation-duration: 3s;
      }
      &:last-of-type {
        margin: 0;
        animation-duration: 4s;
      }
    }
  }
}

#projects {
  background-color: $bg-secondary;
  color: $color-link;
  padding: 50px 0;
  transition: all 1s;
  img {
    width: 50%;
  }
}

#skills {
  background-color: $bg-user;
  color: $secondary-color;
  padding: 50px 0;
  transition: all 1s;
  a:hover {
    color: $color-link;
  }
  .mf-col {
    font-size: 1.3rem;
    span {
        display: none;
        &:nth-child(1){
            animation-duration: 4s;
        }
        &:nth-child(2){
            animation-duration: 6s;
        }
        &:nth-child(3){
            animation-duration: 8s;
        }
        &.first {
            animation-duration: 10s;
        }
        &.second {
            animation-duration: 12s;
        }
        &.third {
            animation-duration: 14s;
        }
    }
    .base-t {
        width: 100%;
      }
  }
}

@media screen and (max-width: 500px) {
  #skills {
    .mf-col {
      font-size: .8rem;
      .base-t {
        width: 85%;
      }
    }
  }
}
</style>
