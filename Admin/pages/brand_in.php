<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../Classes/brand.php';?>
<?php
	$brand = new Brand();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$addbrand = $brand->insertBrand($_POST);
	}
?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#64B5F6; font-family: 'Poppins', sans-serif;">Insert Your Brand Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php
                            	if (isset($addbrand)) {
                            		echo $addbrand;
                            	}else{
                            		echo "Brand Panel";
                            	}
                            ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart">

                                	<form action="" method="post">
                                		<div class="form-group" style="margin: 0 auto; width: 30%; border:1px solid #BBDEFB; padding: 15px 15px; border-radius: 5px;">
                                            <label>Brand</label>
                                            <input type="text" name="brandName"  class="form-control"/>
                                            <br/>
                                           <button type="submit" name="submit" class="btn btn-success">Add Brand</button>
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
