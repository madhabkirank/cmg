             <div style="display:block" id='viewdetails'>
                 <div class="col-md-offset-1 col-md-10">
            </br>

<a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Placement-Corner#viewdetails" class="btn btn-primary">Placement Corner</a>  &nbsp;&nbsp;&nbsp;       <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/companies_tied_up#viewdetails" class="btn btn-primary">Companies Tied Up</a>      &nbsp;&nbsp;&nbsp;   <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/student_placed#viewdetails" class="btn btn-primary activeplace">Student Placed</a>
 
 <div class="row">
</br></br>
<div class="col-md-12">
<?php



$result = fetch('cmg_placed_student', array('UMID' => $UMIDSProfile['UMID']));
foreach ($result as  $value) {
  # code...

?>

<div class="col-md-3 border_pacmentnew">
<img src="<?=$domainname;?>image/company_logo/<?php echo $value['company_logo']; ?>" height="60" width="137">

   
<p class='pcenter' title='<?=$value['studentname']; ?>'>    <?php echo ucfirst(substr($value['studentname'], 0, 17));  ?></p> 

      <p class='pcenter' title='<?=$value['companyname']; ?>' > <?php echo ucfirst(substr($value['companyname'], 0, 17));  ?></p> 
                   <p  class='pcenter' >   <?=$value['YOP']; ?></p> 
</div>

<?php } ?>

</div>
 


        </div>
            
                </div><!--/Tab cointain 4 --> 
				
				</div>
                   
         