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
body{
  margin: 0;
}
#app{
  font-size: 16px;
  line-height: 1.8;
  font-family: "Open Sans","HelveticaNeue","Helvetica Neue",sans-serif;
  color: #464646;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
}
</style>
