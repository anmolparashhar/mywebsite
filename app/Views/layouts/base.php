<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>GoPHP Training and Development</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark mynav">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url()?>">GoPHP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url()?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>about">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url()?>courses/training">Training</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url()?>courses/online">Online</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url()?>courses/galary">Galary</a>
								 <!-- <div class="dropdown-divider"></div> -->
                                <!-- <a class="dropdown-item" href="fullwidth.html">Programming</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>login">Login</a>
                        </li>
                        
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?= $this->renderSection("content"); ?>
        <footer class="bg-primary px-2 py-2">
            <div>
                <p class="text-center">&copy; 2020 All Copy rights reserved</p>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?= base_url(); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js" ></script>
    </body>
</html>