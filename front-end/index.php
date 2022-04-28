<?php

$Json = file_get_contents('./wordingUtils/en.json');

$enJson = json_decode($Json, true);

// Prevent the user from going on non-existing pages
session_start();
require_once __DIR__ . '/../back-end/db.php';
$page_title = 'Unknown page?';
$existing_pages = ['Home', 'Explorer', 'Subscriptions', 'Library', 'History', 'LikedVideo', 'WatchLater'];

if (empty($_GET['name']) == false) {
    if (in_array($_GET['name'], $existing_pages)) {
        $pageName = $_GET['name'];
    } else {
        $pageName = "404";
    }
} else {
    $pageName = "Home";
}

$request = explode('?', $_SERVER['REQUEST_URI']);

switch ($request[0]) {
        /* case '/':
        require_once __DIR__ . '/views/Profile/home.php';
        break; */
    case '/login':
        require_once __DIR__ . '/views/Profile/login.php';
        break;
    case '/register':
        require_once __DIR__ . '/views/Profile/register.php';
        break;
        /*  case '/deconnexion':
        require_once __DIR__. '/action/disconnect.php';
        break; */
    case '/profils':
        require_once __DIR__ . '/views/Profile/profils.php';
        break;
}

include __DIR__ . '/views/Timeline/' . $pageName . '.php'; // $page 
include __DIR__ . "/partials/Menu.php"; // $menu
require_once __DIR__ . '/template.php';
