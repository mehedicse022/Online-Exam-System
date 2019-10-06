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

        if(isset($_GET['q'])){
            $number = $_GET['q'];
           
         }else{
             header('Location: exam.php');
         }
      $query = $connection->prepare("SELECT * FROM tbl_ques WHERE quesNo = '$number'");
      $query->execute();
      $result = $query->fetch();
      if($result == true ){
 ?>

<?php // Caught the answer ..... 

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $ans = $_POST['ans'];
          $number = $_POST['number'];
          $nextnumber = $number + 1 ;
          
          if(!isset($_SESSION['score'])){
              $_SESSION['score'] = 0;
          }
          
          $ransquery = $connection->prepare("SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightans = '1' ");
          $ransquery->execute();
          $ransresult = $ransquery->fetch();
          $getresult = $ransresult['id'];
          
           if($getresult == $ans){
               $_SESSION['score']++ ;
           }
           if($number == $totalrow ){
                 header('Location: final.php');
                 exit();
            }else{
                header('Location: startexam.php?q='.$nextnumber);
            }
          
      } 
?>

<div class="main">
    <div>
    <h1>Question  <?php echo $result['quesNo'] ;?> of <?php echo $totalrow ;?> </h1>
    
    <form action="" method="post" class="examtest">
    <table>
                <tr>
                    <td colspan="2">
                        <h3>Question No  <?php echo $result['quesNo'] ;?> :
                                         <?php echo $result['ques'] ;?></h3
                    </td>
                    
                </tr>
                
                <?php // Call to the answer of ques..........
                
                    $ansquery = $connection->prepare("SELECT * FROM tbl_ans WHERE quesNo = '$number'");
                    $ansquery->execute();
                    if($ansquery){
                        while ($ansresult = $ansquery->fetch()){
                  
                ?>
                
                <tr>
                    <td>
                        <input type="radio" name="ans" value="<?php echo $ansresult['id'] ;?>"/>
                              <?php echo $ansresult['ans'] ;?>
                    </td>
                    
                </tr>
               <?php // End the ans of ques..........
               } }
               ?>
                 <tr>
                    <td>
                        <input type="submit" name="submit" value="Next Ques"/>
                        <input type="hidden" name="number" value="<?php echo $number;?>"/>    
                    </td>
                    
                </tr>
    </table>
    </form>  
    
    </div>
</div>

 <?php } }?>





<?php include_once 'partials/footers.php'; ?>