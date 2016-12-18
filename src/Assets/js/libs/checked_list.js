function checkedList(){
	$('.list-group.checked-list-box .list-group-item').each(function () {
        $id = $(this).attr('id');
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden"/>'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
}

function initializeCheckedLists(){
	$.ajax({
        type:'POST',
    	url: $url_checked_pages,
    	data: {_token: API.Data.token},
        success: function(data) {
        	$('#pages_items').empty().html(data.pages);
        	$('#category_items').empty().html(data.categories);
        	checkedList();
        	//$('#nestable3').nestable();
        	//dialog.modal('hide');
        }
    });
}

$(document).ready(function(){
	 checkedList();
	 $('#get-checked-data').on('click', function(event) {
	        event.preventDefault(); 
	        var checkedItems = [];
	        $("#pages_items>li.active").each(function(idx, li) {
	            checkedItems.push($(li).attr('id'));
	        });
	        var data = checkedItems;
	        $.ajax({
	            type:'POST',
	        	url: $url_pages,
	        	data: {'data':data, type:"page", _token: API.Data.token},
	            success: function(data) {
	            	$('#menu_items').append(data);
	            	$('#collapse-pages input[type=checkbox]:checked').removeAttr('checked');
	            	$('#collapse-pages li').removeClass('list-group-item-primary active');
	            	checkedList();
	            	initializeCheckedLists();
	            }
	          });
	    });
	 
	 $('#checked-data-cat').on('click', function(event) {
	        event.preventDefault(); 
	        var checkedItems = [];
	        $("#category_items>li.active").each(function(idx, li) {
	            checkedItems.push($(li).attr('id'));
	        });
	        var data = checkedItems;
	        $.ajax({
	            type:'POST',
	        	url: $url_pages,
	        	data: {'data':data, type:"category", _token: API.Data.token},
	            success: function(data) {
	            	initializeCheckedLists();
	            	$('#menu_items').append(data);
	            	$('#collapse-pages input[type=checkbox]:checked').removeAttr('checked');
	            	$('#collapse-pages li').removeClass('list-group-item-primary active');
	            	checkedList();
	            	
	            }
	          });
	    });
	 
	 $("#submit_links").submit(function(e){
	        event.preventDefault(); 
	        $.ajax({
	            type:'POST',
	        	url: $url_pages,
	        	data: {fields: $(this).serialize(), type:"link", _token: API.Data.token},
	            success: function(data) {
	            	$('#link_url, #link_name').val('');
	            	$('#menu_items').append(data);
	            }
	          });
	    });
});