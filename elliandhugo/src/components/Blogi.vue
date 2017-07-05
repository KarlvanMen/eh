<template lang="pug">
  .content
    .header
        h1.section-header-title Lasītava
    .description
        .blogs
            .blog(v-for="entry in nav")
                router-link(:to="{ name: 'Blogs', params: { id: entry.id }}")
                    h3.title {{entry.title}}                    
                    p.date {{entry.date}}
                    p.summary {{entry.summary}}
                    p Lasīt tālāk →
</template>

<script>
export default {
  name: 'Blog',
  data () {
    return {
      
      nav: [
          {
              title: 'Lorem Ipsum',
              date: '2018. gada 23. jūnijs',
              summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero. Nullam consectetur tincidunt massa scelerisque luctus.',
              id: 4
          },
          {
              title: 'Lorem Ipsum',
              date: '2017. gada 23. jūnijs',
              summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero. Nullam consectetur tincidunt massa scelerisque luctus.',
              id: 3
          },
          {
              title: 'Lorem Ipsum',
              date: '2016. gada 23. jūnijs',
              summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero. Nullam consectetur tincidunt massa scelerisque luctus.',
              id: 2
          },
          {
              title: 'Lorem Ipsum',
              date: '2015. gada 23. jūnijs',
              summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero. Nullam consectetur tincidunt massa scelerisque luctus.',
              id: 1
          },
          {
              title: 'Lorem Ipsum',
              date: '2014. gada 23. jūnijs',
              summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, mollis blandit volutpat nec, commodo vitae libero. Nullam consectetur tincidunt massa scelerisque luctus.',
              id: 0
          },
      ]
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
    .blogs{
        .blog{
            .title{
                text-align: left;
                color: dimgrey;
            }
            p{
                font-size: 0.8em;
            }
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
