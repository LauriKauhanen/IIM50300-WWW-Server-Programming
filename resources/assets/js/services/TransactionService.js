angular.module('TransactionService', []).factory('Transaction', ['$resource',
  function ($resource) {
    return $resource('/api/transaction/:transactionId', {
      transactionId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);