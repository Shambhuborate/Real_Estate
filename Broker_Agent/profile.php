<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];

	$message=$_POST['message'];
	
	$uid=$_SESSION['uid'];
	
	if(!empty($name) && !empty($email) && !empty($message))
	{
		
		$sql="INSERT INTO feedback (uid,fname,femail,fdescription) VALUES ('$uid','$name','$email','$message')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
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
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="style/profilestyle.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
<?php include("admin/property/header.php"); ?>
  <h1 class="h11">Feedback form</h1>
  <?php echo $msg; ?><?php echo $error; ?>
    <div class="container1">
    
        <div class="image1">
          <img src="image/main-bg.jpg" alt="Your image">
        </div>
        <div class="form1">
          <form action="#" method="POST">
         
          <div class="formname">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name">
            </div>
            <div class="formname">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email">
            </div>
            <div class="formname">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your message"></textarea>
            </div>
            <div class="formname">
            <input type="submit" name="submit" value="Send Feedback">
            </div> 
          </form>
        </div>
      </div>
      
</body>
<?php include("admin/property/footer.php"); ?>
</html>