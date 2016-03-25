             <div style="display:block">
            
            
          <div class="col-md-offset-1 col-md-12" style="margin-left:0px;">
 </br>
 
 <?php $dataMain  = fetchsingle('cmg_basic_inf0_ti',array('UMID' => $UMIDSProfile['UMID'])); ?>
<h3>Main Branch</h3>
<p class="mycolors"><?=$dataMain['instituename'];?></br>
Location: <?=$dataMain['location'];?></br>
City: <?=$dataMain['city'];?></br>
State: <?php $dataMain2  = fetchsingle('cm_state',array('id' => $dataMain['state'])); echo $dataMain2['state']; ?></br>
Country: <?php $dataMain12  = fetchsingle('cmg_country',array('id' => $dataMain['country'])); echo $dataMain12['country']; ?></br>
Pin : <?=$dataMain['pin'];?></br>
Phone : <?=$dataMain['phone'];?></br>
Email : <?=$dataMain['email'];?></br>
<?=$dataMain['website'];?></br>
<?=$dataMain['address'];?> <br />
</br>

</p>

<h3>Branches</h3>

<?php $data = fetch('cmg_trainer_branches',array('UMID' => $UMIDSProfile['UMID'])); 
foreach ($data as $value) {
?>
<div class="col-md-4 newbranchlist">
<div class="row" style="margin-left:0px; margin-right:0px">
<?php echo ucfirst($value['barnchname']); ?></br>
<?php echo $value['location']; ?> </br>
<?php echo $value['city']; ?> </br>
 <?php $dataMain  = fetchsingle('cm_state',array('id' => $value['state'])); echo $dataMain['state']; ?></br>
 <?php $dataMain1  = fetchsingle('cmg_country',array('id' => $value['country'])); echo $dataMain1['country']; ?></br>
 <?php echo $value['pin']; ?></br>
Phone : <?php echo $value['phone']; ?></br>
Email : <?php echo $value['email']; ?></br>
Address : <?php echo $value['address']; ?>
</div>
</div>

<?php
}
?>



          </div>            
 

                </div><!--/Tab cointain 4 --> 
			