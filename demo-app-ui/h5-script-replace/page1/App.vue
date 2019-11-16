<template>
  <div>
    这是一个测试
  </div>
</template>

<script>

import './style.scss';

export default {
  name: 'demo-text',

  title: '示例文本组件',

  props: [
    'env'
  ],
};
</script>

<style lang="scss">
  div{
    background: orange;
  }
</style>
