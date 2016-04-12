<?php
    // form (c) http://codepen.io/nickhaskell/pen/HoGsm
    // MIT licensed
    

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OOP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row header">
            <h1>ADD A CAR &nbsp;</h1>
            <h3>Fill out the form below to add cars!</h3>
        </div>
        <div class="row body">
            <form action="" method="post">
                <ul>

                    <li>
                        <p class="left">
                            <label for="brand">Brand</label>
                            <input id="brand" type="text" name="brand" placeholder="mercedes" />
                        </p>
                        <p class="pull-right">
                            <label for="price">Price</label>
                            <input id="price" type="number" name="price" placeholder="" />
                        </p>
                    </li>


                    <li><div class="divider"></div></li>
                    <li>
                        <p>
                            <label for="maxload">If this is a transport van, what is the maximum load (in kg) <span class="req">*</span></label>
                            <input id="maxload" type="maxload" name="maxload" placeholder="5500" />
                        </p>
                    </li>

                    <li>
                        <input class="btn btn-submit" type="submit" value="Submit" />
                        <small>or press <strong>enter</strong></small>
                    </li>

                </ul>
            </form>
        </div>
    </div>


</body>
</html>