<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="experience_section layout_padding-top layout_padding2-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-box justify-content-center">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/experience-img.jpg" alt="">
                    </div>
                </div>

                <div class="card-container">
                    <div class="card">
                        <h3>Software Jobs</h3>
                        <p>Find exciting opportunities in the software industry.</p>
                        <a href="/myproject/about/jobs?category=software" class="btn btn-success">View Jobs</a>
                    </div>

                    <div class="card">
                        <h3>Core Jobs</h3>
                        <p>Discover core engineering job openings.</p>
                        <a href="/myproject/about/jobs?category=core" class="btn btn-danger">View Jobs</a>
                    </div>
                    <div class="card">
                        <h3>Your Applications</h3>
                        <p>Check the status of your job applications.</p>
                        <a href="/myproject/about/viewapplications" class="btn btn-info">View Applications</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end experience section -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>