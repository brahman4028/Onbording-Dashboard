<?php




$photograph = getSignedUrl($docData['photograph']);

// echo $photograph;


                            if ($application_id != '' && $status != "Cancelled" && $merchant_trash != "y") {
                                echo '
                                <div class="card p-3 rounded-4" style="  background: linear-gradient(135deg, #f8f9fa, #e9ecef); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.3);">
                                 <div class="row g-3">
                                 <!-- Left Section -->
        <div class="col-md-8 d-flex justify-content-between align-items-start" style=" height:100%; justify-content:space-between; flex-direction:column;">
        <div class="col-md-8 d-flex justify-content-between align-items-start" style=" height:100%; justify-content:space-between; flex-direction:column;">
        <div >
            <div class="">
            <h6class="mb-1 fw-bold text-dark"> Application ID : <b class="text-primary">' . $application_id . '</b></h5>
                <h5 class="mb-1 fw-bold text-dark">' . htmlspecialchars($appData["businessname"]) . '</h5>
                <p class="text-muted mt-1 mb-3"><strong>GSTIN:</strong> ' . htmlspecialchars($appData["gstin"]) . '</p>
            </div>
        </div>
            <div class="mt-2">
                <small class="text-muted d-block">Date & Time: ' . htmlspecialchars($appData["created_at"]) . '</small>
                <span class="mt-1 d-inline-block">Application status: <span class="badge bg-warning text-dark">' . htmlspecialchars($appData["status"]) . '</span></span>
            </div>
        </div>
        </div>
        <!-- Right Section: Photo -->
        <div class="col-md-4 text-end">
            <img src="' . $photograph . '" alt="Applicant Photo" class="img-thumbnail rounded-3 border-0" style="width: 200px;  object-fit: cover; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);">
            <p class="mt-2 mb-0 text-muted small">Applicant:</p>
            <p class="fw-semibold text-dark mb-0">' . htmlspecialchars($appData["fullname"]) . '</p>
        </div>
    </div>
</div>
<div class="mt-2">
    <a target="_blank" href="merchant_application.php?id=' . urlencode($id) . '&gstin=' . urlencode($gstin) . '&pan=' . urlencode($pan) . '" class="btn btn-primary text-center btn-back px-3 py-1" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">
        View application <i class="bx bx-send ms-1"></i>
    </a>
</div>
'

;
                            } elseif ($status == "Cancelled" && $merchant_trash != "y") {
                                echo '
<div class="card text-center border-0 p-4" style="
    
    margin: auto; 
    border-radius: 1rem; 
    background: rgba(255, 255, 255, 0.6); 
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08); 
    backdrop-filter: blur(6px); 
    -webkit-backdrop-filter: blur(6px); 
    border: 1px solid rgba(255, 255, 255, 0.3);
">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-semibold text-dark">Application Declined</h5>
        <p class="card-text text-muted mb-4">
            Your previous application with ID <span class="text-dark fw-medium">' . htmlspecialchars($id) . '</span> was cancelled due to the reason <span class="text-dark fw-semibold">"' . htmlspecialchars($coment) . '"</span> please submit a fresh application.
        </p>
        <a href="../index.php" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
            Begin Onboarding
        </a>
    </div>
</div>';
                            } else {
                                echo '
<div class="card text-center border-0 p-4" style="
     
    margin: auto; 
    border-radius: 1rem; 
    background: rgba(255, 255, 255, 0.6); 
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); 
    backdrop-filter: blur(8px); 
    -webkit-backdrop-filter: blur(8px); 
    border: 1px solid rgba(255, 255, 255, 0.3);
">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-semibold text-dark">You\'re Almost There!</h5>
        <p class="card-text text-muted mb-4">It looks like you haven’t filled out your form yet. Start now to complete your onboarding.</p>
        <a href="../index.php" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.2);">
            Begin Onboarding
        </a>
    </div>
</div>';
                            }
                            ?>