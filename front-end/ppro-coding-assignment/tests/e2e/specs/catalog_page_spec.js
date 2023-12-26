// catalog_page_spec.js created with Cypress
//
// Start writing your Cypress tests below!
// If you're unfamiliar with how Cypress works,
// check out the link below and learn how to write your first test:
// https://on.cypress.io/writing-first-test
describe("Catalog Page", () => {
  it("displays a list of products", () => {
    cy.visit("/#/catalog");
    cy.get("li").should("have.length", 2); // Assuming there are two products in the catalog
  });

  it("adds a product to the cart", () => {
    cy.visit("/#/catalog");
    cy.get("li").first().click(); // Click on the first product
    cy.log("Clicked on the first product");
    cy.get("button").contains("Add to Cart").click();
    cy.log("Clicked on 'Add to Cart' button");
    cy.get("li").should("have.length", 1); // Check if the cart has one item
  });

  // Add more E2E tests as needed
});

describe("My Cart Page", () => {
  it("displays the added product in the cart", () => {
    cy.visit("/#/catalog");
    cy.get("li").first().click(); // Click on the first product
    cy.log("Clicked on the first product");
    cy.get("button").contains("Add to Cart").click();
    cy.log("Clicked on 'Add to Cart' button");
    cy.visit("/#/my-cart");
    cy.get("li").should("have.length", 1); // Check if the cart has one item
  });

  it("completes the checkout process", () => {
    cy.visit("/#/catalog");
    cy.get("li").first().click(); // Click on the first product
    cy.log("Clicked on the first product");
    cy.get("button").contains("Add to Cart").click();
    cy.log("Clicked on 'Add to Cart' button");
    cy.visit("/#/my-cart");
    cy.get("button").contains("Checkout").click();
    // Add assertions for the checkout process as needed
  });

  // Add more E2E tests as needed
});
