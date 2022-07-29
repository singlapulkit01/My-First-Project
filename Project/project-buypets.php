<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buy Pets</title>
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
                $http.get("project-fetch-pets.php?pet=" + $scope.selPet).then(OkFx, notOkFx);

                function OkFx(result) {
                    $scope.jsonArray = result.data;
                }

                function notOkFx(result) {
                    alert(result.data);
                }
            }
            $scope.petArray = [];
            $scope.selPet = "none";
            $scope.loadPet = function() {
                $http.get("project-fetch-all-pets.php").then(OkFx, notOkFx);

                function OkFx(result) {
                    $scope.petArray = result.data;
                }

                function notOkFx(result) {
                    alert(result.data);
                }
            }
            $scope.selPet;
            $scope.showDetails = function(index) {
                $scope.selObj = $scope.jsonArray[index];
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="loadPet();" style="background-color: #EAF2F8;">
    <nav class="navbar navbar-light" style="background-color: #2874A6;">
        <a class="navbar-brand mx-auto" style="color:white;">
            <h3>Buy Pets From Here</h3>
        </a>
    </nav>
    <center>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    Select Pet:
                    <select ng-model="selPet">
                        <option value="none" selected>Select</option>
                        <option value="{{obj.pet}}" ng-repeat="obj in petArray">{{obj.pet}}</option>
                    </select>
                    <input type="button" value="Fetch all Adds" ng-click="fetchJsonData();">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArray">
                    <div class="card mt-5" style="box-shadow: 0px 0px 10px 5px #2874A6;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name:</b> {{obj.name}}</h5>
                            <p class="card-text"><b>Mobile Number:</b> {{obj.mob}}</p>
                            <p class="card-text"><b>Address:</b> {{obj.address}}</p>
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
                                <td>Mobile Number: </td>
                                <td>{{selObj.mob}}</td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>{{selObj.address}}</td>
                            </tr>
                            <tr>
                                <td>Pet: </td>
                                <td>{{selObj.pet}}</td>
                            </tr>
                            <tr>
                                <td>Other Information: </td>
                                <td>{{selObj.info}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
