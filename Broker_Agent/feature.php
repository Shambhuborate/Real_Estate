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
</head>
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style2.css">
<link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
<?php include("admin/property/header.php"); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class=" page-banner" style="background-image:url('image/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed
                                    Property</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" style="color:white">User Listed Property</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                            <?php 
                            if(isset($_GET['msg']))	
                            echo $_GET['msg'];	
                        ?>
                        </div>
                    </div>
                    <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white font-weight-bolder">Properties</th>
                                <th class="text-white font-weight-bolder">BHK</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
                                <th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Update</th>
                                <th class="text-white font-weight-bolder">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                        $uid=$_SESSION['uid'];
                        $query=mysqli_query($con,"SELECT * FROM `property` WHERE uid='$uid'");
                            while($row=mysqli_fetch_array($query))
                            {
                        ?>
                            <tr>
                                <td>
                                    <img src="admin/property/<?php echo $row['20'];?>" alt="pimage">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><a
                                                href="propertydetail.php?pid=<?php echo $row['2'];?>">
                                                <?php echo $row['3'];?>
                                            </a></h5>
                                        <span class="font-14 text-capitalize"><i
                                                class="fas fa-map-marker-alt text-success font-13"></i>&nbsp;
                                            <?php echo $row['16'];?>
                                        </span>
                                        <div class="price mt-3">
                                            <span class="text-success">RS-&nbsp&nbsp;
                                                <?php echo $row['15'];?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row['6'];?>
                                </td>
                                <td class="text-capitalize">For
                                    <?php echo $row['7'];?>
                                </td>
                                <td>
                                    <?php echo $row['28'];?>
                                </td>
                                <td class="text-capitalize">
                                    <?php echo $row['23'];?>
                                </td>
                                <td><a class="btn btn-info"
                                        href="submitpropertyupdate.php?id=<?php echo $row['0'];?>">Update</a></td>
                                <td><a class="btn btn-danger"
                                        href="submitpropertydelete.php?id=<?php echo $row['0'];?>">Delete</a></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php include("admin/property/footer.php"); ?>
</body>

</html>