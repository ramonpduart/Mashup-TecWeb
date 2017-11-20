   
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <?php
                    if(isset($user_profile['picture'])){
                        $img = $user_profile['picture'];
                    }else{
                        $img = base_url('/assets/img/user.png');
                    }
                  
                  ?>
              	  <p class="centered"><img src="<?php echo $img ?>" class="img-circle" width="60"></p>
              	  <h5 class="centered"><?php echo @$user_profile['name'];?></h5>
                  <li class="mt">
                      <a class="active" href="">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->