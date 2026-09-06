<?php
// add_movie.php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'movie_rental');
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed.']));
}

// Retrieve form data
$title = $_POST['title'] ?? '';
$director = $_POST['director'] ?? '';
$release_year = $_POST['release_year'] ?? '';

if (empty($title) || empty($director) || empty($release_year)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Insert into the database
$sql = "INSERT INTO movies (title, director, release_year) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $title, $director, $release_year);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Movie added successfully.', 'movie' => [
        'id' => $conn->insert_id,
        'title' => $title,
        'director' => $director,
        'release_year' => $release_year,
        'status' => 'Available'
    ]]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add movie.']);
}

$stmt->close();
$conn->close();
?>
