<div ng-controller="TransactionController">
    <form class="form-horizontal" ng-submit="create()" novalidate>
        <fieldset>
            <div class="form-group">
                <div class="col-md-5">
                    <input id="type" name="type" type="text" placeholder="Transaction type" class="form-control input-md" ng-model="type" required>
                    <input id="date" name="date" type="text" placeholder="Date" class="form-control input-md" ng-model="date" required>
                    <input id="amount" name="amount" type="text" placeholder="Amount" class="form-control input-md" ng-model="amount" required>
                    <input id="description" name="description" type="text" placeholder="Description" class="form-control input-md" ng-model="description" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>


