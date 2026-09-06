<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Rental System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Movie Rental System</h1>

    <button id="load-movies">Load Movies</button>

    <h2>Movie List</h2>
    <table border="1" id="movie-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Release Year</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <h2>Add a New Movie</h2>
    <form id="add-movie-form">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Director: <input type="text" name="director" required></label><br>
        <label>Release Year: <input type="number" name="release_year" required></label><br>
        <button type="submit">Submit</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
