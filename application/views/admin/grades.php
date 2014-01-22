
<!---------------MANAGE EXAM LISTS------------>
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

            <?php if($this->session->flashdata('grade_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('grade_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR GRADES-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit grade</a></li>
                <?php endif;?>
                <li class="active"><a href="#manage">Manage grades</a></li>
                <li><a href="#create">Create grade</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	<!------EDIT EXAM------->
            	<?php 
				if(isset($edit) == true):
				$grade_info	=	$this->crud_model->get_grade_info($edit_grade_id);
				foreach($grade_info as $row):?>
            	
                <div class="tab-pane" id="edit">
                	<form class="form-horizontal" method="post" 
                    	action="<?php echo base_url();?>index.php/admin/grades/edit/<?php echo $edit_grade_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-edit"></i>Edit grade</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grades name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="name" value="<?php echo $row['name'];?>" placeholder="e.g A+ , A , B+"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade point </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_point" value="<?php echo $row['grade_point'];?>" placeholder="e.g 3,4,5"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Mark from </label>
                                <div class="controls">
									<input type="number" class="span6 typeahead" name="mark_from"  value="<?php echo $row['mark_from'];?>" placeholder="e.g 90"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Comment </label>
                                <div class="controls">
									<input type="number" class="span6 typeahead" name="mark_upto"  value="<?php echo $row['mark_upto'];?>" placeholder="e.g 100"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Comment </label>
                                <div class="controls">
									<textarea class="span6 autogrow" name="comment" ><?php echo $row['comment'];?></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit grade"/>
                            </div>
                        </fieldset>
                    </form>
                
                </div>
                <?php endforeach;endif;?>
                
            	<!------MANAGE GRADES------->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post" >
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>Manage grades</legend>
                        </fieldset>
                    </form>
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Grade name</th>
                                <th>Grade point</th>
                                <th>Mark from</th>
                                <th>Mark upto</th>
                                <th>Comment</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $grades	=	$this->crud_model->get_grades(); 
                           foreach($grades as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['name'];?>
                            </td>
                            <td>
                                <?php echo $row['grade_point'];?>
                            </td>
                            <td>
                                <?php echo $row['mark_from'];?>
                            </td>
                            <td class="center">
                                <?php echo $row['mark_upto'];?>
                            </td>
                            <td class="center">
                                <?php echo $row['comment'];?>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/grades/edit/<?php echo $row['grade_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/grades/delete/<?php echo $row['grade_id'];?>">
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
                	<!------CREATE NEW EXAM------->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/grades">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create new grade</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grades name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="name" placeholder="e.g A+ or A or B+"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade point</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_point" placeholder="e.g 3,4,5"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Mark from </label>
                                <div class="controls">
									<input type="number" class="span6 typeahead" name="mark_from" placeholder="e.g 90"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Mark upto </label>
                                <div class="controls">
									<input type="number" class="span6 typeahead" name="mark_upto" placeholder="e.g 100"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Comment </label>
                                <div class="controls">
									<textarea class="span6 autogrow" name="comment" ></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create grade"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


