<?php
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="module_four_assignment";

    $user=$_POST['email'];
    $password=$_POST['password'];

    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
    if(!$conn){
        echo"Connection Error:- ".mysqli_connect_error();
        exit;
    }
    $sql="Select * from users where email='$user' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if (!$result) {
        echo"Error:- ".mysqli_error($conn);
        exit;
    }

    while($row=mysqli_fetch_assoc($result)){
        if($row['email']==$user){
            if($row['password']==$password){
                echo"Login Success";
            }
            else{
                echo"Password is Incorrect";
            }
        }
        else{
            echo"Username is Incorrect";
        }
      
    }
    mysqli_close($conn);
?>