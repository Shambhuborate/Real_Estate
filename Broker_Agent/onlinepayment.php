<?php
session_start();
include("config.php"); // Include your database connection configuration

// Check if the user is logged in
if (!isset($_SESSION['uemail'])) {
    header("location: login.php");
    exit();
}
$propertyId = isset($_GET['pid']) ? $_GET['pid'] : null;
$propertyPrice = isset($_GET['price']) ? $_GET['price'] : null;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $Address = $_POST['address'];
    $amount = $_POST['amount'];
    $payment=$_POST['payment'];

    $sql = "INSERT INTO `onlinepayment`( `user_name`, `mobile_number`, `address`, `amount`,`paytype`) VALUES ('$username','$mobile','$Address','$amount','$payment')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $msg = "<p class='alert alert-success' style='color: white;'>Payment Send Successfully</p> ";
    } else {
        $error = "<p class='alert alert-warning'>Payment Not Send Successfully</p> ";
    }
} else {
    $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
}


// Fetch user information
$userEmail = $_SESSION['uemail'];
$queryUser = mysqli_query($con, "SELECT * FROM `user` WHERE uemail='$userEmail'");
$rowUser = mysqli_fetch_assoc($queryUser);

// Display error messages if any
if (!$rowUser) {
    echo "Error fetching user information: " . mysqli_error($con);
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Your CSS styles here -->
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url("https://75d03c5f1bfbbbb9cc13-369a671ebb934b49b239e372822005c5.ssl.cf1.rackcdn.com/visa-on-future-payment-card-security-showcase_image-7-w-413.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .main {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 10%;
    }


    .container {

        max-width: 400px;
        margin: 0 auto;
        padding: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border: 2px solid rgba(255, 255, 255, .2);
        height: 400px;
        margin-left: 15%;
        color: #fff;
        backdrop-filter: blur(5px);
        border-color: #fff;
        margin-top: 90px;
    }

    h2 {
        color: #fff;
        margin-left: 580px;
        font-size: 30px;
        margin-top: 150px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }
    .form-group a{
        text-decoration: none;
    }

    label {
        font-weight: bold;
        font-size: 18px;
        color: #ffffff;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        color: #fff;
        border: 10px;
        border-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgb(255, 201, 201);
        background-color: transparent;
    }

    .payment-button {
        background-color: #007bff;
        color: #fff;
        border: 10px;
        border-radius: 5px;
        margin-left: 0px;
        padding: 10px 30px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(14, 14, 14, 0.858);
    }

    .Qr {
        float: right;
        margin-right: 400px;
        margin-top: 110px;

    }

    .qrhead {
        margin-left: 375px;

    }

    .img img {
        width: 40%;
        height: 30%;
        margin-left: 30%;
        margin-top: 20%;
    }
</style>

<body>
<div class="main">
    <div class="row">

        <div class="container">
            <form action="onlinepayment.php" method="post">
                <div class="form-group">
                    <label for="Name">User Name:</label>
                    <input type="text" id="Name" name="username" value="<?php echo $rowUser["uname"]; ?>"
                        placeholder="Enter Full Name" required>
                </div>
                <div class="form-group">
                    <label for="Mobile-Number">Mobile-Number:</label>
                    <input type="text" id="Mobile-Number" name="mobile" value="<?php echo $rowUser['uphone']; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="address" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" value="<?php echo $propertyPrice; ?>"
                        placeholder="Amount" required readonly>
                </div>
                <div class="form-group">
                    <label for="amount">Cash</label>
                    <input type="radio" id="cash" name="payment" value="cash" >
                    <label for="amount">Check</label>
                    <input type="radio" id="check" name="payment" value="check" >
              
                <a href="javascript:void(0)" data-productid="<?php echo $propertyId; ?>"
                    data-productamount="<?php echo $propertyPrice; ?>">
                    <label for="amount">Online</label>
                    <input class="payment-button buynow" type="radio" id="payment" name="payment"></input>
                </a>
                </div>
                <button type="submit" id="submitButton" name="submit" class="payment-button">Submit</button>

            </form>
        </div>
    </div>
 </div>



    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".buynow").click(function (event) {
            var amount = $(this).parent().data('productamount');
            var productId = $(this).parent().data('productid');
            var paymentMethod = $(this).attr('id');
            $("#payment").val(paymentMethod); 
            var options = {
                "key": "rzp_test_vVMiCuYKgECL9I", // Enter the Key ID generated from the Dashboard
                "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Broker agent",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",
                "handler": function (response) {
                    var payment_id = response.razorpay_payment_id;
                    $.ajax({
                        url: "payment-process.php",
                        type: "POST",
                        data: { product_id: productid, payment_id: paymentid },
                        success: function (finalresponse) {
                            // Handle the success response if needed
                            if (finalresponse == 'done') {
                                console.log("Payment processed successfully.");
                            
                                $("#submitButton").click();
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle the error response if needed
                            console.error("Error processing payment:", error);
                            console.log(finalresponse);
                        }
                    });
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();

            event.preventDefault(); // Prevent the default form submission
        });

    </script>


</body>

</html>