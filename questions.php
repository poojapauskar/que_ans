<?php 
header('Access-Control-Allow-Origin: *');
?>


<html>
<title>Questions</title>

<head>
 <script type="text/javascript" src="require.js"></script>
 <script src="ajax.js"></script>
<style>

h2{
  color:#4CAF50; 
}
h5{
  text-decoration: underline;
}

#confirm{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: auto 30px ;
}
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
<script type="text/javascript">



window.setInterval(function(){
  var f1 = document.getElementById('firstname').value;
  var l1 = document.getElementById('lastname').value;
  var e1 = document.getElementById('email').value;
  var p1 = document.getElementById('phone').value;
  var u1 = document.getElementById('usn').value;
  var s1 = document.getElementById('seconds').value;

  var mce_count = document.getElementById('multiple_choice_easy_count').value;
  var mcm_count = document.getElementById('multiple_choice_medium_count').value;
  var mcd_count = document.getElementById('multiple_choice_difficult_count').value;
  var i_count = document.getElementById('input_count').value;
  /*alert(f1);*/

  var question1 = new Array();
  var answer1 =new Array();
  var correct1 =new Array();
  /*alert(selection.checked);*/


  for (var x = 0; x < mce_count; x++) { 
      mae1="multiple_ans_easy".concat(x);
      mqe1="multiple_que_easy".concat(x);
      mce1="multiple_correct_ans_easy".concat(x);
      var mae = document.myForm.elements[mae1];
      var mqe = document.myForm.elements[mqe1];
      var mce = document.myForm.elements[mce1];

      count=0;

      for(var a=0;a<4;a++){
        

        if(mae[a].checked==true){
          /*alert(mae[a].value);*/
          var value_mae=mae[a].value;
          /*alert(value_mae);*/
          answer1=answer1.concat(value_mae);
          /*alert(answer1);*/

          count++;
        };
      } 

      var value_mqe=mqe.value;
      question1= question1.concat(value_mqe);
      /*console.log(question1);*/

      var value_mce=mce.value;
      correct1= correct1.concat(value_mce);
      /*console.log(correct1);*/ 

      /*alert(mqe.value);*/
      if(count == 0){
        answer1=answer1.concat('Not Answered');
        /*console.log(answer1);*/
        /*alert("Not Answered");*/
      } 
      /*alert(mce.value);*/

            
  }

  for (var x = 0; x < mcm_count; x++) { 
      mam1="multiple_ans_medium".concat(x);
      mqm1="multiple_que_medium".concat(x);
      mcm1="multiple_correct_ans_medium".concat(x);
      var mam = document.myForm.elements[mam1];
      var mqm = document.myForm.elements[mqm1];
      var mcm = document.myForm.elements[mcm1];

      count=0;

      for(var a=0;a<4;a++){
        

        if(mam[a].checked==true){
          /*alert(mae[a].value);*/
          var value_mam=mam[a].value;
          /*alert(value_mae);*/
          answer1=answer1.concat(value_mam);
          /*alert(answer1);*/

          count++;
        };
      } 

      var value_mqm=mqm.value;
      question1= question1.concat(value_mqm);
      /*console.log(question1);*/

      var value_mcm=mcm.value;
      correct1= correct1.concat(value_mcm);
      /*console.log(correct1);*/ 

      /*alert(mqe.value);*/
      if(count == 0){
        answer1=answer1.concat('Not Answered');
        /*console.log(answer1);*/
        /*alert("Not Answered");*/
      } 
      /*alert(mce.value);*/

            
  }

  for (var x = 0; x < mcd_count; x++) { 
      mad1="multiple_ans_difficult".concat(x);
      mqd1="multiple_que_difficult".concat(x);
      mcd1="multiple_correct_ans_difficult".concat(x);
      var mad = document.myForm.elements[mad1];
      var mqd = document.myForm.elements[mqd1];
      var mcd = document.myForm.elements[mcd1];

      count=0;

      for(var a=0;a<4;a++){
        

        if(mad[a].checked==true){
          /*alert(mae[a].value);*/
          var value_mad=mad[a].value;
          /*alert(value_mae);*/
          answer1=answer1.concat(value_mad);
          /*alert(answer1);*/

          count++;
        };
      } 

      var value_mqd=mqd.value;
      question1= question1.concat(value_mqd);
      /*console.log(question1);*/

      var value_mcd=mcd.value;
      correct1= correct1.concat(value_mcd);
      /*console.log(correct1);*/ 

      /*alert(mqe.value);*/
      if(count == 0){
        answer1=answer1.concat('Not Answered');
        /*console.log(answer1);*/
        /*alert("Not Answered");*/
      } 
      /*alert(mce.value);*/

            
  }

  for (var x = 0; x < 1; x++) { 
      iq1="input_que".concat(x);
      ia1="input_ans".concat(x);
      
      var iq = document.myForm.elements[iq1];
      var ia = document.myForm.elements[ia1];

 

      var value_iq=iq.value;
      question1= question1.concat(value_iq);
      /*console.log(question1);*/

      var value_ia=ia.value;

      for(var nl=0;  nl< value_ia.length; nl++) {
       value_ia= value_ia.replace("{", "(").replace("}",")").replace('"',"'");
      }

      

      if(value_ia == ''){
        answer1= answer1.concat("Not Answered");
      }else{
        answer1= answer1.concat(value_ia);
      }
      
      /*console.log(correct1);*/ 

      
      var ic="Input";
      correct1= correct1.concat(ic);
      /*console.log(correct1);*/

            
  }


  var bracket1="{";
  var bracket2="}";
  question1=question1.toString();
  answer1=answer1.toString();
  correct1=correct1.toString();

  question1=(bracket1.concat(question1)).concat(bracket2);
  answer1=(bracket1.concat(answer1)).concat(bracket2);
  correct1=(bracket1.concat(correct1)).concat(bracket2);

  
var Url="update.php";

  $.ajax({
  type: "POST",
  url: Url,
  dataType: 'json',
  data: {seconds:s1,firstname:f1,lastname:l1,email:e1,phone:p1,usn:u1,question_list:question1,answer_list:answer1,correct_ans_list:correct1,session:1},
  success: function(fields){
    $.each(fields, function(idx, f){
      /*alert(f.status);*/
      if(f.status==400){
        document.location.href='session_exp.php';
      }
    });
  }
});

}, 5000);




</script>


<?php

$url_check_usn = 'http://que-ans-project.herokuapp.com/check_usn_exists/';
$options_check_usn = array(
  'http' => array(
    'header'  => array(
                  'USN: '.$_POST['usn'],
                ),
    'method'  => 'GET',
  ),
);
$context_check_usn = stream_context_create($options_check_usn);
$output_check_usn = file_get_contents($url_check_usn, false,$context_check_usn);
/*echo $output_check_usn;*/

$check_usn = json_decode($output_check_usn,true);

if($check_usn[0]['status'] == 401){
   echo "<script> document.location.href='session_exp.php';</script>";
}

if($check_usn[0]['status'] == 400){
  $clock=$check_usn[0]['seconds'][0][0];
}
?>



<?php

$array1=array();
$array2=array();
$array3=array();
$array4=array();
$array1= UniqueRandomNumbersWithinRange(1,30,3);
$array2= UniqueRandomNumbersWithinRange(31,60,3);
$array3= UniqueRandomNumbersWithinRange(61,90,3);
$array4= UniqueRandomNumbersWithinRange(91,100,1);

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


if($check_usn[0]['question_list'] != ''){
 $string1= $check_usn[0]['question_list'][0][0][0].",".$check_usn[0]['question_list'][0][0][1].",".$check_usn[0]['question_list'][0][0][2];
 /*echo $string1;*/
}else{
 $string1=$array1[0].",".$array1[1].",".$array1[2];
 $string1=rtrim($string1, ",");
}

if($check_usn[0]['question_list'] != ''){
 $string2= $check_usn[0]['question_list'][0][0][3].",".$check_usn[0]['question_list'][0][0][4].",".$check_usn[0]['question_list'][0][0][5];
}else{
 $string2=$array2[0].",".$array2[1].",".$array2[2];
 $string2=rtrim($string2, ",");
}

if($check_usn[0]['question_list'] != ''){
 $string3= $check_usn[0]['question_list'][0][0][6].",".$check_usn[0]['question_list'][0][0][7].",".$check_usn[0]['question_list'][0][0][8];
}else{
 $string3=$array3[0].",".$array3[1].",".$array3[2];
 $string3=rtrim($string3, ",");
}

if($check_usn[0]['question_list'] != ''){
 $string4= $check_usn[0]['question_list'][0][0][9];
}else{
 $string4=$array4[0];
 $string4=rtrim($string4, ",");
}

?>

<?php 


?>

<?php

$url_random_que = 'http://que-ans-project.herokuapp.com/get_random_que/';
$options_random_que = array(
  'http' => array(
    'header'  => array(
                  'MULTI1: '.$string1,
                  'MULTI2: '.$string2,
                  'MULTI3: '.$string3,
                  'INPUT: '.$string4,
                ),
    'method'  => 'GET',
  ),
);
$context_random_que = stream_context_create($options_random_que);
$output_random_que = file_get_contents($url_random_que, false,$context_random_que);
/*echo $output_random_que;*/

$random_que = json_decode($output_random_que,true);
?>

<script type="text/javascript">
  window.onload=counter;
function counter()
{
/*var seconds = 3600;*/

var seconds= '<?php echo $clock ?>';
if(seconds == ''){
  seconds="3600";
}
countDown();
function countDown()
{
  document.getElementById('seconds').value = seconds;
  
  min= Math.floor(seconds/60);
  sec= seconds%60;
document.getElementById("remain").innerHTML=min+"    m :"+sec+"    s";
if(seconds>0)
{
seconds=seconds - 1;
setTimeout(countDown,1000);
}
if(seconds == 0)
{

document.getElementById("submit").click();
}

}
}
</script>


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

<h2 style="">Time Left</h2>
<h1 style="" id="remain"></h1>
<!-- <h4 style=""><?php echo "First Name :"; echo $_POST["firstname"]; ?></h4>
<h4 style=""><?php echo "Last Name  :"; echo $_POST["lastname"]; ?></h4>
<h4 style=""><?php echo "Email  :"; echo $_POST["email"]; ?></h4>
<h4 style=""><?php echo "Phone  :"; echo $_POST["phone"]; ?></h4>
<h4 style=""><?php echo "USN  :"; echo $_POST["usn"]; ?></h4> -->

<form method="post" name="myForm" id="myForm" action="submit.php">  
 <input  type="hidden" id="firstname" name="firstname" value=<?php echo $_POST["firstname"]; ?>>
 <input  type="hidden" id="lastname" name="lastname" value=<?php echo $_POST["lastname"]; ?>>
 <input  type="hidden" id="email" name="email" value=<?php echo $_POST["email"]; ?>>
 <input  type="hidden" id="phone" name="phone" value=<?php echo $_POST["phone"]; ?>>
<input  type="hidden" id="usn" name="usn" value=<?php echo $_POST["usn"]; ?>>
<input  type="hidden" id="seconds" name="seconds" value="">

<input  type="hidden" id="multiple_choice_easy_count" name="multiple_choice_easy_count" value=<?php echo count($random_que[0]['multi_choice_easy']); ?>>
<input  type="hidden" id="multiple_choice_medium_count" name="multiple_choice_medium_count" value=<?php echo count($random_que[0]['multi_choice_medium']); ?>>
<input  type="hidden" id="multiple_choice_difficult_count" name="multiple_choice_difficult_count" value=<?php echo count($random_que[0]['multi_choice_difficult']); ?>>
<input  type="hidden" id="input_count" name="input_count" value=<?php echo count($random_que[0]['input']); ?>>

 
<br>
<h2>Multiple choice questions</h2> 

<h5>Easy</h5>

<?php 
  for ($x = 0; $x < count($random_que[0]['multi_choice_easy']); $x++) { 
    
    $q= str_replace('{','',$random_que[0]['multi_choice_easy'][$x]['options']);
    $r= str_replace('}','',$q);
    $myString1=$r;
    $myArray1 = explode(',', $myString1);
?>


<input type="hidden" name=<?php echo "multiple_que_easy".$x ?> value=<?php echo $random_que[0]['multi_choice_easy'][$x]['question_id'] ?> ></option>
<input type="hidden" name=<?php echo "multiple_correct_ans_easy".$x ?> value=<?php echo $random_que[0]['multi_choice_easy'][$x]['correct_ans'] ?> ></option>

<?php echo $random_que[0]['multi_choice_easy'][$x]['question'] ?><br>

<?php                      
if($check_usn[0]['answer_list'][0][0][$x] == "a"){
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="a" checked="checked">'.$myArray1[0].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="a">'.$myArray1[0].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x] == "b"){
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="b" checked="checked">'.$myArray1[1].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="b">'.$myArray1[1].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x] == "c"){
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="c" checked="checked">'.$myArray1[2].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="c">'.$myArray1[2].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x] == "d"){
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="d" checked="checked">'.$myArray1[3].'<br>';
}else{
 echo '<input type="radio" name="multiple_ans_easy'.$x.'" value="d">'.$myArray1[3].'<br>';
}  
?>                     
                      
<?php  } ?>


<h5>Medium</h5>

<?php 
  for ($x = 0; $x < count($random_que[0]['multi_choice_medium']); $x++) {  
 
    $q= str_replace('{','',$random_que[0]['multi_choice_medium'][$x]['options']);
    $r= str_replace('}','',$q);
    $myString1=$r;
    $myArray1 = explode(',', $myString1);
// var_dump($myArray1);
?>

<input type="hidden" name=<?php echo "multiple_que_medium".$x ?> value=<?php echo $random_que[0]['multi_choice_medium'][$x]['question_id'] ?> ></option>
<input type="hidden" name=<?php echo "multiple_correct_ans_medium".$x ?> value=<?php echo $random_que[0]['multi_choice_medium'][$x]['correct_ans'] ?> ></option>

<?php echo $random_que[0]['multi_choice_medium'][$x]['question'] ?><br>
                     
<?php                      
if($check_usn[0]['answer_list'][0][0][$x+3] == "a"){
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="a" checked="checked">'.$myArray1[0].'<br>';
}else{
  echo  '<input type="radio" name="multiple_ans_medium'.$x.'" value="a">'.$myArray1[0].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+3] == "b"){
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="b" checked="checked">'.$myArray1[1].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="b">'.$myArray1[1].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+3] == "c"){
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="c" checked="checked">'.$myArray1[2].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="c">'.$myArray1[2].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+3] == "d"){
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="d" checked="checked">'.$myArray1[3].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value="d">'.$myArray1[3].'<br>';
}  
?>

<?php  } ?>


<h5>Difficult</h5>

<?php 
  for ($x = 0; $x < count($random_que[0]['multi_choice_difficult']); $x++) {  
 
    $q= str_replace('{','',$random_que[0]['multi_choice_difficult'][$x]['options']);
    $r= str_replace('}','',$q);
    $myString1=$r;
    $myArray1 = explode(',', $myString1);
    // var_dump($myArray1);
?>

<input type="hidden" name=<?php echo "multiple_que_difficult".$x ?> value=<?php echo $random_que[0]['multi_choice_difficult'][$x]['question_id'] ?> ></option>
<input type="hidden" name=<?php echo "multiple_correct_ans_difficult".$x ?> value=<?php echo $random_que[0]['multi_choice_difficult'][$x]['correct_ans'] ?> ></option>

<?php echo $random_que[0]['multi_choice_difficult'][$x]['question'] ?><br>
                   
<?php
if($check_usn[0]['answer_list'][0][0][$x+6] == "a"){
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="a" checked="checked">'.$myArray1[0].'<br>';
}else{
  echo  '<input type="radio" name="multiple_ans_difficult'.$x.'" value="a">'.$myArray1[0].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+6] == "b"){
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="b" checked="checked">'.$myArray1[1].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="b">'.$myArray1[1].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+6] == "c"){
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="c" checked="checked">'.$myArray1[2].'<br>';
}else{
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="c">'.$myArray1[2].'<br>';
}

if($check_usn[0]['answer_list'][0][0][$x+6] == "d"){
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="d" checked="checked">'.$myArray1[3].'<br>'; 
}else{
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value="d">'.$myArray1[3].'<br>';
}  
?>

<?php  } ?>


<br>
<h2>Descriptive question</h2> 

<?php 
  for ($x = 0; $x < count($random_que[0]['input']); $x++) { ?>
      
    <input type="hidden" name=<?php echo "input_que".$x ?> value=<?php echo $random_que[0]['input'][$x]['question_id'] ?> ></option>
    <?php echo $random_que[0]['input'][$x]['question'] ?><br>
    
    <?php 
      if($check_usn[0]['answer_list'][0][0][$x+9] != ''){
       echo '<textarea rows="30" cols="70" name="input_ans'.$x.'" rows="5" cols="40">'.$check_usn[0]['answer_list'][0][0][$x+9].'</textarea><br>'; 
      }else{
       echo '<textarea rows="30" cols="70" name="input_ans'.$x.'" rows="5" cols="40"></textarea><br>';
      }
    ?>
    
  <?php  } ?>
<br>
<br>
  

<script type="text/javascript">
  function confirm_box(){
    var res = confirm('Do you really want to submit the form?');
    if(!res){ 
      return false; 
    }else{ 
      document.getElementById("submit").click();
    }
  }


</script>


<button type="button" onclick="confirm_box()" name="confirm" id="confirm" value="Confirm">Confirm</button>  

<input style="display:none;" type="submit" name="submit" id="submit" value="Submit">  


</form>

</body>
</html>