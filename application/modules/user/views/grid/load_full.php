<?php
@$moodstat = [0, 0, 0, 0];
@$mood_count = 0;
if (!empty(@$mood_stat)) {
    foreach (@$mood_stat as $mood) {
        switch (@$mood->Mood) {
            case 1:
                // console.log(1);
                @$moodstat[0]++;
                break;
            case 2:
                // console.log(2);
                @$moodstat[1]++;
                break;
            case 3:
                // console.log(3);
                @$moodstat[2]++;
                break;
            case 4:
                // console.log(4);
                @$moodstat[3]++;
                break;
        }
        @$mood_count++;
    }
}
?>
<div class="row">
    <!-- <div class="col-1">
    </div> -->
    <div class="col-4">
        <select class="custom-select form-control-border" id="filterdpt">
            <option value="" disabled selected>-- Select Department --</option>
            <option value="CET">College of Engineering and Technology</option>
            <option value="CAS">College of Arts and Science</option>
            <option value="CBA">College of Business and Accountancy</option>
            <option value="CoN">College of Nursing</option>
            <option value="CoE">College of Educationn</option>
            <option value="CoL">College of Law</option>
            <option value="CoM">College of Medicine</option>
        </select>
    </div>
    <div class="col-3">
        <select class="custom-select form-control-border" id="qm">
            <option value="" disabled selected>-- Select Quarter --</option>
            <option value="Q1">Q1</option>
            <option value="Q2">Q2</option>
            <option value="Q3">Q3</option>
            <option value="Q4">Q4</option>
            <option value="" disabled>-- Select Month --</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>
    <div class="col-3">
        <select class="custom-select form-control-border" id="yr">
            <option value="" disabled selected>-- Select Year --</option>
            <?php
            $currentYear = date("Y");

            for ($i = 0; $i < 4; $i++) {
                $year = $currentYear - $i;
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
    </div>
</div>
<canvas id="fullStatChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; margin-bottom: 20px;"></canvas>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <?php if (@$moodstat[0] != 0) { ?>
                <p><?= round((@$moodstat[0] / @$mood_count) * 100, 2) ?> % of users feel <strong>Happy</strong></p>
            <?php }
            if (@$moodstat[1] != 0) { ?>
                <p><?= round((@$moodstat[1] / @$mood_count) * 100, 2) ?>% of users feel <strong>Normal</strong></p>
            <?php }
            if (@$moodstat[2] != 0) { ?>
                <p><?= round((@$moodstat[2] / @$mood_count) * 100, 2) ?> % of users feel <strong>Sad</strong></p>
            <?php }
            if (@$moodstat[3] != 0) { ?>
                <p><?= round((@$moodstat[3] / @$mood_count) * 100, 2) ?> % of users feel <strong>Depressed</strong></p>
            <?php }
            ?>
        </div>
    </div>
</div>
<script>
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
        // console.log(moodstat);

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

        var pieChartCanvas = $('#fullStatChart').get(0).getContext('2d')
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