$(document).on({
    ajaxStart: function() { $('.ajax-modal').fadeIn("5000");},
    ajaxStop: function() { $('.ajax-modal').fadeOut("5000"); }
});
// ----------- USER PERMISSIONS CHECKBOXES -----------------
function checkAllCheckbox(){
    $('input[type=checkbox][id*="all_"]').each(function(){

        // >>this<< refers to specific checkbox
        var id = $(this).attr('id');
        var the_string = id;
        var parts = the_string.split('_', 2);

        // After calling split(), 'parts' is an array with two elements:
        // parts[0] is 'sometext'
        // parts[1] is '20202'

        var flag = true;
        $('input[type=checkbox][id^='+parts[1]+']').each(function(){
            // >>this<< refers to specific checkbox
            if($(this).is(':checked') == false) {
               flag = false;
            }
        });

        if(flag == true){
            $(this).attr('checked', 'checked');
            $(this).prop('checked', true);
        }
    });
}




$(document).ready(function(){



    checkAllCheckbox();
    $('#all_users, #all_moduletypes, #all_modules, #all_categories, #all_products').on('change', function(event) {
        event.preventDefault();

        var id = $(this).attr('id');
        var the_string = id;
        var parts = the_string.split('_', 2);

        // After calling split(), 'parts' is an array with two elements:
        // parts[0] is 'sometext'
        // parts[1] is '20202'

        var the_text = parts[0];
        var the_num  = parts[1];
        $('input[type=checkbox][id^='+parts[1]+']').each(function(){
            // >>this<< refers to specific checkbox
            if($('#' + id).is(':checked') == true) {
                $(this).attr('checked', 'checked');
                $(this).prop('checked', true);
            }
            else {
                $(this).removeAttr('checked');
                $(this).prop('checked', false);
            }
        });
    });
    // FULL WIDTH CHECKBOX
    $('.full_width').on('change', function(event) {
        event.preventDefault();
        if($(this).is(':checked') == true) {
            $('.sidebar').css('display', 'none');
            $('.right-content').css('width', '100%');
        }
        else {
            $('.sidebar').css('display', 'block');
            $('.right-content').css('width', '');
        }

    });
// ------------ FLOAT BUTTONS --------------------
    $(document).scroll(function () {
        var y = $(window).scrollTop();
        if ($(window).height() + y >= $(document).height() - 550) {
            //YES, I AM EXACTLY AT THE END OF THE SCROLL, PLZ FIRE AJAX NOW
            $('.submit_float').fadeOut();
        } else {
            $('.submit_float').fadeIn();
        }

    });



});

// -------- CSS EDITOR ------------

var editor;
function editor_init(){
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/css");
    editor.setValue(editor.getValue(), 1);
    editor.$blockScrolling = Infinity;
    editor.setOptions({
        enableLiveAutocompletion: true
    });
    return editor;
}
window.onload = function() {
    if (typeof(ace) !== 'undefined') {
        editor_init();
    }
};


function toggleEditor()
{
    var $selector = $('#div_editor');
    if($selector.hasClass('hide')){
        if (typeof(ace) !== 'undefined') {
            editor_init();
        }
        $selector.removeClass("hide");
    }

    else
        $selector.addClass("hide");

}

function checkH1_H6_P($alias, $name, $property, $attr, $value)
{
    $flag = false;
    for($i = 1; $i<7; $i++)
        if($name.indexOf('h'+$i) !== -1) {
            $alias = $name.substr(0, $name.indexOf('_h'+$i+$property));
            $flag = true;
            $($selectors[$alias] + " h" + $i).css($attr, $value);
        }
    if($flag == false)
    {
        if($name.indexOf("p"+$property) !== -1) {
            $alias = $name.substr(0, $name.indexOf('_p'+$property));
            $flag = true;
            $($selectors[$alias] + " p").css($attr, $value);
        }
    }
    if($flag == false)
        $($selectors[$alias]).css($attr, $value);
}





