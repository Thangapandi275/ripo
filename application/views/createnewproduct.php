<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
      <title>viho - Premium Admin Template</title>
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <!-- Font Awesome-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/fontawesome.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/icofont.css">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/themify.css">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/flag-icon.css">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/feather-icon.css">
      <!-- Plugins css start-->
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
      <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/responsive.css">
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
                           <h3>Create Products</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <!-- <li class="breadcrumb-item">Forms</li> -->
                              <!-- <li class="breadcrumb-item">Form Widgets</li> -->
                              <li class="breadcrumb-item active">Create Product</li>
                           </ol>
                        </div>
                        <div class="col-sm-6">
                           <!-- Bookmark Start-->
                           <!-- <div class="bookmark">
                              <ul>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                  <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                      <input type="text" placeholder="Search<?php //echo base_url(); ?>">
                                    </div>
                                  </form>
                                </li>
                              </ul>
                              </div> -->
                           <!-- Bookmark Ends-->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid card">
                  <div class="row">
                     <form method="post" action="<?php echo base_url(); ?>createnewproduct/addproduct" enctype="multipart/form-data">
                        <div class="col-sm-12 col-xl-12">
                           <div class="row">
                              <div class="card-header pb-0">
                                 <h5>Create New Product</h5>
                                 <span>Create new product here with the full informations.</span>
                              </div>
                              <div class="col-sm-6">
                                 <div class="">
                                    <div class="card-body">
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Product ID</label>
                                          <input class="form-control" type="text" name="product_id" aria-describedby="emailHelp" value="ARA2022<?php echo count($products)+1; ?>" placeholder="Product ID" readonly>
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Name</label>
                                          <input class="form-control" type="text" name="product_name" aria-describedby="emailHelp" placeholder="Product Name">
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0" for="exampleInputPassword1">Category</label>
                                          <select class="form-control" name="category">
                                             <option value="1">Option</option>
                                          </select>
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Size</label>
                                          <input class="form-control" type="text" name="product_size" aria-describedby="emailHelp" placeholder="Product Size">
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Date of purchase</label>
                                          <input class="form-control" type="date" name="product_purchase_date" aria-describedby="emailHelp" placeholder="Product Purchase Date">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="">
                                    <div class="card-body">
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Created Date and Time</label>
                                          <input class="form-control" type="text" name="product_created_date_time" aria-describedby="emailHelp"  placeholder="Category Date Time" value="<?php echo date("m/d/Y h:i:s a", time()); ?>" readonly>
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Color</label>
                                          <input class="form-control" type="text" name="product_color" aria-describedby="emailHelp" placeholder="Product Color">
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0" for="exampleInputPassword1">Purchase Amount</label>
                                          <input class="form-control" type="number" name="product_purchase_amount" aria-describedby="emailHelp" placeholder="Product Purchase Amount">
                                       </div>
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Rental Amount</label>
                                          <input class="form-control" type="text" name="product_rent_amount" aria-describedby="emailHelp" placeholder="Product Rent Amount">
                                       </div>
                                       <div class="row mb-0">
                                          <label class="col-sm-12 col-form-label pb-0">Stock Type</label>
                                          <div class="col-sm-9" style="padding:10px">
                                             <div class="row">
                                                <div class="col-sm-3">
                                                   <div class="mb-0">
                                                      <div class="form-check radio radio-primary">
                                                         <input class="form-check-input" value="new" name="stock_type" id="inline-form-1" type="radio">
                                                         <label class="form-check-label" for="inline-form-1">New</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-3">
                                                   <div class="mb-0">
                                                      <div class="form-check radio radio-primary">
                                                         <input class="form-check-input" value="old" name="stock_type" id="inline-form-2" type="radio">
                                                         <label class="form-check-label" for="inline-form-2">Old</label>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
<div class="col-sm-12">
    <div class="card-body">
                                    <div class="mb-3">
                                          <label class="col-form-label pt-0">Product Description</label>

                                          <textarea class="form-control" name="product_description" placeholder="Product Description"></textarea>

                                          <!-- <input class="form-control" type="text" name="product_description" aria-describedby="emailHelp" placeholder="Product Description"> -->
                                       </div>
                                       </div>
                                       </div>

                              <div class="card-footer float-right">
                                 <input type="submit" value="Submit" class="btn btn-primary">
                                 <input type="reset" value="Cancel" class="btn btn-secondary">
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include("footer.php"); ?>
         </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url(); ?>/assets/js/jquery-3.5.1.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url(); ?>/assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url(); ?>/assets/js/sidebar-menu.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/config.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url(); ?>/assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/bootstrap/bootstrap.min.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/theme-customizer/customizer.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
   </body>
</html>