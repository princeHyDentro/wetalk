/**
 * Main JS
 */

 var pmghrDepartment = (function($) {

    function ajaxSearchFunction(search_data,filter_by_department,path_url,path_wage_report){
        pmghr.ajax('post',path_url, search_data, function(result){
            if(filter_by_department == 'Position'){
                if(result.fail){
                    $( ".progress" ).fadeOut( "slow", function() {
                        $('.search-result').find('h5').text("Search Result(s) :");
                        $('.collapsible').html('<center><h5 style="padding-bottom:1rem;"> No Results</h5></center>')
                        $('.search-result').fadeIn();
                    });
                }else{
                    $('.department-data').find('h5').remove();
                    var result_data = searchByDepartment(result);
                    setTimeout(function(){
                        $('.search-result').fadeIn();
                        $( ".progress" ).fadeOut( "slow", function() {
                            $('.department-data').append(result_data).fadeIn();
                        });
                    }, 3000);
                }
            }else{
                setTimeout(function(){
                    $( ".progress" ).fadeOut( "slow", function() {
                        data = searchHTML(result,path_wage_report);
                        $('.add-search-data').html(data).fadeIn();
                    });
                });
            }
        });
    }
    function departmentCRUD(data,type,id,path_url,append_url){
        switch(type){
            case 'add':
            pmghr.ajax('post',path_url, data, function( response ){
                 if( response.status === 'error' ){
                    showErrors(response.errors);
                }else{
                    $('#department-modal').modal('close');
                    appendData(response,append_url);
                    Materialize.toast('Department has been added', 2000, 'rounded green lighten-1');
                }
            });
            break;
            case 'update':
            pmghr.ajax('put',path_url+'/'+id, data, function( response ){
                if(response.status === 'error'){
                    showErrors(response.errors);
                }else{
                    $('#department-modal').modal('close');
                    updateRow(response,append_url);
                    Materialize.toast('Department has been Updated', 2000, 'rounded green lighten-1');
                }
            });
            break;
            case 'delete':
            pmghr.ajax('delete', path_url+'/'+id, null, function(result){
                if(result == 'success'){ 
                    if(data == 1){
                        $('.dept' + id).fadeOut('slow',function(){
                            $('.dept' + id).remove();
                        });
                    }else{
                        $('input[name=checkboxlist]:checked').each(function()
                        {
                            $('.dept' + $(this).data('id')).remove();
                        });
                    }
                    $('#save-company').modal('close');
                    Materialize.toast('The department has been deleted!', 5000, 'rounded green lighten-1');
                }
            });
            break;
        }
    }
    function updateRow(response,append_url){
        var result = response.data.original;
        created_at = moment(result.created_at).format('MMM D, YYYY  h:mm A');
        updated_at = moment(result.updated_at).format('MMM D, YYYY  h:mm A');
        var columns =[
        '<td class="align center">',
        '<input type="checkbox" name="checkboxlist" id="test'+result.id+'" class="delete" result-id="'+result.id+'" />',
        '<label for="test'+result.id+'"></label>',
        '</td>',
        '<td>'+result.department_title+'</td>',
        '<td>'+response.company_name+'</td>',
        '<td><a href="'+append_url+'/wage-report/'+result.id+'" class="new badge"><span class="material-icons">launch</span> view</a></td>',
        '<td>'+created_at+'</td>',
        '<td>'+updated_at+'</td>',
        '<td><span company-id="'+result.company_id+'" class="edit-button material-icons"  data-department=\''+JSON.stringify(result)+'\'>edit</span', 
            // '<span class="delete-button material-icons" data-key="'+data.id+'">delete</span>', 
            '</td>',
            ];
            $('#row-'+result.id).html(columns.join(''));
        }
        function appendData(response,append_url){

            var result = response.data;
            created_at = moment(result.created_at).format('MMM D, YYYY  h:mm A');
            updated_at = moment(result.updated_at).format('MMM D, YYYY  h:mm A');
            var row = [
            '<tr class="dept'+result.id+'" id="row-'+result.id+'">',
            '<td class="align center">',
            '<input type="checkbox" name="checkboxlist" id="test'+result.id+'" class="delete" result-id="'+result.id+'" />',
            ' <label for="test'+result.id+'"></label>',
            '</td>',
            '<td>'+result.department_title+'</td>',
            '<td>'+response.company_name+'</td>',
            '<td><a href="'+append_url+'/wage-report/'+result.id+'" class="new badge"><span class="material-icons">launch</span> view</a></td>',
            '<td>'+created_at+'</td>',
            '<td>'+updated_at+'</td>',
            '<td>',
            '<span company-id="'+result.company_id+'" class="edit-button material-icons" style="cursor: default;"  data-department=\''+JSON.stringify(result)+'\'>edit</span', 
            // '<span class="delete-button material-icons" style="cursor: default;" data-key="'+data.id+'">delete</span>', 
            '</td>',
            '</tr>'
            ].join('');
            // $('#no_response').hide();
            $('#deptTable').prepend(row);
            $('#row-'+result.id).fadeIn('slow');
        }
        function searchHTML(data,path_wage_report){
            var arr = new Array(), answer_data, each_answer_data, result;
            if(data != false){
                $('.no_response').hide();
                $.each(data, function(index,val){
                    answer_data = new Array();
                    created_at = moment(val.created_at).format('MMM D, YYYY  h:mm A');
                    updated_at = moment(val.updated_at).format('MMM D, YYYY  h:mm A');
                    url = path_wage_report+"/"+val.id;

                    var data =[  "<tr class='with-response company" + val.id + " '>",
                    "<td class='align center'><input type='checkbox' name='checkboxlist' id='test"+val.id+"' class='delete' data-id='"+val.id+"' />",
                    "<label for='test"+val.id+"'></label>",
                    "<td>"+val.department_title+"</td>",
                    "<td>"+val.company_name+"</td>",
                    "<td class='valign'><a href='"+url+"'><i class='material-icons'>launch</i> view</a></td>",
                    "<td>"+created_at+"</td>",
                    "<td>"+updated_at+"</td>",
                    "<td class='valign'>",
                    "<i  class='small material-icons edit' data-id='"+val.id+"' style='cursor: default;'>mode_edit</i>",
                    // "<i  class='center small material-icons single-delete' data-id='"+val.id+"' style='cursor: default;''>delete_forever</i>",
                    "</td></tr>"
                    ].join('');
                    answer_data.push(data);
                    arr.push(answer_data);
                });
                result = arr.join('');
                return result;
            }else{
                var result =[ '<tr class="no_response"><td colspan="7"><center><h4>No Results</h4></center></td></tr>'];
                return result;
            }
        }
        function searchByDepartment(result){
            var arr = new Array(), header, body, result;
            if(result){
                $.each(result, function(index,data){   
                    created_at = moment(data.created_at).format('MMM D, YYYY  h:mm A');
                    updated_at = moment(data.updated_at).format('MMM D, YYYY  h:mm A');
                    answer_data = new Array();
                    each_answer_data = [
                    '<li>',
                        '<div class="collapsible-header collapsible-body-col"><i class="material-icons more">keyboard_arrow_right</i>',
                        '<i class="material-icons less" style="display: none">keyboard_arrow_down</i> '+data.department_title+'</div>',
                        '<div class="collapsible-body collapsible-body-col">',
                            '<table class="bordered highlight striped responsive-table" id="jobTable">',
                            '<thead>',
                                '<tr>',
                                    '<th class="align center ">',
                                    '<span class="material-icons">subdirectory_arrow_right</span>',
                                    '</th>',
                                    '<th>Position</th>',
                                    '<th>Position Type</th>',
                                    '<th>Pay Level</th>',
                                    '<th>Salary Range</th>',
                                    '<th>Created Date</th>',
                                    '<th>Modified Date</th>',
                                '</tr>',
                            '</thead>',
                            '<tbody class="add-search-data">',
                                '<tr>',
                                    '<td class="align center"><span class="material-icons">subdirectory_arrow_right</span></td>',
                                    '<td>'+data.position_title+'</td>',
                                    '<td>'+data.position_type+'</td>',
                                    '<td>'+data.pay_level_type+'</td>',
                                    '<td>'+data.salary_range+' CAD</td>',
                                    '<td>'+created_at+'</td>',
                                    '<td>'+updated_at+'</td>',
                                '</tr>',
                            '</tbody>',
                            '</table>',
                        '</div>',
                    '</li>'
                    ].join(' ');
                    arr.push(each_answer_data);
                });
                result = arr.join('');
            }
            return result;
        }
        function showErrors(data){
            $("#department_title-error").text('');
            $.each(data, function(key, value){
                $('#'+key).addClass('invalid').next('label').attr('data-error', value[0]);
                $('#'+key+'-error').text(value[0]).next('label');
                $('.assign-to-company').find('.select-dropdown').addClass("invalid");
            });
        }
        function deleteValidation(){
            $("#dl-department").attr('single-delete', "0");
            var checkValues = $('input[name=checkboxlist]:checked').map(function()
            {
                return  $(this).data('id');
            }).get();
            if(checkValues != ''){
                $('.confirm-delate').modal('open');
            }else{
                Materialize.toast('Please select the department to be deleted!', 5000, 'rounded green lighten-1');
            }
        }
        return {
            ajaxSearchFunction  : ajaxSearchFunction,
            departmentCRUD      : departmentCRUD,
            pmghrDepartment     : pmghrDepartment,
            deleteValidation    : deleteValidation
        }
    })(jQuery);

// $(document).ready(function(){
//     pmghrDepartment.init();
// });
