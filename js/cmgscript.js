$(document).ready(function() {
	
	
$UID=$('.UID').val();

if($UID=='../')
{ $UID='../';
} else  { $UID='';}
$domainname='http://demo.projectlaunch.in/cmgphp/';

	// check user exist or not 
	$('.email').keypress(function() {
			
			
			$('.show-error-email').css('display','none');	
		
		 
		});

		$('.nonenow').hover(function() {
			
			$email=$('.email').val();
			$('.show-error-email').css('display','block');
			
		 $('.show-error-email').load($domainname+'controller/checkuser.php?'+$email);
		
		 
		});
		
		
		
	
	// Registation form Submition 	

		
 
$('.submitdata-forget').click(function() {
	
	
	  $email=$('.email3').val();
	
	  
if($email!='')
{
	$.ajax({
				url: $domainname+"controller/forget.php",
				type: "POST",
				data: $('#forget-form').serialize(),
				
				cache: false,
			
				success: function(response) {
			   
				
				$('.showthanku-forget').html(response);
				
									
				}
			});
			
			
}
else {

$('.show-error-forget').css('display','block');	

return false;
}

});

	$('.submitdata-reg').click(function() {
	 $username=$('.username').val();
	  $email=$('.email').val();
	   $password=$('.password').val();
	    $repassword=$('.repassword').val();
if($username!='' && $email!='' && $password!='' && $password==$repassword)
{
	$.ajax({
				url: $domainname+"controller/registationform.php",
				type: "POST",
				data: $('#registation-form').serialize(),
				
				cache: false,
			
				success: function(response) {
			   
				
				$('.showthanku-reg').html(response);
				
									
				}
			});
			
}
			else {

$('.show-error-name').css('display','block');	

return false;
}
	
			
			});
			
			
			
			
				$('.submitdata-reg1').click(function() {
	 $username=$('.username1').val();
	  $email=$('.email1').val();
	   $password=$('.password1').val();
	    $repassword=$('.repassword1').val();
if($username!='' && $email!='' && $password!='' && $password==$repassword)
{
	$.ajax({
				url: $domainname+"controller/registationform.php",
				type: "POST",
				data: $('#registation-form1').serialize(),
				
				cache: false,
			
				success: function(response) {
			   
				
				$('.showthanku-reg1').html(response);
				
									
				}
			});
			
}
			else {

$('.show-error-name1').css('display','block');	

return false;
}
	
			
			});
			
			
	

 
 
$('.submitdata-login').click(function() {
	
	
	  $email=$('.email2').val();
	   $password=$('.password2').val();
	  
if($email!='' && $password!='' )
{
	$.ajax({
				url: $domainname+"controller/login.php",
				type: "POST",
				data: $('#login-form').serialize(),
				
				cache: false,
			
				success: function(response) {
			   
				
				$('.showthanku-login').html(response);
				
									
				}
			});
			
			
}
else {

$('.show-error-login').css('display','block');	

return false;
}

});
  
 


  
	
	
	
	/* 
	
	
	 
 $(".table_result1").hover(function(){
	  
	   $('.table_result1').removeClass('table_result12');
	    
	    $(this).addClass('table_result12');
	  
	   });
 
	check ahere for all 
	
	 $(".dropdown").click(function(){
	
		$('.submenu').css("display","none");
	
	$(this).find('.submenu').slideToggle();

	
	
});
 
	 $('.ful_error').hover(function(){

$('.ansimp').removeClass("ansimpa");
$(this).find('.ansimp').addClass("ansimpa");


    });
	  $(".viewlight").click(function(){
	
		$('.right_data').css("opacity","0.2");
		
		$('.leadlightbox').slideToggle();
		
		  $key1=$('.APIKeylead1').val();
		   $key2=$('.GENCodelead1').val();
        $key=$key1+"="+$key2;
       $('.leadlightbox').load('lead_data.php?'+$key);
	
	
});

	
	  $("textarea").keypress(function(){ 
	  
var rows = document.querySelector('textarea').value.split("\n").length;
if(rows>30)
{
	alert("Maximum 30 keywords");
	$('.greycolor').css("color","red");
}

   });	
   
   
   window.location.reload();
   */ 
   
   
   
      





$('.takevlaueAUTO').keyup(function() {
			
$('.nsearch1').css('display','none'); 
$catvaluyy=$("input[name='PTI']:checked").val();

	
$value1=$(this).val();	
$value=$catvaluyy+'CMGGG'+$value1;

if($value.length>0)
{
	$('.nsearch').css('display','block');
} else { $('.nsearch').css('display','none'); }

$value=($value.replace(/[ ]+/g, "%20"));
$('.nsearch').load($domainname+'controller/autosearch.php?'+$value);
		 
		});



/* for location search */

$('.takevlaueAUTO1').keyup(function() {
			

	
	
$value1=$(this).val();
$value2=$('.show_city').val();		

if($value1.length>0)
{
	$('.nsearch1').css('display','block');
} else { $('.nsearch1').css('display','none'); }
$valuen=$value2+'CMG'+$value1;

$value=($valuen.replace(/[ ]+/g, "%20"));

$('.nsearch1').load($domainname+'controller/autosearchLoction.php?'+$value);
		 
		});


$('.takevlaueAUTOnewm').keyup(function() {
			

	$('.nsearch').css('display','none'); 
	
$value=$(this).val();		

if($value.length>0)
{
	$('.nsearch1').css('display','block');
} else { $('.nsearch1').css('display','none'); }

$value=($value.replace(/[ ]+/g, "%20"));
$('.nsearch1').load($domainname+'controller/autosearchLoctionnew.php?'+$value);
		 
		});



$('.uyoutubev').click(function() { 

$('.showyoulink').slideToggle();


});





$('.countryselect').change(function() { 

	  $cid=$(this).val();

$('.show_state').load($domainname+'controller/statesearch.php?'+$cid);

$valunue='';
	 $('.show_city,.takevlaueAUTO1,.clearitn').val($valunue);
});





$('.show_state').click(function() { 

 $cid=$(this).val();

$('.show_city').load($domainname+'controller/citsearch.php?'+$cid);
$valunue='';
	 $('.show_city,.takevlaueAUTO1,.clearitn').val($valunue);
});





$('.mylikediv').hover(function(){

$('.takefollow').removeClass("takefollowa");
$(this).find('.takefollow').addClass("takefollowa");

$('.flollowshow').removeClass("flollowshowa");
$(this).find('.flollowshow').addClass("flollowshowa");

$('.likeshow').removeClass("likeshowa");
$(this).find('.likeshow').addClass("likeshowa");


    });





$('.follow').click(function() { 

$textit=$(this).text();
if($textit=='Follow')
{
$(this).text('Unfollow');
} else{ 
$(this).text('Follow');
}
 $cid=$('.takefollowa').val();
$(this).css('color','#fff');
$('.flollowshowa').load($domainname+'controller/follow.php?'+$cid);

});


$('.like').click(function() { 
$textit=$(this).text();
if($textit=='Like')
{
$(this).text('Unlike');
} else{ 
$(this).text('Like');
}
 $cid=$('.takefollowa').val();
$(this).css('color','#fff');
$('.likeshowa').load($domainname+'controller/like.php?'+$cid);

});

	


$('.likenew').click(function() { 

 $cid=$('.takefollowa').val();
$(this).css('color','#2194d7');
$('.likeshowa').load($domainname+'controller/likenew.php?'+$cid);

});


$('.follownew').click(function() { 

 $cid=$('.takefollowa').val();
$(this).css('color','#2194d7');
$('.flollowshowa').load($domainname+'controller/follownew.php?'+$cid);

});







	 $('.mylikediv1').hover(function(){

$('.takefollow1').removeClass("takefollow1a");
$(this).find('.takefollow1').addClass("takefollow1a");

$('.flollowshow1').removeClass("flollowshow1a");
$(this).find('.flollowshow1').addClass("flollowshow1a");

$('.likeshow1').removeClass("likeshow1a");
$(this).find('.likeshow1').addClass("likeshow1a");

$('.takefollowID1').removeClass("takefollowID1a");
$(this).find('.takefollowID1').addClass("takefollowID1a");


    });





$('.follow1').click(function() { 




 $cid=$('.takefollow1a').val();
$(this).css('color','#2194d7');
$(this).text('Followed');
$('.disshow').load($domainname+'controller/follow11.php?'+$cid);

});


$('.like1').click(function() { 

 $cid1=$('.takefollow1a').val();
  $cid2=$('.takefollowID1a').val();
  $cid=$cid1+','+$cid2;
$(this).css('color','#2194d7');
$(this).text('Liked');
$('.disshow').load($domainname+'controller/like_post.php?'+$cid);

});



	 $('.sendamessage').hover(function(){

$('.toid').removeClass("toida");
$(this).find('.toid').addClass("toida");


    });


$('.sendamessage').click(function() { 
 $toida=$('.toida').val();

  $('.toidn').val($toida);
    

});








$('.reviewset').click(function() { 

 $cid=$(this).attr('id');

$(this).css('color','#2194d7');
$(this).load($domainname+'controller/like_review.php?'+$cid);

});




$('.abuse').click(function() { 

 $cid=$(this).attr('id');

$(this).css('color','#2194d7');
$(this).html('&nbsp;&nbsp; R-Abused');
$('.reviewshow').load($domainname+'controller/r-abused.php?'+$cid);

});




$('.valuexp1,.valuexp2').focus(function(){
    $('#expchecked').attr('checked', false);
    
});




 $(".pricemy").hover(function(){
	  
	   
	    
	    $('.pricemy').addClass('pricemy1');
		$(this).removeClass('pricemy1');
	  
	   });

$('.pricemy').on('change', function(){
						
	$('.pricemy1').attr('checked', false);


									 });



  $('.category').on('change', function(){
							 
    var category_list = [];
    $('#filters :input:checked').each(function(){
      var category = $(this).val();
	  if(category !='NOT')
	  {
      category_list.push(category); 
	  
	  }
	
	
    });


 if(category_list.length == 0)
 {
        $('.allprevius').fadeIn();
	
		 $('.fillterserach').css('display','none');
 } else { 
 $('.allprevius').css('display','none');
 
  $('.fillterserach').css('display','block');
 
 }
	
var valuexp1 = $('.valuexp1').val();
var valuexp2 = $('.valuexp2').val();


	


if(valuexp2!='' && valuexp1!='' &&  $("#expchecked").is(':checked'))
{
 $('.fillterserach').css('display','block');
    $('.allprevius').css('display','none');
	category_list=category_list+'CMG'+valuexp1+'CMG'+valuexp2;
	
 $('.fillterserach').load('search_filtter.php?'+category_list);
}
else {
	
 $('.fillterserach').load('search_filtter.php?'+category_list);	
}
  
  
  

});


    $('.chnagsoit').change(function() {
  $tname= $(this).val();
        document.location = $domainname+'Trainer-Institue/Post/Profile/'+$tname+'/Course-List';
    });


   $('.chnagsoitmprof').change(function() {
  $tname= $(this).val();
        document.location = $domainname+'Training-Institute/'+$tname+'#Profile';
    });



$('.couponid').change(function() { 

	  $counid=$(this).val();


$('.shocupondetails').load($domainname+'controller/couponsearch.php?'+$counid);

});






$('.getcoupons').click(function() { 

	  $couponid=$(this).attr('id');

$(this).load($domainname+'controller/getcoupons.php?'+$couponid);

});

$('.chosen-select1').change(function() { 



  $cityname= $(this).val();
  

 $(this).load($domainname+'controller/citynamesession.php?'+$cityname);

window.location.reload(true);




 });


$('.spaAc').click(function() { 

$('.activationlinkset').load($domainname+'controller/activationformail.php?');





 });
 
 
 
 
 
$('.urlname').keyup(function() {


	
$urlvalue=$(this).val();	
$urlvalue=($urlvalue.replace(/[ ]+/g, ""));


$('.showurlhere').load($domainname+'controller/urnamecheck.php?'+$urlvalue);
		 
		});
		
		
 
 $('.myphonecheck').keyup(function() {


	
$urlvalue=$('.URLTake').val();	

if($urlvalue==1)
{

alert('You Should Change Profile URL');
$diltva='';		
$(this).val($diltva);
}
	
	 
		});
 
 


 $('.morevi').click(function() {

$thiid=$(this).attr("id")

$('.showpostn'+$thiid).slideToggle();
	
	 
		});
 
$('.Generalr').click(function() {


$('.category_post').css('display','block');
	
	 
		});

$('.Followersr').click(function() {


$('.category_post').css('display','none');
	
	 
		});

$('.mybtn').click(function() {


$(this).css('display','none');
	
	 
		});

$('.search-post').keyup(function() {


$('.mybtn').css('display','block');
	
	 
		});










	//how much items per page to show
	var show_per_page = 6;
	//getting the amount of elements inside content div
	var number_of_items = $('#content').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);

	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);

	//now when we got all we need for the navigation let's make it '

	/*
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';

	$('#page_navigation').html(navigation_html);

	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');

	//hide all the elements inside content div
	$('#content').children().css('display', 'none');

	//and show the first n (show_per_page) elements
	$('#content').children().slice(0, show_per_page).css('display', 'block');




});

 
 
 
 
 
 function previous(){

	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}

}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}

}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());

	//get the element number where to start the slice from
	start_from = page_num * show_per_page;

	//get the element number where to end the slice
	end_on = start_from + show_per_page;

	//hide all children elements of content div, get specific items and show them
	$('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');

	//update the current page input field
	$('#current_page').val(page_num);
}

 
 
 function checkURL (abc) {
    var string = abc.value;
    console.log(abc);
    if (!~string.indexOf("http")){
        console.log("abcd");
        string = "http://" + string;
    }
    abc.value = string;
    return abc
}