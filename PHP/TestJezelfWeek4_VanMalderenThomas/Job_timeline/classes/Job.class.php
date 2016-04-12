<?php

    class DisplayJobs {

    public function GetAll()
    {
            
            $conn = new PDO("mysql:host=localhost; dbname=imd", "root", "root");
    
            $jobs = $conn->query("select * from jobs");
            
            $jobs->execute();
            
            $results = $jobs->fetchAll();


        foreach ($results as $p) {;
            if ( ($p['id']%2) == 0) {; ?>
                <li>
                    <div class="direction-r">
                        <div class="flag-wrapper">
                        <span class="flag"> <?php echo $p['job_name']; ?></span>
                        <span class="time-wrapper"><span class="time"><?php echo $p['period']; ?></span></span>
                        </div>
                        <div class="desc"><?php echo $p['description']; ?></div>
                    </div>
                </li>
            <?php }
            else {; ?>
                <li>
                    <div class="direction-l">
                            <div class="flag-wrapper">
                                <span class="flag"> <?php echo $p['job_name']; ?></span>
                        <span class="time-wrapper"><span class="time"><?php echo $p['period']; ?></span></span>
                        </div>
                        <div class="desc"><?php echo $p['description']; ?></div>
                    </div>
                </li>
            <?php }
        }

        return $results;
    }

}

?>