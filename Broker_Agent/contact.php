<?php 
include("config.php");
$error="";
$msg="";
if(isset($_POST['send']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message))
	{
		
		$sql="INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
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
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include("admin/property/header.php"); ?>
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 bg-secondary">
                    <div class="contact-info">
                        <h3 class="mb-4 mt-4 text-white">Contacts</h3>
                        
                        <ul>
                            <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Address</h5>
                                    <span class="text-white">A/p Karad dis: Satara</span> <br>
                                    </div>
                            </li>
                            <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Call Us</h5>
                                    <span class="d-table text-white">+91 7845124578</span>
                                    <span class="text-white">+91 8958641207  </span>
                                </div>
                            </li>
                            <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Email Adderss</h5>
                                    <span class="d-table text-white">helpline@realestatest.com</span>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-md-12 col-lg-7">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
                            <?php echo $msg; ?><?php echo $error; ?>
                        </div>
                    </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="w-100" action="#" method="post">
                                <div class="row">
                                    <div class="row mb-4">
                                        <div class="form-group col-lg-6" style="padding-bottom: 16px;">
                                            <input type="text"  name="name" class="form-control" placeholder="Your Name*">
                                        </div>
                                        <div class="form-group col-lg-6" style="padding-bottom: 16px;">
                                            <input type="text"  name="email" class="form-control" placeholder="Email Address*">
                                        </div>
                                        <div class="form-group col-lg-6" style="padding-bottom: 16px;">
                                            <input type="text"  name="phone" class="form-control" placeholder="Phone" maxlength="10">
                                        </div>
                                        <div class="form-group col-lg-6" style="padding-bottom: 16px;">
                                            <input type="text" name="subject"  class="form-control" placeholder="Subject">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("admin/property/footer.php"); ?>
</body>
</html>