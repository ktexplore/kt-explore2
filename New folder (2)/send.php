<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // COMPANY EMAIL
    $companyEmail = "ktexploretravel@gmail.com";

    // GET FORM DATA
    $customerName  = htmlspecialchars($_POST['name']);
    $customerEmail = htmlspecialchars($_POST['email']);
    $message       = htmlspecialchars($_POST['message']);

    /* ======================
       1. EMAIL TO COMPANY
       ====================== */
    $subjectCompany = "New Booking Request - KT Explore";
    $bodyCompany = "
    New customer inquiry:

    Name: $customerName
    Email: $customerEmail

    Message:
    $message
    ";

    $headersCompany = "From: $customerEmail";

    mail($companyEmail, $subjectCompany, $bodyCompany, $headersCompany);

    /* ======================
       2. AUTO RESPONSE TO CUSTOMER
       ====================== */
    $subjectCustomer = "Thank you for contacting KT Explore";
    $bodyCustomer = "
    Dear $customerName,

    Thank you for contacting KT Explore!

    We have received your request and our team will get back to you shortly.

    If this was urgent, feel free to reply to this email.

    Best regards,
    KT Explore Travel & Tours
    Addis Ababa, Ethiopia
    ";

    $headersCustomer = "From: KT Explore <ktexploretravel@gmail.com>";

    mail($customerEmail, $subjectCustomer, $bodyCustomer, $headersCustomer);

    echo "success";
}
?>
