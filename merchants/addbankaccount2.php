 <div class="">
     <form id="addbankAccountForm2" enctype="multipart/form-data">
         <div class="bg-white p-3 rounded ">
             <!-- Main Title -->
             <h4 class="mb-1">Secondary Bank Account Details</h4>
             <p class="text-muted mb-3">Please enter the bank details for transactions and payouts.</p>
             <div class="section-divider mb-3"></div>

             <!-- Section 1: Bank Account Info account 2 -->
             <div class="row align-items-start mb-4">
                 <div class="col-md-4">
                     <div class="form-label">Bank Information</div>
                     <div class="form-subtext text-muted">Enter your beneficiary bank account details accurately.</div>
                 </div>
                 <div class="col-md-8">
                     <div class="row g-3">
                        <input type="hidden" name="id" value="<?php echo $appData['id'] ?>">
                         <div class="col-md-6">
                             <label class="form-label">Account Holder Name</label>
                             <input type="text" class="form-control" name="accountnameadn" id="accountnameadn" placeholder="John Doe" required>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Bank Name</label>
                             <input type="text" class="form-control" name="banknameadn" id="banknameadn" placeholder="Bank Name" required>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Branch Name</label>
                             <input type="text" class="form-control" name="branchnameadn" id="branchnameadn" placeholder="Branch Name" required>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Account Number</label>
                             <input type="text" class="form-control" name="accountnumberadn" id="accountnumberadn" placeholder="Account Number" required>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">IFSC Code</label>
                             <input type="text" class="form-control text-uppercase" name="ifsccodeadn" id="ifsccodeadn" placeholder="e.g SBIXXXX123" required>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label">Account Type</label>
                             <select class="form-select" name="accounttypeadn" required id="accounttypeadn">
                                 <option selected disabled>--Select--</option>
                                 <option value="Saving Account">Saving Account</option>
                                 <option value="Current Account">Current Account</option>
                             </select>
                         </div>

                     </div>


                 </div>
             </div>
         </div>


         <div class="section-divider mb-3"></div>

         <!-- Section 2: Verify Account 2 -->
         <div class="row align-items-start mb-4">
             <div class="col-md-4">
                 <div class="form-label">Verify Account</div>
                 <div class="form-subtext text-muted">Upload a document to verify the bank account.</div>
             </div>
             <div class="col-md-8">
                 <div class="mb-3">
                     <label class="form-label">Upload Cancelled Cheque / Bank Passbook</label>
                     <input type="file" class="form-control" name="cancelledchequefileadn" id="cancelledchequefileadn" >
                     <small class="form-text text-muted">Make sure your name, account number, and IFSC are clearly visible.</small>
                 </div>
                 <!-- verified -->
             </div>
         </div>

         <!-- account 2 Buttons -->
         <div class="d-flex justify-content-end mt-4">
             <button class="btn btn-light border me-2" type="button" onclick="showTab(`dashboard`)" id="closepage">Cancel</button>
             <button class="btn btn-primary border me-2" type="submit" onclick="showTab(`addsecondarybankaccount`)">Update bank account</button>
         </div>
     </form>
     <!-- notification -->
     <div id="toast2" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999; display: none;">
         <div class="toast align-items-center text-white bg-success border-0 show">
             <div class="d-flex">
                 <div class="toast-body">
                     Account added successfully!
                 </div>
             </div>
         </div>
     </div>
 </div>

