<?php
$Json = file_get_contents('./wordingUtils/en.json');

$enJson = json_decode($Json, true);

// Prevent the user from going on non-existing pages
session_start();
$page_title = 'Unknown page?';
$existing_pages = ['Home', 'Explorer', 'Subscriptions', 'Library', 'History', 'LikedVideo', 'WatchLater', 'Profile', 'Register', 'Login', 'Channel_page', 'Upload', 'SearchPage', 'SearchPage', 'Watch', '404'];
$homeBar = $_GET['name'];

if (empty($_GET['name']) == false) {
    if (in_array($_GET['name'], $existing_pages)) {
        $pageName = $_GET['name'];
    } else {
        $pageName = "404";
        header('Location: index.php?name=404');
    }
} else {
    header('Location: index.php?name=Home');
}
include __DIR__ . '/front-end/views/pages/upload.php'; //$channelVideoUpload
include __DIR__ . '/front-end/views/pages/channel.php';
include __DIR__ . '/front-end/views/components/FilterBar.php'; // $filterbar
include  __DIR__ . '/front-end/views/pages/' . $pageName . '.php'; // $page 
include  __DIR__ . "/front-end/partials/Menu.php"; // $menu
include  __DIR__ . "/front-end/partials/NavBar.php"; // $navBar


require_once './template.php';
