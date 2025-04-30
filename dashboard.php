<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include '../config/db.php';
$total_students = $conn->query("SELECT COUNT(*) AS total FROM students")->fetch_assoc()['total'];
$total_payments = $conn->query("SELECT SUM(amount) AS total FROM payments")->fetch_assoc()['total'];
$rooms_booked = $conn->query("SELECT COUNT(DISTINCT room) AS total FROM students WHERE room IS NOT NULL")->fetch_assoc()['total'];
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Admin Dashboard</h2>
<p>Welcome, <?= $_SESSION['admin'] ?> | <a href="../logout.php">Logout</a></p>
<ul>
    <li>Total Registered Students: <strong><?= $total_students ?></strong></li>
    <li>Total Amount Collected: <strong>$<?= number_format($total_payments, 2) ?></strong></li>
    <li>Rooms Booked: <strong><?= $rooms_booked ?></strong></li>
</ul>
<h3>Quick Links</h3>
<ul>
    <li><a href="payments.php">View Payments</a></li>
    <li><a href="../student/register.php">Register Student</a></li>
    <li><a href="../student/book_room.php">Book Room</a></li>
    <li><a href="room_availability.php">Room Availability</a></li>
</ul>