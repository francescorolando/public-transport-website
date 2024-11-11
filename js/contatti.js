var app = angular.module("myApp", []);

app.controller("myController", function ($scope) {
    $scope.nome = "";
    $scope.cognome = "";
    $scope.mail = "";
    $scope.frequenza = "0";
    $scope.textarea = "";
    $scope.mostraCaratteriRimanenti = false;
    $scope.check = false;
    $scope.caratteriRimanenti = function () {
        var rimanenti = 255 - $scope.textarea.length;
        return rimanenti < 0 ? 0 : rimanenti;
    };

    $scope.svuotaModulo = function () {
        $scope.nome = "";
        $scope.cognome = "";
        $scope.mail = "";
        $scope.frequenza = "0";
        $scope.textarea = "";
        $scope.mostraCaratteriRimanenti = false;
        $scope.check = false;
    };
});

// filtro custom per rendere maiuscola la prima lettera e minuscole le altre
app.filter("primaLetteraMaiuscola", function () {
    return function (input) {
        if (input) {
            return input.charAt(0).toUpperCase() + input.slice(1).toLowerCase();
        }
        return input;
    };
});
