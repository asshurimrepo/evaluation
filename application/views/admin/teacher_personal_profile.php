	<?php 
	if(isset($personal_profile) == true):
	$teacher_info	=	$this->crud_model->get_teacher_info($current_teacher_id);
	foreach($teacher_info as $row):?>
	
    <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
			<fieldset>
				<legend><i class="icon32 icon-user"></i>Teacher's Personal Profile </legend>
                
                	
				    <center>
                    <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
                    <table class="table table-striped " style="width:500px;">

                        <?php if($row['name'] != ''):?>
                        <tr>
                            <td width="150">Name</td>
                            <td><b><?php echo $row['name'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['birthday'] != ''):?>
                        <tr>
                            <td>Birthday</td>
                            <td><b><?php echo $row['birthday'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['sex'] != ''):?>
                        <tr>
                            <td>Sex</td>
                            <td><b><?php echo $row['sex'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['blood_group'] != ''):?>
                        <tr>
                            <td>Blood group</td>
                            <td><b><?php echo $row['blood_group'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['religion'] != ''):?>
                        <tr>
                            <td>Relegion</td>
                            <td><b><?php echo $row['religion'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['address'] != ''):?>
                        <tr>
                            <td>Address</td>
                            <td><b><?php echo $row['address'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['phone'] != ''):?>
                        <tr>
                            <td>Phone</td>
                            <td><b><?php echo $row['phone'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['email'] != ''):?>
                        <tr>
                            <td>Email</td>
                            <td><b><?php echo $row['email'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                    </table>
                    </center>
                    
			</fieldset>
		</form>
</div>	
	<?php endforeach;
endif;
?>
