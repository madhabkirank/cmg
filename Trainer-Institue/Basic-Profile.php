  
 <div style="display:block" class="tab-txt">
             

 <?php $value  = fetchsingle('cmg_basic_inf0_ti',array('UMID' => $UMIDSProfile['UMID'])); ?>

      
<div class="row">
<div class="col-md-offset-1 col-md-10">
</br>
<h3>Basic Profile</h3>
<div class="row paddinbtnb">
<div class="col-md-7 paddin-top">
<div class="row">
<div class="col-md-5 mycolors">
Type
</div>
<div class="col-md-6">&nbsp;

<?php echo $value['membertype']; ?>

</div>

<div class="col-md-5 mycolors">
YOE
</div>
<div class="col-md-6"> &nbsp;
<?php echo $value['yoe']; ?>
</div>


<div class="col-md-5 mycolors">
Phone Number
</div>
<div class="col-md-6">&nbsp;
<?php echo $value['phone']; ?>
</div>


<div class="col-md-5 mycolors">
Alternate Number
</div>
<div class="col-md-6"> &nbsp;
<?php echo $value['altphonme']; ?>

</div>



<div class="col-md-5 mycolors">
Email Id
</div>
<div class="col-md-6">&nbsp;
<?php echo $value['email']; ?>
</div>


<div class="col-md-5 mycolors">
Website
</div>
<div class="col-md-5">&nbsp; <a href="<?php echo $value['website']; ?>" target="_blank" style="color:#000; font-size: 14px;">
<?php echo $value['website']; ?></a>
</div>

<div class="col-md-5 mycolors">
Institute Timings</div>
<div class="col-md-6">&nbsp;
<?php echo $value['time_day']; ?>
</div>





</div>
</div>
<div class="col-md-5 left-border">
<h3 class="mycolorsn">Contact Us</h3>

    <div class="row">

<div class="col-md-5 mycolors">
Address</div>
<div class="col-md-6">&nbsp;
<?php echo $value['address']; ?>
</div>

<div class="col-md-5 mycolors">
Location</div>
<div class="col-md-6">&nbsp;

<?php echo $value['location']; ?>

</div>

<div class="col-md-5 mycolors">
City</div>
<div class="col-md-6">&nbsp;
<?php echo $value['city']; ?>
</div>

<div class="col-md-5 mycolors">
State</div>
<div class="col-md-6">&nbsp;
<?php  $cm_state  = fetchsingle('cm_state',array('id' => $value['state']));  echo $cm_state['state']; ?></div>

<div class="col-md-5 mycolors">
Country</div>
<div class="col-md-6">&nbsp;
<?php  $cmg_country  = fetchsingle('cmg_country',array('id' => $value['country']));  echo $cmg_country['country']; ?></div>

<div class="col-md-5 mycolors">
Pincode</div>
<div class="col-md-6">&nbsp;
<?php echo $value['pin']; ?>
</div>


</div>

</div>
</div>




<h3>About Institute</h3>


<p>
<?php if(!empty($value['about_IT'])) { echo nl2br($value['about_IT']); } else { echo "Sorry no information available from the trainer"; } ?> 


</p>
</div>

</div>











             
             </div>
             
				
			