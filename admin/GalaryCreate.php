<?php require_once('./controller/GalaryController.php'); ?>
<?php
$galary = new GalaryController();
$Response = [];
$active = $galary->active;
$Galary = $galary->galary();
// $News = $Batch->getNews();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $galary->createGalary($_REQUEST, $_FILES);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Educafe</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('./partials/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('./partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create Galary</h1>
                        <a href="GalaryIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All Galary</a>
                    </div>
                    <?php if (isset($Response['status']) && !$Response['status']) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <span><B>Oops!</B> Some errors occurred in your form.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    .<div class="row">
                        <div class="col-md-7 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create at Galary</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-signin" >
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="categorisId">Assign Categoris</label>
                                            <select name="categorisId" id="categorisId" class="form-control">
                                                <option value="">~~Select Categoris~~</option>
                                                <?php 
                                                foreach($Galary as $items){
                                                ?>
                                            <option value="<?php echo $items['id']; ?>" <?php if (isset($_REQUEST['categorisId']) && $__REQUEST['categorisId'] == $items['id']) { echo "selected";} ?>><?php echo $items['categorisname'] ?></option>
                                            <?php
                                                } 
                                                ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="name" >Name</label>
                                                <input type="text" id="name" class="form-control form-control-user" placeholder="Name" name="name" required autofocus value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                                                <?php if (isset($Response['name']) && !empty($Response['name'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['name']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="isActive">Is Active</label>
                                            <select name="isActive" id="isActive" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['isActive']) && $_REQUEST['isActive'] == 1) { echo "selected";} ?>>Active </option>
                                                <option value="0" <?php if (isset($_REQUEST['isActive']) && $_REQUEST['isActive'] == 0) { echo "selected";} ?>>Deactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                        <div class="form-group">
                                        <label for="image">Image</label>
                                            <input  type="file" name="image" id="image" class="form-control" placeholder="Categoris Image" value="<?php if(isset($_FILES['image']))  { echo $_FILES['image'];}?>">
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                                            <button class="btn btn-md btn-primary btn-primary" type="submit">Save</button>
                                            <a href="GalaryIndex.php" class="btn btn-md btn-primary btn-danger">Cencle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once('./partials/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>

</body>

</html>