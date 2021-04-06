
<template>
  <div style="width: 300px ;margin: auto; margin-top:3px;" >
    <div class="fluid-container border p-3">
      <h4 class="mb-3">LOGIN</h4>
      <div>
        <div style="margin-bottom:3px;">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            v-model="form.email"
          />
        </div>
        <div  style="margin-bottom:3px;">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            v-model="form.password"
          />
        </div>

        <div   style="margin-bottom:3px;" class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberme" />
          <label class="form-check-label">Remember Me</label>
        </div>
        <button
          type="submit"
          @click.prevent="login"
          class="btn btn-primary form-control"
        >
          login
        </button>
        <p>
          do you have not acount?
          <router-link to="/register">register</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: { email: "", password: "" },
      errors: [],

    };
  },
  beforeCreate(){
   
  },
  mounted() {
   
    }
  ,
  methods: {
    login: function () {
      var data = this.form;

      var config = {
        method: "post",
        url: "/api/users/signin",

        data: data,
      };

      axios(config)
        .then( (response)=> {

          var user=response.data.user;
          var token=response.data.token;
         localStorage.setItem("auth","true");
         localStorage.setItem("token",JSON.stringify(token));
         localStorage.setItem("user",JSON.stringify(user));
         
           this.$router.push({name:"Home"});
         
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Login",
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
  },
};
</script>