<?php
    require 'config.php';

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nic = $_POST["NIC"];
    $address = $_POST["Uaddress"];
    $district = $_POST["District"];
    $email = $_POST["email"];
    $tp = $_POST["contact"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $dob = date('Y-m-d',strtotime($_POST["day"])); 
    $pwd = $_POST["password"];
  
    $sql = "INSERT INTO registereduser (fname,lname,unic,uaddress,udistrict,uemail,tpnumber,gender,uage,dob,upassword) VALUES ('$fname','$lname','$nic','$address','$district','$email',$tp,'$gender',$age,'$dob','$pwd')";
    
    if($conn->query($sql)){
        echo "Successful";
    }
    else{
        echo "Error";
    }

?>
