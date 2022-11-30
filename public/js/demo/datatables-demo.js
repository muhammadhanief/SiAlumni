// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
    $('#table-alumni').DataTable({
        // fixed columns
        scrollX: true,
        scrollY: true,
        scrollCollapse: true,
        paging: true,
        // fixed header
        fixedHeader: true,
        // responsive
        responsive: true,
        // search
        searching: true,
        // ordering

        // info
        info: true,
        // length change
        lengthChange: true,
        // length menu
        // lengthMenu: [


        //     [10, 25, 50, -1],
        //     [10, 25, 50, "All"]
        // ],
        fixedColumns: {
            left: 1,
            right: 1
        }
    });
});