
<template>
 
</template>

<script>
export default {
  data() {
    return {
    

    };
  },
 
  mounted() {
   this.logout();

    }
  ,
  methods: {
    logout: function () {
 

 localStorage.removeItem("auth");
 localStorage.removeItem("user");
 localStorage.removeItem("token");
 this.$emit('updateparent', "logout");
 this.$router.push({name:"Home"});

    },
  },
 
};
</script>