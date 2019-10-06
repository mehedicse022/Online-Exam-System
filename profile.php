<?php
include_once 'partials/headers.php';
include_once 'partials/dashnav.php';
//session_start();
$userid = $_SESSION['uid'];

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//$update = $_POST['update'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$queryupdate = $connection->prepare("UPDATE tbl_user SET
               name = '$name',
               username = '$username',
               email = '$email'
               WHERE userid = '$userid' ");

	$queryupdate->execute();

	if ($queryupdate == true) {

		?>



<div class="main">

    <h1>
      <?php
echo "Update is successful ! ";

	}} ?>
    </h1>

       <form action="" method="post" class="profile">

<?php

$query = $connection->prepare("SELECT * FROM tbl_user WHERE userid ='$userid'");
$query->execute();
$getdata = $query->fetch();
if ($getdata == true) {
	?>
            <table >
                <tr>
                    <td>Name</td>
                    <td><input name="name" type="text" value="<?php echo $getdata['name']; ?>" /></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input name="username" type="text" value="<?php echo $getdata['username']; ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input name="email" type="text" value="<?php echo $getdata['email']; ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="update" /></td>
                </tr>
            </table>
 <?php }?>
        </form>

</div>











<?php include_once 'partials/footers.php';?>