    <?php  $this->load->view('header'); ?>
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3>Product List</h3>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                              <!-- <li class="breadcrumb-item">Pages   </li> -->
                              <!-- <li class="breadcrumb-item">Ecommerce</li> -->
                              <li class="breadcrumb-item active">Products</li>
                           </ol>
                        </div>
                        <div class="col-sm-6">
                           <!-- Bookmark Start-->
                           <div class="bookmark">
                              <ul>
                                 <!-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li> -->
                                 <!-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li> -->
                                 <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="arrow-down"></i> Download &nbsp;&nbsp;&nbsp;</a></li>
                                 <li><a href="<?php echo base_url(); ?>create-new-product" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-circle"></i> Create new &nbsp;&nbsp;&nbsp;  </a></li>
                                 <!-- <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                    <form class="form-inline search-form">
                                      <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search<?php //echo base_url(); ?>/">
                                      </div>
                                    </form>
                                    </li> -->
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
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="card-header pb-0">
                              <h5>Product List</h5>
                           </div>
                           <div class="card-body">
                              <div class="order-history table-responsive">
                                 <table class="table table-bordernone display" id="basic-1">
                                    <thead>
                                       <tr>
                                          <th scope="col">Prdouct name</th>
                                          <th scope="col">Size</th>
                                          <th scope="col">Color</th>
                                          <th scope="col">Product Type</th>
                                          <th scope="col">Purchase Price</th>
                                          <th scope="col">Rent Amount</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($products as $product) { ?>
                                       <tr>
                                          <td>
                                             <div class="product-name">
                                                <a href="#"><?php echo $product["product_name"]; ?></a>
                                                <div class="order-process"><span class="order-process-circle"></span><?php echo $product["product_id"]; ?></div>
                                             </div>
                                          </td>
                                          <td><?php echo $product["product_size"]; ?></td>
                                          <td><?php echo $product["product_color"]; ?></td>
                                          <td><?php echo $product["stock_type"]; ?></td>
                                          <td><?php echo $product["purchase_amount"]; ?></td>
                                          <td><?php echo $product["rent_amount"]; ?></td>
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
            </div>
            <?php include("footer.php"); ?>
        