<?php
include 'C:\xampp\htdocs\PUNotes\Controller\connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $sql="SELECT * FROM users WHERE email='$email' and password='$pass' and is_admin='1'";
        $result=$conn->query($sql);//to check whether the user exists or not 
        if($result->num_rows>0)//if there exists a user
        { 
        $sql="SELECT id from users where email='$email' and password='$pass' and is_admin='1' ";
        $result=$conn->query($sql);
        $row=mysqli_fetch_object($result);
        $user=$row->id;
            session_start();
            $_SESSION['status']='logedin';
            $_SESSION['email']=$email;
            $_SESSION['user']=$user;
            $_SESSION['is_admin']=1;
        echo "success";
        }
        else{
        echo "failed";
        }
}
else{
    echo "Not Found 404";
}
?>