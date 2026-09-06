<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>
<body>
    <header>
        <h1>Student Management System</h1>
        <button id="logout">Logout</button>
    </header>
    <main>
        <label for="majorSelect">Select Major:</label>
        <select id="majorSelect">
            <option value="computer_science">Computer Science</option>
            <option value="engineering">Engineering</option>
            <option value="business">Business</option>
        </select>
        <table id="studentTable">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Academic Year</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </main>
    <script>
        document.getElementById('majorSelect').addEventListener('change', function() {
            var selectedMajor = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_students.php?major=' + selectedMajor, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var students = JSON.parse(xhr.responseText);
                    var tableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';
                    students.forEach(function(student) {
                        var row = document.createElement('tr');
                        var nameCell = document.createElement('td');
                        var yearCell = document.createElement('td');
                        nameCell.textContent = student.full_name;
                        yearCell.textContent = student.academic_year;
                        row.appendChild(nameCell);
                        row.appendChild(yearCell);
                        tableBody.appendChild(row);
                    });
                }
            };
            xhr.send();
        });

        document.getElementById('logout').addEventListener('click', function() {
            alert('Logging out...');
        });
    </script>
</body>
</html>

<?php
if (isset($_GET['major'])) {
    $students = array(
        'computer_science' => array(
            array('full_name' => 'Ahmad Ali', 'academic_year' => 'Sophomore'),
            array('full_name' => 'Sara Youssef', 'academic_year' => 'Junior')
        ),
        'engineering' => array(
            array('full_name' => 'Nabil Hassan', 'academic_year' => 'Senior'),
            array('full_name' => 'Layla Karim', 'academic_year' => 'Freshman')
        ),
        'business' => array(
            array('full_name' => 'Omar Naeem', 'academic_year' => 'Senior'),
            array('full_name' => 'Dalia Hani', 'academic_year' => 'Junior')
        )
    );

    $major = $_GET['major'];
    echo json_encode($students[$major]);
}
?>
