<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        #page {
            display: flex;
            min-height: 100vh;
        }
        #sidebar {
            min-width: 250px;
            background-color: #343a40; /* Dark gray background */
            color: #fff; /* White text */
            display: none; /* Initially hide the sidebar */
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        .nav-link {
            color: #fff !important; /* White text for navigation links */
        }
        .nav-link:hover {
            background-color: #495057 !important; /* Darker background on hover */
        }
    </style>
</head>

<body>

<div class="container-fluid p-0" id="page">

    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="nav flex-column">
            <!-- Navigation buttons -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->createUrl("/mymodule/home/") ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->createUrl("/mymodule/signupform") ?>">Signup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->createUrl("/mymodule/signinform/signinform") ?>">Signin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->createUrl("/mymodule/profile") ?>">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->createUrl("/mymodule/logout") ?>">Logout</a>
            </li>
            <li class="nav-item">
            <a class="btn btn-light" href="<?= $this->createUrl("/mymodule/logout") ?>">Welcome, <?= Yii::app()->user->getState('name'); ?></a>
            
            </li>

        </ul>
    </div><!-- sidebar -->

    <!-- Main content -->
    <div id="content">
        <?php echo $content; ?>
    </div>

</div><!-- page -->

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Initially show the user's name
        $('#sidebar').show();

        // Toggle sidebar on clicking the user's name
        $('.user-name').click(function() {
            $('#sidebar').toggle();
        });
    });
</script>

</body>
</html>
