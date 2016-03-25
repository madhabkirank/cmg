<div style="display:block" >
            	    <div>
                    <h3 class="pleft" >Course List</h3> 
					
					<div class="clearfix"></div>

					 
				
					  <?php
					  
					  $dataFETCH_Courses = fetch('cmg_courses',array('UMID' => $UMIDSProfile['UMID'],'maincourse' => 'CMGC-10'));

$coursecheck=0;

foreach ($dataFETCH_Courses  as  $dataFETCH_courses) {
	$coursecheck++;
	?>
					    
						 
						 <div class="clearfix"></div>
						 
						   <div class="trn-crs-main" style="background:none">
						   
						   
						   
						   
						   
						   
						   
						     <div class="col-md-12 justify">
						     
                               <div style="float: left;    width: 649px;    padding: 0px 10px;    background: #f2f2f2;">
							   
							   
                                <div class="courdesche" style="height:24px" >
								 <span style="font-style:18px; font-weight:bold;"><?=$dataFETCH_courses['coursename'];?></span> : - 
                                <?=trim($dataFETCH_courses['description_c']);?>
                                      </div>
                                      
                                   
                                   <div class="expericendiv">
                                 <p class="left" ><a  class="crs-detail">Experience <?=trim($dataFETCH_courses['experince']);?> Years   => Duration <?=trim($dataFETCH_courses['c_duration']);?> </a></p>
                                  <p  class="right" ><a data-toggle="modal" data-target="#myModal<?=$dataFETCH_courses['id'];?>"   class="crs-detail cursor">View Course Details</a></p>
                                 
                                 </div>
                               </div>
							   
							   
							   <div  style="background: #A20B1B;
    color: #fff;
    padding: 5px 0px;
    text-align:center;
    float: right;
    border-radius: 0px;
    font-weight: bold;
    width:115px;
    font-size: 18px;
    height: 55px;
    line-height: 46px;">Rs. <?=$dataFETCH_courses['price'];?>/-</div>                            
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
									
									
									 <h4 style="float:left;"><?=$dataFETCH_courses['coursename'];?> => Experience -  <?=trim($dataFETCH_courses['experince']);?></h4>
                                     <hr>

									 <div class="lightdetsil" > <br>
                                <?=nl2br(trim($dataFETCH_courses['description_c']));?> <br>
                                      </div>
									
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>

        </div>
    </div>    
                           
                           
                           
                           
                           
                           
                           
                           
                           
						   
                           <?php 
						   $dataFETCH_SUBCourses = fetch('cmg_courses',array('UMID' => $UMIDSProfile['UMID'],'maincourse' => $dataFETCH_courses['id']));


if (sizeof($dataFETCH_SUBCourses)>0)
{ 
  foreach ($dataFETCH_SUBCourses  as  $dataFETCH_SUBcourses) { ?>
						     <div class="sub-course" style="margin:0px;">
							   
												  
								  <div class="sub-crs-txt" style="background:none" >
								      <div class="col-md-12 justify">
									  
									    <div style="float: left;
    width: 608px;
    padding: 0px 10px;
    background: #cff3f3; border-left: 5px solid #D03948;">
									  
                                   <div class="courdesche" style="height:24px" >
								 <span style="font-style:18px; font-weight:bold;"><?=$dataFETCH_SUBcourses['coursename'];?></span> : - 
                                      <?=$dataFETCH_SUBcourses['description_c'];?>
                                      </div>
                                      
                                   
                                  <div class="expericendiv">
                                 <p class="left" ><a   class="crs-detail">Experience <?=trim($dataFETCH_SUBcourses['experince']);?> Years  => Duration <?=nl2br($dataFETCH_SUBcourses['c_duration']);?></a></p>
                                <p  class="right" ><a data-toggle="modal" data-target="#myModal<?=$dataFETCH_SUBcourses['id'];?>"   class="crs-detail cursor">View Course Details </a></p>
                                 
                                 </div>
								 
								 
								 </div>
								 
								 
								 
								 <div  style="background: #D03948;
    color: #fff;
    padding: 5px 0px;
    text-align:center;
    float: right;
    border-radius: 0px;
    font-weight: bold;
    width:115px;
    font-size: 18px;
    height: 55px;
    line-height: 46px;">Rs. <?=$dataFETCH_SUBcourses['price'];?>/-</div>
                                 
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
									
									
								 <h4 style="float:left;"><?=$dataFETCH_SUBcourses['coursename'];?> => Experience -  <?=trim($dataFETCH_SUBcourses['experince']);?></h4>
                                     <hr>

									 <div class="lightdetsil" ><br>
                                <?=nl2br($dataFETCH_SUBcourses['description_c']);?><br>
                                      </div>
									
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>

        </div>
    </div>
    
   
    
      <?php } } echo "<br>"; } 
	  
	  
	  if($coursecheck==0)
	  {
		
		echo '<p>Sorry no course filled by trainer </p>';  
	  }
	  
	  ?> 
					
							
							 
		
                         
                         
                         
                         
                         
                         
                         
                         
           
                </div>
            
                </div><!--/Tab cointain 4 --> 
                
                
           
				
			  
