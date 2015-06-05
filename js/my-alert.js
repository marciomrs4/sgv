var $alert = jQuery.noConflict();

$alert(document).ready(function(){
	$alert('.alert-success').show(1000).hide(3000);

});

$alert(".alert-danger").click(function () {
	$alert(this).hide(1000);
});
