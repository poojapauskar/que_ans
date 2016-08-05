   <?php

    header('Content-Type: application/json');

    $aResult = array();

   /* if( !isset($_POST['firstname']) ) 
    	{ $aResult['error'] = 'No function name!'; }
    else
    	{ $aResult['error'] = $_POST['firstname']; }*/

    
    $url_check_session_0 = 'http://que-ans-project.herokuapp.com/check_session_is_0/';
    $options_check_session_0 = array(
      'http' => array(
        'header'  => array(
                      'USN: '.$_POST['usn'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context_check_session_0 = stream_context_create($options_check_session_0);
    $output_check_session_0 = file_get_contents($url_check_session_0, false,$context_check_session_0);
    /*echo $output_check_session_0;*/

    $check_session_0 = json_decode($output_check_session_0,true);



    $fields= array();


    if($check_session_0[0]['status'] == 200){
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

          //-------------------------
          $f = array(
            "status" => 200
          );
          $fields[] = $f;
          echo json_encode($fields);
       
    }else{
          $f = array(
            "status" => 400
          );
          $fields[] = $f;
          echo json_encode($fields);
    }
?>

