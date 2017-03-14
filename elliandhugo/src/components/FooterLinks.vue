<template lang="pug">
  .links
        .section(v-for="(value, key) in nav")
            h4 {{key}}
            a(v-for="(link, key2) in value") {{link}}
</template>

<script>
export default {
  name: 'links',
  data () {
    return {
      nav: {
        'Saites': [
          'par mums',
          'biežāk uzdotie jautājumi',
          'vīzija un misija',
          'domnīca',
          'izplatītājiem'
        ],
        'sociālās vietnes': [
          'facebook',
          'instagram',
          'pinterest'
        ],
        'kontakti': [
          'Elli & Hugo',
          'Mūsu e-pasts:',
          'piemers@epasts.eu',
          'vaicā pēc pielāgotajām kāzu paketēm',
          ' ',
          'Mēs esam etsy',
          'www.elliandhugo.etsy.com'
        ]
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.links{
  .section{
    h4{
      color: #91c0c2;
      text-transform: uppercase;
    }
    a{
      display: block;
      text-transform: uppercase;
    }
  }
}
</style>
