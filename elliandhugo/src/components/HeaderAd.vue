<template lang="pug">
  .header(v-if="getLoginInfo")
    .home.section
      router-link(:to="{ name: 'Login' }") Pārskats
    .add.section
      router-link(:to="{ name: 'Pub' }") Pievienot
    .logout.section(v-on:click="logout")
      p Izrakstīties
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  name: 'HeaderAd',
  data () {
    return{ 
      show: false
    }
  },
  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'getLoginInfo'
    ])
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
  padding: 0 10px;
  .section{
    cursor: pointer;
    &::before{
      content: '';
      width: 50px;
      height: 40px;
      display: inline-block;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    a, p{
      display: inline-block;
      width: 0;
      overflow: hidden;
      margin: 1.33em 0;
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
