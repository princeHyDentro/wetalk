 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#admin-staff-ticket-table').DataTable({ 
        
        "processing": true, 
        "serverSide": true,
        "order": [],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_all_pending_ticket_for_administrator",
            "type": "POST",

        },
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
        ],
        dom: '<"toolbar">Bfrtip',
        buttons: [
                    {
                        text: '<i class="fa fa-refresh"></i> Reload List',
                        action: function ( e, dt, node, config ) {
                           reload_table();
                        }
                    },
                ]
    });
    
    $('#filter-status').on('change' , function(){
        // alert(this.value)
        table.search( this.value ).draw();
    });
    $('#search_tickets').on('keyup' , function(){
        table.search( this.value ).draw();
    });
});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
    admin_pending_ticket_notification();
}


function admin_pending_ticket_notification(){
        var arr   = [];
        $.ajax({
            url : "administrator_get_notify",
            type: "POST",
            data:{
                'requestor_id' : "",
            },
            success: function(data)
            {
                result = $.parseJSON(data)
                if(data)
                {
                   if(result.length > 0){
                        $('.new-notification-admin').html(result.length);  
                        Materialize.toast('<i class="material-icons">notifications</i> Ticket Recieved!', 3000, 'rounded'); 

                        $.each(result, function(index, val) {
                            title = (val.request_for == 'update') ? "Request For Applicant Update" : "Request For Applicant Delete";
                            data = [
                                    '<li>',
                                        '<a href="ticket_complete_information/'+val.id+'"><i class="material-icons">',
                                    ' assignment </i> Ticket '+title+'</a></li>'
                                ].join('');
                            arr.push(data);
                        });  

                        head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">'+result.length+'</span></h5></li></li><li class="divider"></li>'].join('');
                        result = arr.join('');
                        $('.notify-collection').html(head+result);      
                    }else{
                        head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">0</span></h5></li></li><li class="divider"></li>'].join('');
                        $('.notify-collection').html(head);  
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({   title: "Error deleting data!",   
                     text: "I will close in 2 seconds.",   
                     timer: 2000,  
                     icon: "error", 
                     type: "error",
                     showConfirmButton: false 
                });
            }
        });
}



