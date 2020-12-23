<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css">

    <title>Alumni API Dev+</title>
  </head>

  <body>
    <div class="container">
        <nav class="navbar navbar-white bg-white px-0 mb-4">
            <a href="http://localhost/riset5/api" class="navbar-brand text-dark">Alumni API Dev+</a>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mr John Doe
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
        </nav>
    </div>


    <div class="container">
            <h3>My Project</h3>
        <hr>
        <!-- Button trigger modal -->
        <div class="container">
            <button class="card" style="width: 100%" data-toggle="modal" data-target="#staticBackdropAddApp">
                <div class="card-body text-primary">
                    <p style="font-size: 3rem;">+</p>
                    <p>Add Project</p>
                </div>
            </button>
            <?php
            foreach($client_app as $key => $data) { ?>
            <button class="card text-left app_detail" style="width: 100%" data-id="<?php echo $data['id']; ?>">
                <div class="card-body text-dark p-4">
                    <h5 class="card-title"><?php echo $data['nama_app']; ?></h4>
                    <h6 class="card-subtitle text-muted"><?php echo $data['deskripsi']; ?></h5>
                </div>
                <div class="p-4"><?php switch($data['status']){
                    case 'review': echo 'Waiting for review'; break;
                    case 'ditolak': echo 'Request app ditolak'; break;
                    case 'diterima': echo 'aplikasi diterima'; break;
                }; ?></div>
            </button>
            <?php } ?>
        </div>

        <!-- Modal add App-->
        <form action ="<?php echo base_url(); ?>/api/create" method = "post">
        <div class="modal fade" id="staticBackdropAddApp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Request Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="nama_app" id="name">
                                <small id="nameHelpBlock" class="form-text text-muted">
                                    Your app name.    
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="deskripsi_app" id="desription" rows="3"></textarea>
                                <small id="descriptionHelpBlock" class="form-text text-muted">
                                    Something to briefly describes your apps.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="redirectUrl">Redirect URL</label>
                                <input type="text" class="form-control" name="redirect_app" id="redirectUrl">
                                <small id="redirectUrlHelpBlock" class="form-text text-muted">
                                    Your application's authorization callback URL. 
                                </small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Mengakses informasi 1
                                </label>
                                <small id="redirectUrlHelpBlock" class="form-text text-muted">
                                    Description. 
                                </small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Mengakses informasi 2
                                </label>
                                <small id="redirectUrlHelpBlock" class="form-text text-muted">
                                    Description. 
                                </small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Mengakses informasi 3
                                </label>
                                <small id="redirectUrlHelpBlock" class="form-text text-muted">
                                    Description. 
                                </small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Mengakses informasi 4
                                </label>
                                <small id="redirectUrlHelpBlock" class="form-text text-muted">
                                    Description. 
                                </small>
                            </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

       <!-- Modal app -->
        <div class="modal fade" id="staticBackdropApp" data-id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detail Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0.1 " id="nama_app"></h5>
                                <p class="text-muted m-0" id="deskripsi_app">Coba...</p>
                                <small class="text-muted m-0" id="username_app">JOHN DOE (johndoe@gmail.com)</small>
                                <h6 class="card-title mt-4 mb-0">Redirect</h5>
                                <small class="text-muted mt-0" id="redirect_app">Coba.com</small>
                                <div class="card mt-3">
                                    <div class="card-header">Scope</div>
                                    <div class="card-body">
                                        <h6 class="card-text" id="scope_app">Mengakses informasi pribadi dasar pengguna seperti nama dan kelas.</h6>
                                        <small class="card-text text-muted">Description.</small>
                                    </div>
                                </div>
                                <h6 class="card-title mt-4 mb-0">Request Date</h5>
                                <small class="text-muted mt-0" id="date_app">16-jan-2020 05.00.00</small>
                                <h6 class="card-title mt-4 mb-0">Status</h5>
                                <small class="text-muted mt-0" id="status_app">Waiting for review...</small>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger btn_cancel">Cancel request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="<?php echo base_url();?>/public/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/script.js"></script>

  </body>
</html>