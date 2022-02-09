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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Opportunities</title>
</head>
<body class="main">
  <div class="container">
    <div class="page">
    <nav class="page__menu menu">
      <ul class="menu__list r-list">
        <li class="menu__group"><a href="welcome.php" class="menu__link r-link text-underlined">Welcome</a></li>
        <li class="menu__group"><a href="clients.php" class="menu__link r-link text-underlined">Clients</a></li>
        <li class="menu__group"><a href="#" class="menu__link r-link text-underlined">Opportunities</a></li>
      </ul>
    </nav>
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
    select{
      width:40%;
      
    }
</style>
 
<div class="welcomeCont">
		<form  method="POST" class="login-email">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Create Opportunities</p>
			<div class="input-group">
				<input type="text" placeholder="Title" name="title"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Amount" name="amount"  required>
			</div><br>
			<div class="input-group">
        <select id="Stage" name="stage" size="1" style="margin-left:10px; padding:1rem;">
          <option value="">--select negotiation stage--</option><br>
          <option value="discovery">Discovery</option>
          <option value="proposal">Proposal</option>
          <option value="shared">Shared</option>
          <option value="negotiations">Negotiations</option>
        </select>
            </div>
            
    <br> 
      <select name = 'subject[]'style="margin-left:10px; padding:1rem;">
      <option disabled selected>-- Select client and submit--</option>
    <?php  
        $records = mysqli_query($conn, "SELECT username From clients");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username'] ."</option>";  // displaying data in option menu
        }	        
    ?>  
  </select>
      <br><br>

  <div class="input-group">
				<button name="submit" value = Submit class="btn">Create Opportunity</button>
			</div>

  <?php  
     // Check if form is submitted successfully
    if(isset($_POST["submit"]))
    {
        // Check if any option is selected
        if(isset($_POST["subject"]))
        {
            // Retrieving each selected option
            foreach ($_POST['subject'] as $subject); ?>
      
            <?php 
           
            $name = mysqli_real_escape_string($conn, $_POST["title"]);
            $email = mysqli_real_escape_string($conn, $_POST["amount"]);
            $password = mysqli_real_escape_string($conn, $_POST["stage"]);

            $sql0= "INSERT INTO opportunities  (Title, Amount, Stage,Client)
             VALUES('$name', '$email', '$password','$subject')"; 
             ?>
             <?php
            if (($conn->query($sql0) === TRUE)) { ?>
                <p id="info"><?php echo "Registered Successfully!\n"; 
                echo "<script>window.location.href='opportunity.php';</script>"?></p>
    }
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Server Error !<br>";
                echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"?></p>
            <?php
            }

            $conn->close();
            ?>
  <?php 
 }}
 ?>
			
</form>
	</div>
  <div class="welcomeCont">
  <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">View Registered Opportunities</p>
  <br><table width="80%" border="1">
                <tr>
                <td><strong>Title</strong></td>
                <td><strong>Amount</strong></td>
                <td><strong>Stage</strong></td>
                
                </tr>
                  <form method="post">
                  <select name = 'subject[]' style="margin-left:10px; padding:1rem;">
                <option disabled selected>-- Select client and submit--</option>
                <?php  // Using database connection file here
                    $records = mysqli_query($conn, "SELECT username From clients");  // Use select query here 
            
                    while($data = mysqli_fetch_array($records))
                    {
                        echo "<option value='". $data['username'] ."'>" .$data['username'] ."</option>";  // displaying data in option menu
                    }	  
                    
                ?>  
              </select>
              <input style="background-color:#a29bfe;width:20%; color:white;padding:5px;margin-left:10px"type = 'submit' name = 'submit1' value = Submit><br><br>
              <?php
                 
                // Check if form is submitted successfully
                if(isset($_POST["submit1"]))
                {
                    // Check if any option is selected
                    if(isset($_POST["subject"]))
                    {
                        // Retrieving each selected option
                        foreach ($_POST['subject'] as $subject); ?>
                        
                        <?php $result = mysqli_query($conn, "SELECT * FROM opportunities WHERE Client='$subject'");
             while($row = $result->fetch_assoc())
             {
              ?>
            
                    <tr>
                    <td><?php echo $row['Title'] ?></td>
                    <td><?php echo $row['Amount'] ?></td>
                    <td><?php echo $row['Stage'] ?></td>
                   
                    </tr>
                    <?php
             }}}
             ?>
            </table>

            <div style="float:right">
            <a href="logout.php">Logout</a>
            </div>
            
            </div>

    
 </div>
</body>
</html>