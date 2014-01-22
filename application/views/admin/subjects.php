
<!---------------MANAGE SUBJECT LISTS------------>
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

            <?php if($this->session->flashdata('subject_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('subject_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR SUBJECTS-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit subject</a></li>
                <?php endif;?>
                <li class="active"><a href="#manage">Manage subjects</a></li>
                <li><a href="#create">Create subject</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	<!------EDIT SUBJECT------->
            	<?php 
				if(isset($edit) == true):
				$subject_info	=	$this->crud_model->get_subject_info($edit_subject_id);
				foreach($subject_info as $row):?>
            	
                <div class="tab-pane" id="edit">
                	<form class="form-horizontal" method="post" 
                    	action="<?php echo base_url();?>index.php/admin/subjects/edit/<?php echo $edit_subject_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-edit"></i>Edit subject</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="name" value="<?php echo $row['name'];?>" placeholder="e.g mathmetics"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Select class </label>
                                <div class="controls">
                                    <select name="class_id">
                                        <option value="">select</option>
                                        <?php 
                                        $classes	=	$this->crud_model->get_classes(); 
                                        foreach($classes as $row2): ?>
                                        <option value="<?php echo $row2['class_id'];?>"
                                        	<?php if($row['class_id'] == $row2['class_id'])
													echo 'selected="selected"';?>><?php echo $row2['name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Teacher assigned </label>
                                <div class="controls">
                                    <select name="teacher_id">
                                        <option value="">select</option>
                                        <?php 
                                        $teachers	=	$this->crud_model->get_teachers(); 
                                        foreach($teachers as $row3): ?>
                                        <option value="<?php echo $row3['teacher_id'];?>"
                                        	<?php if($row['teacher_id'] == $row3['teacher_id'])
													echo 'selected="selected"';?>><?php echo $row3['name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit subject"/>
                            </div>
                        </fieldset>
                    </form>
                
                </div>
                <?php endforeach;endif;?>
                
            	<!------MANAGE SUBJECTS------->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post" >
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>Manage subjects</legend>
                        </fieldset>
                    </form>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>of Class</th>
                                <th>Assigned teacher</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $subjects	=	$this->crud_model->get_subjects(); 
                           foreach($subjects as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['name'];?>
                            </td>
                            <td>
                                <?php echo $this->crud_model->get_class_name($row['class_id']);?> 
                                (<?php echo $this->crud_model->get_class_name_numeric($row['class_id']);?> )
                            </td>
                            <td class="center">
                                <?php echo $this->crud_model->get_teacher_name($row['teacher_id']);?>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/subjects/edit/<?php echo $row['subject_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/subjects/delete/<?php echo $row['subject_id'];?>">
										<i class="icon-trash icon-white"></i> 
											Delete
                                            	</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="create">
                	<!------CREATE NEW SUBJECT------->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/subjects">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create new subject</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="name" placeholder="e.g mathmetics"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Select class </label>
                                <div class="controls">
                                    <select name="class_id">
                                        <option value="">select</option>
                                        <?php 
                                        $classes	=	$this->crud_model->get_classes(); 
                                        foreach($classes as $row): ?>
                                        <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Teacher assigned </label>
                                <div class="controls">
                                    <select name="teacher_id">
                                        <option value="">select</option>
                                        <?php 
                                        $teachers	=	$this->crud_model->get_teachers(); 
                                        foreach($teachers as $row): ?>
                                        <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create subject"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


