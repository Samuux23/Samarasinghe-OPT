document.addEventListener("DOMContentLoaded", function () {
  var totalPrice = localStorage.getItem("totalPrice");
  var productTitles = JSON.parse(localStorage.getItem("productTitles"));
  // Check if total price exists in local storage
  if (totalPrice) {
    document.getElementById("total-price-display").innerText =
      "Total is Rs " + totalPrice;
    document.getElementById("total_price").value = totalPrice;
  }

  // Check if product titles exist in local storage
  if (productTitles) {
    document.getElementById("product_titles").value = productTitles.join(", ");
    document.getElementById("total-title-display").innerText +=
      "\nItem: " + productTitles.join(", ");
  }
});
