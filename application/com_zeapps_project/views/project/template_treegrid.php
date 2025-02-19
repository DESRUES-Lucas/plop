<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="table-responsive">
 <table class="table tree-grid">
   <thead>
     <tr>
           <th class="col_expandable"><a ng-if="expandingProperty.sortable" ng-click="sortBy(expandingProperty)">{{expandingProperty.displayName || expandingProperty.field || expandingProperty}}</a><span ng-if="!expandingProperty.sortable">{{expandingProperty.displayName || expandingProperty.field || expandingProperty}}</span><i ng-if="expandingProperty.sorted" class="{{expandingProperty.sortingIcon}} pull-right"></i></th>
           <th ng-repeat="col in colDefinitions"><a ng-if="col.sortable" ng-click="sortBy(col)">{{col.displayName || col.field}}</a><span ng-if="!col.sortable">{{col.displayName || col.field}}</span><i ng-if="col.sorted" class="{{col.sortingIcon}} pull-right"></i></th>
         </tr>
   </thead>
   <tbody>
     <tr ng-repeat="row in tree_rows | searchFor:$parent.filterString:expandingProperty:colDefinitions track by row.branch.uid"
       ng-class="'level-' + {{ row.level }} + (row.branch.selected ? ' active':'')" class="tree-grid-row">
       <td class="col_expandable"><a ng-click="user_clicks_branch(row.branch)"><i ng-class="row.tree_icon"
                      ng-click="row.branch.expanded = !row.branch.expanded"
                      class="indented tree-icon"></i></a><span ng-if="expandingProperty.cellTemplate" class="indented tree-label" ng-click="on_user_click(row.branch)" compile="expandingProperty.cellTemplate"></span>
                  <span  ng-if="!expandingProperty.cellTemplate" class="indented tree-label" ng-click="on_user_click(row.branch)">
                 {{row.branch[expandingProperty.field] || row.branch[expandingProperty]}}</span>
           </td>
       <td ng-repeat="col in colDefinitions" class="{{row.branch['sublevel']}}">
         <div ng-if="col.cellTemplate" compile="col.cellTemplate" cell-template-scope="col.cellTemplateScope"></div>
         <div ng-if="!col.cellTemplate">{{row.branch[col.field]}}</div>
       </td>
     </tr>
   </tbody>
 </table>
</div>