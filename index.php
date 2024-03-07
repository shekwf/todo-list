<?php
include "bootstrap/init.php";

if(isset($_GET['logout'])){
    logout();
}

if(!isLoggedIn()){//اگ کاربر لاگین نبود بره تو این صفه
    // redirect to aut form
    header("Location: " . site_url('auth.php'));
}
# user is LoggedIn
$user = getLoggedInUser();

if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount = deleteFolder($_GET['delete_folder']);
    // echo "$deletedCount folders succesfully deleted!";
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedCount = deleteTask($_GET['delete_task']);
    // echo "$deletedCount Tasks succesfully deleted!";
}


# connect to db and get tasks
$folders = getFolders();
//var_dump($folders);


$tasks = getTasks();

include "tpl/tpl-index.php";//همه ی متغیر های بالا در این فایل قابل دسترس است