
<?php 
include_once 'partials/headers.php';
include_once 'partials/nav.php';
?>


<?php
if (isset($_POST['register'])) {
    //get the data input by user
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $errors = [];
    $msgs = [];

    
      
    //validattion
    if (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $errors[] = "Invalid Email Format";
    }
    if (strlen($password) < 3) {
        $errors[] = "Password must be at least 3 characters";
    }

    //if no errors

    if (empty($errors)) {

        //$activation_token = sha1($email . time() . $_SERVER['REMOTE_ADDR']);
        //$password = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare('INSERT INTO `tbl_user`(`name`,`username`,`email`,`password`) VALUES(:name,:username,:email,:password)');
        $query->bindValue('name', strtolower($name));
        $query->bindValue('username', strtolower($username));
        $query->bindValue('email', strtolower($email));
        $query->bindValue('password', md5($password));
       // $query->bindValue('activation_token', $activation_token);
        $query->execute();

        $msgs[] = "Registration done successfully! ";
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
            <?php if (!empty($msgs)) { ?>
                <div>
                <?php foreach ($msgs as $msg) { ?>
                        <p><?php echo $msg ?></p>  
                    <?php } ?>
                </div>   
                <?php } ?>
            
        </h1>
            
       

<form action="register.php" method='post' style="border:1px solid #ccc">
  <div class="container">
      <label><b>Name</b></label>
    <input type="text" placeholder="Full Name" name="name" required>
    
      <label><b>Username</b></label>
    <input type="text" placeholder="username" name="username" required>
    
    <label><b>Email</b></label>
    <input type="text" placeholder="email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="password" name="password" required>

    
    <input type="checkbox" checked="checked"> Remember me
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn2">Cancel</button>
      
      <button type="submit" class="signupbtn" name="register">Sign Up</button>
      
    </div>
  </div>
</form>
		
		
</div>
<?php include_once 'partials/footers.php'; ?>