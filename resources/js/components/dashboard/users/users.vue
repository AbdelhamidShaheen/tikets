
<template>
<div class="container">
            
  <table class="table" style="margin:20px;">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Role</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users" :key="user.id">
        <td>{{user.user_name}}</td>
        <td>{{user.role}}</td>
        <td>
           <router-link :to="{ name: 'EditUsers', params: { id: user.id }}" class="btn btn-primary" style="margin-right:5px; font-weight: bold;">Edit</router-link> 

        </td>
      </tr>
    
    </tbody>
  </table>
</div>
</template>

<script>
export default {
  data() {
    return {
      users:[],
      
    };
  } ,
  mounted(){
   this.laodUsers();
  },
  methods:{
    laodUsers:function(){
      var config = {
  method: 'get',
  url: '/api/users',
  headers: { 
    Authorization: "Bearer ".concat(JSON.parse(localStorage.getItem("token")))
  }
};

axios(config)
.then((response)=> {
  console.log(JSON.stringify(response.data));
  this.users=response.data;
})
.catch(function (error) {
  console.log(error);
});

    }
  },  metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      title: 'Users',
    //   // all titles will be injected into this template
    //   titleTemplate: '%s | My Awesome Webapp'
    }
  
 
};
</script>