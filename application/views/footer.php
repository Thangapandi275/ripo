  <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 footer-copyright">
            <p class="mb-0">Copyright 2021-22 © viho All rights reserved.</p>
         </div>
         <div class="col-md-6">
            <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
         </div>
      </div>
   </div>
</footer>
         </div>
      </div>
      <!-- latest jquery-->
      

      


        <script src="<?php echo base_url();?>assets/new/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/new/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/new/jszip.min.js"></script>  
        <script src="<?php echo base_url();?>assets/new/buttons.html5.min.j"></script>  
        <script src="<?php echo base_url();?>assets/new/pdfmake.min.js"></script> 
        <script src="<?php echo base_url();?>assets/js/select-v4/select2.min.js"></script>
        <script src="<?php echo base_url();?>assets/new/jquery.validate.min.js"></script>

<script type="text/javascript">
        

$('form').each(function() {


    $(this).validate({
      
    submitHandler: function(form) {
        var formval = form;
        var url = $(form).attr('action');

        // Create an FormData object
        var data = new FormData(formval);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            // url: "crud/Add_userInfo",
            url: url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {

                var result = JSON.parse(response);
                console.log(result.message);       


                swal({
  title: "Good job!",
  text: result.message,
  icon: "success",
  button: "OK",
}).then((value) => {
                     $('form').trigger("reset");
                    // location.reload()
                     window.location.href = "<?php echo base_url('/') ?>"+result.url;
                                  
                  });
              /* swal(response)
                  .then((value) => {
                     $('form').trigger("reset");
                     location.reload()
                                  
                  });
*/

              //  $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
               
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});
});



function funIsdelete(table,table_col,table_id){
    swal({
                     title: "Are you sure?",
                     text: "Once confirmed, you will not be able to Retrive the Details!",
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
                         url: '<?php echo base_url("home/funIsdelete"); ?>',           
                         data : { table:table,table_col:table_col,table_id:table_id },
                         success: function (response) {
                             

                              swal({
                                      title: "Good job!",
                                      text: response,
                                      icon: "success",
                                      button: "OK",
                                        }).then((value) => {
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
      <!-- feather icon js-->
      <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url() ?>assets/js/sidebar-menu.js"></script>
      <script src="<?php echo base_url() ?>assets/js/config.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url() ?>assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>
      <!-- Plugins JS start-->
     <!--  <script src="<?php echo base_url() ?>assets/js/chart/chartist/chartist.js"></script>
      <script src="<?php echo base_url() ?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
      <script src="<?php echo base_url() ?>assets/js/chart/knob/knob.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/chart/knob/knob-chart.js"></script>
     
      <script src="<?php echo base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script>
      <script src="<?php echo base_url() ?>assets/js/prism/prism.min.js"></script> -->
      <!-- <script src="<?php echo base_url() ?>assets/js/clipboard/clipboard.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/counter/jquery.waypoints.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/counter/jquery.counterup.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/counter/counter-custom.js"></script>
      <script src="<?php echo base_url() ?>assets/js/custom-card/custom-card.js"></script> -->
       <script src="<?php echo base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
      <script src="<?php echo base_url() ?>assets/js/notify/bootstrap-notify.min.js"></script>
      <!--<script src="<?php echo base_url() ?>assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
       <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
      <script src="<?php echo base_url() ?>assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script> -->
      <script src="<?php echo base_url() ?>assets/js/dashboard/default.js"></script>
      <script src="<?php echo base_url() ?>assets/js/notify/index.js"></script>
      <!-- <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
      <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
      <script src="<?php echo base_url() ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script> -->


       <script src="<?php echo base_url() ?>assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweet-alert/app.js"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <!-- Theme js-->
      <script src="<?php echo base_url() ?>assets/js/script.js"></script>
      <script src="<?php echo base_url() ?>assets/js/theme-customizer/customizer.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
         <!-- <script src="<?php echo base_url(); ?>assets/js/parsley.js"></script> -->
          
         <script src="<?php echo base_url();?>assets/js/alerts.js"></script>
         <script src="<?php echo base_url();?>assets/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2/select2-custom.js"></script>

      <script type="text/javascript">

        function cancelModel(){
            $('#myModal').modal('hide');
        }


         $(document).ready(function() {
             $('#example').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
                 ]
             } );
         } );


 $(".select2").select2();
            



/* var span = document.getElementById('livetime');

function time() {
  var d = new Date();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent = 
    ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
}

setInterval(time, 1000);*/
      </script>

      
   </body>
</html>