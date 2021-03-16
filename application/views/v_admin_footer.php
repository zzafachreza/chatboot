
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
	
    $("#example3").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple"
	,"lengthMenu": [[5, 10, 20, 40, -1], [5, 10, 20, 40, "All"]]});
	
    $("#example4").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple"
	,"lengthMenu": [[5, 10, 20, 40, -1], [5, 10, 20, 40, "All"]]});
	
    $("#literasi1").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"language": {
			"paginate": {
			  "previous": "Sebelumnya",
			  "next": "Selanjutnya"
			}
		},"lengthMenu": [[5, 10, 20, 40, -1],  [5, 10, 20, 40, "All"]]});
		
	$("#literasi2").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"language": {
			"paginate": {
			  "previous": "Sebelumnya",
			  "next": "Selanjutnya"
			}
		},"lengthMenu": [[5, 10, 20, 40, -1],  [5, 10, 20, 40, "All"]]});
		
	$("#literasi3").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"language": {
			"paginate": {
			  "previous": "Sebelumnya",
			  "next": "Selanjutnya"
			}
		},"lengthMenu": [[5, 10, 20, 40, -1],  [5, 10, 20, 40, "All"]]});
		
	$("#literasi4").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"language": {
			"paginate": {
			  "previous": "Sebelumnya",
			  "next": "Selanjutnya"
			}
		},"lengthMenu": [[5, 10, 20, 40, -1],  [5, 10, 20, 40, "All"]]});
		
    $("#example6").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"lengthMenu": [[5, 10, 20, 40, -1], [5, 10, 20, 40, "All"]]});
	
    $("#example7").DataTable({ "paging": true,"searching": false, "bInfo": false, "ordering": false, "pagingType": "simple_numbers"
	,"lengthMenu": [[5, 10, 20, 40, -1], [5, 10, 20, 40, "All"]]});
	
    $("#example8").DataTable({"ordering": false, "bInfo": false,  "paging": false, "searching": false, "lengthMenu": [[<?php echo $tampil_baris;?>, -1],  [<?php echo $tampil_baris;?>, "All"]]});
	
  });

function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
</body>
</html>