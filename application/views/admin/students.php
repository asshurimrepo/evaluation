
<!---------------MANAGE STUDENT LISTS------------>
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

            <?php if($this->session->flashdata('student_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('student_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR STUDENTS-->
            <ul class="nav nav-tabs" id="myTab">
            
            	<?php if(isset($personal_profile) == true):?>
                	<li><a href="#personal_profile">Personal profile</a></li>
                <?php endif;?>
            
            	<?php if(isset($academic_result) == true):?>
                	<li><a href="#academic_result">Academic result</a></li>
                <?php endif;?>
                
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit student</a></li>
                <?php endif;?>
                
                <li class="active"><a href="#manage">Manage students</a></li>
                
                <li><a href="#create">Create student</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!------PERSONAL PROFILE------->
                <div class="tab-pane" id="personal_profile">
            		<?php include 'student_personal_profile.php';?>
                </div>
            
            	<!------ACADEMIC RESULT------->
                <div class="tab-pane" id="academic_result">
            		<?php include 'student_academic_result.php';?>
                </div>
            
            	<!------EDIT STUDENT------->
                <div class="tab-pane" id="edit">
            		<?php include 'student_edit.php';?>
                </div>
                
            	<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	<?php include 'student_manage.php';?>
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                	<?php include 'student_create.php';?>
                </div>
            </div>
        
			
		</div>
	</div>
</div>

<?php include 'webcam.php';?>
