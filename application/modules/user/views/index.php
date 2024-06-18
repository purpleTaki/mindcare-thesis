<?php
main_header(['user_mgmt']);
?>
<!-- ############ PAGE START-->
<style>

</style>

<section>
    <?php

    if ($session->usertype == 2) {
    ?>
        <div class="user-box" style="width: 90%; margin: 0 auto;">
            <div class="row">
                <div class="col-md-7">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-12 mb-2">
                                    <h5>STUDENT LIST</h5>
                                </div>
                                <div class="col-md-1 col-1 text-right pt-2">
                                    SEARCH :
                                </div>
                                <div class="col-md-8 col-8">
                                    <input class="form-control" id="search" placeholder="Type the name or ID number of the student/user...">
                                </div>
                                <div class="col-md-2 col-2 text-center">
                                    <!-- dd here -->
                                </div>
                            </div>
                            <div class="col-12" style="height: 350px; overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Email</th>
                                            
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Course/Yr/Section</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="load_students">
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="col-12 mt-2">
                                <h5>STAFF LIST</h5>
                            </div>
                            <div class="col-12 mt-3" style="height: 300px; overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Position</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="load_staff">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h3>CREATE / EDIT USER</h3>
                                </div>
                                <div class="col-12">
                                    <input type="text" id="update" hidden>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">First Name :</span>
                                        <input type="text" name="fname" class="form-control" id="fname" required>
                                    </div>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">Middle Name :</span>
                                        <input type="text" name="mname" class="form-control" id="mname">
                                    </div>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">Last Name :</span>
                                        <input type="text" name="lname" class="form-control" id="lname" required>
                                    </div>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">Email :</span>
                                        <input type="text" name="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">Username:</span>
                                        <input type="text" name="uname" class="form-control" id="uname" maxlength="7" required>
                                    </div>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">Contact Number:</span>
                                        <input type="text" name="cnum" class="form-control" id="cnum" maxlength="15" required>
                                    </div>
                                </div>
                                <div class="col-2 pt-4 text-center">
                                    <label for="gender">Gender :</label>
                                </div>
                                <div class="col-4 pt-3">
                                    <select class="custom-select form-control-border" id="gender">
                                        <option value="male">MALE</option>
                                        <option value="female">FEMALE</option>
                                        <option value="other">OTHER</option>
                                    </select>
                                </div>
                                <div class="col-3 pt-4">
                                    <label for="course">Course/Year/Section</label>
                                </div>
                                <div class="col-3 pt-3">
                                    <input type="text" name="course" class="form-control" id="course">
                                </div>
                                <div class="col-2 text-right mt-2">
                                    <label for="usertype">User Type :</label>
                                </div>
                                <div class="col-2">
                                    <select class="custom-select form-control-border" id="usertype">
                                        <option value="0">Student</option>
                                        <option value="1">Counselor</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Secretary</option>
                                    </select>
                                </div>
                                <div class="col-2 mt-2">
                                    <label for="dpt">Deparment:</label>
                                </div>
                                <div class="col-6 mt-1">
                                    <select class="custom-select form-control-border" id="dpt" required>
                                        <option value="" disabled selected>-- Select Department --</option>
                                        <option value="CET">College of Engineering and Technology</option>
                                        <option value="CAS">College of Arts and Science</option>
                                        <option value="CBA">College of Business and Accountancy</option>
                                        <option value="CoN">College of Nursing</option>
                                        <option value="CoE">College of Educationn</option>
                                        <option value="CoL">College of Law</option>
                                        <option value="CoM">College of Medicine</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="button" class="btn btn-success" id="save"> SAVE </button>
                                    <button type="button" class="btn btn-secondary" id="cancelbtn" style="display: none;"> Cancel </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif ($session->usertype == 1) {
    ?>
        <div class="container">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-md-1 col-1 text-right pt-2">
                            SEARCH :
                        </div>
                        <div class="col-md-8 col-8">
                            <input class="form-control" id="search" placeholder="Type the name or ID number of the student/user...">
                        </div>
                        <div class="col-md-2 col-2 text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-full">View Statistics</button>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Course/Yr/Section</th>
                                <th class="text-center">Number</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="load_students">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo 'you aren\'t allowed here';
    }
    ?>
</section>

<div class="modal fade" id="modal-apt">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Make Appointment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="std_ID" hidden>
                <div class="row">
                    <div class="col-12">
                        <h4> Student Name : <span id="std_name"></span> </h4>
                    </div>
                    <div class="col-6">
                        <label for="aDate">Appointment Date</label>
                        <input type="date" class="form-control" id="aDate">
                    </div>
                    <div class="col-6">
                        <label for="aTime">Appointment Time</label>
                        <!-- <input type="time" class="form-control" id="aTime" placeholder=""> -->
                        <select id="aTime" name="schedule">
                            <option disabled>--Select Appointment Time--</option>
                            <option data-from="<?= date('h:i:a', strtotime('8:00am')) ?>" data-to="<?= date('h:i:a', strtotime('09:00:00')) ?>">8:00am - 9:00am</option>
                            <option data-from="<?= date('h:i:a', strtotime('09:00:00')) ?>" data-to="<?= date('h:i:a', strtotime('10:00:00')) ?>">9:00am - 10:00am</option>
                            <option data-from="<?= date('h:i:a', strtotime('10:00:00')) ?>" data-to="<?= date('h:i:a', strtotime('11:00:00')) ?>">10:00am - 11:00am</option>
                            <option data-from="<?= date('h:i:a', strtotime('13:00:00')) ?>" data-to="<?= date('h:i:a', strtotime('14:00:00')) ?>">1:00pm - 2:00pm</option>
                            <option data-from="<?= date('h:i:a', strtotime('14:00:00')) ?>" data-to="<?= date('h:i:a', strtotime('15:00:00')) ?>">2:00pm - 3:00pm</option>
                            <option data-from="<?= date('h:i:a', strtotime('15:00:00')) ?>" data-to="<?= date('h:i:a', strtotime('16:00:00')) ?>">3:00pm - 4:00pm</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="make-appointment">Make Appointment</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-stat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Statistics</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="load-chart">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-full">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Full Statistics</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="load_full">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- /.modal -->

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/user/user.js"></script>