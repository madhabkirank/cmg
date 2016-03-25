<?php $UDS=''; include("controller/header.php"); ?>

<?php


	unset($_SESSION['category']);
	unset($_SESSION['location']);
	unset($_SESSION['hiddenvalue']);
	unset($_SESSION['membertype']);
unset($_SESSION['search_url']);
?>

    <section id="services" class="service-item">
	   <div class="container">
            <div class="row" >
                <div class="col-sm-3 ser_left wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <h2>Premium Trainer</h2>
                      
                    <?php include('premimutrianr.php');?>
                </div>   <!--/.ser_left-->
              
                <div class="col-sm-6 ser_middle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                  <h1>Register Here For Free</h1>
<p style="text-align: center;    margin-top: -27px;    color: #fff;">Just one step to know about all trainers</p>
                  <div class="ser_middle_img"><img src="image/reg_img.jpg"></div>
                  
                  <form  method="post" id="registation-form" class="showthanku-reg">
                <p class="text-primary show-error-name" style="text-align:center; color:red">All field are required and password and re-password should be same</p>
                  <p><input type="text" name="username"  placeholder="Username" class="form_style username"></p>
                  
                  <p><input type="text" name="email" placeholder="Email Id" class="form_style email"></p>
                <!--  <div class="text-danger show-error-email" style="text-align:center; color:red"></div>  -->
                  <p><input type="password" name="password" placeholder="Password"  class="form_style password"></p>
                  <p><input type="password" name="repassword" placeholder="Confrom Password" class="form_style repassword"></p>
                  
												
                  
                  <div class="radio_button"> Register A Number 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="membertype" class="membertype1" value="Student" checked> Student 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="membertype" class="membertype" value="Trainer"> Trainer 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="submit" value="REGISTER" class="submit submitdata-reg">
                  </div>
                  </form>
                
                </div> <!--/.ser_middle-->  
                      
                <div class="col-sm-3 ser_right wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <h2>Advertisment</h2>
                      
                     <?php  include('home_adv.php'); ?>
                      
                </div>  <!--/.ser_right--> 
                
                                                          
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
    
    
    <!-- new visitor -->
    
    <?php
 

	 $UserCount=$conn->prepare("select * from cmg_visitor WHERE `ipaddress`='$IP' AND `date`='$date'");
$UserCount->execute();
$UserCount= $UserCount->rowCount();
if($UserCount==0)
{
$Visitor=$conn->prepare("INSERT INTO `cmg_visitor`(`ipaddress`, `date`, `time`,`status`) VALUES ( '$IP','$date','$time',1)");
$VisitorU=$Visitor->execute();
}
	 ?>
    
    
    

<?php include("controller/footer.php"); ?>