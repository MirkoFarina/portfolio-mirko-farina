<script>
import { store } from '../data/store';
import LoaderPage from '../components/LoaderPage.vue';
export default {
  name: "Projects",
  components: {
    LoaderPage
  },
  data(){
    return {
        store
    }
  }
};
</script>


<template>
    <LoaderPage />

  <section v-if="!store.isLoading" v-for="project in store.projects" :key="'project' + project">
    <div class="mf-card">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6 mb-5 text-center text-lg-start">
            <h2> {{ project.name }} </h2>
            <ul>
              <li v-for="technology in project.technologies" :key="'tech' + technology.id"> {{ technology.name }} </li>
            </ul>

            <span class="mb-4 text-uppercase d-block">
                {{project.type.name}}
            </span>
            <router-link  class="btn" :to="{name: 'project-details', params: {slug: project.slug}}"> SCOPRI DI PI&Uacute;</router-link>
          </div>
          <div class="col-12 col-lg-6 text-center">
            <img
              :src="project.cover_image"
              alt="Mockup Progetto"
            />
          </div>
        </div>
      </div>
    </div>
  </section>

</template>



<style lang="scss" scoped>
@use "../../scss/partials/variables" as *;
section {
  padding: 40px 0;
  h2 {
    font-size: 2.1rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 10px 50px 10px 20px;
    display: inline-block;
    margin-bottom: 20px;
  }
  span {
    font-size: .7rem;
  }
  ul {
    list-style: none;
    li {
        margin-bottom: 10px;
        text-align: center;
        font-size: 1.3rem;
    }
  }
  img {
    width: 50%;
    height: 100%;
    object-fit: cover;
  }
  &:first-of-type {
    padding-top: 90px;
  }
  &:nth-child(odd) {
    background-color: $bg-user;
    color: white;
    h2 {
      background-color: $bg-secondary;
    }
    a {
        background-color: $bg-secondary;
        color: black;
        transition: all 0.4s;
    &:hover {
    color: white;
        }
    }
  }
  &:nth-child(even) {
    background-color: $bg-secondary;
    .row {
        flex-direction: row-reverse;
    }
    h2 {
      background-color: $transparent-bg;
      color: white;
    }
    a {
        background-color: $transparent-bg;
        color: white;
        transition: all 0.4s;
    &:hover {
    color: black;
        }
    }
  }

}
</style>
