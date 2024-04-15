w<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 10%;
            background-color: #f0f0f0;
            overflow-y: auto;
            /* Set background color */
        }

        h5.card-title {
            color: #fff;
        }

        /* Style for content container */
        .content-container {
            margin-top: 100px;
            /* Adjust top margin to accommodate the navbar */
        }
    </style>
</head>

<body>
    <!-- Content container -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-center">User Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Image Column -->
                            <div class="col-md-4">
                                <img src="<?php echo $data['profile']; ?>" alt="Image" class="img-fluid mb-3">
                            </div>
                            <!-- User Data Column -->
                            <div class="col-md-8">
                                <p><strong>Name:</strong>
                                    <?php echo $data['name']; ?>
                                </p>
                                <p><strong>Company Name:</strong>
                                    <?php echo $data['companyName']; ?>
                                </p>
                                <p><strong>Email:</strong>
                                    <?php echo $data['email']; ?>
                                </p>
                                <p><strong>Industry:</strong>
                                    <?php echo $data['industry']; ?>
                                </p>
                                <p><strong>Employee ID:</strong>
                                    <?php echo $data['employeeId']; ?>
                                </p>
                                <p><strong>Registered Time:</strong>
                                    <?php echo date('Y-m-d H:i:s', strtotime($data['registeredTime'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
