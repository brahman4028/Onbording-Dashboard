 <?php
                                    if ($appData['kycverification'] == "success" || $appData['kycverification'] == "Verified" ){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">KYC Verification: <span class="badge bg-success ">Completed</span></li>';
                                    }
                                    elseif($appData['kycverification'] == "Pending"){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">KYC Verification: <span class="badge badge bg-info ">Pending</span></li>';
                                    }
                                    else{
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">KYC Verification: <span class="badge badge bg-warning ">'.$appData['status'].'</span></li>';
                                    }                                                                 
                                    ?>
                                    <!-- Business Documents -->
                                    <?php
                                    if ($appData['documentsverification'] == "success" || $appData['documentsverification'] == "Verified" ){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Business Documents Verification: <span class="badge bg-success ">Completed</span></li>';
                                    }
                                    elseif($appData['documentsverification'] == "Pending"){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Business Documents Verification: <span class="badge badge bg-info ">Pending</span></li>';
                                    }
                                    else{
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Business Documents Verification: <span class="badge badge bg-warning ">'.$appData['status'].'</span></li>';
                                    }
                                    ?>
                                   <!-- Bank Account Verification -->
                                    <?php
                                    if ($appData['bankverification'] == "success" || $appData['bankverification'] == "Verified" ){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Bank Account Verification: <span class="badge bg-success ">Completed</span></li>';
                                    }
                                    elseif($appData['bankverification'] == "Pending"){
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Bank Account Verification: <span class="badge badge bg-info ">Pending</span></li>';
                                    }
                                    else{
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">Bank Account Verification: <span class="badge badge bg-warning ">'.$appData['status'].'</span></li>';
                                    }
                                    ?>