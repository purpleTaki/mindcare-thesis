<?php
main_header(['dashboard']);
$current_date = date('M d, Y');
$current_day = date('l');
$userID = $_GET['ID'];
$color = ($mood == 'happy') ? 'green' : (($mood == 'normal') ? 'black' : (($mood == 'sad') ? 'blue' : 'red'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .circle-container {
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            border: solid 3px #27B51E;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #27B51E;
            margin: 2rem auto;
            font-size: 18px;
            text-align: center;
        }

        .icons {
            font-size: 9rem;
            color: #27B51E;
        }

        /* Responsive styles */
        @media only screen and (min-width: 319px) {
            .circle-container {
                height: 15rem;
                margin-right: 2rem;
            }

            .icons {
                font-size: 5rem;
            }

        }

        @media only screen and (min-width: 374px) {
            .circle-container {
                height: 16rem;
                margin-right: 1.5rem;
            }

            .icons {
                font-size: 7rem;
            }

        }

        /* Responsive styles */
        @media only screen and (min-width: 424px) {
            .circle-container {
                margin: 2rem 2rem 2rem 3rem;
            }

            .icons {
                font-size: 9rem;
            }
        }

        .mood-text {
            margin-top: 1rem;
            font-size: 16px;
        }

        .everyday-text {
            font-size: 14px;
        }

        [class*="col-"] {
            width: 100%;
        }

        @media only screen and (min-width: 768px) {
            [class*="col-"] {
                width: 50%;
                float: left;
            }

            .center {
                margin: auto;
                width: 100%;
                /* border: 3px solid green; */
                padding: 10px;
            }
        }

        /* Centering the buttons */
        .button-container {
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        #submitMood {
            width: 100%;
        }

        /* Hide the default radio button */
        input[type="radio"] {
            display: none;
        }

        /* Style the label to look like a button with an icon */
        .radio-icon-label {
            display: inline-block;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Change background color when the radio button is checked */
        input[type="radio"]:checked+.radio-icon-label {
            background-color: #e0e0e0;
        }

        /* For desktop: */
        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="circle-container center mt-3">
                    <p id="question" class="mood-text pt-3">What are you feeling today?</p>
                    <p class="m-0 mb-1" id="current_mood" class="mood-text" <?= @$mood == null ? 'hidden' : '' ?>>You feel <strong style="color:<?= @$color ?>"><?= @$mood->md ?></strong></p>
                    <h3><?= $current_date; ?></h3>
                    <h4><?= $current_day; ?></h4>
                    <p class="everyday-text">Last Updated: <br><?= @$mood == null ? '-' : date('M d, Y h:i A', strtotime(@$mood->DateAdded)) ?></p>
                    <input type="hidden" id="userID" value="<?= @$userID ?>">
                </div>
            </div>
            <br>
            <div class="col-12 center">
                <input value="1" data-mood="1" data-pts="-2" name="moods" id="radio1" type="radio" onclick="toggleRadio(this)">
                <label for="radio1" class="radio-icon-label" style="margin-left:2rem">
                    <span class="material-symbols-outlined icons">sentiment_very_satisfied</span>
                </label>

                <input value="2" data-mood="2" data-pts="-1" name="moods" id="radio2" type="radio" onclick="toggleRadio(this)">
                <label for="radio2" class="radio-icon-label">
                    <span class="material-symbols-outlined icons">sentiment_satisfied</span>
                </label>
            </div>
            <div class="col-12 mt-5 center">
                <input value="3" data-mood="3" data-pts="1" name="moods" id="radio3" type="radio" onclick="toggleRadio(this)">
                <label for="radio3" class="radio-icon-label" style="margin-left:2rem">
                    <span class="material-symbols-outlined icons ">sentiment_dissatisfied</span>
                </label>

                <input value="4" data-mood="4" data-pts="2" name="moods" id="radio4" type="radio" onclick="toggleRadio(this)">
                <label for="radio4" class="radio-icon-label">
                    <span class="material-symbols-outlined icons">sentiment_sad</span>
                </label>
            </div>
            <div class="col-12 center button-container">
                <button type="button" id="submitMood" class="btn btn-success">Submit</button>
                <div class="row">
                    <div class="col-6 center mt-3">
                        <button type="button" id="viewMood" class="btn btn-primary" data-toggle="modal" data-target="#modal-stats">View Mood Stats</button>
                    </div>
                    <div class="col-6 center mt-3">
                        <button type="button" id="viewHist" class="btn btn-primary" data-toggle="modal" data-target="#view-history">View History</button>
                    </div>
                </div>            
            </div>

            </div>

        </div>
    </section>

    <!-- modal for showing statistics of student -->
    <div class="modal fade" id="modal-stats">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mood Statistics</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    <?php
                    if (!empty(@$warning)) {
                    ?>
                        <div class="container text-center mt-2">
                            <h4 style="color:red;">You need urgent counseling. Consider making an appointment with our counselors.</h4>
                        </div>
                    <?php
                    }
                    ?>
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

     <!-- modal for showing notif if threshold is met -->
     <div class="modal fade" id="view-history" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">History of Mood</h4>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-center mt-2" style="max-height: 650px; min-height: 650px; overflow-x:auto;">
                        <?php if (!empty($history)) { ?>
                            <table class="table table-bordered table-hover" style="margin:0px">
                                <thead style="font-weight: 600;">
                                    <tr>
                                        <td>Mood</td>
                                        <td>Date Added</td>
                                        <td>Time Added</td>
                                    </tr>
                                </thead>
                                <?php
                                foreach (@$history as $val) { ?>
                                    <tr>
                                        <td><?= $val->md ?></td>
                                        <td><?= date('M d, Y', strtotime(@$val->DateAdded)) ?></td>
                                        <td><?= date('h:ia', strtotime(@$val->DateAdded)) ?></td>
                                    </tr>
                                <?php }
                                echo "</table>";
                            } else { ?>
                                <h5>No History Recorded</h5>
                            <?php } ?>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" data-dismiss="modal" class="btn btn-danger close">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- second modal pop out -->
        <div class="modal fade" id="modal-second" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Acknowledgement</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        By clicking done, this will disable the notifications on popping out everytime you post your mood. The counselors are still notified
                        with your current mental status. Do you want to disable these notifications?
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success acknowledgebtn">Acknowledge</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</body>

<?php
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/mood/mood.js"></script>
<script>
    var lastClickedRadio = null;

    function toggleRadio(clickedRadio) {
        if (lastClickedRadio === clickedRadio) {
            clickedRadio.checked = false;
            lastClickedRadio = null;
        } else {
            if (lastClickedRadio !== null) {
                lastClickedRadio.checked = false;
            }

            clickedRadio.checked = true;
            lastClickedRadio = clickedRadio;
        }
    }
    // $('#current_mood').hide();

    $(function() {
        var itemarr = <?php echo json_encode($mood_stat); ?>;
        // console.log(itemarr);
        var moodstat = [0, 0, 0, 0];
        itemarr.forEach(function(data) {
            var moodValue = parseInt(data.Mood);
            switch (moodValue) {
                case 1:
                    // console.log(1);
                    moodstat[0]++;
                    break;
                case 2:
                    // console.log(2);
                    moodstat[1]++;
                    break;
                case 3:
                    // console.log(3);
                    moodstat[2]++;
                    break;
                case 4:
                    // console.log(4);
                    moodstat[3]++;
                    break;
            }
        });
        console.log(moodstat);

        var donutData = {
            labels: [
                'Happy',
                'Normal',
                'Sad',
                'Depressed'
            ],
            datasets: [{
                data: moodstat,
                backgroundColor: ['#00a65a', '#f39c12', '#00c0ef', '#f56954'],
            }]
        }

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

    })
</script>
<script>
    var threshold_checker = <?php echo json_encode($warning); ?>;
    if (threshold_checker.notif == 0) {
        // alert('wow dont kys');
        $("#modal-notif").modal("show");
    }
</script>