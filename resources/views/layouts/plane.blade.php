<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>SEAMEO BIOTROP - Southeast Asian Regional Centre for Tropical Biology - Biotrop Training Online</title>
	<link rel="icon" type="image/png" href="http://www.recsam.edu.my/joomla/images/logo-biotrop.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="Sistem Training berbasis Web"/>
	<meta content="" name="Tim PKL Biotrop Ilmu Komputer Institut Pertanian Bogor"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<!-- Datatables -->
	<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<!--Datepicker-->
	<link href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">

</head>
<body>
	@yield('body')
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Datatable -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

	<!--dataTables-->
	<script>
			$(function()
			{
					var table = $("#listtraining").DataTable();
					var table = $("#listpemohon").DataTable();
					var table = $("#listuser").DataTable();
			});
	</script>
	<!--/dataTables-->

	<!--datepicker-->
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
			$(function()
			{
						$( "#datepicker" ).datepicker(
							{
								dateFormat	: 'dd-mm-yy',
								changeMonth	: true,
								changeYear	: true
							}
						);
			});
	</script>
	<!--/datepicker-->

	<!--tiny mce editor-->
	<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
	  tinymce.init({
	    selector : "textarea",
	    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
	    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	  });
	</script>

</body>
</html>
