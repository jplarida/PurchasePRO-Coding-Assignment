<!-- /src/components/CatalogList.vue -->

<template>
  <div class="catalog-list">
    <div
      v-for="(row, rowIndex) in productRows"
      :key="rowIndex"
      class="catalog-row"
    >
      <div
        v-for="product in row"
        :key="`${rowIndex}-${product.id}`"
        class="catalog-item"
        @click="addToCartPopup(product)"
      >
        <!-- Display your product content here -->
        {{ product.name }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    products: {
      type: Array,
      required: true,
    },
    itemsPerRow: {
      type: Number,
      default: 5,
    },
  },
  computed: {
    productRows() {
      return this.chunkArray(this.products, this.itemsPerRow);
    },
  },
  methods: {
    chunkArray(array, size) {
      const chunkedArray = [];
      for (let i = 0; i < array.length; i += size) {
        chunkedArray.push(array.slice(i, i + size));
      }
      return chunkedArray;
    },
    addToCartPopup(product) {
      // Emit an 'add-to-cart' event with the selected product
      this.$emit("add-to-cart", product);
    },
  },
};
</script>

<style scoped>
/* Add your CSS styling for the grid layout */
.catalog-list {
  display: flex;
  flex-wrap: wrap;
}

.catalog-row {
  display: flex;
  width: 100%;
}

.catalog-item {
  width: calc(
    100% / 5
  ); /* Adjust the width based on the number of items per row */
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #ddd; /* Add border for separation */
  margin: 5px;
  cursor: pointer; /* Add cursor style to indicate clickable */
}
</style>
