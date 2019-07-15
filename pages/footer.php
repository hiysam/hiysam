
   <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script src="../dist/js/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        $('#dataTables-example').DataTable({
            responsive: true        });
        $('#bkk').on('keyup', function(){
            var bkk = $(this).val() / 100;

            $('#jm').val(bkk);
        });

        $('#jumlahkan').on('click',function(){
            var jan = +$('#jan').val();
            var feb = +$('#feb').val();
            var mar = +$('#mar').val();
            var apr = +$('#apr').val();
            var mei = +$('#mei').val();
            var jun = +$('#jun').val();
            var jul = +$('#jul').val();
            var agu = +$('#agu').val();
            var sep = +$('#sep').val();
            var okt = +$('#okt').val();
            var nov = +$('#nov').val();
            var des = +$('#des').val();
            var hasil = (jan+feb+mar+apr+mei+jun+jul+agu+sep+okt+nov+des)/12;
            $('#rata').val(hasil);
            })
    });
    </script>
</body>

</html>
