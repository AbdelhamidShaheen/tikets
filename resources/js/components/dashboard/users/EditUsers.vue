
<template>

</template>

<script>
export default {
  data() {
    return {};
  }
  ,
  mounted(){
this.edite();
  },
  methods:{
    edite:function(){
       var id=this.$route.params.id;
      var config = {
  method: 'put',
  url: '/api/users/'+id+'/edit',
  headers: { 
       'Authorization': "Bearer ".concat(JSON.parse(localStorage.getItem("token"))),
  }
};

axios(config)
.then((response) =>{
  console.log(JSON.stringify(response.data));
    this.$router.replace({name:"Users"});

})
.catch(function (error) {
  console.log(error);
});
    }
  }

};
</script>