<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/ac1ee11f2c.js" crossorigin="anonymous"></script>

        <!-- My CSS -->
        <link rel="stylesheet" href="css/mimpy.id.css">
        <link rel="stylesheet" href="css/dashboard.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

        <!-- title -->
        <title>Admin</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand ml-2" href="#">
                <strong>Mimpy.ID</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul> -->
                <form class="form-inline my-2 my-lg-0 ml-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="icon ml-4">
                    <h5>
                        <i class="fas fa-sign-in-alt text-white mr-3" data-toggle="tooltip" tittle="Logout"></i>
                    </h5>
                </div>
            </div>
        </nav>
        <!-- end Navbar -->

        <!-- Nav -->
        <div class="row no-gutters mt-5">
            <div class="col-md-2 bg-dark pr-3 pt-4"> 
                <ul class="nav flex-column ml-3 mb-5">
                    <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">  
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-building"></i>
                            Data Perusahaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-sticky-note"></i>
                            Data Loker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-address-card"></i>
                            Data Pelamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-address-book"></i>
                            Data Lamaran
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 p-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pelamar</h6>
                        </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Regional</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001</td>
                                    <td>Febri Wira</td>
                                    <td>febriwira@gmail.com</td>
                                    <td>081234567890</td>
                                    <td>Denpasar</td>
                                    <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end nav --> 

        <!-- end footer -->

        
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- My Javascript -->
        <script src="js/script.js"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
    </body>
</html>