<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "signup";


$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if($conn){
    ?>
    <script>
        alert("Connection Successfull")
    </script>
    <?php
}else{
    ?>
    <script>
        alert("NO Successfull")
    </script>
    <?php

}