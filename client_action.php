<?php
    include "config.php";
    ?>
    
    <?php

            $name = mysqli_real_escape_string($conn, $_POST["username"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $password = mysqli_real_escape_string($conn, $_POST["address"]);           


            $sql0 = "INSERT INTO clients (username, email, password)
            VALUES('$name', '$email', '$password')"; ?>

            <?php
            if (($conn->query($sql0) === TRUE)) { ?>
                <p id="info">
                <?php echo "Registered Successfully!\n"; 
                echo "<script>window.location.href='clients.php';</script>"?></p>
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