<?php 
/*echo "Name :".$_POST["name"];echo "<br>";
echo "USN  :".$_POST["usn"];*/

?>


<html>
<title>Questions</title>
<body>
<script type="text/javascript">
window.onload=counter;
function counter()
{
var seconds = 3600;
countDown();
function countDown()
{
document.getElementById("remain").innerHTML=seconds+"    seconds";
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



<?php

$array1=array();
$array2=array();
$array1= UniqueRandomNumbersWithinRange(1,10,2);
$array2= UniqueRandomNumbersWithinRange(21,30,8);

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

/*print_r($array1);
print_r($array2);*/
/*echo $array1[0];
echo $array2[1];*/

$string1=$array1[0].",".$array1[1];
$string2=$array2[0].",".$array2[1].",".$array2[2].",".$array2[3].",".$array2[4].",".$array2[5].",".$array2[6].",".$array2[7].",".$array2[8];
$string2=rtrim($string2, ",");
// $string1=string($string1);
// $string2=string($string2);


/*echo $string1;echo "<br>";
echo $string2;*/
?>

<?php 


?>

<?php

$url_random_que = 'http://127.0.0.1:8000/get_random_que/';
/*$data = array('key1' => 'value1', 'key2' => 'value2');*/
// use key 'http' even if you send the request to https://...
$options_random_que = array(
  'http' => array(
    'header'  => array(
                  'INPUT: '.$string1,
                  'MULTI: '.$string2,
                ),
    'method'  => 'GET',
  ),
);
$context_random_que = stream_context_create($options_random_que);
$output_random_que = file_get_contents($url_random_que, false,$context_random_que);
/*echo $output_random_que;*/
$random_que = json_decode($output_random_que,true);
?>


<br>
<br>

<h2 style="">Time Left</h2>
<h1 style="" id="remain"></h1>
<h4 style=""><?php echo "Name :"; echo $_POST["name"]; ?></h4>
<h4 style=""><?php echo "USN  :"; echo $_POST["usn"]; ?></h4>

<form method="post" name="myForm" id="myForm" action="submit.php">  
 <input  type="hidden" name="name" value=<?php echo $_POST["name"]; ?>>
<input  type="hidden" name="usn" value=<?php echo $_POST["usn"]; ?>>

<input  type="hidden" name="multiple_que_count" value=<?php echo count($random_que[0]['multi_choice']); ?>>
<input  type="hidden" name="true_false_que_count" value=<?php echo count($random_que[0]['true_false']); ?>>
<input  type="hidden" name="input_que_count" value=<?php echo count($random_que[0]['input']); ?>>

 

<h3>Multiple choice questions</h3> 
<br>

  <?php 
                    for ($x = 0; $x < count($random_que[0]['multi_choice']); $x++) { ?>
<?php 
 
$q= str_replace('{','',$random_que[0]['multi_choice'][$x]['options']);
$r= str_replace('}','',$q);
$myString1=$r;
$myArray1 = explode(',', $myString1);
// var_dump($myArray1);

?>
                        <input type="hidden" name=<?php echo "multiple_que".$x ?> value=<?php echo $random_que[0]['multi_choice'][$x]['question_id'] ?> ></option>
                        <?php echo $random_que[0]['multi_choice'][$x]['question'] ?><br>
                        <input type="radio" name=<?php echo "multiple_ans".$x ?> value=<?php echo $myArray1[0] ?>><?php echo $myArray1[0] ?>
                        <input type="radio" name=<?php echo "multiple_ans".$x ?> value=<?php echo $myArray1[1] ?>><?php echo $myArray1[1] ?>
                        <input type="radio" name=<?php echo "multiple_ans".$x ?> value=<?php echo $myArray1[2] ?>><?php echo $myArray1[2] ?>
                        <input type="radio" name=<?php echo "multiple_ans".$x ?> value=<?php echo $myArray1[3] ?>><?php echo $myArray1[3] ?><br>
  
                  <?php  } 
  ?>


<h3>Descriptive questions</h3> 
<br>

  <?php 
                    for ($x = 0; $x < count($random_que[0]['input']); $x++) { ?>
                        
                        <input type="hidden" name=<?php echo "input_que".$x ?> value=<?php echo $random_que[0]['input'][$x]['question_id'] ?> ></option>
                        <?php echo $random_que[0]['input'][$x]['question'] ?><br>
                        <textarea name=<?php echo "input_ans".$x ?> rows="5" cols="40"><?php echo $comment;?></textarea><br>
  
                  <?php  } 
  ?>
<br>
<br>
  
  

<input type="submit" name="submit" id="submit" value="Submit">  


</form>

</body>
</html>