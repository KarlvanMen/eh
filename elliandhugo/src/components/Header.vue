<template lang="pug">
  .header
    .header-mob
      .navigation 
        .title(v-on:click='toggleMenu') Izvēlne
        .nav-items(v-bind:class="{ shown: menu }")
          .nav-title(v-for="(value, key) in nav" v-on:click='showChildren($event)')
            h4(v-bind:class="{ more: checkUnder(value) }") {{key}}
            .nav-under-section
              h4.nav-under(v-for="opt in value") {{opt}}
      .logo        
        router-link.logo-container(tag="div" to="/")
    .header-desc
      .logo
        router-link.logo-container(tag="div" to="/")
      .navigation
        .nav-title(v-for="section in nav" @mouseover="displayMore($event)" @mouseleave="displayLess($event)") 
          h4(v-bind:class="{ more: checkUnder(section.under) }" @mouseover.this="displayMore2($event)") 
            router-link(:to="{ name: section.name, params: {collection: section.params }}" @mouseover.this="displayMore3($event)") {{section.title}}          
            .nav-under-section
              h4(v-for="subj in section.under") 
                router-link(:to="{ name: subj.name, params: {collection: subj.url }}") {{subj.title}}
</template>

<script>
export default {
  name: 'header',
  data () {
    return {
      nav: [
        {
          title: 'Sākums',
          name: 'Hello',
          params: '',
          under: false
        },
        {
          title: 'Kāzas',
          name: 'AllCollections',
          params: 'kazas',
          under: [
            {
              title: 'pieņemšana',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'mr. & mrs. zīmes',
              name: 'AllCollections',
              params: 'mrmrszimes',
            },
            {
              title: 'galdiņu numuri',
              name: 'AllCollections',
              params: 'galdinunumuri',
            },
            {
              title: 'nozīmes',
              name: 'AllCollections',
              params: 'nozimes',
            },
            {
              title: 'krēslu zīmes',
              name: 'AllCollections',
              params: 'kresluzimes',
            },
            {
              title: 'viesu grāmatas',
              name: 'AllCollections',
              params: 'viesugramatas',
            },
            {
              title: 'vecmeitu svinības',
              name: 'AllCollections',
              params: 'vecmeitusvinibas',
            },
            {
              title: 'kāzu dāvanas',
              name: 'AllCollections',
              params: 'kazudavanas',
            },
            {
              title: 'kūku dekori',
              name: 'AllCollections',
              params: 'kukudekori',
            },
            {
              title: 'stāvošas zīmes',
              name: 'AllCollections',
              params: 'stavosaszimes',
            },
            {
              title: 'personalizēts',
              name: 'AllCollections',
              params: 'personalizets',
            }
          ]
        },
        {
          title: 'notikumi',
          name: 'AllCollections',
          params: 'notikumi',
          under: [
            {
              title: 'kāzas',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'fotografēšanās',
              name: 'AllCollections',
              params: 'fotografesanas',
            },
            {
              title: 'apģērbs',
              name: 'AllCollections',
              params: 'apgerbs',
            },
            {
              title: 'vecmeitu svinības',
              name: 'AllCollections',
              params: 'vecmeitusvinibas',
            },
            {
              title: 'apraudzīšana',
              name: 'AllCollections',
              params: 'apraudzisana',
            },
            {
              title: 'dzimšanas dienas',
              name: 'AllCollections',
              params: 'dzimsanasdienas',
            },
            {
              title: 'brīvdienas',
              name: 'AllCollections',
              params: 'brivdienas',
            },
            {
              title: 'vairāk!',
              name: 'AllCollections',
              params: 'all',
            }
          ]
        },
        {
          title: 'dāvanas',
          name: 'AllCollections',
          params: 'davanas',
          under: [
            {
              title: 'pleca somas',
              name: 'AllCollections',
              params: 'plecasomas',
            },
            {
              title: 'mājas dekori',
              name: 'AllCollections',
              params: 'majasdekori',
            },
            {
              title: 'ierāmmējamā māksla',
              name: 'AllCollections',
              params: 'ieramejamamaksla',
            },
            {
              title: 'spilvendrānas',
              name: 'AllCollections',
              params: 'spilvendranas',
            },
            {
              title: 'krekli',
              name: 'AllCollections',
              params: 'krekli',
            },
            {
              title: 'krūzītes',
              name: 'AllCollections',
              params: 'kruzites',
            },
            {
              title: 'vairāk',
              name: 'AllCollections',
              params: 'all',
            },
            {
              title: 'dāvanas zem 25€',
              name: 'AllCollections',
              params: 'zem25',
            }
          ]
        },
        {
          title: 'vairāk',
          name: 'AllCollections',
          params: 'all',
          under: [
            {
              title: 'par mums',
              name: 'About',
              params: ''
            },
            {
              title: 'pielāgošana',
              name: 'Custom',
              params: ''
            },
            {
              title: 'Publikācijas',
              name: 'Press',
              params: ''
            },
            {
              title: 'skatīt visus produktus',
              name: 'AllCollections',
              params: 'allitems'
            }
          ]
        },
      ],
      menu: false
    }
  },
  methods: {
    checkUnder: function (test) {
      if (test) {
        return true
      }
      return false
    },
    toggleMenu: function () {
      this.menu = !this.menu
    },
    showChildren: function (event) {
      let tempParent = event.target.parentElement
      let temp = tempParent.querySelector('.nav-under-section')
      if (temp.classList.length < 2) {
        tempParent.classList.add('minus')
        temp.classList.add('show')
      } else {
        tempParent.classList.remove('minus')
        temp.classList.remove('show')
      }
    },
    displayMore: function (event) {
      let tempParent = event.target
      tempParent.classList.add('showMore')
    },
    displayMore2: function (event) {
      let tempParent = event.target.parentElement
      tempParent.classList.add('showMore')
    },
    displayMore3: function (event) {
      let tempParent = event.target.parentElement.parentElement
      tempParent.classList.add('showMore')
    },
    displayLess: function (event) {
      let tempParent = event.target
      tempParent.classList.remove('showMore')
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';
.header{
  color: #939393;
}
h4{
  font-weight: normal;
  text-transform: uppercase;
}
.logo-container{
  width: 100%;
  padding-bottom: 56.25%;
  background-color: #fbd219;
  background-image:url(../assets/logo.svg);
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  cursor: pointer;
}
.header-mob{    
  .navigation{
    background-color: #fff8e2;
    .title{
      padding: 10px 20px;
      font-weight: bold;
      &:before{
        content: '';
        padding: 10px;
        margin-right: 0.25em;
        background-image: url(../assets/burger.svg);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
      }
    } 
    .nav-items{
      transition: $transition-time;
      transition-timing-function: ease-in-out;
      max-height: 0;
      overflow: hidden;
      .nav-title{
        border-top: 1px solid #939393;
        border-color: rgba(147,147,147,0.2);
        &:last-of-type{
          padding-bottom: 0.01em;
        }
        &.minus{
          h4{
            &.more{
              &:after{
                content: '-';
              }
            }
          }
        }
        h4{
          padding: 0 20px;
          text-transform: uppercase;
          font-weight: bold;
          letter-spacing: 1px;
          &.more{
            &:after{
              content: '+';
              font-size: 1.25em;
              font-weight: normal;
              margin-left: 0.25em;
            }
          }
        }
        .nav-under-section{
          overflow: hidden;
          max-height: 0;
          transition: $transition-time;
          background: #fff;
          &.show{
            max-height: 999px;
          }
          .nav-under{
            border-top: 1px solid #939393;
            border-color: rgba(147,147,147,0.2);
            margin: 0;
            padding: 1.33em 20px;
            color: #000;
          }
        }
      }
      &.shown{  
        transition-timing-function: ease-out;
        max-height: 10000px;   
        .nav-title{
          h4{
            margin: 1.33em 0;
          }
        }
      }
    }
  }  
  .logo{
    display: block;
    margin: 40px auto;
    width: 100%;
    max-width: 250px; 
  }
  @media ($tablet) {
    display: none;
  }
}
.header-desc{
  display: none;
  padding: 20px 10px;
  .logo{
    width: 200px;
  }
  .navigation{
    display: flex;
    .nav-title{
      margin-left: 2em;
      color: #000;
      position: relative;
      h4{
        cursor: pointer;
        &.more{
          position: relative;
          padding-right: 1em;
          &:after{
            content: '';
            position: absolute;
            right: 0;
            bottom: 0.3em;
            width: 1em;
            height: 0.5em;
            background-image: url(../assets/download.svg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
          }
        }
      }
      .nav-under-section{
        position: absolute;
        right: 0;
        width: auto;
        max-height: 0;
        overflow: hidden;
        h4{
          white-space: nowrap;
          background: #fff;
          margin: 0;
          padding: .5em 1em;
        }
      }
      &.showMore{
        .nav-under-section{
          max-height: 10000px;
        }
      }
    }
  }
}

@media ($tablet) {
  .header-desc{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 30px;
    .navigation{
      margin-left: auto;
      .nav-title{        
        h4{
          &.more{
            &:after{
              bottom: 0.6em;
            }
          }
        }
        &.showMore{
          .nav-under-section{
            max-height: 610px;
            h4{
              margin: -1px 0 0;
            }
          }
        }
      }
    }
  }
}

</style>
