import { mount } from "@vue/test-utils";
import CatalogPage from "@/views/CatalogPage.vue";

describe("CatalogPage.vue", () => {
  it("renders product names correctly", () => {
    const products = [
      { id: 1, name: "Product 1", description: "Description 1", price: 10 },
      { id: 2, name: "Product 2", description: "Description 2", price: 20 },
    ];

    const wrapper = mount(CatalogPage, {
      props: { products },
    });

    // Use findAll with a CSS selector to select the 'li' elements
    const productNames = wrapper.findAll("li").map((li) => li.text());
    expect(productNames).toEqual(["Product 1", "Product 2"]);
  });

  // Add more unit tests as needed
});
