
<!---------------MANAGE EXAM MARKS------------>
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

            <?php if($this->session->flashdata('mark_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('mark_message');?>
                </div>
            <?php endif;?>
            <!-----CUSTOM MESSAGE------>
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/marks/">
                 <fieldset><legend><i class="icon32 icon-arrowrefresh-e"></i>Update exam marks</legend>
                      <div class="center">
                      <table class="table table-striped table-bordered">
                      	<thead>
                            <tr>
                                <th>Select examination</th>
                                <th>Select a class</th>
                                <th>Select a subject</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td>
                                	
                                      <!----SELECT EXAMINATION----->
                                      <select name="exam_id" style="float:left;">
                                          <option value="">Select an exam</option>
                                          <?php 
                                          $exams	=	$this->crud_model->get_exams(); 
                                          foreach($exams as $row): ?>
                                          <option value="<?php echo $row['exam_id'];?>"
                                              <?php if(isset($exam_id) && $exam_id == $row['exam_id'])
                                                      echo 'selected="selected"';?>><?php echo $row['name'];?>
                                          </option>
                                          <?php endforeach;?>
                                      </select>
                                </td>
                            	<td>
                                	
                                      <!------SELECT CLASS---->
                                      <select name="class_id" onchange="show_subjects(this.value)" style="float:left;">
                                          <option value="0">Select a class</option>
                                          <?php 
                                          $classes	=	$this->crud_model->get_classes(); 
                                          foreach($classes as $row): ?>
                                          <option value="<?php echo $row['class_id'];?>"
                                              <?php if(isset($class_id) && $class_id == $row['class_id'])
                                                      echo 'selected="selected"';?>><?php echo $row['name'];?>
                                          </option>
                                          <?php endforeach;?>
                                      </select>
                                </td>
                            	<td>
                                
                                      <!-----SELECT SUBJECT ACCORDING TO SELECTED CLASS--------->
                                      <?php 
                                          $classes	=	$this->crud_model->get_classes(); 
                                          foreach($classes as $row): ?>
                                          
                                          <select name="<?php if($class_id == $row['class_id'])echo 'subject_id';else echo 'temp';?>" 
                                          		id="subject_id_<?php echo $row['class_id'];?>" 
                                          			style="display:<?php if($class_id == $row['class_id'])echo 'block';else echo 'none';?>;">
                                            
                                              <option value="">Select a subject of class <?php echo $row['name'];?></option>
                                              
                                              <?php 
                                              $subjects	=	$this->crud_model->get_subjects_by_class($row['class_id']); 
                                              foreach($subjects as $row2): ?>
                                              <option value="<?php echo $row2['subject_id'];?>"
                                                  <?php if(isset($subject_id) && $subject_id == $row2['subject_id'])
                                                          echo 'selected="selected"';?>><?php echo $row2['name'];?>
                                              </option>
                                              <?php endforeach;?>
                                              
                                              
                                          </select> 
                                      <?php endforeach;?>
                                      
                                      
                                      <select name="temp" id="subject_id_0" 
                                      	style="display:<?php if(isset($subject_id) && $subject_id >0)echo 'none';else echo 'block';?>;">
                                              <option value="">Select a class first</option>
                                      </select> 
                                </td>
                            	<td>
                                	<input type="hidden" name="operation" value="selection" />
                                	<button type="submit" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
                                </td>
                            </tr>
                        </tbody>
                      </table> 
                      
                          
                      </div>
                 </fieldset>
			</form>
        	
            <?php if($exam_id >0 && $class_id >0 && $subject_id >0 ):?>
                <?php 
						////CREATE THE MARK ENTRY ONLY IF NOT EXISTS////
						$students	=	$this->crud_model->get_students($class_id);
						foreach($students as $row):
							$verify_data	=	array(	'exam_id' => $exam_id ,
														'class_id' => $class_id ,
														'subject_id' => $subject_id , 
														'student_id' => $row['student_id']);
							$query = $this->db->get_where('mark' , $verify_data);
							
							if($query->num_rows() < 1)
								$this->db->insert('mark' , $verify_data);
						 endforeach;
				?>
                <table class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Mark obtained(out of 100)</th>
                            <th>Attendance</th>
                            <th>Comment</th>
                            <th>d</th>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php 
						$students	=	$this->crud_model->get_students($class_id);
						foreach($students as $row):
						
							$verify_data	=	array(	'exam_id' => $exam_id ,
														'class_id' => $class_id ,
														'subject_id' => $subject_id , 
														'student_id' => $row['student_id']);
														
							$query = $this->db->get_where('mark' , $verify_data);							 
							$marks	=	$query->result_array();
							foreach($marks as $row2):
							?>
                            <form method="post" action="<?php echo base_url();?>index.php/admin/marks">
							<tr>
								<td>
									<?php echo $row['name'];?>
								</td>
								<td>
									 <input type="number" value="<?php echo $row2['mark_obtained'];?>" name="mark_obtained"  />
												
								</td>
                                <td>
                                	<input type="number" value="<?php echo $row2['attendance'];?>" name="attendance"  />
                                </td>
								<td>
									<textarea name="comment"><?php echo $row2['comment'];?></textarea>
								</td>
                                <td>
                                	<input type="hidden" name="mark_id" value="<?php echo $row2['mark_id'];?>" />
                                    
                                	<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>" />
                                	<input type="hidden" name="class_id" value="<?php echo $class_id;?>" />
                                	<input type="hidden" name="subject_id" value="<?php echo $subject_id;?>" />
                                    
                                	<input type="hidden" name="operation" value="update" />
                                	<button type="submit" class="btn btn-inverse"><i class="icon-edit icon-white"></i> Update</button>
                                </td>
							 </tr>
                             </form>
                         	<?php 
							endforeach;
						 endforeach;
						 ?>
                     </tbody>
                  </table>
            
            <?php endif;?>
        
			
		</div>
	</div>
</div>



<script type="text/javascript">
  function show_subjects(class_id)
  {
      for(i=0;i<=100;i++)
      {

          try
          {
              document.getElementById('subject_id_'+i).style.display = 'none' ;
	  		  document.getElementById('subject_id_'+i).setAttribute("name" , "temp");
          }
          catch(err){}
      }
      document.getElementById('subject_id_'+class_id).style.display = 'block' ;
	  document.getElementById('subject_id_'+class_id).setAttribute("name" , "subject_id");
  }

</script> 