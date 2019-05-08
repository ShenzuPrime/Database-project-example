<?php
$servername = "imc.kean.edu";
$username = "brugali";
$password = "0943266";
$dbname = "CPS3740";
$lusername = $_POST["username"];
$lpassword = $_POST["password"];
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn){
	die("Connection Failed: " . mysqli_connect_error());
}
$query = "select * from Users where login='$lusername'";
$result = mysqli_query($conn, $query);
if($result)
{
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$login = $row['login'];
			$upassword = $row['password'];
			$role = $row['role'];
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
			$address = $row['address'];
			$zipcode = $row['zipcode'];
			$state = $row['state'];
		}
		if($lpassword === $upassword)
		{
			$ip = $_SERVER["REMOTE_ADDR"];
			setcookie('CockX', $login, time() + (86400 * 30));
			$IPv4 = explode(".",$ip);
			echo "Your IP: $ip";
			if(($IPv4[0] == 10) or ($IPv4[0] . "." . $IPv4[1] == "131.125"))
			{
				echo "<br> You are from Kean University \n";
			}
			else
			{
				echo "<br> You are NOT from Kean University \n";
			}
			if( $role === "Staff")
			{
			echo "<br> Welcome User: $first_name $last_name";
			echo "<br> Role: $role";
			echo "<br> Address: $address $zipcode <BR>";
			echo "<br>";
			echo "<br>  •  ";
			echo "<a href='addproduct.php'> Add Products</a>\n";
			echo "<br>  •  ";
			echo "<a href='displayproduct.php'> Display Products</a>\n";
			echo "<br>  •  ";
			echo "<a href='updateproduct.php'> Update Products</a>\n";
			}
			echo "<br>";
			echo "<br><a href='logout.php'>Logout</a>\n";
			echo "<br>";




			$query = "SELECT * From CPS3740_2018S.Customers_brugali";
			//echo "<br> query: $query\n";
			echo "<BR> The customers are: ";
			$result = mysqli_query($conn, $query);
			if($result)
			{
				if(mysqli_num_rows($result)>0)
				{
					echo "<br><TABLE border = 1>\n";
					echo "<TR><TD>id<TD>name<TD>balance<TD>zipcode\n";
					while($row = mysqli_fetch_array($result))
					{
						$id = $row['id'];
						$name = $row['name'];
						$balance = $row['balance'];
						$zipcode = $row['zipcode'];
						$sum = $sum + $balance;
						echo "<TR><TD>$id<TD>$name<TD>$balance<TD>$zipcode\n";
					}
					echo "</TABLE>\n";
					echo "Total balance is: $sum \n";
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
		}
		else
		{
			echo "<br> The username \"$lusername\" is in the database but password does not match.<br>";
		}
	}
	else
	{
		echo "<br> Username \"$lusername\" is not in the database.<br>";
	}
}
else
{
	echo "Query did not go as planned";
}
mysqli_close($conn);
?>
