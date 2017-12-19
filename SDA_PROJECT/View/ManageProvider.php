<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="32U1neKrIyktDOHp5NUMqhutzlWMvCCKyRmAV5va">

    <title>Manage Provider</title>

    <!-- Styles -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/custom1.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Welcome
                </a>
            </div>
            <form action="Index?action=logout" method="post" class="nav navbar-nav navbar-right"
                  style="margin-top: 6px">
                <input class="btn btn-default pull-right" type="submit" value="Logout">
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php if (isset($status) && $status == 'true') { ?>
                    <div class="panel panel-success">
                        <div class="panel-heading text-center">
                            <?php echo $messageSuccess; ?>
                        </div>
                    </div>
                <?php } elseif (isset($status) && empty($status)) { ?>
                    <div class="panel panel-danger">
                        <div class="panel-heading text-center">
                            <?php echo $messageFailed; ?>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div class="row">
                            <div>
                                Manage Provider
                            </div>
                            <div class="pull-left search">
                                <form class="searchForm">
                                    <div class="form-group col-md-5" style="padding-right: 0">
                                        <input id="searchValue" name="searchValue" class="form-control" type="text"
                                               placeholder="Search Book" required>
                                    </div>
                                    <div class="form-group col-md-4" style="padding-left: 3px;padding-right: 2px">
                                        <select id="searchKey" name="searchKey" class="form-control" required>>
                                            <option value="ByID">By Provider ID</option>
                                            <option value="ByName">By Provider Name</option>
                                            <option value="All">All Providers</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i> Search
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <input formaction="Index?action=addProvider" class="btn btn-success" type="submit"
                                   value="Add Provider">
                            <input formaction="Index?action=Back&to=StaffMainPage" class="btn btn-primary pull-right"
                                   type="submit"
                                   value="Back">
                        </form>
                        <br>
                        <table class="table table-hover col-md-8" id="table1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            foreach ($providerArray as $k => $arr) {
                                if (!empty($arr)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo $arr[1] ?></td>
                                        <td><?php echo $arr[2] ?></td>
                                        <td><?php echo $arr[3] ?></td>
                                        <td><?php echo $arr[4] ?></td>
                                        <td><?php echo $arr[5] ?></td>
                                        <td>
                                            <input id="id" name="id" type="hidden" value="<?php echo $arr[0] ?>">
                                            <a type="button" class="btn btn-warning edit-modal" data-toggle="modal"
                                               data-target="#edit_modal">
                                                <i class="glyphicon glyphicon-pencil"></i> Edit
                                            </a>
                                            <a type="button" class="btn btn-danger delete-modal" data-toggle="modal"
                                               data-target="#delete_modal" style="">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No Data Found</td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Provider</h4>
            </div>
            <form action="Index?action=editProvider" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-1">ID:</label>
                        <div class="col-md-3">
                            <input id="edit_provider_ID" name="edit_provider_ID" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Name:</label>
                        <div class="col-md-3">
                            <input id="edit_provider_name" name="edit_provider_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Address:</label>
                        <div class="col-md-3">
                            <input id="edit_provider_address" name="edit_provider_address" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Phone number:</label>
                        <div class="col-md-3">
                            <input id="edit_provider_phone" name="edit_provider_phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Email:</label>
                        <div class="col-md-3">
                            <input type="email" id="edit_provider_email" name="edit_provider_email" class="form-control"
                                   required>
                        </div>
                        <input id="edit_ID_DB" name="edit_ID_DB" type="hidden">
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="moadal_delete_button" class="btn btn-warning" type="submit" value="Edit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="delete_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Provider</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <label id="delete_provider_name"></label> ?</p>
            </div>
            <div class="modal-footer">
                <form action="Index?action=deleteProvider" method="post">
                    <input id="moadal_delete_button" class="btn btn-danger" type="submit" value="Delete">
                    <input id="delete_ID_DB" name="delete_ID_DB" type="hidden" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
<script src="./assets/js/jquery-3.2.1.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

<script>
    $('.delete-modal').on('click', function () {
        var id_DB = $(this).parent().parent().find('td').eq(6).find('input').val();
        var name = $(this).parent().parent().find('td').eq(2).text();
        $('#delete_ID_DB').val(id_DB);
        $('#delete_provider_name').text(name);
        console.log(id_DB);
    });
    $('.edit-modal').on('click', function () {
        var id_DB = $(this).parent().parent().find('td').eq(6).find('input').val();
        var provider_id = $(this).parent().parent().find('td').eq(1).text();
        var name = $(this).parent().parent().find('td').eq(2).text();
        var address = $(this).parent().parent().find('td').eq(3).text();
        var phone = $(this).parent().parent().find('td').eq(4).text();
        var email = $(this).parent().parent().find('td').eq(5).text();
        $('#edit_ID_DB').val(id_DB);
        $('#edit_provider_ID').val(provider_id);
        $('#edit_provider_name').val(name);
        $('#edit_provider_address').val(address);
        $('#edit_provider_phone').val(phone);
        $('#edit_provider_email').val(email);
    });
    $('.searchForm').on('submit', function (e) {
        e.preventDefault();
        var searchKey = $('#searchKey').val();
        var searchValue = $('#searchValue').val();
        $.ajax({
            'url': 'Index?action=providerSearch',
            'method': 'post',
            data: {
                'searchKey': searchKey,
                'searchValue': searchValue
            },
            success: function (data) {
                $('tbody').empty();
                $('tbody').append(data);
            }
        });
    });
    $('#searchKey').on('change', function () {
        if ($(this).val() == 'All') {
            $('#searchValue').val('');
            $('#searchValue').prop('disabled', true);
        } else $('#searchValue').prop('disabled', false);
    });
</script>
</html>
