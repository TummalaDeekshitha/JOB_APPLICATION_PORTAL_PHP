<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Your custom styles -->
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

  <header class="text-white p-3 back">
    <div>Welcome, <?php echo $user; ?> | <a href="/myproject/admin/logout">Logout</a></div>
    <div><a href="/myproject/graphs/showCompanywiseDistribution">CompanywiseJobsDistribution</a></div>
    <div><a href="/myproject/graphs/showSearchDistribution">Most Trending/searched Jobs</a></div>
    <div><a href="/myproject/graphs/applicationTrends">ApplicationTrends</a></div>
  </header>

 
  <div class="container mt-4">
    <?php if(isset($status) && $status !== ""): ?>
    <div class="alert alert-<?php echo $statusType; ?> alert-dismissible fade show" role="alert">
      <?php echo $status; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
   
    <div class="mb-3">
      <input type="text" class="form-control" id="search" placeholder="Search by email">
    </div>

    <div class="row">
      <?php foreach ($employeeDetails as $employer): ?>
      <div class="col-md-12 card mt-2">
        <div class="row g-0 m-2">
         
          <div class="col-md-3">
            <div class="circular-img">
              <img src=" <?php echo $employer["profile"]?>" class="card-img-top" alt="Employer Image">
            </div>
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title"><?php echo $employer['name']; ?></h5>
              <p class="card-text company">Company: <?php echo $employer['companyName']; ?></p>
              <p class="card-text email">Email: <?php echo $employer['email']; ?></p>
              <p class="card-text">Industry: <?php echo $employer['industry']; ?></p>
             
              <?php if ($employer['eligibility']): ?>
              <a class="btn btn-success" href="/myproject/admin/removeemployer?email=<?php echo $employer['email']; ?>">Remove Employer Permissions</a>
              <?php else: ?>
              <a class="btn btn-primary" href="/myproject/admin/addemployer?email=<?php echo $employer['email']; ?>">Add Employer Permissions</a>
             
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  
  <script>
    $(document).ready(function () {
      
      $('#search').on("input",function () {
        
        var searchValue = $(this).val().toLowerCase();
        $('.card').each(function () {
         
          var cardEmail = $(this).find('.card-text.email').text().toLowerCase();
          if (cardEmail.includes(searchValue)) {
            
            $(this).show();
          } else {
           
            $(this).hide();
          }
        });
      });
    });
  </script>
</body>

</html>
