<form class="form-horizontal" method="post" 
        action="<?php echo base_url();?>index.php/admin/browse_student_by_class">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Student list
                <select id="classes" style="margin:20px;" name="class_id">
                    <option value="0">Select a class</option>
                    <?php 
                        $classes	=	$this->crud_model->get_classes(); 
                        foreach($classes as $row): ?>
                    <option value="<?php echo $row['class_id'];?>"
                        <?php if(isset($current_class_id) && $current_class_id==$row['class_id'])
                                echo 'selected="selected"';?> >
                            Class <?php echo $row['name'];?>
                    
                    	(<?php echo $this->db->get_where('student',array('class_id'=>$row['class_id']))->num_rows();?> student)
                    </option>
                    <?php endforeach;?>
                </select>
                
                <button type="submit" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
            </legend>
            <div class="center">
            
            </div>
        </fieldset>
    </form>
<?php if(!isset($students)):?>
    <div class="alert alert-info" style="margin:50px;">Select a class to browse it's students</div>
<?php endif;?>
<?php 
    if(isset($students)):
?>
<button  class="pull-right btn  btn-info" onclick="printDiv('DataTables_Table_0_wrapper')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
      <tr>
          <th>ID</th>
          <th width="80">Photo</th>
          <th>Name</th>
          <th>Roll</th>
          <th width="400"></th>
      </tr>
  </thead>   
  <tbody>
    <?php 
        foreach($students as $row): ?>
    <tr>
        <td><?php echo $row['student_id'];?></td>
        <td>
            <?php 
                if(file_exists('uploads/student_image/'.$row['student_id'].'.jpg'))
                    $image_url	=	base_url().'uploads/student_image/'.$row['student_id'].'.jpg';
                else
                    $image_url	=	base_url().'uploads/user.jpg';?>
            <img src="<?php echo $image_url;?>" class="image_thumbnail" />
        </td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['roll'];?></td>
        <td>
        	<a class="btn btn-success" 
            	href="<?php echo base_url();?>index.php/admin/students/<?php echo $current_class_id.'/personal_profile/'.$row['student_id'];?>">
                <i class="icon-user icon-white"></i>  
                View Profile                                         
            </a>
        	<a class="btn btn-success" 
            	href="<?php echo base_url();?>index.php/admin/students/<?php echo $current_class_id.'/academic_result/'.$row['student_id'];?>">
                <i class="icon-book icon-white"></i>  
                Academic Result                                         
            </a>
            <a class="btn btn-info" 
                href="<?php echo base_url();?>index.php/admin/students/<?php echo $current_class_id.'/edit/'.$row['student_id'];?>">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            <a class="btn btn-danger" onclick="return confirm('delete ?')"
                href="<?php echo base_url();?>index.php/admin/students/<?php echo $current_class_id.'/delete/'.$row['student_id'];?>">
                    <i class="icon-trash icon-white"></i> 
                        Delete
                            </a>

        </td>
    </tr>
    <?php 
        endforeach;
    ?>
   </tbody>
   </table>
   <?php 
        endif;
    ?>
