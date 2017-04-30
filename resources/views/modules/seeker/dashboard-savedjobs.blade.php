
<div class="panel panel-default">
    <div class="panel-body ">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>Posted By</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>        
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $(function() {
    if ( $.fn.dataTable.isDataTable( '#example' ) ) {
    table1 = $('#example').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('savedjobsajax', array('country'=>$country)) }}",
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="{{asset($country . "/jobs/")}}/' +data.job_id+'">'+data.job_title  +'</a>';
            } },
            { data: null, render: function ( data, type, row ) {
                return data.company_name;
            } },
            { data: 'created_at', name: 'date_posted' },
            

           
            { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
        ]
    });
    table1.on( 'order.dt search.dt', function () {
        table1.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
    }
    else {
    table1 = $('#example').DataTable( {
        processing: true,
        serverSide: false,
        ajax: "{{ route('savedjobsajax', array('country'=>$country)) }}",
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="{{asset($country . "/jobs/")}}/' +data.job_id+'">'+data.job_title  +'</a>';
            } },
            { data: null, render: function ( data, type, row ) {
                return data.company_name;
            } },
            { data: 'created_at', name: 'date_posted' },
            

           
            { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
        ]
    } );
    table1.on( 'order.dt search.dt', function () {
        table1.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
}
 });

} );
</script>
