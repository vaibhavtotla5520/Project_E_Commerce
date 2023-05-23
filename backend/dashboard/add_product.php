<?php
include "header.php";
?>
<!-- end navbar side -->
<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
        <!--End Page Header -->
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="request_handler.php" method="post" enctype="multipart/form-data"x>
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" type="text" name="p_id">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" placeholder="" type="text" name="p_name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="4" name="p_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" placeholder="" type="tel" name="p_price">
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" multiple="multiple" name="p_images[]">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <textarea class="form-control" rows="4" name="p_category"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <textarea class="form-control" rows="4" name="p_tags"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="p_add">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Elements -->
</div>
</div>


<div class="row">
</div>
</div>
<?php
include "footer.php";
?>