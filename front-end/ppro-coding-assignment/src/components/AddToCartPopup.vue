<!-- /src/components/AddToCartPopup.vue -->

<template>
  <div class="popup">
    <!-- Close button with an "x" circle -->
    <span class="close-button" @click="closePopup">&#10006;</span>
    <h2>{{ product.name }}</h2>
    <p>Price: {{ product.price }}</p>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" v-model="quantity" min="1" />
    <button @click="addToCart">Add to Cart</button>
    <button @click="closePopup">Close</button>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
    addToCart: {
      type: Function,
      required: true,
    },
    closePopup: {
      type: Function,
      required: true,
    },
  },
  data() {
    return {
      quantity: 1,
    };
  },
};
</script>

<style scoped>
/* Styling for the entire popup container */
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  z-index: 1000;
}

/* Styling for the close button */
.popup .close-button {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 1.5rem;
  cursor: pointer;
  color: #888;
}

/* Styling for the product name */
.popup h2 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

/* Styling for the product details */
.popup p {
  font-size: 1rem;
  margin-bottom: 15px;
}

/* Styling for the quantity input */
.popup label {
  display: block;
  margin-bottom: 5px;
}

.popup input {
  width: 50px;
  padding: 5px;
  margin-bottom: 15px;
}

/* Styling for the buttons */
.popup button {
  padding: 10px 15px;
  margin-right: 10px;
  cursor: pointer;
  border: none;
  border-radius: 4px;
  color: #fff;
}

.popup button:nth-child(1) {
  background-color: #007bff; /* Blue color */
}

.popup button:nth-child(2) {
  background-color: #dc3545; /* Red color */
}
</style>
