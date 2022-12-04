    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Categories</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Categories</li>
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
                     <div class="col-sm-12 col-xl-5">
                        <div class="card">
                           <div class="card-header pb-0">
                              <h5 id="categoryLable">Add new category</h5>
                           </div>
                           <form class="row" method="post" action="<?php echo base_url(); ?>category/SaveCategory" enctype="multipart/form-data" id="categoryadd" >

<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>

                              <div class="card-body">
                                 <div class="row">
                                    <div class="col">
                                    <?php  if($sessionData['branch'] == 0){ ?>
                                       
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Branch<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                            <select class="form-control select2" name="category_branch_id" required>
                                             <option value="" >Select Branch</option>
                                                <?php if(!empty($branch)){ foreach ($branch as $key => $v_branch) { ?>
                                                  <option value="<?php echo $v_branch->branch_id ?>"><?php echo $v_branch->branch_name ?></option> 
                                               <?php } } ?>
                                            </select>
                                          </div>
                                       </div>
                                   <br>
                                  <?php }else{?>

                                    <input type="hidden" name="category_branch_id" value="<?php echo $sessionData['branch']; ?>">
                                   <?php } ?>
                                    
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Category Name<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="categoryname" class="form-control" required >
                                          </div>
                                       </div>
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
                                 <input type="hidden" name="userid" value="<?php echo $sessionData['userId']; ?>">
                                 
                                 <input type="hidden" name="IsDelete" value="0">
                                 <button class="btn btn-primary" return="false" type="submit">Submit</button>
                                 <input class="btn btn-light" type="reset" value="Cancel">
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-sm-12 col-xl-7">
                        <div class="card">
                           <div class="card-header">
                              <h5>Categories</h5>
                              <span>Existing categories activate / deactivate here.</span>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                              <table class="table table-hover" id="example" >
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Category Name</th>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <th>Branch Name</th>
                                       <?php } ?>
                                       <th>Status</th>
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <th>Action</th>
                                       <?php } ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($categorys as $category) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo $category->categoryname; ?></td>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <td><?php echo $category->branch_name; ?></td>
                                       <?php } ?>
                                       <td><?php echo  ($category->isActive == 1)? "Active":"De-Active" ?></td>
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <td>
                                          <button onclick="editCategory(<?php echo $category->category_id; ?>)"><i class="fa fa-pencil"></i></button>
                                          <button type="button" onclick="funIsdelete('cr_category','category_id',<?php echo $category->category_id; ?>)" ><i class="fa fa-trash-o"></i></button>
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

            <script type="text/javascript">

               
               function editCategory(branch_id){
                 

                  $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("category/getcategorybyid/"); ?>'+branch_id,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);


                       $("input[name='category_branch_id']").val(result.category_branch_id);
                       $("select[name='category_branch_id']").select2("val", result.category_branch_id);
                       $("select[name='isActive']").select2("val", result.isActive);



                       $("input[name='categoryname']").val(result.categoryname);
                         $('#categoryadd').attr('action', '<?php echo base_url('category/updatecategory/') ?>'+result.category_id);
                         $('#categoryLable').html('Edit Category');
                          //$('#myModal').modal('show');

                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });
               }
            </script>
            <?php include("footer.php"); ?>
         