             <div style="display:block" id='viewdetails'>
                 <div class="col-md-offset-1 col-md-10">
            </br>

  <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Placement-Corner#viewdetails" class="btn btn-primary">Placement Corner</a>  &nbsp;&nbsp;&nbsp;       <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/companies_tied_up#viewdetails" class="btn btn-primary activeplace">Companies Tied Up</a>      &nbsp;&nbsp;&nbsp;   <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/student_placed#viewdetails" class="btn btn-primary">Student Placed</a>
 
 <div class="row">
</br></br>
<div class="col-md-12">
<?php


$result = fetch('cmg_tieup_company', array('UMID' => $UMIDSProfile['UMID']));

foreach ($result as  $value) {
  # code...

?>

<div class="col-md-3 border_pacmentnew" style="margin: 4px;">
<img src="<?=$domainname;?>image/company_logo/<?php echo $value['company_logo']; ?>" height="60" width="137">



  <p class='pcenter'  title="<?=$value['company_name']?>"> <?php echo ucfirst(substr($value['company_name'], 0, 17));  ?></p>   
</div>

<?php } ?>

</div>
 


           


 


        </div>
            
                </div><!--/Tab cointain 4 --> 
        
        </div>
                   
         