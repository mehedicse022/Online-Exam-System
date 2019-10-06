<?php

include_once 'partials/headers.php';
include_once 'partials/dashnav.php';
//session_start();
?>


<div class="main">
    <div class="examtest">
         <h1>You are Done !</h1>
        <h2>Congrats !!! You have just Completed Exam </h2>
        <h2>Your Score : 
            <?php 
               if($_SESSION['score']){
                   echo $_SESSION['score'] ;
                   unset($_SESSION['score']);
               }
            ?>
        </h2>
        
        <h1><a href="viewans.php">View Ans</a></h1>
        <h1><a href="startexam.php">Start Again...</a></h1>
    </div>
   
    </div>
</div>



<?php include_once 'partials/footers.php'; ?>