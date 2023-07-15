$(document).on('click', '.read-foc', function (e) {
    e.preventDefault(); 
    var foc = $(this).data('foc');
    $.ajax({
        url: baseUrl + '/reports/foc-detail',
        data: {foc : foc},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            
            if (data != false) { 
                var content =   '<div class="row row-lg">'+
                                    '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                        '<div class="row row-lg">'+
                                            '<div class="col-md-6">' +
                                            '<h4>FOC No.: '+data.foc.foc_no+'</h4>' +
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<p class="pull-right">Date: '+data.foc.created_on+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>' +
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-md-6">'+
                                           ' <p>Customer Name: <u>'+data.foc.customer_name+'</u></p>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<p>Customer Pan: <u>'+((data.foc.customer_pan == 0) ? 'N/A' : data.foc.customer_pan)+'</u></p>'+
                                        '</div>' +
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">'+
                                    '<table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th width="27">#</th>'+
                                                '<th width="100">Particular</th>'+
                                                '<th width="50">Quantity</th>'+
                                               ' <th width="50">Price</th>'+
                                                '<th width="100">Total</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>';
                            j=0;
                            for(i=0; i<data.data.length; i++) { 
                                j++;
                                total = parseInt(data.data[i].quantity) * parseFloat(data.data[i].price);
                                content += '<tr>'+
                                                '<td>'+j+'</td>';

                                                if(data.data[i].type == item_type['regular']) {
                                                    content +=  '<td>'+data.data[i].menu_item+'</td>';
                                                }else{
                                                    content +=  '<td>Special-Item('+data.data[i].special_item_name+')</td>';
                                                }
                                                
                                    content +=  '<td>'+data.data[i].quantity+'</td>'+
                                                '<td>Rs.'+numberFormat(data.data[i].price)+'</td>'+
                                                '<td>Rs.'+numberFormat(total)+'</td>'+
                                            '</tr>';
                            }
                            content += '</tbody>'+
                                    '</table>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-md-12">'+
                                            '<p>Created by : <u class="caps">'+data.foc.user_name+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                
                $('.modal-read-foc .foc-header').html('Report : FOC-' + data.foc.foc_no);
                $('.modal-read-foc .foc-content').html(content);
                $('.modal-read-foc').modal('show');

            }
            else {
               typeAlertRedirect('Error!', 'Could not fetch data at this time.', 'error', '');
            }
        }
    });
});