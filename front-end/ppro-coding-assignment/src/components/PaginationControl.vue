<template>
  <nav>
    <ul class="pagination">
      <li v-if="currentPage > 1" @click="changePage(currentPage - 1)">
        <a>&laquo;</a>
      </li>
      <li
        v-for="page in totalPages"
        :key="page"
        :class="{ active: page === currentPage }"
        @click="changePage(page)"
      >
        <a>{{ page }}</a>
      </li>
      <li v-if="currentPage < totalPages" @click="changePage(currentPage + 1)">
        <a>&raquo;</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    currentPage: {
      type: Number,
      required: true,
    },
    totalPages: {
      type: Number,
      required: true,
    },
  },
  methods: {
    changePage(page) {
      this.$emit("page-changed", page);
    },
  },
};
</script>

<style scoped>
/* Add your CSS styling for pagination here */
</style>
