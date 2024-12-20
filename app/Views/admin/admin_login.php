<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Admin</title>
        <link rel="stylesheet" href="<?php echo CSS.'admin-login.css'; ?>">
        <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary" style="background-color: #e74c3c;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <div class="card-body">
                                        <?php
                                        $session = \Config\Services::session();
                                        if ($session->getFlashdata('warning')) {
                                        ?>
                                            <div class="alert alert-warning">
                                                <ul>
                                                    <?php
                                                    foreach ($session->getFlashdata('warning') as $val) {
                                                    ?>
                                                        <li><?php echo $val ?></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        if ($session->getFlashdata('success')) {
                                        ?>
                                            <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
                                        <?php
                                        }
                                        ?>
                                        <form method="post" action="<?= base_url('adminpages/loginadmin'); ?>">
                                            <?php if(session()->getFlashdata('notfound')) : ?>
                                                <div class="alert alert-danger">
                                                    <?php echo session()->getFlashdata('notfound') ?>
                                                </div>
                                            <?php elseif(session()->getFlashdata('gagal')) : ?>
                                                <div class="alert alert-danger">
                                                    <?php echo session()->getFlashdata('gagal') ?>
                                                </div>
                                            <?php endif ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" type="text" placeholder="username" name="username"
                                                value="<?php echo session()->getFlashdata('username'); ?>"/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" class="btn btn-primary" name="login" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo JS.'scripts.js'; ?>"> </script>
        
    </body>
</html>