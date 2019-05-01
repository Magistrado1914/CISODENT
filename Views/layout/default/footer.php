
	
	<footer>
	</footer>
	<?php if(Session::Mstrr('autenticado')): ?>
		<?php if(isset($_layoutParams['Bbltcs']) && count($_layoutParams['Bbltcs'])): ?>
      <?php for($i = 0; $i < count($_layoutParams['Bbltcs']); $i++): ?>
      <?php if($_layoutParams['Bbltcs'][$i]['Ubicacion'] == 'Pie'): ?>
        <?php if($_layoutParams['Bbltcs'][$i]['Tipo'] == 'js'): ?>
      <script type="text/javascript" src="<?php echo $_layoutParams['Bbltcs'][$i]['Directorio'].$_layoutParams['Bbltcs'][$i]['Archivo']; ?>"></script>
        <?php endif; ?>
      
        <?php endif; ?>
		<?php endfor; ?>
	<?php endif; ?>
	<script type="text/javascript">
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
	</script>
	<script type="text/javascript">
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Buscar...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
      $(function(){

// showing modal with effect
$('.modal-effect').on('click', function(e){
  e.preventDefault();

  var effect = $(this).attr('data-effect');
  $('#modaldemo8').addClass(effect);
  $('#modaldemo8').modal('show');
});

// hide modal with effect
$('#modaldemo8').on('hidden.bs.modal', function (e) {
  $(this).removeClass (function (index, className) {
      return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
  });
});
});
$(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
      /*$(document).ready(function(){
        $("input[type='checkbox']").iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });*/
    </script>
	<?php endif; ?>
</body>

</html>