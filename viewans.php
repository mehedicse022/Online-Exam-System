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



<?php // select the answer ..... 

        $query = $connection->prepare("SELECT * FROM tbl_ques ORDER BY quesNo ASC ");
        $query->execute();
        
        if($query = true){
            
        
?>

<div class="main">
    <div>
    <h1>All Question Ans </h1>
    
    <form action="" method="post" class="examtest">
    <table>
        <?php
        while ($result = $query->fetch()){
            
        
        ?>
        
                <tr>
                    <td colspan="2">
                        <h3>Question No  <?php echo $result['quesNo'] ;?> :
                                         <?php echo $result['ques'] ;?></h3
                    </td>
                    
                </tr>
                
                <?php // Call to the answer of ques..........
                    $number = $result['quesNo'];
                    $ansquery = $connection->prepare("SELECT * FROM tbl_ans WHERE quesNo = '$number'");
                    $ansquery->execute();
                    if($ansquery){
                        while ($ansresult = $ansquery->fetch()){
                  
                ?>
                
                <tr>
                    <td>
                        <input type="radio" />
                              <?php 
                                    if($ansresult['rightans'] == '1'){
                                        echo "<span style='color:red'>".$ansresult['ans']."</span>" ;
                                    }else{
                                        echo $ansresult['ans'] ;
                                    }
                                    
                              ?>
                    </td>
                    
                </tr>
               <?php // End the ans of ques..........
               } }
               ?>
             <?php // End the ans of ques..........
               } }
               ?>
                 
    </table>
    </form>  
    
    </div>
</div>

 <?php  }?>





<?php include_once 'partials/footers.php'; ?>