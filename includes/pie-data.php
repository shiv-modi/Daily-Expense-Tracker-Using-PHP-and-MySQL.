<?php
session_start();
$userid = $_SESSION['detsuid'];

// Connect to MySQL database
$db = mysqli_connect("localhost", "root", "", "expenditure");

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve total expense of each category
$query = "SELECT category, SUM(ExpenseCost) AS total_expense FROM tblexpense WHERE UserId = ? GROUP BY category";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "i", $userid); // Bind the user ID parameter to the statement
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Create an array to store the results
$data = array();

// Loop through the results and add them to the array
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = array(
    'category' => $row['category'],
    'total_expense' => $row['total_expense'],
  );
}

// Calculate the total expense
$total_expense = array_reduce($data, function($acc, $item) {
  return $acc + $item['total_expense'];
});

// Calculate the percentage for each category
foreach ($data as &$item) {
  $item['percentage'] = ($item['total_expense'] / $total_expense) * 100;
}

// Convert the array to JSON format and output it
echo json_encode($data);
?>
