<html>



<?php 

$questions = array();
$answers = array();
$correct_answers = array();

/*echo $_POST['firstname'];
echo $_POST['multiple_choice_easy_count'];
echo $_POST['multiple_choice_medium_count'];
echo $_POST['multiple_choice_difficult_count'];*/


/*echo $_POST['name'];
echo $_POST['usn'];*/
                    for ($x = 0; $x < $_POST['multiple_choice_easy_count']; $x++) { ?>
                    <!--	<?php echo $_POST['multiple_que_easy'.$x]; ?><br>
                    	<?php echo $_POST['multiple_ans_easy'.$x]; ?><br><br>  -->

                    <?php	
                        array_push($questions, $_POST['multiple_que_easy'.$x]);
                        array_push($correct_answers, $_POST['multiple_correct_ans_easy'.$x]);
                    

                    if($_POST['multiple_ans_easy'.$x] == ''){
                         array_push($answers, 'Not answered');
                        
                    }else{
                       array_push($answers, $_POST['multiple_ans_easy'.$x]); 
                    }
                    
                    	?>

<?php }?>

<?php 
                    for ($x = 0; $x < $_POST['multiple_choice_medium_count']; $x++) { ?>
                	<!--<?php echo $_POST['multiple_que_medium'.$x]; ?><br>
                    	<?php echo $_POST['multiple_ans_medium'.$x]; ?><br><br>   -->

                    <?php  
                        array_push($questions, $_POST['multiple_que_medium'.$x]);
                        array_push($correct_answers, $_POST['multiple_correct_ans_medium'.$x]);
                   

                     if($_POST['multiple_ans_medium'.$x] == ''){
                        
                        array_push($answers, 'Not answered');
                    }else{
                        array_push($answers, $_POST['multiple_ans_medium'.$x]);
                    }


                     
                         ?>

<?php }?>

<?php 
                    for ($x = 0; $x < $_POST['multiple_choice_difficult_count']; $x++) { ?>
                   <!-- <?php echo $_POST['multiple_que_difficult'.$x]; ?><br>
                    	<?php echo $_POST['multiple_ans_difficult'.$x]; ?><br><br> -->



                     <?php 

                        array_push($questions, $_POST['multiple_que_difficult'.$x]);
                        array_push($correct_answers, $_POST['multiple_correct_ans_difficult'.$x]);
                   


                     if($_POST['multiple_ans_difficult'.$x] == ''){
                       
                        array_push($answers, 'Not answered');
                    }else{
                        array_push($answers, $_POST['multiple_ans_difficult'.$x]);
                    }
                     
                         ?>

<?php }?>

<?php 
                    for ($x = 0; $x < 1; $x++) { ?>
                  <!-- <?php echo $_POST['input_que'.$x]; ?><br>
                        <?php echo $_POST['input_ans'.$x]; ?><br><br> -->




                     <?php  
                      array_push($questions, $_POST['input_que'.$x]);
                      array_push($correct_answers, ' ');
                   

                    if($_POST['input_que'.$x] == ''){
                     array_push($answers, 'Not answered');
                    }else{
                        
                         array_push($answers, $_POST['input_ans'.$x]); 
                    }

                    ?>
                     
                     
                       

<?php }?>

<?php /*echo $questions;echo $answers;*/ ?>

<?php
		$url8 = 'https://que-ans-project.herokuapp.com/que_ans_list/';
        $data8 = array('firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'email' => $_POST['email'],'phone' => $_POST['phone'],'usn' => $_POST['usn'],'question_list' => $questions,'answer_list' => $answers,'correct_ans_list' => $correct_answers);
        // use key 'http' even if you send the request to https://...
        $options8 = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data8),
          ),
        );
        $context8  = stream_context_create($options8);
        $result8 = file_get_contents($url8, false, $context8);
        /*echo $result8;*/
        $arr9 = json_decode($result8,true);
        if($arr9 != ''){
          echo "Thank You";
        }else{
          echo "Please go back and submit the form again"; 
        }
?>



<head>
  <title>Thank You</title>

<style type="text/css">
  .navbar{

width:100%;
padding: 2%;
padding-bottom: 6%;
background-color:rgba(255, 255, 255);
margin-top: -10px;
margin-left:-10px;
}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Bitjini_logo" src="bitjini_apps_more_logo.png" style="float: right;
    margin: -6px 30px;">
      </a>
    </div>
  </div>
</nav>
 <!--  <p style="text-align: center;color: #66CC33;font-size: 60px;margin-top: 150px;">Thank You</p>

  <br>

  <p style="text-align: center;color: #66CC33;font-size: 30px;margin-top: 40px;">Please go back and submit the form again</p> -->
</html>