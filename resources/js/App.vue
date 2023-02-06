<script>
import HeaderApp from './components/partials/HeaderApp.vue';
import axios from 'axios';
import { BASE_URL } from './data/data';
import { store } from './data/store';
export default {
    name: 'App',
    components:
    {
        HeaderApp
    },
    data(){
    return {
        projects : [],
        store
    }
  },
  methods:
  {
    getProjects(){
        store.isLoading = true;
        axios.get(`${BASE_URL}projects`)
        .then(result => {
                store.isLoading = false;
                store.projects = result.data
            })
    }
  },
  mounted(){
    this.getProjects();
  }
}
</script>


<template>

    <HeaderApp />

    <main>
        <router-view> </router-view>
    </main>
</template>


<style lang="scss">
@use '../scss/appVue.scss';
</style>
