    
	
	<section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Top City</h3>
                        <ul>
						   <?php 
$cmg_city=$conn->prepare("select * from cmg_city WHERE `status`=1 limit 0,6 ");
$cmg_city->execute();
$cmg_citySS= $cmg_city->fetchAll();			

foreach ($cmg_citySS as $cmg_citySSF) { ?>
                            <li><a href="<?=$domainname;?>citynamesession.php?currentcitysel=<?=$cmg_citySSF['city'];?>"><?=$cmg_citySSF['city'];?></a></li>
                          							
							<?php } ?>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Top Categories</h3>
                        <ul>
						
						     <?php 
$dataFetch_institue1=$conn->prepare("select * from cmg_category WHERE `status`=1 limit 0,6 ");
$dataFetch_institue1->execute();
$dataFetch_institueF1= $dataFetch_institue1->fetchAll();			

foreach ($dataFetch_institueF1 as $DFinstitue1) {
	
	?>
                  <div class="icon">
              
                     <li style="width:160px;"> <a href="<?=$domainname;?>category/Post/<?=$DFinstitue1['category'];?>/"><?=$DFinstitue1['category'];?></a> &nbsp;&nbsp;&nbsp;&nbsp;</li>
                  </div>
                  
                  
                  <?php }?>
                           
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Top Courses</h3>
                        <ul>
						<?php
					
						
						
						
$CoursesSECT=$conn->prepare("SELECT `coursename` FROM  `cmg_courses` GROUP BY `coursename` ORDER BY COUNT(*) DESC  LIMIT 0,6 ");
$CoursesSECT->execute();
$CoursesSECTF= $CoursesSECT->fetchAll();
foreach($CoursesSECTF as $CoursesSECTFE)
{
				?>
              
                            <li><a href="<?=$domainname;?>search.php?PTI=Institute&hiddenvalue=1&category=<?=$CoursesSECTFE['coursename'];?>&location=&submit=SEARCH"><?=$CoursesSECTFE['coursename'];?></a></li>
                           
							
							<?php } ?>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="<?=$domainname;?>About-Us">About Us</a></li>
                            <li><a href="<?=$domainname;?>Term_condition">Term & Condition</a></li>
                            <li><a href="<?=$domainname;?>Privacy_policy">Privacy Policy</a></li>
                            <!-- <li><a href="<?=$domainname;?>Resources">Resources</a></li> -->
                            <li><a href="<?=$domainname;?>Career">Career With Us</a></li>
                            <li><a href="<?=$domainname;?>coupon_FAQ">FAQs</a></li>

                             <li><a data-toggle="modal" data-target="#myModal_loginaccount" class="cursor">Active Account</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    &copy; 2016 Copyright by <a href="#">Coach me Guru</a>. All Rights Reserved. <br />Powered By <a href="#">Hyreco</a>
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->
	
	
	<div id="myModal_profileimages" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center"><span class="mycolor">Profile Image </span> Upload</h3>
									
									<hr>




									<span class="showthanku-login" style="color:#DF0509;"></span>
									<form  method="post" action="" enctype="multipart/form-data">
                                    	
										<div style="text-align:center; width:100px; margin:auto;">
                                        
                                        <?php 	 if(isset($_SESSION['UMID'])) { 
										
										
										function fetchsingle1($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetch();
}

										 $uploadimgaes  = fetchsingle1('cmg_registration',array('UMID' => $_SESSION['UMID']));
										
										if(!empty($uploadimgaes['pr_images']))
										{
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$uploadimgaes['pr_images'];?>" class="img-responsive" align="middle">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive" align="middle">
                                          
                                          <?php } } ?>

                                        </div>
                                        
                                        
										<div class="top-margin">
                                        Trainer image should be 97px width and 111px height <br>
                                        
                                        Institute image should be 160px width and 75px height <br>
                                        
											<div style="position:relative;">
                                        <a class="btn btn-primary" href="javascript:;">
                                            CHOOSE A FILE
                                            <input type="file" required style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="proimages" size="40" onchange="$(&quot;#upload-file-info&quot;).html($(this).val());">
                                        </a>
                                        &nbsp;
                                        <span id="upload-file-info"></span>
                                </div>
                                
                                
                                
                                
                                
                                
										</div>
										
										
												

										<hr>

										<div class="row">
											
											<div class="col-lg-4 text-right">
												<input type="submit" class="btn  btn-warning" name="uploadimgae" value="Upload Imgaes">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
    
    
    
    
    <div id="myModal_profileimagesSt" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center"><span class="mycolor">Profile Image </span> Upload</h3>
									
									<hr>
									<span class="showthanku-login" style="color:#DF0509;"></span>
									<form  method="post" action="" enctype="multipart/form-data">
                                    	
										<div style="text-align:center; width:100px; margin:auto;">
                                        
                                        <?php 	 if(isset($_SESSION['s-UMID'])) { 
										
										
										function fetchsingle1($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetch();
}

										 $uploadimgaes  = fetchsingle1('cmg_registration_s',array('UMID' => $_SESSION['s-UMID']));
										
										if(!empty($uploadimgaes['pr_images']))
										{
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$uploadimgaes['pr_images'];?>" class="img-responsive" align="middle">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive" align="middle">
                                          
                                          <?php } } ?>

                                        </div>
                                        
                                        
										<div class="top-margin">
                                     
                                        
                                        Image should be 160px width and 75px height <br>
                                        
											<div style="position:relative;">
                                        <a class="btn btn-primary" href="javascript:;">
                                            CHOOSE A FILE
                                            <input type="file" required style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="proimages" size="40" onchange="$(&quot;#upload-file-info&quot;).html($(this).val());">
                                        </a>
                                        &nbsp;
                                        <span id="upload-file-info"></span>
                                </div>
										</div>
										
										
												

										<hr>

										<div class="row">
											
											<div class="col-lg-4 text-right">
												<input type="submit" class="btn  btn-warning" name="uploadimgaeST" value="Upload Imgaes">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
	
	
	<div id="myModal" class="modal fade">
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
						
								<div class="panel-body showthanku-reg1">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center">Sign in to  Your <span class="mycolor">Free </span> Account</h3>
									
									<hr>
<form  method="post" id="registation-form1" enctype="application/x-www-form-urlencoded">
                                    <div class="top-margin"> <br>
<br />
											<label>Register A Member <span class="text-danger">*&nbsp;&nbsp;&nbsp;</span></label><input type="hidden" name="membertype" value="1">
											</div>
												<div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											
											  <label>
<input type="radio" name="membertype" value="Student" checked="checked" >Student <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="membertype"  value="Trainer" > Trainer  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>

                                                                                 
                                            		<div class="top-margin">
                                                                                                             
                                                <label><span class="text-danger show-error-name1">All field are required and password and re-password should be same</span></label>

								     <label>Name <span class="text-danger">*</span> (Once entered cannot be changed)  </label>
											<input type="text" name="username" class="form-control username1">
                                            
                                        
                                            
										</div>



										<div class="top-margin">
											<label>Email <span class="text-danger">*</span> (Once entered cannot be changed)</label>
											<input type="email" name="email" class="form-control email1">
                                            
                                            
										</div>



 

<div class="top-margin">
											<label>Password <span class="text-danger">*</span> </label>
											<input type="password" name="password" class="form-control password1">
										</div>
										<div class="top-margin">
											<label>Re Password <span class="text-danger">*</span></label>
											<input type="password" name="repassword" class="form-control repassword1">
										</div>
										
										
																					
								
										

					<hr>

										<div class="row">
											<div class="col-lg-8">
<b><a data-toggle="modal" data-dismiss="modal" data-target="#myModal_login" class="cursor close forgetpass">&nbsp;&nbsp;Already User Login</a></b>
											</div>
											<div class="col-lg-4 text-right">
												<button class="btn  btn-warning  paddingnew submitdata-reg1"  type="button" name="submit">Sign Up</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
	
	
	<!-- login section -->
	
	<div id="myModal_login" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center"><span class="mycolor">Login </span> Here</h3>
									
									<hr>
									<span class="showthanku-login" style="color:#DF0509;"></span>
									<form  method="post" id="login-form" enctype="application/x-www-form-urlencoded">
                                    	

<div class="top-margin"><br />
											<label>Login as A <span class="text-danger">*&nbsp;&nbsp;&nbsp;</span></label>
											</div>
												<div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											
											  <label>
<input type="radio" name="membertype" value="Student" checked="checked" >Student <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="membertype" class="selectclientAPI" value="Trainer" > Trainer  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>


										<div class="top-margin">
                                        
                                           <label><span class="text-danger show-error-login">All field are required </span></label><br>
											<label>Email <span class="text-danger">*</span></label>
											<input type="email" name="email" class="form-control email2">
                                 
										</div>
										<div class="top-margin">
											<label>Password <span class="text-danger">*</span></label>
											<input type="password" name="password" class="form-control password2">
										</div>
										
										
										<hr>

										<div class="row">
											<div class="col-lg-10" style="padding-top: 15px;">
<a data-toggle="modal"  data-dismiss="modal" data-target="#myModal_forgetPass" class="cursor close forgetpass" style=" color: #060606;
    font-weight: normal;
    opacity: 0.7;">Forgot password?  &nbsp; | &nbsp; </a>     

  <a data-toggle="modal"  data-dismiss="modal" data-target="#myModal" class="cursor close forgetpass" style="color: #060606;
    font-weight: normal;
    opacity: 0.7;"> New User &nbsp; | &nbsp; </a>  <a data-toggle="modal"  data-dismiss="modal" data-target="#myModal_loginaccount" class="cursor close forgetpass" style="    color: #060606;
    font-weight: normal;
    opacity: 0.7;"> Active Your Profile</a>

											</div>
											<div class="col-lg-2 text-right">
												<button class="btn  btn-warning submitdata-login" type="button">Sign in</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
    
    
    
    <div id="myModal_loginaccount" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center"><span class="mycolor">Active Your  </span> Account</h3>
									
									<hr>
									<span class="showthanku-login" style="color:#DF0509;"></span>
								
                                    	
                                        <form action="activemailid.php" method="post"> 
												


										<div class="top-margin">
                                        
                                           <label><span class="text-danger show-error-login">Enter your mail Id </span></label><br>
											<label>Email <span class="text-danger">*</span></label>
											<input type="email" name="activeaccount" class="form-control" required>
                                 
										</div>
										
										
										
										<hr>
<div class="row">
<div class="col-lg-4 text-right">
												<button class="btn  btn-warning" type="submit">Active</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
    
    
    
    
    <div id="myModal_forgetPass" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center"><span class="mycolor">Enter Your Email </span> </h3>
									
									<hr>
									<span class="showthanku-forget"></span>
									<form  method="post" id="forget-form" enctype="application/x-www-form-urlencoded">
                                    	<div class="top-margin"><br />
											<label>Are You A <span class="text-danger">*&nbsp;&nbsp;&nbsp;</span></label>
											</div>
									<div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											
											  <label>
<input type="radio" name="membertypefoget" value="Student" checked="checked" >Student <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="membertypefoget"  value="Trainer" > Trainer  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>

										<div class="top-margin">
                                        
                                           <label><span class="text-danger show-error-forget">Email is required </span></label><br>
											<label>Email <span class="text-danger">*</span></label>
											<input type="email" name="email" class="form-control email3">
                                 
										</div>
																				<div class="row">
											
											<div class="col-lg-12 text-right">
												<button class="btn  btn-warning submitdata-forget" type="button">Submit</button>
											</div>
										</div>
									</form>
									
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
	
    
    
    	<!-- login section -->
	
	<!-- Message -->
	
	<div id="myModalmessage" class="modal fade">
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
						
								<div class="panel-body showthanku-reg1">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="thin text-center">Send A Message </h3>
									
									<hr>
									
									<form  method="post" id="registation-form1" enctype="application/x-www-form-urlencoded">
                                    
                               
                                            
                                            		
										<div class="top-margin">
											<label>Message <span class="text-danger">*</span> </label>
											<textarea  style="height:100px;" name="messagebox" class="form-control" required></textarea>
                                            
                                            <input type="hidden" name="toid" class="toidn" >
										</div>
										
										
										
										
										
												
											
								
										

										<hr>

										<div class="row">
											
											<div class="col-lg-4 text-right">
												<input  class="btn  btn-warning"  type="submit" value="Send Message" name="sendamessage">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
	
	<script src="<?=$domainname;?>js/editor.js"></script>
<link href="<?=$domainname;?>css/editor.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
		$(document).ready( function() {
            
         $("#txtEditor").Editor();                    
         
    });
  </script>

   
    <script src="<?=$domainname;?>js/bootstrap.min.js"></script>
    <script src="<?=$domainname;?>js/wow.min.js"></script>
    <script type="text/javascript" src="<?=$domainname;?>js/cmgscript.js"></script>
	
	<script type="text/javascript">
    $(document).ready(function() {
        // Child Tab
        $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>


<link href="<?=$domainname;?>css/ekko-lightbox.css" rel="stylesheet">
 <script src="<?=$domainname;?>js/ekko-lightbox.js"></script>
          <script type="text/javascript">
            $(document).ready(function ($) {
                // delegate calls to data-toggle="lightbox"
                $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
						onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                            }
						}
                    });
                });

                //Programatically call
                $('#open-image').click(function (e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });
                $('#open-youtube').click(function (e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });

				// navigateTo
                $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
                    event.preventDefault();

                    var lb;
                    return $(this).ekkoLightbox({
                        onShown: function() {

                            lb = this;

							$(lb.modal_content).on('click', '.modal-footer a', function(e) {

								e.preventDefault();
								lb.navigateTo(2);

							});

                        }
                    });
                });


            });
        </script>

 <script src="<?=$domainname;?>js/chosen.jquery.js" type="text/javascript"></script>
  <script src="<?=$domainname;?>js/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  </script>

	
</body>
</html>