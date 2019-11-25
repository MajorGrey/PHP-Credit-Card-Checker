<?php

 if (isset($_GET['number_entered'])) {  
    $number= $_GET['number_entered'];
    if ($number == "") {
        $error = "The field cant be empty";
    }else{
        if (validatecard($number) !== false) {
            if ($type == "Visa") {
                $success = "<img style='width: 70px; height: px;' src='img/visa.png'> Credit Card is valid";     
            }elseif ($type == "Mastercard") {
                $success = "<img style='width: 70px; height: ;' src='img/mastercard.png'> Credit Card is valid";     
            }elseif ($type == "Amex") {
                $success = "<img style='width: 70px; height: ;' src='img/amex.png'> Credit Card is valid";      
            }elseif ($type == "Discover") {
                $success = "<img style='width: 70px; height: 50px;' src='img/discover.png'> Credit Card is valid";      
            }
    }else{
        $error = "  This credit card number is invalid";
        }

    validatecard($number);
    }
    
 }

// $submitbutton= $_GET['submitbutton'];


function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "Visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "Mastercard" => "/^5[1-5][0-9]{14}$/",
        "Amex"       => "/^3[47][0-9]{13}$/",
        "Discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['Visa'],$number))
    {
  $type= "Visa";
        return 'Visa';
  
    }
    else if (preg_match($cardtype['Mastercard'],$number))
    {
  $type= "Mastercard";
        return 'Mastercard';
    }
    else if (preg_match($cardtype['Amex'],$number))
    {
  $type= "Amex";
        return 'Amex';
  
    }
    else if (preg_match($cardtype['Discover'],$number))
    {
  $type= "Discover";
        return 'Discover';
    }
    else
    {
        return false;
    } 
 }

 include 'messages.php';
?>