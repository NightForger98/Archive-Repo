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

$cat = 43;  // Example category id

// Path to the text file
$filePath = 'E:\moutajet\zaater.txt';

// Check if the file exists
if (file_exists($filePath)) {
    // Read the file into an array
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Split each line by comma or space (adjust based on your file's structure)
        $data = explode(",", $line);

        // Extract the values
        $name = trim($conn->real_escape_string($data[0])); // Escape to prevent SQL injection
        $price = trim($conn->real_escape_string($data[1]));

        // Check if the category exists in category_list
        $category_check_sql = "SELECT COUNT(*) as count FROM `category_list` WHERE id = '$cat'";
        $category_result = $conn->query($category_check_sql);

        // Check if the query was successful
        if ($category_result == false) {
            echo "Error checking category: " . $conn->error . "<br>";
            continue; // Skip this iteration if query fails
        }

        $category_row = $category_result->fetch_assoc();

        if ($category_row['count'] == 0) {
            echo "Category ID '$cat' does not exist. Skipping insert for '$name'.<br>";
            continue; // Skip this iteration if category doesn't exist
        }

        // Check if the name already exists in the product_list table
        $check_sql = "SELECT COUNT(*) as count FROM `product_list` WHERE name = '$name'";
        $result = $conn->query($check_sql);

        // Check if the query was successful
        if ($result === false) {
            echo "Error checking product: " . $conn->error . "<br>";
            continue; // Skip this iteration if query fails
        }

        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "Skipped inserting '$name': already exists in the table.<br>";
            continue; // Skip this iteration if the name exists
        }

        // Insert into the product_list table
        $sql = "INSERT INTO `product_list` (category_id, name, price) VALUES ('$cat', '$name', '$price')";
        if (!$conn->query($sql)) {
            echo "Error inserting '$name': " . $conn->error . "<br>";
        } else {
            echo "Inserted '$name' successfully!<br>";
        }
    }
} else {
    echo "File not found.";
}

echo "Process completed!";

// Close the connection
$conn->close();
?>
