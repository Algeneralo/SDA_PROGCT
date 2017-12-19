<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="32U1neKrIyktDOHp5NUMqhutzlWMvCCKyRmAV5va">

    <title>Add Provider</title>

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
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Add Provider
                    </div>
                    <div class="panel-body">
                        <form action="Index?action=addProvider" method="post" class="form-horizontal">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-md-1">ID:</label>
                                    <div class="col-md-3">
                                        <input id="provider_ID" name="provider_ID" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Name:</label>
                                    <div class="col-md-3">
                                        <input id="provider_name" name="provider_name" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Address:</label>
                                    <div class="col-md-3">
                                        <input id="provider_address" name="provider_address"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Phone number:</label>
                                    <div class="col-md-3">
                                        <input id="provider_phone" name="provider_phone" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Email:</label>
                                    <div class="col-md-3">
                                        <input type="email" id="provider_email" name="provider_email"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" value="Add">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
<script src="./assets/js/jquery-3.2.1.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

</html>
