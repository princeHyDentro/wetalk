/**
 * JOBs JS
 */

var pmghrPosition = (function($) {
    function ajaxSearchFunction(search_data,_url){
        pmghr.ajax('post',_url, search_data, function(result){
           console.log(result)
            setTimeout(function(){
                $( ".progress" ).fadeOut( "slow", function() {
                    data = searchHTML(result);
                    $('.add-search-data').html(data).fadeIn();
                });
            });
        });
    }
    function positionCRUD(type ,form_data,id,url,delete_wage){

        switch(type){
            case 'add':
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                dataType:'json',
                data: {
                    'wage-range'           : form_data,
                    'position-title' : $('#position_title').val(),
                    'position-type'  : $("#position-type").val(),
                    'department'     : $("#department").val()
                    },
                    success: function(result) {
                        if(result.success == 'success'){
                            $('#job-modal').modal('close');
                            $('#no_response').hide();
                            Materialize.toast('Successfully added Job!', 5000 ,'rounded green lighten-1');
                            appendResult = appendTableData(result);
                            $('#jobTable').prepend(appendResult);
                        }else{
                            errorResult(result)
                        }
                    }
                });
            break;
            case 'update':
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    url: url,
                    dataType:'json',
                    data: {
                        'wage-remove'    : delete_wage,
                        'wage-range'     : form_data,
                        'position-title' : $('#position_title').val(),
                        'position-type'  : $("#position-type").val(),
                        'department'     : $("#department").val(),
                        'position-id'    : $("#position-id").val()
                    },
                    success: function(result) {
                        if(result.success == 'success'){
                                $('#job-modal').modal('close');
                                Materialize.toast('Successfully updated Job!', 5000, 'rounded green lighten-1');
                                var pay, salary,
                                    pay_level_type = new Array() , 
                                    salary_range   = new Array();
                                $(result.wages).each(function(index, el) {
                                    var pay     =   [ "<span class='toUpper'>"+el.pay_level_type+"</span><br>" ].join();
                                    var salary  =   [ "<span>"+el.salary_range+" CAD</spna><br>" ].join();
                                    pay_level_type.push(pay);
                                    salary_range.push(salary);
                                });

                                var payLevel    = pay_level_type.join("");
                                var salaryRange = salary_range.join("");

                                created_at = moment(result.created_at).format('MMM D, YYYY  h:mm A');
                                updated_at = moment(result.updated_at).format('MMM D, YYYY  h:mm A');
                                var data_append = [
                                                    "<td class='align center'><input type='checkbox' name='checkboxlist' id='delete-"+result.id+"' class='delete' data-id='"+result.id+"' />",
                                                    "<label for='delete-"+result.id+"'></label>",
                                                    "<td>"+result.position_title+"</td>",
                                                    "<td>"+result.position_type+"</td>",
                                                    "<td>"+payLevel+"</td>",
                                                    "<td>"+salaryRange+"</td>",
                                                    "<td class='valign'>"+created_at+"</td>",
                                                    "<td class='valign'>"+updated_at+"</td>",
                                                    "<td class='valign center'>",
                                                    "<i  class='small material-icons edit' data-id='"+result.id+"' style='cursor: default;'>mode_edit</i>",
                                                    // "<i  class='center small material-icons single-delete' data-id='"+result.id+"' style='cursor: default;''>delete_forever</i>",
                                                    "</td>"
                                                ].join('');
                                    $('.position-'+id).html(data_append);
                        }else{
                            errorResult(result)
                        }
                    }
                });
            break;
            case 'delete':
            pmghr.ajax('delete',url+'/'+form_data, null, function(result){
                if(result == 'success'){ 
                    $('.company' + id).remove();
                    $('input[name=checkboxlist]:checked').map(function(){
                        $('.position-' + $(this).data('id')).remove();
                    }).get(); 
                   // $('#save-company').modal('close');
                    Materialize.toast('Successfully deleted Job!', 5000, 'rounded green lighten-1');
                    location.reload().delay(3000);
                }
            });
            break;
        }
    }
    function appendTableData(result){
        var pay, salary,
            pay_level_type = new Array() , 
            salary_range   = new Array();
        $(result.wages).each(function(index, el) {
            var pay     =   [ "<span class='toUpper'>"+el.pay_level_type+"</span><br>" ].join();
            var salary  =   [ "<span>"+el.salary_range+" CAD</spna><br>" ].join();
            pay_level_type.push(pay);
            salary_range.push(salary);
        });

        var payLevel    = pay_level_type.join("");
        var salaryRange = salary_range.join("");

        created_at  = moment(result.created_at).format('MMM D, YYYY  h:mm A');
        updated_at  = moment(result.updated_at).format('MMM D, YYYY  h:mm A');
        
        var data    = [ "<tr class='job" + result.id + " '>",
                        "<td class='align center'><input type='checkbox' name='checkboxlist' id='delete-"+result.id+"' class='delete' data-id='"+result.id+"' />",
                        "<label for='delete-"+result.id+"'></label>",
                        "<td>"+result.position_title+"</td>",
                        "<td>"+result.position_type+"</td>",
                        "<td>"+payLevel+"</td>",
                        "<td>"+salaryRange+"</td>",
                        "<td class='valign'>"+created_at+"</td>",
                        "<td class='valign'>"+updated_at+"</td>",
                        "<td class='valign center'>",
                        "<i  class='small material-icons edit' data-id='"+result.id+"' style='cursor: default;'>mode_edit</i>",
                        // "<i  class='center small material-icons single-delete' data-id='"+result.id+"' style='cursor: default;''>delete_forever</i>",
                        "</td></tr>"
                    ].join('');
            
            return data;
    }
    function searchHTML(data){

        var arr = new Array(), answer_data, each_answer_data, result;
        if(data != 'no response'){
            $('#no_response').hide();
            $.each(data, function(index,val){
                 var pay, salary,
                    pay_level_type = new Array() , 
                    salary_range   = new Array();
                $(val.wage_range).each(function(index, el) {
                    var pay     =   [ "<span class='toUpper'>"+el.pay_level_type+"</span><br>" ].join();
                    var salary  =   [ "<span>"+el.salary_range+" CAD</spna><br>" ].join();
                    pay_level_type.push(pay);
                    salary_range.push(salary);
                });

               var  payLevel    = pay_level_type.join("");
               var  salaryRange = salary_range.join("");

                    answer_data = new Array();
                    created_at  = moment(val.created_at).format('MMM D, YYYY  h:mm A');
                    updated_at  = moment(val.updated_at).format('MMM D, YYYY  h:mm A');

                var data    = [ "<tr class='with-response position-" + val.id + " '>",
                                "<td class='align center'><input type='checkbox' name='checkboxlist' id='delete-"+val.id+"' class='delete' data-id='"+val.id+"' />",
                                "<label for='delete-"+val.id+"'></label>",
                                "<td>"+val.position_title+"</td>",
                                "<td>"+val.position_type+"</td>",
                                "<td>"+payLevel+"</td>",
                                "<td>"+salaryRange+"</td>",
                                "<td class='valign'>"+created_at+"</td>",
                                "<td class='valign'>"+updated_at+"</td>",
                                "<td class='valign center'>",
                                "<i  class='small material-icons edit' data-id='"+val.id+"' style='cursor: default;'>mode_edit</i>",
                                // "<i  class='center small material-icons single-delete' data-id='"+result.id+"' style='cursor: default;''>delete_forever</i>",
                                "</td></tr>"
                            ].join('');

                answer_data.push(data);
                arr.push(answer_data);
            });
            result = arr.join('');
            return result;
        }else{
            var result =[ '<tr id="no_response"><td colspan="7"><center><h4>No Results</h4></center></td></tr>' ];
            return result;
        }
    }
    function confirmModal(){
        var checkValues = $('input[name=checkboxlist]:checked').map(function(){
            return  $(this).data('id');
        }).get();
        if(checkValues != ''){
            $('.confirm-delate').modal('open');
        }else{
            Materialize.toast('Please select the job to be deleted!', 5000, 'rounded green lighten-1');
        }
    }

    function jobDetails(result){
        $('.title-header').text('Edit Position Information');
        $('#add-new-job').hide();
        $('#update-job-button').show();
        
        $(result.wages).each(function(index, el) {
           $('#'+el.pay_level_type).attr('data-id', el.id);
           $('#'+el.pay_level_type).val(el.salary_range);
        });
        // return false;
        $("#position-id").val(result.id)
        $('#position_title').val(result.position_title);
        $('#position-type').find('option[value="'+result.position_type+'"]').prop('selected', true);
        $('#department').find('option[value="'+result.department_id+'"]').prop('selected', true);
        // $(':radio[value="'+result.pay_level_type+'"]').attr( 'checked', true );

        // data =  '<input value="'+result[0].salary_range+'" onkeypress="return pmghrPosition.isNumberKey(event);" class="pay-level" name="salary-range" type="text" id="salary-range" style="margin-bottom: 0px;" /><span><i>( Note: Separate the minimum and maximum amount by (-) Example: 0 - 100 )</i></span>';
        // $('.'+result[0].pay_level_type+'-level').html(data);
        // $('.'+result[0].pay_level_type+'-level').fadeIn();
    }

    function errorResult(result){
        $('.error').text('');
        $('.department').addClass('valid');
        $('.position-type').addClass('valid');
        $('.department').removeClass('invalid');
        $('.position-type').removeClass('invalid');
         $.each(result, function(key, value){
            $('.'+key).addClass('invalid');
            $('#'+key).addClass('invalid').next('label').attr('data-error', value[0]);
            $('#'+key+'-error').text(value[0]).next('label');
        });

       
    }
    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      if (charCode != 32 && charCode != 46 && charCode != 45 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
    return {
        ajaxSearchFunction:ajaxSearchFunction,
        positionCRUD    :positionCRUD,
        confirmModal:confirmModal,
        jobDetails  : jobDetails,
        isNumberKey :isNumberKey
    }

})(jQuery);