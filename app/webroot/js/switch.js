jQuery( document ).ready( function() {
	if ( jQuery( "input[@name='switch']:checked").val() == undefined ) {
		var val = "all";
		} else {
			var val = jQuery( "input[@name='switch']:checked").val();
		}
		show(val);
		
		jQuery( ".check").click( function() {
			show( jQuery(this).val() );
			});
		});
		
		function show( val ) {
			if( val == "" ) {
			jQuery( "#switchBox" ).show();
		} else {
			jQuery( "#switchBox dl,#switchBox ul,#switchBox table" ).hide();
			jQuery( "#switchBox ." + val ).show();
	}
}
