<?php
include("connect.php");

// Handle Delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // Delete the product
    $deleteQuery = "DELETE FROM product WHERE ProductID = $delete_id";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Product deleted successfully!');</script>";
        echo "<script>window.location.href='uploadProduct.php';</script>"; // Reload the page
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Handle Edit
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    // Fetch existing product details
    $editQuery = "SELECT * FROM product WHERE ProductID = $edit_id";
    $editResult = $conn->query($editQuery);
    $product = $editResult->fetch_assoc(); // Fetch product data
}

// Handle Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";

    // If the user uploads a new image, process it
    if ($image != '') {
        $image = basename($image);
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        // Update query with image
        $updateQuery = "UPDATE product SET ProductImage='$image', ProductName='$name', Category='$category', Brand='$brand', ProductDes='$description', ProductPrice='$price' WHERE ProductID = $id";
    } else {
        // Update query without image (keep the old one)
        $updateQuery = "UPDATE product SET ProductName='$name', Category='$category', Brand='$brand', ProductDes='$description', ProductPrice='$price' WHERE ProductID = $id";
    }

    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Product updated successfully!');</script>";
        echo "<script>window.location.href='uploadProduct.php';</script>"; // Reload the page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Insert (Existing functionality for adding new products)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Check if image already exists in the database
    $imageCheckQuery = "SELECT * FROM product WHERE ProductImage = '$image'";
    $imageCheckResult = $conn->query($imageCheckQuery);

    if ($imageCheckResult->num_rows > 0) {
        echo "<script>alert('Image already exists. Please upload a different image.');</script>";
    } else {
        // Upload image to server
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert product into the database
            $insertQuery = "INSERT INTO product (ProductImage, ProductName, Category, Brand, ProductDes, ProductPrice) 
                            VALUES ('$image', '$name', '$category', '$brand', '$description', '$price')";
            
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('Product uploaded successfully!');</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manage</title>
    <link rel="stylesheet" href="uploadProduct.css">
     <!-- Box icons link -->
     <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

    <!-- Remix icon link -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
      rel="stylesheet"
    />

</head>
<body>

<header id="top">
    <img src="../img/samarasinghe logo.png" alt="" class="logo" />
    <nav>
        <ul class="nav_links">
        <li><a href="adminHome.php">Home</a></li>
          <li><a href="uploadProduct.php">Products</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="message.php">Messages</a></li>
          <li><a href="appointmentManage.php">Appointment</a></li>
          <li><a href="staff.php">Staff</a></li>
          <li><a href="customers.php">Customers</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
    <p>
    <a href="Addpics.php" class="cta"><button>Web Content</button></a>
        <a href="../loginUI.php" class="logout-icon"
          ><i class="bx bxs-user-minus"></i
        ></a>
      </p>
</header>

<div class="center-container">
    <form class="product-form" method="POST" enctype="multipart/form-data">
    <h2 style="margin-bottom: 20px;">PRODUCT MANAGEMENT</h2>
        <input type="hidden" name="id" value="<?php echo isset($product) ? $product['ProductID'] : ''; ?>">
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <?php if (isset($product)) { ?>
                <img src="uploads/<?php echo $product['ProductImage']; ?>" alt="Product Image" width="50">
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" required value="<?php echo isset($product) ? $product['ProductName'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select category</option>
                <option value="sunglasses" <?php if (isset($product) && $product['Category'] == 'sunglasses') echo 'selected'; ?>>Sunglasses</option>
                <option value="contact lenses" <?php if (isset($product) && $product['Category'] == 'contact lenses') echo 'selected'; ?>>Contact Lenses</option>
                <option value="spectacles" <?php if (isset($product) && $product['Category'] == 'spectacles') echo 'selected'; ?>>Spectacles (Frames)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" placeholder="Enter brand" required value="<?php echo isset($product) ? $product['Brand'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="3" placeholder="Enter description" required><?php echo isset($product) ? $product['ProductDes'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (LKR):</label>
            <input type="number" id="price" name="price" placeholder="Enter price" required value="<?php echo isset($product) ? $product['ProductPrice'] : ''; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="<?php echo isset($product) ? 'update' : 'submit'; ?>"><?php echo isset($product) ? 'Update' : 'Upload'; ?></button>
        </div>
    </form>
</div>

<!-- Display product table -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $retrieveQuery = "SELECT * FROM product";
        $result = $conn->query($retrieveQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ProductID']}</td>
                        <td><img src='uploads/{$row['ProductImage']}' alt='Product Image' width='50'></td>
                        <td>{$row['ProductName']}</td>
                        <td>{$row['Category']}</td>
                        <td>{$row['Brand']}</td>
                        <td>{$row['ProductDes']}</td>
                        <td>{$row['ProductPrice']} LKR</td>
                        <td><a href='uploadProduct.php?edit_id={$row['ProductID']}'>Edit</a></td>
                        <td><a href='uploadProduct.php?delete_id={$row['ProductID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No products found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>