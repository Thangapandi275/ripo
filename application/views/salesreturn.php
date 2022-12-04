    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Sale Return</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Sale Return</li>
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
                                    <th colspan="5" class="text-center">Return Details</th>
                                 </tr>
                                 <tr>
                                    <th colspan="6" class="text-center"><?php echo $sales->branch_name; ?><br><?php echo $sales->branch_email; ?><br><?php echo $sales->branch_mobile; ?><br><?php echo $sales->branch_address; ?></th>
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
                           <form class="row" method="post" action="<?php echo base_url('sales/ReturnSales/'.$sales->sale_id); ?>" enctype="multipart/form-data">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Product / Code</th>
                                    <th>Rate</th>
                                    <th>QTY</th>
                                    <th>Damage (if Any)</th>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $sn=1; if(!empty($salesitem)){ foreach ($salesitem as $key => $vsalesitem) { ?>
                                   <tr>
                                    <td><?php echo $sn;$sn++; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_product_name." / ".$vsalesitem->sale_item_product_code; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_rent; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_qty; ?></td>
                                    <td><input type="number" name="return_qty[]" id="return_qty_<?php echo $vsalesitem->sale_item_id; ?>" onblur="checkQty(<?php echo $vsalesitem->sale_item_id; ?>)" value="0" class="form-control">

                                    <input type="hidden" name="sale_qty[]" id="sale_qty_<?php echo $vsalesitem->sale_item_id; ?>" value="<?php echo $vsalesitem->sale_item_qty; ?>" class="form-control">

                                    <input type="hidden" name="sale_item_id[]"  value="<?php echo $vsalesitem->sale_item_id; ?>" class="form-control">

                                 </td>
                                    <td><?php echo $vsalesitem->sale_item_discount; ?></td>
                                    <td><?php echo $vsalesitem->sale_item_amt; ?></td>
                                 </tr>
                                <?php } } ?>
                                 
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Total Rent (A)</th>
                                    <th><?php echo $sales->totrent; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Product Discount(B)</th>
                                    <th><?php echo $sales->totdis; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Per Day Rent (C = A-B)</th>
                                    <th><?php echo $sales->perdayrent; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Total Amount X No.of.days (D = C X N) </th>
                                    <th><?php echo $sales->totamt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Discount (E)</th>
                                    <th><?php echo $sales->discount; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Total Final Amount (D-E)</th>
                                    <th><?php echo $sales->finamt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <<th>Advance Amount </th>
                                    <th><?php echo $sales->adv_amt; ?></th>
                                 </tr>
                                 <tr>
                                    <th colspan="5"></th>
                                    <th>Deposit Amount </th>
                                    <th><?php echo $sales->depsoit_amt; ?></th>
                                 </tr>

                                 <tr>
                                    <td colspan="5"></td>
                                    <td>Return Amount<sup>*</sup></td>
                                    <td><input class="form-control" type="number" name="return_amt"  placeholder="Return Amount"  step="0.01" id="return_amt" required></td>
                                 </tr>
                              </tfoot>
                           </table>
                           <?php if ($sales->sale_status == "Booked") { ?>
                              <button class="btn btn-primary mt-5" >Confirm Return</button>
                          <?php } ?>
                              
                              </form>
                        </div>
                     </div>                   
                  </div>
               </div>


       
               <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <script type="text/javascript">
               function checkQty(sale_item_product_id){
                 var newqty =  $('#return_qty_'+sale_item_product_id).val();
                 var oldqty = $('#sale_qty_'+sale_item_product_id).val();
                 if(newqty <= oldqty){
                     return false;
                 }else{
                     swal({
                     title: "Invalid Return Qty !!!",
                     text: "Return Qty More then Sale Qty.",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  })
                  .then((willDelete) => {
                     if (willDelete) {
                        $('#return_qty_'+sale_item_product_id).val(0);
                      } else {
                        return false;
                     //swal("Your imaginary file is safe!");
                     }
                  });
                 }
               }


              
            </script>
            <?php include("footer.php"); ?>
         