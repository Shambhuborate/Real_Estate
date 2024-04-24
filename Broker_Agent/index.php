<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
?>


<html>

<head>
    <title>Real Estate Home Page</title>

</head>
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style2.css">
<link rel="stylesheet" href="style/style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    #box{
        background: #e0e0e0;
        box-shadow: -2px -2px 3px #9d9d9d,
            2px 2px 20px ;
    }
    .hover-zoom {
  --hover-zoom-duration: 0.3s; /* change the duration of the animation */
  --hover-zoom-easing: ease-in-out; /* change the easing of the animation */
}
.my_class{
    text-decoration: none;
    color: white;
}
.head{
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #474343;
    width: 100%;
    height: 20%;
    margin-top: 32px;
}
.type{
    color: white;
    display: flex;
    justify-content: center;
    background-color: #7e4d4d;
    width: 25%;
    margin: 10 0 0 15;
    border-radius: 14px;
}
.card {
 width: 190px;
 height: 254px;
 border-radius: 20px;
 background: #f5f5f5;
 position: relative;
 padding: 1.8rem;
 border: 2px solid #c3c6ce;
 transition: 0.5s ease-out;
 overflow: visible;
}

.card-details {
 color: black;
 height: 100%;
 gap: .5em;
 display: grid;
 place-content: center;
}

.card-button {
 transform: translate(-50%, 125%);
 width: 60%;
 border-radius: 1rem;
 border: none;
 background-color: #008bf8;
 color: #fff;
 font-size: 1rem;
 padding: .5rem 1rem;
 position: absolute;
 left: 50%;
 bottom: 0;
 opacity: 0;
 transition: 0.3s ease-out;
}

.text-body {
 color: rgb(134, 134, 134);
}

/*Text*/
.text-title {
 font-size: 1.5em;
 font-weight: bold;
}

/*Hover*/
.card:hover {
 border-color: #008bf8;
 box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
}

.card:hover .card-button {
 transform: translate(-50%, 50%);
 opacity: 1;
}
.card-items{
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 10%;
    margin-bottom: 10%;
}
.head-card{
    text-align: center;
    margin-bottom: 10%;
   padding-top: 20px;
   width: 100%;
   background-color:wheat;
}
.head-card h1{
    padding: 10px;
}
.container-card{
    height: 80%;
    width: 100%;
}
.bg-solitude{
    background-color: #dfe9f5;
  }

.paybtn{
    display: flex;
    justify-content: center;
    gap: 30%;
}
.btn2 {
    width: 25%;
    margin: 10 0 0 15;
    border-radius: 14px;
    border-color: white;
    cursor: pointer;
      background-color: #275a29;
    
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
.bg-color{
    background-color: #dfe9f5;
}
.bg-color2{
    background-color: white;
}

  </style>
<body>
    <?php include("admin/property/header.php"); ?>
   
    <div class="container1">
        <div class="info">
            <h1>Find Your Dream House By Us</h1>
        </div>
        <div class="img">
            <img src="image/hero-banner.png" alt="">
        </div>
    </div>

    <section class="about" id="about">
        <div class="container">
            <figure class="about-banner">
                <img src="image/about-banner-1.png" alt="">
            </figure>
            <div class="about-content">
                <p class="section-subtitle">About as</p>
                <h2 class="h2 section-title">The Leading Real Estate Rental Marketplace.</h2>
                <p class="about-text">
                    Over 39,000 people work for us in more than 70 countries all over the This breadth of global
                    coverage,
                    combined with
                    specialist services
                </p>
                <a href="about.php" class="btn">
                    Our services
                </a>
            </div>
        </div>
    </section>
    </div>
  
    <div class="container-card bg-solitude">
                <div class="head-card">
                    <h1>What We Do ...!</h1>
                </div>
        <div class="card-items">
                <div class="card">
                    <div class="card-details">
                        <h1 class="text-title">Listed Property</h1>
                            <p class="text-body">Property list</p>
                         </div>
                    <button class="card-button"><a class="my_class" href="property.php" >Click here</a></button>
                </div>
                <div class="card">
                        <div class="card-details">
                            <h1 class="text-title">More information</h1>
                            <p class="text-body">Contact us</p>
                        </div>
                    <button class="card-button"><a class="my_class" href="contact.php" >Click here</a></button>
                </div>
                    <div class="card">
                        <div class="card-details">
                        <h1 class="text-title">Selling service</h1>
                        <p class="text-body">Sell your property</p>
                        </div>
                        <button class="card-button"><a class="my_class" href="submitproperty.php">Click here</a></button>
                      </div>
            </div>
            </div> </div>




        <div class="head">
	<h1>Properties</h1>
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
 
    <!--	How it work -->
    <div class="full-row bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">How It Work</h2>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-thumb-one text-center mb-5">
                            <div class="bg-primary text-white rounded-circle position-absolute z-index-9">1</div>
                            <div class="left-arrow"><i class="fas fa-user-friends h1" aria-hidden="true"></i></div>
                            <h5 class="text-secondary mt-5 mb-4">Discussion</h5>
                            <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-thumb-one text-center mb-5">
                            <div class="bg-primary text-white rounded-circle position-absolute z-index-9">2</div>
                            <div class="left-arrow"><i class="fas fa-mail-bulk h1" aria-hidden="true"></i></div>
                            <h5 class="text-secondary mt-5 mb-4">Files Review</h5>
                            <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-thumb-one text-center mb-5">
                            <div class="bg-primary text-white rounded-circle position-absolute z-index-9">3</div>
                            <div><i class="fas fa-user-tie h1" aria-hidden="true"></i></div>
                            <h5 class="text-secondary mt-5 mb-4">Acquire</h5>
                            <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--	How It Work -->  
      
    <?php include("admin/property/footer.php"); ?>
    
     
<script>
  function goToNextPage() {
    window.location.href = "showpro.php";
  }
</script>


</body>

</html>