<template lang="pug">
  .header
    router-link(:to="{ name: 'Login' }").home.section Pārskats
    router-link(:to="{ name: 'Pub' }").add.section Pievienot
    .logout.section(v-on:click="logout")
      p Izrakstīties
</template>

<script>

export default {
  name: 'HeaderAd',
  data () {
    return{ 
      show: false
    }
  },
  mounted: function () {
    this.show = this.$store.state.loggedIn
  },
  methods: {
    logout: function () {
      this.$store.commit("logOut")
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.header{
  display: flex;
  padding: 1.33em 10px;
  .section{
    width: 50px;
    height: 40px;
    display: inline-block;
    overflow: hidden;
    &::before{
      content: '';
      width: 50px;
      height: 40px;
      display: inline-block;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
  }
  .logout{
    margin-left: auto;
    &::before{
      background-image: url(../assets/SignOut.svg);
    }
  }
  .home{
    margin-right: 1em;
    &::before{
      background-image: url(../assets/home.svg);
    }
  }
  .add{
    &::before{
      background-image: url(../assets/add.svg);
    }
  }
}
</style>
