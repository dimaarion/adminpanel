$(document).ready(function () {

	$('.img-fluid').mouseover(function (e) {
		$('#deleteFiles').val(e.target.src)
  })

$('#upload_files').mouseover(function (e) {
$('#deleteFiles').val('')
  })

$('.deleteF svg').click(function(e) {
    $('#filesForm').submit();
    });
})
