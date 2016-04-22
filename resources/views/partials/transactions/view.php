<div ng-controller="TransactionController" ng-init="findOne()">
    <h1>View Transaction</h1>
    <table class="table">
	 <tr>
	<th>Type</th>
	<th>Date</th>
	<th>Amount</th>
	<th>Description</th>
	</tr>
	<tr>
	<td>{{transaction.type}}</td>
	<td>{{transaction.date}}</td>
	<td>{{transaction.amount}}</td>
	<td>{{transaction.description}}</td>
	</table>
</div>


