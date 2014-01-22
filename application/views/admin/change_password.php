
<!---------------Change password------------>
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

            <?php if($this->session->flashdata('change_password_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('change_password_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
			<?php 
			$admin_info	=	$this->db->get('admin')->result_array();
			foreach($admin_info as $row):
			?>
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/change_password" enctype="multipart/form-data">
            	<fieldset>
                <legend><i class="icon32 icon-locked"></i>Change admin password</legend>
                
                <div class="control-group">
                    <label class="control-label" for="typeahead">Current password</label>
                    <div class="controls">
                        <input type="password" class="span6 typeahead" name="password_old" autocomplete="off" autofocus="autofocus"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">New password</label>
                    <div class="controls">
                        <input type="password" class="span6 typeahead" name="password_new" autocomplete="off"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Re-enter new password</label>
                    <div class="controls">
                        <input type="password" class="span6 typeahead" name="password_re" autocomplete="off"/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-primary" value="Update password" />
                    </div>
                </div>
                </fieldset>
             </form>
        <?php endforeach;?>
			
		</div>
	</div>
</div>


