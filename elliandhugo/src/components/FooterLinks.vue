<template lang="pug">
  .links
    .section(v-for="section in nav")
        h4 {{section.title}}
        .undersection(v-if='section.icon' class="social")
          a(v-for="icon in section.content") 
            i.fa(:class="['fa-' + icon.title]" aria-hidden="true")
        .undersection(v-else)
          a(v-for="sub in section.content") {{sub.title}}
    .copyright
        p Copyright © 2017, Elli&Hugo
</template>

<script>
import 'vue-awesome/icons'
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
              link: '#'
            },
            {
              title: 'biežāk uzdotie jautājumi',
              link: '#'
            },
            {
              title: 'vīzija un misija',
              link: '#'
            },
            {
              title: 'domnīca',
              link: '#'
            },
            {
              title: 'izplatītājiem',
              link: '#'
            }
          ]
        },
        {
          title: 'sociālās vietnes',
          icon: true,
          content: [
            {
              title: 'facebook',
              link: '#'
            },
            {
              title: 'instagram',
              link: '#'
            },
            {
              title: 'pinterest',
              link: '#'
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
              title: 'vaicā pēc pielāgotajām kāzu paketēm'
            },
            {
              title: ' '
            },
            {
              title: 'Mēs esam etsy'
            },
            {
              title: 'www.elliandhugo.etsy.com',
              link: 'www.elliandhugo.etsy.com'
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
      display: block;
      text-transform: uppercase;
      font-size: 0.8em;
    }
    .social{
      display: flex;
      flex-wrap: wrap;
    }
    .fa{
      color: #fbd219;
      height: 1em;
      width: 1em;
      font-size: 2em;
      text-align: center;
      margin-right: 0.25em;
    }
  }
  .copyright{
    display: block;
    width: 100%;
    font-size: 0.8em;
    text-align: center;
  }
  @media ($tablet){
    display: flex;
    flex-wrap: wrap;   
    text-align: left; 
    padding: 0 10px;
    .section{
      width: 50%;
      a{
        padding: .33em 0;
      }
    }
  }
}
</style>
