<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<Title>CC Validation</Title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="niceform/niceforms.js"></script> 
<link rel="stylesheet" type="text/css" media="all" href="niceform/niceforms-default.css" /> 
</head>
<body>
<div id="container">
<?php include('class.creditcard.php'); ?>      
<?php      
if(!isset($_POST['submit']))      
{      
?>      
          
  <form name="frmCC" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="niceform">      
  <fieldset>
        <legend>Validate Credit Card</legend>
        
        <dl>
            <dt><label>Cardholder's Name:</label></dt>
            <dd><input type="text" name="ccName" value="Cardholder's Name"></dd>
        </dl>
         <dl>
            <dt><label>Card Number:</label></dt>
            <dd><input type="text" name="ccNum"></dd>
        </dl>
        <dl>
            <dt><label>Card Type:</label></dt>
            <dd>
                <select size="1" name="ccType" id="ccType">      
                  <option value="1">Mastercard</option>      
                  <option value="2">Visa</option>      
                  <option value="3">Amex</option>      
                  <option value="4">Diners</option>      
                  <option value="5">Discover</option>      
                  <option value="6">JCB</option>      
                </select>
            </dd>
        </dl>
        <dl>
            <dt><label>Expiry Date:</label></dt>
            <dd><select size="1" name="ccExpM">       
     
              <?php      
                 
                for($i = 1; $i < 13; $i++)      
                { echo '<option>' . $i . '</option>'; }      
                 
              ?>       
                 
              </select>      
                 
              <select size="1" name="ccExpY">      
                 
              <?php      
                 
                for($i = 2010; $i < 2021; $i++)      
                { echo '<option>' . $i . '</option>'; }      
                 
              ?>       
                 
              </select>
              </dd>
        </dl>    
     
 </fieldset>
    <fieldset class="action">
        <input type="submit" name="submit" value="Validate"> 
    </fieldset>     
     
       
  </form>      
     
  <?      
     
  }      
  else      
  {      
  // Check if the card is valid      
  $cc = new CCreditCard($_POST['ccName'], $_POST['ccType'], $_POST['ccNum'], $_POST['ccExpM'], $_POST['ccExpY']);      
     
  ?>      
     
  <h2>Validation Results</h2>      
  <b>Name: </b><?=$cc->Name(); ?><br>      
  <b>Number: </b><?=$cc->SafeNumber('x', 6); ?><br>      
  <b>Type: </b><?=$cc->Type(); ?><br>      
  <b>Expires: </b><?=$cc->ExpiryMonth() . '/' .      
  $cc->ExpiryYear(); ?><br><br>      
     
  <?php      
      
   
    if($cc->IsValid())      
    echo '<font color="blue" size="2"><b>VALID CARD</b></font>';      
    else      
    echo '<font color="red" size="2"><b>INVALID CARD</b></font>';      
        
  }      
?>
</div>
</body>
<html>