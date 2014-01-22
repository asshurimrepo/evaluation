<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$settings	=	$this->crud_model->get_settings();
	foreach($settings as $settings_row){}
?>
<head>
	<meta charset="utf-8">
	<title><?php if(isset($page_title))echo $page_title;?> | <?php echo $settings_row['institute_name'];?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $settings_row['page_meta_tag'];?>">

	<?php include 'includes.php';?>
    
	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>template/img/favicon.ico">
		
</head>

<body>
		<?php include 'header.php';?>
		<div class="container-fluid">
			<div class="row-fluid">
				
				<?php include 'navigation.php';?>
                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                <?php include $page_name.'.php';?>
                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<?php include 'footer.php';?>
		
		</div><!--/.fluid-container-->

	
	
		
</body>
</html>
