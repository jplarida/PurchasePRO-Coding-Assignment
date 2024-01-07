<!-- /src/components/MyCart.vue -->

<template>
  <div>
    <h2>My Cart</h2>
    <div v-if="cart.length === 0">Your cart is empty.</div>
    <div v-else>
      <div v-for="item in cart" :key="item.id" class="cart-item">
        <div>
          {{ item.name }}
          <span class="quantity">Quantity: {{ item.quantity }}</span>
        </div>
        <div>
          <!-- Add other details about the product if needed -->
          <!-- For example, you can display the price, total, etc. -->
        </div>
      </div>
      <div>Total Items: {{ totalItems }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    cart: {
      type: Array,
      required: true,
    },
  },
  computed: {
    totalItems() {
      // Calculate the total number of items in the cart
      return this.cart.reduce((total, item) => total + item.quantity, 0);
    },
  },
};
</script>

<style scoped>
/* Add your CSS styling for the MyCart component */
.cart-item {
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 10px;
}

.quantity {
  margin-left: 10px;
  color: #666;
}
</style>
