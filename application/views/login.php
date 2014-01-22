<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$settings	=	$this->crud_model->get_settings();
	foreach($settings as $settings_row){}
?>
    
	<meta charset="utf-8">
	<title>Login | <?php echo $settings_row['institute_name'];?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $settings_row['page_meta_tag'];?>">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo base_url();?>template/css/bootstrap-spacelab.css" rel="stylesheet">
	<link href="<?php echo base_url();?>template/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>template/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>template/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url();?>template/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url();?>template/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>template/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>template/img/favicon.ico">
	<style type="text/css">
	  body {
	  
	  }
	</style>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="clear">
		</div>
		<div class="row-fluid center">
			<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>uploads/logo.png" style="max-height:150px;" /></a>
            <br/>
			<h2><?php echo $settings_row['institute_name'];?>
			</h2>
			<div class="well span5 center login-box">
            	
                <?php if($this->session->flashdata('installation_result') == 'success'):?>
                	<div class="alert alert-success">
                    	<button type="button" class="close" data-dismiss="alert">×</button>
                    	Installation successfully completed! Now login with your credentials.
                	</div>
            	<?php endif;?>
                <!-------LOGIN VALIDATION ERRORS------->
            	<?php echo validation_errors(); ?>
                
                <!-------TABS FOR LOGIN SELECTION------>
            	<ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#admin_login">Admin Login</a></li>
                    <!--<li><a href="#teacher_login">Teacher Login</a></li>-->
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="admin_login">
                       	<div class="alert alert-info">
					 		Admin login
						</div>
                        <!----ADMIN LOGIN FORM----->
                        <form class="form-horizontal" action="<?php echo base_url();?>index.php/login/index" method="post">
                            <fieldset>
                                <div class="input-prepend" title="Email" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="email" id="email" type="text" value="" placeholder="admin email address" autocomplete="on"/>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="input-prepend" title="Password" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" placeholder="password"/>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="clearfix">
                                </div>
                                <p class="center span5">
                                    <input type="hidden" name="login_type" value="admin"/>
                                    <input type="submit" class="btn btn-primary" value="Login"/>
                                </p>
                            </fieldset>
                        </form>
                    </div>
                    
                </div>
                        
                  
				
				
				
			</div>
            <footer>
                <hr />
                <p class="pull-right">Powered by: <a href="http://bit.ly/ekattor_school_erp" target="_blank">Ekattor</a></p>
            </footer>
			<!--/span-->
		</div>
		<!--/row-->
	</div>
	<!--/fluid-row-->
</div>
<!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>template/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>template/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url();?>template/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url();?>template/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>template/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>template/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url();?>template/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url();?>template/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url();?>template/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url();?>template/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url();?>template/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url();?>template/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url();?>template/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url();?>template/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url();?>template/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url();?>template/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url();?>template/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url();?>template/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url();?>template/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url();?>template/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url();?>template/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url();?>template/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url();?>template/js/charisma.js"></script>
	
		
</body>
</html>
