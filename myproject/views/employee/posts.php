<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Display</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f0f0f0;
            overflow-y: auto;
            /* Set background color */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .card {
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-bottom: none;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-bottom: 10px;
            color: #333;
        }

        .btn-primary,
        .btn-danger {
            color: #fff;
        }

        /* Style for content container */
        .content-container {
            margin-top: 100px;
            /* Adjust top margin to accommodate the navbar */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto Condensed", sans-serif;
        }

        /* Custom styles */
        .fixed-search {
            position: fixed;
            top: 10cm; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            z-index: 9999; /* Ensure it's above other content */
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="fixed-search">
        <form class="form-inline" action="<?php echo $this->createUrl('employee/Posts') ?>" method="post">
            <div class="form-group mr-2 mb-0">
                <select name="selectCategory" class="form-control form-control-sm">
                    <option value="None">All</option>
                    <option value="software">Software</option>
                    <option value="core">Core</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    <!-- Content container -->
    <div class="container content-container">
        <div class="row mt-3">
            <?php foreach ($jobs as $i => $job): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?php echo $job['jobTitle']; ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Total Applications:</strong>
                                <?php echo $job['totalApplications']; ?>
                            </p>
                            <p class="card-text"><strong>Openings:</strong>
                                <?php echo $job['openings']; ?>
                            </p>
                            <p class="card-text"><strong>Category:</strong>
                                <?php echo $job['category']; ?>
                            </p>

                            <div class="d-flex justify-content align-items-center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal_<?php echo $i; ?>">More</button>
                                <p>&nbsp;&nbsp;</p>
                                <form action="<?php echo $this->createUrl('/myproject/jobs/delete'); ?>" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    <input type="hidden" name="id" value="<?php echo $job["_id"]; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal for additional information -->
                <div class="modal fade" id="modal_<?php echo $i; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="modalTitle_<?php echo $i; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle_<?php echo $i; ?>">More Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Salary:</strong>
                                    <?php echo $job['details']['salary']; ?>
                                </p>
                                <p><strong>Location:</strong>
                                    <?php echo $job['details']['location']; ?>
                                </p>
                                <p><strong>Description:</strong>
                                    <?php echo $job['details']['description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
