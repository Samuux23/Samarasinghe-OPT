<?php
include("../connect.php"); 

// Handle home images
if(isset($_POST['submit'])){
    $slideNumber = $_POST['slideNumber'];

    // Loop through uploaded images
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        $fileName = $_FILES['image']['name'][$i];

        if ($_FILES['image']['error'][$i] != 4) {
            $tmpName = $_FILES['image']['tmp_name'][$i];
            $newImageName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            move_uploaded_file($tmpName, '../img/' . $newImageName);  // Save the file in the img folder

            // Insert new image
            $query = "INSERT INTO home_images (slide_number, image_name) VALUES ($slideNumber, '$newImageName')";
            if (!mysqli_query($conn, $query)) {
                echo "Error: " . mysqli_error($conn); 
            }
        }
    }
    echo "<script>alert('Slide images updated'); document.location.href = 'Addpics.php';</script>";
}

// delete request 
if(isset($_GET['delete_id'])){
    $deleteId = $_GET['delete_id'];
    $query = "SELECT * FROM home_images WHERE id=$deleteId";
    $result = mysqli_query($conn, $query);
    if($result && $row = mysqli_fetch_assoc($result)){
        // Delete the image file 
        $filePath = "../img/" . $row['image_name'];
        if(file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete  from the database
        $query = "DELETE FROM home_images WHERE id=$deleteId";
        if (!mysqli_query($conn, $query)) {
            echo "Error: " . mysqli_error($conn);  
        }
    }

    echo "<script>alert('Slide image deleted'); document.location.href = 'Addpics.php';</script>";
}

// Fetch all home slide images
$fetchQuery = "SELECT * FROM home_images";
$homeImages = mysqli_query($conn, $fetchQuery);


if (!$homeImages) {
    echo "Error fetching home images: " . mysqli_error($conn); 
}


$fetchServicesQuery = "SELECT * FROM services";
$services = mysqli_query($conn, $fetchServicesQuery);


if (!$services) {
    echo "Error fetching services: " . mysqli_error($conn);  
}
if (isset($_POST['add_location'])) {
    // Adding new location
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO locations (branch, address, phone) VALUES ('$branch', '$address', '$phone')";
    if (!mysqli_query($conn, $query)) {
        echo "Error adding location: " . mysqli_error($conn);
    } else {
        echo "<script>alert('Location added successfully');</script>";
    }
} elseif (isset($_POST['edit_location'])) {
    // Editing an existing location
    $location_id = $_POST['location_id'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = "UPDATE locations SET branch='$branch', address='$address', phone='$phone' WHERE id=$location_id";
    if (!mysqli_query($conn, $query)) {
        echo "Error updating location: " . mysqli_error($conn);
    } else {
        echo "<script>alert('Location updated successfully');</script>";
    }
} elseif (isset($_GET['delete_id'])) {
    // Deleting an existing location
    $location_id = $_GET['delete_id'];

    $query = "DELETE FROM locations WHERE id=$location_id";
    if (!mysqli_query($conn, $query)) {
        echo "Error deleting location: " . mysqli_error($conn);
    } else {
        echo "<script>alert('Location deleted successfully');</script>";
    }
}

// display all 
$fetchLocationsQuery = "SELECT * FROM locations";
$locations = mysqli_query($conn, $fetchLocationsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Home Slides & Services</title>
    <link rel="stylesheet" href="Addpics.css">
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

   
    <link rel="stylesheet" href="../style1.css" />
    <style>
       

body {
    font-family: 'Arial', sans-serif;
    background-color: #DCDCDC;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
}

h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
    text-align: left;
}

h1 {
    font-size: 36px;  
    font-weight: bold;  
    color: #333333;  
    margin-top: 20px;  
    margin-bottom: 20px;  
   
}


p {
    font-size: 16px;  
    line-height: 1.6;  
    color: #666666;  
    text-align: left;  
    margin-bottom: 15px;  
   
}

.nav_links li a {
    color: #8f242d; 
    font-weight: 500;
    font-size: 18px;
    transition: all 0.3s ease;
}

.nav_links li a:hover {
    color: #4d060c; 
}

.form-card {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

.form-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.form-group label {
    flex: 1;
    font-size: 16px;
    color: #333;
}

.form-group input, .form-group select, .form-group textarea {
    flex: 2;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
}

.form-group input:focus, .form-group select:focus, .form-group textarea:focus {
    outline: none;
    border-color: #007bff;
}

.upload-button {
    text-align: center;
    margin-top: 20px;
}

.upload-button button {
    width: 100%;
    max-width: 300px;
    padding: 15px;
    font-size: 18px;
    background-color: #a41e24;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.upload-button button:hover {
    background-color: #8a1920;
}

table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f7f7f7; 
    color: #555;
    font-weight: normal;
}

table td {
    background-color: #fafafa;
    color: #666;
}

table td img {
    width: 100px;
    height: auto;
    border-radius: 5px;
}

table tr:nth-child(even) {
    background-color: #fbfbfb;
}

table tr:hover {
    background-color: #f0f0f0;
}

.deletebtn {
    background-color: #8f242d; 
    color: white;
    border: none;
    padding: 9px 22px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.deletebtn:hover {
    background-color: #822a31;
    transition: all 0.3s ease;
}

.editbtn {
    background-color: rgb(63, 63, 63);
    color: white;
    border: none;
    padding: 9px 22px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.editbtn:hover {
    background-color: rgb(87, 87, 87);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .form-group {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-group label {
        margin-bottom: 5px;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
    }

    .upload-button button {
        width: 100%;
        font-size: 16px;
    }

    table th, table td {
        font-size: 14px;
    }

    table td img {
        width: 80px;
    }
}


        
    </style>
</head>
  <body>
    <header id="top"><a href="/home.php">
      <img src="../img/samarasinghe logo.png" alt="Samarasinghe Logo" class="logo" /></a>
      <nav>
        <ul class="nav_links">
          <li><a href="#top">Home</a></li>
        </ul>
      </nav>
      <p>
        <a href="admin.php" class="cta"><button>Admin</button></a>
       
      </p>

</header>
<h1>Edit Home Slides & Services</h1>


<div class="container">
<h2>Update Home Page Slides</h2>
<p>Upload new images for the homepage carousel. You can select the slide number and upload multiple images.</p>

    <div class="form-card">
        <form class="menue-form" method="POST" enctype="multipart/form-data">
            

            <div class="form-group">
                <label for="slideNumber">Select Slide:</label>
                <select name="slideNumber">
                    <option value="1">Slide 1</option>
                    <option value="2">Slide 2</option>
                    <option value="3">Slide 3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input id="choose" type="file" accept=".jpeg, .jpg, .png" name="image[]" multiple required>
            </div>

            <div class="upload-button">
                <button name="submit">Update Slides</button>
            </div>
        </form>
    </div>
    <h2>Current Home Page Slides</h2>
<p>Below are the existing images displayed on the home page. You can delete the images if needed.</p>

    <table>
        <thead>
            <tr>
                <th>Slide Number</th>
                <th>Current Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($homeImages)): ?>
                <tr>
                    <td><?php echo $row['slide_number']; ?></td>
                    <td><img src="../img/<?php echo $row['image_name']; ?>" alt="Slide Image"></td>
                    <td>
    <form action="Addpics.php?delete_id=<?php echo $row['id']; ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this image?')">
        <button type="submit" class="deletebtn">Delete</button>
    </form>
</td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <br><br><br><br><br><br>
    <h2>Add a New Service</h2>
<p>Use this form to add a new service to the website. You can add a service title, description, and image.</p>

    <div class="form-card">
        <form class="menue-form" method="POST" enctype="multipart/form-data">
            

            <div class="form-group">
                <label for="serviceTitle">Service Title:</label>
                <input type="text" name="serviceTitle" placeholder="Service Title" required>
            </div>

            <div class="form-group">
                <label for="serviceDescription">Service Description:</label>
                <textarea name="serviceDescription" rows="4" placeholder="Service Description" required></textarea>
            </div>

            <div class="form-group">
                <label for="service_image">Upload Image:</label>
                <input type="file" accept=".jpeg, .jpg, .png" name="service_image" required>
            </div>

            <div class="upload-button">
                <button name="service_submit">Add Service</button>
            </div>
        </form>
    </div>
    <h2>Existing Services</h2>
<p>Here are the services currently offered. You can edit or remove them as needed.</p>

    <table>
        <thead>
            <tr>
                <th>Service Title</th>
                <th>Service Description</th>
                <th>Service Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($service = mysqli_fetch_assoc($services)): ?>
                <tr>
                    <td><?php echo $service['service_title']; ?></td>
                    <td><?php echo $service['service_description']; ?></td>
                    <td><img src="../img/<?php echo $service['service_image']; ?>" alt="Service Image"></td>
                    <td>
    <form action="Addpics.php?delete_id=<?php echo $row['id']; ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this image?')">
        <button type="submit" class="deletebtn">Delete</button>
    </form>
</td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>
<div class="container">
    <h2>Manage Locations</h2>
    <p>Add, edit, or remove locations from the list below:</p>

    <!-- Form to add or edit a location -->
    <div class="form-card">
        <form method="POST" action="">
            <input type="hidden" name="location_id" id="location_id"> <!-- Hidden input for editing location -->

            <div class="form-group">
                <label for="branch">Branch Name:</label>
                <input type="text" name="branch" id="branch" placeholder="Branch Name" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" placeholder="Branch Address" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" placeholder="Contact Phone" required>
            </div>

            <div class="upload-button">
                <button type="submit" name="add_location" id="add_location_btn">Add Location</button>
                <button type="submit" name="edit_location" id="edit_location_btn" style="display:none;">Update Location</button>
            </div>
        </form>
    </div>

    <h2>Current Locations</h2>
    <p>Below are the existing locations. You can edit or delete them:</p>

    <!-- Table to display current locations -->
    <table>
        <thead>
            <tr>
                <th>Branch</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($locations)): ?>
                <tr>
                    <td><?php echo $row['branch']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                       

                        <!-- Delete Button -->
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="deletebtn" onclick="return confirm('Are you sure you want to delete this location?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- JavaScript to handle Edit button functionality -->
<script>
function editLocation(id, branch, address, phone) {
    // Fill form with selected location data for editing
    document.getElementById('location_id').value = id;
    document.getElementById('branch').value = branch;
    document.getElementById('address').value = address;
    document.getElementById('phone').value = phone;

    document.getElementById('add_location_btn').style.display = 'none';
    document.getElementById('edit_location_btn').style.display = 'inline-block';
}
</script>

</body>
</html>
