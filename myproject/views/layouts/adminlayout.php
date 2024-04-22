<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0 !important;
            background-color: #6a5acd; /* violet background color */
            color: #fff; /* white text */
            height: 100%;
            
        }

        #page {
            min-height: 100%;
            position: relative;
        }

        .container {
            padding: 0;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        #header {
            background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);
            padding: 10px;
        }

        #footer {
            background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);
            padding: 10px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        #content {
            padding: 20px;
            margin-top: 20px;
        }

        #left-side {
            float: left;
        }

        #right-side {
            float: right;
        }

        .btn {
            margin: 5px;
        }

        .btn-group {
            margin-top: 5px;
        }
       

    nav {
      display: flex;
      justify-content: flex-start;
      padding: 5px;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
    }

    nav a:hover {
      background-color: #555;
    }

    /* Circular image style */
    .circular-img {
      border-radius: 50%;
      overflow: hidden;
      width: 200px; /* Adjust size as needed */
      height: 200px;
      margin-left: 5px;
      margin-top: 5px; 
      margin-bottom: 5px;/* Adjust size as needed */
    }

    .circular-img img {
      object-fit: cover;
      width: 100%;
      height: 100%;
      
    }
    </style>
</head>

<body>

<div class="container-fluid p-0" id="page">

    <div id="header">
        <div class="btn-group" id="left-side">
        <div>Welcome, <?php echo $user; ?> | <a href="/myproject/admin/logout">Logout</a></div>
    <div><a href="/myproject/graphs/showCompanywiseDistribution">CompanywiseJobsDistribution</a></div>
    <div><a href="/myproject/graphs/showSearchDistribution">Most Trending/searched Jobs</a></div>
    <div><a href="/myproject/graphs/applicationTrends">ApplicationTrends</a></div>
            
        </div>
       
    <div id="content">
        <?php echo $content; ?>
    </div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

<!-- Bootstrap JS (optional) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
