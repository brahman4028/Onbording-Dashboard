<?php include 'db.php'; 


$fullname = "Unknown";
$supportemail = "Not available"; // default fallback

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $mysqli->prepare("SELECT fullname, supportemail FROM business_applications WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $fullname = $row['fullname'];
        $supportemail = $row['supportemail'];
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      background: url('./assets/images/parrot.jpg') no-repeat center center;
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
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row thankyou-wrapper d-flex align-items-center">
    
    <!-- Left Text Section -->
    <div class="col-md-6 d-flex p-6 flex-column justify-content-center align-items-center text-center px-5">
      <div>
        <img src="assets/images/itstarlogo.png" alt="" width="200px" class="mb-5">
      </div>
      <h1 class="mb-3" style="font-size: 60px;">File has been updated Successfully</h1>
      <a href="/Onbording-Dashboard/merchants-list.php" class="btn btn-primary btn-back mt-4" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">
        Back to Home <i class="bx bx-send ms-1"></i>
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
