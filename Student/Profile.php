<?php 
ob_start();
$UDS='../';  $M2='a';
include("../controller/header.php"); 
//include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>
<div id='Sprofile'></div>
    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/student_leftmenu.php'); ?>
				   
				   
				   

<?php
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $gender = $_POST['gender'];


 
  $qualification = $_POST['qualification'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
 
  $array =  array('UMID'=>$_SESSION['s-UMID'],'dob'=>$dob,'name'=>$name,'gender'=>$gender,'qualification'=>$qualification,'phone'=>$phone,'email'=>$email,'address'=>$address);
  
 
   if(num_rows('cmg_basic_info_s',array('UMID'=>$_SESSION['s-UMID']))>=1){
      $array1 =  array('dob'=>$dob,'name'=>$name,'gender'=>$gender,'qualification'=>$qualification,'phone'=>$phone,'email'=>$email,'address'=>$address);
       update('cmg_basic_info_s',$array1,array('UMID'=>$_SESSION['s-UMID']));
      echo '<script>alert("Succcessfully Updated Your Profile!")</script>';
     }else{
       insert('cmg_basic_info_s',$array);
     
       echo '<script>alert("Succcessfully Updated Your Profile!"); window.location.href="redirect.php";</script>';
       }



}elseif(isset($_POST['change_password'])){

 $new_password = $_POST['new_password'];
 $confirm_password = $_POST['confirm_password'];
 if($new_password == $confirm_password){

  
    update('cmg_registration_s',array('password' => $new_password),array('UMID' => $_SESSION['s-UMID']));

echo '<script>alert("Succcessfully Changed the Password!");window.location.href="redirect.php";</script>';
   

 }else{
echo '<script>alert("Password Doesnt Match!")</script>';


 }


}



$result = fetch('cmg_basic_info_s', array('UMID' => $_SESSION['s-UMID']));

foreach ($result as $value){

$name = $value['name'];
$gender = $value['gender'];

$qualification = $value['qualification'];
$phone = $value['phone'];
$email = $value['email'];
$address = $value['address'];
$dob= $value['dob'];


}




?>



		   
           <div class="col-md-9 col-sm-12">
				      <div class="trainer-right">
					   
					    <h3>Edit Profile</h3>
					
					<div class="enquiry">					
                        <form action="" method="post" name="Enquiry_Quote" data-toggle="validator" role="form">
						 <label>Username *
                            <input name="name" id="name" value="<?=$_SESSION['s-username'] ?>" type="text" class="required" readonly required ></label>   
							
							 <label>Email Id *
                            <input name="email" id="email" value="<?=$_SESSION['s-email']; ?>" type="text" readonly="" class="required" required="">
                       </label>
                        <label>Name *
                            <input name="name" id="name" value="<?php echo $name ?>" type="text" class="required" required=""></label>   
						
						
						<label>Gender * <?=$gender;?>
                            <select class="required" name="gender"  required>
                               <option selected><?=$gender; ?></option>
                               <option>Male</option>
                               <option>Female</option>
                            </select></label>
					
<label>Date Of Birth  	                   
    <div style="float:right; ">
<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy" style="width:300px">
    <input type="text" class="required" name="dob" value="<?php echo $dob;?>" style="width:570px">
    <span class="input-group-addon" style="display:none"></span>
</div></div>
</label>	
           <label>Qualification 
      <input name="qualification" id="qualification"   value="<?=$qualification ?>" type="text" class="required" ></label>
							
                        <label>Phone Number
                            <input name="phone"  id="phone" value="<?=$phone ?>" type="text" class="required" pattern="[0-9]*" maxlength="13" minlength="10"></label>

                       
                                            
                        <label>Address
                        <textarea name="address" id="requirement"  rows="3" class="txt-required"><?=$address ?></textarea></label><br>
                            
                       <label style="text-align:center; width:100%; color:red;">
                        
                        

<?php 
if(num_rows('cmg_basic_info_s',array('UMID' => $_SESSION['s-UMID'])) >= 1){
   echo '<input name="update" type="submit" value="Update Profile" class="submit myButton">';
}else{
  echo '<input name="update" type="submit" value="Save Profile" class="submit myButton">';
}

?>
</label>

                       </form> 

                    </div>
					
					<h3>Change Password</h3>
					
					<div class="enquiry">					
                        <form action="" method="post" name="Enquiry_Quote">
						
                        <label>Enter New Password
                            <input name="new_password" id="newpssword" placeholder="Enter New Password" type="text" class="required" required=""></label>
							
					   <label>Confirm New Password
                      <input name="confirm_password" id="confirmpassword" placeholder="Confirm New Password" type="text" class="required" required=""></label>   
						
                       <label style="text-align:center; width:100%; color:red;">
                        
                           <input  type="submit" value="Change Password" name="change_password" class="submit myButton"></label>

                       </form> 

                    </div>
					
					
					<h3>Delete Account</h3>
					
					<div class="enquiry">					
                
						
                        <p>For Delete account,   <a href="controller/Delete_SQL_All.php?DDELETEaccount=<?=$_SESSION['s-UMID']?>" onclick="return confirm('Are you sure you want to Remove?')" style="color:#f67f15">Click Here</a></p>
						
                  
                        
            

                

                    </div>
					
					
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  });
});

</script>
<?php include("../controller/footer.php"); ?>
