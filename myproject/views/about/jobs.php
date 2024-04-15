<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available <?= $category ?> Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    
    <!-- integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <style>
        .job-card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 10px;
            transition: box-shadow 0.3s;
            padding: 20px;
            cursor: pointer;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .job-card:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, 0.2);
        }

        .job-card img {
            width: 100%;
            height: 200px; /* Adjust as needed */
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .job-card .card-body {
            padding: 10px;
        }

        .job-card button {
            width: calc(50% - 10px);
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .job-card button:hover {
            background-color: #3396ff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="info" class="col-md-8">
            <h1 class="text-center mr-9">Available <?= $category ?> Jobs</h1>

                <div class="container">
                    <div  class="row row-cols-1 row-cols-md-3 g-4">
                   
                        <?php if (!empty($jobdata)): ?>
                            <?php foreach ($jobdata as $data): ?>
                                <div class="col-4">
                                    <div class="card job-card mr-5 ml-5">
                                        <h3 class="text-center">Company: <?= $data["companyName"] ?></h3>
                                        <img p-3 src=<?= $data["logo"] ?> alt=""/>
                                        <div class="card-body">
                                            <div class="text-center">category: <?= $data["category"] ?></div>
                                            <div class="text-center">Jobname: <?= $data["jobTitle"] ?></div>
                                            <div class="text-center">Openings: <?= $data["openings"]?></div>
                                            <div class="text-center">Last Date: <span class="last-date"><?= $data["lastDate"]->sec ?></span></div>

                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-primary" onclick='fun1(<?php echo json_encode($data); ?>)'>More Info</button>
                                                <a class="btn btn-success" href="/myproject/about/applicationform?jobid=<?= $data["_id"] ?>">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php else: ?>
            <div class="col-4">
                <div class="card job-card mr-5 ml-5">
                    <h3 class="text-center">No jobs available</h3>
                    <img p-3 src="<?php echo Yii::app()->request->baseUrl; ?>/images/noresultfound.jpg" alt="Placeholder"/>
                    <div class="card-body">
                        <div class="text-center">category: N/A</div>
                        <div class="text-center">Jobname: N/A</div>
                        <div class="text-center">Openings: 0</div>
                        <div class="text-center">Last Date: N/A</div>

                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary disabled">More Info</button>
                            <button type="button" class="btn btn-success disabled">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
                    </div>
                </div>
                <div class="container-fluid">
    <!-- Job cards and other content -->
    <div class="pagination-container text-center">
        
        <div id="pagination" class="d-inline"></div>
        
    </div>
</div>

            </div>
            <div class="col-md-4">
            <div class="container m-6 p-5">
    <h3 class="text-center m-3">Filter Options</h3>
    <div>
        <label for="companyFilter" class="form-label">Company Name:</label>
        <select class="form-select" id="companyFilter">
            <option value="">Select Company</option>
        </select>
    </div>
    <div>
        <label for="jobNameFilter" class="form-label">Job Name:</label>
        <select class="form-select" id="jobNameFilter" >
            <option value="">Select Job</option>
        </select>
    </div>
    <div>
            <label for="locationFilter" class="form-label">Location:</label>
            <select class="form-select" id="locationFilter">
                <option value="">Select Location</option>
                <!-- Add options dynamically here -->
            </select>
        </div>
        <div>
            <label for="salaryFilter" class="form-label">Salary:</label>
            <select class="form-select" id="salaryFilter">
            <option value="">Select Salary</option>
                <option value="25000">Above 25000</option>
                <option value="50000">Above 50000</option>
                <option value="75000">Above 75000</option>
                <option value="100000">Above 100000</option>
                <!-- Add options dynamically here -->
            </select>
        </div>
    <div class="text-center mt-3">
    <button type="button" class="btn btn-primary" onclick="applyFilters()">Search</button>
    <!-- Reset button with proper href attribute -->
    <a href="/myproject/about/jobs?category=<?= $category ?>" class="btn btn-secondary">Reset</a>
</div>


    </div>

    <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobModalLabel">Job Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Job details will be displayed here -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         var category = '<?= $category ?>'; 

          $(document).ready(function() {
            

            
            fetchJobs();

    var currentPage = 1; // Initial page
    var totalPages = <?php echo $pages; ?>; // Total number of pages

    // Function to generate pagination links for a specified range
    function generatePagination(startPage, endPage) {
        var paginationHtml = '';
        paginationHtml += '<ul class="pagination justify-content-center">';
        paginationHtml += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>';
        // Generate pagination links based on currentPage and totalPages
        for (var i = startPage; i <= endPage; i++) {
            paginationHtml += '<li class="page-item ' + (currentPage === i ? 'active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
        }
        paginationHtml += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>';
        paginationHtml += '</ul>';
        $('#pagination').html(paginationHtml);
    }

    // Initial pagination generation for the first 5 pages
    generatePagination(1, Math.min(5, totalPages));

    // Function to handle pagination click events
    $('#pagination').on('click', 'a', function(e) {
        e.preventDefault();
        var page = parseInt($(this).data('page'));
        if (page >= 1 && page <= totalPages && page !== currentPage) {
            currentPage = page;
            var startPage = Math.max(1, currentPage - 2);
            var endPage = Math.min(startPage + 4, totalPages);
            displayPageContent(currentPage);
            generatePagination(startPage, endPage);
            
            
        }
    });

    // Function to handle previous page button click
    $('#prevPage').click(function() {
        if (currentPage > 1) {
            currentPage--;
            var startPage = Math.max(1, currentPage - 2);
            var endPage = Math.min(startPage + 4, totalPages);
            generatePagination(startPage, endPage);
            // Perform actions to display content for the new page
            console.log('Display content for page ' + currentPage);
        }
    });

    // Function to handle next page button click
    $('#nextPage').click(function() {
        if (currentPage < totalPages) {
            currentPage++;
            var startPage = Math.max(1, currentPage - 2);
            var endPage = Math.min(startPage + 4, totalPages);
            generatePagination(startPage, endPage);
            // Perform actions to display content for the new page
            console.log('Display content for page ' + currentPage);
        }
    });
    var category = '<?= $category ?>'; 
var companyName = '<?= empty($companyName) ? null : "$companyName"; ?>';
var jobName =' <?= empty($jobName) ? null: "$jobName"; ?>';
var location = '<?= empty($location) ? null : "$location"; ?>';
var salary = '<?= empty($salary) ? null : "$salary"; ?>';


function displayPageContent(pageNumber) {
    $.ajax({
        url: "/myproject/about/pagejobs",
        type: "POST",
        data: {
            category: category,
            company: companyName,
            job: jobName,
            salary: salary,
            location: location,
            pageNumber: pageNumber
        },
        success: function(response) {
            console.log(response);

            if(response=="empty")
            {
    
          $('.row.row-cols-1.row-cols-md-3.g-4').html('<p>No jobs available</p>');
           } 
             if (response && response.length > 0) {
                response = JSON.parse(response);
                var jobData = response;
                console.log(response);
                var html = '';
                jobData.forEach(function(data) {
                    html += '<div class="col-4">';
                    html += '<div class="card job-card mr-5 ml-5">';
                    html += '<h3 class="text-center">Company: ' + data.companyName + '</h3>';
                    html += '<img p-3 src="' + data.logo + '" alt=""/>';
                    html += '<div class="card-body">';
                    html += '<div class="text-center">category: ' + data.category + '</div>';
                    html += '<div class="text-center">Jobname: ' + data.jobTitle + '</div>';
                    html += '<div class="text-center">Openings: ' + data.openings + '</div>';
                    html += '<div class="text-center">Last Date: <span class="last-date">' + data.lastDate + '</span></div>';
                    html += '<div class="d-grid gap-2">';
                    html += `<button type="button" class="btn btn-primary" onclick='fun1(${JSON.stringify(data)})'>More Info</button>`
                   
                    html += '<a class="btn btn-success" href="/myproject/about/applicationform?jobid=' + data._id.$oid + '">Apply</a>';
                    html += '</div></div></div></div>';
                });
                $('.row.row-cols-1.row-cols-md-3.g-4').html(html);
                
            }

            
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}






}




);


// Function to display content for a specific page



        function fun1(data) {
            console.log(data);
            $.ajax({
                url: '/myproject/about/usertracking', // Replace with your actual URL
                type: 'POST', // or 'GET' depending on your server endpoint
                data: { jobId: data["_id"] }, // Send job ID to the server
                success: function(response) {
                    console.log(data);
                    // Update modal content with the fetched job details
                    var modalBody = $('.modal-body');
                    var html = `
                  
                        <p><strong>Salary:</strong> ${data["details"].salary}</p>
                        <p><strong>Location:</strong> ${data["details"].location}</p>
                        <p><strong>Description:</strong> ${data["details"].description}</p>
                    `;
                    modalBody.html(html);
                    
                    // Show the modal using jQuery
                    $('#jobModal').modal('show');
                    
                    // Add blur effect to the modal backdrop
                    $('.modal-backdrop').addClass('blur');
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    console.error(error);
                }
            });
        }
    
        console.log(category);

    function fetchJobs() {
    console.log("hieeeeeeeeeeee");
    $.ajax({
        url: '/myproject/about/fetchJobs',
        type: 'POST',
        data: { category: category },
        success: function(response) {
            response=JSON.parse(response);
            console.log(response);
            const uniqueCompanies = [...new Set(response.map(obj => obj.companyName))];
            // Get unique job titles
            const uniqueJobTitles = [...new Set(response.map(obj => obj.jobTitle))];
            const uniqueLocations=[...new Set(response.map(obj=>obj.details.location))];
            console.log(uniqueLocations);
            updateOptions($('#companyFilter'), uniqueCompanies);
            updateOptions($('#jobNameFilter'), uniqueJobTitles);
            updateOptions($('#locationFilter'),uniqueLocations);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


    function updateOptions(selectElement, options) {
        selectElement.empty();
        console.log("bye");
        selectElement.append('<option value="">Select Option</option>');
        $.each(options, function(index, option) {
            selectElement.append('<option value="' + option + '">' + option + '</option>');
        });
    }
   
    function applyFilters() {
        let selectedCompany = $('#companyFilter').val();
        let selectedJob = $('#jobNameFilter').val();
        let location = $('#locationFilter').val();
        let salary = $('#salaryFilter').val();

        // Construct the URL with filter parameters
         url = "/myproject/about/jobs?company=" + encodeURIComponent(selectedCompany) +
                  "&job=" + encodeURIComponent(selectedJob) +
                  "&location=" + encodeURIComponent(location) +
                  "&salary=" + encodeURIComponent(salary)+
                  "&category="+category;

        // Redirect to the URL with filter parameters
        window.location.href = url;
}
function updatePagination(totalPages) {
    var pagination = $('.pagination');
    pagination.empty(); // Clear existing pagination controls
    // Create pagination controls for each page
    for (var i = 1; i <= totalPages; i++) {
        pagination.append('<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
    }
}



</script>
<script>
    
    var lastDateElements = document.querySelectorAll('.last-date');

    
    lastDateElements.forEach(function(element) { // Get the MongoDB date value from the element's text content
        var timestamp = parseInt(element.textContent);
        var date = new Date(timestamp * 1000); // Multiply by 1000 to convert from seconds to milliseconds

        // Format the date as desired (e.g., YYYY-MM-DD)
        var formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();

        // Update the element's text content with the formatted date
        element.textContent = formattedDate;
    });
</script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
