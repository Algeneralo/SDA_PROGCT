<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="32U1neKrIyktDOHp5NUMqhutzlWMvCCKyRmAV5va">

    <title>Add Book</title>

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
                        Add Book
                    </div>
                    <div class="panel-body">
                        <form action="Index?action=addBook" method="post" class="form-horizontal">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-md-1">ISBN:</label>
                                    <div class="col-md-3">
                                        <input id="book_ISBN" name="book_ISBN" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Title:</label>
                                    <div class="col-md-3">
                                        <input id="book_title" name="book_title" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Author:</label>
                                    <div class="col-md-3">
                                        <input id="book_author" name="book_author" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Book Count:</label>
                                    <div class="col-md-3">
                                        <input id="book_count" name="book_count" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Book Price:</label>
                                    <div class="col-md-3">
                                        <input id="book_price" name="book_price" class="form-control"
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
