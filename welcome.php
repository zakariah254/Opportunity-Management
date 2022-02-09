<?php 

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
    <title>Welcome</title>
</head>
<body class="main">
  <div class="container">
    <div class="page">
    <nav class="page__menu menu">
      <ul class="menu__list r-list">
        <li class="menu__group"><a href="#" class="menu__link r-link text-underlined">Welcome</a></li>
        <li class="menu__group"><a href="clients.php" class="menu__link r-link text-underlined">Clients</a></li>
        <li class="menu__group"><a href="opportunity.php" class="menu__link r-link text-underlined">Opportunities</a></li>
      </ul>
    </nav>
  </div>
  
  <div class="welcomeCont">
    <?php echo "<h2>Welcome " . $_SESSION['username'] . "</h2>"; ?>
    <P>Create <em>Opportunities and Clients!</em></P>
    <a href="logout.php">Logout</a>
  </div>
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