
<!---------------BACKUP & RESTORE------------>
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

            <?php if($this->session->flashdata('backup_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('backup_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>

			<legend><i class="icon32 icon-save"></i> Create Backup / Restore / Delete data</legend>
                                                        
   
            <table class="table table-striped">
            	<tbody>
                	<tr>
                    	<td>Student personal data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/student"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save students info">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore students info">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/student"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all students info" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
                	<tr>
                    	<td>Student academic data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/mark"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save students mark">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore students mark">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/mark"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all students marks" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
                	<tr>
                    	<td>Teacher personal data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/teacher"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save teachers info">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore teachers info">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/teacher"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all teachers info" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
                	<tr>
                    	<td>Subject data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/subject"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save subject info">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore subject info">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/subject"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all subject info" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
                	<tr>
                    	<td>Class data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/class"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save class info">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore class info">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/class"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all class info" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
                	<tr>
                    	<td>Total system data</td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/create/all"
                            	class="btn btn-success" data-rel="tooltip" title="Download and save total system info">
                                	<i class="icon icon-save icon-white"></i> Create backup</a>
                        </td>
                        <td>
                        	<form method="post" enctype="multipart/form-data"
                            	action="<?php echo base_url();?>index.php/admin/backup_restore/restore">
                        		<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                            	<input type="submit" class="btn btn-info" value="Upload & Restore"
                                	 data-rel="tooltip" title="Upload & restore total system info">
                            </form>
                        </td>
                        <td>
                        	<a href="<?php echo base_url();?>index.php/admin/backup_restore/delete/all"
                            	class="btn btn-danger" data-rel="tooltip" title="Delete all system info" 
                                	onclick="return confirm('delete ?')">
                                		<i class="icon-trash icon-white"></i> Delete</a>
                        </td>
                    </tr>
            	</tbody>
            </table>

             
        
			
		</div>
	</div>
</div>


