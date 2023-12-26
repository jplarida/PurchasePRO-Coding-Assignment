<template>
  <div>
    <h2>Your Cart</h2>
    <ul>
      <li v-for="item in cart" :key="item.id">{{ item.name }}</li>
    </ul>
    <button @click="checkout">Checkout</button>
  </div>
</template>

<script>
export default {
  props: {
    cart: Array,
  },
  methods: {
    checkout() {
      this.$emit("checkout");
    },
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
</style>
