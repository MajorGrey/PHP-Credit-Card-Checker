
<?php
 if (isset($_POST['submitbutton'])) {  
    $number= $_POST['number_entered'];
    
    if (validatecard($number) !== false) {
        $success = " $type, credit card number is valid";
    }else{
        $error = "  This credit card number is invalid";
        }

    validatecard($number);
 }

// $submitbutton= $_POST['submitbutton'];


function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['visa'],$number))
    {
  $type= "vsisa";
        return 'visa';
  
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
  $type= "mastercard";
        return 'mastercard';
    }
    else if (preg_match($cardtype['amex'],$number))
    {
  $type= "amex";
        return 'amex';
  
    }
    else if (preg_match($cardtype['discover'],$number))
    {
  $type= "discover";
        return 'discover';
    }
    else
    {
        return false;
    } 
 }



?>

<!DOCTYPE html>
<html>
<head>
	<title>Credit Card Checker</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <br>
  <div class="container">
    <form method="POST" action="">
    	<div class="container">
         <center><a class="" style="" href="index.php"><img class="image" src="img/cc.png" style="height: 40px;"></a></center>
    	<h2 class="text-center text-muted" style="font-size: 15px;">Credit Card Checker</h2>
      <hr>
      <div id="data"></div>
    	<div class="form-group">
    	<label for="card"><b>Card No</b></label>
        <input type="text" placeholder="Enter Credit Card"  name="number_entered" class="form-control" maxlength="16" style="height: 46px;margin-bottom: 0px;" onkeyup="checkcard(this.value)">
      </div>
      </div>
      <script type="text/javascript">
        function checkcard(number_entered){
        $.get( "check.php?number_entered="+number_entered, function( data ) {
            $( "#data" ).html( data );
            // alert( "Load was performed." );
          });
      }
      </script>
        <!-- <button type="submit" name="submitbutton" id="check" class="btn loginbtn">Check</button> -->
        <hr>
       <div class="container signin" style="padding: 15px;">
        <p>Developed by  <a href="https://www.facebook.com/greychukz">Chuks Okwuenu</a>.</p>

      </div>
      </div>
    </form>
  </div>
</body>
</html>
