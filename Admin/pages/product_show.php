<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../Classes/product.php';?>

<?php
   $pd = new Product();
     if (isset($_GET['delpd'])) {
        $id = $_GET['delpd'];
        $delpd = $pd->deleteCat($id);
    }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php 
                            if (isset($delpd)) {
                                echo $delpd;
                            }else{
                                echo "DataTables Advanced Tables";
                            }
                            ?>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Picture</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                        $getPd = $pd->getAllproduct();
                                        if ($getPd) {
                                            $i = 0;
                                            while ($data = $getPd->fetch_assoc()) {
                                            $i++;
                                    ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td class="center"><img src="<?php echo $data['image'];?>" alt= "No Image" height="auto" width="40px" /></td>
                                        <td class="center"><?php echo $data['productName'];?></td>
                                        <td class="center"><?php echo $data['catName'];?></td>
                                        <td class="center"><?php echo $data['brandName'];?></td>
                                        <td class="center"><?php echo $data['body'];?></td>
                                        <td class="center"><?php echo $data['price'];?>K.G</td>
                                        <td class="center"><?php 
                                            if ($data['type'] == "1") {
                                               echo "Featurd";
                                            }elseif ($data['type'] == "2") {
                                                echo "Non-Featured";
                                            }else{
                                                echo "No Type";
                                            }
                                        ?></td>
                                        <td class="center"><?php echo $data['date'];?></td>
                                        
                                        <td class="center" style="width: 20px;"><a href="editPd.php?id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm">
                                          <span class="glyphicon glyphicon-edit"></span> Edit
                                        </a></td>
                                        <td class="center" style="width: 20px;"><a onclick="return confirm('Are you Sure Want to Delete!')" href="?delpd=<?php echo $data['id'];?>" class="btn btn-info btn-sm">
                                         <span class="glyphicon glyphicon-trash"></span> Trash 
                                         </a></td>
                                    </tr>
                                 <?php } } ?>  
                                </tbody>
                            </table>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

                
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
