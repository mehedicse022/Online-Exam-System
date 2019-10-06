<?php

include_once 'partials/headers.php';
include_once 'partials/dashnav.php';
//session_start();
?>
<?php
// Call Number of Question ......

 $rowquery = $connection->prepare("SELECT COUNT(*) FROM `tbl_ques`");
 $rowquery->execute();
 $totalrow = (int)$rowquery->fetchColumn();
  if($totalrow == true){
?>

<?php 
//Call Question No ..........

      $query = $connection->prepare('SELECT * FROM `tbl_ques`');
      $query->execute();
      $result = $query->fetch();
      if($result == true ){
 ?>


<div class="main">
    <div class="examtest">
    <h1>Welcome to Online Exam </h1>
    <h2>Test your Knowledge </h2>
    <ul>
        <li><strong>Number of Questions: </strong><?php echo $totalrow;?></li>
        <li><strong>Questions Type: </strong>Multiple Choice</li>
    </ul>
    
     <h1><a href="startexam.php?q=<?php echo $result['quesNo'] ;?>">Start Exam...</a></h1>
    </div>
</div>
  <?php } } ?>



<?php include_once 'partials/footers.php'; ?>