<template>
  <div id="app">
    <router-view name='header'></router-view>
    <router-view></router-view>
    <router-view name='footerLinks'></router-view>
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>

<style lang="scss">
@import 'components/variables.scss';
body{
  margin: 0;
}
#app {
  font-family: "Open Sans","HelveticaNeue","Helvetica Neue",sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #464646;
  font-size: 16px;
  display: block;
  margin: 0 auto;
  max-width: 1200px
}
.section-title {
  border-bottom: 3px solid #eaeaea;
  text-align: center;
  margin-bottom: 1.33em;
  margin-top: 2em;
  h4{
    color: #91c0c2;
    margin-bottom: 0.5em;
    text-transform: uppercase;
  }
  p{
    display: none;
  }
}
@media ($tablet) {
  .section-title{
    text-align: left;
    display: flex;
    justify-content: space-between;
    p{
      display: block;
    }
  }
}
</style>
