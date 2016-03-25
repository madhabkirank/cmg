<?php include('../database/config.php');
$company_logo= $_FILES['photo']['name'];
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

//if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG" || $extension=="GIF" || $extension=="gif"  || $extension=="PNG" || $extension=="png" )

if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{
$photo_src = $_FILES['photo']['tmp_name'];

$data = getimagesize($photo_src);
$width = $data[0];
$height = $data[1];
// test if the photo realy exists
if($width>199 && $width<1001 && $height>199 && $height<801)

{
	
	$uploadedimgeDB='logo_'.uniqid().'.'.$extension;
	
	
	$photo_dest = '../image/proimages/'.$uploadedimgeDB;
	// copy the photo from the tmp path to our path
	copy($photo_src, $photo_dest);
	// call the show_popup_crop function in JavaScript to display the crop popup
	

$UPDATA_ISQEI=$conn->prepare("UPDATE `cmg_registration_s` SET `pr_images`='$uploadedimgeDB' WHERE UMID='".$_SESSION['s-UMID']."' ");

$UPDATA_ISQEIF=$UPDATA_ISQEI->execute();
	
echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_dest.'")</script>';
}

else {
echo '<script type="text/javascript">alert("Image size too large or small")</script>';
}}

else {
echo '<script type="text/javascript">alert("Not a valid image format")</script>';

}
?>
