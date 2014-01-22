<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/teachers" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Create a new teacher</legend>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Teacher's name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="name" placeholder="Name" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input type="date" class="span6" name="birthday" value="02/16/86">
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
                <input class="input-file uniform_on" id="fileInput" name="userfile" type="file" />
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
        <div class="form-actions">
        <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Create teacher" />
            <input type="reset" class="btn" value="reset form" />
        </div>
    </fieldset>
</form>
       