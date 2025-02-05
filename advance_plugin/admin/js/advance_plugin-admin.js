// js Datatable for book list and book shelf list
jQuery(function (){
	jQuery('#book_list').DataTable();
});

jQuery(function (){
	jQuery('#book_list_shelf').DataTable();
});

jQuery(document).ready(function($) {
    $('#book_image').on('click', function(e) {
        e.preventDefault();

        // If media uploader already exists, use it
        var mediaUploader = wp.media({
            title: "Upload Book Image",
            button: {
                text: "Select Image"
            },
            multiple: false // Set to true for multiple images
        });

        mediaUploader.open();

        mediaUploader.on('select', function() {
            var uploadedImage = mediaUploader.state().get('selection').first().toJSON();
			//var imgJson = uploadedImage.toJSON();
            console.log(uploadedImage); // Debugging
			jQuery('#book_image').attr('src',uploadedImage.url);

            // Update hidden input field with selected image URL
            jQuery('#book_cover_image').val(uploadedImage.url);
        });
    });
});

// Delete Book Shelf



jQuery(document).on("click",".delete-book-shelf",function(){
	var id = jQuery(this).attr("data-id");
	var con = confirm("Are you sure to delete this??");
	if(con){
		var postdata = "action=admin_ajax_req&param=delete_book_shelf&id=" + id;
	

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
	}
	//console.log($id);
	

});

// Show ajax form request in console

jQuery(document).on("click","#btn-first-ajax",function(){
	var postdata = "action=admin_ajax_req&param=simple_ajax_form";
	

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
	});

});


// crate book shelf 
jQuery(document).on("click","#ajaxbtn",function(){
	
	var postdata =jQuery('#create_book_shelf_form').serialize() +  "&action=admin_ajax_req&param=create_book_shelf";
	

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
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


// crate book 
jQuery(document).on("click","#ajaxbtn1",function(){
	
	var postdata =jQuery('#create_book_form').serialize() +  "&action=admin_ajax_req&param=create_book_form";
	

	jQuery.post(ajaxurl,postdata,function(response){
		console.log(response);
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


