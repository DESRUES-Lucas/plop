<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="zeApp">
<head>
    <meta charset="utf-8">
    <title>Zeapps</title>


    <base href="/">


    <link rel="stylesheet" href="/assets/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/js/jquery-ui-1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/js/jquery-ui-1.11.4/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/assets/js/jquery-ui-1.11.4/jquery-ui.theme.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/assets/bootstrap-3.3.7/css/bootstrap-theme.min.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">




    <script src="/assets/js/jquery-1.12.0.min.js"></script>
    <script src="/assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>






    <script src="/assets/js/angular-1.5.0/angular.min.js"></script>
    <script src="/assets/js/angular-1.5.0/angular-route.min.js"></script>
    <script src="/assets/js/angular-1.5.0/angular-animate.min.js"></script>
    <script src="/assets/js/angular-1.5.0/angular-sanitize.min.js"></script>

    <script src="/assets/js/angular-1.5.0/i18n/angular-locale_fr-fr.js"></script>




    <!-- angularjs Upload Files -->
    <script src="/assets/js/angular-upload/ng-file-upload.min.js"></script>
    <script src="/assets/js/angular-upload/ng-file-upload-shim.min.js"></script>

    <!-- angularjs UI -->
    <script src="/assets/js/ui-bootstrap-tpls-1.1.2.min.js"></script>
    <script src="/assets/js/ui-sortable-0.13.4/sortable.min.js"></script>

    <!-- Angular upload file-->
    <script src="/assets/js/angular_uploadFile/ng-file-upload.min.js"></script>
    <script src="/assets/js/angular_uploadFile/ng-file-upload-shim.min.js"></script>


    <!-- df-tab-menu -->
    <script src="/assets/js/df-tab-menu/df-tab-menu.min.js"></script>


    <script src="/assets/js/checklist-model.js"></script>


    <script src="/assets/cache/js/main.js"></script>


    <!-- import js files form application -->
    <?php foreach ($js_file as $file) { ?>
        <script src="<?php echo $file; ?>"></script>
    <?php } ?>


    <!-- import css files form application -->
    <?php foreach ($css_file as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>">
    <?php } ?>


    <link rel="stylesheet" href="/assets/css/app.css">




    <script src="/assets/js/jquery-1.12.0.min.js"></script>
</head>
<body ng-controller="MainCtrl as main">


<div id="menu-hover-shadow">

</div>
<div id="menu-hover">
    <div class="essential">
        <div class="title" i8n="L'essentiel"></div>
        <div class="url-menu">
            <ul class="nav">

                <?php foreach ($menuEssential as $menuItem) { ?>
                    <li><a href="<?php echo $menuItem["url"]; ?>"><span i8n="<?php echo $menuItem["label"];?>"></span></a></li>
                <?php } ?>

            </ul>
        </div>
    </div>

    <div class="menu-content">
        <div class="row">
            <?php if (count($menuTopCol1) > 0) { ?>
                <div class="col-sm-6">
                    <?php foreach ($menuTopCol1 as $menuSpace) { ?>
                        <div class="title" i8n="<?php echo $menuSpace["info"]["name"]; ?>"></div>
                        <ul class="nav">
                            <?php foreach ($menuSpace["item"] as $menuItem) { ?>
                                <li><a href="<?php echo $menuItem["url"]; ?>" i8n="<?php echo $menuItem["label"]; ?>"></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (count($menuTopCol2) > 0) { ?>
                <div class="col-sm-6">
                    <?php foreach ($menuTopCol2 as $menuSpace) { ?>
                        <div class="title" i8n="<?php echo $menuSpace["info"]["name"]; ?>"></div>
                        <ul class="nav">
                            <?php foreach ($menuSpace["item"] as $menuItem) { ?>
                                <li><a href="<?php echo $menuItem["url"]; ?>" i8n="<?php echo $menuItem["label"]; ?>"></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="footer-menu">

        <div class="pull-left">
            <button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-shopping-cart"
                                                           aria-hidden="true"></span> <span i8n="Extension store"></span>
            </button>
            <button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-list-alt"
                                                           aria-hidden="true"></span> <span i8n="Abonnement"></span>
            </button>
        </div>

        <div class="pull-right">
            <a href="/ng/com_zeapps/config" class="btn btn-sm"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span i8n="Config"></span>
            </a>
        </div>


    </div>
</div>


<div id="ze-header">
    <div id="logo"><a href="/"><img src="/assets/layout/logo.png" class="vertical-middle"/></a></div>
    <div id="search">
        <div class="content">
            <div class="menu"><span class="vertical-middle" i8n="menu"><span class="glyphicon glyphicon-chevron-down"
                                                                       aria-hidden="true"></span></span></div>
            <div class="formSearch"><input type="text" ng-model="searchFill"  /> <button type="submit"  class="btn btn-primary btn-xs" ng-click="search()" i8n="cherche"></button> </div>
            <div class="right-menu">

                <div class="pull-right" >
                    <span ng-click="toggleNotification()" class="pointer">
                        <span class="glyphicon glyphicon-bell"  aria-hidden="true"></span>
                        <span ng-show="notificationsNotSeen() != 0">
                            <span class="label label-danger label-as-badge">{{ notificationsNotSeen() }}</span>
                        </span>
                    </span>

                    <span ng-click="toggleDropdown()" class="pointer">
                     {{user.firstname[0] +'. '+user.lastname}} <span class="glyphicon" ng-class="dropdown ? 'glyphicon-chevron-up' : 'glyphicon-chevron-down'"  aria-hidden="true"></span>
                    </span>
                </div>
                <ul ng-show="dropdown" class="userMenu">
                    <li><a href="/ng/com_zeapps/profile/view" i8n="Profil"></a></li>
                    <li ng-click="disconnect">Déconnexion</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="main">

    <div id="left-menu" ng-class="fullSizedMenu ? '' : 'shrinked'">

        <?php foreach ($menuLeft as $menuSpace) { ?>
            <div ng-show="menu == '<?php echo $menuSpace["info"]["id"]; ?>'?true:false" class="app-sale">
                <div class="title-app" ng-click="toggleMenuSize()">
                    <span class="fa fa-<?php echo isset($menuSpace["fa-icon"]) ? $menuSpace["fa-icon"] : 'font-awesome'; ?>"></span>
                    <span class="menu_title" i8n="<?php echo $menuSpace["info"]["name"]; ?>"></span>
                </div>
                <div>
                    <ul class="nav">
                        <?php foreach ($menuSpace["item"] as $menuItem) { ?>
                            <li ng-class="menu_active == '<?php echo $menuItem["id"]; ?>' ? 'active' :''">
                                <a href="<?php echo $menuItem["url"]; ?>">
                                    <span class="fa fa-<?php echo isset($menuItem["fa-icon"]) ? $menuItem["fa-icon"] : 'font-awesome'; ?>" aria-hidden="true"></span>
                                    <span class="menu_item" i8n="<?php echo $menuItem["label"]; ?>"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>

    </div>

    <ul class="notifications" ng-class="showNotification ? 'show' : ''">
        <li ng-repeat="(moduleName, module) in notifications" ng-class="notification.status">
                        <span class="module-name">
                            <span class="fa fa-times pointer pull-right" aria-hidden="true" ng-click="readAllNotificationsFrom(moduleName)"></span>
                            {{moduleName}}
                        </span>
            <ul>
                <li ng-repeat="notification in module.notifications | limitTo:'3'" class="notification">
                    <span class="fa fa-times pointer pull-right" aria-hidden="true" ng-click="readNotification(notification)"></span>
                    {{ notification.message }}
                </li>
            </ul>
        </li>
        <li ng-hide="hasUnreadNotifications()" class="no-notifications">
            Aucunes notifications non lues<br>
        </li>
    </ul>


    <div id="content-area" ng-class="{showingNotifs:showNotification, shrinkedMenu:!fullSizedMenu}">

        <div class="view-animate" ng-view=""></div>

    </div>

    <toasts class="container"></toasts>
</div>





</div>


</body>
</html>