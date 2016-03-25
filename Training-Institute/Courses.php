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
		        	   
		              <div class="trainer-course" id='Profile'>
					  
					  <div class="col-md-7"></div>
				<div class="col-md-5">
				   <button type="button" class="btn help">Help</button>
				  <a href="Create-A-Courses"> <button type="button" class="btn ad-crs">Add Main Course</button></a>
				   <button type="button" class="btn plus">+</button>
				</div>
				   <div class="clearfix"></div>
				
					  <?php
					  
					  $dataFETCH_Courses = fetchfeild('cmg_courses',array('UMID' => $_SESSION['UMID'],'maincourse' => 'CMGC-10'));



foreach ($dataFETCH_Courses  as  $dataFETCH_courses) {
	
	?><br>
					     <h3 style="float:left;"><?=$dataFETCH_courses['coursename'];?></h3>
						 <button type="button" class="btn trn-crs-btn">Rs. <?=$dataFETCH_courses['price'];?>/-</button>
						 <div class="clearfix"></div>
						 
						   <div class="trn-crs-main">
						     <div class="col-md-10 justify">
						     
                               
                                <div class="courdesche" >
                                <?=nl2br(trim($dataFETCH_courses['description_c']));?>
                                      </div>
                                      
                                   
                                   <div class="expericendiv">
                                 <p class="left" ><a   class="crs-detail">Experience <?=trim($dataFETCH_courses['experince']);?> Years  =>  Duration  <?=trim($dataFETCH_courses['c_duration']);?></a> </p>
                                  <p  class="right" ><a data-toggle="modal" data-target="#myModal<?=$dataFETCH_courses['id'];?>"   class="crs-detail cursor">View Course Details</a></p>
                                 
                                 </div>
                               
                            
							   </div>

							   <div class="col-md-2">
							    <a href="Edit-A-Courses.php?C-ID=<?=$dataFETCH_courses['id']?>" >  <button type="button" class="btn edit-crs">Edit Course &nbsp;&nbsp;&nbsp;</button></a><br>
							  <a href="controller/Delete_SQL_All.php?CourseDElETE=<?=$dataFETCH_courses['id']?>" onclick="return confirm('Are you sure you want to Remove?')"><button type="button" class="btn del-crs">Delete Course</button></a>
							   </div>
							   <div class="clearfix"></div>
							   
							
						   </div><!-- trn-crs-main -->
						   
						   
                       <div id="myModal<?=$dataFETCH_courses['id'];?>" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
									
									 <h3 style="float:left;"><?=$dataFETCH_courses['coursename'];?></h3>
                                     <hr>

									 <div class="lightdetsil" >
                                <?=trim(nl2br($dataFETCH_courses['description_c']));?>
                                      </div>
									
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
                           
                           
                           
                           
                           
                           
                           
                           
                           
						   
                           <?php 
						   $dataFETCH_SUBCourses = fetchfeild('cmg_courses',array('UMID' => $_SESSION['UMID'],'maincourse' => $dataFETCH_courses['id']));


if (sizeof($dataFETCH_SUBCourses)>0)
{ echo '<h4  class="sub-course-heading">Sub Courses</h4>';
  foreach ($dataFETCH_SUBCourses  as  $dataFETCH_SUBcourses) { ?>
						     <div class="sub-course">
							   
				     <h4 style="float:left;">  <?=$dataFETCH_SUBcourses['coursename'];?></h4>
							   <button type="button" class="btn sub-crs-btn">Rs. <?=$dataFETCH_SUBcourses['price'];?>/-</button>
							     <div class="clearfix"></div>
								  
								  <div class="sub-crs-txt">
								      <div class="col-md-10 justify">
                                        <div class="courdesche" >
                                      <?=$dataFETCH_SUBcourses['description_c'];?>
                                      </div>
                                      
                                   
                                  <div class="expericendiv">
                                 <p class="left" ><a  class="crs-detail">Experience <?=trim($dataFETCH_SUBcourses['experince']);?> Years  =>  Duration  <?=trim($dataFETCH_SUBcourses['c_duration']);?> </a></p>
                                <p  class="right" ><a data-toggle="modal" data-target="#myModal<?=$dataFETCH_SUBcourses['id'];?>"   class="crs-detail cursor">View Course Details</a></p>
                                 
                                 </div>
                                 
							   </div>
							   <div class="col-md-2">
							         <a href="Edit-A-Courses.php?C-ID=<?=$dataFETCH_SUBcourses['id']?>" >  <button type="button" class="btn edit-crs">Edit Course &nbsp;&nbsp;&nbsp;</button></a><br>
								   
                                     <a href="controller/Delete_SQL_All.php?CourseDElETE=<?=$dataFETCH_SUBcourses['id']?>" onclick="return confirm('Are you sure you want to Remove?')"><button type="button" class="btn del-crs">Delete Course</button></a>
							   </div>
							   <div class="clearfix"></div>
								  </div>
								 
								 
							 </div><!-- Sub Course -->
							 <div class="clearfix"></div>
		
      
							
                             
                             <div id="myModal<?=$dataFETCH_SUBcourses['id'];?>" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
									
									 <h3 style="float:left;"><?=$dataFETCH_SUBcourses['coursename'];?></h3>
                                     <hr>

									 <div class="lightdetsil" >
                                <?=nl2br(trim($dataFETCH_SUBcourses['description_c']));?>
                                      </div>
									
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
					
					<br>
                          <?php } } ?>
                            <a href="Create-A-Courses.php?ID-C=<?=$dataFETCH_courses['id'];?>"> <button type="button" class="btn ad-crs">Add Sub Course</button></a>
				             <button type="button" class="btn plus">+</button>
						
							 
							 <br>
                          
                          <?php  } ?> 
					
						 <br> <br>	
							 <div class="clearfix"></div> 
						 
					  </div>
					     			    	                        
				</div>
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>