             <div style="display:block">
            <div class="col-md-offset-1 col-md-10">
            </br>
            <h3>More About Institute</h3>
     <div class="row tab-txt">
         
         
         <?php $datainfraS  = fetchsingle('cmg_infrastructure',array('UMID' => $UMIDSProfile['UMID']));
		 
		 ?>
            <div class="col-md-12" style="margin:10px;">  
           
             <strong> No. of Trainer </strong>-
 <?php if(!empty($datainfraS['no_of_trainer'])) { echo $datainfraS['no_of_trainer']; } else { echo "Sorry no information available from the trainer"; } ?> 
             </div>
            <div class="col-md-12"  style="margin:10px;">
          <strong>    Accommodation </strong>- 
 <?php if(!empty($datainfraS['accommodation'])) { echo $datainfraS['accommodation']; } else { echo "Sorry no information available from the trainer"; } ?> 
             </div>
              <div class="col-md-12"  style="margin:10px;">  
        <strong>    Student Trained </strong>- 

 <?php if(!empty($datainfraS['student_trained'])) { echo $datainfraS['student_trained']; } else { echo "Sorry no information available from the trainer"; } ?> 
            </div>
            <br>
              <div class="col-md-12"  style="margin:10px;">  
                <strong>   Description:</strong>
 <br>
                   <?php if(!empty($datainfraS['description'])) { echo nl2br($datainfraS['description']); } else { echo "Sorry no information available from the trainer"; } ?> 


          
             </div>
             
             
             <div class="col-md-12"  style="margin:10px;">  
               
                   
                 <?php if(!empty($datainfraS['tubelink']) && $datainfraS['tubelink']!=1)
				 {
					 
					 echo '<iframe height="350" width="100%" src="'.$datainfraS['tubelink'].'" frameborder="0" allowfullscreen=""></iframe>';
				 }
                 
                 
              ?> 
             </div>
</div>







            </div>
                </div><!--/Tab cointain 4 --> 
				
			