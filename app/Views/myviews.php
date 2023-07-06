<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to <?php echo $page_title; ?></title>
</head>
<body>
    <h1>This is <?= $page_heading; ?> page.</h1>
    <!-- <h1>This is <?php echo $page_heading; ?> page.</h1> -->
    <h3>Subject List:</h3>
    <ul>
        <?php
        if(count($subjects)>0):
            foreach($subjects as $sub):
                ?>
                <li><?= $sub; ?></li>
            <?php
            endforeach;
        else:
            echo "Sorry! No records found.";
        endif; 
        ?>
    </ul>
</body>
</html>