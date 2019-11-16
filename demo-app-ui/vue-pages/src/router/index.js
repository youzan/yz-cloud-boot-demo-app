import Vue from 'vue';
import Router from 'vue-router';
import Youzan from '@/pages/Youzan';
Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Youzan',
      component: Youzan,
      meta: {
        title: '有赞云'
      }
    }
  ]
});
