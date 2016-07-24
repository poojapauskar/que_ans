<html>

<?php 

$questions = array();
$answers = array();

/*echo $_POST['name'];
echo $_POST['usn'];*/
                    for ($x = 0; $x < $_POST['multiple_que_count']; $x++) { ?>
                    <!--	<?php echo $_POST['multiple_que'.$x]; ?><br>
                    	<?php echo $_POST['multiple_ans'.$x]; ?><br><br> -->

                    <?php	array_push($questions, $_POST['multiple_que'.$x]);
                    	array_push($answers, $_POST['multiple_ans'.$x]); ?>

<?php }?>

<?php 
                    for ($x = 0; $x < $_POST['true_false_que_count']; $x++) { ?>
                    <!--	<?php echo $_POST['true_false_que'.$x]; ?><br>
                    	<?php echo $_POST['true_false_ans'.$x]; ?><br><br>  -->

                    <?php	array_push($questions, $_POST['true_false_que'.$x]);
                    	array_push($answers, $_POST['true_false_ans'.$x]); ?>

<?php }?>

<?php 
                    for ($x = 0; $x < $_POST['input_que_count']; $x++) { ?>
                    <!--	<?php echo $_POST['input_que'.$x]; ?><br>
                    	<?php echo $_POST['input_ans'.$x]; ?><br><br>  -->

                    <?php	array_push($questions, $_POST['input_que'.$x]);
                    	array_push($answers, $_POST['input_ans'.$x]); ?>

<?php }?>

<?php /*echo $questions;echo $answers;*/ ?>

<?php
		$url8 = 'https://que-ans-project.herokuapp.com/que_ans_list/';
        $data8 = array('name' => $_POST['name'],'usn' => $_POST['usn'],'question_list' => $questions,'answer_list' => $answers);
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
          /*echo "City added";*/
        }
?>



<title>Thank You</title>
<h1>Thank You</h1>
</html>