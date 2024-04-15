<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>JobForge</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Mxpsj+O2WTjJpFlun/LKc3qyMRw9Q+hxHCUfD6Vb55XcvA7q7c++5WxEe4xVtZ6wXgN+cXvTHWoYs1vtPrh0pQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        form {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .card {
            width: 30%;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .backcolor {
            background-color: #ff8300;
        }

        .greencolor {
            background-color: darkslategrey;
        }

        form button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Updated logout button style */
        .logout-btn {
            background-color: #ff8300;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #e25f00;
        }

        .about-btn:hover {
            background-color: #e25f00;
        }

        .chat-btn:hover {
            background-color: #e25f00;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            form {
                max-width: 90%;
            }
        }
    </style>
</head>

<body class="sub_page">
    <div class=" hero_area ">
        <!-- header section strats -->
        <header class="backcolor header_section">
            <div class="container-fluid">
                <nav class="backcolor navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <img src="https://pin.it/6vkxGH8wu" alt="" />
                        <span>JobForge</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                           
                            <li class="nav-item active">
                                <a class="nav-link about-btn" href="/about">About</a>
                            </li>
                            <li class="nav-item active">
                            <a class="nav-link chat-btn" href="/myproject/chatgpt">chatbot
                                <i class="fas fa-comments"></i> 
                            </a>
                            </li>
                        </ul>
                        
                        <div class="user_option">
                            <h1 style="color: black; font-size: medium; margin:5px"><?= Yii::app()->user->getState('username'); ?></h1>
                            <a class="logout-btn" href="/myproject/logout">Log out</a>
                        </div>
        
                        <!-- Add chatbot button here -->
                       
                    </div>
        
                    <div>
                        <div class="backcolor custom_menu-btn">
                            <button>
                                <span class="s-1"></span>
                                <span class="s-2"></span>
                                <span class="s-3"></span>
                            </button>
                        </div>
                    </div>
        
                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- end header section -->
    </div>


    <!-- experience section -->
 <div id="content">
        <?php echo $content; ?>
    </div>
    
    <footer class="container-fluid footer_section ">
        <div class="container">
            <p>
                &copy; <span id="displayDate"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- end  footer section -->

    <script>

       
    </script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
</body>

</html>
