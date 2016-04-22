<p ng-if="authenticatedUser">
    Hello {{authenticatedUser.username}}, and welcome to the PanamaBudgeting.
</p>
<p ng-if="!authenticatedUser">
    Hello guest, and welcome to the PanamaBudgeting.
</p>
