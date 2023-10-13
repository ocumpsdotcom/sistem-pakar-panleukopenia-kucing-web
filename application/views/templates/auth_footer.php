 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
 <script>
     $('#provider-input').hide();

     function regInput(switchElement) {
         if (switchElement.value == 3) {
             $('#provider-input').show();
             $("#company").attr("required");
             $('#address').attr('required');
             $('#zip').attr('required');

         } else {
             $('#provider-input').hide();
             $('#company').removeAttr('required');
             $('#address').removeAttr('required');
             $('#zip').removeAttr('required');
         }

     }
 </script>
 </body>

 </html>