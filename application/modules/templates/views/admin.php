<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $page_title ?? "untitled Webpage" ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $theme_url ?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?= base_url('admin') ?>">Admin</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="<?= base_url('login/destroy') ?>"><i
                                class="fa fa-sign-out fa-lg"></i>
                        Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url('admin') ?>"><i class="app-menu__icon fa
        fa-dashboard"></i><span
                        class="app-menu__label">Administrator</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa
        fa-laptop"></i><span class="app-menu__label">Manage Modules</span><i class="treeview-indicator fa
        fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="<?= base_url('users/manage') ?>">
                        <i class="icon fa fa-users"></i> Manage Users
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<?php

if (isset($view_file)) {
    $this->load->view($module . '/' . $view_file);
}
?>
<!-- Essential javascripts for application to work-->
<script src="<?= $theme_url ?>js/jquery-3.2.1.min.js"></script>
<script src="<?= $theme_url ?>js/popper.min.js"></script>
<script src="<?= $theme_url ?>js/bootstrap.min.js"></script>
<script src="<?= $theme_url ?>js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?= $theme_url ?>js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->

</body>
</html>