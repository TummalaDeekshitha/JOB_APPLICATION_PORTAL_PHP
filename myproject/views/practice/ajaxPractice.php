<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div >
        <div class="row">
            <div class="col-6 " id="jobtitle">
                <!-- Display cards here -->
                <?php foreach($model as $job): ?>
                <div class="row mb-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><?php echo $job->jobTitle ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
            <?php for($i=0; $i<$count; $i++): ?>
                    <button onclick="fun1('<?= $i ?>')" class="btn btn-primary p-4 m-2"><h1><?= $i ?></h1></button>
                <?php endfor; ?>
                
            </div>
            
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fun1(n) {
            console.log( "the value of n is"+n);
            console.log("hello");
            $.ajax({
                url: "/myproject/practice/ajax",
                method: "POST",
                data: {pg:n},
                success: function(response) {
                    response = JSON.parse(response);
                    console.log(response);
                    var html = "";
                    response.forEach(function(obj) {
                        html += `<div class="row mb-4">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">${obj.jobTitle}</div>
                                                <div class="card-text">${obj["companyName"]}</div>
                                                <div class="card-text">${obj["totalApplications"]}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $('#jobtitle').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(() => {
            console.log("hello");
        });
    </script>
</body>
</html>
