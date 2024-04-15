<div class="container mt-4">
    <h1 class="mb-4">My Applications</h1>
    
    <!-- Search Bar -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search by Company Name or Job Name " id="searchInput">
    </div>

    <!-- Application Cards -->
    <div class="CContainer">
        <?php foreach ($applications as $application) { ?>
        <div class="row mb-3">
            <div class="col">
                <!-- Card Styling based on Status -->
                <?php if ($application->status === 'approved') { ?>
                <div class="card bg-success-light border border-success shadow-lg rounded-3 mx-auto" style="width: 70%;">
                <?php } else if ($application->status === 'rejected') { ?>
                <div class="card bg-danger-light border border-danger shadow-lg rounded-3 mx-auto" style="width: 70%;">
                <?php } else if ($application->status === 'pending') { ?>
                <div class="card bg-warning-light border border-warning shadow-lg rounded-3 mx-auto" style="width: 70%;">
                <?php } else { ?>
                <div class="card bg-primary-light border border-primary shadow-lg rounded-3 mx-auto" style="width: 70%;">
                <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $application->jobTitle; ?> at <?php echo $application->companyName; ?></h5>
                        <p class="card-text">Category: <?php echo $application->category; ?></p>
                        <p class="card-text">Status: <?php echo ucfirst($application->status); ?></p>

                        <!-- Additional Card Content -->
                        <?php if ($application->status === 'approved') { ?>
                        <p class="card-text">Approved</p>
                        <?php } else if ($application->status === 'rejected') { ?>
                        <p class="card-text">Rejected</p>
                        <?php } else if ($application->status === 'pending') { ?>
                        <p class="card-text">Pending</p>
                        <?php } else { ?>
                        <p class="card-text">Applied</p>
                        <?php } ?>
                       
                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#jobModal" onclick='fun1(<?php echo json_encode($application->jobid) ?>)'>More Info</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- No Applications Message -->
    <?php if (empty($applications)) { ?>
    <p class="lead">You have no applications yet.</p>
    <?php } ?>
</div>

<!-- Modal for displaying job details -->
<div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="jobModalLabel">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // Function to show job details in modal
    function fun1(jobId) {
        console.log(jobId);
        console.log("hello");
        $.ajax({
            url: "/myproject/about/applicationDetails",
            type: "POST",
            data: { JobId: jobId },
            success: function(response) {
                var job = JSON.parse(response);
                var html = `
                    <h5>${job.jobTitle} at ${job.companyName}</h5>
                    <p>Category: ${job.category}</p>
                    <p>Last Date: ${job.lastDate}</p>
                    <p>Salary: ${job.details.salary}</p>
                    <p>Location: ${job.details.location}</p>
                    <p>Description: ${job.details.description}</p>
                `;
                var modalBody = $('.modal-body');
                modalBody.html(html);
                $('#jobModal').modal('show'); // Show the modal
                $('body').addClass('modal-open'); // Add
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function displayApplications(applications) {
    var container = $('.CContainer');
    container.empty(); // Clear previous content
    
    if (applications.length === 0) {
        container.append('<p class="lead">You have no applications yet.</p>');
        return;
    }

    // Iterate over each application and generate HTML for the card
    applications.forEach(function(application) {
        var cardClass = getCardClass(application.status); // Get the card class
        var card = `
            <div class="row mb-3">
                <div class="col">
                <div class="card ${cardClass} border shadow-lg rounded-3 mx-auto" style="width: 70%; "> <!-- Include inline styles here -->
                        <div class="card-body">
                            <h5 class="card-title">${application.jobTitle} at ${application.companyName}</h5>
                            <p class="card-text">Category: ${application.category}</p>
                            <p class="card-text">Status: ${application.status}</p>
                            <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#jobModal" onclick='fun1("${application.jobid}")'>More Info</a>
                        </div>
                    </div>
                </div>
            </div>`;
        container.append(card);
    });
}

function getCardClass(status) {
    switch (status) {
        case 'approved':
            return 'bg-success-light border-success';
        case 'rejected':
            return 'bg-danger-light border-danger';
        case 'pending':
            return 'bg-warning-light border-warning';
        default:
            return 'bg-primary-light border-primary';
    }
}


function filterApplications(query) {
    $.ajax({
        url: "/myproject/about/atlaSearch",
        type: "POST",
        data: { "query": query },
        success: function(response) {
            var applications = JSON.parse(response);
            displayApplications(applications);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Search Functionality
$('#searchInput').on('keyup input', function() {
    var query = $(this).val().trim().toLowerCase();
    filterApplications(query);
});

</script>
