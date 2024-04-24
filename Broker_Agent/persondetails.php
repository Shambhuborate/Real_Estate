<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

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
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

  <style>
    .bg-solitude{
    background-color: #dfe9f5;
  }
  .search_items{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
    margin-bottom: 5px;
    gap: 10px;
  }
  button {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas,
        "Liberation Mono", "Courier New", monospace;
      font-size: 17px;
      padding: 6px;
      font-weight: 500;
      background: #1f2937;
      color: white;
      border: none;
      position: relative;
      overflow: hidden;
      border-radius: 30px;
      cursor: pointer;
    }
   
  </style>
<body class="bg-solitude">
<div class="search_items">  
          <div class="search-bar">
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="searchDate">Search by Date:</label>
                        <input type="date" id="searchDate" name="searchDate">
                        <button type="submit">Search</button>
                    </form>
                </div>

                <div class="search-bar">
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="searchID">Search by ID:</label>
                        <input type="text" id="searchID" name="searchID">
                        <button type="submit">Search</button>
                    </form>
                </div>
                </div>
    <center>
<div class="course-box mt-5">
          <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
            <thead>
              <tr class="bg-dark">
              <th class="text-white font-weight-bolder">ID</th>
              <th class="text-white font-weight-bolder">name</th>
              <th class="text-white font-weight-bolder">Contact</th>
              <th class="text-white font-weight-bolder">Address</th>
              <th class="text-white font-weight-bolder">Date</th>
              </tr>
            </thead>
      
        
                <?php 
                 if (isset($_GET['searchDate'])) {
                  $searchDate = $_GET['searchDate'];
                  $query = mysqli_query($con, "SELECT * FROM property WHERE uid AND `date` = '$searchDate'");
              } elseif (isset($_GET['searchID'])) {
                  $searchID = $_GET['searchID'];
                  $query = mysqli_query($con, "SELECT * FROM property WHERE `uid` = '$searchID'");
              } else {
                  $query = mysqli_query($con, "SELECT * FROM property WHERE uid");
              }
             while($row=mysqli_fetch_array($query))
                {
            ?>
                 <tr>
                  <td><?php echo $row['22'];?></td>
                 
                      <td><?php echo $row['1'];?></td>
                      <td><?php echo $row['2'];?></td>
                      <td><?php echo $row['16'];?></td>
                      <td><?php echo $row['28'];?></td>
                    </tr>
                    <?php } ?>
                    <tbody>
          </tbody>
        </div>
        </table>
        </center>
</body>
</html>