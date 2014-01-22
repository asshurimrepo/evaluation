<?php 
	if(isset($edit) == true):
	$student_info	=	$this->crud_model->get_student_info($edit_student_id);
	foreach($student_info as $row):?>
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/students/<?php echo $current_class_id.'/edit/'.$edit_student_id;?>" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="icon32 icon-edit"></i>Edit student</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Student's name </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="name" value="<?php echo $row['name']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="date01">Birthday</label>
					<div class="controls">
						<input type="date" class="span6" name="birthday" value="<?php echo $row['birthday'];?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Sex </label>
					<div class="controls">
						<select id="" name="sex">
							<option value="">select</option>
							<option value="male" <?php if($row['sex']=='male')echo 'selected="selected"';?>>Male</option>
							<option value="female" <?php if($row['sex']=='female')echo 'selected="selected"';?>>Female</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Blood group</label>
					<div class="controls">
						<select id="" name="blood_group">
							<option value="">select</option>
							<option value="AB+" <?php if($row['blood_group']=='AB+')echo 'selected="selected"';?>>AB+</option>
							<option value="AB−" <?php if($row['blood_group']=='AB-')echo 'selected="selected"';?>>AB−</option>
							<option value="B+" <?php if($row['blood_group']=='B+')echo 'selected="selected"';?>>B+</option>
							<option value="B−" <?php if($row['blood_group']=='B-')echo 'selected="selected"';?>>B−</option>
							<option value="A+" <?php if($row['blood_group']=='A+')echo 'selected="selected"';?>>A+</option>
							<option value="A−" <?php if($row['blood_group']=='A-')echo 'selected="selected"';?>>A−</option>
							<option value="O+" <?php if($row['blood_group']=='O+')echo 'selected="selected"';?>>O+</option>
							<option value="O−" <?php if($row['blood_group']=='O-')echo 'selected="selected"';?>>O−</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Photo </label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
						<a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
							Take photo from webcam</a>		
						<br /><?php 
						if(file_exists('uploads/student_image/'.$row['student_id'].'.jpg'))
							$image_url	=	base_url().'uploads/student_image/'.$row['student_id'].'.jpg';
						else
							$image_url	=	base_url().'uploads/user.jpg';?>
						<img src="<?php echo $image_url;?>" style="max-width:200px;" class="image_thumbnail" />							
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Religion </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="religion"   value="<?php echo $row['religion']; ?>"
							data-provide="typeahead" data-items="4" data-source='["Christianity","Islam","Judaism","Buddhism","Hinduism"]'>
							
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Address </label>
					<div class="controls">
						<textarea class="span6 autogrow" name="address"><?php echo $row['address']; ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Phone </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="phone"  value="<?php echo $row['phone']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Email </label>
					<div class="controls">
						<input type="email" class="span6 typeahead" name="email"  value="<?php echo $row['email']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Father's name </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="father_name" value="<?php echo $row['father_name']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Mother's name </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="mother_name" value="<?php echo $row['mother_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Class </label>
					<div class="controls">
						<select id="" name="class_id">
							<?php 
							$classes	=	$this->crud_model->get_classes();
							foreach($classes as $row2):
							?>
							<option value="<?php echo $row2['class_id'];?>"
								<?php if($row['class_id'] == $row2['class_id'])echo 'selected="selected"';?>>
									<?php echo $row2['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Roll </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="roll"  value="<?php echo $row['roll']; ?>"/>
					</div>
				</div>
				<div class="form-actions">
					<input type="hidden" name="operation" value="edit"  />
					<input type="submit" class="btn btn-primary" value="Edit student" />
				</div>
			</fieldset>
		</form>
	
	<?php endforeach;
endif;
?>