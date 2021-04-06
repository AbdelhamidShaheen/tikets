
<template>
 
    <div class="card-container" style="padding:5px;">
      <div  class="card">{{usersnum}} user</div>
      <div class="card">{{tiketsnum}} tikets</div>
      
     
    </div>
 
</template>

<style>
.card-container{
  display: flex;
  margin-top: 5px;
}
.card {
  background-color: white;
  width: 200px;
  height: 100px;
  border: gray ;
  border-radius: 4px;
  border-style: solid;
  border-width: 3px;
  font-size: 25px;
  font-weight: bold;
  padding: 5px;
  margin: 4px;
}

</style>
<script>
export default {
  data() {
    return {
      usersnum: 0,
      tiketsnum: 0,
    };
  },
  mounted() {
    this.laodUsers();
  },
  methods: {
    laodUsers: function () {
      console.log(this.usersnum);
      var config = {
        method: "get",
        url: "/api/dashboard",
        headers: {
          Authorization: "Bearer ".concat(JSON.parse(localStorage.getItem("token"))),
        },
      };

      axios(config)
        .then( (response)=>{
          console.log( self.tiketsnum);
         this.usersnum=response.data.usersnum;
         this.tiketsnum=response.data.tiketsnum;
      console.log(this.usersnum);
     
        
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "dashboard",
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
  },
};
</script>