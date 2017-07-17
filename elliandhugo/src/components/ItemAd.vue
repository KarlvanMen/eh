<template lang="pug">
  .content
    form(v-on:submit="onSubmit" enctype="multipart/form-data")
      h2 Nosaukums
      input(id='title' type="text" name="pied_title" placeholder='' v-bind:value="single.title") 
      h2 Apraksts
      textarea(v-on:keyup="textAreaAdjust" id='desc' name="pied_title" cols="1" v-bind:value="single.description")
      h2 Tagi
      small 
        i Atdalīti ar ";"
      input(id='tags' type="text" name="pied_title" placeholder='')
      h2 Bildes
      label(for="images" class="images-label") Pievienot bildes
      input(type="file" name="pied_img[]" id="images" value='Pievienot bildes' accept="image/*" multiple v-on:change="readUrl()")
      #imageHolder
        .desc-img(v-for='image in single.img')
          img(v-bind:src='image')
          .delete(onclick="this.parentElement.parentElement.removeChild(this.parentElement)") X
      h2 Opcijas
      fieldset(id="options")
        .opt(v-for="opt, index in single.options")
          p.num {{index + 1}})
          input.options.options-name(type="text" name="pied_opt[][name]" placeholder='' v-bind:value="opt.name")
          input.options(type="number" name="pied_opt[][price]" placeholder='' v-bind:value="opt.price")
          p €
          p.delete(v-on:click="removeOpt(index)") X
      label(for="options" id="options-label" v-on:click="addOpt()") Pievienot opcijas
      .finito-button
        input(type="submit" class="submit" value="Publicēt")
        input(type="button" class="submit cancel" value="Atsaukt")
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
    },
    addOpt: function () {
        console.log("add option")
        this.single.options.push({ name: '', price: ''});
    },
    removeOpt: function (i) {
        console.log("remove option " + i)    
        this.single.options.splice(i, 1)
    },
    onSubmit: function (e) {
        e.preventDefault()
        let form = e.target
        let data = new FormData(form)
        for(var pair of data.entries()) {
            console.log(pair); 
        }
    },
    textAreaAdjust: function() {
        let o = document.querySelector("#desc")
        o.style.height = "1px"
        o.style.height = (3+o.scrollHeight)+"px"        
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

h2{
    margin-bottom: 0;
}
small{
    margin: 0;
}
input[type="text"],
input[type="number"],
input[type="password"],
textarea{
    width: 100%;
    margin: 0;
    color: #000000;
    border: 1px solid #666666;
    text-indent: 0.01px;
    padding: 8 10px;
    line-height: 1.4;
    border-radius: 3px;
    appearance: none;
    font-size: 16px;  
    font-family: inherit;  
    padding: 5px 10px;
    box-sizing: border-box;
}
input:focus, 
textarea:focus{
    outline: #aaaaaa solid thin;
}
fieldset{
    outline: none;
    border: none;
    padding: 0;
}
#desc{
    min-height: 80px;
    overflow: hidden;
}
.opt {
    display: flex;
    justify-content: center;
    margin-bottom: 5px;
}
.options-name{
    min-width: 150px;
}
.opt p{
    display: inline-block;
    flex: 0 0 auto;
    margin: 0;
}
.opt p.delete{
    color: white;
    font-weight: bold;
    background: rgba(100, 100, 100, 0.7);
    flex: 1 0 auto;
    width: 40px;
    text-align: center;
    border-radius: 3px;
    max-width: 100px;
}
input[type="number"].options,
input[type="text"].options{
    display: inline-block;
    box-sizing: border-box;
    margin: 0 0.25em;
    flex: 1 1 auto;
}
input[type="number"].options{
    text-align: right;
}
#images{
    visibility:hidden;
}
.images-label, #options-label{
    display: inline-block;
    border: 1px solid #666666;
    text-indent: 0.01px;
    width: 50%;
    line-height: 2;
    text-align: center;
    border-radius: 3px;
}
#options-label{
    margin-top: 10px;
}
#imageHolder{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0;
    align-items: flex-end;
}
#imageHolder>.desc-img{
    width: 49%;
    position: relative;
}
#imageHolder>.desc-img img{
    max-width: 100%;
    max-height: 150px;
    margin: 0 auto;
    display: block;
}
#imageHolder>.desc-img .delete{
    background: rgba(100, 100, 100, 0.7);
    width: 100%;
    color: white;
    font-weight: bold;
    line-height: 1.4;
    margin-bottom: 0.5em;
    text-align: center;
}
.hidden{
    opacity: 0;
}
.finito-button{
    display: flex;
    margin-top: 2em;
}
.submit{
    margin-left: auto;
    padding: 8px 10px;
    border-radius: 3px;
    background-color: transparent;
    border-color: #44a03d;
    color: #44a03d;
    font-size: 1em;
    border-style: solid;
    margin-top: 10px;
    margin-right: 1em;
}
.submit.cancel{
    border-color: #a03d3d;
    color: #a03d3d;
    margin-right: 0;
    margin-left: 0;
}

@media (min-width: 750px) {
    .images-label, 
    #options-label{
        width: 32%;
        line-height: 3;
    }
    #imageHolder{
        padding-top: 10px;
    }
    #imageHolder>.desc-img {
        width: 32%;
    }
    input[type="text"].options{
        max-width: 400px;
    }
    input[type="number"].options{
        max-width: 200px;
    }
}
@media (min-width: 900px) {
    .images-label, 
    #options-label{
        width: 24%;
    }
    #imageHolder>.desc-img {
        width: 24%;
    }
}
</style>
