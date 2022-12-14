    <!-- load library jquery dan highcharts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/highcharts-more.js"></script>
    <!-- end load library -->
    <script type="text/javascript">
        $(function() {
            var chart;
            $(document).ready(function() {
                $.getJSON("<?php echo site_url('master/kontribusi/Tamalanrea_list'); ?>", function(json) {

                    chart0 = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container',
                            type: 'column'
                        },
                        title: {
                            text: 'Kontribusi Pemilih Terhadap Target Suara'
                        },
                        xAxis: {
                            categories: ['Tamalanrea', 'Kapasa', 'Tamalanrea Indah', 'Parang Loe', 'Bira', 'Tamalanrea Jaya', 'Buntusu', 'Kapasa Raya']
                        },
                        yAxis: {
                            title: {
                                text: 'Total DPT'
                            }
                        },
                        labels: {
                            items: [{
                                html: '',
                                style: {
                                    left: '50px',
                                    top: '18px',
                                    color: ( // theme
                                        Highcharts.defaultOptions.title.style &&
                                        Highcharts.defaultOptions.title.style.color
                                    ) || 'black'
                                }
                            }]
                        },
                        plotOptions: {
                            column: {
                                // stacking: 'percen',
                                dataLabels: {
                                    enabled: true,
                                    crop: false,
                                    overflow: 'none'
                                }
                            }
                        },





                        series: json
                    });;
                });

            });

        });
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
        <div class="row">
            <div class="col-lg-12">
                <!-- Main content -->
                <section class="content">
                    <!-- Custom Tabs -->

                    <!-- Small boxes (Stat box) -->
                    <div class="container" style="margin-top:20px">
                        <div>
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div id="container" style="min-width: 400px; height: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
            </div>
        </div>
    </div>
    </div>