<template>
  <div>
    <MyCart :cart="cart" @checkout="checkout" />
  </div>
</template>

<script>
import MyCart from "@/components/MyCart.vue";

export default {
  data() {
    return {
      cart: [],
    };
  },
  methods: {
    checkout() {
      // Perform checkout logic
      alert("Checkout completed!");
    },
  },
  components: {
    MyCart,
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
</style>
