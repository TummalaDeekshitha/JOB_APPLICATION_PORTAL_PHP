<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Display</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>


<body>
    <div>
        <form action="<?php echo $this->createUrl('jobs/Display') ?>" style="margin-right:10px" method="post">
            <h2>JSON Data</h2>
            <select name="selectCategory">
                <option value="None">All</option>
                <option value="Software">Software</option>
                <option value="Core">Core</option>
                <!-- Add more options as needed -->
            </select>
            <input type="text" name="search">
            <button type="submit" class="btn btn-danger btn-sm">Search</button>
        </form>
    </div>

    <?php echo CHtml::link('Add New Job', array('jobs/AddJob'), array('class' => 'btn btn-primary')); ?>

</body>

</html>