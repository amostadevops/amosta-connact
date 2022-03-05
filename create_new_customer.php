<?php
    session_start();
    if(!isset($_SESSION['uname']))
    {
        echo "you are logged out";
        header('location:index.php');
    }

    include 'connect.php';

    if(isset($_POST['submit']))
    {
        $customer_type = mysqli_real_escape_string($conn, $_REQUEST['customer_type']);
        $is_gst_number = mysqli_real_escape_string($conn, $_REQUEST['gstno']);
        $company_name = mysqli_real_escape_string($conn, $_REQUEST['company_name']);
        $company_pan_card_number = mysqli_real_escape_string($conn, $_REQUEST['pan_number']);
        $gst_number = mysqli_real_escape_string($conn, $_REQUEST['gst_number']);
        $poc_name = mysqli_real_escape_string($conn, $_REQUEST['poc_name']);
        $poc_mobile = mysqli_real_escape_string($conn, $_REQUEST['poc_mobile_number']);
        $poc_email = mysqli_real_escape_string($conn, $_REQUEST['poc_email_id']);
        $company_address = mysqli_real_escape_string($conn, $_REQUEST['company_address']);
        $company_city = mysqli_real_escape_string($conn, $_REQUEST['company_city']);
        $company_district = mysqli_real_escape_string($conn, $_REQUEST['company_district']);
        $company_pincode = mysqli_real_escape_string($conn, $_REQUEST['company_pincode']);
        $individual_full_name = mysqli_real_escape_string($conn, $_REQUEST['individual_name']);
        $individual_mobile = mysqli_real_escape_string($conn, $_REQUEST['individual_mobile_number']);
        $individual_email = mysqli_real_escape_string($conn, $_REQUEST['individual_email_id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Customer - Amosta ConnAct</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <?php include 'top_bar_admin.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1 class="display-6">
                        Create New Customer
                    </h1>
                    <hr>
                </div>
            </div>
        </div>
        <form action="customer_registration.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid my-3">
                <div class="row text-center">
                    <div class="col-md-6 my-2">
                        Customer Type*
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <select class="form-select" id="select_id_show" name="customer_type">
                                <option disabled selected>Select Customer Type</option>
                                <option value="Company/Organisation">Company/Organisation</option>
                                <option value="Individual">Individual</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="company_registration">
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Do you have GST number?*
                        </div>
                        <div class="col-md-6 my-2">
                            <input type="radio" class="gstradio" name="gstno" value="Yes">
                            <label for="yes">YES</label>
                            <input type="radio" class="gstradio" name="gstno" value="No">
                            <label for="no">NO</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Company name as per Legal Entity*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="company_name" placeholder="Company Full Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            PAN Card Number*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="pan_number" placeholder="PAN Card Number" required>
                        </div>
                    </div>
                    <div class="row gst_number">
                        <div class="col-md-6 my-2 text-center">
                            GST Number*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="gst_number" placeholder="GST Number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            POC Name*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="poc_name" placeholder="Person Of Contact" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Mobile Number*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="number" name="poc_mobile_number" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Email Id*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="email" name="poc_email_id" placeholder="Email Id" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Company/Organisation Address*
                        </div>
                        <div class="col-md-6 my-2">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="company_address" placeholder="Company/Organisation Address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            City*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="company_city" placeholder="City" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            District*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="company_district" placeholder="District" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            State*
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <select class="form-select" name="company_state" required>
                                    <option disabled selected>Select State/Union Territory</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadra & Nagar Haveli and Daman & Diu">Dadra & Nagar Haveli and Daman & Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Ladakh">Ladakh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Pincode*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="number" name="company_pincode" placeholder="Pincode" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            GST Certificate*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="file" id="gst_certificate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            PAN Card*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="file" id="pan_card">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="d-grid gap-2 mx-auto my-3">
                                <input class="btn btn-success btn-block" type="submit" value="+ REGISTER" name="register_customer">
                            </div>   
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="d-grid gap-2 mx-auto my-3">
                                <input class="btn btn-warning btn-block" type="reset" value="RESET">
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="individual_registration">
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Full Name*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="text" name="individual_name" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Mobile Number*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="number" name="individual_mobile_number" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2 text-center">
                            Email Id*
                        </div>
                        <div class="col-md-6 my-2">
                            <input class="form-control" type="email" name="individual_email_id" placeholder="Email Id" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="d-grid gap-2 mx-auto my-3">
                                <input class="btn btn-success btn-block" type="submit" value="+ REGISTER" name="register_customer">
                            </div>   
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="d-grid gap-2 mx-auto my-3">
                                <input class="btn btn-warning btn-block" type="reset" value="RESET">
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
        $(document).ready(function() {
            $('.company_registration').hide();
            $('.individual_verification').hide();
        });
        $('#select_id_show').click(function()
        {
            var showform = $(this).val();
            if (showform == 'Company/Organisation')
            {
                $('.company_registration').show();
                $('.individual_registration').hide();
            } else if (showform == 'Individual')
            {
                $('.individual_registration').show();
                $('.company_registration').hide();
            }
        });
        $('.gstradio').click(function() {
            var gstvalue = $(this).val()
            if (gstvalue == 'Yes') {
                $('.gst_number').show();
            } else {
                $('.gst_number').hide();
            }
        });
        </script>
    </body>
</html>