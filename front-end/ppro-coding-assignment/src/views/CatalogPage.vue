<!--front-end/ppro-coding-assignment/src/views/CatalogPage.vue-->
<template>
  <div>
    <Catalog :products="products" @add-to-cart="addToCart" />
    <div v-if="loading">Loading...</div>

    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>

<script>
import Catalog from "@/components/CatalogList.vue";
import axios from "axios";

const apiBaseUrl = "/api/catalog";
export default {
  data() {
    return {
      products: [],
      cart: [],
      loading: true, // Add a loading state
      error: null, // Add an error state
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
  mounted() {
    // Make an API request to fetch the product list from the backend
    console.log("Before axios request");
    axios
      .get(`${apiBaseUrl}/productList`)
      .then((response) => {
        // Set the fetched products to the component's data
        this.products = response.data.products;
        this.loading = false; // Set loading to false on successful response
      })
      .catch((error) => {
        console.error("Error fetching product list:", error);
        this.error = "Error fetching product list. Please try again."; // Set error message
        this.loading = false; // Set loading to false on error
      });
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
</style>
