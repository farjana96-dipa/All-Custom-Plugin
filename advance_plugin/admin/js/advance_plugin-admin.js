
jQuery(function (){
	jQuery('#book_list').DataTable();
});

jQuery(function (){
	jQuery('#book_list_shelf').DataTable();
});


jQuery('#create_book_shelf_form').validate({
	submitHandler:function(){
		var postdata = jQuery('#create_book_shelf_form').serialize();
		console.log(postdata);
	}
})

jQuery(document).on("click","#btn-first-ajax",function(){
	var postdata = "action=admin_ajax_req&param=simple_ajax_form";

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
	});

});