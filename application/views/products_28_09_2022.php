    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Products</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Products</li>
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
                              <button class="btn btn-primary" style="float: right;" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Product</button>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                              <table class="table table-hover" id="example" >
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Product Name</th>
                                       <th>Product Code</th>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <th>Branch Name</th>
                                       <?php } ?>
                                       <th>Category</th>
                                       <th>Rent Amount</th>
                                       <th>In Stock</th>
                                       <th>Out Stock</th>
                                       <th>Status</th>
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <th>Action</th>
                                       <?php } ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($products as $product) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo $product->product_name; ?></td>
                                       <td><?php echo $product->product_id; ?></td>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <td><?php echo $product->branch_name; ?></td>
                                       <?php } ?>
                                       <td><?php echo $product->categoryname; ?></td>
                                       <td><?php echo $product->rent_amount; ?></td>
                                       <td><?php echo $product->instock; ?></td>
                                       <td><?php echo $product->outstock; ?></td>
                                       <td><?php echo ($product->isActive == 1)? "Active":"De-Active" ?></td>
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <td>
                                          <button><i class="fa fa-pencil"></i></button>
                                          <button type="button" onclick="funIsdelete('cr_products','id',<?php echo $product->id; ?>)" ><i class="fa fa-trash-o"></i></button>
                                       </td>
                                       <?php } ?>
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



             <div class="modal fade bd-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Product</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             
                             <form class="row" method="post" action="<?php echo base_url(); ?>products/SaveProducts" enctype="multipart/form-data">

<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>
<?php $product_count = $this->db->get('cr_products')->num_rows(); ?>

                              <div class="card-body">
                                 <div class="row">
                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Product ID</label>
                                          <input class="form-control" type="text"   value="ARA<?php echo str_pad($product_count+1, 6, '0', STR_PAD_LEFT); ?>" placeholder="Product ID" readonly>
                                       </div>

                                       <?php if($sessionData['branch'] == 0){   ?>
                                         <?php $getbranchs = $this->common->getbranchs(); ?>

                                         <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Branch</label>
                                          <select class="form-control select2" name="product_branch_id" id="product_branch_id" required>
                                             <?php if(!empty($getbranchs)){ foreach ($getbranchs as $key => $branchs) { ?>
                                                <option value="<?php echo $branchs->branch_id; ?>"> <?php echo $branchs->branch_name; ?></option>
                                           <?php  } } ?>
                                          </select>
                                       </div>
                                        <?php }else{ ?> 
                                          <input type="hidden" name="product_branch_id" id="product_branch_id" value="<?php echo $sessionData['branch']; ?>">
                                        <?php }  ?>

                                       
                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Category</label>
                                          <select class="form-control select2" name="products_category_id" id="products_category_id" required>
                                             <option value="">Select Category</option>
                                          </select>
                                       </div>
                                        <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Product name</label>
                                          <input class="form-control" type="text" name="product_name" placeholder="Product Name" required>
                                       </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Size</label>
                                          <input class="form-control" type="text" name="product_size" placeholder="Product Size">
                                       </div>

                                       

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Color</label>
                                           <input class="form-control" type="text" name="product_color" placeholder="Product Color">
                                       </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Purchase Amount</label>
                                           <input class="form-control" type="number" step="0.01" name="purchase_amount"  placeholder="Product Purchase Amount" required>
                                       </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Rental Amount</label>
                                           <input class="form-control" type="number" name="rent_amount" step="0.01" placeholder="Product Rent Amount" required>
                                       </div>
                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Date of purchase</label>
                                          <input class="form-control" type="date" name="purchase_date"  placeholder="Product Purchase Date" >
                                       </div>

                                      
                                       <div class="col-xl-4 col-sm-6" style="padding:10px">
                                          <label class="col-form-label pt-0">Stock Type</label>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="mb-0">
                                                      <div class="form-check radio radio-primary">
                                                         <input class="form-check-input" value="new" name="stock_type" id="inline-form-1" type="radio">
                                                         <label class="form-check-label" for="inline-form-1">New</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-6">
                                                   <div class="mb-0">
                                                      <div class="form-check radio radio-primary">
                                                         <input class="form-check-input" value="old" name="stock_type" id="inline-form-2" type="radio">
                                                         <label class="form-check-label" for="inline-form-2">Old</label>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">In Stock </label>
                                           <input class="form-control" type="number" name="instock" id="instock" placeholder="In Stock" onblur="calstock()" value="0" required>
                                       </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Out Stock</label>
                                           <input class="form-control" type="number" name="outstock" id="outstock"  placeholder="Out Stock" onblur="calstock()" value="0" required>
                                       </div>

                                       <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Total Stock</label>
                                           <input class="form-control" type="number" name="totstock" id="totstock" step="0.01" placeholder="Total Stock" value="0" readonly>
                                       </div>
                                        <div class="col-xl-4 col-sm-6">
                                          <label class="col-form-label pt-0">Created Date and Time</label>
                                          <input class="form-control" type="text" name="created_date_time"  placeholder="Category Date Time" value="<?php echo date("m/d/Y h:i:s a", time()); ?>" readonly>
                                       </div>
                                       <div class="col-xl-12 col-sm-12">
                                          <label class="col-form-label pt-0">Product Discription</label>
                                          <textarea class="form-control"  name="product_description"></textarea>
                                       </div>

                                 </div>
                              </div>
                              <div class="card-footer text-end">
                                 <input type="hidden" name="product_cr_by" value="<?php echo $sessionData['userId']; ?>">
                                 <input type="hidden" name="isActive" value="1">
                                 <input type="hidden" name="IsDelete" value="0">
                                 <button class="btn btn-primary" return="false" type="submit">Submit</button>
                                 <input class="btn btn-light" type="reset" value="Cancel">
                              </div>
                           </form>
                          </div>
                        </div>
                      </div>
                    </div>



            <script type="text/javascript">
               
                calstock();
                  function calstock(){
                     var instock = $('#instock').val();
                     var outstock = $('#outstock').val();
                     var totstock = parseInt(instock)+parseInt(outstock);
                        $('#totstock').val(parseInt(totstock));
                  }
                $(document).ready(function() { 


                  setTimeout(getCategory, 500);


                  $('#product_branch_id').on('change',function(){
                     getCategory();
                  });
                     
                 function getCategory(){

                  var product_branch_id = $('#product_branch_id').val();
                  //alert(product_branch_id);
                  $.ajax({
            type: "POST",
            datatype : "JSON",
            enctype: 'multipart/form-data',
            url: '<?php echo base_url("products/getcategory/"); ?>'+product_branch_id,           
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
                console.log(response);    
                var result = JSON.parse(response);
                $('#products_category_id').find('option').remove();

                $('#products_category_id').append('<option value="">Select Category</option>');
                $(result).each(function(k,v){
                 
                  $('#products_category_id').append('<option value="'+v.category_id+'">'+v.categoryname+'</option>');
                });
                  
            },
            error: function (e) {
                console.log(e);
            }
        });
                 }

                });
            </script>
            <?php include("footer.php"); ?>
         