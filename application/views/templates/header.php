<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->



    <html>

        <head>

            <meta charset="utf-8">

            <title><?php echo $title ?> - Plymotion</title>

            <meta name="description" content="">

            <meta name="author" content="Sam Berry">



            <!--Mobile Specific Meta -->

            <meta name="viewport" content="width=device-width", initial-scale="1", maximum-scale="1">



            <!-- Stylesheets -->

            <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>" />

            <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css') ?>" />

            <link rel="stylesheet" href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css') ?>" />



            <!-- JavaScript -->

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

            <script src="<?php echo base_url('/assets/javascript/script.js') ?>"></script>

            <script src="<?php echo base_url('/assets/javascript/libaries/bootstrap.min.js') ?>"></script>



            <!-- Favicon and Apple Icons -->

            <link rel="shortcut icon" href="<?php echo base_url('/assets/img/favicon.ico') ?>">

        </head>

        <body>

            <div id="banner">
                <image src="<?php echo base_url('/assets/img/banner.jpg') ?>">
            </div>

                <div id="navigation">

                    <div class="row">

                        <nav>

                            <ul>

                                <li><a href="<?php echo base_url() ?>">Home</a> </li>

                                <li><a href="<?php echo site_url('news') ?>">News</a></li>

                                <li><a href="<?php echo site_url('courses') ?>">Courses</a></li>

                                <?php if($this->session->userdata('logged_in') === true && $this->session->userdata('auth') === 'admin') { ?>
                                <li><a href="<?php echo site_url('admin/home') ?>" >Admin/Instructor</a></li>
                                <?php } elseif($this->session->userdata('logged_in') === true && $this->session->userdata('auth') === 'instructor') { ?>
                                <li><a href="<?php echo site_url('instructor/home') ?>">Admin/Instructor</a></li>
                                <?php } else { ?>
                                <li><a id="adminLogin" href="#" data-toggle="modal" data-target="#adminModal">Admin/Trainers</a></li>
                                <?php } ?>

                            </ul>

                        </nav>

                    </div>

                </div>



            <div class="container_content">
                <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Admin Login</h4>
                            </div>
                            <div class="modal-body">
                                <div id="form">
                                    <div class="message"></div>
                                    <?php
                                    $attributes = array('id' => 'adminForm', 'class' => 'form-horizontal', 'role' => 'form');
                                    echo form_open('adminLogin', $attributes);
                                    ?>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label">Username:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="username" name="username" placeholder="jackWhite">
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Dog1">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="adminSubmit">Submit</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

