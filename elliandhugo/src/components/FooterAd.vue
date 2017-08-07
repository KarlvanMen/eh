<template lang="pug">
  .footer
    small(v-if="joke" v-html="joke.joke")
</template>

<script>
export default {
  name: 'FooterAd',
  data () {
    return {
      joke: null,
      show: false
    }
  },
  methods: {
    get: function () {
      this.$http.get('https://api.icndb.com/jokes/random').then((response) => {
        this.joke = response.body.value
        console.log(this.joke.joke)
      }, (response) => {
        console.log(response)
      });
    }
  },
  mounted () {
    this.get()
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.footer {
  text-align: center;
  font-style: italic;
  &.active{
    display: block;
  }
}
</style>
