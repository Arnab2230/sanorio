<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../Classes/brand.php';?>
<?php include '../../Classes/categoryin.php';?>
<?php include '../../Classes/product.php';?>
<?php
    $cat = new Category();
	$brand = new Brand();
    $pd = new Product();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$addproduct = $pd->insertProduct($_POST, $_FILES);
	}
?>
            <div id="page-wrapper"  style="min-height: 755px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#64B5F6; font-family: 'Poppins', sans-serif;">Insert Your Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="min-height: 775px;">
                        <div class="panel-heading">
                            <?php
                            	if (isset($addproduct)) {
                            		echo $addproduct;
                            	}else{
                            		echo "Product";
                            	}
                            ?>
                        </div>
        <!-- /.panel-heading -->
             <div class="panel-body">
                <div class="flot-chart">
                  <div class="flot-chart-content" id="flot-line-chart">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="margin: 0 auto; width: 45%; border:1px solid #BBDEFB; padding: 15px 15px; border-radius: 5px;">            
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="productName"  class="form-control"/>  
                                        </div>
                                        <div class="form-group">
                                              <label for="sel1">Select Product Category:</label>
                                              <select class="form-control" name="catId">
                                            <?php 
                                        
                                            $getCat = $cat->getAllcat();
                                            if ($getCat) {
                                            
                                            while ($data = $getCat->fetch_assoc()) {
                                            
                                         ?>
                                        <option value="<?php echo $data['id'];?>"><?php echo $data['catName'];?></option>
                                        <?php } } ?>
                                              </select>
                                        </div>
                                         <div class="form-group">
                                              <label for="sel1">Select Product Brand:</label>
                                           
                                              <select class="form-control" name="brandId">
                                                   <?php 
                                        
                                        $getBrand = $brand->getAllbrand();
                                        if ($getBrand) {
                                           
                                            while ($data = $getBrand->fetch_assoc()) {
                                           
                                        ?>
                                                <option value="<?php echo $data['id'];?>"><?php echo $data['brandName'];?></option>
                                             <?php } } ?>   
                                              </select>
                                        
                                        </div>
                    <div class="form-group">
                      <label for="comment">Product Details:</label>
                      <textarea class="form-control" name="body" rows="5" id="comment"></textarea>
                    </div>       
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="price"  class="form-control"/>  
                    </div>               
                                            <!-- COMPONENT START -->
                    <div class="form-group">
                        <label for="sel1">Product Picture:</label>
                        <div class="input-group input-file" name="image">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-choose" type="button">Choose</button>
                            </span>
                            <input name="image" class="form-control" placeholder='Choose a Picture...' />
                            <span class="input-group-btn">
                                 <button class="btn btn-warning btn-reset" type="button">Reset</button>
                            </span>
                        </div>
                    </div>
                    <!-- COMPONENT END -->
                     <div class="form-group">
                          <label for="sel1">Select Product Type:</label>
                          <select class="form-control" id="type" name="type">
                            <option value="1">Featured</option>
                            <option value="2">Non-featured</option>
                            
                          </select>
                        </div> 
                                        <br/>
                                           <button type="submit" name="submit" class="btn btn-success">Add Product</button>
                                    </div>
                        </div>
                     </form>
                                	

             </div>                
           </div>
       </div>
         <!-- /.panel-body -->
       </div>
     <!-- /.panel -->
                
                
                
                
               
               
            </div>
            <!-- /.row -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
    function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file();
});
</script>
</body>

</html>
