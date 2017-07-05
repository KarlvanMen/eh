<template lang="pug">
  .content
    .header
        h1.section-header-title Biežāk uzdotie jautājumi
    .description
        p.question
            i
                b Vai šādi izskatīsies jautājumi?
        p.answer
            <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit. Integer vulputate dolor sed ligula tempus, <b>in interdum ligula feugiat</b>.
        p.question
            b Vai šādi izskatīsies jautājumi?
        p Quisque dapibus quis nunc non hendrerit. 
        p Phasellus ante metus, sagittis id libero vitae, accumsan gravida orci. 
        p Nam sagittis consequat ullamcorper. Donec efficitur pulvinar neque in feugiat. 
        p.questionWithEffects
            i
                b Vai šādi izskatīsies jautājumi? 
        p Vivamus eu laoreet ligula, aliquet auctor nisl. Duis luctus rutrum aliquam. Phasellus sed auctor urna.
        p Aliquam consectetur tellus at mi tristique congue. Nunc quis sapien eu purus bibendum facilisis. Ut tellus tellus, tristique vel gravida nec, tristique id neque. Donec lorem massa, sollicitudin sit amet felis id, vestibulum suscipit arcu. Fusce ultrices sem eu ante tempor, ut facilisis libero pulvinar. Pellentesque imperdiet mi sit amet arcu lobortis, non pretium lectus pulvinar. Ut posuere neque sit amet urna sagittis malesuada. Proin non ipsum sed eros lobortis faucibus. Vivamus quis lobortis arcu. Suspendisse nec ipsum felis. Ut hendrerit ante nec arcu ultrices elementum.
        .aboutphoto
</template>

<script>
export default {
  name: 'buj',
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
    .questionWithEffects{
        display: inline-block;
        &:before{
            content: '';
            display: inline-block;
            width: 0.8em;
            height: 0.8em;
            background: #464646;
            border-radius: 50%;
            margin-right: 1em;
        }
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
