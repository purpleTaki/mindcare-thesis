<?php
if (!empty($users)) {
    if ($session->usertype == 2) {
        foreach ($users as $k => $val) {
?>
            <tr>
                
                <td><?= ucwords($val->fname) . ' ' . substr(ucwords($val->mname), 0, 1) . '. ' . ucwords($val->lname) ?></td>
                <td><?= $val->email ?></td>
                <td class="text-center"><?= $val->sex ?></td>
                <td class="text-center"><?= $val->yearSection ?></td>
                <td class="text-center">
                    <button class="btn btn-primary edit-btn" style="color: white;" data-id="<?= $val->ID ?>" data-fname="<?= $val->fname ?>" data-mname="<?= $val->mname ?>" data-lname="<?= $val->lname ?>" data-uname="<?= $val->username ?>" data-course="<?= $val->yearSection ?>" data-email="<?= $val->email ?>"><i class="fas fa-pen"></i> Edit</button>
                    <button class="btn btn-danger btn-reset" style="color: white;" data-id="<?= $val->ID ?>" ><i class="fas fa-exclamation-triangle"></i> Reset </button>
                </td>
            </tr>
        <?php
        }
    } else
        foreach ($users as $k => $val) { { ?>
            <tr>
                <td><?= $k + 1 . '.' ?></td>
                <td><?= ucwords($val->fname) . ' ' . substr(ucwords($val->mname), 0, 1) . '. ' . ucwords($val->lname) ?></td>
                <td><?= $val->email ?></td>
                <td class="text-center"><?= $val->sex ?></td>
                <td class="text-center"><?= $val->yearSection ?></td>
                <td class="text-center">
                    <button class="btn btn-primary btn-view" data-toggle="modal" data-target="#modal-stat" data-id="<?=@$val->ID?>"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-warning btn-make-apt" data-toggle="modal" data-target="#modal-apt" data-id="<?= $val->ID ?>" data-fname="<?= $val->fname ?>" data-mname="<?= $val->mname ?>" data-lname="<?= $val->lname ?>"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
    <?php
            }
        }
} else {
    ?>
    <tr>
        <td colspan="6" class="text-center">
            No Record Found
        </td>
    </tr>
<?php
}
?>