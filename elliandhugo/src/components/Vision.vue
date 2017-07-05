<template lang="pug">
  .content
    .header
        h1.section-header-title Vīzija un Misija
    .description
        h3.title Mūsu Misija
        p In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec in nisi ut orci ultrices aliquet.
        h3.title Mūsu Vīzija
        p Proin pulvinar tristique odio, quis maximus urna faucibus id. Cras sagittis felis posuere posuere efficitur. Fusce et dui ac sem porta facilisis sit amet venenatis nisi.
</template>

<script>
export default {
  name: 'Vision',
  data () {
    return {
      misc: null
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';

.header{
    .section-header-title{
        text-align: center;
    }
}
.description{
    .title{
        text-align: center;
    }
    .aboutphoto{
        height: 0;
        padding-bottom: 66.66%;
        background-image: url('https://scontent-arn2-1.xx.fbcdn.net/v/t1.0-9/13718602_1223584974343099_4567702301778247454_n.jpg?oh=315e7f8354756110845d856828173169&oe=59A1060F');
        background-size: cover;
        background-position: center;
    }
}
</style>
