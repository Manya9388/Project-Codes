<html>
    <head>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Clothing Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce " name="keywords">
        <meta content="eCommerce " name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        estoreclothings@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +91 9048818583
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #FF6F61;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2;}
        </style>
    </head>
    <body>
       <!-- Bottom Bar Start -->
       <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                  
                            <a class="nav-link" href="adminhome.php"><i class="fa fa-sign-out-alt"></i>Home</a>
                        </div>
                    </div>
                    </div>
                    
        <table  id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
            <thead>  
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Proof</th>
                    <th>Status</th>
                </tr>
            </thead>  
            <tbody> 
                <?php
                    include 'config.php';
                    $query=mysqli_query($conn,"SELECT * from tbl_dbrequest where db_status=0 ;");
                    
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                    $db_id=$row['db_id'];
                ?>                                  
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($row['db_name']);?></td>
                    <td><?php echo htmlentities($row['db_phone']);?></td>
                    <td><?php echo htmlentities($row['db_email']);?></td>
                    <td>
                        <a style="text-decoration:none;" href="display_pdf.php?db_id=<?php echo $row['db_id']?>" class="pdf-link">
                            <?php echo htmlentities($row['db_image']);?>
                        </a>
                    </td>
                    <td><a href="dpass.php?db_id=<?php echo $row['db_id'] ?>"style="color: red;">Approve</a></td>
                </tr>
                <?php $cnt=$cnt+1; } ?>
            </tbody>  
        </table>  
    </body>  
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>
