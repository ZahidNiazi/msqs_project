// Call the dataTables jQuery plugin
$(document).ready(function() {
  var table = $('#datatable-buttons').DataTable( {
      processing: true,
      // fixedHeader: true,
      // fixedHeader: {
      //     headerOffset: 70
      // },
      dom: 'lBfrtip',
      order: [[ 0, "desc" ]],
      lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      buttons: [
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Report Data'
        },
        {
            extend: 'excelHtml5',
            title: 'Report Data',
        },
        'print'
      ],
  });

    $('#datatable-buttons tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    });

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });




    //SIMPLE TABLE FIXED HEADER
    // $('.fixed-header').DataTable({
    //     fixedHeader: true,
    // });
// });


//
//
//
// // Call the dataTables jQuery plugin
// $(document).ready(function() {
//     var recotable = $('#reco-dataTable').DataTable( {
//         processing: true,
//         fixedHeader: true,
//         dom: 'lBfrtip',
//         order: [[ 0, "desc" ]],
//         lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
//         buttons: [
//             // {
//             //     extend: 'pdfHtml5',
//             //     orientation: 'landscape',
//             //     pageSize: 'A4',
//             //     title: 'Report Data'
//             // },
//             {
//                 extend: 'excelHtml5',
//                 title: 'Report Data',
//                 exportOptions: {
//                     columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,34,35,37,38,39,40 ]
//                 },
//             },
//             // 'print'
//         ],
//     });
//
//     $('#reco-dataTable tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" />' );
//     });
//
//     // Apply the search
//     recotable.columns().every( function () {
//         var that = this;
//
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         });
//     });
// });
//
// $(document).ready(function() {
//     var comptable = $('#comp-dataTable').DataTable( {
//         fixedColumns:   {
//             left: 3,
//         },
//         processing: true,
//         fixedHeader: true,
//         dom: 'lBfrtip',
//         order: [[ 0, "desc" ]],
//         lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
//         buttons: [
//             {
//                 extend: 'pdfHtml5',
//                 orientation: 'landscape',
//                 pageSize: 'A4',
//                 title: 'Report Data'
//             },
//             {
//                 extend: 'excelHtml5',
//                 title: 'Report Data',
//
//
//             },
//             'print'
//         ],
//     });
//
//     $('#comp-dataTable tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" />' );
//     });
//
//     // Apply the search
//     comptable.columns().every( function () {
//         var that = this;
//
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         });
//     });
});