<html>

<?php 

$questions = array();
$answers = array();

echo $_POST['name'];
echo $_POST['usn'];
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

<?php echo $questions;echo $answers; ?>




<title>Thank You</title>
<h1>Thank You</h1>
</html>