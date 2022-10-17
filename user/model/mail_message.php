<?php 

$GetSender = mysqli_query($conn,"select * from tbl_user where role='$status' ");
$rowsSender = mysqli_fetch_array($GetSender);
       
if($status >=2 && $status <=6){
    $recipient = $rowsSender['email_add'];    // To Approver, Receiver,Performer,Confirmer and Verifier
}else if($status == 'admin'){
    $recipient = $rowsSender['email_add'];  
}
    // Mail Message
    if($status == 2){$stat_name = 'Approver';  }
    if($status == 3){$stat_name = 'Receiver'; }
    if($status == 4){$stat_name = 'Performer';  }
    if($status == 5){$stat_name = 'Confirmer'; }
    if($status == 6){$stat_name = 'Verifier'; }
    if($status == 'admin'){$stat_name = 'Administrator'; }

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
            $link_pdf = "<a href='http://".$_SERVER['SERVER_NAME']."/user/inc/print/print_hci_delete.php?control_number=".$control_number."'>Click Here</a><br><br>";
            $forms = 'Adhoc';
        }



        $message = "Hi <b>".ucwords($fullname)."</b>,<br><br>".
        "Your <b>HCI</b> request with Control Number of <b>".$forms."/".$$control_number."</b> has verified.<br>".
        "To view the file please ".$link_pdf.".<br>".
        "Thank you<br><br><br><br><i>This message is autogenerated. Please do not respond.</i> <br><br>".
        "Attachments:<br>";
         
    }
    $subject = $form_subject." Request Form";
?>