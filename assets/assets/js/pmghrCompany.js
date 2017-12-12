/**
 * company JS
 */

var pmghrCompany = (function($) {
    function ajaxSearchFunction(search_data,filter_by_department,imgPath){
        var arr = new Array(), answer_data, each_answer_data, result;
        pmghr.ajax('post','company/search', search_data, function(result,error){
            if(filter_by_department == 'Company Department'){
                if(result.fail){
                    $( ".progress" ).fadeOut( "slow", function() {
                        $('.department-data').html('<center><h5 style="padding-bottom:1rem;"> No Results</h5></center>')
                        $('.search-result').fadeIn();
                    });
                }else{
                    $('center').remove();
                    var result_data = searchByDepartment(result);
                    $('.department-data').append(result_data)
                }
            }else{
                setTimeout(function(){
                    $( ".progress" ).fadeOut( "slow", function() {
                        data = searchHTML(result,imgPath);
                        $('.add-search-data').html(data).fadeIn("slow");
                    });
                });
            }
        },function(){
        },function(){
            setTimeout(function(){
                $('.search-result').fadeIn();
                $( ".progress" ).hide();
            }, 1000);
        });
    }
    function companyCRUD(data,type,id){
        $("#no_response").hide();
        switch(type){
            case 'add':
                 var uploadUrl = 'company/store';
                 $('#company-form').ajaxSubmit({ 
                    type: 'POST',
                    url: uploadUrl,
                    data: data,
                    cache: false,
                    success: function (response) {
                        if(response.success == 'success'){
                            $('#save-company').modal('close');
                            Materialize.toast('Successfully added Company!', 5000 ,'rounded green lighten-1');
                            appendHTML(response);
                        }else{
                            errorMessage(response)
                        }
                    }
                });
            break;
            case 'update':
                setTimeout(function(){
                    var uploadUrl = 'company/update/'+id;
                     $('#company-form').ajaxSubmit({ 
                        type: 'POST',
                        url: uploadUrl,
                        data: data,
                        cache: false,
                        success: function (result) {
                            if(result.success){
                                var urlPath = result.imgPath+""+result.company_logo;
                                $('#save-company').modal('close');
                                url = "{{ url('departments') }}/"+id;
                                created_at = moment(result.created_at).format('MMM D, YYYY');
                                updated_at = moment(result.updated_at).format('MMM D, YYYY');
                                data_append = ['<td class="align center">',
                                '<input type="checkbox" name="checkboxlist" id="test'+id+'" class="delete" data-id="'+id+'" />',
                                '<label for="test'+result.id+'"></label>',
                                '</td>',
                                '<td id="cmp'+id+'">'+result.company_name+'</td>',
                                '<td id="eml'+id+'">'+result.email+'</td>',
                                '<td id="add'+id+'">'+result.address+'</td>',
                                '<td id="cnt'+id+'">'+result.contact+'</td>',
                                '<td id="cnt'+id+'"><a href="">click here</a></td>',
                                '<td>',
                                   ' <div class="thumbnail">',
                                     ' <img src="'+urlPath+'" class="portrait" alt="Image" />',
                                    '</div>',
                                '</td>',
                                '<td>'+created_at+'</td>',
                                '<td>'+updated_at+'</td>',

                                '<td class="valign center">',
                                '<span img-path="'+urlPath+'"  class="center small material-icons edit" data-id="'+id+'" style="cursor: default;">mode_edit</span>',
                                '</td>'].join('');
                                $('.company'+id).html(data_append);
                                Materialize.toast('Successfully updated Company!', 5000, 'rounded green lighten-1');
                            }else{
                                errorMessage(result);
                            }
                        }
                    });
                }, 1000);
            break;
            case 'delete':
                pmghr.ajax('delete', 'company/destroy/'+data, null, function(result){
                    if(result == 'success'){ 
                        $('.company' + id).remove();
                        $('input[name=checkboxlist]:checked').map(function(){
                            $('.company' + $(this).data('id')).remove();
                        }).get(); 
                        $('#save-company').modal('close');
                        Materialize.toast('Successfully deleted Company!', 5000, 'rounded green lighten-1');
                    }
                });
            break;
        }
    }
    function appendHTML(result){
   var urlPath = result.imgPath+""+result.company_logo;
    url = "{{url('departments')}}/"+result.id;
    created_at = moment(result.created_at).format('MMM D, YYYY  h:mm A');
    updated_at = moment(result.updated_at).format('MMM D, YYYY  h:mm A');
    var data =[  "<tr class='company" + result.id + " '>",
    "<td class='align center'><input type='checkbox' name='checkboxlist' id='test"+result.id+"' class='delete' data-id='"+result.id+"' />",
    "<label for='test"+result.id+"'></label>",
    '<td id="cmp'+result.id+'">'+result.company_name+'</td>',
    '<td id="eml'+result.id+'">'+result.email+'</td>',
    '<td id="add'+result.id+'">'+result.address+'</td>',
    '<td id="cnt'+result.id+'">'+result.contact+'</td>',
    '<td><a href="">click here</a></td>',
    '<td>',
       ' <div class="thumbnail">',
         ' <img src="'+urlPath+'" class="portrait" alt="Image" />',
        '</div>',
    '</td>',
    '<td>'+created_at+'</td>',
    '<td>'+updated_at+'</td>',
    // "<td class='valign center'><a href='"+url+"'><i class='material-icons'>launch</i> view</a></td>",
    "<td class='valign center'>",
     '<span img-path="'+urlPath+'"  class="center small material-icons edit" data-id="'+result.id+'" style="cursor: default;">mode_edit</span>',
        // "<i  class='center small material-icons single-delete' data-id='"+result.id+"' style='cursor: default;''>delete_forever</i>",
        "</td></tr>"
        ].join('');
        $('#tableData').prepend(data);
    }
    function errorMessage(result){
        if(result){
            $('#company_name-error').text('');
            $('#email-error').text('');
            $('#address-error').text('');
            $('#contact-error').text('');
            $.each(result, function(key, value){
                $('#'+key).addClass('invalid').next('label').attr('data-error', value[0]);
                $('#'+key+'-error').text(value[0]).next('label');
            });
        }
    }
    function companyDetails(id){
        $('.title-header').text('Edit Company Information');
        $('#add-new-company').hide();
        $('#update-d-company').show();
        $('#save-company').modal('open');

        $('#company_name').val($("#cmp"+id).text());
        $('#email').val($("#eml"+id).text());
        $('#contact').val($("#cnt"+id).text());
        $('#address').val($("#add"+id).text());

        $('#company_name').addClass('valid');
        $('#email').addClass('valid');
        $('#contact').addClass('valid');
        $('#address').addClass('valid');
        $('#company-id').attr('value',id); 
    }
    function searchByDepartment(result){
        var arr = new Array(), header, body, result;

        if(result){
            $.each(result, function(company_name,data){

                var url = "{{url('departments')}}/"+data.company_id+"/"+data.id;
                        created_at = moment(data.created_at).format('MMM D, YYYY  h:mm A');
                        updated_at = moment(data.updated_at).format('MMM D, YYYY  h:mm A');
                answer_data = new Array();
                body = new Array();
                each_answer_data = [
                '<li><div class="collapsible-header collapsible-body-col"><i class="material-icons more">keyboard_arrow_right</i>',
                '<i class="material-icons less" style="display: none">keyboard_arrow_down</i> '+data.company_name+'</div>',
                '<div class="collapsible-body collapsible-body-col">',
                '<table class="bordered striped" id="">',
                '<thead>',
                    '<tr>',
                        '<th class="align center ">',
                            '<span class="material-icons">subdirectory_arrow_right</span>',
                        '</th>',
                        '<th>Department</th>',
                        '<th>Company Assign</th>',
                        '<th>Created Date</th>',
                        '<th>Modified Date</th>',
                    '</tr>',
                '</thead>',
                '<tbody class="table-data add-search-data">',
                '<tr class="with-response">',
                        '<td class="align center"><span class="material-icons">subdirectory_arrow_right</span></td>',
                        '<td>'+data.department_title+'</td>',
                        '<td>'+data.company_name+'</td>',
                        '<td>'+created_at+'</td>',
                        '<td>'+updated_at+'</td>',
                    '</tr>',
                   ].join(' ');
                answer_data.push(each_answer_data);
                answer_data = answer_data.join('')+ "</tbody></table></div></li>";
                arr.push(answer_data);
            });
            result1 = arr.join('');
        }
        return result1;
    }
    function searchHTML(result,imgPath){
        var arr = new Array();
        if(result != 'no response'){
            $('#no_response').hide();
            $.each(result, function(index,val){
                answer_data = new Array();
                var imgURL = imgPath+"/company_logo/"+val.company_logo;
                url = "{{url('departments')}}/"+val.id;
                created_at = moment(val.created_at).format('MMM D, YYYY  h:mm A');
                updated_at = moment(val.updated_at).format('MMM D, YYYY  h:mm A');
                var data =[  "<tr class='with-response company" + val.id + " '>",
                "<td class='align center'><input type='checkbox' name='checkboxlist' id='test"+val.id+"' class='delete' data-id='"+val.id+"' />",
                "<label for='test"+val.id+"'></label>",
                 '<td id="cmp'+val.id+'">'+val.company_name+'</td>',
                 '<td id="eml'+val.id+'">'+val.email+'</td>',
                 '<td id="add'+val.id+'">'+val.address+'</td>',
                 '<td id="cnt'+val.id+'">'+val.contact+'</td>',
                 '<td><a href="">click here</a></td>',
                 '<td>',
                 ' <div class="thumbnail">',
                 ' <img src="'+imgURL+'" class="portrait" alt="Image" />',
                 '</div>',
                 '</td>',
                "<td>"+created_at+"</td>",
                "<td>"+updated_at+"</td>",
                // "<td class='valign center'><a href='"+url+"'><i class='material-icons'>launch</i> view</a></td>",
                "<td class='valign center'>",
                "<i  img-path='"+val.company_logo+"'  class='small material-icons edit' data-id='"+val.id+"' style='cursor: default;'>mode_edit</i>",
                // "<i  class='center small material-icons single-delete' data-id='"+val.id+"' style='cursor: default;''>delete_forever</i>",
                "</td></tr>"
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
    

    return {
        ajaxSearchFunction: ajaxSearchFunction,
        companyCRUD: companyCRUD,
        companyDetails:companyDetails,
    }

})(jQuery);
// $(document).ready(function(){
//     pmghrCompany.init();
// });