<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Application Graphs</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       header {
      background-color: #ff8300;
      padding: 10px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
    .card-header {
        background-color:#ff8300;
        color: #fff;
        font-weight: bold;
    }
    .nav-link {
        color: #ff8300;
        border: none;
        border-radius: 0;
    }
    .nav-link:hover {
        color: #fff;
        background-color: #ff8300;
    }
    .nav-link.active,
    .nav-link.active:hover {
        background-color: #ff8300;
        color: #fff;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
</style>

   
</head>
<body >
    <header class="text-white  back">
        <div>
            <img src="images/logo.png" alt="" />
            <span>
             JobForge
            </span>
        </div>
       
        
    </header>
    <div id="content">
        <?php echo $content; ?>
    </div></body>
    </html>