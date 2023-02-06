import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Projects from '../views/Projects.vue';
import About from '../views/About.vue';
import Contacts from '../views/Contact.vue';
import Skills from '../views/Skills.vue';
import DetailsProject from '../views/DetailsProject.vue';
import Error404 from '../views/Error404.vue';
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/projects',
        name: 'projects',
        component: Projects
    },
    {
        path: '/projects/details/:slug',
        name: 'project-details',
        component: DetailsProject
    },
    {
        path:'/about',
        name: 'about',
        component: About
    },
    {
        path:'/contacts',
        name: 'contacts',
        component: Contacts
    },
    {
        path:'/skills',
        name: 'skills',
        component: Skills
    },
    {
        path: '/:pathMatch(.*)*',
        component: Error404
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
    linkExactActiveClass: 'current-page',
    linkActiveClass: 'current-page'
})
export default router;
