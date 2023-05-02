<?php
include 'database.php';
// Retrieve search query and limit from POST parameters
$searchQuery = $_POST['query'];
$limit = $_POST['limit'];
// Construct SQL query to search for expenses based on description and user ID
$sql = "SELECT * FROM tblexpense WHERE UserId='$userid' AND Description LIKE '%$searchQuery%' LIMIT $limit";
// Execute SQL query and retrieve results
$result = mysqli_query($db, $sql);
// Check if any expenses were found
if(mysqli_num_rows($result) > 0) {
  // Loop through each expense and generate HTML for expense details
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="expense">';
    echo '<h4>'.$row['Description'].'</h4>';
    echo '<p>Amount: '.$row['Amount'].'</p>';
    echo '<p>Date: '.$row['Date'].'</p>';
    echo '</div>';
  }
} else {
  // No expenses were found
  echo '<p>No expenses found.</p>';
}
?>
