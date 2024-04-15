<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head id="header">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- blueprint CSS framework -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            padding: 20px;
            background-color: #f0f0f0;
            /* Set background color */
        }

        nav {
            background-color: #333;
            height: 70px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px 30px;
        }

        a {
            color: #a0a0a0;
            text-decoration: none;
            padding: 0 20px;
            letter-spacing: 0.5px;
            position: relative;
            transition: color 0.2s;
        }

        a:hover {
            color: #fff;
        }

        a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 0%;
            height: 2px;
            background-color: yellowgreen;
            transition: width 0.5s ease-out;
        }

        .nav-item:hover a::after,
        .nav-item.active a::after {
            width: 100%;
        }

        @media (min-width: 992px) {
            .nav-item.active a::after {
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <div class="container" id="page">



        <div id="mainmenu">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Applicants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Add Job</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Bootstrap JS (optional, depending on your needs) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div><!-- mainmenu -->
        <?php if (isset($this->breadcrumbs)): ?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            )
            ); ?><!-- breadcrumbs -->
        <?php endif ?>

        <?php echo $content; ?>

        <div class="clear"></div>



    </div><!-- page -->

</body>

</html>


<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="home">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Myapplicants">My Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobs">Add Job</a>
                </li>
            </ul>

        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="home">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Myapplicants">My Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobs">Add Job</a>
                </li>
            </ul>
        </div>
    </div>
</nav>