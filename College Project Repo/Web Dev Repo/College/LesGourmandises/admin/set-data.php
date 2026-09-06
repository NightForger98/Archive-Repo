<?php
// Database connection settings
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$database = "hara";        // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cat = 64; // New category ID
$price = 0; // Default price

// Data to insert into product_list
$data = [
    [$cat, 'تشيكن برغر', $price],
    [$cat, 'بايكون برغر', $price],
    [$cat, 'تشيز برغر', $price],
    [$cat, 'موزاريلا برغر', $price],
    [$cat, 'كلاسيك برغر', $price],
    [$cat, 'تشيكن تشيز برغر كومبو', $price],
    [$cat, 'تشيكن برغر كومبو', $price],
    [$cat, 'تشيز برغر كومبو', $price],
    [$cat, 'تشيكن تشيز برغر', $price],
];

// Insert data into product_list
foreach ($data as $dat) {
    // Extract values from the row
    $category_id = $conn->real_escape_string($dat[0]);
    $name = $conn->real_escape_string($dat[1]);
    $price = $conn->real_escape_string($dat[2]);

    // Check if the name already exists
    $check_sql = "SELECT COUNT(*) as count FROM `product_list` WHERE name = '$name'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Skipped inserting '$name': already exists in the table.<br>";
        continue; // Skip this iteration if the name exists
    }

    // Insert into the table if the name doesn't exist
    $sql = "INSERT INTO `product_list` (category_id, name, price) VALUES ('$category_id', '$name', '$price')";
    if (!$conn->query($sql)) {
        echo "Error inserting '$name': " . $conn->error . "<br>";
    } else {
        echo "Inserted '$name' successfully!<br>";
    }
}

echo "Process completed!";

// Close the connection
$conn->close();
?>