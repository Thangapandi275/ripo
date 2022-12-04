<header class="main-nav">
   <div class="sidebar-user text-center">
      <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="<?php echo base_url() ?>/assets/images/dashboard/1.png" alt="">
      <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
      <a href="<?php echo base_url(); ?>comming">
         <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
      </a>
      <p class="mb-0 font-roboto">Human Resources Department</p>
   </div>
   <nav>
      <div class="main-navbar">
         <!-- <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div> -->
         <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
               <li class="back-btn">
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
               </li>
               <li class="sidebar-main-title">
                  <div>
                     <h6>General</h6>
                  </div>
               </li>
               <li class="dropdown"><a class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
               </li>
               <li class="dropdown">
                  <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Orders</span></a>
                  <ul class="nav-submenu menu-content">
                     <li><a href="<?php echo base_url(); ?>comming">Orders</a></li>
                     <li><a href="<?php echo base_url(); ?>comming">Pre Booking</a></li>
                  </ul>
               </li>
               <!--
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Page layout</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="box-layout.html">Boxed</a></li>
                      <li><a href="layout-rtl.html">RTL</a></li>
                      <li><a href="layout-dark.html">Dark</a></li>
                      <li><a href="footer-light.html">Footer Light</a></li>
                      <li><a href="footer-dark.html">Footer Dark</a></li>
                      <li><a href="footer-fixed.html">Footer Fixed</a></li>
                    </ul>
                  </li> -->
               <li class="sidebar-main-title">
                  <div>
                     <h6>Settings</h6>
                  </div>
               </li>
               <li class="dropdown"><a class="nav-link" href="<?php echo base_url(); ?>category"><i data-feather="folder-plus"></i><span>Category</span></a></li>
               <li class="dropdown"><a class="nav-link" href="<?php echo base_url(); ?>products"><i data-feather="edit-3"></i><span>Products</span></a></li>
               <!-- <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="cloud-drizzle"></i><span>Animation</span></a>
                  </li> -->
               <!-- <li class="dropdown"><a class="nav-link" href="<?php //echo base_url(); ?>comming"><i data-feather="command"></i><span>View All Products</span></a></li> -->
<?php if( 1 == 2) { ?>
               <li class="dropdown"><a class="nav-link" href="<?php echo base_url(); ?>comming"><i data-feather="user"></i><span>Create New User</span></a></li>
               <li class="dropdown"><a class="nav-link" href="<?php echo base_url(); ?>comming"><i data-feather="package"></i><span>Create Branch</span></a></li>
               <li class="dropdown">
                  <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bar-chart"></i><span>Others</span></a>
                  <ul class="nav-submenu menu-content">
                     <li><a href="<?php echo base_url(); ?>comming">Company Name</a></li>
                     <li><a href="<?php echo base_url(); ?>comming">Company Location</a></li>
                     <li><a href="<?php echo base_url(); ?>comming">Company Mail Address</a></li>
                  </ul>
               </li>
<?php } ?>
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
   </nav>
</header>