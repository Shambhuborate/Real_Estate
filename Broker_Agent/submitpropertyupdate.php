<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

$msg="";
if(isset($_POST['add']))
{
	$pid=$_REQUEST['id'];
	
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
	
	
	$sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', type='{$ptype}', bhk='{$bhk}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}', floor='{$floor}', 
	size='{$asize}', price='{$price}', location='{$loc}', city='{$city}', state='{$state}', 
	pimage='{$aimage}', pimage1='{$aimage1}', pimage2='{$aimage2}', 
	uid='{$uid}', status='{$status}', mapimage='{$fimage}', topmapimage='{$fimage1}', groundmapimage='{$fimage2}', 
	totalfloor='{$totalfloor}' WHERE pid = {$pid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
	}	
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .row{
        padding-bottom: 10px;
    }
</style>
<body>
<?php include("admin/property/header.php"); ?>
<div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Update Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where pid");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												
											</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
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
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required value="<?php echo $row['7']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required value="<?php echo $row['9']; ?>">
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
														<input type="text" class="form-control" name="bed" required value="<?php echo $row['6']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required value="<?php echo $row['8']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required value="<?php echo $row['10']; ?>">
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
														<input type="text" class="form-control" name="price" required value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required value="<?php echo $row['15']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required value="<?php echo $row['16']; ?>">
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
															<option value="5 Floor">5 Floor</option>
															<option value="6 Floor">6 Floor</option>
															<option value="7 Floor">7 Floor</option>
															<option value="8 Floor">8 Floor</option>
															<option value="9 Floor">9 Floor</option>
															<option value="10 Floor">10 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required value="<?php echo $row['14']; ?>">
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
														<img src="admin/property/<?php echo $row['18'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
														<img src="admin/property/<?php echo $row['20'];?>" alt="pimage" height="150" width="180">
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
														<img src="admin/property/<?php echo $row['26'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
														<img src="admin/property/<?php echo $row['19'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
														<img src="admin/property/<?php echo $row['25'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
														<img src="admin/property/<?php echo $row['27'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit" class="btn btn-success"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
    </div>
    <?php include("admin/property/footer.php"); ?>
</body>

</html>