angular.module('TransactionController', []).controller('TransactionController', ['$scope', '$location', '$routeParams', 'Transaction',
  function ($scope, $location, $routeParams, Transaction) {
    $scope.create = function () {
      var transaction = new Transaction({
		id: this.id,
		user_id: this.user_id,
        description: this.description,
		date: this.date,
		amount: this.amount,
		type: this.type
      });
      transaction.$save(function (res) {
        $location.path('transactions/view/' + res.id);
        $scope.description = '';
      }, function (err) {
        console.log(err);
      });
    };

    $scope.find = function () {
      $scope.transactions = Transaction.query();
    };

    $scope.remove = function (transaction) {
      transaction.$remove(function (res) {
        if (res) {
          for (var i in $scope.transactions) {
            if ($scope.transactions[i] === transaction) {
              $scope.transactions.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (transaction) {
      transaction.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var transactionId = splitPath[splitPath.length - 1];
      $scope.transaction = Transaction.get({transactionId: transactionId});
    };
	
	$scope.getTotal = function(){
    var total = 0.0;
    for(var i = 0; i < $scope.transactions.length; i++){
        total += parseFloat($scope.transactions[i].amount);
    }
    return total;
}
  }
]);
