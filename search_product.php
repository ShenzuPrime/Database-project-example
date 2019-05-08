<?php
$servername = 'imc.kean.edu';
$username = 'brugali';
$password = '0943266';
$dbname = "CPS3740_2018S";
$keyword = $_GET["keyword"];

//checks keyword
if(!$keyword)
{
  echo "No Keyword Entered.";
}
if($keyword)
{
  //create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  //check connection
  if (!$conn){
  	die("Connection Failed: " . mysqli_connect_error());
  }
  echo  "Connected to $servername succesfully";
  if($keyword ==="*")
  {
  $query = "select * from Products_brugali";
  echo "<br>The search results for keyword: $keyword \n";
  $result = mysqli_query($conn, $query);
    if($result)
    {
    	if(mysqli_num_rows($result)>0)
    	{
    		echo "<TABLE border = 1>\n";
    		echo "<TR><TD>Prodduct ID<TD>Product Name<TD>Description<TD>Cost<TD>Sell Price<TD>Quantity<TD>User ID<TD>Vendor\n";
    		while($row = mysqli_fetch_array($result))
    		{
    			$id = $row['id'];
    			$name = $row['name'];
    			$description = $row['description'];
    			$sell_price = $row['sell_price'];
    			$cost = $row['cost'];
    			$quantity = $row['quantity'];
    			$user_id = $row['user_id'];
    			$vendor_id = $row['vendor_id'];
    			echo "<TR><TD>$id<TD>$name<TD>$description<TD>$sell_price<TD>$cost<TD>$quantity<TD>$user_id<TD>$vendor_id\n";
    		}
    		echo "</TABLE>\n";
    	}
    	else
    	{
    		echo "<br> No records in the database.\n";
    		mysqli_free_result($result);
    	}
    }
    else
    {
    	echo "<BR> No result set from the database.\n";
    }
  mysqli_close($conn);
  }
  else
  {
  $query = "select $keyword from Products_brugali WHERE name like '&$keyword&' OR decription like '&$keyword&'";
  echo "<br>The search results for keyword: $keyword \n";
  $result = mysqli_query($conn, $query);
    if($result)
    {
    	if(mysqli_num_rows($result)>0)
    	{
        echo "<TABLE border = 1>\n";
    		echo "<TR><TD>Prodduct ID<TD>Product Name<TD>Description<TD>Cost<TD>Sell Price<TD>Quantity<TD>User ID<TD>Vendor\n";
    		while($row = mysqli_fetch_array($result))
    		{
    			$id = $row['id'];
    			$name = $row['name'];
    			$description = $row['description'];
    			$sell_price = $row['sell_price'];
    			$cost = $row['cost'];
    			$quantity = $row['quantity'];
    			$user_id = $row['user_id'];
    			$vendor_id = $row['vendor_id'];
    			echo "<TR><TD>$id<TD>$name<TD>$description<TD>$sell_price<TD>$cost<TD>$quantity<TD>$user_id<TD>$vendor_id\n";
    		}
    		echo "</TABLE>\n";
    	}
    	else
    	{
    		echo "<br> No records in the database.\n";
    		mysqli_free_result($result);
    	}
    }
    else
    {
    	echo "<BR> No result set from the database.\n";
    }
  mysqli_close($conn);
  }
}
?>
