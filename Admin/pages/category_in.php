<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../Classes/categoryin.php';?>
<?php
	$cat = new Category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$addcat = $cat->insertCategory($_POST);
	}
?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#64B5F6; font-family: 'Poppins', sans-serif;">Insert Your Category Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php
                            	if (isset($addcat)) {
                            		echo $addcat;
                            	}else{
                            		echo "Category Panel";
                            	}
                            ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart">

                                	<form action="" method="post">
                                		<div class="form-group" style="margin: 0 auto; width: 30%; border:1px solid #BBDEFB; padding: 15px 15px; border-radius: 5px;">
                                            <label>Category</label>
                                            <input type="text" name="catName"  class="form-control"/>
                                            <br/>
                                           <button type="submit" name="submit" class="btn btn-success">Add Category</button>
                                        </div>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                
                
               
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
              

    </div>
    <!-- /#wrapper -->


<?php include 'inc/footer.php';?>
