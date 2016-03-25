            


 <div style="display:block">
            
              <h3 class="pleft">Gallery</h3> <br>
            
                <div class="col-md-offset-1 col-md-10">

       



<div>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Photos</a></li>
    <li role="presentation" style="background:#3A5F6F;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Videos</a></li>
 </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<?php 

$result  = fetch('cmg_gallery',array('category' => 'images','UMID' => $UMIDSProfile['UMID']));
foreach ($result as $value) {
?>
<a href="<?=$domainname;?>image/gallery/<?php echo $value['imag_video']; ?>" data-toggle="lightbox" data-gallery="multiimages"  data-title="Gallery Photos" data-footer="<?php echo $value['g_description'];?>" >
<img src="<?=$domainname;?>image/gallery/<?php echo $value['imag_video']; ?>" class="img-thumbnail col-md-4 gimfixed">
</a>
<?php  } ?>
</div>

<div role="tabpanel" class="tab-pane" id="profile">
</br>
<?php 
$result  = fetch('cmg_gallery',array('category' => 'Video','UMID' => $UMIDSProfile['UMID']));
foreach ($result as $value) {
$explodvID=end(explode('/',$value['imag_video']));
if($value['imag_video']!=1)
{

?>
<div class="col-md-4" style="margin: 5px 0px; width: 134px;">

<a href="<?=$domainname;?>image/gallery/<?php echo $value['imag_video']; ?>" data-toggle="lightbox" data-gallery="youtubevideos" data-title="Gallery Videos" data-footer="<?php echo $value['g_description'];?>" >
<img src="http://img.youtube.com/vi/<?=$explodvID;?>/0.jpg" class="col-md-4" style='width:150px;'>
</a>
</div>
<?php } } ?>
</div>
</div>
</div>













    </div>
            
                </div><!--/Tab cointain 4 --> 
				
			


