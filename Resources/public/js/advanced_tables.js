var TableAdvanced = function () {

    var crud_table = function () {
        var table = $('#crud-table');

        var oTable = table.dataTable({
            "aoColumnDefs": [{
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'asc']
            ],
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 5
        });

        var tableWrapper = $('#crud-table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        var tableColumnToggler = $('#crud-table_column_toggler');

        /* modify datatable control inputs */
        jQuery('.dataTables_filter input', tableWrapper).addClass("form-control input-small input-inline"); // modify table search input
        jQuery('.dataTables_length select', tableWrapper).addClass("form-control input-small"); // modify table per page dropdown
        jQuery('.dataTables_length select', tableWrapper).select2(); // initialize select2 dropdown

        /* handle show/hide columns*/
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            crud_table();
        }

    };

}();
