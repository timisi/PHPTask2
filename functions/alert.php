<?php

function print_alert(){
    //for printing message or error;
    $types = ['message','info','error','nameErr','emailErr','complaintErr','deptErr'];
    $colors = ['green','info','red','gold','gold','orange','orange'];

    for($i = 0; $i < count($types); $i++){

        if( isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]]) ) {
            echo "<div class='alert alert-".$colors[$i]."' role='alert'>" . $_SESSION[$types[$i]] .
                "</div>";
            unset($_SESSION[$types[$i]]);
        }

    }

}

function set_alert($type = "message", $content = ""){
    switch($type){
        case "message":
            $_SESSION['message']=$content;
        break;
        case "error":
            $_SESSION['error'] = $content;
        break;
        case "error":
            $_SESSION['nameErr'] = $content;
        break;
        case "error":
            $_SESSION['emailErr'] = $content;
        break;
        case "info":
            $_SESSION['info'] = $content;
        break;
        default:
        $_SESSION['message'] = $content;
    break;
    }
}
