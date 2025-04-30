<?php
include '../config/db.php';
$total_rooms = 10;
$booked_rooms = [];
$result = $conn->query("SELECT DISTINCT room FROM students WHERE room IS NOT NULL");
while ($row = $result->fetch_assoc()) {
    $booked_rooms[] = $row['room'];
}
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Room Availability</h2>
<table border="1">
<tr><th>Room Number</th><th>Status</th></tr>
<?php
for ($i = 1; $i <= $total_rooms; $i++) {
    $room = "R$i";
    $status = in_array($room, $booked_rooms) ? "Booked" : "Available";
    $color = $status === "Booked" ? "red" : "green";
    echo "<tr><td>$room</td><td style='color: $color;'>$status</td></tr>";
}
?>
</table>