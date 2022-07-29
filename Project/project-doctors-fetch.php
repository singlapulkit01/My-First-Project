<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Doctors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray = [];
            $scope.fetchJsonData = function() {
                loadJSON();
            }

            function loadJSON() {
                $http.get("project-fetch-all-doctors.php?city=" + $scope.selCity).then(OkFx, notOkFx);

                function OkFx(result) {
                    $scope.jsonArray = result.data;
                }

                function notOkFx(result) {
                    alert(result.data);
                }
            }
            $scope.cityArray = [];
            $scope.selCity = "none";
            $scope.loadCity = function() {
                $http.get("project-fetch-all-doctors-city.php").then(OkFx, notOkFx);

                function OkFx(result) {
                    $scope.cityArray = result.data;
                }

                function notOkFx(result) {
                    alert(result.data);
                }
            }
            $scope.selCity;
            $scope.showDetails = function(index) {
                $scope.selObj = $scope.jsonArray[index];
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="loadCity();" style="background-color: #EAF2F8;">
    <nav class="navbar navbar-light" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;">
            <h3>Select Doctors</h3>
        </a>
    </nav>
    <center>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    Select City:
                    <select ng-model="selCity">
                        <option value="none" selected>Select</option>
                        <option value="{{obj.city}}" ng-repeat="obj in cityArray">{{obj.city}}</option>
                    </select>
                    <input type="button" value="Fetch All Doctors" ng-click="fetchJsonData();">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArray">
                    <div class="card mt-5" style="box-shadow: 0px 0px 10px 5px #2874A6;">
                        <img class="card-img-top" src="uploads/{{obj.prev1}}" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name:</b> {{obj.name}}</h5>
                            <p class="card-text"><b>Qualification:</b> {{obj.qualification}}</p>
                            <p class="card-text"><b>Specialization:</b> {{obj.spl}}</p>
                            <a class="btn btn-primary col-md-5" data-toggle="modal" data-target="#exampleModal" ng-click="showDetails($index);">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{selObj.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table border="1" width="400">
                            <tr>
                                <td>
                                    <div class="float-left">Doctor's Photo</div>
                                </td>
                                <td>
                                    <img src="uploads/{{selObj.prev1}}" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="float-left">Certificate Proof</div>
                                </td>
                                <td>
                                    <img src="uploads/{{selObj.prev2}}" height="100" width="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile Number: </td>
                                <td>{{selObj.mob}}</td>
                            </tr>
                            <tr>
                                <td>Email-ID: </td>
                                <td>{{selObj.email}}</td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>{{selObj.address}}</td>
                            </tr>
                            <tr>
                                <td>City: </td>
                                <td>{{selObj.city}}</td>
                            </tr>
                            <tr>
                                <td>State: </td>
                                <td>{{selObj.state}}</td>
                            </tr>
                            <tr>
                                <td>Qualification: </td>
                                <td>{{selObj.qualification}}</td>
                            </tr>
                            <tr>
                                <td>Experience:</td>
                                <td>{{selObj.exp}} Years</td>
                            </tr>
                            <tr>
                                <td>Specialization: </td>
                                <td>{{selObj.spl}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
