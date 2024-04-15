<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Container and Card Styling */
        body {
            overflow-y: auto;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            /* Center vertically */
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            /* Light gray background */
            border-radius: 10px;
        }

        .card-body {
            width: 70%;
            /* 70% width for the details */
        }

        /* Button Styling */
        .btn-group-vertical .btn {
            width: 100%;
            /* Equal width for all buttons */
            margin-bottom: 10px;
            /* Margin between buttons */
        }

        /* Modal Styling */
        .modal-dialog {
            max-width: 80%;
            /* Adjust modal width */
        }

        .modal-content {
            padding: 20px;
            /* Padding for modal content */
        }

        /* Custom styles for fixed search */
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

        /* Custom style for the form */
        .search-form {
            margin-bottom: 10px; /* Adjust as needed */
        }
    </style>
</head>

<body>
    <!-- Fixed search form -->
    <div class="fixed-search">
        <form class="form-inline search-form" action="<?php echo $this->createUrl('employee/myapplicants') ?>" method="post">
            <div class="form-group mr-2 mb-0">
                <select name="selectCategory" class="form-control form-control-sm">
                    <option value="None">All</option>
                    <option value="software">Software</option>
                    <option value="core">Core</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
        </form>
    </div>

    <div class="container">
        <br><br><br>
        <h1 class="mb-4">My Applications</h1>

        <!-- Application Cards -->
        <?php foreach ($applications as $application) { ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $application['name']; ?>
                    </h5>
                    <p class="card-text">Job Title:
                        <?php echo $application['jobTitle']; ?>
                    </p>
                    <p class="card-text">Category:
                        <?php echo $application['category']; ?>
                    </p>
                    <p class="card-text">Cover Letter:
                        <?php echo $application['coverletter']; ?>
                    </p>
                </div>
                <div class="btn-group-vertical" role="group">
                    <a href="#" class="btn btn-info"
                        onclick="openResumeModal('<?php echo $application['resume']; ?>')">Open Resume</a>
                    <form action="<?php echo $this->createUrl('/myproject/jobs/UpdateApplication') ?>"
                        method="post">
                        <input type="hidden" name="status" value="approved">
                        <input type="hidden" name="id" value="<?php echo $application["_id"]; ?>">
                        <input type="hidden" name="jid" value="<?php echo $application["jobid"]; ?>">
                        <button type="submit" class="btn btn-success">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApprove&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                    </form>
                    <form action="<?php echo $this->createUrl('/myproject/jobs/UpdateApplication') ?>"
                        method="post">
                        <input type="hidden" name="status" value="rejected">
                        <input type="hidden" name="id" value="<?php echo $application["_id"]; ?>">
                        <input type="hidden" name="jid" value="<?php echo $application["jobid"]; ?>">
                        <button type="submit" class="btn btn-danger">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReject&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Modal for displaying resume -->
    <div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumeModalLabel">Resume</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="resumePdf" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to open the resume modal with the provided PDF URL
        function openResumeModal(pdfUrl) {
            $('#resumePdf').attr('src', pdfUrl);
            $('#resumeModal').modal('show');
        }
    </script>
</body>

</html>
