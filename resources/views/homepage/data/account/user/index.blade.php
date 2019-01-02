<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <title>User</title>
    <!-- Bootstrap Core CSS -->
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        @include('extends/header')
        @include('extends/sidebar')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">User</h3>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List<span style="padding-left: 1150px;"><button data-toggle="modal" data-target="#responsive-modal" type="button" class="btn waves-effect waves-light btn-primary">Create</button></span></h4>
                                <div class="table-responsive">
                                    <table class="table color-bordered-table info-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Created At</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->first_name}}</td>
                                                    <td>{{$item->last_name}}</td>
                                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s')}}</td>
                                                    <td>{{$item->last_login ? \Carbon\Carbon::parse($item->last_login)->format('d F Y H:i:s'):''}}</td>
                                                    <td><button type="button" onclick="show({{$item->id}})" class="btn waves-effect waves-light btn-sm btn-success">Edit</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sample modal content -->
                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="/user" method="POST">
                                    <div class="form-group">
                                        <label class="control-label">First Name:</label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name:</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password:</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirmation Password:</label>
                                        <input type="password" name="ConfirmPassword" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
                <!-- sample modal content -->
                <div id="responsive-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="form-edit">
                                    <div class="form-group">
                                        <label class="control-label">First Name:</label>
                                        <input type="text" name="first_name" class="form-control input-first-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name:</label>
                                        <input type="text" name="last_name" class="form-control input-last-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input type="email" name="email" class="form-control input-email">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password:</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirmation Password:</label>
                                        <input type="password" name="ConfirmPassword" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
            </div>
        </div>
    </div>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="/plugins/raphael/raphael-min.js"></script>
    <script src="/plugins/morrisjs/morris.min.js"></script>
    <!-- ============================================================== -->
    <script src="/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
    function show(id){
        $.ajax({
            url: "/user/"+id,
            type: "GET",
            success: function(data){
                $('.input-first-name').val(data.data.first_name);
                $('.input-last-name').val(data.data.last_name);
                $('.input-email').val(data.data.email);
                $('#form-edit').attr("action",'/user/'+id);
                $('#responsive-modal-edit').modal();
            }
        });
    }
    </script>
</body>

</html>