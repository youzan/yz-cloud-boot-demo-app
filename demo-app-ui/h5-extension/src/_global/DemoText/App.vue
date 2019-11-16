<template>
  <van-cell-group class="demo-text">
    <van-cell title="全局示例文本组件" />
  </van-cell-group>
</template>

<script>
import { Cell, CellGroup } from 'vant';

export default {
  name: 'global-demo-text',

  title: '全局示例文本组件',

  components: {
    [Cell.name]: Cell,
    [CellGroup.name]: CellGroup,
  }
};
</script>

<style scoped>
.demo-text {
  margin: 10px 0;
}
</style>
