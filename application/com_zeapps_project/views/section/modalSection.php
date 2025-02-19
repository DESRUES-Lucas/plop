<div class="modal-header">
    <h3 class="modal-title">{{titre}}</h3>
</div>


<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-condensed table-responsive" ng-show="sections.length">
                <thead>
                <tr>
                    <th>Nom</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="section in sections">
                    <td><a href="#" ng-click="loadSection(section.id)">{{section.name}}</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-danger" type="button" ng-click="cancel()" i8n="Annuler"></button>
</div>