<template>
  <div>
    <van-cell-group class="demo-text">
      <van-cell title="示例文本组件" />
    </van-cell-group>
    <comp />
  </div>
</template>

<script>
import { Cell, CellGroup } from 'vant';
import Comp from './Comp';

export default {
  name: 'demo-text',

  title: '示例文本组件',

  components: {
    [Cell.name]: Cell,
    [CellGroup.name]: CellGroup,
    Comp,
  }
};
</script>

<style scoped>
.demo-text {
  margin: 10px 0;
}
</style>
