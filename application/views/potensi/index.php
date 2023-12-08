   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <div class="content-header">
           <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0 text-dark"><?= $title; ?></h1>
                   </div><!-- /.col -->
                   <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>/.col -->
               </div><!-- /.row -->
           </div><!-- /.container-fluid -->
       </div>
       <!-- /.content-header -->

       <!-- Main content -->
       <section class="content">
           <div class="container-fluid">
               

           </div><!--/. container-fluid -->
       </section>
       <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- load library jquery dan highcharts -->
   <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/highcharts-more.js"></script>
   <!-- end load library -->
   <script type="text/javascript">
       $(document).ready(function() {
           var options = {
               chart: {
                   renderTo: 'mygraph',
                   plotBackgroundColor: null,
                   plotBorderWidth: null,
                   plotShadow: false
               },
               title: {
                   text: 'Potensi Jaring Suara'
               },
               tooltip: {
                   formatter: function() {
                       return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                   }
               },
               plotOptions: {
                   pie: {
                       allowPointSelect: true,
                       cursor: 'pointer',
                       dataLabels: {
                           enabled: true,
                           color: '#000000',
                           connectorColor: 'green',
                           formatter: function() {
                               return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) + ' % ';
                           }
                       },
                       showInLegend: true
                   }
               },
               series: [{
                   type: 'pie',
                   name: 'Browser share',
                   data: []
               }]
           }

           $.getJSON("<?php echo site_url('potensi/Chart_list'); ?>", function(json) {
               options.series[0].data = json;
               chart = new Highcharts.Chart(options);
           });

       });
   </script>