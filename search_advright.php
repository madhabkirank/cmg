<?php



if(isset($_POST['category']) && !empty($_POST['category']))
{
$Advitimenst=$conn->prepare("SELECT * FROM image_advatisement WHERE status=1 AND type='sidebanner' AND city='".$_SESSION['currentcity']."' AND course='".$_POST['category']."' LIMIT 3,10  "); }
else {
$Advitimenst=$conn->prepare("SELECT * FROM image_advatisement WHERE status=1 AND type='sidebanner' AND city='".$_SESSION['currentcity']."'  LIMIT 3,10  ");

}
$Advitimenst->execute();

$AdvitimenstF= $Advitimenst->fetchAll();

foreach ($AdvitimenstF as $AdvitimenstFETCH) {  ?>
 <div class="advertisement"><a href="<?=$AdvitimenstFETCH['urllink'];?>" target="new"><img src="<?=$domainname;?>C-admin/img/adv/<?=$AdvitimenstFETCH['image'];?>" width="205"></a></div>
                    
<?php } ?>