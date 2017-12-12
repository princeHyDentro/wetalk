var pmghrTasks = (function($) {
    function tasksCRUD(data,type,id){
        $("#no_response").hide();
        switch(type){
            case 'add':
                var url_path = 'tasks/store';
                $('#task-form').ajaxSubmit({
                    type: 'POST',
                    url : url_path,
                    data: data,
                    cache: false,
                    success: function (response) {
                        if(response.success == 'success'){
                            $('#tasks-modal').modal('close');
                            Materialize.toast('Successfully added new task!', 5000 ,'rounded green lighten-1');
                            appendHTML(response);
                        }else{
                            errorMessage(response)
                        }
                    }
                });
            break;
             case 'update':
                // setTimeout(function(){
                    var url_path = 'tasks/update/'+id;
                    $('#task-form').ajaxSubmit({
                        type: 'POST',
                        url: url_path,
                        data: data,
                        cache: false,
                        success: function (result) {
                            if(result.success){
                                $('#tasks-modal').modal('close');
                                url = "{{ url('') }}/"+id;
                                created_at = moment(result.created_at).format('MMM D, YYYY');
                                updated_at = moment(result.updated_at).format('MMM D, YYYY');
                                data_append = [
                                '<td class="align center">',
                                    '<input type="checkbox" name="checkboxlist" id="test'+id+'" class="delete" data-id="'+id+'" />',
                                    '<label for="test'+result.id+'"></label>',
                                '</td>',
                                '<td>'+result.task_title+'</td>',
                                '<td><span data-id="'+result.id+'" class="new badge show-task-info"></span></td>',
                                '<td>'+created_at+'</td>',
                                '<td>'+updated_at+'</td>',
                                '<td class="valign center">',
                                    '<span  class="center small material-icons edit" data-id="'+id+'" style="cursor: default;">mode_edit</span>',
                                    // '<a href="#"><span  class="center small material-icons" data-id="'+id+'" style="cursor: default;">pageview</span></a>',
                                '</td>'
                                ].join('');
                                $('.tasks-list'+id).html(data_append);
                                Materialize.toast('Successfully updated task group!', 5000, 'rounded green lighten-1');
                            }else{
                                errorMessage(result);
                            }
                        }
                    });
                // }, 1000);
            break;
            case 'delete':
                pmghr.ajax('delete', 'tasks/destroy/'+data, null, function(result){
                    if(result == 'success'){ 
                        $('.tasks-list' + id).remove();
                        $('input[name=checkboxlist]:checked').map(function(){
                            $('.tasks-list' + $(this).data('id')).remove();
                        }).get(); 
                        $('#tasks-modal').modal('close');
                        Materialize.toast('Successfully deleted!', 5000, 'rounded green lighten-1');
                    }
                });
            break;
        }
    }
    function appendHTML(result){
        created_at  = moment(result.created_at).format('MMM D, YYYY');
        updated_at  = moment(result.updated_at).format('MMM D, YYYY');
        var data    = [  "<tr class='task-list" + result.id + " '>",
        "<td class='align center'><input type='checkbox' name='checkboxlist' id='test"+result.id+"' class='delete' data-id='"+result.id+"' />",
        "<label for='test"+result.id+"'></label>",
        '<td>'+result.task_title+'</td>',
       '<td><span data-id="'+result.id+'" class="new badge show-task-info"></span></td>',
         '<td>'+created_at+'</td>',
        '<td>'+updated_at+'</td>',
        "<td class='valign center'>",
        '<span  class="center small material-icons edit" data-id="'+result.id+'" style="cursor: default;">mode_edit</span>', 
        // '<a href="#"><span  class="center small material-icons" data-id="'+result.id+'" style="cursor: default;">pageview</span></a>',
            "</td></tr>"
            ].join('');
            $('#tableData').prepend(data);
    }
    function errorMessage(result){
        if(result){
            $('.error').text('');
            $.each(result, function(key, value){
                $('#'+key).addClass('invalid').next('label').attr('data-error', value[0]);
                $('#'+key+'-error').text(value[0]).next('label');
            });
        }
    }
    function confirmModal(){
        var checkValues = $('input[name=checkboxlist]:checked').map(function(){
            return  $(this).data('id');
        }).get();
        if(checkValues != ''){
            $('.confirm-delate').modal('open');
        }else{
            Materialize.toast('Please select the task group to be deleted!', 5000, 'rounded green lighten-1');
        }
    }
    function tasksDetails(result){
        $('.title-header').text('Edit Task Information');
        $('.validate').addClass('valid');
        $('#update-tasks').attr('data-id',result[0].id); 
        $('#task-title').val(result[0].task_title);
        tinyMCE.activeEditor.setContent(result[0].description);
        //$('#task-description').val(result[0].description);
    }
    function searchHTML(result,imgPath){
        var arr = new Array();
        if(result != 'no response'){
            $('#no_response').hide();
            $.each(result, function(index,val){
                answer_data = new Array();
                created_at = moment(val.created_at).format('MMM D, YYYY  h:mm A');
                updated_at = moment(val.updated_at).format('MMM D, YYYY  h:mm A');
                var data =[ 
                    "<tr class='task-list" + val.id + " '>",
                    "<td class='align center'><input type='checkbox' name='checkboxlist' id='test"+val.id+"' class='delete' data-id='"+val.id+"' />",
                    "<label for='test"+val.id+"'></label>",
                    '<td>'+val.task_title+'</td>',
                   '<td><span data-id="'+val.id+'" class="new badge show-task-info"></span></td>',
                     '<td>'+created_at+'</td>',
                    '<td>'+updated_at+'</td>',
                    "<td class='valign center'>",
                    '<span  class="center small material-icons edit" data-id="'+val.id+'" style="cursor: default;">mode_edit</span>', 
                    // '<a href="#"><span  class="center small material-icons" data-id="'+result.id+'" style="cursor: default;">pageview</span></a>',
                    "</td>",
                    "</tr>"
                ].join('');
                answer_data.push(data);
                arr.push(answer_data);
            });
             result = arr.join('');
             return result;
        }else{
            var result1 =[ '<tr id="no_response"><td colspan="10"><center><h4>No Results</h4></center></td></tr>'];
            return result1;
        }
    }
    function ajaxSearchFunction(search_data){

        var arr = new Array(), answer_data, each_answer_data, result;
        pmghr.ajax('post','tasks/search', search_data, function(result){
            setTimeout(function(){
                $( ".progress" ).fadeOut( "slow", function() {
                    data = searchHTML(result);
                    $('.add-search-data').html(data).fadeIn("slow");
                });
            });
        },function(){
        },function(){
            setTimeout(function(){
                $('.search-result').fadeIn();
                $( ".progress" ).hide();
            }, 1000);
        });
    }
    function editor(){
        tinymce.init({ 
            selector:'#task-description',
            branding: false,
            menubar: false,
            
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help template'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help, UserInfo',
        
            height: 500,
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'lists', 'autolink' ],
                toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
            },
            templates:[
                {"title": "Some title 1", "description": "Some desc 1", "content": "My content"},
                {"title": "Some title 2", "description": "Some desc 2", "url": "development.html"}
            ],
            /* Will save the data to the textarea on change*/
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
                editor.addButton('UserInfo', {
                    type: 'menubutton',
                    text: 'User Information',
                    icon: false,
                    menu: [{
                        text: 'Full Name',
                        onclick: function() {
                            editor.insertContent('{Full Name}');
                        }
                    }, {
                        text: 'Birth Date',
                        onclick: function() {
                            editor.insertContent('{Birth Date}');
                        }
                    },
                    {
                        text: 'Address',
                        onclick: function() {
                            editor.insertContent('{Address}');
                        }
                    },{
                        text: 'Address 2',
                        onclick: function() {
                            editor.insertContent('{Address 2}');
                        }
                    },{
                        text: 'Email',
                        onclick: function() {
                            editor.insertContent('{Email}');
                        }
                    },{
                        text: 'Contact Number',
                        onclick: function() {
                            editor.insertContent('{Contact Number}');
                        }
                    },{
                        text: 'Country',
                        onclick: function() {
                            editor.insertContent('{Country}');
                        }
                    },{
                        text: 'City',
                        onclick: function() {
                            editor.insertContent('{City}');
                        }
                    },{
                        text: 'State',
                        onclick: function() {
                            editor.insertContent('{State}');
                        }
                    },{
                        text: 'Company Name',
                        onclick: function() {
                            editor.insertContent('{Company Name}');
                        }
                    },{
                        text: 'Company Address',
                        onclick: function() {
                            editor.insertContent('{Company Address}');
                        }
                    },{
                        text: 'Company Logo',
                        onclick: function() {
                            editor.insertContent('{Company Logo}');
                        }
                    },{
                        text: 'Company Contact',
                        onclick: function() {
                            editor.insertContent('{Company Contact}');
                        }
                    }]
                });
            },
        });
    }
    return {
        editor        : editor,
        ajaxSearchFunction  : ajaxSearchFunction,
        tasksCRUD     : tasksCRUD,
        tasksDetails  : tasksDetails,
        confirmModal  : confirmModal
    }
})(jQuery);