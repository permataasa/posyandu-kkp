</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        <span>Copyright &copy; Posyandu EH Indah <?= date('Y'); ?></span>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>


<!-- jQuery -->
<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?= base_url('vendors/nprogress/nprogress.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('vendors/iCheck/icheck.min.js') ?>"></script>
<!-- Parsley -->
<script src="<?= base_url('vendors/parsleyjs/dist/parsley.min.js') ?>"></script>
<script src="<?= base_url('vendors/parsleyjs/dist/i18n/id.js') ?>"></script>
<!-- Datatables -->
<script src="<?= base_url('vendors/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendors/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Sweet Alert 2 -->
<script src="<?= base_url('/build/js/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('/build/js/dist/myscript.js'); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url('build/js/custom.min.js') ?>"></script>


</body>

</html>

<script type="text/javascript">
    // function iyadah() {
    //     $('#demo-form2').parsley('validate');
    // }
    $(document).ready(function() {
        $("#usia").prop("disabled", true);
        $("#bb").prop("disabled", true);
        $("#tb").prop("disabled", true);
        // $("#deteksiS").prop("disabled", true);
        // $("#deteksiT").prop("disabled", true);
        $("#tgl_skrng").prop("disabled", true);
        $("#imun").prop("disabled", true);
        $("#keterangan").prop("disabled", true);

        $('.btnSelectAnak').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var jk = $(this).data('jk');
            var idibu = $(this).data('idibu');
            var nama_ibu = $(this).data('ibu');

            $('#id_anak').val(id);
            $('#nama_anak').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#jenis_kelamin').val(jk);
            $('#ibu_id').val(idibu);
            $('#nama_ibu').val(nama_ibu);

            $('#DataAnakModal').modal('toggle');
        });

        $('.btnSelectAnakLaporan').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var ayah = $(this).data('ayah');
            var idibu = $(this).data('idibu');
            var nama_ibu = $(this).data('ibu');

            $('#id_anak').val(id);
            $('#nama_anak').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#nama_ayah').val(ayah);
            $('#ibu_id').val(idibu);
            $('#nama_ibu').val(nama_ibu);

            $('#DataAnakModal').modal('toggle');
        });

        $("#pilihAnak").click(function() {
            getPertumbuhan();
        });

        $("#pilihAnak_Bidan").click(function() {
            getImun();
        });

        $("#tgl_skrng").change(function() {
            getUsia();
        });

        $('#proseslaporan').click(function() {
            $.ajax({
                url: '<?php echo site_url('laporan/getList'); ?>',
                type: 'POST',
                data: $('#laporan-filter').serialize(),
                dataType: 'html',
                success: function(res) {
                    $('#rowData').html(res);
                }
            });
            alert($.ajax);
        });

        // $('#proses').click(function() {
        //     $.ajax({
        //         url: '<?php echo site_url("penimbangan_anak/submit"); ?>',
        //         data: $('#penimbangan-form').serialize(),
        //         type: 'POST',
        //         dataType: 'json',
        //         success: function(res) {
        //             $('#id_anak').val('');
        //             $('#nama_anak').val('');
        //             $('#ibu_id').val('');
        //             $('#nama_ibu').val('');
        //             $('input[name=tgl_lahir]').val('');
        //             $('input[name=jenis_kelamin]').val('');

        //             $('#usia').val('');
        //             $('#tb').val('');
        //             $('#bb').val('');
        //             $('input[name=skrng]').val('');
        //             $('textarea[name=keterangan]').val('');
        //             alert(res.messages);
        //         }
        //     });
        // });

        //    KUMPULAN FUNCTION
        function getPertumbuhan() {
            $("#usia").focus();

            $("#usia").prop("disabled", false);
            $("#bb").prop("disabled", false);
            $("#tb").prop("disabled", false);
            $("#deteksiS").prop("disabled", false);
            $("#deteksiT").prop("disabled", false);
            $("#tgl_skrng").prop("disabled", false);
            $("#keterangan").prop("disabled", false);
        }

        function getImun() {
            $("#usia").focus();

            $("#usia").prop("disabled", false);
            $("#imun").prop("disabled", false);
            $("#vita-merah").prop("disabled", false);
            $("#vita-biru").prop("disabled", false);
            $("#tgl_skrng").prop("disabled", false);
            $("#keterangan").prop("disabled", false);
        }

        function getUsia() {
            var userinput = document.getElementById("tgl_skrng").value;
            var DOB = document.getElementById("tgl_lahir").value;
            var millisecondsBetweenDOBAnd1970 = Date.parse(DOB);
            // var millisecondsBetweenNowAnd1970 = Date.now();
            var millisecondsBetweenNowAnd1970 = Date.parse(userinput);
            var ageInMilliseconds = millisecondsBetweenNowAnd1970 - millisecondsBetweenDOBAnd1970;
            //--We will leverage Date.parse and now method to calculate age in milliseconds refer here https://www.w3schools.com/jsref/jsref_parse.asp

            var milliseconds = ageInMilliseconds;
            var second = 1000;
            var minute = second * 60;
            var hour = minute * 60;
            var day = hour * 24;
            var month = day * 30;
            /*using 30 as base as months can have 28, 29, 30 or 31 days depending a month in a year it itself is a different piece of comuptation*/
            var year = day * 365;

            //let the age conversion begin
            var years = Math.round(milliseconds / year);
            var months = years * 12;
            var days = years * 365;
            var hours = Math.round(milliseconds / hour);
            var seconds = Math.round(milliseconds / second);
            //display the calculated age  
            return document.getElementById("usia").value = months;
        }

        function handler() {
            alert("EUY");
        }
        // Bind the <input> elements for Parsley validation
        // triggered at data-parsley-trigger="change".
        // $('input').parsley();

        // $('#proses').click(function(event) {
        //     // console.log("Hello world!");
        //     event.preventDefault();
        //     // // Validate all input fields.
        //     var isValid = true;
        //     $('input').each(function() {
        //         if ($(this).parsley().validate() !== true) isValid = false;
        //         // console.log('input');
        //     });
        //     if (isValid) {
        //         // console.log('tidak');
        //         alert("OK and Processed!");
        //     }
        // });
    });
</script>