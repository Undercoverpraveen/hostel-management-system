<?php
include '../config/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $room_number = $_POST['room_number'];
    $sql = "UPDATE students SET room = '$room_number' WHERE id = $student_id";
    if ($conn->query($sql)) {
        echo "Room booked successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<link rel="stylesheet" href="../assets/style.css">
<form method="POST">
    <input type="number" name="student_id" placeholder="Student ID" required><br>
    <input type="text" name="room_number" placeholder="Room Number" required><br>
    <input type="submit" value="Book Room">
</form>