
<template>
 <div style="width: 300px ;margin: auto; margin-top:3px;" >
    <div class="alert alert-danger" v-if="has_error">
   {{errors[0]}}
    </div>
    <div class="fluid-container border p-3">
      <h4 class="mb-3">Add Tiket</h4>
      <div>
        <div style="margin-bottom:3px;">
          <label for="exampleInputEmail1" class="form-label">deadline</label>
          <input
            type="date"
            class="form-control"
           
            v-model="form.deadline"
            required
          />
        </div>
       
      
        <button
          type="submit"
          @click.prevent="add"
          class="btn btn-primary form-control"
        >
          Add
        </button>
     
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form:{deadline:""},
      errors:[],
      has_error:0
   
      
    };
  },
  mounted() {
   
  },
  methods: {
    add: function () {
     var data =this.form;
 console.log(data);
var config = {
  method: 'post',
  url: '/api/tikets/create',
  headers: { 
      Authorization: "Bearer ".concat(JSON.parse(localStorage.getItem("token"))),
  },
  data : data
};

axios(config)
.then((response)=> {
       this.$router.push({name:"Tikets"});

})
.catch( (error)=> {
  this.errors=error.response.data;
});

     
   
    },
  },
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      title: 'Add Tikets',
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
    }
};
</script>