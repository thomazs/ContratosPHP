</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<?php if (isset($_has_data_tables) && $_has_data_tables){ ?>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('.dataTables').DataTable({
                responsive: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
                }

                <?php if (isset($_has_table_buttons) && $_has_table_buttons && isset($_table_buttons)){ ?>
                ,dom: 'Bfrtip',
                buttons: {
                    buttons: [
                    <?php
                    $kc = 0;
                    foreach($_table_buttons as $tb){
                        echo ($kc++ > 0 ? ',' : '');
                    ?>

                        {
                            text: '<?=$tb['text'];?>',
                            className: 'btn btn-primary btn-lg col-lg-2',
                            action: function ( e, dt, node, config ) {
                                <?=$tb['action'];?>

                            }
                        }
                    <?php } ?>
                    ]
                }
                <?php } ?>

            });
        });
    </script>
<?php } ?>

</body>

</html>