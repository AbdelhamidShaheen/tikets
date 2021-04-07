
<template>

</template>

<script>
export default {
  data() {
    return {
      form:{},
      errors:[]

   
      
    };
  },
  mounted() {
   this.delete();
  },
  methods: {
    delete: function () {
       var id=this.$route.params.id;
     var config = {
  method: 'delete',
  url: 'http://127.0.0.1:8000/api/tikets/'+id+'/delete',
  headers: { 
     'Authorization': "Bearer ".concat(JSON.parse(localStorage.getItem("token"))) 
  
  },
 
};

axios(config)
.then( (response)=> {
     this.$router.replace({name:"Tikets"});

})
.catch(function (error) {
  console.log(error);
});


     
   
    },
  },
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      title: 'Tikets',
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
    }
};
</script>