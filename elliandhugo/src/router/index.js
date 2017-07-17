import Vue from 'vue'
import Router from 'vue-router'
import Content from '@/components/Content'
import Item from '@/components/Item'
import About from '@/components/About'
import BUJ from '@/components/BUJ'
import Izplatitajiem from '@/components/Izplatitajiem'
import Vision from '@/components/Vision'
import Blog from '@/components/Blogi'
import Blogs from '@/components/Blogs'
import AllCollections from '@/components/AllCollections'
import Custom from '@/components/Custom'
import Press from '@/components/Press'
import Login from '@/components/Login'
import Header from '@/components/Header'
import FooterLinks from '@/components/FooterLinks'
import HeaderAd from '@/components/HeaderAd'
import ItemAd from '@/components/ItemAd'
import FooterAd from '@/components/FooterAd'
import NotFound from '@/components/404'
import Pub from '@/components/Publish'

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
      path: '/item/:id',
      name: 'Item',
      components: {
        default: Item,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/item/',
      name: 'Item2',
      components: {
        default: Content,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/about/',
      name: 'About',
      components: {
        default: About,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/buj/',
      name: 'BUJ',
      components: {
        default: BUJ,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/misija-vizija/',
      name: 'Vision',
      components: {
        default: Vision,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/blogs/:id',
      name: 'Blogs',
      components: {
        default: Blogs,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/blogs/',
      name: 'Blog',
      components: {
        default: Blog,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/izplatitajiem/',
      name: 'Izplatitajiem',
      components: {
        default: Izplatitajiem,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/collections/:collection',
      name: 'AllCollections',
      components: {
        default: AllCollections,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/custom/',
      name: 'Custom',
      components: {
        default: Custom,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/presei/',
      name: 'Press',
      components: {
        default: Press,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/publish/',
      name: 'Pub',
      components: {
        default: Pub,
        header: Header,
        footerLinks: FooterLinks
      }
    },
    {
      path: '/adlog/',
      name: 'Login',
      components: {
        default: Login,
        header: HeaderAd,
        footerLinks: FooterAd
      }
    },
    {
      path: '/adlog/item/:id',
      name: 'ItemAd',
      components: {
        default: ItemAd,
        header: HeaderAd,
        footerLinks: FooterAd
      }
    },
    {
      path: '*',
      name: 'Lost',
      component: NotFound
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    if (to.hash) {
      return {
        selector: to.hash
      }
    } else if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  }
})
