jQuery( document ).ready( function( $ ) {
	$('#wc-debug-bar-show-products').show();
	$('#wc-debug-bar-products').hide();

	$('#wc-debug-bar-show-products').live('click', function() {
		$('#wc-debug-bar-show-products').hide();
		$('#wc-debug-bar-hide-products').show();
		$('#wc-debug-bar-products').show('fast');
		return false;
	});

	$('#wc-debug-bar-hide-products').live('click', function() {
		$('#wc-debug-bar-hide-products').hide();
		$('#wc-debug-bar-show-products').show();
		$('#wc-debug-bar-products').hide('fast');
		return false;
	});
});