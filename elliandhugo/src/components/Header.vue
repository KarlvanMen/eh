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
                router-link(:to="{ name: subj.name, params: {collection: subj.params }}") {{subj.title}}
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
          title: 'Kāzu dienai',
          name: 'AllCollections',
          params: 'kazudienai',
          under: [
            {
              title: 'pieņemšana',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Kūku dekori',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Dekori ziedu pušķiem',
              name: 'AllCollections',
              params: 'kazas',
            },
          ]
        },
        {
          title: 'Dekori',
          name: 'AllCollections',
          params: 'kazudienai',
          under: [
            {
              title: 'Kūku dekori',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Sienas dekori',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Dekori ziedu pušķiem',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Foto rāmīši',
              name: 'AllCollections',
              params: 'kazas',
            },
          ]
        },
        {
          title: 'Dāvanas',
          name: 'AllCollections',
          params: 'kazudienai',
          under: [
            {
              title: 'Kristībām',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Ziemassvētkiem',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Mīļotajam cilvēkam',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Kāzām',
              name: 'AllCollections',
              params: 'kazas',
            },
          ]
        },
        {
          title: 'Mājām',
          name: 'AllCollections',
          params: 'kazudienai',
          under: [
            {
              title: 'Bērnistaba',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Foto albumi',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Atmiņu lādītes',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Bērnu metriņš',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Māju nosaukumu izkārtnes',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Sienas pakaramie',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Virtuvei',
              name: 'AllCollections',
              params: 'kazas',
            },
          ]
        },
        {
          title: 'Citi',
          name: 'AllCollections',
          params: 'kazudienai',
          under: [
            {
              title: 'Ādas telefonu aizsargpaneļi',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Grāmatzīmes',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Ādas aproces',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Paliktnīši',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Zobu fejai',
              name: 'AllCollections',
              params: 'kazas',
            },
            {
              title: 'Specpasūtījumi',
              name: 'AllCollections',
              params: 'kazas',
            },
          ]
        },
        {
          title: 'Uzņēmumiem',
          name: 'AllCollections',
          params: 'kazudienai'
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
