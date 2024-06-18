<?php
main_header(['appointment']);
?>
<!-- ############ PAGE START-->
<style>

</style>

<section>
    <div class="container">
        <div class="card pt-4">
            <div class="card-header">
                <h2>APPOINTMENT LIST</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="height: 350px; overflow: auto;">
                        <h3 class="ml-2 mb-3">Appointments from Students</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Student ID no.</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Actions</th>
                                    <th class="text-center">Remarks to Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($appointments)) {
                                    foreach ($appointments as $k => $val) {
                                        $status = ($val->Status == '1' ? 1 : ($val->Status == '0' ? 0 : 2));

                                ?>
                                        <tr>
                                            <td class="text-center"><?= @$k + 1 . '.' ?></td>
                                            <td class="text-center"><?= @$val->appointer_name ?></td>
                                            <td class="text-center"><?= @$val->username ?></td>
                                            <td class="text-center"><?= date("m-d-Y", strtotime(@$val->Date)) ?></td>
                                            <td class="text-center"><?= date('h:i a', strtotime(@$val->fromTime)) . '-' . date('h:i a', strtotime(@$val->toTime)) ?></td>
                                            <?php if ($session->usertype == 3) {
                                            ?>
                                                <td class="text-center"><?= @$val->Status ?></td>
                                            <?php
                                            } else { ?>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-success btn-modal" data-toggle="modal" data-target="#modal-remarks" data-stat="1" data-id="<?= @$val->ID ?>" <?= $status == 1 ? 'disabled' : ''; ?>><i class="fas fa-check"></i></button>
                                                    <button type="button" class="btn btn-primary btn-status" data-stat="0" data-id="<?= @$val->ID ?>" <?= $status == 0 ? 'disabled' : ''; ?>><i class="fas fa-spinner"></i></button>
                                                    <button type="button" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#modal-remarks" data-stat="2" data-id="<?= @$val->ID ?>" <?= $status == 2 ? 'disabled' : ''; ?>><strong>X</strong></button>
                                                </td>
                                                <td class="text-center"><?= @$val->Remarks ?? '-' ?></td>
                                            <?php } ?>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<td colspan='6' class='text-center'>No Appointments available</td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12" style="height: 350px; overflow: auto;" <?= @$session->usertype == 3 ? 'hidden' : '' ?>>
                        <h3 class="ml-2 mb-3">My Appointments</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Student ID no.</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Remarks from Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($appointments_c)) {
                                    foreach ($appointments_c as $k => $val) {
                                        $status = ($val->Status == '1' ? 1 : ($val->Status == '0' ? 0 : 2));
                                ?>
                                        <tr>
                                            <td class="text-center"><?= @$k + 1 . '.' ?></td>
                                            <td class="text-center"><?= ucfirst(@$val->fname) . ' ' . ucfirst(@$val->lname) ?></td>
                                            <td class="text-center"><?= @$val->username ?></td>
                                            <td class="text-center"><?= date("m-d-Y", strtotime(@$val->Date)) ?></td>
                                            <td class="text-center"><?= date('h:i a', strtotime(@$val->fromTime)) . '-' . date('h:i a', strtotime(@$val->toTime)) ?> </td>
                                            <td class="text-center">
                                                <?= @$status ?>
                                            </td>
                                            <td class="text-center"><?= @$val->Remarks ?? "--- " ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<td colspan='6' class='text-center'>No Appointments available</td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
</section>

<div class="modal fade" id="modal-remarks">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Remarks</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h5>Add remarks to student.(max of 255 chars only)</h5>
                        <input type="text" id="idd" value="" hidden>
                        <input type="text" id="statt" value="" hidden>
                    </div>
                    <div class="col-12">
                        <label for="aDate"></label>
                        <textarea type="text" class="form-control" id="remarks"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-update-stat">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/appointment/appointment_web.js"></script>
<script>
    setInterval(function() {
        location.reload();
    }, 300000);
</script>