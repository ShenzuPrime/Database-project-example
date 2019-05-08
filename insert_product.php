<?php
if(isset($_COOKIE["CockX"]))
{
  $servername = 'imc.kean.edu';
	$username = 'brugali';
	$password = '0943266';
	$dbname = "CPS3740_2018S";
  $product_name = $_POST["product_name"];
  $description = $_POST["description"];
  $cost = $_POST["cost"];
  $sell_price = $_POST["sell_price"];
  $quantity = $_POST["quantity"];
  $vendor_id = $_POST["vendor_id"];
  $id = $_COOKIE["CockX"];
  //Checks to see if information was okay
  if($sell_price < 0 or $cost < 0)
  {
    echo "cost or sell price is negative<br>";
    $check = 1;
  }
  if($sell_price - $cost < 0)
  {
    echo "sell price less than cost<br>";
    $check = 1;
  }
  if(!$product_name)
  {
    echo "Name is empty<br>";
    $check = 1;
  }
  if(!$description)
  {
    echo "Description is empty<br>";
    $check = 1;
  }
  if($quantity <= 0)
  {
    echo "Value of quantity is invalid<br>";
    $check = 1;
  }
	//create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//check connection
	if (!$conn){
		die("Connection Failed: " . mysqli_connect_error());
	}
  else
  {
	$query = "Select name from Products_brugali where name='$product_name'";
	$result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $result = $row['id'];
  if($result == $product_name)
  {
    echo "Product name already exists<br>";
    $check = 1;
  }
  if ($check != 1)
  {
    $query = "Select id from CPS3740.Users where login='$id'";
  	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $query = "insert into Products_brugali (name, description, sell_price, cost, quantity, user_id, vendor_id) values ('$product_name', '$description', $sell_price, $cost, $quantity, $id, $vendor_id)";
    $result = mysqli_query($conn, $query);
    if($result == False)
    {
      echo $result;
      Echo "<br>Query did not run succesfully";
      echo "<br><br><a href='addproduct.php'>Please submit information again</a><br>";
    }
    else
    {
      Echo " Successfully ran query: $query";
      echo "<br><br><a href='login2.php'>Back to login page</a><br>";;
    }
  }
  else
  {
    echo "<br><br><a href='addproduct.php'>Please submit information again</a><br>";
  }
  mysqli_close($conn);
  }
}
else
{
	echo "<br><a href='project2.html'>Please Log in again to access this page</a>\n";
}
?>
