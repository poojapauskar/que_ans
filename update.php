   <?php

    header('Content-Type: application/json');

    $aResult = array();

   /* if( !isset($_POST['firstname']) ) 
    	{ $aResult['error'] = 'No function name!'; }
    else
    	{ $aResult['error'] = $_POST['firstname']; }*/

    
    $url9 = 'http://que-ans-project.herokuapp.com/update_details/';
    $data9 = array('seconds'=>$_POST['seconds'],'firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'email' => $_POST['email'],'phone' => $_POST['phone'],'usn' => $_POST['usn'],'question_list' => $_POST['question_list'],'answer_list' => $_POST['answer_list'],'correct_ans_list' => $_POST['correct_ans_list'],'session' => 1);
    // use key 'http' even if you send the request to https://...
    $options9 = array(
      'http' => array(
        'header'  => "Content-Type : application/json; charset=UTF-8\r\n",
        'method'  => 'PUT',
        'content' => http_build_query($data9),
      ),
    );
    $context9  = stream_context_create($options9);
    $result9 = file_get_contents($url9, false, $context9);
   /* echo $result8;*/
    $arr10 = json_decode($result9,true);
    /*if($arr10 != ''){
      echo "Thank You";
    }else{
      echo "Please go back and submit the form again"; 
    }*/

    

    /*echo json_encode($aResult);*/

?>

