<?php
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
echo  "Connected to $servername succesfully";
$query = "select * from Users";
echo "<br>Users in the Database:\n";
$result = mysqli_query($conn, $query);
if($result)
{
	if(mysqli_num_rows($result)>0)
	{
		echo "<TABLE border = 1>\n";
		echo "<TR><TD>id<TD>login<TD>password<TD>role<TD>last_name<TD>first_name<TD>address<TD>zipcode<TD>state\n";
		while($row = mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$login = $row['login'];
			$password = $row['password'];
			$role = $row['role'];
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
			$address = $row['address'];
			$zipcode = $row['zipcode'];
			$state = $row['state'];
			echo "<TR><TD>$id<TD>$login<TD>$password<TD>$role<TD>$last_name<TD>$first_name<TD>$address<TD>$zipcode<TD>$state\n";
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
?>
