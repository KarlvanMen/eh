<template>
    <div class="content">
        <form v-on:submit="onSubmit" enctype="multipart/form-data">
            <h2>Nosaukums</h2>
            <input id='title' type="text" name="pied_title" placeholder=''/>
            <h2>Apraksts</h2>
            <textarea v-on:keyup="textAreaAdjust" id='desc' name="pied_title" cols="1"></textarea>
            <h2>Tagi</h2>
            <small><i>Atdalīti ar ";"</i></small>
            <input id='tags' type="text" name="pied_title" placeholder=''/>
            <h2>Bildes</h2>   
            <label for="images" class="images-label">Pievienot bildes</label> 
            <input type="file" name="pied_img[]" id="images" value='Pievienot bildes' accept="image/*" multiple v-on:change="readUrl()">
            <p id="imageHolder"></p>    
            <h2>Opcijas</h2> 
            <fieldset id="options">
                <div class="opt">
                    <p class="num">1)</p>
                    <input class='options options-name' type="text" name="pied_opt[][name]" placeholder=''/>
                    <input class='options' type="number" name="pied_opt[][price]" placeholder=''/>
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
</template>

<script>


export default {
  name: 'pub',
  data () {
    return {
      misc: null
    }
  },
  methods: {
    readUrl: function () {
        let inp = document.querySelector("#images");
        if(inp.files && inp.files[0]){
            let placeholder = document.querySelector("#imageHolder");
            
            for(let i = 0; i < inp.files.length; i++){
                let reader = new FileReader()
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
                    placeholder.appendChild(imgDiv);
                }                
                reader.readAsDataURL(inp.files[i])
            }
        }
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
        nameHolder.name = "pied_opt[][name]"  
        let priceHolder = document.createElement("input")
        priceHolder.classList.add("options")
        priceHolder.type = "number"
        priceHolder.name = "pied_opt[][price]"
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
    input[type="text" i].options{
        max-width: 400px;
    }
    input[type="number" i].options{
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
