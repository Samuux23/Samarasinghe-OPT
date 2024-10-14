<?php
include 'connect.php';

$cuisine = isset($_GET['cuisine']) ? $_GET['cuisine'] : 'all';

$sql = "SELECT * FROM menu_items";
if ($cuisine != 'all') {
    $sql .= " WHERE cuisine='$cuisine'";
}

$result = $conn->query($sql);

$menuItems = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}
echo json_encode($menuItems);

$conn->close();
?>
