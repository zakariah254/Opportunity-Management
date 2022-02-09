<?php 
  include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="1.css" rel="stylesheet" type="text/css" media="all">
    
    <title>Clients</title>
</head>
<body class="main">
  <div class="container">
    <div class="page">
    <nav class="page__menu menu">
      <ul class="menu__list r-list">
        <li class="menu__group"><a href="welcome.php" class="menu__link r-link text-underlined">Welcome</a></li>
        <li class="menu__group"><a href="#" class="menu__link r-link text-underlined">Clients</a></li>
        <li class="menu__group"><a href="opportunity.php" class="menu__link r-link text-underlined">Opportunities</a></li>
      </ul>
    </nav>
  </div>
  
<div class="welcomeCont">
		<form action="client_action.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register Clients</p>
			<div class="input-group">
				<input type="text" placeholder="Clients Name" name="username"  required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Address" name="address"  required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Create Client</button>
			</div>
			
		</form>
	</div>
    
  <div class="welcomeCont">
<h1>Registered Clients</h1>
<table width="80%" border="1">
    <tr>
    <td><strong>Client Name</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Address</strong></td>
    
    
    </tr>
    <?php
 $sql="SELECT * FROM clients";
 $result_set=$conn->query($sql);
 while($row = $result_set->fetch_assoc())
 {
  ?>
        <tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['password'] ?></td>
      
        
        <?php
 }
 ?>
</table>
            <div style="float:right">
            <a href="logout.php">Logout</a>
            </div>

            <style>
.welcomeCont {
        width: 36%;
        margin: 0 auto;
        margin-top:1rem;
        padding: 20px;
        background:#fff;
        }
.main{
      background:#323238
     }
</style>
</body>
</html>