	<?php 
	if(isset($academic_result) == true):
	$student_info	=	$this->crud_model->get_student_info($current_student_id);
	foreach($student_info as $row1):	
	
	?>
	
    <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
			<fieldset>
				<legend><i class="icon32 icon-user"></i>Student's Academic Result </legend>
                
                	
				    <center>
                    <img src="<?php echo $this->crud_model->get_image_url('student' , $row1['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
                    <div style="font-size:25px;"><?php echo $row1['name'];?></div>
                    
                    <div class="accordion" id="accordion2">
                    
                    	<?php 
						/////SEMESTER WISE RESULT, RESULTSHEET FOR EACH SEMESTER SEPERATELY
						$exams	=	$this->crud_model->get_exams();
						foreach($exams as $row0):
												
						$total_grade_point	=	0;
						$total_marks		=	0;
						$total_subjects		=	0;
						?>
                        <div class="accordion-group">
                          <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row0['exam_id'];?>">
                              <?php echo $row0['name'];?>
                            </a>
                          </div>
                          <div id="collapse<?php echo $row0['exam_id'];?>" class="accordion-body collapse" style="height: 0px;">
                            <div class="accordion-inner">
                            <center>
                              <table class="table table-striped " >
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Obtained marks</th>
                                            <th>Highest mark</th>
                                            <th>Grade</th>
                                            <th>Attendance</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $subjects	=	$this->crud_model->get_subjects_by_class($row1['class_id']);
                                        foreach($subjects as $row2):
										$total_subjects++;
										?>
                                        <tr>
                                            <td><?php echo $row2['name'];?></td>
                                            <td>
                                                <?php
                                                //obtained marks
                                                $verify_data	=	array(	'exam_id' => $row0['exam_id'] ,
                                                                    'class_id' => $row1['class_id'] ,
                                                                    'subject_id' => $row2['subject_id'] , 
                                                                    'student_id' => $row1['student_id']);
                                                                    
                                                $query = $this->db->get_where('mark' , $verify_data);							 
                                                $marks	=	$query->result_array();
                                                foreach($marks as $row3):
													echo $row3['mark_obtained'];
													$total_marks	+=	$row3['mark_obtained'];
												endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                //highest marks
                                                $verify_data	=	array(	'exam_id' => $row0['exam_id'] ,
                                                                    'subject_id' => $row2['subject_id']);
                                                $this->db->select_max('mark_obtained' , 'mark_highest');
                                                $query = $this->db->get_where('mark' , $verify_data);							 
                                                $marks	=	$query->result_array();
                                                foreach($marks as $row4):echo $row4['mark_highest'];endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
												$grade	=	$this->crud_model->get_grade($row3['mark_obtained']);
												echo $grade['name'];
												$total_grade_point	+=	$grade['grade_point'];
												?>
                                            </td>
                                            <td>
                                                <?php echo $row3['attendance'];?>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <hr />
                                Total Marks : <?php	echo $total_marks;?>
                                <hr />
                                GPA(grade point average) : <?php echo round($total_grade_point/$total_subjects , 2);?>
                                </center>
                            </div>
                          </div>
                        </div>
                        <?php endforeach;?>
                      </div>
              
                    
                        
                    </center>
                    
			</fieldset>
		</form>
</div>	
	<?php endforeach;
endif;
?>
