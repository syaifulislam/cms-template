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
    <title>Sub Category</title>
    <!-- Bootstrap Core CSS -->
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Sub Category</h3>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" style="padding-bottom: 10px;">
                                    <div class="col-md-11">
                                    </div>
                                    <div class="col-md-1">
                                        <button data-toggle="modal" style="float:right;" data-target="#responsive-modal" type="button" class="btn waves-effect waves-light btn-primary btn-rounded">Create</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table color-bordered-table info-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Sort Order</th>
                                                <th>Categories</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Coba</td>
                                                <td>Coba</td>
                                                <td>Coba</td>
                                                <td><button type="button" class="btn waves-effect waves-light btn-sm btn-success">Edit</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Sub Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/sub-category" method="POST">
                                        <div class="form-group">
                                            <label class="control-label">Name:</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Name:</label>
                                            <select class="form-control custom-select choose_category" name="category_id">
                                                <option value="">Choose Category</option>
                                                @foreach ($data as $item)<option value="{{$item->id}}">{{$item->name}}</option>@endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Sort Order:</label>
                                            <input type="number" name="sort_order" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light" id="submit-button" style="cursor: no-drop;" disabled>Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>
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
    $('.choose_category').on('change',function(){
        if ( $(this).val() != '' ) {
            $('#submit-button').removeAttr('style');
            $('#submit-button').attr('disabled',false);
        } else {
            $('#submit-button').attr('disabled',true);
            $('#submit-button').css('cursor','no-drop');
        }
    });
    </script>
</body>

</html>