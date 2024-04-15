<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php echo CHtml::link('Signup', array('employee/Signup'), array('class' => 'btn btn-primary')); ?>
<?php echo CHtml::link('Signin', array('signin/Signin'), array('class' => 'btn btn-primary')); ?>

</body>
</html>

    <!-- <button class="tablink" onclick="openPage('home')">Home</button>
    <button class="tablink" onclick="openPage('news')">News</button>
    <button class="tablink" onclick="openPage('contact')">Contact</button>
    <button class="tablink" onclick="openPage('about')">About</button>
    
    <div id="tabContent"></div>
    
    <script>
        function openPage(pageName) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tabContent").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", pageName + ".php", true);
            xhttp.send();
        }
        
        // Display the default tab content
        openPage('home');
    </script> -->