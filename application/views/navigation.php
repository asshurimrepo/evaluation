<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="nav-header hidden-tablet" style="padding:20px;"><h4>Navigation</h4></li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/dashboard"  class="ajax-link" 
                            	data-rel="popover" data-content="Admin Dashboard">
                                	<i class="icon-home"></i>
                                		<span class="hidden-tablet">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/students"  class="ajax-link" 
                            	data-rel="popover" data-content="Watch/create/edit/print the student list classwise, personal detail and academic result">
                                	<i class="icon-th"></i>
                                		<span class="hidden-tablet">Manage students</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/teachers"  class="ajax-link"
                            	data-rel="popover" data-content="Watch/create/edit/print the teacher list, personal detail">
                                	<i class="icon-user"></i>
                                		<span class="hidden-tablet">Manage teachers</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/subjects"  class="ajax-link"
                            	data-rel="popover" data-content="Watch/create/edit subjects. Subjects are different with respect to class">
                                	<i class="icon-book"></i>
                                		<span class="hidden-tablet">Manage subjects</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/classes"  class="ajax-link"
                            	data-rel="popover" data-content="Watch/create/edit class list of the institution">
                                	<i class="icon-list"></i>
                                		<span class="hidden-tablet">Manage Classes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/exams"  class="ajax-link"
                            	data-rel="popover" data-content="Create/edit exams semester">
                                	<i class="icon-edit"></i>
                                		<span class="hidden-tablet">Manage Exams</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/marks"  class=""
                            	data-rel="popover" data-content="Give marks, attendance, comment on students">
                                	<i class="icon-file"></i>
                                		<span class="hidden-tablet">Marks-attendance</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/grades"  class="ajax-link"
                            	data-rel="popover" data-content="Manage exam grades">
                                	<i class="icon-th-list"></i>
                                		<span class="hidden-tablet">Exam-grades</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/backup_restore"  class="ajax-link"
                            	data-rel="popover" data-content="Create/restore data backup">
                                	<i class="icon-download-alt"></i>
                                		<span class="hidden-tablet">Backup-Restore</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/settings"  class="ajax-link"
                            	data-rel="popover" data-content="Institute settings">
                                	<i class="icon-wrench"></i>
                                		<span class="hidden-tablet">Settings</span>
                            </a>
                        </li>
                    </ul>
                	<label id="for-is-ajax" style="visibility:visible;" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox" checked="checked"> Ajax on menu</label>
                </div><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->