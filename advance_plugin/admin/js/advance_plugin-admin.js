// js Datatable for book list and book shelf list
jQuery(function (){
	jQuery('#book_list').DataTable();
});

jQuery(function (){
	jQuery('#book_list_shelf').DataTable();
});

// Delete Book Shelf



jQuery(document).on("click",".delete-book-shelf",function(){
	var $id = jQuery(this).attr("data-id");
	//console.log($id);
	var postdata = "action=admin_ajax_req&param=delete_book_shelf&id=" + $id;
	

	jQuery.post(ajaxurl,postdata,function(response){
		var data = JSON.parse(response);
		if(data.status==1){
			alert(data.message);
			setTimeout(function(){
				location.reload();
			},1000);
		}
		else{
			alert(data.message);
		}
	});

});

// Show ajax form request in console

jQuery(document).on("click","#btn-first-ajax",function(){
	var postdata = "action=admin_ajax_req&param=simple_ajax_form";
	

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
	});

});


// show book shelf form data in console
jQuery(document).on("click","#ajaxbtn",function(){
	
	var postdata =jQuery('#create_book_shelf_form').serialize() +  "&action=admin_ajax_req&param=create_book_shelf";
	

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
		var data = JSON.parse(response);
		if(data.status==1){
			alert("Data Insert Successfully!!");
			setTimeout(function(){
				location.reload();
			},1000);
		}
	});

});

