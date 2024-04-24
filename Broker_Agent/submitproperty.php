<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}



$error="";
$msg="";
if(isset($_POST['add']))
{
	$name = $_POST['pname'];
    $contact =$_POST['pcontact'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	
	
	$totalfloor=$_POST['totalfl'];

	
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (name,contactno,title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,pimage,pimage1,pimage2,uid,status,mapimage,topmapimage,groundmapimage,totalfloor)
	values('$name','$contact','$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$aimage','$aimage1','$aimage2','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
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
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style2.css">
<link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
    
    background-color: #dfe9f5;

    }
    .row{
        padding-bottom: 10px;
    }
    .details{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 4px;
        gap: 14%;
    }

  </style>
<body>
<?php include("admin/property/header.php"); ?>
    <div class="full-row">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                    </div>
                </div>
                <div class="row p-5 bg-white">
                    <form method="post" enctype="multipart/form-data">
                            <div class="description">
                                <h5 class="text-secondary">Basic Information</h5><hr>
                                <?php echo $error; ?>
									<?php echo $msg; ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row" style="padding-bottom:10px;">
                                             <div class="details">
                                                 <label for="">Name</label><input type="text" class="form-control" name="pname">
                                                 <label for="">Contact</label> <input type="text" class="form-control" name="pcontact">
                                                 </div>
                                                <label class="col-lg-2 col-form-label">Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="title" required placeholder="Enter Title">
                                                </div>
                                            </div>
                                            <div class="form-group row" >
                                                <label class="col-lg-2 col-form-label">Content</label>
                                                <div class="col-lg-9">
                                                    <textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Property Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="ptype">
                                                        <option value="">Select Type</option>
                                                        <option value="apartment">Apartment</option>
                                                        <option value="flat">Flat</option>
                                                        <option value="building">Building</option>
                                                        <option value="house">House</option>
                                                        <option value="villa">Villa</option>
                                                        <option value="office">Office</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Selling Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="stype">
                                                        <option value="">Select Status</option>
                                                        <option value="rent">Rent</option>
                                                        <option value="sale">Sale</option>
                                                    </select>
                                                </div>
                                            </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Bathroom</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Kitchen</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
                                                </div>
                                            </div>
                                            
                                        </div>   
                                        <div class="col-xl-6">
                                            <div class="form-group row mb-3">
                                                <label class="col-lg-3 col-form-label">BHK</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="bhk">
                                                        <option value="">Select BHK</option>
                                                        <option value="1 BHK">1 BHK</option>
                                                        <option value="2 BHK">2 BHK</option>
                                                        <option value="3 BHK">3 BHK</option>
                                                        <option value="4 BHK">4 BHK</option>
                                                        <option value="5 BHK">5 BHK</option>
                                                        <option value="1,2 BHK">1,2 BHK</option>
                                                        <option value="2,3 BHK">2,3 BHK</option>
                                                        <option value="2,3,4 BHK">2,3,4 BHK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Bedroom</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 4)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Balcony</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 4)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Hall</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 4)">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <h5 class="text-secondary">Price & Location</h5><hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Floor</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="floor">
                                                        <option value="">Select Floor</option>
                                                        <option value="1st Floor">1st Floor</option>
                                                        <option value="2nd Floor">2nd Floor</option>
                                                        <option value="3rd Floor">3rd Floor</option>
                                                        <option value="4th Floor">4th Floor</option>
                                                        <option value="5th Floor">5th Floor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Price</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="price" required placeholder="Enter Price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="city" required placeholder="Enter City">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="state" required placeholder="Enter State">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Total Floor</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="totalfl">
                                                        <option value="">Select Floor</option>
                                                        <option value="1 Floor">1 Floor</option>
                                                        <option value="2 Floor">2 Floor</option>
                                                        <option value="3 Floor">3 Floor</option>
                                                        <option value="4 Floor">4 Floor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Area Size</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="loc" required placeholder="Enter Address">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                            
                                    <h5 class="text-secondary">Image & Status</h5><hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="aimage" type="file" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image 2</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="aimage2" type="file" required="">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Status</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control"  required name="status">
                                                        <option value="">Select Status</option>
                                                        <option value="available">Available</option>
                                                        <option value="sold out">Sold Out</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="fimage1" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image 1</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="aimage1" type="file" required="">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Floor Plan Image</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="fimage" type="file">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="fimage2" type="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    
                                    
                                        <input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
                                    
                            </div>
                            </form>
                </div>            
        </div>
    </div>
    <?php include("admin/property/footer.php"); ?>
</body>

</html>