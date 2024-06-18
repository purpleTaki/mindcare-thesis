<?php
main_header(['admin ']);
?>
<!-- ############ PAGE START-->
<style>

</style>

<section>
    <div class="container">
        <!-- Profile Image -->
        <div class="card card-success card-outline" style="width: 80%; margin: 0.5rem auto;">
            <div class="card-body box-profile">
                <div class="text-center">
                    <!-- <?= var_dump($session) ?> -->
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/images/profile.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= ucfirst($session->fname) . ' ' . ucwords(substr(@$session->mname, 0, 1)) . '. ' . ucfirst($session->lname) ?></h3>

                <p class="text-muted text-center">Admin</p>

                <ul class="list-group list-group-unbordered mb-3 text-center">
                    <li class="list-group-item">
                        <b>Username:</b> <?= @$session->username ?>
                    </li>
                    <li class="list-group-item">
                        <b>Email:</b> <?= @$session->email ?>
                    </li>
                    <li class="list-group-item">
                        <b>Contact Num:</b> <?= @$session->cnum ?>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/admin/admin.js"></script>