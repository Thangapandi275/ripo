    <?php  $this->load->view('header'); ?>
       
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Users</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user-home">Home</a></li>
                              <li class="breadcrumb-item">Users</li>
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
                              <button class="btn btn-primary" style="float: right;" type="button" onclick="addpopup()">Add User</button>
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
                                       <th>Type</th>
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
                                    <?php $i=1; foreach($users as $user) { ?>
                                    <tr>
                                       <th ><?php echo $i++; ?></th>
                                       <td><?php echo $user->fullname; ?></td>
                                       <td><?php echo $user->username; ?></td>
                                       <td><?php echo $user->contact; ?></td>
                                       <td><?php echo $user->usertype; ?></td>
                                       <?php if($sessionData['branch'] == 0){ ?> 
                                       <td><?php echo $user->branch_name; ?></td>
                                       <?php } ?>
                                       <td><?php  if($user->isActive == 1){
                                          echo"Active";
                                       }else{ echo"De-Active"; }?></td>
                                       <?php if($sessionData['userType_id'] == 1){ ?> 
                                       <td>
                                          <?php if($user->user_id != 1){ ?> 
                                          <button onclick="edituser(<?php echo $user->user_id; ?>)" ><i class="fa fa-pencil"></i></button>
                                          <button onclick="funIsdelete('cr_users','user_id',<?php echo $user->user_id; ?>)"> <i class="fa fa-trash-o"></i></button>

                                             <?php } ?>
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



              <div class="modal fade bd-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add User</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             
                             <form class="row" id="useradd" method="post" action="<?php echo base_url(); ?>users/SaveUsers" enctype="multipart/form-data">

<?php $branch = $this->db->where('isActive',1)->get('cr_branch')->result(); ?>

                              <div class="card-body">
                                 <div class="row">
                                    <div class="col">
                                    <?php  if($sessionData['branch'] == 0){ ?>
                                       
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Branch<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                            <select class="form-control select2" name="branch_ref_id" required>
                                             <option value="" >Select Branch</option>
                                                <?php if(!empty($branch)){ foreach ($branch as $key => $v_branch) { ?>
                                                  <option value="<?php echo $v_branch->branch_id ?>"><?php echo $v_branch->branch_name ?></option> 
                                               <?php } } ?>
                                            </select>
                                          </div>
                                       </div>
                                   <br>
                                  <?php }else{?>

                                    <input type="hidden" name="branch_ref_id" value="<?php echo $sessionData['branch']; ?>">
                                   <?php } ?>
                                    
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Name<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="fullname" class="form-control" required >
                                          </div>
                                       </div><br>

                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Email<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="email" name="username" class="form-control" onchange="checkusernameavil()" required >
                                          </div>
                                       </div><br>

                                        <div class="row">
                                          <label class="col-sm-3 col-form-label">Contact<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="text" name="contact" class="form-control" required >
                                          </div>
                                       </div><br>

                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">Password<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <input type="password" name="password" class="form-control" required >
                                          </div>
                                       </div><br>
<?php $usertype = $this->db->where('isActive',1)->get('cr_usertype')->result(); ?>
                                       <div class="row">
                                          <label class="col-sm-3 col-form-label">User Type<sup class="text-danger">*</sup></label>
                                          <div class="col-sm-9">
                                             <select class="form-control select2" name="usertype_ref_id" required> 
                                                <option value="">Select user Type</option>
                                                <?php if(!empty($usertype)){ foreach ($usertype as $key => $user) { ?>
                                                   <option value="<?php echo $user->usertype_id ?>"><?php echo $user->usertype ?></option>
                                               <?php  }} ?>
                                             </select>
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
                                 <button class="btn btn-danger"  type="button" onclick="cancelModel()" >Cancel</button>
                                
                              </div>
                           </form>
                          </div>
                        </div>
                      </div>
                    </div>



                     <script type="text/javascript">


                  function checkusernameavil() {
                  var username = $("input[name='username']").val();

                   $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("users/checkusernameavil"); ?>',           
                     data : {username:username},
                     success: function (response) {
                        console.log(response);
                         if(response != 0){
                            swal("Email Already Exist or May be Deleted This User Previously !!")
                           .then((value) => {
                              $("input[name='username']").val("")        
                           });
                         }   
                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });
                  }
               function addpopup(){
                   $('#useradd').attr('action', '<?php echo base_url('users/SaveUsers') ?>');
                   $('#myLargeModalLabel').html('Add User');
                          $('#myModal').modal('show');
               }
               function edituser(user_id){
                 

                  $.ajax({
                     type: "POST",
                     datatype : "JSON",
                     enctype: 'multipart/form-data',
                     url: '<?php echo base_url("users/getusersbyid/"); ?>'+user_id,           
                     processData: false,
                     contentType: false,
                     cache: false,
                     timeout: 600000,
                     success: function (response) {
                         console.log(response);    
                       var result = JSON.parse(response);


                       $("input[name='username']").val(result.username);
                       $("input[name='password']").val(result.password);
                       $("input[name='fullname']").val(result.fullname);
                       $("input[name='contact']").val(result.contact);

                        $("input[name='branch_ref_id']").val(result.branch_ref_id);
                       $("select[name='branch_ref_id']").select2("val", result.branch_ref_id);

                       $("select[name='usertype_ref_id']").select2("val", result.usertype_ref_id);

                       $("select[name='isActive']").select2("val", result.isActive);


                         $('#useradd').attr('action', '<?php echo base_url('users/updateuser/') ?>'+result.user_id);
                         $('#myLargeModalLabel').html('Edit User');
                          $('#myModal').modal('show');

                     },
                     error: function (e) {
                         console.log(e);
                     }
                 });
               }
            </script>
            <?php include("footer.php"); ?>
         