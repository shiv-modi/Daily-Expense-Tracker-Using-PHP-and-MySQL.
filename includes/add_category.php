<?php
session_start();
include('database.php');

if (isset($_POST['add-category-submit'])) {
  $CategoryName = mysqli_real_escape_string($db, $_POST['category-name']);
  $Mode = ($_POST['mode'] === 'income') ? 'income' : 'expense'; // Default to expense
  $userId = $_SESSION['detsuid'];

  $stmt = $db->prepare("INSERT INTO tblcategory (CategoryName, Mode, UserId) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $CategoryName, $Mode, $userId);
  $result = $stmt->execute();

  if ($result) {
    echo "<script>alert('Category added successfully!');</script>";
    if ($Mode === 'income') {
      echo "<script>window.location.href = 'add-income.php';</script>";
    } else {
      echo "<script>window.location.href = 'add-expenses.php';</script>";
    }
    exit();
  } else {
    echo "Error: " . mysqli_error($db);
  }
}
?>
