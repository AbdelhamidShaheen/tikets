
<template>
 <div style="width: 300px ;margin: auto; margin-top:3px;" >
    <div class="alert alert-danger" v-if="has_error">
   {{errors[0]}}
    </div>
    <div class="fluid-container border p-3">
      <h4 class="mb-3">Edit Tiket</h4>
      <div>
        <div style="margin-bottom:3px;">
          <label for="exampleInputEmail1" class="form-label">new deadline</label>
          <input
            type="date"
            class="form-control"
            id="email"
            name="email"
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
      form:{deadline:""},
      errors:[]

   
      
    };
  },
  mounted() {
   
  },
  methods: {
    edit: function () {
     

     
   
    },
  },
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      title: 'Edit Tikets',
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
    }
};
</script>