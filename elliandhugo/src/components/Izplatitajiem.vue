<template lang="pug">
  .content
    .header
        h1.section-header-title Izplatītājiem
    .description
        h4 Lorem Ipsum
        p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut rutrum elit. Morbi at velit vitae neque bibendum efficitur. Sed ac aliquet lacus. Curabitur porta dui nec scelerisque sagittis. Cras ultrices finibus urna, eu laoreet nunc iaculis nec. Ut semper rutrum tristique. Morbi vehicula mi risus, dignissim cursus orci faucibus tempor. Duis consectetur at nulla quis hendrerit. Morbi dignissim, est quis volutpat lacinia, urna nisl fringilla metus, id lacinia nulla nunc at tortor. Mauris pulvinar mi sollicitudin purus placerat maximus. Fusce ornare ultricies dolor luctus tristique. Nullam suscipit, nunc et viverra laoreet, lectus metus commodo purus, ut viverra mi enim convallis elit.
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
