<?php
// Database connection settings
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$database = "cscs_db";     // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cat = 1;
// Data to insert into category_list
$data = [
    ['زعتر'],
    ['معجنات'],
    ['قرص بيض'],
    ['عصير'],
    ['بيبسي'],
    ['عجين'],
    ['مشكل'],
    ['بيتزا'],
    ['فاملى'],
    ['جبنة'],
    ['لحمة وجبنة'],
    
     // Duplicate for testing
    // Add more products as needed
];

// Insert data into category_list
foreach ($data as $dat) {
    // Extract values from the row
    $name = $conn->real_escape_string($dat[0]);

    // Check if the name already exists
    $check_sql = "SELECT COUNT(*) as count FROM `category_list` WHERE name = '$name'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Skipped inserting '$name': already exists in the table.<br>";
        continue; // Skip this iteration if the name exists
    }

    // Insert into the table if the name doesn't exist
    $sql = "INSERT INTO `category_list` (name) VALUES ('$name')";
    if (!$conn->query($sql)) {
        echo "Error inserting data: " . $conn->error . "<br>";
    } else {
        echo "Inserted '$name' successfully!<br>";
    }
}

echo "Process completed!";

// Close the connection
$conn->close();
?>
