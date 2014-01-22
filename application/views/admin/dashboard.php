<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<form class="form-horizontal" method="post" action="">
                        <fieldset>
                            <legend><i class="icon32 icon-clipboard"></i>Dashboard</legend>
                        </fieldset>
                        
                        <center>
                        	<h2>Welcome <?php echo $this->session->userdata('name');?></h2>
                        	<?php echo date("D, d M, Y");?>
                        </center>
                    

			</form>
        </div>
        <div class="box-content">

            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/students">
                <span class="icon32 icon-color icon-users"></span>
                <div>Manage Students</div>
                <div>(total <?php echo $this->db->get('student')->num_rows();?>)</div>
            </a>
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/teachers">
                <span class="icon32 icon-color icon-user"></span>
                <div>Manage Teachers</div>
                <div>(total <?php echo $this->db->get('teacher')->num_rows();?>)</div>
            </a>
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/marks">
                <span class="icon32 icon-color icon-compose"></span>
                <div>Exam marks/attendance</div>
                <div>&nbsp;</div>
            </a>
        </div>
        <div class="box-content">
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/subjects">
                <span class="icon32 icon-color icon-book"></span>
                <div>Subjects</div>
                <div>&nbsp;</div>
            </a>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/backup_restore">
                <span class="icon32 icon-color icon-archive"></span>
                <div>System backup/restore</div>
                <div>&nbsp;</div>
            </a>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/settings">
                <span class="icon32 icon-color icon-wrench"></span>
                <div>System settings</div>
                <div>&nbsp;</div>
            </a>
            
        </div>
    </div>
</div>
