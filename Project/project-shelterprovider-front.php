<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>

<html>

<head>
    <title>Shelter Providers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

        function showpreview(file, prev3) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prev3).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        $(document).ready(function() {
            $("#contact").keyup(function() {
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
            $("#uid").blur(function() {
                var uidValue = $("#uid").val();
                var url = "project-ajax-chk-shelter-provider.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    $("#erruid").html(response);
                });
            });
            var all = "";
            var al = "";
            $("#pets").click(function() {
                var ref = $("#pets").val();
                al = al + ref + ", ";
                all = al.substr(0, al.length - 2);
                all = all + ".";
                $("#selpets").val(all);
            });
            $("#btnfetch").click(function() {
                var user = $("#uid").val();
                $.getJSON("project-json-getch-shelter-provider.php?uid=" + user, function(jsonAryResponse) {
                    if (jsonAryResponse.length == 0) {
                        alert("Invalid ID");
                    } else {
                        $("#pname").val(jsonAryResponse[0].pname);
                        $("#contact").val(jsonAryResponse[0].contact);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#maxd").val(jsonAryResponse[0].maxd);
                        $("#selpets").val(jsonAryResponse[0].selpets);
                        $("#oinfo").val(jsonAryResponse[0].oinfo);
                        $("#prev1").prop("src", "uploads/" + jsonAryResponse[0].pic1);
                        $("#prev2").prop("src", "uploads/" + jsonAryResponse[0].pic2);
                        $("#prev3").prop("src", "uploads/" + jsonAryResponse[0].pic3);
                        $("#hdnbox1").val(jsonAryResponse[0].pic1);
                        $("#hdnbox2").val(jsonAryResponse[0].pic2);
                        $("#hdnbox3").val(jsonAryResponse[0].pic3);
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
                <h3><i class="fa fa-home" aria-hidden="true" style="color:white;"> Shelter Providers</i></h3>
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
            <form action="project-shelterprovider-process.php" enctype="multipart/form-data" method="post">
                <input type="hidden" id="hdnbox1" name="hdnbox1">
                <input type="hidden" id="hdnbox2" name="hdnbox2">
                <input type="hidden" id="hdnbox3" name="hdnbox3">
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
                        <label for="pname">Name</label>
                        <input type="text" class="form-control" id="pname" name="pname" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                        <span id="errMob"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="maxd">Maximun Days</label><select name="maxd" id="maxd" class="form-control">
                            <?php
                        for($i=0;$i<=31 ;$i++) {
                            echo "<option value=$i>$i</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pets">Select Pet</label>
                        <select class="form-control" id="pets" name="pets" multiple>
                            <option value="Cow">Cow</option>
                            <option value="Cat">Cat</option>
                            <option value="Dog">Dog</option>
                            <option value="Buffaloo">Buffaloo</option>
                            <option value="Monkey">Monkey</option>
                            <option value="Fish">Fish</option>
                            <option value="Bird">Bird</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="selpets">Selected Pets</label>
                        <input type="text" id="selpets" name="selpets" class="form-control" required><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="oinfo">Other Information</label>
                        <textarea rows="5" cols="156" maxlength="1000" class="form-control" id="oinfo" name="oinfo"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <center>
                            <label for="Gallery">
                                <h5>Gallery</h5>
                            </label>
                        </center>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group offset-md-1">
                        <label for="ppic1">Pic-1</label><br>
                        <img id="prev1" width="300" height="200" alt="Pic-1" class="mx-auto d-block">
                        <br><br>
                        <input type="file" name="ppic1" onchange="showpreview(this,prev1);" accept="image/*" id="ppic1">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="ppic2">Pic-2</label>
                        <br>
                        <img id="prev2" width="300" height="200" alt="Pic-2" class="mx-auto d-block">
                        <br><br>
                        <input type="file" name="ppic2" onchange="showpreview(this,prev2);" accept="image/*" id="ppic2">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="ppic3">Pic-3</label>
                        <br>
                        <img id="prev3" height="200" width="300" alt="Pic-3" class="mx-auto d-block">
                        <br><br>
                        <input type="file" name="ppic3" onchange="showpreview(this,prev3);" accept="image/*" id="ppic3">
                        <br>
                    </div>
                </div>
                <br>
                <center>
                    <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Submit" name="btn">Submit</button>
                    <button type="submit" class="btn btn-primary col-md-2 mt-3" value="Update" name="btn">Update</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
