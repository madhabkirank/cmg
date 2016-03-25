<?php session_start(); include($UDS.'database/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Coach Me Guru</title>
	<link rel="icon" type="image/gif" href="<?=$domainname;?>image/animated.png">
		
	<!-- core CSS -->
    <link href="<?=$domainname;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$domainname;?>css/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=$domainname;?>css/css/animate.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="<?=$domainname;?>css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domainname;?>css/component.css" />
    <link href="<?=$domainname;?>css/main.css" rel="stylesheet">
    <link href="<?=$domainname;?>css/responsive.css" rel="stylesheet">    
    
     <link rel="stylesheet" href="<?=$domainname;?>css/chosen.css">
    
    
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'> 
    <script src="<?=$domainname;?>js/jquery.js"></script>
</head><!--/head-->
<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                <?php
				$cmg_alltext=$conn->prepare("select * from cmg_alltext WHERE `category`='marqueetext' AND `status`=1 ORDER BY 	`id` DESC ");
$cmg_alltext->execute();
$cmg_alltextF= $cmg_alltext->fetch();
				?>
               <marquee   scrollamount="3" scrolldelay="5" direction="left" onmouseover="this.stop()" onmouseout="this.start()" ><?=$cmg_alltextF['text'];?></marquee>
                                      
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<?php if(isset($_SESSION['s-email'])) { ?>
					
                    <a class="navbar-brand" href="<?=$domainname;?>Student/Dashboard"><img src="<?=$domainname;?>image/logo.png" height="45" width="230" alt="logo"></a>
					
					<?php } elseif(isset($_SESSION['email'])) { ?>
					
					  <a class="navbar-brand" href="<?=$domainname;?>Training-Institute/Dashboard"><img src="<?=$domainname;?>image/logo.png" height="45" width="230" alt="logo"></a>
					  
					  <?php } else { ?>
					  	  <a class="navbar-brand" href="<?=$domainname;?>"><img src="<?=$domainname;?>image/logo.png" height="45" width="230" alt="logo"></a>
					  <?php } ?>
					
                </div>
				
                <div class="collapse navbar-collapse navbar-right"> 
				<?php 
				
					$checkur=$_SERVER['REQUEST_URI'];
					
					$_SESSION['URLSET']=$checkur; 
				
				
			
				
				 if(isset($_SESSION['email']))
				{ 
			$mesagecount=$conn->prepare("select * from cmg_message WHERE `UMID_to`='".$_SESSION['UMID']."' AND `from_message`='student' AND `new_status`=0");
$mesagecount->execute();
$mesagecountSET= $mesagecount->rowCount();

				if($mesagecountSET>0)
				{
				?>
				
				 <a   href="<?=$domainname;?>Training-Institute/Message#profile" class="cursor mycolorh font16" >Message <i class="fa fa-envelope"> </i> </a> <span class="font13 mycolorh ">[<?=$mesagecountSET;?>]  | </span>
				 
				 <?php  } else {?>
				  <a   href="<?=$domainname;?>Training-Institute/Message#profile" class="cursor mycolor font16" >Message <i class="fa fa-envelope"></i> | </a> 
				  
				  <?php } ?>
				 
				 Welcome <a   href="<?=$domainname;?>Training-Institute/Dashboard" class="cursor mycolor font13" ><?=$_SESSION['username'];?></a> &nbsp;
                	<a  href="<?=$domainname;?>Logout"class="cursor mycolor font13" >, Logout</a>
				
				<?php }
				 elseif(isset($_SESSION['s-email']))
				{ 
				
				
				
			$mesagecount=$conn->prepare("select * from cmg_message WHERE `UMID_from`='".$_SESSION['s-UMID']."' AND `from_message`='trainer' AND `new_status`=0");
$mesagecount->execute();
$mesagecountSET= $mesagecount->rowCount();

				if($mesagecountSET>0)
				{
				?>
				
<a   href="<?=$domainname;?>Student/Message#profile" class="cursor mycolorh font16" >Message <i class="fa fa-envelope"></i></a>  <span class="font13 mycolorh ">[<?=$mesagecountSET;?>] </span> &nbsp; | 
				 
				 <?php  } else {?>
	<a   href="<?=$domainname;?>Student/Message#profile" class="cursor mycolor font16" >Message <i class="fa fa-envelope"></i></a>  &nbsp; | 
				  
				  <?php } ?>
				  
				  
				Welcome  <a   href="<?=$domainname;?>Student/Dashboard" class="cursor mycolor font13" > <?=$_SESSION['s-username'];?></a>
                <a   href="<?=$domainname;?>Logout" class="cursor mycolor font13" >, Logout</a>
				
				<?php }
				 else { ?>
				
                <a  data-toggle="modal" data-target="#myModal_login" class="cursor" ><img src="<?=$domainname;?>image/login.jpg"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
               <a  data-toggle="modal" data-target="#myModal" class="cursor" ><img src="<?=$domainname;?>image/registration.jpg"></a>  
					 <?php } ?>
                     
				                  
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->


    <section id="feature" >
        <div class="container">
            <div class="row">
                <div class="col-md-3 city" style="    text-align: right;    margin-left: 39px;"> 
		<div>
				 <?php
				$allcity=$conn->prepare("select * from cmg_city WHERE  `status`=1   GROUP BY `city`  ORDER BY 	`city` ASC");
$allcity->execute();
$allcitySET= $allcity->fetchAll();
					$ipcity = json_decode(file_get_contents("http://ipinfo.io/".$IP));
if(!empty($ipcity->city))
{$currentcity=$ipcity->city;
} else { $currentcity='Hyderabad'; }

		if(!isset($_SESSION['currentcity'])) {$_SESSION['currentcity']=$currentcity; }		?>
				 <form method="post" action="<?=$domainname;?>citynamesession.php" > <span style="font-size:16px;">City </span>
              
				      <select data-placeholder="Select City" onChange="this.form.submit()"  class="chosen-select" name="currentcitysel"  tabindex="2" >
            <option value="<?=$_SESSION['currentcity'];?>"><?=$_SESSION['currentcity'];?></option>
         
			<?php foreach($allcitySET as $allcitySETV)
			{
			echo '<option value="'.$allcitySETV['city'].'">'.$allcitySETV['city'].'</option>';
			}
			
			?>
                   
                  
                </select></form>

</div> </div>
                
                <?php if(isset($_GET['PTI']))
{
unset($_SESSION['radion']);
$_SESSION['radion']=$_GET['PTI'];

if($_GET['PTI']=='Institute')
{$checkedn='checked'; $checkedn1='';
}
else { 
$checkedn=''; $checkedn1='checked';
}


} 

elseif($_SESSION['radion'])
{
if($_SESSION['radion']=='Institute')
{$checkedn='checked'; $checkedn1='';
}
else { 
$checkedn=''; $checkedn1='checked';
}

} 

else { 
$checkedn='checked'; $checkedn1='';

} ?>
                     <form action="<?=$domainname;?>search.php" method="get" enctype="multipart/form-data"> 
                <div class="radio_button1 col-md-6 col-xs-12" style="text-align:left;"> <input type="radio" value="Institute" name="PTI" <?=$checkedn;?>> Institute  <input type="radio" name="PTI"  value="Trainer" <?=$checkedn1;?> > Trainer </div> 
                <div class="clearfix"></div>
               <p>
               		
                     <input type="hidden" name="hiddenvalue" class="hidden" value="1">
               <input type="text" name="category" placeholder="Select by Course, Trainer or Institute" class="form_style1 takevlaueAUTO"  autocomplete="off">
               
               <input type="text" name="location" placeholder="Select Location" class="form_style1 takevlaueAUTOnewm" autocomplete="off"> 
               <input type="submit" name="submit" value="SEARCH" class="submit">  
			
               
               <div class="nsearch">
		   
		     <div class="clearfix"></div>
		</div>
        
           <div class="nsearch1">
		   
		     <div class="clearfix"></div>
		</div>
               </p>
                  </form>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="recent-works">
        <div class="container">
            <div class="row wow fadeInDown icon_outer" data-wow-duration="1000ms" data-wow-delay="600ms">
            
                    <?php 
$dataFetch_institue=$conn->prepare("select * from cmg_category WHERE `status`=1 ");
$dataFetch_institue->execute();
$dataFetch_institueF= $dataFetch_institue->fetchAll();			

foreach ($dataFetch_institueF as $DFinstitue) {
if($DFinstitue['category']==$_GET['Post'])
{$mycolorsetc="#F67F15";} else { $mycolorsetc="#004B93"; } 
	
	?>
                  <div class="icon">
              
                  <a href="<?=$domainname;?>category/Post/<?=$DFinstitue['category'];?>/"><div style="background:url(<?=$domainname;?>image/icon1.png); height:62px; width:61px;text-align: center;"><img src="<?=$domainname;?>C-admin/img/<?=$DFinstitue['icon'];?>" height="27" width="33" style='margin-top: 15px;'></div>
                  <h2 style="color:<?=$mycolorsetc;?>"><?=$DFinstitue['category'];?></h2></a>
                  </div>
                  
                  
                  <?php }?>
                  
                  
                  
                      
                  
                  
                  
                  
                  
                  
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->
  
  <?php if(isset($_SESSION['UMID']))
  { 
  
  $activation=$conn->prepare("select * from cmg_registration WHERE `UMID`='".$_SESSION['UMID']."' ");
$activation->execute();
$activationLink= $activation->fetch();	
  if($activationLink['email_verification']!=1)
  {
  ?>
  
  <div class="activationlinkset"> Active Your Account ( Check inbox/Spam in your mail ), <span class="spaAc">Resend Activation link</span>, <span ><a href="Dashboard" style="color:#195B80; font-size:13px;">Click Here if already Activated</a></span></div>
  
  
  <?php } }?>


