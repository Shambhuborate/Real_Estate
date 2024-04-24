<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");


?>
<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Dashboard | By Code Info</title>
    <!-- <link rel="stylesheet" href="style/css.css"> -->
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style2.css">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <style>
    .bg-solitude {
      background-color: #dfe9f5;
    }

    #box {
      box-sizing: border-box;
      width: 190px;
      height: 254px;
      background: rgba(217, 217, 217, 0.58);
      border: 1px solid white;
      box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
      border-radius: 17px;
      text-align: center;
      cursor: pointer;
      transition: all 0.5s;
      text-align: center;
      user-select: none;
      font-weight: bolder;
      color: black;
    }

    #box:hover {
      border: 1px solid black;
      transform: scale(1.05);
    }

    #box:active {
      transform: scale(0.95) rotateZ(1.7deg);
    }

    .hover-zoom {
      --hover-zoom-duration: 0.3s;
      /* change the duration of the animation */
      --hover-zoom-easing: ease-in-out;
      /* change the easing of the animation */
    }

    .my_class {
      text-decoration: none;
      color: white;
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

    .gradient {
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      border-radius: 0.6em;
      margin-top: -0.25em;
      background-image: linear-gradient(rgba(0, 0, 0, 0),
          rgba(0, 0, 0, 0),
          rgba(0, 0, 0, 0.3));
    }

    .label {
      position: relative;
      top: -1px;
    }

    .transition {
      transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
      transition-duration: 500ms;
      background-color: rgba(16, 185, 129, 0.6);
      border-radius: 9999px;
      width: 0;
      height: 0;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    button:hover .transition {
      width: 14em;
      height: 14em;
    }

    button:active {
      transform: scale(0.97);
    }

    .Btn1 {
      --black: #000000;
      --ch-black: #141414;
      --eer-black: #1b1b1b;
      --night-rider: #2e2e2e;
      --white: #ffffff;
      --af-white: #f3f3f3;
      --ch-white: #e1e1e1;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 45px;
      height: 45px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition-duration: .3s;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
      background-color: var(--night-rider);
    }

    /* plus sign */
    .sign {
      width: 100%;
      transition-duration: .3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .sign svg {
      width: 15px;
    }

    .sign svg path {
      fill: var(--af-white);
    }

    /* text */
    .text {
      position: absolute;
      right: 0%;
      width: 0%;
      opacity: 0;
      color: var(--af-white);
      font-size: 1.2em;
      font-weight: 600;
      transition-duration: .3s;
    }

    /* hover effect on button width */
    .Btn1:hover {
      width: 150px;
      border-radius: 5px;
      transition-duration: .3s;
    }

    .Btn1:hover .sign {
      width: 30%;
      transition-duration: .3s;
      padding-left: 20px;
    }

    /* hover effect button's text */
    .Btn1:hover .text {
      opacity: 1;
      width: 70%;
      transition-duration: .3s;
      padding-right: 10px;
    }

    /* button click effect*/
    .Btn1:active {
      transform: translate(2px, 2px);
    }

    .boxbtn {
      padding-top: 18%;

    }

    .main-course h1 {

      justify-content: center;
      align-items: center;
      margin-bottom: 5px;

    }

    .marquee {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 34%;
      width: 40%;
      margin-bottom: 5px;
    }

    .card-flex {
      display: flex;
      gap: 5%;
      justify-content: center;
      align-items: center;
    }
    .search_items{
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
  
  </style>

  <body class="bg-solitude">



    <div class="full-row bg-solitude">


      <div class="card-flex">
        <div class="p-4 text-center rounded mb-4 " id="box">
          <h5 class="text-secondary py-3 m-0"><a href="#">Views</a></h5>
          <?php
          require_once("config.php");
          $query = "SELECT uid FROM `user` ORDER BY uid";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h4>' . $row . '</h4>';
          ?>
          <div>
            <a href="viewPerson.php">
              <button>
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Click to view</span>
              </button>
            </a>
          </div>

        </div>


        <div class="p-4 text-center rounded mb-4" id="box">
          <h5 class="text-secondary py-3 m-0">Total Property</h5>
          <?php
          require_once("config.php");
          $query = "SELECT pid FROM `property` ORDER BY pid";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h4>' . $row . '</h4>';
          ?>
          <div>
            <a href="totalproperty.php">
              <button>
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Click to view</span>
              </button>
            </a>
          </div>
        </div>

        <div class="p-1 text-center rounded mb-3" id="box">
          <h5 class="text-secondary py-3 m-0">Property submmited persion details</h5>
          <div>
            <a href="persondetails.php">
              <button>
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Click to view</span>
              </button>
            </a>
          </div>
        </div>

        <div class="p-1 text-center rounded mb-3" id="box">
          <h5 class="text-secondary py-3 m-0">Buyer details</h5>
          <div>
            <a href="buyerdetails.php">
              <button>
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Click to view</span>
              </button>
            </a>
          </div>
        </div>
          <div>
          <a href="login.php">
            <div class="boxbtn">
              <button class="Btn1">
                <div class="sign"><svg viewBox="0 0 512 512">
                    <path
                      d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                    </path>
                  </svg>
                </div>

                <div class="text">Logout</div>
              </button>
            </div>
          </a>
        </div>
        </div>
      </div>
 

    <div class="full-row bg-solitude">
      <div class="container">
        <section class="main-course">
          <div class="marquee">
            <marquee behavior="" direction="left">
              <h1>Properties</h1>
            </marquee>
          </div>
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
                  <th class="text-white font-weight-bolder">Delete</th>
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
                                $query = mysqli_query($con, "SELECT * FROM property WHERE uid");
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

                    <td><a href="submitpropertydelete.php?id=<?php echo $row['0']; ?>"><button>
                          <span class="transition"></span>
                          <span class="gradient"></span>
                          <span class="label">Delete</span>
                        </button></a></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
      </div>
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
</span>