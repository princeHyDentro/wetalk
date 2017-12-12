
var pmghrBrading = (function($) {
    function tasksDetails(result){
        $('.title-header').text('Edit Task Information');
        $('.validate').addClass('valid');
        $('#update-tasks').attr('data-id',result[0].id); 
        $('#task-title').val(result[0].task_title);
        tinyMCE.activeEditor.setContent(result[0].description);
        //$('#task-description').val(result[0].description);
    }
    return {
        tasksDetails  : tasksDetails,
    }
})(jQuery);