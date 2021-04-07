
<template>
 <div class="container">
   <router-link to="#" class="btn btn-primary" style="margin:10px; font-weight: bold;">Add tiket</router-link>           
  <table class="table">
    <thead>
      <tr>
        <th>Unique number</th>
        <th>Expire Date</th>
        <th></th>
       
      </tr>
    </thead>
    <tbody>
      <tr  v-for="tiket in tikets" :key="tiket.id">
        <td>{{tiket.uid}}</td>
        <td>{{tiket.deadline}}</td>
        <td>
            <router-link :to="{ name: 'EditTiket', params: { id: tiket.id }}" class="btn btn-primary" style="margin-right:5px; font-weight: bold;">Edit</router-link> 
            <router-link :to="{ name: 'DeleteTiket', params: { id: tiket.id }}" class="btn btn-primary" style="margin-right:5px; font-weight: bold;">Delete</router-link> 

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
      tikets: [],
      config: {
        method: "get",
        url: "/api/tikets",
        headers: {
          Authorization: "Bearer ".concat(JSON.parse(localStorage.getItem("token"))),
        },
      }
      
    };
  },
  mounted() {
    this.laodtikets();
  },
  methods: {
    laodtikets: function () {
     

      axios(this.config)
        .then( (response) =>{
   
         this.tikets=response.data;
          console.log(response.data);
        
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