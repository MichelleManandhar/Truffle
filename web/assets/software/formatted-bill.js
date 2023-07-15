$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target_id = $(e.target).attr("href");
    var jqTable = $(target_id).find("table");
    var oTableTools = TableTools.fnGetInstance( jqTable[0] );
    if (oTableTools != null && oTableTools.fnResizeRequired()){
        /* A resize of TableTools' buttons and DataTables' columns is only required on the
         * first visible draw of the table
         */
        jqTable.dataTable().fnAdjustColumnSizing();
        oTableTools.fnResizeButtons();
    }
});