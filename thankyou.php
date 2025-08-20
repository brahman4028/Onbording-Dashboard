<?php include 'db.php';


$fullname = "Unknown";
$supportemail = "Not available"; // default fallback

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo $id;
  // Validate and retrieve 'gstin'
  if (!isset($_GET['gstin']) || empty($_GET['gstin'])) {
    // echo $_GET['gstin'];
    die("Missing GSTIN.");
  }
  $gstin = $_GET['gstin'];

  echo $gstin;


  // Validate and retrieve 'pan'
  if (!isset($_GET['pan']) || empty($_GET['pan'])) {
    die("Missing PAN.");
  }
  $pan = $_GET['pan'];

  echo $pan;

 $merQuery = "SELECT * FROM business_applications 
             WHERE id = '$id' AND gstin = '$gstin' AND pan = '$pan'";
$merResult = mysqli_query($mysqli, $merQuery);

$merData = mysqli_fetch_assoc($merResult);
 $fullname = $merData['fullname'];
    $supportemail = $merData['supportemail'];

    echo $fullname;
    echo $supportemail;

// if ($merResult && mysqli_num_rows($merResult) > 0) {
    

   

//     // ✅ Do whatever you need with the data here
// } else {
//     die("No application found with the provided details.");
// }


  $stmt->close();
} else {
  die("Invalid or missing ID.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/starfav.png" type="image/png" />
  <title>Thank You</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .thankyou-wrapper {
      height: 100vh;
    }

    .thankyou-text h1 {
      font-weight: bold;
      font-size: 60px !important;
    }

    .thankyou-img {
      /* background: url('./assets/images/parrot.jpg') no-repeat center center; */
      background-size: cover;
      height: 100%;
      width: 100%;
    }

    .btn-back {
      border-radius: 50px;
      padding: 0.5rem 1.5rem;
      font-weight: 500;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .autth-img-cover-login {
      background-image: url('./assets/images/sky.jpg');
      background-size: cover;
      background-position: left center;
      background-repeat: no-repeat;
      width: 100%;
      height: 100%;
      /* or set a fixed height like 400px if needed */
    }

    .blr {
      background-color: rgba(254, 254, 254, 0.69) !important;
      backdrop-filter: blur(30px) !important;

    }
  </style>
</head>

<body>

  <div class="">
    <div class="row thankyou-wrapper d-flex align-items-center autth-img-cover-login">

      <!-- Left Text Section -->
      <div class="col-md-6 thankyou-wrapper d-flex p-6 flex-column justify-content-center align-items-center text-center px-5 blr">
        <div>
          <img src="assets/images/itstarlogo.png" alt="" width="200px" class="mb-5">
        </div>
        <p class="text-muted mb-1">Thankyou, <span class="text-primary"><?php echo htmlspecialchars($fullname); ?></span></p>
        <h1 class="mb-3" style="font-size: 60px;">We’ve Got Your Application</h1>
        <p class="mb-2">We've received your details and will review your application within 24 hours.</p>
        <p class="mb-4">You'll get a confirmation and next steps by email at <span class="text-primary"><?php echo htmlspecialchars($supportemail); ?></span> shortly.</p><br>
        <p>Your Application id : <span class="text-primary fs-2"><?php echo htmlspecialchars($id); ?><span></p><br>
        <?php echo "<a href='view_application.php?id={$id}&gstin={$gstin}&pan={$pan}' class='btn btn-primary btn-back mt-4' style='box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;'>" ?>
        View your application status <i class="bx bx-send ms-1"></i>
        </a>
      </div>

      <!-- Right Image Section -->
      <div class="col-md-6 p-0 h-100">
        <div class="thankyou-img"></div>
      </div>

    </div>
  </div>

  <!-- Bootstrap Icons (optional for arrow icon) -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</body>

</html>