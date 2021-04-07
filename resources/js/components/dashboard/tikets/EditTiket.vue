
<template>
  <div style="width: 300px; margin: auto; margin-top: 3px">
    <div class="fluid-container border p-3">
      <h4 class="mb-3">Edit Tiket</h4>
      <div>
        <div style="margin-bottom: 3px">
          <label  class="form-label"
            >new deadline</label
          >
          <input
            type="date"
            class="form-control"
          
            v-model="form.deadline"
          />
        </div>

        <button
          type="submit"
          @click.prevent="edit"
          class="btn btn-primary form-control"
        >
          Edit
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: { deadline: "" },
    };
  },
  mounted() {
    var id = this.$route.params.id;

    var config = {
      method: "get",
      url: "/api/tikets/"+id,
      headers: {
        Authorization: "Bearer ".concat(
          JSON.parse(localStorage.getItem("token"))
        ),
      },
    };

    axios(config)
      .then((response) => {
        var deadline=response.data.deadline;
      
        this.form.deadline = deadline.split(" ")[0];
        
       
      })
      .catch(function (error) {
        console.log(error);
      });
  },
  methods: {
    edit: function () {
      var id = this.$route.params.id;

      var data = this.form;
    
      var config = {
        method: "put",
        url: "/api/tikets/" + id + "/edit",
        headers: {
          Authorization: "Bearer ".concat(
            JSON.parse(localStorage.getItem("token"))
          ),
        },
        data: data,
      };

      axios(config)
        .then((response) => {
          this.$router.push({ name: "Tikets" });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Edit Tikets",
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
  },
};
</script>