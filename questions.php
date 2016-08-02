<?php 
/*echo "Name :".$_POST["name"];echo "<br>";
echo "USN  :".$_POST["usn"];*/

?>


<html>
<title>Questions</title>

<head>
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
window.onload=counter;
function counter()
{
var seconds = 3600;
countDown();
function countDown()
{

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


/*window.setInterval(function(){
  document.getElementById("submit").click();
}, 60000*60);*/


</script>


<?php

/*echo $_POST['usn'];*/

$url_check_usn = 'http://127.0.0.1:3000/check_usn_exists/';
/*$data = array('key1' => 'value1', 'key2' => 'value2');*/
// use key 'http' even if you send the request to https://...
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

/*echo count($random_que[0]['multi_choice_easy']);*/
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

/*print_r($array1);
print_r($array2);*/
/*echo $array1[0];
echo $array2[1];*/

if($check_usn[0]['question_list'] != ''){
 $string1= $check_usn[0]['question_list'][0][0][0].",".$check_usn[0]['question_list'][0][0][1].",".$check_usn[0]['question_list'][0][0][2];
 echo $string1;
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


// $string1=string($string1);
// $string2=string($string2);


/*echo $string1;echo "<br>";
echo $string2;*/
?>

<?php 


?>

<?php

$url_random_que = 'https://que-ans-project.herokuapp.com/get_random_que/';
/*$data = array('key1' => 'value1', 'key2' => 'value2');*/
// use key 'http' even if you send the request to https://...
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

/*echo count($random_que[0]['multi_choice_easy']);*/
?>


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
 <input  type="hidden" name="firstname" value=<?php echo $_POST["firstname"]; ?>>
 <input  type="hidden" name="lastname" value=<?php echo $_POST["lastname"]; ?>>
 <input  type="hidden" name="email" value=<?php echo $_POST["email"]; ?>>
 <input  type="hidden" name="phone" value=<?php echo $_POST["phone"]; ?>>
<input  type="hidden" name="usn" value=<?php echo $_POST["usn"]; ?>>

<input  type="hidden" name="multiple_choice_easy_count" value=<?php echo count($random_que[0]['multi_choice_easy']); ?>>
<input  type="hidden" name="multiple_choice_medium_count" value=<?php echo count($random_que[0]['multi_choice_medium']); ?>>
<input  type="hidden" name="multiple_choice_difficult_count" value=<?php echo count($random_que[0]['multi_choice_difficult']); ?>>
<input  type="hidden" name="input_count" value=<?php echo count($random_que[0]['input']); ?>>

 
<br>
<h2>Multiple choice questions</h2> 
<!-- <input type="radio" id="_1234" name="multiple0" value="abc">Abc<br> -->

<h5>Easy</h5>

  <?php 
                    for ($x = 0; $x < count($random_que[0]['multi_choice_easy']); $x++) { ?>
<?php 
 
$q= str_replace('{','',$random_que[0]['multi_choice_easy'][$x]['options']);
$r= str_replace('}','',$q);
$myString1=$r;
$myArray1 = explode(',', $myString1);


/*var_dump($myArray1[0]);
var_dump($check_usn[0]['answer_list'][0][0][0]);*/



?>


                        <input type="hidden" name=<?php echo "multiple_que_easy".$x ?> value=<?php echo $random_que[0]['multi_choice_easy'][$x]['question_id'] ?> ></option>
                        <input type="hidden" name=<?php echo "multiple_correct_ans_easy".$x ?> value=<?php echo $random_que[0]['multi_choice_easy'][$x]['correct_ans'] ?> ></option>
                        <?php echo $random_que[0]['multi_choice_easy'][$x]['question'] ?><br>
<?php                      
if($myArray1[0] == $check_usn[0]['answer_list'][0][0][$x]){
  echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[0].' checked="checked">'.$myArray1[0].'<br>';
}else{
    echo  '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[0].'>'.$myArray1[0].'<br>';
}

if($myArray1[1] == $check_usn[0]['answer_list'][0][0][$x]){
     echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[1].' checked="checked">'.$myArray1[1].'<br>';
}else{
       echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[1].'>'.$myArray1[1].'<br>';
}

if($myArray1[2] == $check_usn[0]['answer_list'][0][0][$x]){
      echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[2].' checked="checked">'.$myArray1[2].'<br>';
}else{
      echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[2].'>'.$myArray1[2].'<br>';
}

if($myArray1[3] == $check_usn[0]['answer_list'][0][0][$x]){
    echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[3].' checked="checked">'.$myArray1[3].'<br>';
  
}else{
 echo '<input type="radio" name="multiple_ans_easy'.$x.'" value='.$myArray1[3].'>'.$myArray1[3].'<br>';
}  ?>                     
                      
                       
<?php  } ?>


<h5>Medium</h5>

  <?php 
                    for ($x = 0; $x < count($random_que[0]['multi_choice_medium']); $x++) { ?>
<?php 
 
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
if($myArray1[0] == $check_usn[0]['answer_list'][0][0][$x+3]){
  echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[0].' checked="checked">'.$myArray1[0].'<br>';
}else{
    echo  '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[0].'>'.$myArray1[0].'<br>';
}

if($myArray1[1] == $check_usn[0]['answer_list'][0][0][$x+3]){
     echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[1].' checked="checked">'.$myArray1[1].'<br>';
}else{
       echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[1].'>'.$myArray1[1].'<br>';
}

if($myArray1[2] == $check_usn[0]['answer_list'][0][0][$x+3]){
      echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[2].' checked="checked">'.$myArray1[2].'<br>';
}else{
      echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[2].'>'.$myArray1[2].'<br>';
}

if($myArray1[3] == $check_usn[0]['answer_list'][0][0][$x+3]){
    echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[3].' checked="checked">'.$myArray1[3].'<br>';
  
}else{
 echo '<input type="radio" name="multiple_ans_medium'.$x.'" value='.$myArray1[3].'>'.$myArray1[3].'<br>';
}  ?>

<?php  } ?>


<h5>Difficult</h5>

  <?php 
                    for ($x = 0; $x < count($random_que[0]['multi_choice_difficult']); $x++) { ?>
<?php 
 
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
if($myArray1[0] == $check_usn[0]['answer_list'][0][0][$x+6]){
  echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[0].' checked="checked">'.$myArray1[0].'<br>';
}else{
    echo  '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[0].'>'.$myArray1[0].'<br>';
}

if($myArray1[1] == $check_usn[0]['answer_list'][0][0][$x+6]){
     echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[1].' checked="checked">'.$myArray1[1].'<br>';
}else{
       echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[1].'>'.$myArray1[1].'<br>';
}

if($myArray1[2] == $check_usn[0]['answer_list'][0][0][$x+6]){
      echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[2].' checked="checked">'.$myArray1[2].'<br>';
}else{
      echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[2].'>'.$myArray1[2].'<br>';
}

if($myArray1[3] == $check_usn[0]['answer_list'][0][0][$x+6]){
    echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[3].' checked="checked">'.$myArray1[3].'<br>'; 
}else{
 echo '<input type="radio" name="multiple_ans_difficult'.$x.'" value='.$myArray1[3].'>'.$myArray1[3].'<br>';
}  ?>

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
/*      alert("hi");*/
       return false; 

    }else{ 
   /*   alert("hello");*/
       /* return true;*/
       /*form.confirm.disabled = true;*/

        document.getElementById("submit").click();


    }
  }


</script>


<button type="button" onclick="confirm_box()" name="confirm" id="confirm" value="Confirm">Confirm</button>  

<input style="display:none;" type="submit" name="submit" id="submit" value="Submit">  


</form>

</body>
</html>