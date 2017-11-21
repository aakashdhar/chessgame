  </div>
<!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="amigosas.com">Amigos Automation Solutions</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
    <div class="modal fade" id="datamodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Employee Details</h4>
          </div>
          <div class="modal-body" id="employee_detail">

          </div>
        </div>
      </div>
    </div>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/js/sweetalert-dev.js" charset="utf-8"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/alltables.js" charset="utf-8"></script>
<script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBmBBDd9eIbjruPE9_2A-64kttSbj6amlc&libraries=places">
 </script>
<script src="dist/js/jquery.placepicker.js" charset="utf-8"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE App -->
<script>
 $(function () {
   //bootstrap WYSIHTML5 - text editor
   $(".textarea").wysihtml5();
 });
</script>
<script>
 $(function () {
   //Initialize Select2 Elements
   $(".select2").select2();
 });
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
    	$(".placepicker").placepicker();
    });
  </script>
  <script>
    function isOnlyNumberKey(evt){
      var charCode = (evt.which) ? evt.which : evt.keyCode
     if ( charCode > 31 && (charCode < 48 || charCode > 57)){
          return false;
      }
      return true;
    }
</script>
<script type="text/javascript">
    $(document).ready(function()
      {
        $("#insurance").click(function()
          {
             $('#datamodal').modal("show");
             var id=$(this).val();
             var dataString = 'id='+ id + '&type=' + 'insurance';
             $.ajax
             ({
                type: "POST",
                url: "employedata.php",
                data: dataString,
                cache: false,
                 success: function(html)
                 {
                    $("#employee_detail").html(html);
                 }
               });
          });
          $("#rc").click(function()
          {
             $('#datamodal').modal("show");
             var id=$(this).val();
             var dataString = 'id='+ id + '&type=' + 'rc';
             $.ajax
             ({
                type: "POST",
                url: "employedata.php",
                data: dataString,
                cache: false,
                 success: function(html)
                 {
                    $("#employee_detail").html(html);
                 }
               });
          });
          $("#tax").click(function()
          {
             $('#datamodal').modal("show");
             var id=$(this).val();
             var dataString = 'id='+ id + '&type=' + 'tax';
             $.ajax
             ({
                type: "POST",
                url: "employedata.php",
                data: dataString,
                cache: false,
                 success: function(html)
                 {
                    $("#employee_detail").html(html);
                 }
               });
          });
          $("#fc").click(function()
          {
             $('#datamodal').modal("show");
             var id=$(this).val();
             var dataString = 'id='+ id + '&type=' + 'fc';
             $.ajax
             ({
                type: "POST",
                url: "employedata.php",
                data: dataString,
                cache: false,
                 success: function(html)
                 {
                    $("#employee_detail").html(html);
                 }
               });
          });
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#driverearningreport").click(function()
            {
             var regnumb = $('#driverselection').val();

             if(regnumb == ''){
             alert('Please Select Driver from the list');
             }else{
             var dataString = 'regnumb='+ regnumb;
             $.ajax
             ({
                type: "POST",
                url: "_driverreport.php",
                data: dataString,
                cache: false,
                 success: function(html)
                 {
                    $("#display").html(html);
                 }
              });
              }
          });
        });
    </script>
    <script type="text/javascript">
$(document).ready(function() {

  $("#btnExport").click(function(e) {
      if($.trim($("#display").html())==''){
    alert('Please select driver from the dropdown to generate report');
  }else if($.trim($("#display").html()) == 'No Data available to generate report'){
    alert('No Information Present to generate report');
  }else{
    e.preventDefault();
    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('dvData');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  }
    });

    $("#btnExport1").click(function(e) {
    e.preventDefault();
    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('dvData');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  })
  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
