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

            <link rel="stylesheet" href="/plymotion/assets/css/bootstrap.min.css" />

            <link rel="stylesheet" href="/plymotion/assets/css/style.css" />



            <!-- JavaScript -->

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

            <script src="/plymotion/assets/javascript/script.js"></script>

            <script src="/plymotion/assets/javascript/libaries/bootstrap.min.js"></script>



            <!-- Favicon and Apple Icons -->

            <link rel="shortcut icon" href="images/icons/favicon.ico">

            <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">

            <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-72x72.png">

            <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-114x114.png">

        </head>

        <body>

            <div id="banner">
                <image src="/plymotion/assets/img/banner.jpg">
            </div>

            <div class="container">

                <div id="navigation">

                    <div class="row">

                        <nav>

                            <ul>

                                <li><a href="/plymotion/">Home</a> </li>

                                <li><a href="/plymotion/news">News</a></li>

                                <li><a href="/plymotion/courses">Courses</a></li>

                                <li><a id="adminLogin" href="#" data-toggle="modal" data-target="#adminModal">Admin</a></li>

                            </ul>

                        </nav>

                    </div>

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

