<script>
import axios from "axios";
export default {
    name: 'FormMail',
    data() {
    return {
      name: "",
      object: "",
      email: "",
      messaggio: "",
      errors: {},
      isLoading: false,
      isSend: false
    };
  },
  methods: {
    sendForm() {
      const data = {
        name: this.name,
        object: this.object,
        email: this.email,
        message: this.messaggio,
      };
      this.isLoading = true;
      axios.post("http://127.0.0.1:8000/api/contacts", data).then((result) => {
        this.isLoading = false;
        if(!result.data.success){
            this.errors = result.data.errors;
        }else {
            this.name = '';
            this.object = '';
            this.email = '';
            this.messaggio = '';
            this.errors = {};
            this.isSend = result.data.isCreate;
        }
      });
    },
  },
};
</script>
<template>
    <div class="text-center d-flex justify-content-center mb-4" v-if="isSend">
        <p class="btn btn-grey">
            E-MAIL MANDATA CON SUCCESSO, SARAI RICONTATTATO A BREVE
        </p>
  </div>
<div class="container d-flex justify-content-center">

    <form class="w-100" @submit.prevent="sendForm()">
    <div>
        <label class="d-block" for="name"> NOME :</label>
      <input
        class="form-control"
        :class="{'is-invalid' : errors.name}"
        v-model.trim="name"
        type="text"
        placeholder="name ..."
      />
      <p v-for="(error, index) in errors.name" :key="'name'+index" class="invalid-feedback">
        {{ error }}
      </p>
    </div>
    <div>
        <label class="d-block" for="object"> OGGETTO :</label>
      <input
        class="form-control"
        :class="{'is-invalid' : errors.object}"
        v-model.trim="object"
        type="text"
        placeholder="oggetto ... "
      />
      <p v-for="(error, index) in errors.object" :key="'object'+index" class="invalid-feedback">
        {{ error }}
      </p>
</div>
    <div>
        <label class="d-block" for="email"> EMAIL :</label>
      <input
        class="form-control"
        :class="{'is-invalid' : errors.email}"
        v-model.trim="email"
        type="mail"
        placeholder="email ..."
      />
      <p v-for="(error, index) in errors.email" :key="'email'+index" class="invalid-feedback">
        {{ error }}
      </p>

    </div>
    <div>
        <label class="d-block" for="message"> MESSAGGIO :</label>
      <textarea
        class="form-control"
        :class="{'is-invalid' : errors.message}"
        v-model.trim="messaggio"
        name="message"
        placeholder="messaggio ... "
        cols="30"
        rows="10"
      ></textarea>
      <p v-for="(error, index) in errors.message" :key="'messaggio'+index" class="invalid-feedback">
        {{ error }}
      </p>

    </div>
    <div class="text-center">
        <button class="btn btn-grey" type="submit"  :disabled="isLoading">{{isLoading ? 'invio in corso ... ' : 'invia '}}</button>
    </div>
  </form>
</div>
</template>



<style lang="scss" scoped>
@use '../../scss/partials/variables' as *;
form {
    color: $secondary-color;
    div {
        margin-bottom: 10px;
    }
    label {
        margin-bottom: 15px;
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 15px 0;
        border: 1px solid $secondary-color;
        border-radius: 10px;
        padding-left: 5px;
        &::placeholder {
            font-size: .8rem;
            letter-spacing: 2px;
        }
        &:focus {
            outline: 1px solid $secondary-color;
        }
    }
    button {
        border: none;
        cursor: pointer;
        transition: all .4s;
        &:hover {
            color: white;
        }
    }
    .invalid-feedback, .is-invalid {
        color: red;
    }
    .is-invalid {
        border: 1px solid red;
    }
}
</style>
