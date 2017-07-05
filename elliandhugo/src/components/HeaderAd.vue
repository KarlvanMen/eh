<template lang="pug">
  .header
    .home.section
      p Pārskats
    .add.section
      p Pievienot
    .logout.section
      p Izrakstīties
</template>

<script>
export default {
  name: 'HeaderAd'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.header{
  display: none;
  &.active{
    padding: 0 10px;
    display: flex;
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
      p{
        display: inline-block;
        width: 0;
        overflow: hidden;
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
}
</style>
