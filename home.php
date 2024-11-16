<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <style>
        .custom-menu {
            z-index: 1000;
            position: absolute;
            background-color: #ffffff;
            border: 1px solid #0000001c;
            border-radius: 5px;
            padding: 8px;
            min-width: 13vw;
        }
        a.custom-menu-list {
            width: 100%;
            display: flex;
            color: #4c4b4b;
            font-weight: 600;
            font-size: 1em;
            padding: 1px 11px;
        }
        span.card-icon {
            position: absolute;
            font-size: 3em;
            bottom: .2em;
            color: #ffffff80;
        }
        .file-item {
            cursor: pointer;
        }
        a.custom-menu-list:hover, .file-item:hover, .file-item.active {
            background: #80808024;
        }
        table th, td {
            /*border-left:1px solid gray;*/
        }
        a.custom-menu-list span.icon {
            width: 1em;
            margin-right: 5px;
        }
        .candidate {
            margin: auto;
            width: 23vw;
            padding: 0 10px;
            border-radius: 20px;
            margin-bottom: 1em;
            display: flex;
            align-items: center;
            border: 3px solid #00000008;
            background: #8080801a;
            position: relative;
        }
        .candidate_name {
            margin: 8px;
            text-align: center;
            width: 100%;
        }
		.img-field {
    display: flex;
    height: 8vh;
    width: 8vh;  /* Made the image field larger */
    padding: .3em;
    background: #80808047;
    border-radius: 50%;
    position: absolute;
    left: 0; /* Adjusted left position */
    top: -.7em;
}

        .candidate img {
            height: 100%;
            width: 100%;
            margin: auto;
            border-radius: 50%;
        }
        .vote-field {
            position: absolute;
            right: 0;
            bottom: -.4em;
            background-color: green; /* Change to green */
            color: white;
            padding: 10px;
            border-radius: 50%; /* Make it circular */
            width: 50px;  /* Fixed width for circle */
            height: 50px; /* Fixed height for circle */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .vote-field .badge {
            font-size: 16px;  /* Adjusted font size */
        }
        .card-body {
            text-align: center; /* Center the text */
        }
        .card-body h4 {
            color: white; /* Change text color to green */
        }
        /* Voters card */
        .bg-voters {
            background-color: red; /* Change background color to red */
        }
        /* Voted card */
        .bg-voted {
            background-color: green; /* Change background color to green */
        }
    </style>
</head>
<body>
    <div class="containe-fluid">
        <?php include('db_connect.php');
        $voting = $conn->query("SELECT * FROM voting_list where is_default = 1");
        foreach ($voting->fetch_array() as $key => $value) {
            $$key = $value;
        }
        $votes = $conn->query("SELECT * FROM votes where voting_id = $id");
        $v_arr = array();
        while ($row = $votes->fetch_assoc()) {
            if (!isset($v_arr[$row['voting_opt_id']]))
                $v_arr[$row['voting_opt_id']] = 0;

            $v_arr[$row['voting_opt_id']] += 1;
        }
        $opts = $conn->query("SELECT * FROM voting_opt where voting_id=" . $id);
        $opt_arr = array();
        while ($row = $opts->fetch_assoc()) {
            $opt_arr[$row['category_id']][] = $row;
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card col-md-4 offset-2 bg-info float-left">
                    <div class="card-body text-white bg-voters"> <!-- Add bg-voters class -->
                        <h4><b>Voters</b></h4>
                        <hr>
                        <span class="card-icon"><i class="fa fa-users"></i></span>
                        <h3 class="text-right"><b><?php echo $conn->query('SELECT * FROM users where type = 2 ')->num_rows ?></b></h3>
                    </div>
                </div>
                <div class="card col-md-4 offset-2 bg-primary ml-4 float-left">
                    <div class="card-body text-white bg-voted"> <!-- Add bg-voted class -->
                        <h4><b>Voted</b></h4>
                        <hr>
                        <span class="card-icon"><i class="fa fa-user-tie"></i></span>
                        <h3 class="text-right"><b><?php echo $conn->query('SELECT distinct(user_id) FROM votes where voting_id = ' . $id)->num_rows ?></b></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h3><b><?php echo $title ?></b></h3>
                            <small><b><?php echo $description; ?></b></small>
                        </div>
                        <?php
                        $cats = $conn->query("SELECT * FROM category_list where id in (SELECT category_id from voting_opt where voting_id = '" . $id . "' )");
                        while ($row = $cats->fetch_assoc()):
                            ?>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h3><b><?php echo $row['category'] ?></b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <?php foreach ($opt_arr[$row['id']] as $candidate) { ?>
                                    <div class="candidate" style="position: relative;">
                                        <div class="img-field">
                                            <img src="assets/img/<?php echo $candidate['image_path'] ?>" alt="">
                                        </div>
                                        <div class="candidate_name"><?php echo $candidate['opt_txt'] ?></div>
                                        <div class="vote-field">
                                            <span class="badge badge-success"><larger><b><?php echo isset($v_arr[$candidate['id']]) ? number_format($v_arr[$candidate['id']]) : 0 ?></b></larger></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

