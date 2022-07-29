<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>

<html>

<head>
    <title>Citizen Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mob1").keyup(function() {
                //regEx: regular expression
                var exp = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                var resp = exp.test(mob);
                if (resp == false) {
                    $("#errmob1").html("Invalid Mobile Number").addClass("not-ok").removeClass("ok");
                } else {
                    $("#errmob1").html("OK").addClass("ok").removeClass("not-ok");
                }
            });
            $("#postadd").click(function(ev) {
                if ($("#mob1").val() == "" || $("#uid1").val() == "" || $("#name1").val() == "" || $("#address1").val() == "" || $("#pet1").val() == "Select" || $("#errmob1").html() == "Invalid Mobile Number") {
                    alert("Invalid Data");
                    return;
                }
                var querystring = $("#selpets").serialize();
                var url = "project-citizen-dashboard-process.php?" + querystring;
                $.get(url, function(response) {
                    alert(response);
                    $("#uid1").val("");
                    $("#uid1").focus();
                    $("#mob1").val("");
                    $("#name1").val("");
                    $("#address1").val("");
                    $("#info").val("");
                    $("#pet1").val("Select");
                    $("#errmob1").html("");
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
        <nav class="navbar navbar-expand-md" style="background-color: #2874A6; color:white;">
            <label><b><?php echo $_SESSION['active_user']?></b></label>
            <label style="position: absolute; left: 50%; transform: translatex(-50%);" class="mt-2">
                <h3><i class="fa fa-bars" aria-hidden="true" style="color:white;"> DashBoard</i></h3>
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
    <div>
        <div class="container">
            <div class="row">
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card03.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">Find doctor for your pet</h5>
                        <a href="project-doctors-fetch.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card05.png" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">Search pharmacy around your city</h5>
                        <a href="project-pharmacy-fetch.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card07.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">Get a shelter for your pet</h5>
                        <a href="project-shelter-provider-fetch.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card08.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">Sell your pets here</h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Click Here</button>
                    </div>
                </div>
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card09.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">Buy pets from here</h5>
                        <a class="btn btn-primary" href="project-buypets.php">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sell your pets here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="selpets">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="uid1"><i class="fa fa-user" aria-hidden="true"></i> User ID</label>
                                    <input type="text" required class="form-control" id="uid1" name="uid1">
                                    <small id="erruid1"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name1"><i class="fa fa-id-card-o" aria-hidden="true"></i> Name</label>
                                    <input type="text" required class="form-control" id="name1" name="name1">
                                    <small id="errname1"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mob1"><i class="fa fa-phone" aria-hidden="true"></i> Mobile</label>
                                    <input type="text" required class="form-control" id="mob1" name="mob1">
                                    <small id="errmob1"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address1"><i class="fa fa-address-book-o" aria-hidden="true"></i> Address</label>
                                    <input type="text" required class="form-control" id="address1" name="address1">
                                    <small id="erraddress1"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="pet1"><i class="fa fa-filter" aria-hidden="true"></i> Select Pet</label>
                                    <select class="form-control" id="pet1" name="pet1" required>
                                        <option value="Select">Select</option>
                                        <option value="Cow">Cow</option>
                                        <option value="Cat">Cat</option>
                                        <option value="Dog">Dog</option>
                                        <option value="Buffaloo">Buffaloo</option>
                                        <option value="Monkey">Monkey</option>
                                        <option value="Fish">Fish</option>
                                        <option value="Bird">Bird</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="info"><i class="fa fa-info" aria-hidden="true"></i> Other Information</label>
                                    <textarea rows="5" cols="156" maxlength="1000" class="form-control" id="info" name="info"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary col-md-4" value="Post Add" id="postadd" name="postadd">Post Add</button>
                            <small id="errpostadd1" class="form-text text-muted"></small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
