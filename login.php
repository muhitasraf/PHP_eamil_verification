<?php
session_start();
$con=mysqli_connect("localhost","root","" ,"user_database");
if(mysqli_connect_errno()){
    echo "Failed to Connect";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <form id="signup" method="post" action="">    
            <div class="header">            
                <h3 style="text-align:center;padding-top:20px;">Sign In</h3>              
            </div>            
            <div class="sep"></div>           
    
            <div class="inputs">                           
                <input type="email" name="email" placeholder="e-mail" autofocus />            
                <input type="password" name="password" placeholder="Password" />                
                <div class="checkboxy">
                    <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">Accept terms & condition.</label>
                </div>                              
                <button id="submit" name="login" >Login</button>           
            </div>    
        </form>   
    </div>   ​  
</body>
</html>


<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $valid=mysqli_query($con,"select * from userdata where email = '$email' AND password='$password'");
   
    $check_login=mysqli_num_rows($valid);

    if($check_login >0){
		$_SESSION['user_id'] = $user_id;
		$_SESSION['email'] = $email;
		echo  "<script>alert('Successfully Login');</script>";
		echo "<script>window.open('profile.php','_self');</script>";
    }
    else{
		echo  "<script>alert('Failed to Login');</script>";
    }
}

?>