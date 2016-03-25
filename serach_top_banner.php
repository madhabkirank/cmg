          <?php
				  
				  $Advitimensttop=$conn->prepare("SELECT * FROM image_advatisement WHERE status=1 AND type='banneradv' AND city='".$_SESSION['currentcity']."' AND course='".$_POST['category']."' ORDER BY `id` DESC ");
$Advitimensttop->execute();

$AdvitimensttopF= $Advitimensttop->fetch();
if(!empty($AdvitimensttopF['image']))
{
?>
    <a href="<?=$AdvitimenstFETCH['urllink'];?>" target="new"> <img src="<?=$domainname;?>C-admin/img/adv/<?=$AdvitimensttopF['image'];?>" class="img-responsive"  style="margin-bottom: 10px;"></a>

<?php } else { ?>

<a href="<?=$AdvitimenstFETCH['urllink'];?>" target="new"> <img src="<?=$domainname;?>C-admin/img/adv/481121427.png" class="img-responsive" style="margin-bottom: 10px;"></a>

<?php } ?>
