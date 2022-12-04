    <?php  $this->load->view('header'); ?>
       
       <style type="text/css">
          select{
            width: 200px;
          }
       </style>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Sale</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Add Sale</li>
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
                        
                        <form class="row" id="saleform" method="post" action="<?php echo base_url(); ?>sales/SaveSale" enctype="multipart/form-data">
                           <div class="card">
                           <div class="card-header pb-0">
                              <h5>Add New Sale</h5>
                           </div>
<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>
<?php $sale_count = $this->db->get('cr_sales')->num_rows(); ?>

                              <div class="card-body">
                                 <div class="row">
                                       <div class="col-xl-3 col-sm-6">
                                          <label class="col-form-label pt-0">Sale ID</label>
                                          <input class="form-control" type="text"   value="SID<?php echo str_pad($sale_count+1, 6, '0', STR_PAD_LEFT); ?>" placeholder="Product ID" readonly>
                                       </div>

                                       <?php if($sessionData['branch'] == 0){   ?>
                                         <?php $getbranchs = $this->common->getbranchs(); ?>

                                         <div class="col-xl-3 col-sm-6">
                                          <label class="col-form-label pt-0">Branch<sup>*</sup></label>
                                          <select class="form-control select2" name="sale_branch_id" id="product_branch_id" required>
                                             <?php if(!empty($getbranchs)){ foreach ($getbranchs as $key => $branchs) { ?>
                                                <option value="<?php echo $branchs->branch_id; ?>"> <?php echo $branchs->branch_name; ?></option>
                                           <?php  } } ?>
                                          </select>
                                       </div>
                                        <?php }else{ ?> 
                                          <input type="hidden" name="sale_branch_id" id="product_branch_id" value="<?php echo $sessionData['branch']; ?>">
                                        <?php }  ?>

 <?php $customers = $this->common->getcustomers(); ?>                                      
                                      <div class="col-xl-6 col-sm-6">
                                          <label class="col-form-label pt-0">Customer name<sup>*</sup></label>
                                          <select class="form-control select2" name="sales_customer_id" id="sales_customer_id" required>
                                             <option value="">Select Customer </option>
                                             <?php if(!empty($customers)){ foreach ($customers as $key => $customer) { ?>
                                                <option value="<?php echo $customer->customer_id; ?>"> <?php echo $customer->customer_name." - ".$customer->customer_number; ?><?php echo ($customer->customer_remark != "")?" - ".$customer->customer_remark:""; ?></option>
                                           <?php  } } ?>
                                          </select>

                                          <a href="#" style="float: right;padding-top: 10px;border-bottom: 1px solid green;" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Customer</a>
                                          <!-- <button class="btn btn-primary" style="float: right;" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Customer</button> -->
                                       </div>
                                       <div class="col-xl-3 col-sm-6">
                                          <label class="col-form-label pt-0">Rent Start Date<sup>*</sup></label>
                                          <input class="form-control" type="date" name="rent_start_date"  placeholder="Rent Start Date" required>
                                       </div>
                                       <div class="col-xl-3 col-sm-6">
                                          <label class="col-form-label pt-0">No.of.Days Rent<sup>*</sup></label>
                                           <input class="form-control" type="number" step="1" name="no_of_days_rent" id="no_of_days_rent" onchange="allcal()" placeholder="Product Purchase Amount" value="1" required>
                                       </div>
                                        <div class="col-xl-3 col-sm-6">
                                          <label class="col-form-label pt-0">Created Date and Time</label>
                                          <input class="form-control" type="text" name="sales_created_on"  placeholder="Category Date Time" value="<?php echo date("m/d/Y h:i:s a", time()); ?>" readonly>
                                       </div>
                                       <div class="col-xl-12 col-sm-12">
                                          <label class="col-form-label pt-0">Rent Details(if any)</label>
                                          <textarea class="form-control"  name="sales_details"></textarea>
                                       </div>

                                 </div>
                              </div>
                           </div>

                           <div class="card">
                           <div class="card-header pb-0">
                              <h5>Add New Sale</h5>
                           </div>
<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>
<?php $product_count = $this->db->get('cr_products')->num_rows(); ?>
<?php $sessionData = $this->session->userdata();
         $this->db->select('id,product_id,product_branch_id,product_name,purchase_amount,rent_amount,instock,outstock,cr_products.isActive,cr_products.IsDelete,categoryname,branch_name,pro_image')->from('cr_products')->where('cr_products.IsDelete',0)->where('cr_products.IsActive',1);
         if($sessionData['branch'] != 0){
                $this->db->where('cr_products.product_branch_id',$sessionData['branch']);
            } 
            $this->db->join('cr_category','cr_category.category_id = cr_products.products_category_id','left'); 
          $this->db->join('cr_branch','cr_branch.branch_id = cr_products.product_branch_id','left');   
          $this->db->order_by('cr_products.id',"DESC");     
         $products = $this->db->get()->result();

         // $products = $this->common->getActiveproducts() ?>

                              <div class="card-body">
                                 <div class="row">
                                    <!-- <div class="col-xl-3 col-sm-6">
                                    <label class="col-form-label pt-0">Scan / Enter Prodcut Code</label>
                                    <input class="form-control" type="text" name="scanproductcode"  placeholder="Scan / Enter Prodcut Code"   id="scanproductcode" >
                                 </div> -->
                                    <div class="col-xl-12 col-sm-12 table-responsive ">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th width="20%">Product Name - Code</th>                                      
                                             <th width="10%">Qty<sup>*</sup></th>
                                             <th width="20%">Rent Rate</th>
                                             <th width="20%">Discount<sup>*</sup></th>
                                             <th width="20%">Amount</th>
                                             <th width="10%">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody id="AppendSale">
                                          <tr>
                                           
                                                <td style="max-width: 225px;">
                                                   <select  class="select2 sale_item_product_id form-control"  name="sale_item_product_id[]" id="sale_item_product_id_1" onchange="getproductdetails(1)"  required>
                                                      <option value="">Selct Product</option>
                                                      <?php if(!empty($products)){ foreach ($products as $key => $vproduct) { ?>
                                                        <option value="<?php echo $vproduct->id; ?>"><?php echo $vproduct->product_name." - ".$vproduct->product_id; ?></option>
                                                     <?php } } ?>
                                                   </select>                                                
                                                </td>
                                                <td><input type="number" class="form-control sale_item_qty" name="sale_item_qty[]" id="sale_item_qty_1" onblur="allcal()" value="1" step="1" required><span id="sale_item_aqty_1" style="color:red"></span></td>

                                                <td><input type="number" class="form-control sale_item_rent" name="sale_item_rent[]" value="0" id="sale_item_rent_1" readonly></td>

                                                <td><input type="number" class="form-control sale_item_discount" name="sale_item_discount[]" onblur="allcal()" id="sale_item_discount_1" value="0" required></td>
                                               
                                                <td><input type="number" class="form-control sale_item_amt" name="sale_item_amt[]" value="0" id="sale_item_amt_1" readonly></td>

                                                <td><button type="button" onclick="deleteSale(1)"><i class="fa fa-trash"></i></button></td>
                                          </tr>
                                       </tbody>
                                       <tfoot>
                                          <tr>
                                             <td colspan="5"></td>
                                             <td  style="float: right;"><button type="button" class="btn btn-primary" onclick="Addrow()">Add</button></td>
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Total Rent</td>
                                             <td><input class="form-control" type="text" name="totrent"  placeholder="Total Rent"   id="totrent" readonly></td>
                                           
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Product Discount</td>
                                             <td><input class="form-control" type="text" name="totdis"  placeholder="Product Discount"   id="totdis" readonly></td>
                                             
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Per Day Rent</td>
                                             <td><input class="form-control" type="text" name="perdayrent"  placeholder="Per Day Rent"   id="perdayrent" readonly></td>
                                            
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Total Amount X No.of.days</td>
                                             <td><input class="form-control" type="text" name="totamt"  placeholder="Total Amount X No.of.days"   id="totamt" readonly ></td>
                                            
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Discount<sup>*</sup></td>
                                             <td><input class="form-control" type="number" name="discount"  placeholder="Discount" onchange="allcal()"  id="discount" required></td>
                                             
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Total Final Amount</td>
                                             <td><input class="form-control" type="text" name="finamt"  placeholder="Total Final Amount"   id="finamt" readonly>
                                                <input class="form-control" type="hidden" name="rownumber"  id="rownumber" value="1" readonly >
                                             </td>
                                            
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Sales Box Number<sup>*</sup></td>
                                             <td><input class="form-control" type="text" name="sales_box"  placeholder="Sales Box Number"  id="sales_box" required></td>
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Advance Amount<sup>*</sup></td>
                                             <td><input class="form-control" type="number" name="adv_amt"  placeholder="Advance Amount"  step="0.01" id="adv_amt" required></td>
                                          </tr>
                                          <tr>
                                             <td colspan="4"></td>
                                             <td>Deposit Amount<sup>*</sup></td>
                                             <td><input class="form-control" type="number" name="depsoit_amt"  placeholder="Deposit Amount" step="0.01" id="depsoit_amt" required></td>
                                          </tr>
                                       </tfoot>
                                    </table>
                                 </div>
                                 

                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div style="float:right">
                                    <input type="hidden" name="typeofsale" id="typeofsale" value="Save As Draft" >

                                    <input type="hidden" name="sales_created_by" id="sales_created_by" value="<?php echo $sessionData['userId'] ?>" >
                                    <button class="btn btn-info" type="button" id="save_as_draft" name="save_as_draft" >Pre Booking</button>
                                    <button class="btn btn-primary" type="button" id="save" name="typeofsale" value="Booked">Confirm Order</button>   
                                   
                                    <button type="submit" style="display:none;" id="SubmitBTN"></button>
                                 </div>
                                 
                              </div>
                           </div>
                           </form>                       
                     </div>
                  </div>
               </div>
               <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->


  <div class="modal fade bd-example-modal-lg" id="myModal"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Customer</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             
                             <form class="row" id="customeradd" method="post" action="<?php echo base_url(); ?>Customer/SaveCustomer" enctype="multipart/form-data">

<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>

                              <div class="card-body">
                                 <div class="row">
                                    <div class="col">
                                    <?php  if($sessionData['branch'] == 0){ ?>
                                       
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Branch<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                            <select class="form-control select2" name="customer_branch_id" required>
                                             <option value="" >Select Branch</option>
                                                <?php if(!empty($branch)){ foreach ($branch as $key => $v_branch) { ?>
                                                  <option value="<?php echo $v_branch->branch_id ?>"><?php echo $v_branch->branch_name ?></option> 
                                               <?php } } ?>
                                            </select>
                                          </div>
                                       </div>
                                   <br>
                                  <?php }else{?>

                                    <input type="hidden" name="customer_branch_id" value="<?php echo $sessionData['branch']; ?>">
                                   <?php } ?>
                                    
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Name<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="customer_name" id="customer_name" class="form-control" required >
                                          </div>
                                       </div><br>
                                        <div class="row">
                                          <label class="col-sm-3 col-form-label">Contact<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="customer_number" id="customer_number" class="form-control" required >
                                          </div>
                                       </div><br>
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Address</label>
                                          <div class="col-sm-9">
                                             <textarea class="form-control" name="customer_address" id="customer_address"> </textarea>
                                          </div>
                                       </div><br>

                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Remarks</label>
                                          <div class="col-sm-9">
                                             <textarea class="form-control" name="customer_remark" id="customer_remark"> </textarea>
                                          </div>
                                       </div><br>

                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Active / De-Active<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <select class="form-control select2" name="isActive" required> 
                                                <option value="">Select Active / De-Active</option>
                                                <option value="1">Active</option>
                                                <option value="0">De-Active</option>
                                                
                                             </select>
                                          </div>
                                       </div>



                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer text-end">
                                 
                                 <button class="btn btn-primary" return="false" type="submit">Submit</button>
                                 <button class="btn btn-danger" type="button" onclick="cancelModel()">Cancel</button>
                                
                              </div>
                           </form>
                          </div>
                        </div>
                      </div>
                    </div>


            <script type="text/javascript">

               function Addrow(){
                  //var $example = $(".select2").select2();
                  var rno1 = $('#rownumber').val();
                  var rno = parseInt(rno1)+1 ;
                  $('#rownumber').val(rno);
                 
                  $('#AppendSale').append('<tr id="salerow_'+rno+'"><td >'
                                                   +'<select width="100%"  class="select2 sale_item_product_id form-control"  name="sale_item_product_id[]" id="sale_item_product_id_'+rno+'" onchange="getproductdetails('+rno+')"  required ><option value="">Selct Product</option><?php if(!empty($products)){ foreach ($products as $key => $vproduct) { ?>
                                                        <option value="<?php echo $vproduct->id; ?>"><?php echo $vproduct->product_name." - ".$vproduct->product_id; ?></option><?php } } ?></select></td>'
                                               +' <td><input type="number" class="form-control sale_item_qty" name="sale_item_qty[]" id="sale_item_qty_'+rno+'" onblur="allcal()" value="1" step="1" required><span id="sale_item_aqty_'+rno+'" style="color:red"></span></td>'

                                                +'<td><input type="number" class="form-control sale_item_rent" name="sale_item_rent[]" value="0" id="sale_item_rent_'+rno+'" readonly></td>'

                                                +'<td><input type="number" class="form-control sale_item_discount" name="sale_item_discount[]" onblur="allcal()" id="sale_item_discount_'+rno+'" value="0" required></td>'
                                               
                                                +'<td><input type="number" class="form-control sale_item_amt" name="sale_item_amt[]" value="0" id="sale_item_amt_'+rno+'" readonly></td>'

                                                +'<td><button type="button" onclick="deleteSale('+rno+')"><i class="fa fa-trash"></i></button></td>'
                                         +'</tr>');
                 // $(".select2").select2("destroy");
                 // $example.each(function(){
                     $(".select2").select2();
                 // })
               }

               $('#save').on('click',function(){
                  var rownumber = $('#rownumber').val();


                  var values = $("select[name='sale_item_product_id[]']")
              .map(function(){return $(this).val();}).get();


             if(jQuery.inArray("", values) == -1){

             
                  if(rownumber != 0){
                  swal({
                     title: "Are you sure?",
                     text: "Once confirmed, you will not be able to Delete!",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  })
                  .then((willDelete) => {
                     if (willDelete) {
                        $('#typeofsale').val('Booked');
                        $('#SubmitBTN').trigger('click');
                      } else {
                        return false;
                     //swal("Your imaginary file is safe!");
                     }
                  });
                  }else{
                     swal("Please Any Product For Submit !!");
                  }
               }else{
                  swal("Product is Not Filled !!");
               }
               });



               $('#save_as_draft').on('click',function(){
                   var rownumber = $('#rownumber').val();


                    var values = $("select[name='sale_item_product_id[]']")
              .map(function(){return $(this).val();}).get();


             if(jQuery.inArray("", values) == -1){

                  if(rownumber != 0){
                  swal({
                     title: "Are you sure?",
                     text: "Once confirmed, you will not be able to Delete!",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  })
                  .then((willDelete) => {
                     if (willDelete) {
                        $('#typeofsale').val('Pre Booked');
                        $('#SubmitBTN').trigger('click');
                      } else {
                        return false;
                     //swal("Your imaginary file is safe!");
                     }
                  });
                  }else{
                     swal("Please Any Product For Submit !!");
                  }
                  }else{
                  swal("Product is Not Filled !!");
               }
               });

               function getproductdetails(rno){
                  var sale_item_product_id = $('#sale_item_product_id_'+rno).val();

                  var values = $("select[name='sale_item_product_id[]']")
              .map(function(){return $(this).val();}).get();

              const allUnique = !values.some((v, i) => values.indexOf(v) < i);

               if(allUnique){

              
                  
                   $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("products/getproductbyid/"); ?>'+sale_item_product_id,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);
                       var rownumber = $('#rownumber').val();
                        console.log(result.product_name);     

                        $('#sale_item_rent_'+rno).val(result.rent_amount);
                        $('#sale_item_aqty_'+rno).html("Avil Qty :"+result.instock);
                        /*$('#rownumber').val(parseInt(rownumber)+1);
                        $('#scanproductcode').val('');
                        $('#scanproductcode').focus();*/

                        allcal();
                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });}else{
                     swal("Product Already Add In This List !!")
                  .then((value) => {
                     deleteSale(rno);
                          //$('#sale_item_product_id_'+rno).val('').trigger('click');          
                  });
                   }
               }



             $('#scanproductcode').on('change',function(){
                  
              var scanproductcode =  $('#scanproductcode').val();
             // alert(scanproductcode);
              //console.log(scanproductcode.length);
              if(scanproductcode.length == 9){
               //console.log( parseInt(scanproductcode.substring(3, 9)));
               if(scanproductcode.substring(0, 3).toUpperCase() == "ARA"){
                  var productid = parseInt(scanproductcode.substring(3, 9));
                  $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("products/getproductbyid/"); ?>'+productid,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);
                       var rownumber = $('#rownumber').val();
                        console.log(result.product_name);     


                        $('#AppendSale').append('<tr id="salerow_'+rownumber+'" >'+
                           '<td><input class="form-control" type="hidden" name="sale_item_product_code[]"    id="productcode_'+rownumber+'" value="'+result.product_id+'" readonly ><input class="form-control" type="text" name="sale_item_product_id[]"    id="productid_'+rownumber+'" value="'+result.id+'" readonly ></td>'+

                           '<td><input class="form-control" type="text" name="sale_item_product_name[]"    id="productname_'+rownumber+'" value="'+result.product_name+'" readonly ></td>'+


                           '<td><input class="form-control" type="text" name="sale_item_qty[]" onchange="allcal()"   id="productqty_'+rownumber+'" value="1" required  ><span class="text-danger" >Avilable Stock : '+result.instock+' </span><input class="form-control" type="hidden" name="productavilable[]"    id="productavilable_'+rownumber+'" value="'+result.instock+'"  ></td>'+



                           '<td><input class="form-control" type="text" name="sale_item_rent[]"    id="rentrate_'+rownumber+'" value="'+result.rent_amount+'" readonly ></td>'+


                           '<td><input class="form-control" type="text" name="sale_item_discount[]"    id="productdiscount_'+rownumber+'" value="0" onchange="allcal()" required></td>'+

                           '<td><input class="form-control" type="text" name="sale_item_amt[]"    id="productamount_'+rownumber+'" value="'+result.rent_amount+'" readonly ></td>'+


                           '<td><button class="btn btn-danger" onclick="deleteSale('+rownumber+')" type="button">Del</button></td>'+
                           
                           '</tr>');
                        $('#rownumber').val(parseInt(rownumber)+1);
                        $('#scanproductcode').val('');
                        $('#scanproductcode').focus();

                        allcal();
                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });

               }else{
                  swal("Invalid Product Code")
                  .then((value) => {
                                    $('#scanproductcode').val('');
                                 $('#scanproductcode').focus();
                  });
               }
              }else{

               swal("Invalid Product Code")
                  .then((value) => {
                                    $('#scanproductcode').val('');
                                 $('#scanproductcode').focus();
                  });
              }
              

               
             });

             function deleteSale(rownumber){
               $('#salerow_'+rownumber).remove();
               allcal();
             }
             function allcal(){
               var rownumber = $('#rownumber').val();
               var no_of_days_rent = $('#no_of_days_rent').val();
               var totrent = 0;
               var totdis = 0;
               var perdayrent = 0;
               var discount = $('#discount').val();

               if(isNaN(discount)){
                  $('#discount').val(0);
                  discount = 0;
                  
                }

                for( i=0;i<=rownumber;i++){
                  var productqty = $('#sale_item_qty_'+i).val();
                  var rentrate = $('#sale_item_rent_'+i).val();
                  var productdiscount = $('#sale_item_discount_'+i).val();

                  if(productqty == "" || productqty < 1 ){
                  $('#sale_item_qty_'+i).val(1);
                  productqty = 1;
                  
                }


                  if(productdiscount == "" ){
                  $('#sale_item_discount_'+i).val(0);
                  productdiscount = 0;
                  
                }

                  if(productqty != undefined){
                     var productamount = parseFloat(parseFloat(productqty)*parseFloat(rentrate))-parseFloat(productdiscount);
                    var totrent1 = parseFloat(parseFloat(productqty)*parseFloat(rentrate));
                      totrent = parseFloat(totrent) + parseFloat(totrent1);
                      totdis = totdis + parseFloat(productdiscount);
                      perdayrent = parseFloat(perdayrent) + parseFloat(productamount);
                     $('#sale_item_amt_'+i).val(parseFloat(productamount).toFixed(2));
                  }
                  
                }
                console.log(no_of_days_rent);
                console.log(perdayrent);
                console.log(discount);
                if(discount == ""){
                  discount = 0;
                  $('#discount').val(discount);
                }
                if(no_of_days_rent == ""){
                  no_of_days_rent = 1;
                  $('#no_of_days_rent').val(no_of_days_rent);
                }
                $('#totrent').val(parseFloat(totrent).toFixed(2));
                $('#totdis').val(parseFloat(totdis).toFixed(2));
                $('#perdayrent').val(parseFloat(perdayrent).toFixed(2));
                $('#totamt').val(parseFloat(parseFloat(perdayrent)*parseFloat(no_of_days_rent)).toFixed(2));

              var  finamt = parseFloat(parseFloat(parseFloat(perdayrent)*parseFloat(no_of_days_rent))-parseFloat(discount)).toFixed(2)
                $('#finamt').val(finamt);

                if(isNaN(finamt)){
                  $('#save_as_draft').attr('disabled','disabled');
                  $('#save').attr('disabled','disabled');
                }else{
                   $('#save_as_draft').removeAttr('disabled');
                  $('#save').removeAttr('disabled');
                }

             }
            </script>
            <?php include("footer.php"); ?>
         