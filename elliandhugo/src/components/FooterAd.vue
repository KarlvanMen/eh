<template lang="pug">
  .footer
    small Ar mani atkal runā kaijas
</template>

<script>
export default {

  name: 'FooterAd'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.footer {
  text-align: center;
  font-style: italic;
  display: none;
  &.active{
    display: block;
  }
}
</style>
