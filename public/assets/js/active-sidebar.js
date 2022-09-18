$(document).ready(function() {
    $('a[href="'+window.location.href+'"]').addClass('active');

    if ($('a[href="'+window.location.href+'"]').parents('ul.ml-menu').length > 0) {
      	$('a[href="'+window.location.href+'"]').parents('.ml-menu').css('display', 'block');
      	$('li.active').parent().siblings('.menu-toggle').addClass('toggled');
    }

    $(document).on('click', '.sidebar-toggle', function() {
      $('.dataTables_scrollHeadInner').css('width', '100%');
      $('.table').css('width', '100%');
      setTimeout(function () {
          if ( $.fn.DataTable.isDataTable('#tblRemittanceList') ) {
              $('.dataTable').columns.adjust().draw();
          }                    
      }, 200);
    });
});


function showLoading(message='Sedang memproses...') {
  	Swal.fire({
      	text: 'Sedang memproses...',
      	html: `
         	 <div>
              	<div class="spinner-grow text-danger" role="status">
                  	<span class="visually-hidden">Loading...</span>
              	</div>
				<div class="spinner-grow text-light" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
				<div class="spinner-grow text-secondary" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
				<div class="spinner-grow text-dark" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
				<div class="text-muted mt-3">
					Sedang memproses...
				</div>
          	</div>
      	`,
      	showConfirmButton: false,
      	showCancelButton: false
  	});
}

function alertSuccess(message='Proses berhasil') {
  	Swal.fire({
		title: '',
		text: message,
		icon: 'success' 
	});
}

function alertError(message='Whoops, something went wrong.') {
	Swal.fire({
		title: '',
		text: message,
		icon: 'error' 
	});
}