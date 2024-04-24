<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
///code								
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
<link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .type{
    color: white;
    display: flex;
    justify-content: center;
    background-color: #7e4d4d;
    width: 25%;
    margin: 15px 0 0 15px;
    border-radius: 14px;
}
.paybtn{
    display: flex;
    justify-content: center;
    gap: 30%;
}
.btn2 {
    color: white;
    display: flex;
    justify-content: center;
    background-color: #275a29;
    cursor: pointer;
    width: 25%;
    margin: 15px 0 0 15px;
    border-radius: 14px;
    
}
.btn2 a{
    color: white;
}
.btn2 a:hover{
    color: black;
}
.btn2:hover{
    background-color: #474343;
}


  </style>
<body>
    
<?php include("admin/property/header.php");?>

    <div class="row"> 
       
		
       
        <div class=" page-banner h-50" style="background-image:url('image/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase " style="padding: bottom 30px;"><b >Property Grid</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item text-white">Property Grid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
         
<div class="full-row">
            <div class="container">
                <div class="row">
    <div class="col-md-12">
                        <div class="tab-content mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                <div class="row">
								
									<?php $query=mysqli_query($con,"SELECT property.*, user.uname FROM `property`,`user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
										while($row=mysqli_fetch_array($query))
										{
									?>
								
                                <div class="col-md-5 col-lg-4" onclick="goToNextPage()">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                            <div class="overlay-black overflow-hidden position-relative"> <a href="showpro.php"><img src="admin/property/<?php echo $row['20'];?>" onclick="goToNextPage()"  alt="pimage"></a>
                                                <div class="sale bg-success text-white text-capitalize">For <?php echo $row['7'];?></div>
                                                <div class="price text-primary"><b>Rs-<?php echo $row['15'];?> </b><span class="text-white"><?php echo $row['14'];?> Sqft</span></div>
                                            </div>
                                            <div class="featured-thumb-data shadow-one">
                                                <div class="p-3">
                                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['3'];?></a></h5>
                                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['16'];?>"> <?php echo $row['16'];?></a>
</span> </div>
                                                <div class="bg-gray quantity px-4 pt-4">
                                                    <ul>
                                                        <li><span><?php echo $row['14'];?></span> Sqft</li>
                                                        <li><span><?php echo $row['8'];?></span> Beds</li>
                                                        <li><span><?php echo $row['9'];?></span> Baths</li>
                                                        <li><span><?php echo $row['11'];?></span> Kitchen</li>
                                                        <li><span><?php echo $row['10'];?></span> Balcony</li>                                                    </ul>
                                                </div>
                                                <div class="paybtn">
                                                   <div class="type">
                                                    <?php echo $row['23'];?>
                                                    
                                                   </div>
                                                   
                                                    <button class="btn2">
                                                    <a href="onlinepayment.php?pid=<?php echo $row['0']; ?>&price=<?php echo $row['15']; ?>">Buy Now</a>
                                                    </button>   
                                              
                                                   </div>
                                                <div class="p-4 d-inline-block w-100 flex">
                                                
                                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['uname'];?></div>
                                                   
                                                    <i class="fas fa-phone-alt text-success mr-1 pl-2"></i><?php echo $row['2'];?>
                                                   
                                                    <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>

                                </div>
                            </div>
                        </div>
       </div>  
                </div>
            </div>
    </div>
   

  
<script>
  function goToNextPage() {
    window.location.href = "showpro.php";
  }
</script>
</body>
</html>