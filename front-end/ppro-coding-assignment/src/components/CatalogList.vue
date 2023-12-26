<template>
  <div>
    <h1>Ecommerce Product Catalog</h1>
    <div v-if="showProductList">
      <ul>
        <li
          v-for="product in products"
          :key="product.id"
          @click="showProductDetails(product)"
        >
          {{ product.name }}
        </li>
      </ul>
    </div>
    <div v-if="selectedProduct">
      <h2>{{ selectedProduct.name }}</h2>
      <p>{{ selectedProduct.description }}</p>
      <p>Price: ${{ selectedProduct.price }}</p>
      <button @click="addToCart">Add to Cart</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    products: Array,
  },
  data() {
    return {
      showProductList: true,
      selectedProduct: null,
    };
  },
  methods: {
    showProductDetails(product) {
      this.selectedProduct = product;
    },
    addToCart() {
      this.$emit("add-to-cart", this.selectedProduct);
      this.selectedProduct = null;
      this.showProductList = false;
    },
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
</style>
