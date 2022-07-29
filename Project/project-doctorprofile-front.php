<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>

<html>

<head>
    <title>Doctor's Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showpreview(file, prev1) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev1).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        function showpreview(file, prev2) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev2).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        $(document).ready(function() {
            $("#mob").keyup(function() {
                //regEx: regular expression
                var exp = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                var resp = exp.test(mob);
                if (resp == false) {
                    $("#errMob").html("Invalid Mobile Number").addClass("not-ok").removeClass("ok");
                } else {
                    $("#errMob").html("OK").addClass("ok").removeClass("not-ok");
                }
            });
            $("#email").keyup(function() {
                var uid = $(this).val();
                var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                if (r.test(uid) == true) {
                    $("#erreid").html("OK").addClass("ok").removeClass("not-ok");
                } else {
                    $("#erreid").html("Fill Valid Email ID").addClass("not-ok").removeClass("ok");
                }
            });
            $("#uid").blur(function() {
                var uidValue = $("#uid").val();
                var url = "project-ajax-chk-doctors.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    $("#erruid").html(response);
                });
            });
            $("#btnfetch").click(function() {
                var user = $("#uid").val();
                $.getJSON("project-json-getch-doctors.php?uid=" + user, function(jsonAryResponse) {
                    if (jsonAryResponse.length == 0) {
                        alert("Invalid ID");
                    } else {
                        $("#name").val(jsonAryResponse[0].name);
                        $("#mob").val(jsonAryResponse[0].mob);
                        $("#email").val(jsonAryResponse[0].email);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#state").val(jsonAryResponse[0].state);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#qualification").val(jsonAryResponse[0].qualification);
                        $("#exp").val(jsonAryResponse[0].exp);
                        $("#spl").val(jsonAryResponse[0].spl);
                        $("#spl").val(jsonAryResponse[0].spl);
                        $("#prev1").prop("src", "uploads/" + jsonAryResponse[0].prev1);
                        $("#prev2").prop("src", "uploads/" + jsonAryResponse[0].prev2);
                        $("#hdnbox1").val(jsonAryResponse[0].prev1);
                        $("#hdnbox2").val(jsonAryResponse[0].prev2);
                    }
                });
            });
        });

    </script>
    <style>
        .not-ok {
            color: red;
            font-weight: bold;
            padding: 3px;
            display: inline;
        }

        .ok {
            color: green;
            font-weight: bold;
            padding: 3px;
            display: inline;
        }

    </style>
</head>

<body style="background-color: #EAF2F8;">
    <div>
        <nav class="navbar navbar-expand-sm" style="background-color: #2874A6; color:white;">
            <label style="position: absolute; left: 50%; transform: translatex(-50%);" class="mt-2">
                <h3><i class="fa fa-user-md" aria-hidden="true" style="color:white;"> Doctor's Profile</i></h3>
            </label>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a type="button" class="nav-link" href="project-logout.php" style="color:white;">
                        <i class="fa fa-sign-out" aria-hidden="true"> Logout</i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="mt-3">
        <div class="container">
            <form action="project-doctorprofile-process.php" enctype="multipart/form-data" method="post">
                <input type="hidden" id="hdnbox1" name="hdnbox1">
                <input type="hidden" id="hdnbox2" name="hdnbox2">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uid">User ID</label>
                        <input type="text" autofocus required class="form-control" id="uid" name="uid" aria-describedby="emailHelp" value="<?php echo $_SESSION['active_user']?>" readonly>
                        <small id="erruid" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fetch"><br></label>
                        <input type="button" id="btnfetch" value="Fetch" class="form-control btn btn-primary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mob">Mobile Number</label>
                        <input type="text" class="form-control" id="mob" name="mob" required>
                        <span id="errMob"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email ID</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span id="erreid"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="state">State</label>
                        <select name="state" id="state" class="form-control">
                            <option value="Select">Select</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
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
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="city">City/Locality</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="qualification">Qualification</label>
                        <select class="form-control" id="qualification" name="qualification">
                            <option value="Select">Select</option>
                            <option value="Bachelor of Veterinary Science & Animal Husbandry (B.V.Sc & AH) ">Bachelor of Veterinary Science & Animal Husbandry (B.V.Sc & AH) </option>
                            <option value="BV. Sc. in Animal Genetics and Breeding">BV. Sc. in Animal Genetics and Breeding</option>
                            <option value="BV. Sc. in Animal Production & Management">BV. Sc. in Animal Production & Management</option>
                            <option value="BV. Sc. in Veterinary Surgery & Radiology">BV. Sc. in Veterinary Surgery & Radiology</option>
                            <option value="BV. Sc. in Veterinary Medicine, Public Health & Hygiene">BV. Sc. in Veterinary Medicine, Public Health & Hygiene</option>
                            <option value="Master of Veterinary Science (M.V.Sc)">Master of Veterinary Science (M.V.Sc)</option>
                            <option value="MV. Sc in Veterinary Medicine">MV. Sc in Veterinary Medicine</option>
                            <option value="MV. Sc in Veterinary Pharmacology & Toxicology">MV. Sc in Veterinary Pharmacology & Toxicology</option>
                            <option value="MV. Sc in Veterinary Surgery & Radiology">MV. Sc in Veterinary Surgery & Radiology</option>
                            <option value="Doctor of Philosophy (Ph.D) in Veterinary Medicine">Doctor of Philosophy (Ph.D) in Veterinary Medicine</option>
                            <option value="Doctor of Philosophy (Ph.D) in Veterinary Pathology">Doctor of Philosophy (Ph.D) in Veterinary Pathology</option>
                            <option value="Doctor of Philosophy (Ph.D) in Veterinary Pharmacology & Toxicology">Doctor of Philosophy (Ph.D) in Veterinary Pharmacology & Toxicology</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exp">Experience(Years)</label>
                        <input type="number" class="form-control" id="exp" name="exp" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="spl">Specialization</label>
                        <select class="form-control" id="spl" name="spl">
                            <option value="Select">Select</option>
                            <option value="Anaesthesiology">Anaesthesiology</option>
                            <option value="Animal behavior">Animal behavior</option>
                            <option value="Animal welfare">Animal welfare</option>
                            <option value="Birds">Birds</option>
                            <option value="Bovine">Bovine</option>
                            <option value="Canine">Canine</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Clinical pathology">Clinical pathology</option>
                            <option value="Clinical pharmacology">Clinical pharmacology</option>
                            <option value="Dentistry">Dentistry</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Diagnostic imaging">Diagnostic imaging</option>
                            <option value="Equine">Equine</option>
                            <option value="Emergency and critical care">Emergency and critical care</option>
                            <option value="Honey bee">Honey bee</option>
                            <option value="Fish">Fish</option>
                            <option value="Food Agro diagnostics in veterinary">Food Agro diagnostics in veterinary</option>
                            <option value="Forensic veterinary">Forensic veterinary</option>
                            <option value="Feline">Feline</option>
                            <option value="Veterinary immunology">Veterinary immunology</option>
                            <option value="Internal medicine">Internal medicine</option>
                            <option value="Internal medicine">Internal medicine</option>
                            <option value="Microbiology">Microbiology</option>
                            <option value="Neurology and neurosurgery">Neurology and neurosurgery</option>
                            <option value="Nutrition">Nutrition</option>
                            <option value="Oncology">Oncology</option>
                            <option value="Ophthalmology">Ophthalmology</option>
                            <option value="Orthopaedics">Orthopaedics</option>
                            <option value="Parasitology">Parasitology</option>
                            <option value="Pathology">Pathology</option>
                            <option value="Pathology">Pathology</option>
                            <option value="Poultry">Poultry</option>
                            <option value="Preventive medicine">Preventive medicine</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Reptile and amphibian">Reptile and amphibian</option>
                            <option value="Shelter medicine">Shelter medicine</option>
                            <option value="Sports medicine">Sports medicine</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Theriogenology">Theriogenology</option>
                            <option value="Toxicology">Toxicology</option>
                            <option value="Zoological medicine">Zoological medicine</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="ppic1">Profile Pic</label><br>
                        <input type="file" name="ppic1" onchange="showpreview(this,prev1);" accept="image/*" id="ppic1"><br>
                        <img id="prev1" width="200" height="200" alt="Profile Pic">
                    </div>
                    <div class="form-group">
                        <label for="ppic2">Certificate Proof</label><br>
                        <input type="file" name="ppic2" onchange="showpreview(this,prev2);" accept="image/*" id="ppic2"><br>
                        <img id="prev2" width="200" height="200" alt="Certificate Proof">
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Submit" name="btn">Submit</button>
                <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Update" name="btn">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
