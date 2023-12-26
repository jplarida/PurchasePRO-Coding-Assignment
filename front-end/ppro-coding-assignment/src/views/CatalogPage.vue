<template>
  <div>
    <Catalog :products="products" @add-to-cart="addToCart" />
  </div>
</template>

<script>
import Catalog from "@/components/CatalogList.vue";

export default {
  data() {
    return {
      products: [
        { id: 1, name: "Product 1", description: "Description 1", price: 10 },
        { id: 2, name: "Product 2", description: "Description 2", price: 20 },
        // Add more products as needed
      ],
      cart: [],
    };
  },
  methods: {
    addToCart(product) {
      this.cart.push(product);
    },
  },
  components: {
    Catalog,
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
</style>
