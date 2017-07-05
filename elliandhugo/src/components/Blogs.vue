<template lang="pug">
  .content
    .header
        h1.section-header-title {{obj.title}}
    .description
        .blogs
            .blog                  
                p.date {{obj.date}}
                .text(v-html="obj.text") 
</template>

<script>
export default {
  name: 'Blog',
  data () {
    return {
      obj:{
          title: 'Loading ... ',
          date: '',
          text: '',
      },
      nav: [
          {
              title: 'Lorem Ipsum',
              date: '2018. gada 23. jūnijs',
              text: '<p>Lorem ipsum dolor sit amet, <B>consectetur adipiscing</b> elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero.</p><img class="image" src="https://scontent-arn2-1.xx.fbcdn.net/v/t1.0-9/13718602_1223584974343099_4567702301778247454_n.jpg?oh=315e7f8354756110845d856828173169&oe=59A1060F"><p>Nullam consectetur tincidunt massa scelerisque luctus.</p>',
              id: 4
          },
      ],
    }
  },
    mounted: function () {
        this.obj = this.nav[0];
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
@import 'variables.scss';

.section-header-title{
    border-bottom: 3px solid #eaeaea;
    .section-header-title{
        text-align: center;
    }
}
.description{
    .title{
        text-align: center;
    }
    .blogs{
        .blog{
            .title{
                text-align: left;
                color: dimgrey;
            }
            &> p{
                font-size: 0.8em;
            }
            
        }
    }
}
.description .blogs .blog .image {
    max-width: 100%;
    height: auto; 
    display: block;            
}
</style>
