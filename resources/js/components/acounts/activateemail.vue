
<template>
<div style="width:300px;;margin:auto;text-align:center;">

  <h1> Your Acount Is Activated Login Again</h1>
</div>
</template>

<script>
export default {
  data() {
    return {};
  }
  ,
  mounted(){
this.verifyToken();
  },
  methods:{
    verifyToken:function(){
      var token=this.$route.params.token;
      var config = {
  method: 'post',
  url: '/api/users/verifymail/'+token,
 
};

axios(config)
.then((response)=> {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
 this.$router.push({name:'Login'});
});


    }
  }

};
</script>