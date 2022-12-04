    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Sales</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Sales</li>
                           </ol>
                        </div>
                        <div class="col-sm-6">
                           <!-- Bookmark Start-->
                           <div class="bookmark">
                              <ul>
                                 <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="download"></i></a></li>
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
                     <div class="col-sm-12 col-xl-12">
                        <div class="card-body">
                           <?php if(!empty($this->session->flashdata('success'))) { ?>
                           <div class="alert alert-success inverse alert-dismissible fade show" role="alert">
                              <i class="icon-thumb-up alert-center"></i>
                              <p><b><span style="color:green;">Wow..!</span></b> <?php echo $this->session->flashdata('success'); ?></p>
                              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                           <?php } if(!empty($this->session->flashdata('failed'))) { ?>
                           <div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
                              <i class="icon-thumb-down"></i>
                              <p><b><span style="color:red;">Oops..!</span></b> <?php echo $this->session->flashdata('failed'); ?></p>
                              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-sm-12 col-xl-12">
                        <div class="card">
                           <div class="card-header">
                             <a href="<?php echo base_url('sales/addSales') ?>" class="btn btn-primary">Add Sales</a>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                              <table class="table table-hover" id="example" >
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Sales ID</th>
                                       <th>Sales Box Number</th>
                                       <th>Custmer Name</th>
                                       <th>Custmer Mobile</th>
                                       <th>Custmer Address</th>
                                       <th>No.Of.Days Rent</th>
                                       <th>Rent Start date</th>
                                       <th>Amount</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($sales as $sales) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo "SID".str_pad($sales->sale_id, 6, '0', STR_PAD_LEFT);; ?></td>
                                       <td><?php echo $sales->sales_box; ?></td>
                                       <td><?php echo $sales->customer_name; ?></td>
                                       <td><?php echo $sales->customer_mobile; ?></td>
                                       <td><?php echo $sales->customer_address; ?></td>
                                       <td><?php echo $sales->no_of_days_rent; ?></td>
                                       <td><?php echo $sales->rent_start_date; ?></td>
                                       <td><?php echo $sales->finamt; ?></td>
                                       <td><?php echo $sales->sale_status; ?></td>
                                       <td>

                                          <?php if($sales->sale_status == "Pre Booked" || $sales->sale_status == "ooked"){ ?> 
                                         <a href="<?php echo base_url('sales/editsales/').base64_encode($sales->sale_id) ?>"> <button><i class="fa fa-pencil"></i></button></a>
                                          <?php } ?>
                                       <a href="<?php echo base_url('sales/viewsales/').$sales->sale_id ?>"><button><i class="fa fa-eye"></i></button></a>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid Ends-->
            </div>



            
            <!-- footer start-->
            <?php include("footer.php"); ?>
         