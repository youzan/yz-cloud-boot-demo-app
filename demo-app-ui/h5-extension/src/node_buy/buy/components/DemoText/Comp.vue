<template>
  <div>
    <van-cell-group>
      <van-cell title="这是另一个内部的小组件" />
    </van-cell-group>
  </div>
</template>

<script>
import { Cell, CellGroup } from 'vant';

export default {
  name: 'demo-text-comp',

  components: {
    [Cell.name]: Cell,
    [CellGroup.name]: CellGroup,
  }
};
</script>

<style scoped>
</style>
