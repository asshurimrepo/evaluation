<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/students" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Create a new student entry</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Student's name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input type="date" class="span6 " name="birthday" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select id="" name="sex">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Blood group</label>
            <div class="controls">
                <select id="" name="blood_group">
                    <option value="">select</option>
                    <option value="AB+">AB+</option>
                    <option value="AB−">AB−</option>
                    <option value="B+">B+</option>
                    <option value="B−">B−</option>
                    <option value="A+">A+</option>
                    <option value="A−">A−</option>
                    <option value="O+">O+</option>
                    <option value="O−">O−</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Photo </label>
            <div class="controls">
                <input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                <a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
                    Take photo from webcam</a>								
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Religion </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="religion"  placeholder="relegion"
                    data-provide="typeahead" data-items="4" data-source='["Christianity","Islam","Judaism","Buddhism","Hinduism"]'>
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea class="span6 autogrow" name="address"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="phone" placeholder="phone number" value="<?php echo set_value('phone'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input type="email" class="span6 typeahead" name="email" placeholder="email address" value="<?php echo set_value('email'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Father's name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="father_name" placeholder="father's name" value="<?php echo set_value('father_name'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Mother's name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="mother_name" placeholder="mother's name" value="<?php echo set_value('mother_name'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Class </label>
            <div class="controls">
                <select id="" name="class_id">
                    <?php 
                    $classes	=	$this->crud_model->get_classes();
                    foreach($classes as $row):
                    ?>
                    <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Roll </label>
            <div class="controls">
                <input type="number" class="span6 typeahead" name="roll" placeholder="class roll" value="<?php echo set_value('roll'); ?>" />
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Create student" />
            <input type="reset" class="btn" value="reset form" />
        </div>
    </fieldset>
</form>