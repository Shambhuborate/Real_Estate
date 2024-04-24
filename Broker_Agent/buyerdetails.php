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
  <table>
      <thead>
        <tr class="bg-dark">
          <th>ID</th>
          <th>name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Amount</th>
          <th>Payment Type</th>
          <th>Date</th>
        </tr>
      </thead>


      <?php
      if (isset($_GET['searchDate'])) {
        $searchDate = $_GET['searchDate'];
        $query = mysqli_query($con, "SELECT * FROM onlinepayment WHERE pay_id AND `date` = '$searchDate'");
      } elseif (isset($_GET['searchID'])) {
        $searchID = $_GET['searchID'];
        $query = mysqli_query($con, "SELECT * FROM onlinepayment WHERE pay_id  = '$searchID'");
      } else {
        $query = mysqli_query($con, "SELECT * FROM onlinepayment WHERE pay_id");
      }
      while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
          <td>
            <?php echo $row['0']; ?>
          </td>

          <td>
            <?php echo $row['1']; ?>
          </td>
          <td>
            <?php echo $row['2']; ?>
          </td>
          <td>
            <?php echo $row['3']; ?>
          </td>
          <td>
            <?php echo $row['4']; ?>
          </td>
          <td>
            <?php echo $row['5']; ?>
          </td>
          <td>
            <?php echo $row['6']; ?>
          </td>

        </tr>
      <?php } ?>
      <tbody>
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