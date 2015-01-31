var $alert = jQuery.noConflict();

$alert(document).ready(function(){
	$alert('.alert-success').show(1000).hide(5000);
});