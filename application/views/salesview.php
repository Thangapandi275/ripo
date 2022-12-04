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
                     <div class="card" id="printarea">
                        <div class="card-body">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th rowspan="2" class="text-center"><img src="<?php echo base_url('assets/images/logo/logo-1.png') ?>"></th>
                                    <th colspan="5" class="text-center">Rent Details</th>
                                 </tr>
                                 <tr>
                                    <th colspan="5" class="text-center"><?php echo $sales->branch_name; ?><br><?php echo $sales->branch_email; ?><br><?php echo $sales->branch_mobile; ?><br><?php echo $sales->branch_address; ?></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Sale.ID</td>
                                    <td>SID<?php echo str_pad($sales->sale_id, 6, '0', STR_PAD_LEFT); ?></td>
                                    <td>Sale.Box.No</td>
                                    <td><?php echo $sales->sales_box; ?></td>
                                    <td>Sale.Date</td>
                                    <td><?php echo $sales->sales_created_on; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Customer Name</td>
                                    <td><?php echo $sales->customer_name; ?></td>
                                    <td>Customer Number</td>
                                    <td><?php echo $sales->customer_mobile; ?></td>
                                    <td>Customer Address</td>
                                    <td><?php echo $sales->customer_address; ?></td>
                                 </tr>
                                 <tr>
                                    <td>No.Of.Days Rent (N)</td>
                                    <td><?php echo $sales->no_of_days_rent; ?></td>
                                    <td>Rent Start Date</td>
                                    <td><?php echo $sales->rent_start_date; ?></td>
                                    <td>Status</td>
                                    <td><?php echo $sales->sale_status; ?></td>
                                 </tr>
                              </tbody>
                           </table>
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Product / Code</th>
                                    <th>Rate</th>
                                    <th>QTY</th>
                                    <?php if($sales->sale_status == "Returned"){ ?> 
                                    <th>Damage QTY</th>
                                    <th>Return Date</th>
                                    <?php } ?>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $sn=1; if(!empty($salesitem)){ foreach ($salesitem as $key => $vsalesitem) { ?>
                                   <tr>
                                    <td><?php echo $sn;$sn++; ?></td>
                                    <td><img src="<?php if($vsalesitem->sale_item_product_image != ""){ echo base_url($vsalesitem->sale_item_product_image);}else{ echo base_url("uploads/noimage.png"); } ?>" width="50px" class="img-thumbnail"  >  <?php echo $vsalesitem->sale_item_product_name." / ".$vsalesitem->sale_item_product_code; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_rent; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_qty; ?></td>
                                    <?php if($sales->sale_status == "Returned"){ ?> 
                                    <td><?php echo $vsalesitem->sale_item_damage; ?></td>
                                    <td><?php echo $vsalesitem->returnDate; ?></td>
                                     <?php } ?>

                                    <td><?php echo $vsalesitem->sale_item_discount; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_amt; ?></td>
                                 </tr>
                                <?php } } ?>
                                 
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Total Rent (A)</th>
                                    <th><?php echo $sales->totrent; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Product Discount(B)</th>
                                    <th><?php echo $sales->totdis; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Per Day Rent (C = A-B)</th>
                                    <th><?php echo $sales->perdayrent; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Total Amount X No.of.days (D = C X N) </th>
                                    <th><?php echo $sales->totamt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Discount (E)</th>
                                    <th><?php echo $sales->discount; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Total Final Amount (D-E)</th>
                                    <th><?php echo $sales->finamt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Advance Amount </th>
                                    <th><?php echo $sales->adv_amt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Deposit Amount </th>
                                    <th><?php echo $sales->depsoit_amt; ?></th>
                                 </tr>

                                 <?php if($sales->sale_status == "Returned"){ ?>
                                 <tr>
                                    <th colspan="<?php echo ($sales->sale_status == "Returned")?6:4; ?>"></th>
                                    <th>Return Amount </th>
                                    <th><?php echo $sales->return_amt; ?></th>
                                 </tr>
                              <?php } ?>
                              </tfoot>
                           </table>
                           
                        </div>
                     </div>  
                     <div class="col-xl-12 col-sm-12 text-center"><button class="btn btn-primary" type="
                              " id="printbtn">Print</button> 
<?php if ($sales->sale_status == "Booked") { ?>
                              <a class="btn btn-info" href="<?php echo base_url('sales/salesReturn/'.$sales->sale_id) ?>">Return</a>
<?php } ?>
<?php if ($sales->sale_status == "Pre Booked") { ?>
                             <button class="btn btn-info" type="button" onclick="salesConfirm(<?php echo $sales->sale_id ?>)">Confirm Booking</button>
<?php } ?>
<?php if ($sales->sale_status != "Booked" && $sales->sale_status == "Pre Booked" &&  $sales->sale_status != "Cancelled") { ?>
                              <button class="btn btn-danger" type="button" onclick="CancelSales(<?php echo $sales->sale_id ?>)">Cancel Booking</button>
<?php } ?>

                           </div>                   
                  </div>
               </div>
               <!-- Container-fluid Ends-->
            </div>


            <script type="text/javascript">
               $('#printbtn').on('click',function(){
                  var printContents = document.getElementById("printarea").innerHTML;
                   var originalContents = document.body.innerHTML;
                   document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
                   window.print();
                   document.body.innerHTML = originalContents;
               });
            </script>


            <script type="text/javascript">
               function CancelSales(sales_id){
                 // var sale_item_product_id = $('#sale_item_product_id_'+rno).val();


                 swal({
                     title: "Are you sure?",
                     text: "Once confirmed, you will not be able to Delete!",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  })
                  .then((willDelete) => {
                     if (willDelete) {
                        $.ajax({
                           type: "POST",
                           datatype : "JSON",
                           enctype: 'multipart/form-data',
                           url: '<?php echo base_url("sales/CancelSales/"); ?>'+sales_id,           
                           processData: false,
                           contentType: false,
                           cache: false,
                           timeout: 600000,
                           success: function (response) {
                             swal(response)
                              .then((value) => {
                                // $('form').trigger("reset");
                                 location.reload()
                                              
                              });
                           },
                           error: function (e) {
                               console.log(e);
                           }
                       });
                      } else {
                        return false;
                     //swal("Your imaginary file is safe!");
                     }
                  });
                   
               }

                function salesConfirm(sales_id){
                 // var sale_item_product_id = $('#sale_item_product_id_'+rno).val();


                 swal({
                     title: "Are you sure?",
                     text: "Once confirmed, you will not be able to Delete!",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  })
                  .then((willDelete) => {
                     if (willDelete) {
                        $.ajax({
                           type: "POST",
                           datatype : "JSON",
                           enctype: 'multipart/form-data',
                           url: '<?php echo base_url("sales/salesConfirm/"); ?>'+sales_id,           
                           processData: false,
                           contentType: false,
                           cache: false,
                           timeout: 600000,
                           success: function (response) {
                             swal(response)
                              .then((value) => {
                                // $('form').trigger("reset");
                                 location.reload()
                                              
                              });
                           },
                           error: function (e) {
                               console.log(e);
                           }
                       });
                      } else {
                        return false;
                     //swal("Your imaginary file is safe!");
                     }
                  });
                   
               }
            </script>
            
            <!-- footer start-->
            <?php include("footer.php"); ?>
         