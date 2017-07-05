<template lang="pug">
 .content
    .header
        h1.section-header-title Visi produkti
    .products        
        .product(v-for="obj in misc")
            router-link(:to="{ name: 'Item', params: { id: obj.id }}")
                .cover-img( v-bind:style="{ backgroundImage: 'url(' + obj.coverImg + ')' }" )
                p {{obj.title}}
                p(v-html="price(obj.options)")
</template>

<script>
export default {
  name: 'allitems',
  data () {
    return {
      misc: null
    }
  },
  mounted: function () {
    this.fetchData()
  },
  methods: {
    fetchData: function () {
      var self = this
      var apiURL = 'http://elliandhugo.lv/test/test.php'
        //   var apiURL = 'http://localhost:8099/elliandhugo/test.php'

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
      price.forEach( obj => {
        if(obj.price < lowest) lowest = obj.price
      })
      price.forEach( obj => {
        if(obj.price !== lowest) only = false
      })
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
        h3{
            color: #91c0c2;
            margin-bottom: 0.5em;
            text-transform: uppercase;
        }
        p{
            display: none;
            font-size: 0.8em;
        }
    }
}
@media ($tablet) {
    .content{
        .section-title{
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            p{
                display: block;
            }
            h3, p {
                margin-bottom: 0;
            }
        }
        .products, .collections{
            .product, .collection{
                padding: 0;
                width: 24%;
                margin-right: 1.33%;
                &:nth-child(4n){
                    margin: 0;
                }
            }
            .collection{
                width: 25%;
                padding: 30px;
                margin: 0;
            }
        }
    }
}
</style>
