<template lang="pug">
  .content
    .main-prod
      .cover-img( v-bind:style="{ 'background-image': 'url(' + single.coverImg + ')' }" )
      .prod-desc
        h1.prod-title {{single.title}}
        p.select-label {{label}}
        select(v-model="selected")
          option(v-for="opt, index in single.options" v-bind:value="opt.price") {{opt.name}}
        .price {{ selected }} €
    .item-images
      .item-img(v-for='img in single.img' v-on:click='changeCover(img)' v-bind:style="{ 'background-image': 'url(' + img + ')' }")
    .description
      h3.title Apraksts
      p {{single.description}}
    #share-buttons.title 
      h3 Dalies ar šo {{single.id}}
      .buttons 
        .butt
          a(v-bind:href="'https://www.facebook.com/sharer/sharer.php?u=http://elliandhugo.lv/item/'+single.id+'&display=popup&title='+titleNoAnd+'&description='+single.description+'&image='+single.coverImg" target="_blank")
            img(src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook")
        .butt
          a(v-bind:href="'https://twitter.com/share?url=http://elliandhugo.lv/item/'+single.id+'&amp;text='+titleNoAnd+'&amp;hashtags=elliandhugo'" target="_blank")
            img(src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter")
        .butt
          a(v-bind:href="'http://pinterest.com/pin/create/button/?url=http://elliandhugo.lv/item/'+single.id+'&description='+single.title+'&media=' + single.coverImg" target="_blank")
            img(src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest")
        .butt
          a(v-bind:href="'https://plus.google.com/share?url=http://elliandhugo.lv/item/'+single.id" target="_blank")
            img(src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google")
        .butt
          a(v-bind:href="'mailto:?Subject='+single.title+'&body=http://elliandhugo.lv/item/'+single.id")
            img(src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email")
    .more
      h3.title Līdzīgi produkti
      .product(v-for="obj in restPr")
          router-link(:to="{ name: 'Item', params: { id: obj.id }}")
              .cover-img( v-bind:style="{ backgroundImage: 'url(' + obj.coverImg + ')' }" )
              p {{obj.title}}
              p(v-html="price(obj.options)")

</template>

<script>
export default {
  name: 'item',
  data () {
    return {
      misc: null,
      single: '',
      selected: null,
      titleNoAnd: '',
      restPr: [],
      label: 'Krāsu izvēle'
    }
  },
  created () {
    this.fetchData()
  },
  watch: {
    // call again the method if the route changes
    '$route': 'fetchData'
  },
  methods: {
    fetchData: function () {
      var self = this
      var apiURL = 'http://elliandhugo.lv/test/test.php'
            // var apiURL = 'http://localhost:8099/elliandhugo/test.php'

      this.$http.get(apiURL).then( response => {
        self.misc = JSON.parse(JSON.stringify(response.body))
      }).then( () => {
        self.single = self.misc[this.$route.params.id]
        console.log(self.single)
        console.log(this.$route.params.id)
        self.selected = self.single.options[0].price
        self.titleNoAnd = self.single.title.replace("&", "and")
        let j = self.misc.length
        if(j > 9) j = 9
        this.restPr = []
        for(let i = 1; i < j; i++){
          this.restPr.push(self.misc[i])
        }
      }).catch( err => {
        console.log(err)
      })
    },
    changeCover: function (img) {
      let self = this
      self.single.coverImg = img
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

.cover-img{
    width: 100%;
    padding-bottom: 100%;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 1em;
}
.prod-title{
  line-height: 1.4;
  margin: 0 0 0.5em;
}
.select-label{
  font-weight: 700;
  font-size: 0.8em;
  margin-bottom: 2px;
}
select{
  appearance: none;
  background-position: right 10px center;
  width: 100%;
  margin: 0 0 1em;
  color: #333333;
  border: 1px solid #eaeaea;
  background-image: url('https://cdn.shopify.com/s/files/1/0187/0182/t/3/assets/ico-select.svg?1002661893710539421');
  background-repeat: no-repeat;
  background-color: #ffffff;
  text-indent: 0.01px;
  padding: 8px 10px;
  padding-right: 28px;
  line-height: 1.4;
  border-radius: 3px;
  option{
    color: #000000;
    background-color: #fffffff;
  }
}
.price{
  color: dimgrey;
  font-size: 1.9em;
  font-weight: 700;
}
.title{
  text-align: center;
  color: #91c0c2;
}
.item-images{
  margin-top: 2em;
  .item-img{
    display: inline-block;
    width: 33%;
    margin: 0;
    padding: 0;
    padding-bottom: 33%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
}
#share-buttons{
  img {
    width: 35px;
    padding: 5px;
    border: 0;
    box-shadow: 0;
    display: inline;
  }
}
.buttons{
  font-size: 16px;
  .butt{
    display: inline-block;
  }
}
.product{
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

@media ($tablet) {
  .main-prod{
    margin-top: 1em;
    display: flex;
    justify-content: space-between;
    .cover-img{
      width: 48%;
      padding-bottom: 48%;
    }
    .prod-desc{
      width: 48%;      
    }
  }
  .item-images{
    width: 48%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    .item-img{
      width: 31%;
      padding-bottom: 31%;
    }
  }
  .description{
    .title{
      text-align: left;
    }
  }  
  .title{
    text-align: left;
  }
  #share-buttons{
    .buttons{
      .butt:not(:first-of-type){
        margin-left: 16px;
      }
    }
  }
  .more{
    .product{
      width: 25%;
      p{
        margin-bottom: 0;
      }
    }
  }
}
</style>
