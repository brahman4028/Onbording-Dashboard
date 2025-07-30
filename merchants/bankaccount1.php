 <div class="">
     <form id="bankAccountForm">
         <div class="bg-white p-3 rounded ">
             <!-- Main Title -->
             <h3 class="mb-1">Bank Account Details</h3>
             <p class="text-muted mb-3">Please enter the bank details for transactions and payouts.</p>
             <div class="section-divider mb-3"></div>

             <!-- Section 1: Bank Account Info account 1 -->
             <div class="row align-items-start mb-4">
                 <div class="col-md-4">
                     <div class="form-label">Bank Information</div>
                     <div class="form-subtext text-muted">Enter your beneficiary bank account details accurately.</div>
                 </div>
                 <div class="col-md-8">
                     <div class="row g-3">
                         <div class="col-md-6">
                             <label class="form-label">Account Holder Name</label>
                             <input type="text" class="form-control" name="account_holder" placeholder="John Doe" value="<?php echo $appData['accountname'] ?>" disabled>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Bank Name</label>
                             <input type="text" class="form-control" name="account_number" placeholder="Bank Name" value="<?php echo $appData['bankname'] ?>" disabled>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Branch Name</label>
                             <input type="text" class="form-control" name="confirm_account_number" placeholder="Branch Name" value="<?php echo $appData['branchname'] ?>" disabled>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Account Number</label>
                             <input type="text" class="form-control" name="confirm_account_number" placeholder="Account Type" value="<?php echo $appData['accountnumber'] ?>" disabled>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">IFSC Code</label>
                             <input type="text" class="form-control text-uppercase" name="ifsc" placeholder="e.g SBIXXXX123" value="<?php echo $appData['ifsccode'] ?>" disabled>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Account Type</label>
                             <input type="text" class="form-control" name="confirm_account_number" placeholder="Saving/Current" value="<?php echo $appData['accounttype'] ?>" disabled>
                         </div>

                     </div>


                 </div>
             </div>
         </div>


         <div class="section-divider mb-3"></div>

         <!-- Section 2: Verify Account -->
         <div class="row align-items-start mb-4">
             <div class="col-md-4">
                 <div class="form-label">Verify Account</div>
                 <div class="form-subtext text-muted">Upload a document to verify the bank account.</div>
             </div>
             <div class="col-md-8">
                 <div class="mb-3">
                     <label class="form-label">Upload Cancelled Cheque / Bank Passbook</label>
                     <input type="file" class="form-control" name="bank_proof" disabled>
                     <small class="form-text text-muted">Make sure your name, account number, and IFSC are clearly visible.</small>
                     <?php if (!empty($docData['cancelledchequefile'])): ?>
                         <a href="<?= $docData['cancelledchequefile'] ?>" target="_blank">
                             View uploaded file
                         </a>
                         <div id="cancelledchequefilepreview" data-fileurl="<?= $docData['cancelledchequefile'] ?>"></div>
                     <?php else: ?>
                         <p style="color: #888;">No file uploaded</p>
                     <?php endif; ?>
                 </div>
                 <!-- verified -->
                 <?php
                    if ($appData['bankverification'] == "Verified" && $appData['bankeject'] == "no") {
                        echo ' <div class=" mt-3  d-inline-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm border border-success" style="background: #e9fcef; box-shadow: 0 2px 6px rgba(0, 128, 0, 0.1);">
                                            <i class="bx bxs-badge-check text-success fs-5"></i>
                                            <span class="text-success fw-semibold small">Bank Account Verified</span>
                                        </div>';
                    } elseif ($appData['bankverification'] == 'In Review' && $appData['bankeject'] == "no" && $appData['accountname'] != '') {
                        echo ' <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm border border-warning" style="background: #fff8e6; box-shadow: 0 2px 6px rgba(255, 193, 7, 0.08);">
                                            <i class="bx bxs-time-five text-warning fs-5"></i>
                                             <span class="text-warning fw-semibold small">Bank Account Under Review</span>
                                            </div>';
                    } elseif ($appData['bankeject'] == "yes" ) {
                        echo '<!-- not verified -->
                                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm border border-danger" style="background: #fdecea; box-shadow: 0 2px 6px rgba(255, 0, 0, 0.08);">
                                            <i class="bx bxs-error-circle text-danger fs-5"></i>
                                            <span class="text-danger fw-semibold small">Bank Account Ejected</span>
                                        </div>';
                    } 
                    elseif ($appData['accountnumber'] == "" ) {
                        echo '';
                    } 
                    else {
                        echo '<!-- not verified -->
                                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm border border-danger" style="background: #fdecea; box-shadow: 0 2px 6px rgba(255, 0, 0, 0.08);">
                                            <i class="bx bxs-error-circle text-danger fs-5"></i>
                                            <span class="text-danger fw-semibold small">Bank Account Not Verified</span>
                                        </div>';
                    }
                    ?>
             </div>
         </div>

         <!-- account 1 Buttons -->
         <div class="d-flex justify-content-end mt-4">
             <?php
                if ($appData['bankverification'] == "Cancelled" && $appData['bankeject'] == "no") {
                    echo '<button class="btn btn-light border me-2" type="button" onclick="showTab("yourApp")">Edit bank account</button>';
                }

                ?>
             <?php
                if ($appData['bankeject'] == "no" && $appData['accountname'] != "") {
                    echo '<div class="d-flex" style="flex-direction:column; justify-content:end; align-items:end;"> <div><div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm border border-danger" style="background: #fdecea;  box-shadow: 0 2px 6px rgba(255, 0, 0, 0.08); f">
    <i class="bx bxs-error-circle text-danger fs-5"></i>
    <span class="text-danger fw-semibold small">
        <a href="eject_account.php?accountnumber=' . $accountnumber . '" class="ms-3" style="text-decoration: none; color: red;" onclick="return confirm(\'⚠️ Are you sure you want to delete this application? This action cannot be undone.\')">Eject Account</a>
    </span>
</div></div>

<p class="text-danger small mt-2 mb-0">⚠️ Once you eject this account, you won\'t be able to edit or add it again.</p> </div>';

                }

                ?>

         </div>
     </form>
 </div>


 <!-- bank account 2 -->