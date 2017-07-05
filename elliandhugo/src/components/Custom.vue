<template lang="pug">
  .content
    .header
        h1.section-header-title Pielāgošana
    .description
        p <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit. Integer vulputate dolor sed ligula tempus, <b>in interdum ligula feugiat</b>. Aliquam nec est nec urna bibendum dictum. Aliquam urna urna, vestibulum eget sapien sed, finibus porta purus. Curabitur est urna, cursus sit amet tincidunt non, suscipit dictum elit. Pellentesque sapien enim, interdum vel tempus placerat, sodales eget ipsum. Integer cursus tortor dolor, eu hendrerit urna porttitor eget. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas facilisis ut ex quis luctus. Nunc libero dui, consectetur a tempus sit amet, eleifend vitae nisl. Suspendisse vitae fermentum arcu, eu pulvinar urna. Maecenas dui ligula, interdum sed dolor id, feugiat pulvinar dui. Fusce consequat maximus lacinia. Nullam finibus mauris arcu, in ultricies dolor feugiat vel. Pellentesque gravida metus vel risus condimentum posuere. Aenean risus quam, condimentum at bibendum fermentum, finibus id nunc. <b>Pellentesque volutpat sapien a augue convallis</b>, sit amet tincidunt felis pharetra.
        p 
            b Quisque dapibus quis nunc non hendrerit. 
        p 
            b Phasellus ante metus, sagittis id libero vitae, accumsan gravida orci. 
        p 
            b Nam sagittis consequat ullamcorper. Donec efficitur pulvinar neque in feugiat. 
        p 
            i
                b Mauris lacinia et dolor dignissim dictum. Praesent purus sapien, sagittis non vestibulum a, blandit et metus. 
        p Vivamus eu laoreet ligula, aliquet auctor nisl. Duis luctus rutrum aliquam. Phasellus sed auctor urna.
        p Aliquam consectetur tellus at mi tristique congue. Nunc quis sapien eu purus bibendum facilisis. Ut tellus tellus, tristique vel gravida nec, tristique id neque. Donec lorem massa, sollicitudin sit amet felis id, vestibulum suscipit arcu. Fusce ultrices sem eu ante tempor, ut facilisis libero pulvinar. Pellentesque imperdiet mi sit amet arcu lobortis, non pretium lectus pulvinar. Ut posuere neque sit amet urna sagittis malesuada. Proin non ipsum sed eros lobortis faucibus. Vivamus quis lobortis arcu. Suspendisse nec ipsum felis. Ut hendrerit ante nec arcu ultrices elementum.
        .aboutphoto
</template>

<script>
export default {
  name: 'item',
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
    .aboutphoto{
        height: 0;
        padding-bottom: 66.66%;
        background-image: url('https://scontent-arn2-1.xx.fbcdn.net/v/t1.0-9/13718602_1223584974343099_4567702301778247454_n.jpg?oh=315e7f8354756110845d856828173169&oe=59A1060F');
        background-size: cover;
        background-position: center;
    }
}
</style>
