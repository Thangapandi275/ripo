    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Customers</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Customers</li>
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
                              <button class="btn btn-primary" style="float: right;" type="button" onclick="addpopup()">Add Customer</button>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                              <table class="table table-hover" id="example" >
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Contact</th>
                                       <th>Address</th> 
                                       <th>Remark</th>                                      
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <th>Branch Name</th>
                                       <?php } ?>                                      
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <th>Action</th>
                                       <?php } ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($customers as $customer) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo $customer->customer_name; ?></td>
                                       <td><?php echo $customer->customer_number; ?></td>
                                       <td><?php echo $customer->customer_address; ?></td>
                                       <td><?php echo $customer->customer_remark; ?></td>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <td><?php echo $customer->branch_name; ?></td>
                                       <?php } ?>
                                       
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <td>
                                          <button onclick="editcustomer(<?php echo $customer->customer_id; ?>)"><i class="fa fa-pencil"></i></button>
                                          <button type="button" onclick="funIsdelete('cr_customer','customer_id',<?php echo $customer->customer_id; ?>)" ><i class="fa fa-trash-o"></i></button>
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

               function addpopup(){
                   $('#customeradd').attr('action', '<?php echo base_url('customer/SaveCustomer') ?>');
                   $('#myLargeModalLabel').html('Add Customer');
                          $('#myModal').modal('show');
               }
               function editcustomer(customer){
                 

                  $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("customer/getcustomerbyid/"); ?>'+customer,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);


                       $("input[name='customer_name']").val(result.customer_name);
                       $("input[name='customer_number']").val(result.customer_number);
                       $("textarea[name='customer_address']").val(result.customer_address);
                       $("textarea[name='customer_remark']").val(result.customer_remark);

                        $("input[name='customer_branch_id']").val(result.customer_branch_id);
                       $("select[name='customer_branch_id']").select2("val", result.customer_branch_id);

                        $("select[name='isActive']").select2("val", result.isActive);


                         $('#customeradd').attr('action', '<?php echo base_url('customer/updatecustomer/') ?>'+result.customer_id);
                         $('#myLargeModalLabel').html('Edit Customer');
                          $('#myModal').modal('show');

                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });
               }
            </script>
            <?php include("footer.php"); ?>
         