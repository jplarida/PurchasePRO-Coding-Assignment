<!-- /src/views/CatalogPage.vue -->

<template>
  <div>
    <CatalogList
      :products="products"
      :itemsPerRow="5"
      @add-to-cart="showAddToCartPopup"
    />
    <div v-if="loading">Loading...</div>
    <div v-if="error" class="error-message">{{ error }}</div>

    <!-- Add pagination component -->
    <pagination-control
      :current-page="currentPage"
      :total-pages="totalPages"
      @page-changed="fetchProducts"
    />

    <!-- Display the MyCart component -->
    <MyCart :cart="cart" />

    <!-- Add the AddToCartPopup component with v-if directive -->
    <AddToCartPopup
      v-if="showPopup"
      :product="selectedProduct"
      :add-to-cart="addToCart"
      :close-popup="closeAddToCartPopup"
    />
  </div>
</template>

<script>
import axios from "axios";
import { endpoints } from "@/config/apiConfig";
import PaginationControl from "@/components/PaginationControl.vue";
import MyCart from "@/components/MyCart.vue";
import AddToCartPopup from "@/components/AddToCartPopup.vue";
import CatalogList from "@/components/CatalogList.vue";

export default {
  data() {
    return {
      products: [],
      cart: [],
      loading: true,
      error: null,
      currentPage: 1,
      totalPages: 1,
      itemsPerPage: 25, // 5x5 grid, 25 items per page
      showPopup: false,
      selectedProduct: null,
      quantity: 1, // Added quantity property
    };
  },
  methods: {
    showAddToCartPopup(product) {
      // Show the popup when the user clicks "Add to Cart"
      this.showPopup = true;
      this.selectedProduct = product;
      this.quantity = 1; // Set default quantity to 1
    },
    closeAddToCartPopup() {
      // Close the popup
      this.showPopup = false;
      this.selectedProduct = null;
    },
    addToCart() {
      // Check if the product is already in the cart
      const existingProductIndex = this.cart.findIndex(
        (item) => item.id === this.selectedProduct.id
      );

      if (existingProductIndex !== -1) {
        // If the product is already in the cart, update its quantity
        this.cart[existingProductIndex].quantity += this.quantity;
      } else {
        // If the product is not in the cart, add it as a new item
        const productWithQuantity = {
          ...this.selectedProduct,
          quantity: this.quantity,
        };
        this.cart.push(productWithQuantity);
      }

      // Close the popup after adding to cart
      this.closeAddToCartPopup();
    },
    fetchProducts(page = 1) {
      this.loading = true;
      axios
        .get(`${endpoints.products}?page=${page}&per_page=${this.itemsPerPage}`)
        .then((response) => {
          this.products = response.data.products.data;
          this.currentPage = response.data.products.current_page;
          this.totalPages = response.data.products.last_page;
          this.loading = false;
        })
        .catch((error) => {
          console.error("Error fetching product list:", error);
          this.error = "Error fetching product list. Please try again.";
          this.loading = false;
        });
    },
  },
  components: {
    PaginationControl,
    MyCart,
    AddToCartPopup,
    CatalogList,
  },
  mounted() {
    this.fetchProducts();
  },
};
</script>

<style scoped>
/* Add your CSS styling here */
.error-message {
  color: red;
  margin-top: 10px;
}
</style>
