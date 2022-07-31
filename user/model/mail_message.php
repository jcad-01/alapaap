<?php 
    // Mail Message
    if($status == 2){$stat_name = 'Approver'; $department_name = "BSP"; }
    if($status == 3){$stat_name = 'Receiver'; $department_name = "BSP"; }
    if($status == 4){$stat_name = 'Performer'; $department_name = "BSP"; }
    if($status == 5){$stat_name = 'Confirmer'; $department_name = "BSP";}
    if($status == 6){$stat_name = 'Verifier'; $department_name = "BSP";}
    if($status == 7){$department_name = "BSP";}
    if($status == 'admin'){$stat_name = 'Administrator'; $department_name = "BSP";}

    if($status >=2 && $status <=6){
        $message = "Hi <b>".$stat_name."</b>,<br><br>".
        "<b>".ucwords($fullname)."</b> has a request with Control number <b>HCI/".$control_number."</b><br><br>".
        "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>"; 
    }else if ($status == 'admin'){

        $req = strpos($new_role,"1") !== false ? 'Requestor' :''; 
        $app = strpos($new_role,"2") !== false ? 'Approver' :''; 
        $rece = strpos($new_role,"3") !== false ? 'Receiver' :''; 
        $perf = strpos($new_role,"4") !== false ? 'Performer' :''; 
        $conf = strpos($new_role,"5") !== false ? 'Confirmer' :''; 
        $veri = strpos($new_role,"6") !== false ? 'Verifier' :''; 

        $getRole = $req.", ".$app.", ".$rece.", ".$perf.", ".$conf.", ".$veri;

        $message = "Hi <b>".$stat_name."</b>,<br><br>".
        "<b>".ucwords($fullname)."</b> has been requested for role of <b>".$getRole."</b><br><br>".
        "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";        
    } else{
        $message = "Hi <b>".ucwords($fullname)."</b>,<br><br>".
        "Your <b>HCI</b> request with Control Number of <b>HCI/".$control_number."</b> has been verified<br><br>".
        "Thank you<br><br><br><br><i>This message is autogenerated. Please do not respond.</i>"; 
    }
    $subject = $form_subject." Request Form";
?>