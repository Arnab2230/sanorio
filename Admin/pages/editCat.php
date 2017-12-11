<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../Classes/categoryin.php';?>

<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL){

    }else {
        $id = $_GET['id'];
            }
?>

<?php
	$cat = new Category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$addcat = $cat->updateCategory($_POST, $id);
	}
?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#64B5F6; font-family: 'Poppins', sans-serif;">Edit Your Category Name</h1>
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
                                        <?php 
                                        $cat = new Category();
                                        $getCat = $cat->getAllcatby($id);
                                        if ($getCat) {
                                            
                                            while ($data = $getCat->fetch_assoc()) {
                                            
                                        ?>
                                		<div class="form-group" style="margin: 0 auto; width: 30%; border:1px solid #BBDEFB; padding: 15px 15px; border-radius: 5px;">
                                            <label>Category</label>
                                            <input type="text" name="catName" value="<?php echo $data['catName'];?>" class="form-control"/>
                                            <br/>
                                           <button type="submit" name="submit" class="btn btn-success">Update Category</button>
                                        </div>
                                        <?php } } ?>
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
