<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>

    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/trainer_leftpart.php'); ?>
				   
				   
				   

		   <div class="col-md-9 col-sm-12">
				      <div class="search-right">
					   
                     
					  
                      
                 <div class="editprofileh mycolor"> Proceed To Payment Process</div>
						   <div class="clearfix"></div>
						   
                    <?php 
					
					$basicinfo=$conn->prepare("select * from cmg_basic_inf0_ti where `UMID`='".$_SESSION['UMID']."' ");
$basicinfo->execute();

$basicinfoF= $basicinfo->fetch();

?>
                          
                          <div style="width:300px; margin:50px auto; font-size:18px; text-align:center;">      
			  
<?php



// Merchant key here as provided by Payu
$MERCHANT_KEY = "f9nwSU5x";

// Merchant Salt as provided by Payu
$SALT = "tuOJb2Ujzg";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onLoad="submitPayuForm()">

    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php }   
?>
	<div style="height:40px; line-height:40px; background:#0066FF; text-align:center; width:16opx; margin:auto; color:#fff"><strong> Total Price : - <?=$_SESSION['price'];?>/-</strong></div>
	<br />
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
  <input name="amount" value="<?=$_SESSION['price'];?>" style="display:none" /> 
         
        <input name="firstname" id="firstname" value="<?=$_SESSION['username'];?>" style="display:none" /> 
   <input name="email" id="email" value="<?=$_SESSION['email'];?>" style="display:none" /> 
      
        <input name="phone" value="<?=$basicinfoF['phone'];?>" style="display:none" />
    <textarea name="productinfo" style="display:none">CMG Package</textarea>
       <input name="surl" value="http://demo.projectlaunch.in/cmgphp/Training-Institute/success.php" size="64" style="display:none" />
	   <input name="furl" value="http://demo.projectlaunch.in/cmgphp/Training-Institute/failure.php" size="64" style="display:none" /> 
       <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
	   <input name="lastname" id="lastname" value="<?=$basicinfoF['instituename'];?>"  style="display:none"/> 
         <input name="curl" value="http://demo.projectlaunch.in/cmgphp/" style="display:none" /> 
      <input name="address1" value="<?=$basicinfoF['address'];?>" style="display:none" /> 
          <input name="address2" value="<?=$basicinfoF['address'];?>" style="display:none" /> 
       
         <input name="city" value="<?=$basicinfoF['city'];?>" style="display:none" /> 
         <input name="state" value="<?=$basicinfoF['state'];?>"  style="display:none" /> 
      
        <input name="country" value="<?=$basicinfoF['country'];?>" style="display:none" /> 
       <input name="zipcode" value="<?=$basicinfoF['pin'];?>" style="display:none" /> 
      <input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" style="display:none" /> 
      <input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" style="display:none" /> 
     <input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" style="display:none" /> 
     <input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" style="display:none" /> 
     <input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" style="display:none" /> 
     <input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" style="display:none" /> 
      
          <?php if(!$hash) { ?>
          <input type="submit"  value="" style="height:101px; width:180px; background:url(payi.jpg); border:none; cursor:pointer" /> 
          <?php } ?>
       
    </form>
 

		 
		
			  
                        
                             	   
					</div>
                        
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>