
<!---------------SETTINGS------------>
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

            <?php if($this->session->flashdata('settings_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('settings_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
			<?php 
			//$settings	=	$this->crud_model->get_settings();
			//foreach($settings as $row):
			?>
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/settings" enctype="multipart/form-data">
            	<fieldset>
                <legend><i class="icon32 icon-wrench"></i>Manage system settings</legend>
                
                <div class="control-group">
                    <label class="control-label" for="typeahead">Institute Name</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" name="institute_name" 
                        	value="<?php echo $settings_row['institute_name'];?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Institute logo</label>
                    <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" name="userfile" type="file" />
                        <br />
                        <img style="max-height:80px;" src="<?php echo base_url();?>uploads/logo.png" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Address</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" name="address" 
                        	value="<?php echo $settings_row['address'];?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Phone Number</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" name="phone_number" 
                        	value="<?php echo $settings_row['phone_number'];?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Page title</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" name="page_title" 
                        	value="<?php echo $settings_row['page_title'];?>" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-primary" value="Update settings" />
                    </div>
                </div>
                </fieldset>
             </form>
        
			
		</div>
	</div>
</div>


