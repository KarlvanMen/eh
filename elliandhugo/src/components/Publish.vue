<template>
    <div>
        <HeaderAd></HeaderAd>
        <div class="content" :class="{loading: loading}">
            <form v-on:submit="onSubmit" enctype="multipart/form-data">
                <h2>Nosaukums</h2>
                <input id='title' type="text" name="pied_title" placeholder=''/>
                <h2>Apraksts</h2>
                <textarea v-on:keyup="textAreaAdjust" id='desc' name="pied_text" cols="1"></textarea>
                <h2>Kolekcijas</h2>
                <div class="collections">
                    <div class="collection" v-for="col in sortedArray">
                        <input type="checkbox" name="pied_kol[]" v-bind:value="col.title"/>
                        <div>{{col.title}}</div>
                    </div>
                    <div class="collection" v-for="col in new_collections">
                        <input type="checkbox" name="pied_kol[]" v-bind:value="col.title" checked='true'/>
                        <div>{{col.title}}</div>
                    </div>
                </div>
                <fieldset id="new_collection">
                    <input type="text" id="new_col_input" placeholder='' v-model="col"/>
                    <label for="options" id="collections-label" v-on:click="addCollection()">Pievienot jaunu kolekciju</label>
                </fieldset>              
                <h2>Bildes</h2>   
                <label for="images" class="images-label">Pievienot bildes</label> 
                <input type="file" id="images" value='Pievienot bildes' accept="image/*" multiple v-on:change="readUrl()">
                <p id="imageHolder"></p>    
                <h2>Opcijas</h2> 
                <fieldset id="options">
                    <div class="opt">
                        <p class="num">1)</p>
                        <input class='options options-name' type="text" name="pied_opt_name[]" placeholder=''/>
                        <input class='options' type="number" name="pied_opt_price[]" placeholder=''/>
                        <p>€</p>
                        <p class="delete hidden">X</p>
                    </div>
                </fieldset>
                <label for="options" id="options-label" v-on:click="addOpt()">Pievienot opcijas</label>
                <div class="finito-button">
                    <input type="submit" class="submit" value="Publicēt">
                    <input type="button" class="submit cancel" value="Atsaukt">
                </div>
            </form>
        </div>
        <FooterAd></FooterAd>
    </div>
</template>

<script>

import {mapGetters} from 'vuex'

import HeaderAd from './HeaderAd.vue'
import FooterAd from './FooterAd.vue'

export default {
  name: 'pub',
  data () {
    return {
        col: '',
        loading: false,
        collections: [
            {
                title: 'Kāzu dienai',
                check: false
            },
            {
                title: 'Pieņemšana',
                check: false
            },
            {
                title: 'Kūku dekori',
                check: false
            },
            {
                title: 'Dekori ziedu pušķiem',
                check: false
            },
            {
                title: 'Dekori',
                check: false
            },
            {
                title: 'Sienas dekori',
                check: false
            },
            {
                title: 'Foto rāmīši',
                check: false
            },
            {
                title: 'Dāvanas',
                check: false
            },
            {
                title: 'Kristībām',
                check: false
            },
            {
                title: 'Ziemassvētkiem',
                check: false
            },
            {
                title: 'Mīļotajam cilvēkam',
                check: false
            },
            {
                title: 'Kāzām',
                check: false
            },
            {
                title: 'Mājām',
                check: false
            },
            {
                title: 'Bērnistaba',
                check: false
            },
            {
                title: 'Foto albumi',
                check: false
            },
            {
                title: 'Atmiņu lādītes',
                check: false
            },
            {
                title: 'Bērnu metriņš',
                check: false
            },
            {
                title: 'Māju nosaukumu izkārtnes',
                check: false
            },
            {
                title: 'Sienas pakaramie',
                check: false
            },
            {
                title: 'Virtuvei',
                check: false
            },
            {
                title: 'Ādas telefonu aizsargpaneļi',
                check: false
            },
            {
                title: 'Grāmatzīmes',
                check: false
            },
            {
                title: 'Ādas aproces',
                check: false
            },
            {
                title: 'Paliktnīši',
                check: false
            },
            {
                title: 'Zobu fejai',
                check: false
            },
            {
                title: 'Specpasūtījumi',
                check: false
            },
            {
                title: 'Uzņēmumiem',
                check: false
            },
        ],
        new_collections: []
    }
  },
  components: {
    HeaderAd,
    FooterAd
  },
  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'getLoginInfo'
    ]),
    sortedArray: function() {
        function compare(a, b) {
            if (a.title.toUpperCase() < b.title.toUpperCase())
                return -1;
            if (a.title.toUpperCase() > b.title.toUpperCase())
                return 1;
            return 0;
        }

        return this.collections.sort(compare);
    }
  },
  methods: {
    readUrl: function () {
        let inp = document.querySelector("#images");
        if(inp.files && inp.files[0]){
            let placeholder = document.querySelector("#imageHolder");
            
            for(let i = 0; i < inp.files.length; i++){
                let reader = new FileReader()
                let temp = inp.files[i]
                let self = this
                reader.onload = function (e) {                      
                    let imgDiv = document.createElement("div")
                    let img = document.createElement("img")
                    let del = document.createElement("div")
                    imgDiv.classList.add("desc-img")
                    del.classList.add("delete")
                    del.innerHTML = "X"
                    del.onclick = function(){
                        let par = this.parentElement;
                        par.parentElement.removeChild(par)
                    }
                    img.src = e.target.result;
                    imgDiv.appendChild(img);
                    imgDiv.appendChild(del);
                    placeholder.appendChild(imgDiv)       
                } 
                temp.size < 2097152 && /\.(jpe?g|png|gif)$/i.test(temp.name) ? reader.readAsDataURL(temp) : this.displayInvalidImg(temp.name)
            }
        }
    },
    displayInvalidImg(name){
        let placeholder = document.querySelector("#imageHolder")
        let par = document.createElement("p")
        par.innerHTML = name + " ir pārāk liels fails un/vai nav bilde"
        placeholder.prepend(par)
    },
    addOpt: function () {
        let optHolder = document.querySelector("#options")
        let divHolder = document.createElement("div")
        divHolder.classList.add("opt")
        let numb = document.createElement("p")
        numb.classList.add("num")        
        numb.innerHTML = "" + (optHolder.childNodes.length + 1) + ")"
        let nameHolder = document.createElement("input")
        nameHolder.classList.add("options")
        nameHolder.classList.add("options-name")
        nameHolder.type = "text"
        nameHolder.name = "pied_opt_name[]"  
        let priceHolder = document.createElement("input")
        priceHolder.classList.add("options")
        priceHolder.type = "number"
        priceHolder.name = "pied_opt_price[]"
        let euro = document.createElement('p')
        euro.innerHTML = "€"
        let del = document.createElement('p')
        del.innerHTML = 'X'
        del.classList.add("delete")
        del.onclick = function(){
            let par = this.parentElement
            par.parentElement.removeChild(par)
            let allNumb = document.querySelectorAll(".num")
            for(let i = 0; i < allNumb.length; i++){
                allNumb[i].innerHTML = (i + 1) + ")"
            }
        }
        divHolder.appendChild(numb)
        divHolder.appendChild(nameHolder)
        divHolder.appendChild(priceHolder)
        divHolder.appendChild(euro)
        divHolder.appendChild(del)
        optHolder.appendChild(divHolder)
    },
    addCollection: function () {   
        if(this.col.length){  
            let self = this
            let comp = this.collections.some(function(el) {
                return el.title === self.col
            })
            if(!comp){
                this.new_collections.push({
                    title: this.col,
                    check: true
                })                
            } else {
                let col = document.querySelector(".collections").querySelectorAll(".collection")
                col.forEach(function(el){
                    if(el.lastChild.innerHTML === self.col){
                        el.firstChild.checked = true
                    }
                })
            }
            
            this.col = ''
        }
    },
    onSubmit: function (e) {
        e.preventDefault()
        this.checkfields()
        this.loading = true;
        let self = this;
        let form = e.target
        let inp = document.querySelector("#images")
        let imgApiURL = 'http://elliandhugo.lv/includes/upload-img.php'
        var apiURL = 'http://elliandhugo.lv/includes/create-new.php'
        let promises = []
        let images =[]

        for(let i = 0; i < inp.files.length; i++){
            let dataIMG = new FormData()

            dataIMG.append('img',inp.files[i])

            let p = self.$http.post(imgApiURL, dataIMG).then(function (response) {
                images.push(response.body.name)
                return(response.body.message)
            }, function (response) {
                return 0
            }) 

            promises.push(p)
        }
        Promise.all(promises).then( values => {
            let good = true
            values.forEach(val => {
                val ? false : good = false
            })
            if(good) {
                let data = new FormData(form)
                images.forEach(img => {
                    data.append('image[]', img)
                })
                self.$http.post(apiURL, data).then(function (response) {
                    console.log(response.body)                    
                    this.loading = false
                }, function (response) {
                    console.log('failed to load: ')
                    this.loading = false
                    console.log(response)
                })
            } else {
                this.loading = false                
            }
        })
    },
    checkfields() {
        let title = document.querySelector("#title")
        let desc = document.querySelector('#desc')
        let checkboxesHolder = document.querySelectorAll('.collection')
        document.querySelector('.collections').classList.add('error')
        checkboxesHolder.forEach(holder => {
            let box = holder.firstElementChild.checked
            box ? document.querySelector('.collections').classList.remove('error') : false
        })
        document.querySelector('.desc-img') ? document.querySelector('.images-label').classList.remove('error') : document.querySelector('.images-label').classList.add('error')
        let optionsTxt = document.querySelector('.options-name')
        let optionsNum = document.querySelectorAll('.options')[1]

        title.value==null || title.value=="" ? title.classList.add("error") : title.classList.remove("error")
        desc.value == '' ? desc.classList.add("error") : desc.classList.remove("error")
        optionsTxt.value==null || optionsTxt.value=="" && optionsNum.value==null || optionsNum.value==""  ? document.querySelector('#options').classList.add("error") : document.querySelector('#options').classList.remove("error")
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
<style >
h2{
    margin-bottom: 0;
}
small{
    margin: 0;
}
input[type="text" i],
input[type="number" i],
input[type="password" i],
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
.error {
    outline: 1px solid red;
}
.content.loading {
    background: #D3D3D3;
    pointer-events: none;
}
.content.loading form{
    opacity: 0.3;
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
form .collections{
    max-height: 80px;
    overflow-y: auto;
}
form .collections .collection{
    display: inline-block;
}
form .collections .collection input,
form .collections .collection div{
    display: inline-block;
}
#new_collection{
    margin-top: 1em;
}
.opt {
    display: flex;
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
    margin-left: 10px;
}
input[type="number" i].options,
input[type="text" i].options{
    display: inline-block;
    box-sizing: border-box;
    margin: 0 0.25em;
    flex: 1 1 auto;
}
input[type="number" i].options{
    text-align: right;
}
#images{
    visibility:hidden;
}
#collections-label, .images-label, #options-label{
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

@keyframes myAnimation{
from{
    opacity: 1;
    width: 100%;
}
to{
    display: none;
    opacity: 0;
    width: 0;
}
}

#imageHolder>p {
    width: 100%;
    animation-name: myAnimation;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    animation-delay: 2s;
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
    #collections-label, 
    #options-label{
        width: 32%;
        line-height: 3;
    }
    #new_collection>input{
        width: 32%;
        line-height: 2.4;
    }
    #imageHolder{
        padding-top: 10px;
    }
    #imageHolder>.desc-img {
        width: 32%;
    }
    input[type="text" i].options{
        max-width: 400px;
    }
    input[type="number" i].options{
        max-width: 200px;
    }
}
@media (min-width: 900px) {
    .images-label, 
    #collections-label,    
    #new_collection>input,
    #options-label{
        width: 24%;
    }
    #imageHolder>.desc-img {
        width: 24%;
    }
}
</style>
