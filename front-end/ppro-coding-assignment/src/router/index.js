import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import CatalogPage from "../views/CatalogPage.vue";
import MyCart from "../views/MyCartPage.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/catalog",
    name: "Catalog List",
    component: CatalogPage,
  },
  {
    path: "/my-cart",
    name: "My Cart",
    component: MyCart,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
