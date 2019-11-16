<template>
  <div class="hello">
    <img src="https://img.yzcdn.cn/youzanyun/favicon.ico" alt="有赞云">
    <p>
      有赞云
    </p>
    <a
      class="hello-link"
      href="https://www.youzan.com/"
      target="_blank"
      rel="noopener noreferrer"
    >
      <van-icon name="like" />有你!有赞!^_^
    </a>
  </div>
</template>

<script>
import { Icon } from 'vant';
export default {
  name: 'youzan',
  data () {
    return {
      msg: 'Welcome to My Vue.js App'
    };
  },
  components: {
    [Icon.name]: Icon,
  },
  created() {
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.hello {
  text-align: center;
  background-color: #F0FFFF;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-size: calc(10px + 2vmin);
  color: white;

  &-link {
    color: #61dafa;
    text-decoration: underline;
  }

  p {
    margin: 10px;
  }
}
</style>
