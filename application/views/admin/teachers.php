
<!---------------MANAGE TEACHER LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	<?php echo validation_errors(); ?>

            <?php if($this->session->flashdata('teacher_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('teacher_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($personal_profile) == true):?>
                	<li><a href="#personal_profile">Personal profile</a></li>
                <?php endif;?>
                
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit teacher</a></li>
                <?php endif;?>
                
                <li class="active"><a href="#manage">Manage teachers</a></li>
                
                <li><a href="#create">Create teacher</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!------PERSONAL PROFILE------->
                <div class="tab-pane" id="personal_profile">
            		<?php include 'teacher_personal_profile.php';?>
                </div>
                
            	<!------EDIT TEACHER------->
            	
                <div class="tab-pane" id="edit">
            		<?php include 'teacher_edit.php';?>
                </div>
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                	<?php include 'teacher_manage.php';?>
                </div>
                
                <!------CREATE NEW TEACHER------->
                <div class="tab-pane" id="create">
                	<?php include 'teacher_create.php';?>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


<?php include 'webcam.php';?>

