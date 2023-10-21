<?php require_once('./controller/EventController.php'); ?>
<?php
$event = new EventController();
$Response = [];
$active = $event->active;
$data = $event->Eventedit($_REQUEST['id']);
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $event->EventUpdate($_REQUEST, $_FILES);

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
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $active; ?></h1>
                        <a href="EventIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="eventName" >Event Name</label>
                                                <input type="text" id="eventName" class="form-control form-control-user" placeholder="Enter Title " name="eventName" required autofocus value="<?php if (isset($_POST['eventName'])) {
                                                                                                                                                                                            echo $_POST['eventName'];
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo $data['eventName'];
                                                                                                                                                                                        } ?>">
                                                <?php if (isset($Response['eventName']) && !empty($Response['eventName'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['eventName']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="eventStartDate" >Event Start Date</label>
                                                <input type="date" id="eventStartDate" class="form-control form-control-user" placeholder="Event Start Date" name="eventStartDate" required autofocus value="<?php if (isset($_POST['eventStartDate'])) {
                                                                                                                                                                                            echo $_POST['eventStartDate'];
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo $data['eventStartDate'];
                                                                                                                                                                                        } ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="eventEndDate" >Event End Date</label>
                                                <input type="date" id="eventEndDate" class="form-control form-control-user" placeholder="Event End Date" name="eventEndDate" required autofocus value="<?php if (isset($_POST['eventEndDate'])) {
                                                                                                                                                                                            echo $_POST['eventEndDate'];
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo $data['eventEndDate'];
                                                                                                                                                                                        } ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="vanue" >Vanue</label>
                                                <input type="text" id="vanue" class="form-control form-control-user" placeholder="Vanue" name="vanue" required autofocus value="<?php if (isset($_POST['vanue'])) {
                                                                                                                                                                                                echo $_POST['vanue'];
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo $data['vanue'];
                                                                                                                                                                                            } ?>">
                                                <?php if (isset($Response['vanue']) && !empty($Response['vanue'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['vanue']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="organizer" >Organizer</label>
                                                <input type="text" id="organizer" class="form-control form-control-user" placeholder=" Enter ShortDescription " name="organizer" required autofocus value="<?php if (isset($_POST['organizer'])) {
                                                                                                                                                                                                                                echo $_POST['organizer'];
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                echo $data['organizer'];
                                                                                                                                                                                                                            } ?>">
                                                <?php if (isset($Response['organizer']) && !empty($Response['organizer'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['organizer']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="sponser" >Sponser</label>
                                                <input type="text" id="sponser" class="form-control form-control-user" placeholder=" Enter ShortDescription " name="sponser" required autofocus value="<?php if (isset($_POST['sponser'])) {
                                                                                                                                                                                                                                echo $_POST['sponser'];
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                echo $data['sponser'];
                                                                                                                                                                                                                            } ?>">
                                                <?php if (isset($Response['sponser']) && !empty($Response['sponser'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['sponser']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="eventDetails" >Event Details</label>
                                                <textarea name="eventDetails" id="eventDetails" cols="30" rows="10" class="form-control" placeholder="Event Details"><?php if (isset($_POST['eventDetails'])) {echo $_POST['eventDetails']; } else {echo $data['eventDetails'];} ?></textarea>
                                                <?php if (isset($Response['eventDetails']) && !empty($Response['eventDetails'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['eventDetails']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="isActive">Is Active</label>
                                            <select name="isActive" id="isActive" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['isActive']) && $_REQUEST['isActive'] == 1) {
                                                                        echo "selected";
                                                                    } elseif ($data['isActive'] == 1) {
                                                                        echo "selected";
                                                                    } ?>>Active </option>
                                                <option value="0" <?php if (isset($_REQUEST['isActive']) && $_REQUEST['isActive'] == 0) {
                                                                        echo "selected";
                                                                    } elseif ($data['isActive'] == 0) {
                                                                        echo "selected";
                                                                    } ?>>Deactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="../<?php echo $data['image'] ?>" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" id="image" class="form-control" placeholder=" image">
                                                <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                            <a href="EventIndex.php" class="btn btn-danger">Cancle</a>
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
     <script src="./assets/vendor/ckeditor_4.22.1_full/ckeditor/ckeditor.js"></script>
    <script>  
        CKEDITOR.replace( 'eventDetails' );
     </script>



</body>

</html>