/**
 * Main JS
 */

var pmghr = (function($) {

    function ajaxCall(method, url, data, success, before, complete, error) {
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: method,
            url: url,
            data: data,
            success: success,
            beforeSend: before,
            complete: complete,
            error: error,
        })
    }
    function initiliaze(){
        var display = [
            '<div id="confirm-modal" class="modal confirm-modal">',
            '<div class="modal-content">',
            '<p class="confirm-message center-align"></p>',
            '</div>',
            '<div class="modal-footer">',
            '<a href="#!" class="modal-action modal-close waves-effect btn-flat confirm-cancel btn grey lighten-2">Cancel</a>',
            '<a href="#!" class="modal-action modal-close waves-effect btn-flat confirm-ok btn light-blue darken-2">Ok</a>',
            '</div>',
            '</div>'
        ];
        $('body').append(display.join(''));
        $('.side-nav-collapse').sideNav();
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false,
            hover: false,
            gutter: 0, 
            belowOrigin: true, 
            alignment: 'right',
            stopPropagation: true 
        });
        $('.modal').modal();
        $('select').material_select();
        
    }
    function confirm(message = 'Are you sure?', callback){
        $('#confirm-modal').find('.confirm-message').text(message);
        $('#confirm-modal').modal('open');

        $('body').one('click', '.confirm-cancel', function(){
            return callback(false);
        })

        $('body').one('click', '.confirm-ok', function(){
            return callback(true);
        })
    }

    function str_limit( string = '', limit = 50 ){
        if(string.length > limit ){
            string = string.substring(0, limit)+'...';
        }
        return string;
    }
    function clearForm(frm_elements){
        for (i = 0; i < frm_elements.length; i++)
        {
            field_type = frm_elements[i].type.toLowerCase();
            switch (field_type)
            {
                case "text":
                case "password":
                case "textarea":
                // case "hidden":
                case "email":
                frm_elements[i].value = "";
                break;
                case "radio":
                case "checkbox":
                if (frm_elements[i].checked)
                {
                    frm_elements[i].checked = false;
                }
                break;
                case "select-one":
                case "select-multi":
                frm_elements[i].selectedIndex = -1;
                break;
                default:
                break;
            }
        }
    }
    function multipleCheck(data){
        if(data) {
            $(':checkbox').each(function() { this.checked = true; });
        }else{
            $(':checkbox').each(function() { this.checked = false; });
        }
    }
    function refresh(){
        location.reload();
    }
    return {
        refresh : refresh,
        clearForm: clearForm,
        ajax: ajaxCall,
        confirm: confirm,
        initiliaze: initiliaze,
        str_limit: str_limit,
        multipleCheck:multipleCheck,
    }

})(jQuery);
$(document).ready(function(){
    pmghr.initiliaze();
});
