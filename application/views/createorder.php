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

      <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

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
                           <h3>Create Orders</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item active">Create Orders</li>
                           </ol>
                        </div>
                        <div class="col-sm-6">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid card">
                  <div class="row">
                     <form method="post" action="<?php echo base_url(); ?>createorder/createneworder" enctype="multipart/form-data">
                        <div class="col-sm-12 col-xl-12">
                           <div class="row">
                              <div class="card-header pb-0">
                                 <h5>Create New Oredrs</h5>
                                 <span>Create new your new order here to track as easyer.</span>
                              </div>
                              <div class="col-sm-6"></div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">
                                 <div class="">
                                    <div class="card-body">
                                       <div class="mb-3">
                                          <label class="col-form-label pt-0">Box Number</label>
                                          <input class="form-control" type="text" name="box_number" placeholder="Number">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="">
                                    <div class="card-body">
                                       <div class="table-responsive">
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                   <th scope="col">Select Product</th>
                                                   <th scope="col">Rent amount</th>
                                                   <th scope="col">Count</th>
                                                   <th scope="col">Product Image</th>
                                                   <th scope="col">Total</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td>
                                                      <input class="form-control" type="text" name="name[]" aria-describedby="emailHelp" placeholder="Name">
                                                   </td>
                                                   <td>
                                                      <input class="form-control" type="text" name="data['1']" aria-describedby="emailHelp" placeholder="Email">
                                                   </td>
                                                   <td>
                                                      <input class="form-control" type="text" name="data['1']" aria-describedby="emailHelp" placeholder="Phone">
                                                   </td>
                                                   <td>
                                                      <input class="form-control" type="text" name="data['1']" aria-describedby="emailHelp" placeholder="Pass">
                                                   </td>
                                                   <td>
                                                      <input class="form-control" type="text" name="data['1']" aria-describedby="emailHelp" placeholder="C-Pass">
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <div class="col-sm-12">
                                    <!-- <div class="mb-3"> -->
                                       <label class="col-form-label pt-0 add-row">Add New</label>
                                 <!-- </div> -->
                              </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="card-body">
                                    <div class="mb-3">
                                       <label class="col-form-label pt-0">Order Notes</label>
                                       <textarea class="form-control" name="order_notes" placeholder="Order notes"></textarea>
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
      <script>
         $(document).ready(function(){
            var i = 2;
            $(".add-row").click(function(){
                var markup = '<tr> <td> <input class="form-control" type="text" name="name[]" aria-describedby="emailHelp" placeholder="Name"> </td> <td> <input class="form-control" type="text" name="email[]" aria-describedby="emailHelp" placeholder="Email"> </td> <td> <input class="form-control" type="text" name="phone[]" aria-describedby="emailHelp" placeholder="Phone"> </td> <td> <input class="form-control" type="text" name="pass[]" aria-describedby="emailHelp" placeholder="Pass"> </td> <td> <input class="form-control" type="text" name="cpass[]" aria-describedby="emailHelp" placeholder="C-Pass"> </td> </tr>';
                $("table tbody").append(markup);
                i++;
            });
           /*
           $(".delete-row").click(function(){
               $("table tbody").find('input[name="record"]').each(function(){
               	if($(this).is(":checked")){
                       $(this).parents("tr").remove();
                   }
               });
           });
		      */
         });    
</script>
   </body>
</html>