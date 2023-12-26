<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/catalog">Catalog</router-link> |
    <router-link to="/my-cart">My Cart</router-link>
  </nav>
  <router-view />
</template>

<script>
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
    checkout() {
      // Perform checkout logic (e.g., send cart data to the backend)
      alert("Checkout completed!"); // Replace with actual checkout logic
    },
  },
  components: {},
};
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
