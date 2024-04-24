<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
  
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
        
        $result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
        background-color: rgba(0,0,0,0.5);
    }
    .btn1 {
  background: linear-gradient(144deg, #1e1e1e , 20%,#1e1e1e 50%,#1e1e1e );

  color: #fff;
  padding: 10px !important;
  border-radius: 12px;
  margin-left: 45px;
}

.btn1:hover {
    background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);

  color: rgb(255, 255, 255);
  padding: 10px !important;
  cursor: pointer;
  transition: all 0.4s ease;
}
a{
    color:white;
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
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?php echo $error; ?><?php echo $msg; ?>
                            <!-- Form -->
                            <form method="post">
                                
                                <div class="form-group">
                                    <input type="email" id="adminuseremail"  name="email" class="form-control" placeholder="Your Email*">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="adminPassword" name="pass"  class="form-control" placeholder="Your Password">
                                </div>
                                
                                    <button class="btn1" name="login" value="Login" type="submit">User Login</button>
                                  
                                   <button class="btn1"  onclick="href( )" id="adminLoginForm" type="submit"> <a  href="Dashboard.php" > Admin Login </a></button>
                                   </form>
                                
                           
                            
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                           
                            
                            <div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
      const adminUsername = 'admin'; // Replace with your admin username
        const adminPassword = '1234'; // Replace with your admin password
    
        document.getElementById('adminLoginForm').addEventListener('submit', function (e) {
          e.preventDefault(); // Prevent the default form submission
    
          const enteredUsername = document.getElementById('adminuseremail').value;
          const enteredPassword = document.getElementById('adminPassword').value;
    
          if (enteredUsername === adminuseremail && enteredPassword === adminPassword) {
                window.location.href = "Dashboard.php";
            alert('Admin login successful');
            // Redirect to the admin dashboard or perform other admin-related tasks.
          } else {
            alert('Invalid admin credentials');
          }
        });
 </script> 
</body>
</html>