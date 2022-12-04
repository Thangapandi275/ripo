    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Branch</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Branch</li>
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
                              <button class="btn btn-primary" style="float: right;" type="button" onclick="addpopup()">Add branch</button>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                              <table class="table table-hover" id="example" >
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Contact</th>
                                       <th>Address</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($branchs as $branch) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo $branch->branch_name; ?></td>
                                       <td><?php echo $branch->branch_email; ?></td>
                                       <td><?php echo $branch->branch_mobile; ?></td>
                                       <td><?php echo $branch->branch_address; ?></td>
                                       <td><?php echo ($branch->isActive == 1)? "Active":"De-Active" ?></td>
                                       <td>
                                          <button onclick="editbranch(<?php echo $branch->branch_id; ?>)" ><i class="fa fa-pencil"></i></button>
                                         
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



            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Branch</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             
                             <form id="branchadd" action="<?php echo base_url(); ?>branch/SaveBranch" method="post" class="form theme-form">



                              <div class="card-body">
                                 <div class="row">
                                    <div class="col">
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label"> Name<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="branch_name" class="form-control" required >
                                          </div>
                                       </div><br>


                                       <div class="row">
                                          <label class="col-sm-3 col-form-label"> Email</label>
                                          <div class="col-sm-9">
                                             <input type="text" name="branch_email" class="form-control"  >
                                          </div>
                                       </div><br>


                                       <div class="row">
                                          <label class="col-sm-3 col-form-label"> Contact</label>
                                          <div class="col-sm-9">
                                             <input type="text" name="branch_mobile" class="form-control"  >
                                          </div>
                                       </div><br>

                                       <div class="row">
                                          <label class="col-sm-3 col-form-label"> Address</label>
                                          <div class="col-sm-9">
                                            <textarea class="form-control" name="branch_address"></textarea>
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
                                 <input class="btn btn-light" type="button" onclick="cancelModel()" value="Cancel">
                              </div>
                           </form>
                          </div>
                        </div>
                      </div>
                    </div>
            <!-- footer start-->


            <script type="text/javascript">

               function addpopup(){
                   $('#branchadd').attr('action', '<?php echo base_url('branch/SaveBranch') ?>');
                   $('#myLargeModalLabel').html('Add Branch');
                          $('#myModal').modal('show');
               }
               function editbranch(branch_id){
                 

                  $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("branch/getbranchbyid/"); ?>'+branch_id,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);


                       $("input[name='branch_name']").val(result.branch_name);
                       $("input[name='branch_email']").val(result.branch_email);
                       $("input[name='branch_mobile']").val(result.branch_mobile);
                       $("textarea[name='branch_address']").val(result.branch_address);
                       $("select[name='isActive']").select2("val", result.isActive);

                       
                         $('#branchadd').attr('action', '<?php echo base_url('branch/updatebranch/') ?>'+result.branch_id);
                         $('#myLargeModalLabel').html('Edit Branch');
                          $('#myModal').modal('show');

                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });
               }
            </script>
            <?php include("footer.php"); ?>
         