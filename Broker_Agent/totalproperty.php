<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style2.css">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
    <style>
        .search_items {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
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
    .bg-solitude {
      background-color: #dfe9f5;
    }
    </style>
</head>

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

    <div class="course-box">
        <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
            <thead>
                <tr class="bg-dark">
                    <th class="text-white font-weight-bolder">ID</th>
                    <th class="text-white font-weight-bolder">Properties</th>
                    <th class="text-white font-weight-bolder">BHK</th>
                    <th class="text-white font-weight-bolder">Type</th>
                    <th class="text-white font-weight-bolder">Added Date</th>
                    <th class="text-white font-weight-bolder">Status</th>
              
                </tr>
            </thead>
            <tbody>

                <?php
                // Check if the searchDate parameter is set in the URL
                if (isset($_GET['searchDate'])) {
                    $searchDate = $_GET['searchDate'];
                    $query = mysqli_query($con, "SELECT * FROM property WHERE pid AND `date` = '$searchDate'");
                } elseif (isset($_GET['searchID'])) {
                    $searchID = $_GET['searchID'];
                    $query = mysqli_query($con, "SELECT * FROM property WHERE `pid` = '$searchID'");
                } else {
                    $query = mysqli_query($con, "SELECT * FROM property WHERE pid");
                }

                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['0']; ?>
                        </td>
                        <td>

                            <img src="admin/property/<?php echo $row['20']; ?>" alt="pimage">
                            <div class="property-info d-table">
                                <h5 class="text-secondary text-capitalize"><a
                                        href="propertydetail.php?pid=<?php echo $row['2']; ?>">
                                        <?php echo $row['3']; ?>
                                    </a></h5>
                                <span class="font-14 text-capitalize"><i
                                        class="fas fa-map-marker-alt text-success font-13"></i>&nbsp;
                                    <?php echo $row['16']; ?>
                                </span>
                                <div class="price mt-3">
                                    <span class="text-success">RS-&nbsp&nbsp;
                                        <?php echo $row['15']; ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php echo $row['6']; ?>
                        </td>
                        <td class="text-capitalize">For
                            <?php echo $row['7']; ?>
                        </td>
                        <td>
                            <?php echo $row['28']; ?>
                        </td>
                        <td class="text-capitalize">
                            <?php echo $row['23']; ?>
                        </td>

                        
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <script>
        function searchByDate() {
            // Get the date value from the input field
            var dateInput = document.getElementById("searchDate").value;

            // Set the value in a hidden input field for PHP to retrieve
            document.getElementById("hiddenSearchDate").value = dateInput;

            // Submit the form to perform the search
            document.getElementById("searchForm").submit();
        }
    </script>

    <form id="searchForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" id="hiddenSearchDate" name="searchDate" value="">
    </form>
</body>

</html>