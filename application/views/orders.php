<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="<?php echo base_url(); ?>//assets/images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="<?php echo base_url(); ?>//assets/images/favicon.png" type="image/x-icon">
      <title>viho - Premium Admin Template</title>
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <!-- Font Awesome-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/fontawesome.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/icofont.css">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/themify.css">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/flag-icon.css">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/feather-icon.css">
      <!-- Plugins css start-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/datatables.css">
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/style.css">
      <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>//assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>//assets/css/responsive.css">
   </head>
   <body>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="theme-loader">
            <div class="loader-p"></div>
         </div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper" id="pageWrapper">
         <!-- Page Header Start-->
         <?php echo include('topnav.php'); ?>
         <!-- Page Header Ends                              -->
         <!-- Page Body Start-->
         <div class="page-body-wrapper horizontal-menu">
            <!-- Page Sidebar Start-->
            <?php echo include('sidenav.php'); ?> 
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Orders List</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <!-- <li class="breadcrumb-item">Pages   </li> -->
                              <!-- <li class="breadcrumb-item">Ecommerce</li> -->
                              <li class="breadcrumb-item active">Orders</li>
                           </ol>
                        </div>
                        <div class="col-sm-6">
                           <!-- Bookmark Start-->
                           <div class="bookmark">
                              <ul>
                                 <!-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li> -->
                                 <!-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li> -->
                                 <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="arrow-down"></i> Download &nbsp;&nbsp;&nbsp;</a></li>
                                 <li><a href="<?php echo base_url(); ?>create-new-order" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-circle"></i> Create new orders &nbsp;&nbsp;&nbsp;  </a></li>
                                 <!-- <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                    <form class="form-inline search-form">
                                      <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search<?php //echo base_url(); ?>/">
                                      </div>
                                    </form>
                                    </li> -->
                              </ul>
                           </div>
                           <!-- Bookmark Ends-->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="card-header pb-0">
                              <h5>Orders List</h5>
                           </div>
                           <div class="card-body">
                              <div class="order-history table-responsive">
                                 <table class="table table-bordernone display" id="basic-1">
                                    <thead>
                                       <tr>
                                          <th scope="col">Prdouct name</th>
                                          <th scope="col">Size</th>
                                          <th scope="col">Color</th>
                                          <th scope="col">Product Type</th>
                                          <th scope="col">Purchase Price</th>
                                          <th scope="col">Rent Amount</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       
                                       <tr>
                                          <td>
                                             <div class="product-name">
                                                <a href="#">Lubrics</a>
                                                <div class="order-process"><span class="order-process-circle"></span>1234</div>
                                             </div>
                                          </td>
                                          <td>asdfsdfsdf</td>
                                          <td>asdfsdfsdf</td>
                                          <td>asdfsdfsdf</td>
                                          <td>asdfsdfsdf</td>
                                          <td>asdfsdfsdf</td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php include("footer.php"); ?>
         </div>
      </div>
      <script src="<?php echo base_url(); ?>//assets/js/jquery-3.5.1.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url(); ?>//assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url(); ?>//assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url(); ?>//assets/js/sidebar-menu.js"></script>
      <script src="<?php echo base_url(); ?>//assets/js/config.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url(); ?>//assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>//assets/js/bootstrap/bootstrap.min.js"></script>
      <!-- Plugins JS start-->
      <script src="<?php echo base_url(); ?>//assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>//assets/js/datatable/datatables/datatable.custom.js"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>//assets/js/script.js"></script>
      <script src="<?php echo base_url(); ?>//assets/js/theme-customizer/customizer.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
   </body>
</html> 