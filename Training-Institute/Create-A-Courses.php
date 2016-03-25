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
					   
                     
				  <div class="editprofileh mycolor" id='Profile'> Create A Course</div>
						   <div class="clearfix"></div>
						   
                          <div class="clearfix"></div>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                           
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
      Courses Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="coursename" required />
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
Price
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" pattern="[0-9]*" maxlength="8" min="0" class="form-control formw" required name="price"  >
                        
                        </div>
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
    Select Main Course
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 <?php if(isset($_GET['ID-C']))
							 {
								 
								  $dataFETCH_M_Courses = fetchsingle('cmg_courses',array('UMID' => $_SESSION['UMID'],'id' => $_GET['ID-C']));
						
						?>
                        
						  
                        <select  class="form-control formw" required name="maincourse"  > 
                      <option value="<?=$dataFETCH_M_Courses['id'];?>"><?=$dataFETCH_M_Courses['coursename'];?></option> 
                        
                         
                         </select>
                       
                         <?php } else {  ?>
                           <select  class="form-control formw" required name="maincourse"  > <option value="CMGC-10">Select only if you are adding sub course</option>
                         <?php  foreach($Maincourses_SQLFETCH as $courmaindata)
						 { ?>
                         <option value="<?=$courmaindata['id'];?>"><?=$courmaindata['coursename'];?></option>
                         <?php } ?>
                         
                         </select>
                          <?php }
						    ?>
                        
                        
                        
                        </div>
                       
                        
						
                        
                         <div class="col-sm-3 padiingmform mycolors">
Experience
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" pattern="[0-9]*" maxlength="2" min="0" class="form-control formw" required name="experince" placeholder="Experience in Years"  >
                        
                        </div>
                        
                        
                        <div class="col-sm-3 padiingmform mycolors">
Course Duration
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" required name="c_duration" placeholder="eg. 5 Months"  >
                        
                        </div>
						                <div class="col-sm-3 padiingmform mycolors">
   Courses Details
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        	<textarea  name="description_c" class="form-control formw" required  ></textarea> 
                        
                        </div>
                        
                        
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     
						
						    <input type="submit" class="btn  btn-warning" name="courses_save" value="Save Courses">
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
