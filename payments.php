<?php
include '../config/db.php';
$sql = "SELECT s.name, p.amount, p.paid_on FROM payments p JOIN students s ON p.student_id = s.id";
$result = $conn->query($sql);
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Payment Records</h2>
<table border="1">
    <tr>
        <th>Student Name</th>
        <th>Amount</th>
        <th>Date Paid</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['paid_on'] ?></td>
    </tr>
    <?php } ?>
</table>