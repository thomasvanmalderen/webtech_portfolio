<?php

    include_once ("classes/Db.class.php");
    include_once ("classes/Job.class.php");

    if (!empty($_POST)) {
    
            $job = new Job();
            $job->Name = $_POST['name'];
            $job->Period = $_POST['period'];
            $job->Description = $_POST['description'];

            if ($job->Save()) {
                $succes = "Job saved";
            } else {
                $error = "Job NOT saved";
            }
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Job timeline</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="name" placeholder="Job" />
        <input type="text" name="period" placeholder="Period" />
        <input type="text" name="description" placeholder="Description" />
        <input type="submit" name="btnAdd" value="Add a job" />
    </form>

    <?php if(isset($error)): ?>
        <h3><?php echo $error; ?></h3>
    <?php elseif(isset($succes)): ?>
        <h3><?php echo $succes; ?></h3>
    <?php endif; ?>


    <ul class="timeline">

        <?php
            $allJobs = new DisplayJobs();
            $allJobs->GetAll();
        ?>
    </ul>

</body>
</html>