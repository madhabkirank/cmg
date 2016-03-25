<?php include('../database/config.php');
$company_logo= $_FILES['photoc']['name'];
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

//if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG" || $extension=="GIF" || $extension=="gif"  || $extension=="PNG" || $extension=="png" )

if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{
$photo_src = $_FILES['photoc']['tmp_name'];

$data = getimagesize($photo_src);
$width = $data[0];
$height = $data[1];
// test if the photo realy exists
if($width>199 && $width<3201 && $height>199 && $height<1501)

{
	
	$uploadedimgeDB='cover_'.uniqid().'.'.$extension;
	
	
	$photo_dest = '../image/proimages/'.$uploadedimgeDB;
	// copy the photo from the tmp path to our path
	copy($photo_src, $photo_dest);
	// call the show_popup_crop function in JavaScript to display the crop popup
	

$UPDATA_ISQEI=$conn->prepare("UPDATE `cmg_registration` SET `cr_images`='$uploadedimgeDB' WHERE UMID='".$_SESSION['UMID']."' ");

$UPDATA_ISQEIF=$UPDATA_ISQEI->execute();
	
echo '<script type="text/javascript">window.top.window.show_popup_cropc("'.$photo_dest.'")</script>';
}

else {
echo '<script type="text/javascript">alert("Image size too large or small")</script>';
}}

else {
echo '<script type="text/javascript">alert("Not a valid image format")</script>';

}
?>
