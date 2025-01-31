var app = angular.module("myApp", []);

app.controller("myController", function ($scope, $timeout, $window) {
    $timeout(function () {
        // dopo 5 secondi, reindirizza alla pagina index.php
        $window.location.href = "index.php";
    }, 5000);
});
