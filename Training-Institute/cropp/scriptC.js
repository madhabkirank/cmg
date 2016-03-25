/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Crop photo using PHP and jQuery
*/

// the target size
var TARGET_W1 = 1200;
var TARGET_H1 = 240;

// show loader while uploading photo
function submit_photoc() {
	// display the loading texte
	$('#loading_progressc').html('Try another photo');
}

// show_popup : show the popup
function show_popupc(id) {
	// show the popup
	$('#'+id).show();
}

// close_popup : close the popup
function close_popupc(id) {
	// hide the popup
	$('#'+id).hide();
}

// show_popup_crop : show the crop popup
function show_popup_cropc(url) {
	// change the photo source
	$('#cropboxc').attr('src', url);
	// destroy the Jcrop object to create a new one
	try {
		jcrop_api.destroy();
	} catch (e) {
		// object not defined
	}
	// Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
    $('#cropboxc').Jcrop({
      aspectRatio: TARGET_W1 / TARGET_H1,
      setSelect:   [ 100, 100, TARGET_W1, TARGET_H1 ],
      onSelect: updateCoordsc
    },function(){
        jcrop_api = this;
    });

    // store the current uploaded photo url in a hidden input to use it later
	$('#photo_urlc').val(url);
	// hide and reset the upload popup
	$('#popup_uploadc').hide();
	$('#loading_progressc').html('');
	$('#photoc').val('');

	// show the crop popup
	$('#popup_cropc').show();
}

// crop_photo : 
function crop_photoc() {
	var x_ = $('#x1').val();
	var y_ = $('#y1').val();
	var w_ = $('#w1').val();
	var h_ = $('#h1').val();
	var photo_url_ = $('#photo_urlc').val();

	// hide thecrop  popup
	$('#popup_cropc').hide();

	// display the loading texte
	$('#photo_containerc').html('<img src="images/loader.gif"> Processing...');
	// crop photo with a php file using ajax call
	$.ajax({
		url: 'crop_photoC.php',
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W1, targ_h:TARGET_H1},
		success:function(data){
			// display the croped photo

document.location.reload(true);
			//$('#photo_containerc').html(data);


		}
	});
}

// updateCoords : updates hidden input values after every crop selection
function updateCoordsc(c) {
	$('#x1').val(c.x);
	$('#y1').val(c.y);
	$('#w1').val(c.w);
	$('#h1').val(c.h);
}

