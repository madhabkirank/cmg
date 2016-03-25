<?php  ob_start(); echo '<input type="hidden" value="../" class="UID">';
if(!isset($_GET['C-ID']))
{
	header('location:Courses');
}

 $UDS='../';  $M2='a';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
 $dataFETCH_S_Courses = fetchsingle('cmg_courses',array('UMID' => $_SESSION['UMID'],'id' => $_GET['C-ID']));
?>

    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/trainer_leftpart.php'); ?>
				   
				   
				   

		   <div class="col-md-9 col-sm-12">
				      <div class="search-right">
					   
                     
				  <div class="editprofileh mycolor">      Edit <?=$dataFETCH_S_Courses['coursename'];?> Courses</div>
						   <div class="clearfix"></div>
						   
                          <div class="clearfix"></div>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                           
                        
                                       <input type="hidden"  name="mainid" value="<?=$dataFETCH_S_Courses['id'];?>" required />
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
      Courses Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="coursename" value="<?=$dataFETCH_S_Courses['coursename'];?>" required />
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
Price
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" pattern="[0-9]*" maxlength="8" min="0" required name="price" value="<?=$dataFETCH_S_Courses['price'];?>"  >
                        
                        </div>
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
    Main Courses
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw" required name="maincourse"  > 
                        
                           <?php if($dataFETCH_S_Courses['maincourse']!='CMGC-10')
						{ 
						
						 $dataFETCH_M_Courses = fetchsingle('cmg_courses',array('UMID' => $_SESSION['UMID'],'id' => $dataFETCH_S_Courses['maincourse']));
						
						?>
                           <option value="<?=$dataFETCH_M_Courses['id'];?>"><?=$dataFETCH_M_Courses['coursename'];?></option>
                         <?php } ?>
                        <option value="CMGC-10">Select Main Courses</option>
                     
                         <?php  foreach($Maincourses_SQLFETCH as $courmaindata)
						 { ?>
                         <option value="<?=$courmaindata['id'];?>"><?=$courmaindata['coursename'];?></option>
                         <?php } ?>
                         
                         </select>
                        
                        </div>


                         <div class="col-sm-3 padiingmform mycolors">
Experience
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" required name="experince" pattern="[0-9]*" maxlength="2" min="0" value="<?=$dataFETCH_S_Courses['experince'];?>"  >
                        
                        </div>

  <div class="col-sm-3 padiingmform mycolors">
Course Duration
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" required name="c_duration" value="<?=$dataFETCH_S_Courses['c_duration'];?>"  >
                        
                        </div>
                        
                        
						
						                <div class="col-sm-3 padiingmform mycolors">
   Courses Details
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        	<textarea  name="description_c" class="form-control formw" required  ><?=$dataFETCH_S_Courses['description_c'];?></textarea> 
                        
                        </div>
                        
                        
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     
						
						    <input type="submit" class="btn  btn-warning" name="courses_EDIT" value="Edit Courses">
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
