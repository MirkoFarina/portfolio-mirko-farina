<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
export default {
name:'DetailsProject',
data(){
    return {
        project: {}
    }
},
methods:
{
    getProjectDetails(){
        axios.get(`${BASE_URL}projects/details/${this.$route.params.slug}`)
            .then(result => {
                this.project = result.data;
            })
    }
},
mounted(){
    this.getProjectDetails();
}
}
</script>


<template>
    <div class="content pb-3">
        <div class="container d-flex justify-content-center">
            <h1 class="d-inline-block btn btn-grey ">
                {{ project.name }}
            </h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-12 col-lg-5">
                    <p class="mb-3 text-center text-lg-start">
                        {{ project.summary }}
                    </p>
                </div>
                <div class="col-12 col-lg-7 text-center text-lg-end">
                    <img src="../assets/img-battipaglia.jpg" alt="mockup">
                </div>
            </div>
        </div>
    </div>
    <div class="content pb-5">
        <div class="container">
            <h2 class="btn btn-grey d-inline-block  text-white mb-4">
                TECNOLOGIE USATE
            </h2>
            <div>
                <ul>
                    <li v-for="technology in project.technologies" :key="'tech'+ technology.id">
                        {{ technology.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>



<style lang="scss" scoped>
@use '../../scss/partials/variables' as *;
.content {
    background-color: $bg-user;
    color: $secondary-color;
    padding-top: 90px;
    h1 {
        font-weight: bold;
    }
    span {
        display: inline-block;
        font-size: .7rem;
    }
    ul {
        list-style: none;
        li {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }
    }
}
.container-fluid {
    background-color: $bg-secondary;
    color: white;
    .row {
        padding: 20px 0;
        p {
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 2px;
        }
        img {
            width: 100%;
        }
}
}
@media screen and (min-width: 991px) {
    .row {
        img {
        transform: translate(0, 20%);
         }
    }
}
</style>
