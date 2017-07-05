<template lang="pug">
  .login(v-if="log")
    .loginform
      form(v-on:submit="onSubmit")
        input(id="user" type="text" placeholder="Lietotājvārds..." name="username")
        input(id="pass" type="password" name="password")
        button Pierakstīties
</template>

<script>
export default {
  name: 'Login',
  data () {
    return {
      log: true,
      store: require('./store.js')
    }
  },
  mounted () {
    this.log = this.store.store.state.loggedIn
  },
  methods: {
    onSubmit: function (e) {
      e.preventDefault();
      let user = document.querySelector("#user").value
      let pass = document.querySelector("#pass").value
      this.fetchData(user, pass)
    },
    fetchData: function (val, pass) {
      var self = this
      var apiURL = 'http://elliandhugo.lv/includes/login.php?uid=' + val + '&pass=' + pass
            // var apiURL = 'http://localhost:8099/elliandhugo/test.php'

      this.$http.get(apiURL).then( response => {
        let resp = JSON.parse(JSON.stringify(response.body))
        if (resp.success == 1){
          self.log = false
          store.store.setLoginTrue(true);
        } 
      }).catch( err => {
        console.log(err)
        store.store.setLoginFalse(true);
      })
    },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.login{
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 10px;
  box-sizing: border-box;
  max-width: 350px;
  margin: 0 auto;
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
</style>
