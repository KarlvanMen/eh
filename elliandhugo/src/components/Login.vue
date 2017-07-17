<template lang="pug">
  .admin(v-if="getLoginInfo" v-bind:class="{ wider: getLoginInfo }")
    .products        
        .product(v-for="obj in misc")
           router-link(:to="{ name: 'ItemAd', params: { id: obj.id }}")
                .cover-img( v-bind:style="{ backgroundImage: 'url(' + obj.coverImg + ')' }" )
                .info
                  p {{obj.title}}
                  p.date Pievienošanas datums: {{obj.date}}
  .admin(v-else)
    .loginform
      form(v-on:submit="onSubmit")
        input(id="user" type="text" placeholder="Lietotājvārds..." name="username")
        input(id="pass" type="password" name="password")
        button Pierakstīties
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  name: 'Login',
  data () {
    return {
      misc: null
    }
  },
  mounted () {
    this.log = this.$store.state.loggedIn
    this.fetchData()    
  },
  computed: {    
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'getLoginInfo'
    ])
  },
  methods: {
    onSubmit: function (e) {
      e.preventDefault();
      let user = document.querySelector("#user").value
      let pass = document.querySelector("#pass").value
      this.fetchUser(user, pass)
    },
    fetchData: function () {
      var self = this
      var apiURL = 'http://elliandhugo.lv/test/test.php'

      this.$http.get(apiURL).then(function (response) {
        self.misc = JSON.parse(JSON.stringify(response.body))
      }, function (response) {
        console.log('failed to load: ')
        console.log(response)
      })
    },
    fetchUser: function (val, pass) {
      var self = this
      var apiURL = 'http://elliandhugo.lv/includes/login.php?uid=' + val + '&pass=' + pass
            // var apiURL = 'http://localhost:8099/elliandhugo/test.php'

      this.$http.get(apiURL).then( response => {
        let resp = JSON.parse(JSON.stringify(response.body))
        if (resp.success == 1){
          this.$store.commit('logIn');
          this.fetchData()
        } else {
          this.$store.commit('logOut');
        }
      }).catch( err => {
        console.log(err)
        store.commit('logOut');
      })
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import 'variables.scss';

.admin{
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 10px;
  box-sizing: border-box;
  max-width: 350px;
  margin: 0 auto;
  &.wider{
    max-width: none;
    .products{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      .product{
        padding: 0.5em 2em 0.5em 0;
        border-bottom: 3px solid #eaeaea;
      }
      .product>a{
        display: flex;
        .cover-img{
          min-height: 100px;
          min-width: 100px;
          margin-right: 0.5em;
          background-size: contain;
          background-position: center;
          background-repeat: no-repeat;
        }
        .info{
          p{
            margin: 0;
          }
        }
      }
    }
  }
}
button{
  background: #4c4c4c;
  color: #ffffff;
  border: none;
  line-height: 3;
  width: 80%;
  margin-left: 10%;
  margin-top: 1em;
  border-radius: 3px;
  font-size: 1em;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.loginform input{
  margin: 0.5em 0 0;
}

@media ($tablet) {
  .admin{
    &.wider{
      .products{
        .product{
          border-bottom: none;
        }
      }
    }
  }
}
</style>
