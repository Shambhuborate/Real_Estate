
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style2.css">
<link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
        background-color: peachpuff;
        }
    .container1{
        width: 100%;
        height: 300px;
        display: flex;
        gap: 5px;
        
    }
    .container1 .item{
        width: 5%;
        height: 113%;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #382f40;
        transition: all ease-in-out 0.5s;
        cursor: pointer;
    }
   
    .container1 .item:hover{
        width: 30%;
       
    }
    .item1{
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #EEE8AA ;
        width: 27%;
        height: 114%;
        margin-left: 15px;
      
    }
    .item1:hover{
        cursor: zoom-out;
    }
  
  .li-items{
    display: inline-block;
    background-color: wheat;
    margin-top: 20px;
  }
  .li-item{
    display: inline-block;
    padding: 10px;
    font-weight: bold;
  
  }
  .name-date{
    margin-top: 13px;
    padding-left: 15px;
  }
   .loc{
    margin-top: 20px;
    padding-left: 15px;
  }
  .price{
    margin-top: 20px;
    padding-left: 15px;
  }
  .title-1{
text-align: center;
text-decoration: none;
color: black;
  }
  hr {
  width: 100%;
  height: 2px;
  background-color: black;
  border: none;
  border-style: dashed;
  margin: 0 auto;
}
.heading{
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: gray;
  color: white;
  font-size: 2px;
  height: 89px;
}

     </style>
<body>
  
<?php include("admin/property/header.php"); ?>
<div class="heading">
  <marquee behavior="" direction="left"> <h1>Property Images and Details.... </h1></marquee> 
  </div>
                             
                            <?php $query=mysqli_query($con,"SELECT property.*, user.uname FROM `property`,`user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
										while($row=mysqli_fetch_array($query))
										{
									?>
                            <div class="container1">
                            <img class="item" src="admin/property/<?php echo $row['20'];?>" alt="pimage">
                            <img class="item" src="admin/property/<?php echo $row['21'];?>" alt="pimage">
                            <img class="item" src="admin/property/<?php echo $row['25'];?>" alt="pimage">
                            <img class="item" src="admin/property/<?php echo $row['26'];?>" alt="pimage">

                                  
                             <div class="item1 ps-5">
                                <div class="">
                                   <center>  <h5 ><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['3'];?></a></h5></center>
                                                    <span class="loc"><i class="fas fa-map-marker-alt text-success"></i><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['16'];?>"> <?php echo $row['16'];?></a></span> </div>
                                                      <div class="price"><b>  Rs-<?php echo $row['15'];?> </b></div>
                                             
                                                

                                                    <ul class="li-items">
                                                        
                                                        <li class="li-item"><span><?php echo $row['14'];?></span> Sqft</li>
                                                        <li class="li-item"><span><?php echo $row['8'];?></span> Beds</li>
                                                        <li class="li-item"><span><?php echo $row['9'];?></span> Baths</li>
                                                        <li class="li-item"><span><?php echo $row['11'];?></span> Kitchen</li>
                                                        <li class="li-item"><span><?php echo $row['10'];?></span> Balcony</li>
                                                        
                                                    </ul>
                                                
                                                   
                                                    <div class="name-date"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['uname'];?>
                                                    <i class="fas fa-phone-alt text-success mr-1 pl-2"></i><?php echo $row['2'];?>
                                                    <i class="far fa-calendar-alt text-success mr-1 ps-10"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div> 
                                                   
                                                    </div>
                                                   </div>
                            </div>
                            <hr>
                            <?php } ?>

                            <?php include("admin/property/footer.php");?>
</body>
</html>