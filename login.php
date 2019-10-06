
<?php 
include_once 'partials/headers.php';
include_once 'partials/nav.php';
?>



<?php
if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
   // $status   = trim($_POST['status']);
    $errors = [];
    $msgs = [];



    //validation
    if (strlen($username) < 3) {
        $errors[] = " Invalid Username or password ";
    }
    if (strlen($password) < 3) {
        $errors[] = "Invalid Password or password";
    }



    //if no errors

    if (empty($errors)) {
        $query = $connection->prepare('SELECT `userid`,`password`,`status` FROM `tbl_user` WHERE `username` = :username');
        $query->bindValue('username', strtolower($username));
        $query->execute();
        $data = $query->fetch();
        



        if ($query->rowCount() === 1 && md5($password) == $data['password'] && $data['status'] != '1') {
            $_SESSION['uid'] = $data['userid'];
            $_SESSION['username'] = $username;
            header('Location: dash.php');
       
        }else if($data['status'] == '1'){
            $msgs[] = "User is Disabled !";
        }
        
        else{
        $errors[] = 'Invalid username or password ';
        }
    }
}
?>


	
	<div class="content_area_login">
                    
                <h1>
                <?php if (!empty($errors)) { ?>
                <div >
                <?php foreach ($errors as $error) { ?>
                        <p><?php echo $error ?></p>  
                    <?php } ?>
                </div>   
                <?php } ?>
            <?php  if (!empty($msgs)) { ?>
                <div>
                <?php foreach ($msgs as $msg) { ?>
                        <p><?php echo $msg ?></p>  
                    <?php } ?>
                </div>   
                <?php } ?>
             </h1>
                
       
   <form action="#" method="post">

  <div class="imgcontainer">
    <img src="image/img_avatar.png" alt="Avatar" class="avatar">
  </div>
 
  <div class="container">
     
    <label><b>Username</b></label>
    <input type="text" placeholder="username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="password" name="password" required>

    <button type="submit" name="login">Login</button>
    
    <input type="checkbox" checked="checked"> Remember me
     
  </div>
      

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 
		
		
</div>


<?php include_once 'partials/footers.php';?>