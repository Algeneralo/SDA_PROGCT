<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="32U1neKrIyktDOHp5NUMqhutzlWMvCCKyRmAV5va">

    <title>Staff Page</title>

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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Main Screen</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="post">

                            <div class="form-group col-md-3 pull-left">

                            </div>

                            <div class="form-group col-md-offset-3 col-md-5 pull-left">
                                <input formaction="Index?action=ManageBook" class="btn btn-primary" type="submit"
                                       name="manage_book"
                                       value="ManageBook">
                            </div>

                            <div class="form-group col-md-5 pull-right">
                                <input formaction="Index?action=ManageProvider" class="btn btn-primary" type="submit"
                                       name="manage_provider"
                                       value="ManageProvider">
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
