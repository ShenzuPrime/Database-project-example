<?php
setcookie("CockX","", time() - 1);
echo "<h1>Cookie has been deleted. User has been logged out</h1>";
?>
<html>
  <header>
    <title>Project 2</title>
  </header>
  <body>
  <h2> Welcome to Ian Brugal's CPS3740 Project 2 </h2>
  <br>
  <a href="showusers.php">list all users</a>
  <br>
  <form action="search_product.php" method="get">
  <br>Keyword: <input type="text" name="keyword"  required="required" >
  <input type="submit" value="Search products">
  </form>
  <br>
  <form action="login2.php" method="post">
    Login ID: <input type="text" name="username" required="">
    <br>
    Password: <input type="password" name="password" required="">
    <input type="submit" value="Submit">
  </form>
  </body>
</html>
