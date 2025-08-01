<script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>

    <!-- html2pdf for converting HTML to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- pdf-lib for merging PDFs/images -->
    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/chartjs/js/chart.js"></script>
    <script src="../assets/js/index.js"></script>
    <!--app JS-->
    <script src="../assets/js/app.js"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>


    <!-- select dropdowndown script -->
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const entity = "<?= $appData['entity'] ?? '' ?>";
            const select = document.getElementById('entity');
            if (select && entity) {
                select.value = entity;
                setPreviewValue(select, 'entityvalue');
            }
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const entity = "<?= $appData['accounttype'] ?? '' ?>";
            const select = document.getElementById('accounttype');
            if (select && entity) {
                select.value = entity;
                setPreviewValue(select, 'accounttypevalue');
            }
        });
    </script>


    <!-- preview files -->


    <!-- ///////////////////// -->


    <!--  -->

    <script>
        $(function() {
            $(".dark-mode").on("click", function() {

                if ($(".dark-mode-icon i").attr("class") == 'bx bx-sun') {
                    $(".dark-mode-icon i").attr("class", "bx bx-moon");
                    $("html").attr("class", "light-theme")
                } else {
                    $(".dark-mode-icon i").attr("class", "bx bx-sun");
                    $("html").attr("class", "dark-theme")
                }

            })

        });
    </script>

    <!-- image validation and pdf merger -->


    <!-- image validation and pdf merger -->

    <script>
        const uploadedFiles = {}; // Globally track files by 'name'

        function validateFile(input, msgId, previewId) {
            const file = input.files[0];
            const msg = document.getElementById(msgId);
            const preview = document.getElementById(previewId);
            const inputKey = input.name;

            msg.innerText = '';
            preview.innerHTML = '';

            const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg", "image/png", "image/webp"];
            const maxSize = 2 * 1024 * 1024;

            if (!file || !allowedTypes.includes(file.type) || file.size > maxSize) {
                msg.innerText = "❌ Invalid or too large file.";
                msg.style.color = "red";
                input.value = '';
                return;
            }

            // ✅ Sanitize file name
            const sanitizedFileName = file.name.replace(/[^a-zA-Z0-9.\-_]/g, '_');
            const sanitizedFile = new File([file], sanitizedFileName, {
                type: file.type
            });
            uploadedFiles[inputKey] = sanitizedFile;

            msg.innerText = "✅ File is valid.";
            msg.style.color = "green";
            preview.innerHTML = `<strong>${sanitizedFileName}</strong><br>`;

            if (file.type === "application/pdf") {
                const iframe = document.createElement("iframe");
                iframe.src = URL.createObjectURL(sanitizedFile);
                iframe.style.width = "100%";
                iframe.style.height = "400px";
                iframe.style.border = "1px solid #ccc";
                preview.appendChild(iframe);
            } else if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.border = "1px solid #ccc";
                    img.style.marginTop = "10px";
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }

        async function downloadKYC() {
            console.log("hellpo");
            const element = document.getElementById('kycPreview');
            const businessName = document.getElementById('businame')?.value.trim() || 'KYC';
            console.log(businessName);
            const cleanName = businessName.replace(/[^a-zA-Z0-9]/g, '_');

            const previewIds = [
                'aadhaarpreview', 'personalpanpreview', 'photographpreview',
                'addressfilepreview', 'coifilepreview', 'moafilepreview',
                'aoafilepreview', 'brfilepreview', 'udyamfilepreview',
                'gstinfilepreview', 'bofilepreview', 'rentfilepreview',
                'annexurebfilepreview', 'cancelledchequefile', 'aadhaaradnfilepreview', 'personalpanadnfilepreview', 'signatoryphotoadnfilepreview', 'addressadnfilepreview', 'signatorysignfilepreview', 'signatorysignadnfilepreview', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            // 🧼 Step 1: Remove preview images/iframes (but keep names/links)
            previewIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    [...el.children].forEach(child => {
                        if (child.tagName === "IFRAME" || child.tagName === "IMG") {
                            el.removeChild(child);
                        }
                    });
                }
            });

            // 📄 Step 2: Generate PDF from HTML
            const htmlBlob = await html2pdf()
                .set({
                    margin: 0.8,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                })
                .from(element)
                .outputPdf('blob');

            const htmlBytes = await htmlBlob.arrayBuffer();
            const finalPdf = await PDFLib.PDFDocument.create();
            const htmlDoc = await PDFLib.PDFDocument.load(htmlBytes);
            const pages = await finalPdf.copyPages(htmlDoc, htmlDoc.getPageIndices());
            pages.forEach(p => finalPdf.addPage(p));

            // ➕ Step 3: Add uploaded files
            for (const key in uploadedFiles) {
                const file = uploadedFiles[key];
                const bytes = await file.arrayBuffer();

                if (file.type === 'application/pdf') {
                    const extDoc = await PDFLib.PDFDocument.load(bytes);
                    const extPages = await finalPdf.copyPages(extDoc, extDoc.getPageIndices());
                    extPages.forEach(p => finalPdf.addPage(p));
                } else if (file.type.startsWith('image/')) {
                    const imgBytes = new Uint8Array(bytes);
                    const embedded = file.type.includes('png') ?
                        await finalPdf.embedPng(imgBytes) :
                        await finalPdf.embedJpg(imgBytes);

                    const page = finalPdf.addPage();
                    const pageWidth = page.getWidth();
                    const pageHeight = page.getHeight();

                    const margin = 100; // 100px margin on both left and right
                    const availableWidth = pageWidth - 2 * margin;

                    const originalWidth = embedded.width;
                    const originalHeight = embedded.height;
                    const aspectRatio = originalHeight / originalWidth;

                    const targetWidth = availableWidth;
                    const targetHeight = targetWidth * aspectRatio;

                    page.drawImage(embedded, {
                        x: margin,
                        y: pageHeight - targetHeight - margin, // top margin
                        width: targetWidth,
                        height: targetHeight
                    });
                }

            }

            // 🔽 Step 4: Download
            const finalBytes = await finalPdf.save();
            const blob = new Blob([finalBytes], {
                type: 'application/pdf'
            });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `${cleanName}-KYC-Onboarding.pdf`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // ✅ Auto-trigger validateFile() on page load and bind blur
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type="file"]').forEach(input => {
                const msgId = input.getAttribute('data-msg-id');
                const previewId = input.getAttribute('data-preview-id');

                // Run on page load if file is already selected (browser may retain)
                if (input.files.length > 0) {
                    validateFile(input, msgId, previewId);
                }

                // Also trigger on blur
                input.addEventListener('blur', function() {
                    validateFile(this, msgId, previewId);
                });
            });
        });
    </script>

    <!-- reflecting pdf on onload -->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const fileDivIds = [
                'aadhaarpreview', 'personalpanpreview', 'photographpreview',
                'addressfilepreview', 'coifilepreview', 'moafilepreview',
                'aoafilepreview', 'brfilepreview', 'udyamfilepreview',
                'gstinfilepreview', 'bofilepreview', 'rentfilepreview',
                'annexurebfilepreview', 'cancelledchequefile', 'aadhaaradnfilepreview', 'personalpanadnfilepreview', 'signatoryphotoadnfilepreview', 'addressadnfilepreview', 'signatorysignfilepreview', 'signatorysignadnfilepreview', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            fileDivIds.forEach(id => {
                const container = document.getElementById(id);
                if (!container) return;

                const link = container.querySelector('a');
                if (!link) return;

                const fileUrl = link.href;
                const fileName = fileUrl.split('/').pop();
                const inputName = id.replace('preview', ''); // assume name is like 'aadhaarfile'

                fetch(fileUrl)
                    .then(response => response.blob())
                    .then(blob => {
                        const file = new File([blob], fileName, {
                            type: blob.type
                        });
                        uploadedFiles[inputName] = file;
                        console.log(`✅ File loaded: ${fileName} (${inputName})`);
                    })
                    .catch(err => {
                        console.warn(`❌ Could not fetch: ${fileUrl}`, err);
                    });
            });
        });
    </script>


    <!-- /////////////// -->

    <!-- reflecting value on onload function -->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // 👉 1. For normal inputs (text/date/email etc.)
            document.querySelectorAll('input[name]:not([type="file"]), select[name], textarea[name]').forEach(el => {
                const name = el.name;
                const targetId = name + 'value';
                const target = document.getElementById(targetId);
                let value = el.value?.trim() || '—';

                // Format date as DD/MM/YYYY if applicable
                if (el.type === 'date' && value.includes('-')) {
                    const parts = value.split("-");
                    if (parts.length === 3) {
                        value = `${parts[2]}/${parts[1]}/${parts[0]}`;
                    }
                }

                if (target) target.textContent = value;
            });

            // 👉 2. For file inputs — we show just the filename in preview
            document.querySelectorAll('input[type="file"][name]').forEach(input => {
                const name = input.name; // e.g., 'aadhaarfile'
                const previewId = name + 'preview'; // e.g., 'aadhaarpreview'
                const preview = document.getElementById(previewId);

                consol.log("ds")

                // Extract filename if already filled (from server-rendered value)
                const fileName = input.defaultValue || input.getAttribute('value') || ''; // fallback
                if (preview && fileName) {
                    const base = fileName.split(/[\\/]/).pop(); // clean up path if present
                    preview.innerHTML = `<strong>${base}</strong>`;
                }
            });
        });
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[onblur]').forEach(el => {
                const attr = el.getAttribute('onblur');

                // Look for validatePAN(this, 'error-id', 'target-id')
                const match = attr.match(/validatePAN\(this,\s*'[^']+',\s*'([^']+)'\)/);
                if (match && match[1]) {
                    const targetId = match[1];
                    const target = document.getElementById(targetId);
                    const value = el.value?.trim() || '—';

                    if (target) target.textContent = value;
                }
            });
        });
    </script>

    <!-- Step 1: Pass PHP array to JavaScript -->
    <script>
        const uploadedFileData = <?= json_encode($appData ?? []); ?>; // From PHP e.g. ['aadhaarfile' => 'aadhaar.pdf']
    </script>

    <!-- Step 2: Show all uploaded files in their respective preview divs -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            if (!uploadedFileData || typeof uploadedFileData !== 'object') return;

            Object.entries(uploadedFileData).forEach(([key, fileName]) => {
                if (!fileName || typeof fileName !== 'string') return;

                // Transform 'aadhaarfile' => 'aadhaarpreview', 'panfile' => 'panpreview'
                const previewId = key.replace('file', 'preview');
                const previewDiv = document.getElementById(previewId);
                const fileUrl = `uploads/${fileName}`; // Adjust if your upload path is different

                if (previewDiv) {
                    previewDiv.innerHTML = ''; // Clear any old content

                    const ext = fileName.split('.').pop().toLowerCase();
                    const isImage = ['jpg', 'jpeg', 'png', 'webp'].includes(ext);

                    if (ext === 'pdf') {
                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.textContent = `📄 ${fileName}`;
                        link.target = '_blank';
                        link.style.display = 'inline-block';
                        link.style.marginTop = '6px';
                        link.style.color = '#0d6efd';
                        previewDiv.appendChild(link);
                    } else if (isImage) {
                        const img = document.createElement('img');
                        img.src = fileUrl;
                        img.alt = fileName;
                        img.style.maxWidth = '150px';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '6px';
                        previewDiv.appendChild(img);
                    } else {
                        previewDiv.textContent = fileName; // fallback plain name
                    }
                }
            });
        });
    </script>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const fileFields = [
                'aadhaarfile', 'panfile', 'photograph', 'addressfile', 'coifile',
                'moafile', 'aoafile', 'brfile', 'udyamfile', 'gstinfile',
                'bofile', 'cancelledchequefile', 'rentfile', 'annexurebfile', 'aadhaaradnfile', 'personalpanadnfile', 'signatoryphotoadnfile', 'addressadnfile', 'signatorysignfile', 'signatorysignadnfile', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            fileFields.forEach(field => {
                const previewId = field + 'preview';
                const previewEl = document.getElementById(previewId);

                if (!previewEl) return;

                // Look for anchor tag (already added by PHP)
                const linkEl = document.querySelector(`a[href*="${field}"]`);
                if (!linkEl) return;

                const fileUrl = linkEl.getAttribute('href');
                const fileName = fileUrl.split('/').pop();

                // Show file name and working preview link
                previewEl.innerHTML = `
            <strong>${fileName}</strong><br>
            <a href="${fileUrl}" target="_blank">📄 View File</a>
        `;
            });
        });
    </script>




    <!-- //////////////// -->


    <!-- timestamp for pdf -->
    <!-- <script>
        window.onload = function() {
            const now = new Date();
            const formatted = now.toLocaleString('en-IN', {
                dateStyle: 'medium',
                timeStyle: 'short'
            });

            document.getElementById('currentDateTime').textContent = formatted;
        };
    </script> -->

    <!--  -->

    <!-- //////////// -->

    <!-- value transfer to pdf elements -->
    <script>
        function setPreviewValue(el, targetId) {
            const target = document.getElementById(targetId);
            let value = el.value?.trim(); // remove extra spaces



            // Check if value exists
            if (!value) return;

            // Optional: Format date if type="date"
            if (el.type === "date" && value.includes("-")) {
                const parts = value.split("-");
                if (parts.length === 3) {
                    value = `${parts[2]}/${parts[1]}/${parts[0]}`; // DD/MM/YYYY
                }
            }

            if (target) {
                target.textContent = value;
            }
        }
    </script>

    <!-- check box code -->

    <script>
        function updateIcon(el, iconId) {
            const icon = document.getElementById(iconId);
            if (!icon) return;

            if (el.checked) {
                icon.classList.remove('bx-checkbox');
                icon.classList.add('bx-check-square');
            } else {
                icon.classList.remove('bx-check-square');
                icon.classList.add('bx-checkbox');
            }
        }
    </script>



    <script>
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // ❌ This blocks it always!
            if (!form.checkValidity()) {
                pos3_warning_noti();
                return;
            }
            form.submit(); // ✅ Add this if using preventDefault
        });
    </script>

    <script>
        function startOnboardingProcess() {
            // Hide the target div

            document.getElementById('startonboardingpage').classList.add('d-none');

            // Trigger the click on startonboarding button
            document.getElementById('stepper3trigger1').click();
        }
    </script>

    <!-- gsti validation message -->
    <!-- <script>
        async function validateGSTIN() {
            const gstinEl = document.getElementById('gstin');
            const errorEl = document.getElementById('gstin-error');
            const infoDiv = document.getElementById('gstin-info');
            const companyNameEl = document.getElementById('companyName');
            const gstinStatusEl = document.getElementById('gstinStatus');

            const gstin = gstinEl.value.trim().toUpperCase();
            if (gstin.length !== 15) {
                errorEl.textContent = '⚠️ GSTIN must be 15 characters';
                errorEl.classList.remove('d-none');
                infoDiv.classList.add('d-none');
                return;
            }
            errorEl.classList.add('d-none');

            try {
                const response = await fetch('https://api.cleartax.in/gst/api/v0.2/returns/gstin/gstin-verification', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Cleartax-Auth-Token': 'YOUR_CLEARTAX_TOKEN'
                    },
                    body: JSON.stringify({
                        gstin
                    })
                });

                if (!response.ok) throw new Error('API error');

                const data = await response.json();

                companyNameEl.textContent = data.lgnm || data.legal_name || 'Not available';
                gstinStatusEl.textContent = data.sts || data.status || 'Unknown';
                infoDiv.classList.remove('d-none');
            } catch (err) {
                console.error('GST fetch error:', err);
                errorEl.textContent = '⚠️ Error verifying GST details';
                errorEl.classList.remove('d-none');
                infoDiv.classList.add('d-none');
            }
        }
    </script> -->

    <!-- ////////////////// -->



    <!-- //////////////  image validation-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.stepper3 = new Stepper(document.querySelector("#stepper3"), {
                linear: false,
                animation: true
            });
        });


        // function validateFile(fileInput, spanId, previewId) {
        //     const messageSpan = document.getElementById(spanId);
        //     const previewDiv = document.getElementById(previewId);
        //     const file = fileInput.files[0];

        //     messageSpan.innerText = '';
        //     previewDiv.innerHTML = '';


        //     const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg", "image/png", "image/webp"];
        //     const maxSize = 2 * 1024 * 1024; // 2 MB

        //     if (!file) {
        //         messageSpan.innerText = "❌ No file selected.";
        //         messageSpan.style.color = "red";
        //         return false;
        //     }

        //     if (!allowedTypes.includes(file.type)) {
        //         messageSpan.innerText = "❌ Invalid file type.";
        //         messageSpan.style.color = "red";
        //         fileInput.value = "";
        //         return false;
        //     }

        //     if (file.size > maxSize) {
        //         messageSpan.innerText = "❌ File size exceeds 2MB.";
        //         messageSpan.style.color = "red";
        //         fileInput.value = "";
        //         return false;
        //     }

        //     messageSpan.innerText = "✅ File is valid.";
        //     messageSpan.style.color = "green";



        //     const fileURL = URL.createObjectURL(file);

        //     // Show Preview
        //     if (file.type.startsWith("image/")) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             const img = document.createElement('img');
        //             img.src = e.target.result;
        //             img.style.maxWidth = '60%';
        //             img.style.border = '1px solid #ccc';
        //             img.style.marginTop = '8px';
        //             previewDiv.appendChild(img);
        //         };
        //         reader.readAsDataURL(file);
        //     } else if (file.type === "application/pdf") {
        //         const link = document.createElement('a');
        //         link.href = URL.createObjectURL(file);
        //         link.target = "_blank";
        //         link.innerHTML = `📄 ${file.name}`;
        //         link.style.display = "inline-block";
        //         link.style.marginTop = "8px";
        //         previewDiv.appendChild(link);

        //     }





        //     return true;




        // }
    </script>

    <!-- on file preview code -->

    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('div[id$="preview"]').forEach(container => {
                const link = container.querySelector('a');
                if (link) {
                    const url = link.href;

                    // Remove duplicate previews if already added
                    const existingIframe = container.querySelector('iframe');
                    const existingImg = container.querySelector('img');
                    if (existingIframe || existingImg) return;

                    if (url.match(/\.pdf$/i)) {
                        const iframe = document.createElement('iframe');
                        iframe.src = url;
                        iframe.style.width = '100%';
                        iframe.style.height = '800px';
                        iframe.style.border = '1px solid #ccc';
                        container.appendChild(iframe);
                    } else if (url.match(/\.(jpe?g|png|webp)$/i)) {
                        const img = document.createElement('img');
                        img.src = url;
                        img.style.maxWidth = '60%';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '10px';
                        container.appendChild(img);
                    }
                }
            });
        });
    </script> -->


    <!-- reflecting value on onload function -->

    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            // 👉 1. For normal inputs (text/date/email etc.)
            document.querySelectorAll('input[name]:not([type="file"]), select[name], textarea[name]').forEach(el => {
                const name = el.name;
                const targetId = name + 'value';
                const target = document.getElementById(targetId);
                let value = el.value?.trim() || '—';

                // Format date as DD/MM/YYYY if applicable
                if (el.type === 'date' && value.includes('-')) {
                    const parts = value.split("-");
                    if (parts.length === 3) {
                        value = `${parts[2]}/${parts[1]}/${parts[0]}`;
                    }
                }

                if (target) target.textContent = value;
            });

            // 👉 2. For file inputs — we show just the filename in preview
            document.querySelectorAll('input[type="file"][name]').forEach(input => {
                const name = input.name; // e.g., 'aadhaarfile'
                const previewId = name + 'preview'; // e.g., 'aadhaarpreview'
                const preview = document.getElementById(previewId);

                consol.log("ds")

                // Extract filename if already filled (from server-rendered value)
                const fileName = input.defaultValue || input.getAttribute('value') || ''; // fallback
                if (preview && fileName) {
                    const base = fileName.split(/[\\/]/).pop(); // clean up path if present
                    preview.innerHTML = `<strong>${base}</strong>`;
                }
            });
        });
    </script> -->

    <!-- Step 2: Show all uploaded files in their respective preview divs -->
    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            if (!uploadedFileData || typeof uploadedFileData !== 'object') return;

            Object.entries(uploadedFileData).forEach(([key, fileName]) => {
                if (!fileName || typeof fileName !== 'string') return;

                // Transform 'aadhaarfile' => 'aadhaarpreview', 'panfile' => 'panpreview'
                const previewId = key.replace('file', 'preview');
                const previewDiv = document.getElementById(previewId);
                const fileUrl = `uploads/${fileName}`; // Adjust if your upload path is different

                if (previewDiv) {
                    previewDiv.innerHTML = ''; // Clear any old content

                    const ext = fileName.split('.').pop().toLowerCase();
                    const isImage = ['jpg', 'jpeg', 'png', 'webp'].includes(ext);

                    if (ext === 'pdf') {
                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.textContent = `📄 ${fileName}`;
                        link.target = '_blank';
                        link.style.display = 'inline-block';
                        link.style.marginTop = '6px';
                        link.style.color = '#0d6efd';
                        previewDiv.appendChild(link);
                    } else if (isImage) {
                        const img = document.createElement('img');
                        img.src = fileUrl;
                        img.alt = fileName;
                        img.style.maxWidth = '150px';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '6px';
                        previewDiv.appendChild(img);
                    } else {
                        previewDiv.textContent = fileName; // fallback plain name
                    }
                }
            });
        });
    </script> -->

    <!-- main end preview code -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('div[id$="preview"]').forEach(container => {
                const fileUrl = container.dataset.fileurl;

                if (!fileUrl) return;

                if (fileUrl.match(/\.pdf$/i)) {
                    const iframe = document.createElement('iframe');
                    iframe.src = fileUrl;
                    iframe.style.width = '100%';
                    iframe.style.height = '700px';
                    iframe.style.border = '1px solid #ccc';
                    iframe.style.marginTop = '10px';
                    container.appendChild(iframe);
                } else if (fileUrl.match(/\.(jpe?g|png|webp)$/i)) {
                    const img = document.createElement('img');
                    img.src = fileUrl;
                    img.style.maxWidth = '60%';
                    img.style.border = '1px solid #ccc';
                    img.style.marginTop = '10px';
                    container.appendChild(img);
                }
            });
        });
    </script>