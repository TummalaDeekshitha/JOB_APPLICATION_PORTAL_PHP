<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Application Status</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if ($status === 'success'): ?>
  <div class="container mt-5">
    <div class="alert alert-success text-center">
      <h2 class="alert-heading">Your Job Application is Successfully Submitted!</h2>
      <p>Thank you for applying. We will review your application and get back to you soon.</p>
      <!-- About button linking to the about page -->
      <a href="/myproject/about" class="btn btn-primary">About</a>
    </div>
  </div>
<?php elseif ($status === 'applied'): ?>
  <div class="container mt-5">
    <div class="alert alert-warning text-center">
      <h2 class="alert-heading">You've Already Applied for This Job</h2>
      <p>It seems you've already submitted an application for this job. We appreciate your interest!</p>
      <!-- About button linking to the about page -->
      <a href="/myproject/about" class="btn btn-primary">About</a>
    </div>
  </div>
<?php else: ?>
  <div class="container mt-5">
    <div class="alert alert-danger text-center">
      <h2 class="alert-heading">Something Went Wrong!</h2>
      <p>We apologize, but there was an issue processing your request. Please try again later.</p>
      <!-- About button linking to the about page -->
      <a href="/myproject/about" class="btn btn-primary">About</a>
    </div>
  </div>
<?php endif; ?>

<!-- Bootstrap JS and Popper.js (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
