let store = {
    state: {
        loggedIn: true
    },
    setLogInTrue (val) {
        if(val) this.state.loggedIn = true
    },
    setLogInFalse (val) {
        if(val) this.state.loggedIn = false
    }
}

module.exports = { store : store }