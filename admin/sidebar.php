<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <h3 class="text-center p-0 m-0"><img src="./image/ctulogo.png" alt=""><b>  Admin Panel</b></h3>
    </a>  
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=subject_list" class="nav-link nav-subject_list">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Subjects
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=class_list" class="nav-link nav-class_list">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Classes
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=academic_list" class="nav-link nav-academic_list">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Academic Year
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=questionnaire" class="nav-link nav-questionnaire">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Questionnaires
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=criteria_list" class="nav-link nav-criteria_list">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Evaluation Criteria
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=faculty_list" class="nav-link nav-faculty_list nav-edit_faculty">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Teachers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=student_list" class="nav-link nav-student_list nav-edit_student">
              <i class="nav-icon fa fa-user"></i>
              <p>
                 Students
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=report" class="nav-link nav-report">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Evaluation Report
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=comments" class="nav-link nav-comments">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Comments/Feedbacks
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="./index.php?page=user_list" class="nav-link nav-user_list nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>