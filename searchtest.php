<?php  include('database/config.php');

$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_courses b WHERE a.UMID=b.UMID   GROUP BY a.UMID "); 

  
$Search_SQL->execute();
$Search_SQLR= $Search_SQL->fetchAll(); 


       

foreach ($Search_SQLR as $Search_SQLRS) {                     
									    

 
$Search_SQL1=$conn->prepare("SELECT * FROM cmg_like_foollow_post WHERE UMID='".$Search_SQLRS['UMID']."'"); 

  
$Search_SQL1->execute();
$Search_SQLR1= $Search_SQL1->fetch(); 

 
 

									
                                    ?>    
                                        		  
			
                               
							   <h5><?=$Search_SQLRS['instituename']."=".$Search_SQLR1['like_no'];?> <br> </h5>
							  
							<?php } ?>