<?php
require_once __DIR__ . '/fpdf/fpdf.php';
include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("Invalid ID");
}

$result = mysqli_query($mysqli, "SELECT * FROM business_applications WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("No record found");
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Business Application Details', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 11);

// Utility function to display label-value rows
function printRow($pdf, $label, $value) {
    $pdf->Cell(60, 8, $label, 0, 0);
    $pdf->MultiCell(0, 8, $value);
}

// List of fields to show
$fields = [
    'Application ID' => $data['id'],
    'Business Name' => $data['businessname'],
    'Applicant Name' => $data['applicantname'],
    'Type of Entity' => $data['entity'],
    'Date of Incorporation' => $data['doi'],
    'Nature of Business' => $data['nob'],
    'Business Category' => $data['businesscategory'],
    'Business Subcategory' => $data['businesssubcategory'],
    'GSTIN' => $data['gstin'],
    'Business PAN' => $data['pan'],
    'Registered Address' => $data['registeredbsuiness'],
    'Operating Address' => $data['operatingaddress'],
    'Website URL' => $data['url'],
    'Business Number' => $data['businessnumber'],
    'Alternate Number' => $data['alternnumber'],
    'Support Email' => $data['supportemail'],
    'Signatory Full Name' => $data['fullname'],
    'Designation' => $data['designation'],
    'Contact Number' => $data['number'],
    'Personal Email' => $data['personalemail'],
    'Aadhaar Number' => $data['aadhaarnumber'],
    'PAN Number' => $data['pannumber'],
    'Additional Full Name' => $data['fullnameadn'],
    'Additional Designation' => $data['designationadn'],
    'Additional Contact' => $data['numberadn'],
    'Additional Email' => $data['personalemailadn'],
    'Additional Aadhaar' => $data['aadhaarnumberadn'],
    'Additional PAN' => $data['pannumberadn'],
    'Total Volume' => $data['totalvolume'],
    'Users' => $data['numberofusers'],
    '6-Month Amount Projection' => $data['sixmonthprojectionamount'],
    '6-Month User Projection' => $data['sixmonthprojectionuser'],
    'Total Transactions' => $data['numoftransactions'],
    'Disbursed Amount' => $data['disbursedamount'],
    'Min Transaction' => $data['mintransaction'],
    'Max Transaction' => $data['maxtransaction'],
    'Threshold Limit' => $data['thresholdlimit'],
    'Submitted At' => date('F d, Y', strtotime($data['created_at'])),
];

foreach ($fields as $label => $value) {
    printRow($pdf, $label . ':', $value ?? 'N/A');
}

$pdf->Output('I', 'Merchant_' . $data['id'] . '.pdf');
?>
