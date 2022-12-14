<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    </h1>

    <table id="dpt-manggala" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No KTP</th>
                <th>Name</th>
                <th>Alamat</th>
                <th>RW</th>
                <th>RT</th>
                <th>Kelurahan</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#dpt-manggala').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('dpt/manggala_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>