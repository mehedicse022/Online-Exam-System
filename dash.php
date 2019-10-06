
<?php

include_once 'partials/headers.php';
include_once 'partials/dashnav.php';

if(empty($_SESSION) || empty($_SESSION['uid']) || empty($_SESSION['username'])){
    header('Location: index.php');
}
?>






<?php include_once 'partials/footers.php';?>

