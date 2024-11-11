var app = angular.module("myApp", []);

app.controller("myController", function ($scope, $timeout, $window) {
    $timeout(function () {
        // dopo 5 secondi, reindirizza alla pagina index.html
        $window.location.href = "index.html";
    }, 5000);
});
