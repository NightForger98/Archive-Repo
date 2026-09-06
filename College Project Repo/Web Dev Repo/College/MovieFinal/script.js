$(document).ready(function () {
    // Load movies
    function loadMovies() {
        $.ajax({
            url: 'load_movies.php', // Backend script to fetch movies
            method: 'GET',
            success: function (response) {
                const tbody = $('#movie-table tbody');
                tbody.empty(); // Clear the table
                response.movies.forEach(movie => {
                    tbody.append(`
                        <tr>
                            <td>${movie.id}</td>
                            <td>${movie.title}</td>
                            <td>${movie.director}</td>
                            <td>${movie.release_year}</td>
                            <td>${movie.status}</td>
                            <td>
                                ${movie.status === 'Available' ? `<button class="rent-btn" data-id="${movie.id}">Rent</button>` : `<button class="return-btn" data-id="${movie.id}">Return</button>`}
                            </td>
                        </tr>
                    `);
                });
            }
        });
    }

    // Add movie
    $('#add-movie-form').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();
        $.ajax({
            url: 'add_movie.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    loadMovies(); // Refresh the movie list
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // Load movies on page load
    loadMovies();

    // Attach event listeners dynamically for Rent and Return buttons
    $('#movie-table').on('click', '.rent-btn', function () {
        const movieId = $(this).data('id');
        // Implement renting functionality (e.g., AJAX request)
        alert('Renting movie ID: ' + movieId);
    });

    $('#movie-table').on('click', '.return-btn', function () {
        const movieId = $(this).data('id');
        // Implement returning functionality (e.g., AJAX request)
        alert('Returning movie ID: ' + movieId);
    });
});
