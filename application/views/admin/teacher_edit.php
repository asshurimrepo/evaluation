<?php 
	if(isset($edit) == true):
	$teacher_info	=	$this->crud_model->get_teacher_info($edit_teacher_id);
	foreach($teacher_info as $row):?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/teachers/edit/<?php echo $edit_teacher_id;?>" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="icon32 icon-edit"></i>Edit teacher information</legend>
				
				<div class="control-group">
					<label class="control-label" for="typeahead">Teacher's name </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="name" value="<?php echo $row['name']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="date01">Birthday</label>
					<div class="controls">
						<input type="date" class="span6" name="birthday" value="<?php echo $row['birthday']; ?>">
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
						if(file_exists('uploads/teacher_image/'.$row['teacher_id'].'.jpg'))
							$image_url	=	base_url().'uploads/teacher_image/'.$row['teacher_id'].'.jpg';
						else
							$image_url	=	base_url().'uploads/user.jpg';?>
						<img src="<?php echo $image_url;?>" style="max-width:200px;" class="image_thumbnail"  />							
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Religion </label>
					<div class="controls">
						<input type="text" class="span6 typeahead" name="religion"  value="<?php echo $row['religion']; ?>"
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
						<input type="text" class="span6 typeahead" name="phone" value="<?php echo $row['phone']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Email </label>
					<div class="controls">
						<input type="email" class="span6 typeahead" name="email"  value="<?php echo $row['email']; ?>" />
					</div>
				</div>


				<div class="form-actions">
				<input type="hidden" name="operation" value="edit"  />
					<input type="submit" class="btn btn-primary" value="Edit teacher info" />
				</div>
			</fieldset>
		</form>
	
	<?php endforeach;
	endif;
?>