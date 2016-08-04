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
                  <!--  <?php echo $_POST['multiple_que_easy'.$x]; ?><br>
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
              <!--  <?php echo $_POST['multiple_que_medium'.$x]; ?><br>
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
                <!--   <?php echo $_POST['multiple_que_difficult'.$x]; ?><br>
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
               <!--   <?php echo $_POST['input_que'.$x]; ?><br>
                        <?php echo $_POST['input_ans'.$x]; ?><br><br> -->




                     <?php  
                      array_push($questions, $_POST['input_que'.$x]);
                      array_push($correct_answers, 'Input');
                   

                    if($_POST['input_que'.$x] == ''){
                     array_push($answers, 'Not answered');
                    }else{
                        
                         array_push($answers, $_POST['input_ans'.$x]); 
                    }

                    ?>
                     
                     
                       

<?php }?>

<?php /*var_dump("{".implode(',',$questions)."}");
      var_dump("{".implode(',',$answers)."}");
      var_dump("{".implode(',',$correct_answers)."}");*/

      $string_q= '{'.implode(',',$questions).'}';
      $string_a= '{'.implode(',',$answers).'}';
      $string_c= '{'.implode(',',$correct_answers).'}';

      /*echo $string_q;echo "<br>";
      echo $string_a;echo "<br>";
      echo $string_c;echo "<br>";*/

?>

<?php
/*$data = array('firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'email' => $_POST['email'],'phone' => $_POST['phone'],'usn' => $_POST['usn'],'question_list' => $string_q,'answer_list' => $string_a,'correct_ans_list' => $string_c,'session' => 0);
var_dump($data);
$ch = curl_init('http://127.0.0.1:8000/update_details/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);


if (!$response) 
{
    return false;
}*/




		    $url8 = 'http://que-ans-project.herokuapp.com/update_details/';
        $data8 = array('seconds'=>$_POST['seconds'],'firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'email' => $_POST['email'],'phone' => $_POST['phone'],'usn' => $_POST['usn'],'question_list' => $string_q,'answer_list' => $string_a,'correct_ans_list' => $string_c,'session' => 1);
        // use key 'http' even if you send the request to https://...
        $options8 = array(
          'http' => array(
            'header'  => "Content-Type : application/json; charset=UTF-8\r\n",
            'method'  => 'PUT',
            'content' => http_build_query($data8),
          ),
        );
        $context8  = stream_context_create($options8);
        $result8 = file_get_contents($url8, false, $context8);
       /* echo $result8;*/
        $arr9 = json_decode($result8,true);
        if($arr9 != ''){
          if($arr9['status'] == 400){
           echo "Session expired";
          }else{
            echo "Thank You";
          }
        }else{
          echo "Please go back and submit the form again"; 
        }

        /*echo $_POST['usn'];*/

        $url_session_0 = 'http://que-ans-project.herokuapp.com/set_session_0/';
        $options_session_0 = array(
          'http' => array(
            'header'  => array(
                          'USN: '.$_POST['usn'],
                        ),
            'method'  => 'GET',
          ),
        );
        $context_session_0 = stream_context_create($options_session_0);
        $output_session_0 = file_get_contents($url_session_0, false,$context_session_0);

        $session_0 = json_decode($output_session_0,true);
        

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