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
a{
  text-decoration: none;
  color: inherit;
}
#app{
  font-size: 16px;
  line-height: 1.8;
  font-family: "Open Sans","HelveticaNeue","Helvetica Neue",sans-serif;
  color: #464646;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  max-width: 1100px;
  margin: 0 auto;
}
.content{
  padding: 0 10px;
}
@media ($tablet) {
  .content{
    padding: 0 30px;
  }
}
</style>
