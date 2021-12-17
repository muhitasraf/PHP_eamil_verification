<?php
session_start();
$con=mysqli_connect("localhost","root","","user_database");
if(mysqli_connect_errno()){
    echo "not connected";
}else{
    echo "Mysqlite Successfuly connected.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">

        <form id="signup" method="post" action="">
    
            <div class="header">
                <h3 style="padding-top:15px;text-align: center;">Sign Up</h3>
            </div>
            
            <div class="sep"></div>
    
            <div class="inputs">
                <input type="text" name="name_" placeholder="Name">
                <input type="text" name="username" placeholder="User Name">
                <input type="email" name="email" placeholder="e-mail" autofocus />
            
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="cpassword" placeholder="Confirm Password" /> 
                
                <div class="checkboxy">
                    <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">I accept the terms of use</label>
                </div>
            
                <button id="submit" name="submit" >Submit</button>
            </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    $name = trim($_POST['name_']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $code = sprintf("%06d", mt_rand(1, 999999));
	
    $status = "pending";
	$subject = "Verification Code";
	$body = "Hello, $username. This is your verification code: $code";
	$headers = "From: muhitasraf@gamil.com";
	
    $existing_email=mysqli_query($con,"select * from userdata where email='$email'");
	$email_count=mysqli_num_rows($existing_email);
	$check_row=mysqli_fetch_array($existing_email);
	
	$existing_username=mysqli_query($con,"select * from userdata where user_name='$username'");
	$username_count=mysqli_num_rows($existing_username);
	
	if($username_count>0){
		echo "<script>alert('$username already taken.');</script>";
	}

    if ($email_count>0){
       
        echo "<script>alert('$email has already uses.');</script>";
        
    }elseif($check_row['$email'] != $email && $password==$cpassword) {
        
        $insert=mysqli_query($con,"insert into userdata (name,user_name,email,password,code,status) values ('$name','$username','$email','$password','$code','$status') ");
        if($insert){

			if(mail($email, $subject, $body, $headers)){
				$_SESSION['email']= $email;
				$_SESSION['user_id']= $user_id;
				echo "<script>alert('Successfuly Registered');</script>";
				echo "<script>window.open('verification.php','_self');</script>";
			}else{
				echo "<script>alert('Can't Send verification code.');</script>";
			}
        }else{
            echo "<script>alert('Can't Register');</script>";
        } 
    }   
 
}


?>