<div id="content" class="container">
    <div class="row">
        <div class="col-md-2 side-bar">
            <div class="affixNav">
                <div class="affixNavContent">
                    <ul class="nav bs-sidenav">
                        <li>
                            <a href="<?php echo site_url('admin/home') ?>"><b>Admin Home</b></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="affixNav">
                <div class="affixNavHeader">
                    <b>User Management</b>
                </div>
                <div class="affixNavContent">
                    <ul class="nav bs-sidenav">
                        <li>
                            <a href="<?php echo site_url('admin/clientManagment') ?>"><i class="fa fa-users"></i> Clients</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/adminManagment') ?>"><i class="fa fa-user"></i> Admins</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/instructorManagment') ?>"><i class="fa fa-user"></i> Instructors</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="affixNav">
                <div class="affixNavHeader">
                    <b>Course Management</b>
                </div>
                <div class="affixNavContent">
                    <ul class="nav bs-sidenav">
                        <li>
                            <a href="<?php echo site_url('admin/venueManagment') ?>"><i class="fa fa-leaf"></i> Venues</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/courseManagment/active') ?>"><i class="fa fa-book"></i> Courses</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/sessionManagment/active') ?>"><i class="fa fa-calendar"></i> Sessions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="affixNav">
                <div class="affixNavHeader">
                    <b>News Management</b>
                </div>
                <div class="affixNavContent">
                    <ul class="nav bs-sidenav">
                        <li>
                            <a href="<?php echo site_url('admin/newsManagment') ?>"><i class="fa fa-bars"></i> Posts</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#addNewsModal"><i class="fa fa-pencil"></i> Add Post</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Post</h4>
                    </div>
                    <div class="modal-body">
                        <div id="form">
                            <?php
                            $attributes = array('id' => 'addNewsForm', 'class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('admin/addNews', $attributes);
                            ?>
                            <div class="form-group">
                                <label for="end" class="col-sm-2 control-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end" class="col-sm-2 control-label">Content:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="content"></textarea>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addNewsSubmit">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

