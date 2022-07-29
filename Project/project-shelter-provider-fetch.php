<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Shelter Providers</title>
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
                $http.get("project-fetch-all-shelter-provider.php?city=" + $scope.selCity).then(OkFx, notOkFx);

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
                $http.get("project-fetch-all-shelter-provider-city.php").then(OkFx, notOkFx);

                function OkFx(result) {
                    $scope.cityArray = result.data;
                }

                function notOkFx(result) {
                    alert(result.data);
                }
            }
            $scope.selObj;
            $scope.showDetails = function(index) {
                $scope.selObj = $scope.jsonArray[index];
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="loadCity();" style="background-color: #EAF2F8;">
    <nav class="navbar navbar-light" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;">
            <h3>Select any Shelter Provider</h3>
        </a>
    </nav>
    <center>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    Select City:
                    <select ng-model="selCity">
                        <option value="none">Select</option>
                        <option value="{{obj.city}}" ng-repeat="obj in cityArray">{{obj.city}}</option>
                    </select>
                    <input type="button" value="Fetch All Shelter Providers" ng-click="fetchJsonData();">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArray">
                    <div class="card mt-5" style="box-shadow: 0px 0px 10px 5px #2874A6;">
                        <img class="card-img-top" src="uploads/{{obj.pic1}}" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name:</b> {{obj.pname}}</h5>
                            <p class="card-text"><b>Mobile No.: </b> {{obj.contact}}</p>
                            <p class="card-text"><b>Pets Interested in: </b> {{obj.selpets}}</p>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{selObj.pname}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table border="1" width="400">
                            <tr>
                                <td>
                                    <div class="float-left">Pic 1</div>
                                </td>
                                <td>
                                    <img src="uploads/{{selObj.pic1}}" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="float-left">Pic 2</div>
                                </td>
                                <td>
                                    <img src="uploads/{{selObj.pic2}}" height="100" width="100">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="float-left">Pic 3</div>
                                </td>
                                <td>
                                    <img src="uploads/{{selObj.pic3}}" height="100" width="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile Number: </td>
                                <td>{{selObj.contact}}</td>
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
                                <td>Max days for keeping a pet: </td>
                                <td>{{selObj.maxd}} Days</td>
                            </tr>
                            <tr>
                                <td>Pets Interested in: </td>
                                <td>{{selObj.selpets}}</td>
                            </tr>
                            <tr>
                                <td>Other Information about us:</td>
                                <td>{{selObj.oinfo}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
