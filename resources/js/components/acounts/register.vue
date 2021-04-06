
<template>
  <div style="width: 300px; margin: auto; margin-top:3px;" >
    <div class="fluid-container border p-3">
      <h4 class="mb-3">REGISTER</h4>
      <div>
        <div  style="margin-bottom:3px;">
          <label for="username" class="form-label">User Name</label>
          <input
            type="text"
            class="form-control"
            id="user_name"
            name="username"
            v-model="form.username"
          />
        </div>
        <div  style="margin-bottom:3px;">
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
        <div  style="margin-bottom:6px;">
          <label for="con_password" class="form-label">Confirm Password</label>
          <input
            type="password"
            class="form-control"
            id="con_password"
            name="conpassword"
            v-model="form.password_confirmation"
          />
        </div>

        <button type="submit"  @click.prevent="register" class="btn btn-primary form-control">
          register
        </button>
        <p>do you have acount? <router-link to="/login">register</router-link>
</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        username: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: [],
    };
  },
  methods: {
    register: function () {
      var data = this.form;

      var config = {
        method: "post",
        url: "/api/users/signup",
        data: data,
      };

      axios(config)
        .then(function (response) {
          console.log(JSON.stringify(response.data));
        })
        .catch(function (error) {
          console.log(error.response.data);
          console.log("errors");
        });
    },
  },
  metaInfo: {
    title: "Register",
    //titleTemplate: '%s | My Awesome Webapp'
  },
};
</script>