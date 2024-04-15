<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Job Portal</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .back {
            background-color: #ff8300;
        }
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
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }

        nav a:hover {
            background-color: #e25f00;
        }

        a:hover {
            background-color: #e25f00;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var cat = $(this).val();
                $.ajax({
                    url: `/${cat}sapi`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#field2').empty().append('<option value="" disabled selected>Job Name</option>');
                        var arr = [];
                        $.each(data, function(i, item) {
                            if (!arr.includes(item.jobname)) {
                                $('#field2').append(`<option value="${item.jobname}" name="${item.jobname}">${item.jobname}</option>`);
                                arr.push(item.jobname);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</head>
<body>

<header class="text-white p-3 back">
    <div>
        <nav>
            <a class="nav-link chat-btn m-2 p-2" href="/employerlogin/employerloginhandler">About</a>
            <a class="nav-link chat-btn m-2 p-2" href="/employerlogin/catapp">Collaboration Room</a>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="row">
            <div class="col">
                <div class="text-dark m-2 p-2"><h6>Welcome, <?= $user ?></h6></div>
            </div>
            <div class="col">
                <a class="nav-link chat-btn m-2 p-2" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<?php  echo( $content) ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>