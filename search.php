<?php
include('config.php');

$search = $_POST['search'];

// Prepare the SQL query
$sql = "SELECT * FROM tbl_products WHERE product LIKE '%$search%'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any results were found
if (mysqli_num_rows($result) > 0) {
  // Loop through the results and display them
  while ($row = mysqli_fetch_assoc($result)) {
     $cat_id=$row["cat_id"];
     header("Location:shopping/category.php?cat_id= $cat_id ");
  }
} else {
  echo "No results found";
}

?>