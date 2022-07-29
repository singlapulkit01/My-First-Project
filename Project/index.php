<html>

<head>
    <title>Index</title>
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
            $("#pass1").keyup(function() {
                var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                var pwd = $(this).val();
                if (r.test(pwd) == false)
                    $("#errpass1").html("Not A Strong Password").addClass("not-ok").removeClass("ok");
                else
                    $("#errpass1").html("OK").addClass("ok").removeClass("not-ok");
            });
            $("#sign").click(function(ev) {
                if ($("#mob1").val() == "" || $("#uid1").val() == "" || $("#pass1").val() == "" || $("#chkpass1").val() == "" || $("#type1").val() == "Select" || $("#erruid1").html() == "Already Booookkkkeedddd" || $("#errpass1").html() == "Not A Strong Password" || $("#errchkpass1").html() == "Please enter the correct password" || $("#errmob1").html() == "Invalid Mobile Number") {
                    alert("Invalid Data");
                    return;
                }
                var querystring = $("#signup").serialize();
                var url = "index-signup-process.php?" + querystring;
                $.get(url, function(response) {
                    alert(response);
                    $("#uid1").val("");
                    $("#uid1").focus();
                    $("#pass1").val("");
                    $("#chkpass1").val("");
                    $("#mob1").val("");
                    $("#type1").val("Select");
                    $("#erruid1").html("");
                    $("#errpass1").html("");
                    $("#errchkpass1").html("");
                    $("#errmob1").html("");
                });
            });
            $("#log").click(function() {
                var uid2 = $("#uid2").val();
                var pass2 = $("#pass2").val();
                var url = "index-login-process.php?uid2=" + uid2 + "&pass2=" + pass2;
                $.get(url, function(response) {
                    if (response == "Shelter Provider") {
                        location.href = "project-shelterprovider-front.php";
                    } else if (response == "Pharmacy") {
                        location.href = "project-pharmacyconsole-front.php";
                    } else if (response == "Doctor") {
                        location.href = "project-doctorprofile-front.php";
                    } else if (response == "Citizen") {
                        location.href = "project-citizen-dashboard.php";
                    } else {
                        alert(response);
                    }
                });
            });
            $("#request").click(function() {
                var string = $("#forgot").serialize();
                var url = "project-forgot.php?" + string;
                $.get(url, function(response) {
                    alert(response);
                });
            });
            $("#chkpass1").keyup(function() {
                var pass1 = $("#pass1").val();
                var pass2 = $("#chkpass1").val();
                if (pass1 == pass2) {
                    $("#errchkpass1").html("OK").addClass("ok").removeClass("not-ok");
                } else {
                    $("#errchkpass1").html("Please enter the correct password").addClass("not-ok").removeClass("ok");
                }
            });
            $("#uid1").keyup(function() {
                var uidValue = $("#uid1").val();
                var url = "project-ajax-chk-index.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    if (response == "Available, you can take it...") {
                        $("#erruid1").html(response).addClass("ok").removeClass("not-ok");
                    } else {
                        $("#erruid1").html(response).addClass("not-ok").removeClass("ok");
                    }
                });
            });
            $("#eye1").mousedown(function() {
                $("#pass1").attr("type", "text");
                $("#eye1").addClass("fa-eye-slash").removeClass("fa-eye");
            });
            $("#eye1").mouseup(function() {
                $("#pass1").attr("type", "password");
                $("#eye1").addClass("fa-eye").removeClass("fa-eye-slash");
            });
            $("#eye2").mousedown(function() {
                $("#chkpass1").attr("type", "text");
                $("#eye2").addClass("fa-eye-slash").removeClass("fa-eye");
            });
            $("#eye2").mouseup(function() {
                $("#chkpass1").attr("type", "password");
                $("#eye2").addClass("fa-eye").removeClass("fa-eye-slash");
            });
            $("#eye3").mousedown(function() {
                $("#pass2").attr("type", "text");
                $("#eye3").addClass("fa-eye-slash").removeClass("fa-eye");
            });
            $("#eye3").mouseup(function() {
                $("#pass2").attr("type", "password");
                $("#eye3").addClass("fa-eye").removeClass("fa-eye-slash");
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

        #arrow {
            background-color: #85C1E9;
            color: #154360;
            width: 50px;
            padding: 10px;
            font-weight: bold;
            font-family: fantasy;
            text-align: center;
            border-radius: 50%;
            position: fixed;
            bottom: 20px;
            right: 20px;
            transition: ease all 1s;
        }

    </style>
</head>

<body id="top" style="background-color: #EAF2F8;">
    <a href="#top">
        <div id="arrow"><i class="fa fa-hand-o-up" aria-hidden="true"></i>TOP</div>
    </a>
    <div>
        <nav class="navbar navbar-expand-sm" style="background-color: #1B4F72; color:white;">
            <a class="navbar-brand" href="#">
                <img src="pics/doctor-logo-icon-design-vector-15613661.jpg" width="30" height="30" class="d-inline-block align-top" alt="" style="border-radius: 80%;">
            </a>
            <label style="position: absolute; left: 50%; transform: translatex(-50%);">PetsCare.com</label>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a type="button" data-toggle="modal" data-target="#exampleModal1" class="nav-link">
                        <i class="fa fa-user-plus" aria-hidden="true"> Sign Up</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a type="button" data-toggle="modal" data-target="#exampleModal2" class="nav-link">
                        <i class="fa fa-sign-in" aria-hidden="true"> Log In</i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:0px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pics/pet02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/pet03.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/pet04.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <nav class="navbar navbar-light" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;"><b>Our Services</b></a>
    </nav>
    <div>
        <div class="container">
            <div class="row">
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card03.jpg" class="card-img-top mt-2" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Veterinary Doctor</h5>
                        <p class="card-text">"The best doctor in the world is a VETERINARIAN. He can't ask his patients what is the matter. He is got to just know!"</p>
                    </div>
                </div>
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card05.png" class="card-img-top mt-2" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Animal Pharmacy</h5>
                        <p class="card-text">"Poisons and medicine are often the same substance given with different intents."</p>
                    </div>
                </div>
                <div class="card col-md-3 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                    <img src="pics/card10.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pet Shop</h5>
                        <p class="card-text mt-0">"Do you want a friend in your life? Then explore your favourite pet and get the actual love in your life."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light mt-5" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;"><b>Meet the Developers</b></a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="card col-md-4 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                <h5 class="card-title text-center mt-3">Developed By</h5>
                <img src="pics/Me3.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center mt-2">Pulkit Singla</h5>
                    <p class="card-text text-center">I am a Second Year student at SRM University, Delhi NCR. Pursuing my Bachelor of Technology (B. Tech) from CSE branch. I have made this website which allows people to explore and buy the pets they want. This is my first website that i've designed.</p>
                </div>
            </div>
            <div class="card col-md-4 mt-5" style="width: 18rem; box-shadow: 0px 0px 10px 5px #2874A6; margin: 0 auto; float: none; margin-bottom: 10px;">
                <h5 class="card-title text-center mt-3">Under The Guidance Of</h5>
                <img src="pics/sirji.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center mt-2">Rajesh Bansal</h5>
                    <p class="card-text text-center mt-3">A brilliant coder with 18 years of experience. Expert in C/C++, CoreJava, Adv.Java, PHP, Android, Python and many more. Founder of <a href="https://www.realJavaOnline.com">www.realJavaOnline.com</a> and author of Real Java. <br><b>Contact Info.:<br>Email: bcebti@gmail.com<br>Contact: +91 98722-46056</b></p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light mt-5" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;"><b>Reach Us</b></a>
    </nav>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d578.3330802432874!2d75.09565587100832!3d30.21171026634891!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910d1da79bc9d1f%3A0x79252bde1e2f2bd0!2zMzDCsDEyJzQxLjkiTiA3NcKwMDUnNDUuMyJF!5e0!3m2!1sen!2sin!4v1602396273561!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <nav class="navbar navbar-light" style="background-color: #1B4F72;">
        <a href="https://www.instagram.com/_.pulkit.singla._/">
            <i class="fa fa-instagram" aria-hidden="true" style="color:white;"> Instagram</i>
        </a>
        <a href="https://www.facebook.com/profile.php?id=100007190895363">
            <i class="fa fa-facebook" aria-hidden="true" style="color:white;"> Facebook</i>
        </a>
        <a href="https://twitter.com/PulkitS87424655">
            <i class="fa fa-twitter-square" aria-hidden="true" style="color:white;"> Twitter</i>
        </a>
        <a href="https://www.linkedin.com/in/pulkit-singla-baa7221b9/">
            <i class="fa fa-linkedin" aria-hidden="true" style="color:white;"> LinkedIn</i>
        </a>
        <a href="https://www.quora.com/profile/Pulkit-Singla-36">
            <i class="fa fa-quora" aria-hidden="true" style="color:white;"> Quora</i>
        </a>
        <a href="mailto:singlapulkit01@gmail.com">
            <i class="fa fa-envelope" aria-hidden="true" style="color:white;"> Mail</i>
        </a>
        <a href="tel:+919465042060">
            <i class="fa fa-phone" aria-hidden="true" style="color:white;"> Phone</i>
        </a>
    </nav>
    <div>
        <marquee behavior="slide" direction="" style="background-color:#1B4F72;color:white;">&#169;Copyright Reserved</marquee>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signup">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="uid1"><i class="fa fa-user" aria-hidden="true"></i> User ID</label>
                                <input type="text" required class="form-control" id="uid1" name="uid1">
                                <small id="erruid1"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pass1"><i class="fa fa-unlock" aria-hidden="true"></i> Password</label>
                                <i id="eye1" class="fa fa-eye float-right" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="pass1" name="pass1" required>
                                <small id="errpass1"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="chkpass1"><i class="fa fa-unlock" aria-hidden="true"></i> Verify Password</label>
                                <i id="eye2" class="fa fa-eye float-right" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="chkpass1" name="chkpass1" required>
                                <small id="errchkpass1"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="mob1"><i class="fa fa-mobile" aria-hidden="true"></i> Mobile</label>
                                <input type="text" required class="form-control" id="mob1" name="mob1">
                                <small id="errmob1"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="type1"><i class="fa fa-filter" aria-hidden="true"></i> Type</label>
                                <select name="type1" id="type1" class="form-control" required>
                                    <option value="Select">Select</option>
                                    <option value="Shelter Provider">Shelter Provider</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Citizen">Citizen</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-md-4" value="Sign Up" id="sign" name="btn">Sign Up</button>
                        <small id="errbtn1" class="form-text text-muted"></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log In Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="uid2"><i class="fa fa-user" aria-hidden="true"></i> User ID</label>
                                <input type="text" required class="form-control" id="uid2" name="uid2">
                                <small id="erruid2"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pass2"><i class="fa fa-unlock" aria-hidden="true"></i> Password</label>
                                <i id="eye3" class="fa fa-eye float-right" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="pass2" name="pass2" required>
                                <span id="errpass2"></span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-md-12" value="Log In" name="btn" id="log">Log In</button>
                        <small id="errbtn2" class="form-text text-muted"></small>
                        <a type="button" class="form-text text-muted" data-toggle="modal" data-target="#exampleModal3">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Password for you ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="forgot">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="uid2"><i class="fa fa-user" aria-hidden="true"></i> User ID</label>
                                <input type="text" required class="form-control" id="uid3" name="uid3">
                                <small id="erruid2"></small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-md-12" value="Request for Password" name="request" id="request">Request for Password</button>
                        <small id="errbtn2" class="form-text text-muted"></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
