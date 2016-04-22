<div ng-controller="TransactionController" ng-init="find()">
    <p ng-if="!transactions.length">
        There are no transactions right now, <a href="/transactions/create">create one!</a>
    </p>
	
	<table class="table table-hover" ng-if="transactions.length">
		<thead>
		<tr>
			<th>Type</th>
			<th>Date</th>
			<th>Amount</th>
			<th>Description</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<td/>
			<td>Total</td>
			<td>{{ getTotal() }}</td>
			<td/>
		</tr>
		</tfoot>
		<tbody>
		<tr class="row" ng-repeat="transaction in transactions">
			<td>{{transaction.type}}</td>
			<td>{{transaction.date}}</td>
			<td>{{transaction.amount}}</td>
			<td>{{transaction.description}}</td>
	    </tr>
		</tbody>
	</table>
</div>


