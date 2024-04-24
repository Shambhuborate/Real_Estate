<?php
ini_set('session.cache_limiter', 'public');
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
</head>
<style>
    .bg-solitude {
    background-color: #dfe9f5;
  }

  table,
  th,
  td {
    border: 1px solid white;
    border-collapse: collapse;
    padding: 15px;
  }

  th {
    background-color: black;
    color: white;
  }

  td {
    background-color: wheat;
    color: black;
  }

  .search_items {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
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
                <div class="container">
          <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
            <thead>
              <tr class="bg-dark">
              <th class="text-white font-weight-bolder">ID</th>
              <th class="text-white font-weight-bolder">name</th>
              <th class="text-white font-weight-bolder">Email</th>
              <th class="text-white font-weight-bolder">contact</th>
              <th class="text-white font-weight-bolder">Date</th>
              </tr>
            </thead>
      
        
                <?php 
                 if (isset($_GET['searchDate'])) {
                  $searchDate = $_GET['searchDate'];
                  $query = mysqli_query($con, "SELECT * FROM user WHERE uid AND `udate` = '$searchDate'");
              } elseif (isset($_GET['searchID'])) {
                  $searchID = $_GET['searchID'];
                  $query = mysqli_query($con, "SELECT * FROM user WHERE `uid` = '$searchID'");
              } else {
                  $query = mysqli_query($con, "SELECT * FROM user WHERE uid");
              }
             while($row=mysqli_fetch_array($query))
                {
            ?>
                 <tr>
                  <td><?php echo $row['0'];?></td>
                 
                      <td><?php echo $row['1'];?></td>
                      <td><?php echo $row['2'];?></td>
                      <td><?php echo $row['3'];?></td>
                      <td><?php echo $row['5'];?></td>
                    </tr>
                    <?php } ?>
                    <tbody>
          </tbody>
        
        </table>
        </div>
</body>
</html>