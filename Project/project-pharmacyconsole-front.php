<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>

<html>

<head>
    <title>Pharmacy Console</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showpreview(file, prev) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        $(document).ready(function() {
            $("#mob").keyup(function() {
                var exp = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                var resp = exp.test(mob);
                if (resp == false) {
                    $("#errMob").html("Invalid Mobile Number").addClass("not-ok").removeClass("ok");
                } else {
                    $("#errMob").html("OK").addClass("ok").removeClass("not-ok");
                }
            });
            $("#uid").blur(function() {
                var uidValue = $("#uid").val();
                var url = "project-ajax-chk-pharmacy.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    $("#erruid").html(response);
                });
            });
            $("#btnsearch").click(function() {
                var user = $("#uid").val();
                $.getJSON("project-json-getch-pharmacy.php?uid=" + user, function(jsonAryResponse) {
                    if (jsonAryResponse.length == 0) {
                        alert("Invalid ID");
                    } else {
                        $("#fname").val(jsonAryResponse[0].fname);
                        $("#mob").val(jsonAryResponse[0].mob);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#licence").val(jsonAryResponse[0].licence);
                        $("#prev").prop("src", "uploads/" + jsonAryResponse[0].qrpic)
                        $("#hdnbox").val(jsonAryResponse[0].qrpic);
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
                <h3><i class="fa fa-medkit" aria-hidden="true" style="color:white;"> Pharmacy</i></h3>
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
            <form action="project-pharmacyconsole-process.php" enctype="multipart/form-data" method="post">
                <input type="hidden" id="hdnbox" name="hdnbox">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uid">User ID</label>
                        <input type="text" autofocus required class="form-control" id="uid" name="uid" aria-describedby="emailHelp" value="<?php echo $_SESSION['active_user']?>" readonly>
                        <small id="erruid" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="search"><br></label>
                        <input type="button" id="btnsearch" value="Search" class="form-control btn btn-primary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fname">Firm Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mob">Mobile Number</label>
                        <input type="text" class="form-control" id="mob" name="mob" required>
                        <span id="errMob"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">City/Locality</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="licence">Licence Number</label>
                        <input type="text" class="form-control" id="licence" name="licence" required>
                    </div>
                </div>
                <div class="form-row ">
                    <div class="form-group">
                        <label for="qrpic">Upload Paytm QR Code</label>
                        <br>
                        <input type="file" name="qrpic" onchange="showpreview(this,prev)" accept="image/*" id="qrpic">
                    </div>
                    <div class="form-group">
                        <img alt="Paytm QR Code" id="prev" width="200" height="200">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Send" name="btn">Send</button>
                <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Update" name="btn">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
