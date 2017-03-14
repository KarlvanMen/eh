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
        .logo-container
    .header-desc
      .logo
        .logo-container
      .navigation
        .nav-title(v-for="(value, key) in nav" @mouseover="displayMore($event)" @mouseleave="displayLess($event)") 
          h4(v-bind:class="{ more: checkUnder(value) }" @mouseover.this="displayMore2($event)") {{key}}
          .nav-under-section
            h4(v-for="opt in value") {{opt}}
</template>

<script>
export default {
  name: 'header',
  data () {
    return {
      nav: {
        'Sākums': '',
        'Kāzas': [
          'pieņemšana',
          'mr. & mrs. zīmes',
          'galdiņu numuri',
          'nozīmes',
          'krēslu zīmes',
          'viesu grāmatas',
          'vecmeitu svinības',
          'kāzu dāvanas',
          'kūku dekori',
          'stāvošas zīmes',
          'personalizēts'
        ],
        'notikumi': [
          'kāzas',
          'fotografēšanās',
          'apģērbs',
          'vecmeitu svinības',
          'apraudzīšana',
          'dzimšanas dienas',
          'brīvdienas',
          'vairāk!'
        ],
        'dāvanas': [
          'pleca somas',
          'mājas dekori',
          'ierāmmējamā māksla',
          'spilvendrānas',
          'krekli',
          'krūzītes',
          'vairāk',
          'dāvanas zem 25€'
        ],
        'vairāk': [
          'par mums',
          'pielāgošana',
          'presei',
          'skatīt visus produktus'
        ]
      },
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
}
.header-mob{    
  .navigation{
    background-color: #fff8e2;
    .title{
      padding: 10px 20px;
      font-size: 1.2em;
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
        max-height: 1000px;   
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
  @media ($tablet) {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
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
          margin: 0.1em 0;
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

</style>
