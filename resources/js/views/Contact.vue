<script>
import FormMail from '../components/FormMail.vue';
export default {
  name: "Contact",
    components:
    {
        FormMail
    }
};
</script>


<template>
<section>
    <h2 class="text-center mb-5">
        SE VUOI LASCIAMI UN MESSAGGIO, E SARAI CONTATTATO AL PI&Uacute; PRESTO
    </h2>
    <FormMail />
</section>
</template>



<style lang="scss" scoped>
@use '../../scss/partials/variables' as *;
section {
    padding-top: 150px;
    padding-bottom: 50px;
    background-color: $bg-user;
    color: $secondary-color;
}
</style>
