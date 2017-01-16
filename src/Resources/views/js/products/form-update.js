$(document).ready(function() {
    if (typeof $logo_bg_color !== 'undefined') {
        // your code here
        $('.header-bg').css('background-color', $logo_bg_color);
    }

    $("#settings_update_banner_content").submit(function(e){
        e.preventDefault(e);

        var dialog = bootbox.dialog({
            title: 'Updating product',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });
        $.ajax({
            type: 'POST',
            url: $banner_content_update,
            data:  $('#settings_update_banner_content').serialize(),
            success: function(data) {
                dialog.init(function(){
                    setTimeout(function(){
                        dialog.find('.bootbox-body').html(data.msg);
                    }, 1000);
                });

                setTimeout(function(){
                    dialog.modal('hide');
                }, 1500);

                setTimeout(function(){
                    $('#form-fontent').empty().html(data.html);
                }, 2000);

            }

        });

    });

	$("#permissions_update").submit(function(e){

		e.preventDefault(e);

		var dialog = bootbox.dialog({
			title: 'Updating product',
			message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
		});
		$.ajax({
			type: 'PUT',
			url: $url,
			data:  $('#permissions_update').serialize(),
			success: function(data) {
				dialog.init(function(){
					setTimeout(function(){
						dialog.find('.bootbox-body').html(data.msg);
					}, 1000);
				});

				setTimeout(function(){
					dialog.modal('hide');
				}, 1500);

				setTimeout(function(){
					$('#form-fontent').empty().html(data.html);
				}, 2000);

			}

		});

	});

    function submit_css(){
        var dialog = bootbox.dialog({
            title: 'Updating css',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });
        $.ajax({
            type: 'POST',
            url: $css_update,
            data:  {editor_data: editor.getValue(), _token: API.Data.token},
            success: function(data) {
                dialog.init(function(){
                    setTimeout(function(){
                        dialog.find('.bootbox-body').html(data.msg);
                    }, 1000);
                });

                setTimeout(function(){
                    dialog.modal('hide');
                }, 1500);

                setTimeout(function(){
                }, 2000);

            }

        });
    }

    $( "#css_submit" ).click(function() {
        submit_css();
    });

    $( "#generate_site" ).click(function() {
        $.ajax({
            type: 'POST',
            url: $site_generate,
            data:  { _token: API.Data.token},
            success: function(data) {
                $('#down-link').css('display', 'inline');
            }

        });
    });

    $("#product_update").submit(function(e){
       
        e.preventDefault(e);

        var dialog = bootbox.dialog({
            title: 'Updating product',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });

        $.ajax({
	        type: 'POST',
	        url: $url,
	        data:  $('#product_update').serialize(),
	        success: function(data) {
	            dialog.init(function(){
	                setTimeout(function(){
	                    dialog.find('.bootbox-body').html(data.msg);
	                }, 1000);
	            });
	            
	            setTimeout(function(){
	            	dialog.modal('hide');
	            }, 1500);
	            
	            setTimeout(function(){
	            	$('#form-fontent').empty().html(data.html);
                    //secon parameter moves cursor to after last line


                    if (typeof data.logo_bg_color !== 'undefined') {
                        // your code here
                        $('.header-bg').css('background-color', data.logo_bg_color);
                    }


	            }, 2000);

	        }
	
	    });
        
    });


    $(".product_update").submit(function(e){

        e.preventDefault(e);

        var dialog = bootbox.dialog({
            title: 'Updating product',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });

        $.ajax({
            type: 'POST',
            url: $url,
            data:  $('.product_update').serialize(),
            success: function(data) {
                dialog.init(function(){
                    setTimeout(function(){
                        dialog.find('.bootbox-body').html(data.msg);
                    }, 1000);
                });

                //reload iframe
                /*$.ajax({
                    async: false,
                    type: 'POST',
                    url: $iframe_reload,
                    data:  {_token: API.Data.token},
                    success: function(data) {
                        $('#iframe_content').empty().html(data.html);
                    }
                });*/


                setTimeout(function(){
                    dialog.modal('hide');
                }, 1500);

                setTimeout(function(){
                    $('#form-fontent').empty().html(data.html);
                    //secon parameter moves cursor to after last line


                    if (typeof data.logo_bg_color !== 'undefined') {
                        // your code here
                        $('.header-bg').css('background-color', data.logo_bg_color);
                    }




                }, 2000);

            }

        });

    });
    
    $("#settings_update_posts").submit(function(e){
    	e.preventDefault(e);
    	$.ajax({
		    type:'POST',
			url: $url_settings_posts,
			data: $(this).serialize(),
		    success: function(data) {
		    	if(data == null)
		    		bootbox.alert("Error occured while updating, check with your admin...");
		    	else{
		    		var dialog = bootbox.dialog({
		    		    message: '<p class="text-center">Post settings updated!</p>',
		    		    closeButton: false
		    		});
		    		$('#posts_per_page').val(data.row.posts_per_page);
		    		$('#columns_per_page').val(data.row.columns_per_page);
		    		setTimeout(function() {
		    	        dialog.modal('hide');
		    	    }, 1800);
		    	}
		    }
		  });
    });
    
    
    $("#update_footer").submit(function(e){
    	e.preventDefault(e);
    	$.ajax({
		    type:'POST',
			url: url_update_footer,
			data: $(this).serialize(),
		    success: function(data) {
		    	if(data == null)
		    		bootbox.alert("Error occured while updating, check with your admin...");
		    	else{
		    		var dialog = bootbox.dialog({
		    		    message: '<p class="text-center">Footer updated!</p>',
		    		    closeButton: false
		    		});
		    		setTimeout(function() {
		    	        dialog.modal('hide');
		    	    }, 1800);
		    	}
		    }
		  });
    });
});