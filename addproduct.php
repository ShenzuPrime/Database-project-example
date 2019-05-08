<?php
if(isset($_COOKIE["CockX"]))
{
  $servername = 'imc.kean.edu';
	$username = 'brugali';
	$password = '0943266';
	$dbname = "CPS3740";
	//create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//check connection
	if (!$conn){
		die("Connection Failed: " . mysqli_connect_error());
	}
  else
  {
	echo  "Connected to $servername succesfully";
	$query = "select V_Id, Name from Vendors";
	$result = mysqli_query($conn, $query);
  echo "<HTML>";
    echo "<br><br><a href='logout.php'>User logout</a><br>";
    echo "<h3>Add Product</H3>";
    echo "<form action='insert_product.php' method='post'>";
      echo "<br> Product Name: <input type='text' name='product_name' required='required'>";
      echo "<br> Description: <input type='text'name='description'required='required'>";
      echo "<br> Cost: <input type='text' name='cost'required='required'>";
      echo "<br> Sell Price: <input type='text' name='sell_price'required='required'>";
      echo "<br> Quantity: <input type='text' name='quantity' required='required'>";
      echo "<br>Select a vendor: <select name='vendor_id'>";
      while ($row = $result->fetch_assoc()) {
      unset($id, $name);
                  $id = $row['V_Id'];
                  $name = $row['Name'];
                  echo "<option value=$id>$name</option>";
      }
      echo "</select>";
      echo "<br><input type='submit' value='Submit'>";
    echo "</form>";
  echo "</HTML>";
  mysqli_close($conn);
  }
}
else
{
	echo "<br><a href='project2.html'>Please Log in again to access this page</a>\n";
}
?>
