<?php
session_start();


if (isset($_POST['loginSubmit'])) {
  
    include('connection.php');  

    $mysqli = new mysqli($hostname, $db_username, $db_password, $db_name); 
    
    $phone = $_POST['phone'];
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $phone = stripcslashes($phone);  
        $password = stripcslashes($password);  
        $phone = mysqli_real_escape_string($mysqli, $phone);
        $password = mysqli_real_escape_string($mysqli, $password);  
      
        $sql = "SELECT * FROM users WHERE phone = '$phone' AND Password = '$password'";

        $result = $mysqli->query($sql);    
        $count = $result->num_rows;  
          
        if($count == 1){  
            $row = $result->fetch_assoc();
            $_SESSION["phone"] = $row['phone'];
        
            header('Location: profile.php');
            exit();;  
        }  
        else{  
           header('Location:login.html');  
           exit();;
        }     
    } 
?>