<template lang="pug">
  .links
    .section(v-for="(section, index) in nav" v-bind:class="['section-' + index]")
        h4 {{section.title}}
        .undersection(v-if='section.icon' class="social")
          a(v-for="icon in section.content" v-bind:href="icon.link" target="_blank") 
            i.fa(:class="['fa-' + icon.title]" aria-hidden="false")
        .undersection(v-else)
          .link(v-for="sub in section.content")
            router-link(:to="{path: sub.link}") {{sub.title}}
    .copyright
        p Copyright © 2017, Elli&Hugo
</template>

<script>
export default {

  name: 'links',
  data () {
    return {
      nav: [
        {
          title: 'Saites',
          icon: false,
          content: [
            {
              title: 'par mums',
              link: '/about'
            },
            {
              title: 'biežāk uzdotie jautājumi',
              link: '/buj'
            },
            {
              title: 'vīzija un misija',
              link: '/misija-vizija'
            },
            {
              title: 'lasītava',
              link: '/blogs'
            },
            {
              title: 'izplatītājiem',
              link: '/izplatitajiem'
            }
          ]
        },
        {
          title: 'sociālās vietnes',
          icon: true,
          content: [
            {
              title: 'facebook',
              link: 'https://www.facebook.com/elliandhugo/?fref=ts'
            },
            {
              title: 'instagram',
              link: 'https://www.instagram.com/elliandhugo/'
            },
            {
              title: 'pinterest',
              link: 'https://www.pinterest.com/dacemortukane/elli-hugo/'
            }
          ]
        },
        {
          title: 'kontakti',
          icon: false,
          content: [
            {
              title: 'Mūsu e-pasts'
            },
            {
              title: 'piemers@epasts.eu',
              link: 'mailto:piemers@epasts.eu',
              target: '_top'
            },
            {
              title: 'Vaicā pēc pielāgotajām kāzu paketēm'
            },
            {
              title: ' '
            },
            {
              title: 'Mēs esam etsy'
            },
            {
              title: 'www.elliandhugo.etsy.com',
              link: 'https://www.etsy.com/shop/elliandhugo?ref=pr_shop_more'
            }
          ]
        }
      ]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.links{
  text-align:center;
  padding-bottom: 50px;
  .section{
    h4{
      color: #91c0c2;
      text-transform: uppercase;
    }
    a{
      display: inline-block;
      text-transform: uppercase;
      font-size: 0.8em;
      text-decoration: none;
      color: inherit;
    }
    .social{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .fa{
      color: #fbd219;
      font-size: 2em;
      text-align: center;
      margin: 0 0.5em;
    }
    &.section-2{
      a{
        text-transform: initial;
      }
    }
  }
  .copyright{
    display: block;
    width: 100%;
    font-size: 0.8em;
    text-align: center;
  }
}
@media ($tablet){
  .links{
    display: flex;
    flex-wrap: wrap;   
    text-align: left; 
    padding: 0 30px;
    .section{
      width: 33%;
      a{
        padding: .33em 0;
      }
      &.section-1{
        .social{
          justify-content: flex-start;
          a{            
            margin-right: 15px;
          }
          .fa{
            margin: 0;
          }
        }
      }
    }
  }
}
</style>
