<?php
include '../config/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $room = $_POST['room'];
    $sql = "INSERT INTO students (name, email, room) VALUES ('$name', '$email', '$room')";
    if ($conn->query($sql)) {
        echo "Student registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<link rel="stylesheet" href="../assets/style.css">
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="room" placeholder="Room Number" required><br>
    <input type="submit" value="Register">
</form>