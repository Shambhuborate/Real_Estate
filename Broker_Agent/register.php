<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	
	$pass= sha1($pass);
	
	$query = "SELECT * FROM user where uemail='$email'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num == 1)
	{
		$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
	}
	else
	{
		
		if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass))
		{
			
			$sql="INSERT INTO user (uname,uemail,uphone,upass) VALUES ('$name','$email','$phone','$pass')";
			$result=mysqli_query($con, $sql);
			   if($result){
				   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
			   }
			   else{
				   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
			   }
		}else{
			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style/login.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style2.css">
<style>
        .btn1 {
  background: linear-gradient(144deg, #1e1e1e , 20%,#1e1e1e 50%,#1e1e1e );

  color: #fff;
  width: 45%;
  margin-left: 28%;
  padding: 7px !important;
  border-radius: 12px;
}

.btn1:hover {
    background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);

  color: rgb(255, 255, 255);
  padding: 7px !important;
  cursor: pointer;
  transition: all 0.4s ease;
}
</style>
<body>
<?php include("admin/property/header.php"); ?>
    <div class="page-wrappers">
    <div class="page-wrappers login-body full-row bg-sky-500/[.06] ...">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?php echo $error; ?><?php echo $msg; ?>
                            <!-- Form -->
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text"  name="name" class="form-control" placeholder="Your Name*">
                                </div>
                                <div class="form-group">
                                    <input type="email"  name="email" class="form-control" placeholder="Your Email*">
                                </div>
                                <div class="form-group">
                                    <input type="text"  name="phone" class="form-control" placeholder="Your Phone*" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass"  class="form-control" placeholder="Your Password*">
                                </div>

                                 
                                
                                <button class="btn1" name="reg" value="Register" type="submit">Register</button>
                                
                            </form>
                            
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            
                            
                            <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>