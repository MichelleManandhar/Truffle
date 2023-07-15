// $(document).ready(function(){
//     $(document).on('click', '.xml', function (e) {
//         e.preventDefault(); 
//         $.ajax({
//             url: baseUrl + '/reports/xml-file',
//             data: {to : to_date , from : from_date},
//             type: 'POST',
//             async: false,
//             success: function (response) { 
//                 var data = $.parseJSON(response); 
//                 if (data.status == 'true') { 
//                     $('.trigger-xml').attr('href',data.file);
//                     $('.trigger-xml').trigger("click");
//                     // typeAlert('Success!', 'Downloaded sucesfully.', 'success', '');
//                 }
//                 else {
//                    typeAlert('Error!', 'Could not download.', 'error', '');
//                 }
//             }
//         });
//     });
// });