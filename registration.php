<?php 
if (isset($_POST['registerSubmit'])) {

    include('connection.php'); 

    $mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);

    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $phone = $_POST['phone'];
    $class = $_POST['class'];
    $PASSWORD = $_POST['password'];

    $query = "INSERT INTO users (firstname, secondname, phone, class, PASSWORD) VALUES ('$firstname', '$secondname', '$phone', '$class', '$PASSWORD')";

    if ($mysqli->query($query) === TRUE) {
        header('Location: profile.php ');
            exit();;  
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
 ?>