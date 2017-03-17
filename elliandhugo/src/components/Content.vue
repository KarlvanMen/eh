<template lang="pug">
  .content
    .section-title
        h4 Izlase
        p Skatīt visu piedāvājumu
    .products
        .product(v-for="obj in misc")
            .cover-img( v-bind:style="{ backgroundImage: 'url(' + obj.coverImg + ')' }" )
            p(v-for="obj in misc" ) {{obj.title}}
            p(v-html="price(obj.options)")
        .view-all Skatīt visu piedāvājumu
    .section-title
        h4 Kolekcijas
        p Skatīt visas kolekcijas
    .collections
        .collection(v-for="obj in misc")
            .cover-img( v-bind:style="{ backgroundImage: 'url(' + obj.coverImg + ')' }" )
            p(v-for="obj in misc" ) {{obj.title}}
        .view-all Skatīt visas kolekcijas
  </div>
</template>

<script>
export default {
  name: 'content',
  data () {
    return {
      misc: null
    }
  },
  created: function () {
    this.fetchData()
  },
  methods: {
    fetchData: function () {
      var self = this
      var apiURL = 'http://localhost/elliandhugo/test.php'
      this.$http.get(apiURL).then(function (response) {
        self.misc = JSON.parse(JSON.stringify(response.body))
      }, function (response) {
        console.log('failed to load: ')
        console.log(response)
      })
    },
    price: function (price) {
      let lowest = 99999
      let only = true
      for (var key in price) {
        if (lowest > price[key]) {
          lowest = price[key]
        }
      }
      for (var akey in price) {
        if (lowest !== price[akey]) {
          only = false
          break
        }
      }
      if (only) {
        return '<b>€' + lowest + '</b>'
      }
      return 'Sākot no <b>€' + lowest + '</b>'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.content{
    padding: 0 10px;
    .products, .collections{
        font-size: 0.8em;
        .product, .collection{
            display: inline-block;
            box-sizing: border-box;
            padding: 10px;
            width: 50%;
            .cover-img{
                width: 100%;
                padding-bottom: 100%;
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;
            }
        }
        .collection{
            padding: 30px;
            padding-bottom: 10px;
            p{
                padding-bottom: 20px;
                border-bottom: 2px solid #eaeaea;
            }
        }
        .view-all{
            text-align: center;
        }
    }
    .section-title {
        border-bottom: 3px solid #eaeaea;
        text-align: center;
        margin-bottom: 1.33em;
        margin-top: 2em;
        h4{
            color: #91c0c2;
            margin-bottom: 0.5em;
            text-transform: uppercase;
        }
        p{
            display: none;
        }
    }
}
@media ($tablet) {
    .content{
        .products, .collections{
            font-size: 1em;
            .product, .collection{
                padding: 0;
                width: 24%;
                margin-right: 1.33%;
                &:nth-child(4n){
                    margin: 0;
                }
            }
            .collection{
                width: 33.33%;
                padding: 30px;
            }
        }
    }
}
</style>
