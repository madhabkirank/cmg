             <div style="display:block" id='viewdetails'>
                 <div class="col-md-offset-1 col-md-10">
            </br>

    <a style="margin-left: 12%;" href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Placement-Corner#viewdetails" class="btn btn-primary activeplace">Placement Corner</a>  &nbsp;&nbsp;&nbsp;       <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/companies_tied_up#viewdetails" class="btn btn-primary">Companies Tied Up</a>      &nbsp;&nbsp;&nbsp;   <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/student_placed#viewdetails" class="btn btn-primary">Student Placed</a>
 
 <div class="row tab-txt">
</br></br>

<?php 

$value = fetchsingle('cmg_placement_corner', array('UMID' => $UMIDSProfile['UMID']));



?>

       <div class="col-md-4">Placement Support :
       </div>
              <div class="col-md-6">
                  <?php if(!empty($value['placment_support'])) { echo $value['placment_support']; } else { echo "Sorry no information available from the trainer"; } ?> 	
       </div>
    
      <div class="col-md-4">No Of Students Placed Till Now :
       </div>
              <div class="col-md-6">
                  <?php if(!empty($value['totalYNS'])) { echo $value['totalYNS']; } else { echo "Sorry no information available from the trainer"; } ?> 	
       </div>

         <div class="col-md-4">No Of Students Placed this year :      </div>
              <div class="col-md-6">
             
                 
    <?php if(!empty($value['thisYNS'])) { echo $value['thisYNS']; } else { echo "Sorry no information available from the trainer"; } ?> 	
        
       </div>


        </div>
    </br>
        <h3>Placement Support</h3>

   <p>   
   &nbsp;
   
    <?php if(!empty($value['plcement_description'])) { echo nl2br($value['plcement_description']); } else { echo "Sorry no information available from the trainer"; } ?> 	

</p>






 


        </div>
            
                </div><!--/Tab cointain 4 --> 
				
			