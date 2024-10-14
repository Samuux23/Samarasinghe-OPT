document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".sidebar .nav li a");
  const tableTitle = document.getElementById("table-title");
  const ordersTable = document.getElementById("orders-table");
  const usersTable = document.getElementById("users-table");
  const menuForm = document.getElementById("menu-form");
  const menuTable = document.getElementById("menu-table");
  const reservationsTable = document.getElementById("reservations-table");
  const offersForm = document.getElementById("offers-form");
  const messagesTable = document.getElementById("messages-table");
  const tableBody = document.getElementById("table-body");
  const usersTableBody = document.getElementById("users-table-body");
  const menuTableBody = document.getElementById("menu-table-body");
  const reservationsTableBody = document.getElementById(
    "reservations-table-body"
  );
  const messagesTableBody = document.getElementById("messages-table-body");
  const addMenuItemForm = document.getElementById("add-menu-item");
  const editOffersForm = document.getElementById("edit-offers-form");
  const logoutBtn = document.getElementById("logout-btn");
  const tableAvailabilityInput = document.getElementById("table-availability");
  const parkingAvailabilityInput = document.getElementById(
    "parking-availability"
  );
  const updateTableAvailabilityBtn = document.getElementById(
    "update-table-availability"
  );
  const updateParkingAvailabilityBtn = document.getElementById(
    "update-parking-availability"
  );

  // Event listener for the logout button
  logoutBtn.addEventListener("click", function () {
    const confirmLogout = confirm("Are you sure you want to log out?");
    if (confirmLogout) {
      window.location.href = "home.php";
    }
  });

  // Data for each section
  const data = {
    "orders-tab": {
      title: "Orders",
      columns: ["ID", "Name", "Email", "Order Details", "Total", "Order Date"],
      rows: [],
    },
    "users-tab": {
      title: "Users",
      columns: ["ID", "Name", "Email", "Address"],
      rows: [],
    },
    "menu-tab": {
      title: "Menu",
      columns: ["ID", "Title", "Price", "Cuisine", "Image"],
      rows: [],
    },
    "Reservation-tab": {
      title: "Reservations",
      columns: ["Reservation ID", "Number Of People", "Date", "Time", "Email"],
      rows: [],
    },
    "messages-tab": {
      title: "Messages",
      columns: ["Name", "Email", "Subject", "Message"],
      rows: [],
    },
  };

  // Fetch orders data from the server
  function fetchOrders() {
    fetch("fetch_orders.php")
      .then((response) => response.json())
      .then((orders) => {
        data["orders-tab"].rows = orders.map((order) => ({
          id: order.order_id,
          name: order.customerName,
          email: order.customerEmail,
          orderDetails: order.product_titles,
          total: order.total_price,
          orderDate: order.order_date,
          status: order.status || "Pending",
        }));
        populateOrdersTable(data["orders-tab"].rows);
      })
      .catch((error) => console.error("Error fetching orders:", error));
  }

  // Fetch users data from the server
  function fetchUsers() {
    fetch("fetch_users.php")
      .then((response) => response.json())
      .then((users) => {
        data["users-tab"].rows = users.map((user) => ({
          id: user.id,
          name: user.customerName,
          email: user.customerEmail,
          address: user.customerAddress,
        }));
        populateUsersTable(data["users-tab"].rows);
      })
      .catch((error) => console.error("Error fetching users:", error));
  }

  // Fetch menu items data from the server
  function fetchMenuItems(cuisine = "all") {
    fetch(`fetch_menu_items.php?cuisine=${cuisine}`)
      .then((response) => response.json())
      .then((menuItems) => {
        data["menu-tab"].rows = menuItems.map((item) => ({
          id: item.id,
          title: item.title,
          price: item.price,
          cuisine: item.cuisine,
          image: item.image,
        }));
        populateMenuTable(data["menu-tab"].rows);
      })
      .catch((error) => console.error("Error fetching menu items:", error));
  }

  // Fetch reservations data from the server
  function fetchReservations() {
    fetch("fetch_reservations.php")
      .then((response) => response.json())
      .then((reservations) => {
        data["Reservation-tab"].rows = reservations.map((reservation) => ({
          reservation_id: reservation.reservation_id,
          people: reservation.people,
          date: reservation.date,
          time: reservation.time,
          email: reservation.email,
        }));
        populateReservationsTable(data["Reservation-tab"].rows);
      })
      .catch((error) => console.error("Error fetching reservations:", error));
  }

  // Fetch messages data from the server
  function fetchMessages() {
    fetch("fetch_messages.php")
      .then((response) => response.json())
      .then((messages) => {
        populateMessagesTable(messages);
      })
      .catch((error) => console.error("Error fetching messages:", error));
  }

  // Fetch availability data from the server
  function fetchAvailability() {
    fetch("fetch_availability.php")
      .then((response) => response.json())
      .then((availability) => {
        availability.forEach((item) => {
          if (item.type === "tables") {
            tableAvailabilityInput.value = item.number;
          } else if (item.type === "parking") {
            parkingAvailabilityInput.value = item.number;
          }
        });
      })
      .catch((error) => console.error("Error fetching availability:", error));
  }

  // Handle clicking on any nav link
  navLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const tabId = event.target.id; // Get the id of the clicked link
      const tabData = data[tabId];
      if (tabData) {
        tableTitle.textContent = tabData.title; // Set the header title
        ordersTable.style.display = tabId === "orders-tab" ? "block" : "none";
        usersTable.style.display = tabId === "users-tab" ? "block" : "none";
        menuForm.style.display = tabId === "menu-tab" ? "block" : "none";
        menuTable.style.display = tabId === "menu-tab" ? "block" : "none";
        reservationsTable.style.display =
          tabId === "Reservation-tab" ? "block" : "none";
        offersForm.style.display = tabId === "offers-tab" ? "block" : "none";
        messagesTable.style.display =
          tabId === "messages-tab" ? "block" : "none";
        if (tabId === "orders-tab") {
          fetchOrders();
        } else if (tabId === "users-tab") {
          fetchUsers();
        } else if (tabId === "menu-tab") {
          fetchMenuItems();
        } else if (tabId === "Reservation-tab") {
          fetchReservations();
          fetchAvailability();
        } else if (tabId === "messages-tab") {
          fetchMessages();
        } else if (tabId === "offers-tab") {
          fetchOffersData();
        } else {
          populateTable(tabData.rows, tabData.columns);
        }
      } else if (tabId === "offers-tab") {
        tableTitle.textContent = "Offers";
        ordersTable.style.display = "none";
        usersTable.style.display = "none";
        menuForm.style.display = "none";
        menuTable.style.display = "none";
        reservationsTable.style.display = "none";
        offersForm.style.display = "block";
        messagesTable.style.display = "none";
        fetchOffersData();
      }
    });
  });

  // Update table availability
  updateTableAvailabilityBtn.addEventListener("click", function () {
    const newAvailability = tableAvailabilityInput.value;
    fetch(`update_availability.php?type=tables&number=${newAvailability}`, {
      method: "GET",
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.success) {
          alert("Table availability updated successfully");
        } else {
          console.error("Error updating table availability:", result.message);
        }
      })
      .catch((error) =>
        console.error("Error updating table availability:", error)
      );
  });

  // Update parking availability
  updateParkingAvailabilityBtn.addEventListener("click", function () {
    const newAvailability = parkingAvailabilityInput.value;
    fetch(`update_availability.php?type=parking&number=${newAvailability}`, {
      method: "GET",
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.success) {
          alert("Parking availability updated successfully");
        } else {
          console.error("Error updating parking availability:", result.message);
        }
      })
      .catch((error) =>
        console.error("Error updating parking availability:", error)
      );
  });

  // Populates the orders table with data
  function populateOrdersTable(rows) {
    const tableHead = document.getElementById("table-head");
    tableHead.innerHTML =
      "<tr>" +
      "<th>ID</th>" +
      "<th>Name</th>" +
      "<th>Email</th>" +
      "<th>Order Details</th>" +
      "<th>Total</th>" +
      "<th>Order Date</th>" +
      "<th>Approved</th>" +
      "<th>Status</th>" +
      "<th>Action</th>" +
      "</tr>";
    tableBody.innerHTML = rows
      .map((row) => {
        return (
          "<tr>" +
          `<td>${row.id}</td>` +
          `<td>${row.name}</td>` +
          `<td>${row.email}</td>` +
          `<td>${row.orderDetails}</td>` +
          `<td>${row.total}</td>` +
          `<td>${row.orderDate}</td>` +
          `<td><button class="approve-btn" data-id="${row.id}">Approve</button></td>` +
          `<td>${row.status}</td>` +
          `<td><button class="delete-btn" data-id="${row.id}">Delete</button></td>` +
          "</tr>"
        );
      })
      .join("");
  }

  // Populates the users table with data
  function populateUsersTable(rows) {
    usersTableBody.innerHTML = rows
      .map((row) => {
        return (
          "<tr>" +
          `<td>${row.id}</td>` +
          `<td>${row.name}</td>` +
          `<td>${row.email}</td>` +
          `<td>${row.address}</td>` +
          "</tr>"
        );
      })
      .join("");
  }

  // Populates the menu table with data
  function populateMenuTable(rows) {
    menuTableBody.innerHTML = rows
      .map((row) => {
        return (
          "<tr>" +
          `<td>${row.id}</td>` +
          `<td>${row.title}</td>` +
          `<td>${row.price}</td>` +
          `<td>${row.cuisine}</td>` +
          `<td><img src="${row.image}" alt="${row.title}" width="50" height="50"></td>` +
          `<td><button class="edit-btn" data-id="${row.id}" data-title="${row.title}" data-price="${row.price}" data-cuisine="${row.cuisine}">Edit</button> <button class="delete-btn" data-id="${row.id}" data-image="${row.image}">Delete</button></td>` +
          "</tr>"
        );
      })
      .join("");
  }

  // Populates the reservations table with data
  function populateReservationsTable(rows) {
    reservationsTableBody.innerHTML = rows
      .map((row) => {
        return (
          "<tr>" +
          `<td>${row.reservation_id}</td>` +
          `<td>${row.people}</td>` +
          `<td>${row.date}</td>` +
          `<td>${row.time}</td>` +
          `<td>${row.email}</td>` +
          `<td><button class="delete-btn" data-id="${row.reservation_id}">Delete</button></td>` +
          "</tr>"
        );
      })
      .join("");
  }

  // Populates the messages table with data
  function populateMessagesTable(rows) {
    messagesTableBody.innerHTML = rows
      .map((row) => {
        return (
          "<tr>" +
          `<td>${row.name}</td>` +
          `<td>${row.email}</td>` +
          `<td>${row.subject}</td>` +
          `<td>${row.message}</td>` +
          "</tr>"
        );
      })
      .join("");
  }

  // Add event listener for approve buttons in orders table
  tableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("approve-btn")) {
      const orderId = event.target.getAttribute("data-id");
      fetch(`approve_order.php?id=${orderId}`, { method: "GET" })
        .then((response) => response.json())
        .then((result) => {
          if (result.success) {
            fetchOrders(); // Refresh the orders table
          } else {
            console.error("Error approving order:", result.message);
          }
        })
        .catch((error) => console.error("Error approving order:", error));
    }
  });

  // Add event listener for delete buttons in orders table
  tableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-btn")) {
      const orderId = event.target.getAttribute("data-id");
      if (confirm("Do you want to delete the order?")) {
        fetch(`delete_order.php?id=${orderId}`, { method: "GET" })
          .then((response) => response.json())
          .then((result) => {
            if (result.success) {
              const row = event.target.closest("tr");
              row.remove();
              alert("Deleted successfully");
            } else {
              console.error("Error deleting order:", result.message);
            }
          })
          .catch((error) => console.error("Error deleting order:", error));
      }
    }
  });

  // Add event listener for delete buttons in menu table
  menuTableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-btn")) {
      const itemId = event.target.getAttribute("data-id");
      const itemImage = event.target.getAttribute("data-image");
      if (confirm("Do you want to delete the menu item?")) {
        fetch(`delete_menu_item.php?id=${itemId}&image=${itemImage}`, {
          method: "GET",
        })
          .then((response) => response.json())
          .then((result) => {
            if (result.success) {
              const row = event.target.closest("tr");
              row.remove();
              alert("Deleted successfully");
            } else {
              console.error("Error deleting menu item:", result.message);
            }
          })
          .catch((error) => console.error("Error deleting menu item:", error));
      }
    }
  });

  // Add event listener for delete buttons in reservations table
  reservationsTableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-btn")) {
      const reservationId = event.target.getAttribute("data-id");
      if (confirm("Do you want to delete the reservation?")) {
        fetch(`delete_reservation.php?id=${reservationId}`, { method: "GET" })
          .then((response) => response.json())
          .then((result) => {
            if (result.success) {
              const row = event.target.closest("tr");
              row.remove();
              alert("Deleted successfully");
            } else {
              console.error("Error deleting reservation:", result.message);
            }
          })
          .catch((error) =>
            console.error("Error deleting reservation:", error)
          );
      }
    }
  });

  // Add event listener for edit buttons in menu table
  menuTableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("edit-btn")) {
      const itemId = event.target.getAttribute("data-id");
      const itemTitle = event.target.getAttribute("data-title");
      const itemPrice = event.target.getAttribute("data-price");
      const itemCuisine = event.target.getAttribute("data-cuisine");

      // Set form values to the item being edited
      document.getElementById("title").value = itemTitle;
      document.getElementById("price").value = itemPrice;
      document.getElementById("cuisine").value = itemCuisine;

      // Add a hidden input to track the ID of the item being edited
      let hiddenIdInput = document.createElement("input");
      hiddenIdInput.type = "hidden";
      hiddenIdInput.id = "item-id";
      hiddenIdInput.name = "item-id";
      hiddenIdInput.value = itemId;
      addMenuItemForm.appendChild(hiddenIdInput);

      // Change the submit button text to "Update Item"
      addMenuItemForm.querySelector("button[type='submit']").textContent =
        "Update Item";
    }
  });

  // Add event listener for the menu form
  addMenuItemForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    let url = "add_menu_item.php";
    if (document.getElementById("item-id")) {
      url = "update_menu_item.php";
    }

    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.success) {
          alert("Menu item added/updated successfully");
          event.target.reset();
          fetchMenuItems(); // Refresh the menu table

          // Reset the form
          if (document.getElementById("item-id")) {
            document.getElementById("item-id").remove();
            addMenuItemForm.querySelector("button[type='submit']").textContent =
              "Add Item";
          }
        } else {
          alert("Error adding/updating menu item: " + result.message);
          console.error("Error adding/updating menu item:", result.message);
        }
      })
      .catch((error) => {
        alert("Error adding/updating menu item: " + error.message);
        console.error("Error adding/updating menu item:", error);
      });
  });

  // Add event listener for the offers form
  editOffersForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(editOffersForm);

    fetch("update_offers.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.success) {
          alert("Offers updated successfully");
        } else {
          console.error("Error updating offers:", result.message);
        }
      })
      .catch((error) => console.error("Error updating offers:", error));
  });

  function fetchOffersData() {
    fetch("fetch_offers.php")
      .then((response) => response.json())
      .then((data) => {
        document.getElementById("offer-title-1").value = data[0].title;
        document.getElementById("offer-desc-1").value = data[0].description;
        document.getElementById("offer-title-2").value = data[1].title;
        document.getElementById("offer-desc-2").value = data[1].description;
        document.getElementById("offer-title-3").value = data[2].title;
        document.getElementById("offer-desc-3").value = data[2].description;
      })
      .catch((error) => console.error("Error fetching offers data:", error));
  }

  // Initially populate with orders
  fetchOrders();
});
