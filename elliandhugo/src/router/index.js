import Vue from 'vue'
import Router from 'vue-router'
import Content from 'components/Content'
import Header from 'components/Header'
import FooterLinks from 'components/FooterLinks'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      components: {
        default: Content,
        header: Header,
        footerLinks: FooterLinks
      }
    }
  ]
})
