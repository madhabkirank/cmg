            <div style="display:block">
                    <h3 style="float:left">&nbsp; Reviews :</h3>
					<!-- <form style="float:right"><input type="text" name="password" placeholder="Search by Tag" class="form_style1"></form> -->

<form action="" class="col-md-12" method="post">
<textarea class="form-control" name="message" rows="5" required placeholder="Write your Review"></textarea>
<input type="hidden" name="trainermainiD" value="<?=$UMIDSProfile['UMID'];?>">

   <?php if(isset($_SESSION['s-UMID']))
						{ ?>

<input class="pull-right btn-primary" <?=$dispalyA;?> type="submit" name="review" value="Review Post">

<?php  } elseif(isset($_SESSION['UMID'])) { ?>
<div class="post_txt pull-right btn-primary" > <a onclick="return alert('Only Student Can Apply This')" class="cursor">Post Review</a></div>

<?php } else { ?> 
<div class="post_txt pull-right btn-primary" <?=$dispaly;?>> <a data-toggle="modal" data-target="#myModal_login" class="cursor">Post Review</a></div>
<?php } ?>
</form>

					<div class="clearfix"></div>
	

	<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />

<div id='content'>
<?php




$dataR=$conn->prepare("SELECT * FROM cmg_reviews  WHERE `UMID`='".$UMIDSProfile['UMID']."' AND `status`=1 ORDER BY `like` DESC"); 

$dataR->execute();
$dataR= $dataR->fetchAll(); 



foreach ($dataR as $value) {
	
		$trainer_details  = fetchsingle('cmg_registration_s',array('UMID' => $value['UIMD_s']));	
		
	$reviewst  = num_rows('cmg_review_like',array('reviw_id' => $value['id'],'UIMD_S' => $_SESSION['s-UMID']));
		
		$reviewstlike  = num_rows('cmg_review_like',array('reviw_id' => $value['id']));
				
					if($reviewst>=1)
					{ $actuveF='#2194d7'; $reviewtext='Liked'; } else {  $actuveF=''; $reviewtext='like';  }
		
 ?>

					<div class="trainer_post">
					    <div class="trainer_post_left" style="width:130px;">
						   <img src="<?=$domainname;?>image/proimages/<?=$trainer_details['pr_images'];?>" height="80" width="80">
						   <h4><?=$trainer_details['username'];?></h4>
						   <?=$trainer_details['date'];?> <?=$trainer_details['time'];?>
						</div>
						<div class="trainer_post_right" style="width:80%;">

                        <?php echo nl2br($value['message']); ?>

						<br><br/>
						
                        <?php if(isset($_SESSION['s-UMID']))
						{ ?>
                        
                        <div class="post_txt" <?=$dispalyA;?>><a class="cursor reviewset" id='<?=$value['id']."CMG".$UMIDSProfile['UMID'];?>' style="color:<?=$actuveF;?>"><?=$reviewtext;?> ( <?=$reviewstlike;?>  Likes ) </a></div>
                        
                        <?php  } elseif(isset($_SESSION['UMID'])) { ?>
						<div class="post_txt"> <a onclick="return alert('Only Student Can Apply This')" class="cursor"> <?=$reviewstlike;?>  Likes</a> </div>
                                              
<?php } else { ?> 
                   	<div class="post_txt" <?=$dispaly;?>> <a data-toggle="modal" data-target="#myModal_login" class="cursor"> <?=$reviewstlike;?>  Likes</a> </div>
                    <?php } ?>     
                        
						
						</div>
						<div class="clearfix"></div>
					</div>
<?php } ?>



</div>

	<div id='page_navigation'></div>




					
                </div><!--/Tab cointain 4 --> 
				
			