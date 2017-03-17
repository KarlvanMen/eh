import Vue from 'vue'
import Router from 'vue-router'
import Content from '@/components/Content'
import Header from '@/components/Header'
import FooterLinks from '@/components/FooterLinks'
import NotFound from '@/components/404'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Hello',
      components: {
        default: Content,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '*',
      name: 'Lost',
      component: NotFound
    }
  ]
})
