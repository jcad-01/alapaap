<?php 

$GetSender = mysqli_query($conn,"select * from tbl_user where role='$status' ");
$rowsSender = mysqli_fetch_array($GetSender);
       
if($status >=2 && $status <=6){
    $recipient = $rowsSender['email_add'];    // To Approver, Receiver,Performer,Confirmer and Verifier
}else if($status == 'admin'){
    $recipient = $rowsSender['email_add'];  
}
    // Mail Message
    if($status == 2){$stat_name = 'Approver'; 
        $mail_message = "Hi <b>".$stat_name."</b>, <br><br>"."<b>"; 
        $message = "Hi <b>".$stat_name."</b>,<br><br>".
        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
        "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>"; 
    }
    if($status == 3){$stat_name = 'Receiver'; }
    if($status == 4){$stat_name = 'Performer';  }
    if($status == 5){$stat_name = 'Confirmer'; }
    if($status == 6){$stat_name = 'Verifier'; }
    if($status == 'admin'){$stat_name = 'Administrator'; }



    if($status >=2 && $status <=6){

        if($status == 2){ 
           
            // $message = "Hi <b>Approver!</b><br><br>".
            // "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
            // "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";
            $message =  "Hi <b>Approver!</b><br><br>".
                        "A request needs your service.<br><br>".
                        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
                        "Click this link below for reference<br>".
                        "<a href='".$_SERVER['SERVER_NAME']."'>http://".$_SERVER['SERVER_NAME']."</a><br><br>".
                        "Thank you"; 
        }
        if($status == 3){
            // $message = "Hi <b>Receiver!</b><br><br>".
            // "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b> has been <b>APPROVED.</b><br><br>".
            // "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";
            $message =  "Hi <b>Receiver!</b><br><br>".
                        "A request needs your service.<br><br>".
                        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
                        "Click this link below for reference<br>".
                        "<a href='".$_SERVER['SERVER_NAME']."'>http://".$_SERVER['SERVER_NAME']."</a><br><br>".
                        "Thank you";
        }
        if($status == 4){
            // $message = "Hi <b>Performer</b>,<br><br>".
            // "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b> has been <b>ACKNOWLEDGED.</b><br><br>".
            // "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";

            $message =  "Hi <b>Performer!</b><br><br>".
                        "A request needs your service.<br><br>".
                        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
                        "Click this link below for reference<br>".
                        "<a href='".$_SERVER['SERVER_NAME']."'>http://".$_SERVER['SERVER_NAME']."</a><br><br>".
                        "Thank you";
        }
        if($status == 5){ 
            // $message = "Hi <b>Confirmer</b>,<br><br>".
            // "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b> has been <b>PERFORMED.</b><br><br>".
            // "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";
            $message =  "Hi <b>Confirmer!</b><br><br>".
                        "A request needs your service.<br><br>".
                        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
                        "Click this link below for reference<br>".
                        "<a href='".$_SERVER['SERVER_NAME']."'>http://".$_SERVER['SERVER_NAME']."</a><br><br>".
                        "Thank you";
        }
        if($status == 6){
            // $message = "Hi <b>Verifier</b>,<br><br>".
            // "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b> has been <b>CONFIRMED.</b><br><br>".
            // "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";
            $message =  "Hi <b>Verifier!</b><br><br>".
                        "A request needs your service.<br><br>".
                        "<b>".ucwords($fullname)."</b> has a request with Control number <b>".$form_subject."/".$control_number."</b><br><br>".
                        "Click this link below for reference<br>".
                        "<a href='".$_SERVER['SERVER_NAME']."'>http://".$_SERVER['SERVER_NAME']."</a><br><br>".
                        "Thank you";
        }
        if($status == 'admin'){$stat_name = 'Administrator'; }
    
    }else if ($status == 'admin'){

        $req = strpos($new_role,"1") !== false ? 'Requestor' :''; 
        $app = strpos($new_role,"2") !== false ? 'Approver' :''; 
        $rece = strpos($new_role,"3") !== false ? 'Receiver' :''; 
        $perf = strpos($new_role,"4") !== false ? 'Performer' :''; 
        $conf = strpos($new_role,"5") !== false ? 'Confirmer' :''; 
        $veri = strpos($new_role,"6") !== false ? 'Verifier' :''; 

        $getRole = $req.", ".$app.", ".$rece.", ".$perf.", ".$conf.", ".$veri;

        $message = "Hi <b>".$stat_name."</b>,<br><br>".
        "<b>".ucwords($fullname)."</b> has requested for role of <b>".$getRole."</b><br><br>".
        "Thank you<br><br><br><br><i>This message is autogenerated Please do not respond.</i>";        
    } else{

        if ($_POST['form_type'] == '1'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_hci.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'HCI';
        }
        if ($_POST['form_type'] == '1-1'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_hci_up.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'HCI';
        }
        if ($_POST['form_type'] == '1-2'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_hci_delete.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'HCI';
        }
        if ($_POST['form_type'] == '2'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_tci.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'Adhoc';
        }
        if ($_POST['form_type'] == '3'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_cps.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'CPS';
        }

        if ($_POST['form_type'] == '3-1'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_cps_up.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'CPS';
        }

        if ($_POST['form_type'] == '3-2'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_cps_del.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'CPS';
        }

        if ($_POST['form_type'] == '4'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_baas_csrf.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'BaaS';
        }

        if ($_POST['form_type'] == '4-2'){
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_baas_crrf.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'BaaS';
        }

        $message = "Hi <b>".ucwords($fullname)."</b>,<br><br>".
        "Your <b>".$forms."</b> request with Control Number of <b>".$forms."/".$control_number."</b> has been <b>VERIFIED</b>.<br>".
        "To view the file please ".$link_pdf.".<br>".
        "Thank you<br><br><br><br><i>This message is autogenerated. Please do not respond.</i> <br><br>".
        "Attachments:<br>";
         
    }
    // $subject = $form_subject." Request Form";
    $subject = "eBiz Managed Services Control Number: ".$form_subject."/".$control_number;
?>