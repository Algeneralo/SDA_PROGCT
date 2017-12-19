<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="32U1neKrIyktDOHp5NUMqhutzlWMvCCKyRmAV5va">

    <title>User Page</title>

    <!-- Styles -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/font-awesome.min.css" rel="stylesheet">
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
                        Book List

                        <div class="pull-right cart">
                            <a class="panel-danger cart_button" data-toggle="modal" data-target="#cart_modal">
                                <span>Cart</span>
                            </a>
                            <span class="cart-number">0</span>
                        </div>
                    </div>
                    <div class="panel-body bookList">
                        <?php foreach ($bookArray as $book) { ?>
                            <div class="col-md-4 panel panel-default" style="margin-left:4% ;width: 28%">
                                <div class="panel-heading text-center">
                                    <h4><b><?php echo $book['3']; ?></b></h4>
                                    <img src="./assets/image/book1.jpg" style="width: 50%">
                                </div>
                                <div class="panel-body text-center">
                                    <span><b>Author:</b><?php echo $book['2']; ?></span>
                                    <br>
                                    <span><b>Available:</b><?php echo $book['4']; ?></span>
                                    <br>
                                    <span><b>Book Price:</b><?php echo $book['5']; ?></span>
                                    <br>
                                    <br>
                                    <form class="form">
                                        <div class="form-group col-md-3" style="width: 94px">
                                            <input value="<?php echo $book['0']; ?>" type="hidden">
                                            <input class="form-control" type="number" max="<?php echo $book['4']; ?>"
                                                   min="1" required>
                                        </div>
                                        <div>
                                            <button class="btn btn-success add_button">Add to cart</button>
                                            <button class="btn btn-danger remove_button" style="display: none">Remove
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cart_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cart content</h4>
            </div>
            <div class="modal-body">
                <div class="row cart_content">
                    <div class="col-md-4 panel panel-default"
                         style="margin-left:4% ;width: 15%;font-size: 8px;padding-left: 0px;padding-right: 0px">
                        <div class="panel-heading text-center">
                            <h4><b>title</b></h4>
                            <img src="./assets/image/book1.jpg" style="width: 50%">
                        </div>
                        <div class="panel-body text-center">
                            <span><b>Count:</b>10000</span>
                            <br>
                            <span><b>Book Price:</b>500$</span>
                            <br>
                            <span><b>Total Price:</b>111111$</span>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="Index?action=buyBooks" id="modal_form" method="post">
                    <div class="pull-left">
                        <label class="pull-left">Total Prices</label>
                        <div class="col-md-4 pull-left">
                            <input id="total_prices" name="total_prices" class="form-control" value="0$" disabled
                                   style="margin-top: -7px;">
                        </div>
                    </div>
                    <input id="buy" class="btn btn-success" type="submit"
                           value="Buy">
                    <input formaction="javascript:deleteContent()" id="delete_content" class="btn btn-danger"
                           type="submit"
                           value="Delete content">
                    <input id="booksPurchased" name="booksPurchased" type="hidden" value="">
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
    bookArray = [];
    $('.form').on('submit', function (e) {
        e.preventDefault();
        var book_id = $(this).parent().find('div').find('input').eq(0).val();
        var purchases_book_count = $(this).parent().find('div').find('input').eq(1);
        var add_button = $(this).find('button').eq(0);
        var cancel_button = $(this).find('button').eq(1);

        if (add_button.css('display') === 'inline-block') {
            addToCart(this, book_id, add_button, cancel_button, purchases_book_count);
        }
        else {
            removeFromCart(this, book_id, add_button, cancel_button, purchases_book_count);
        }
    });

    function addToCart(parent, bookId, add_button, cancel_button, purchases_book_count) {
        $(parent).find('div').eq(1).fadeOut(600, function () {
            add_button.css('display', 'none');
            cancel_button.css('display', 'inline-block');
            purchases_book_count.prop('disabled', true);
        }).fadeIn(600);
        var bookTitle = $(parent).parent().siblings().eq(0).find('h4').text();
        var bookPrice = $(parent).siblings().eq(4).text().split(':')[1];
        var old_bookCount = $(parent).siblings().eq(3).text().split(':')[1];
        bookArray.push(bookId + "," + purchases_book_count.val() + "," + bookTitle + "," + bookPrice + "," + old_bookCount);
        var number = parseInt($('.cart-number').text());
        $('.cart-number').text(number + 1);

    }

    function removeFromCart(parent, bookId, add_button, cancel_button, purchases_book_count) {
        $(parent).find('div').eq(1).fadeOut(600, function () {
            add_button.css('display', 'inline-block');
            cancel_button.css('display', 'none');
            purchases_book_count.prop('disabled', false);
        }).fadeIn(600);
        var number = parseInt($('.cart-number').text());
        $('.cart-number').text(number - 1);
        if (bookId != null) {
            var bookTitle = $(parent).parent().siblings().eq(0).find('h4').text();
            var bookPrice = $(parent).siblings().eq(4).text().split(':')[1];
            var old_bookCount = $(parent).siblings().eq(3).text().split(':')[1];
            var bookIndex = bookArray.indexOf(bookId + "," + purchases_book_count.val() + "," + bookTitle + "," + bookPrice + "," + old_bookCount);
            delete bookArray.splice(bookIndex, 1);
        } else {
            bookArray = [];
            bookArray.length = 0;
        }
        purchases_book_count.val('');
    }

    function deleteContent() {
        $('.modal-body').empty();
        var bookList = $('.bookList').children().length;

        for (var countrer = 0; countrer < bookList; countrer++) {
            var parent = $('.bookList').children().find('form').eq(countrer);
            var add_button = $(parent).find('button').eq(0);
            var cancel_button = $(parent).find('button').eq(1);
            var purchases_book_count = $(parent).find('div').find('input').eq(1);
            removeFromCart(parent, null, add_button, cancel_button, purchases_book_count);
        }
        $('.cart-number').text(0);
        $('#cart_modal').modal('toggle');
    }

    $('#buy').on('click', function (e) {
        e.preventDefault();
        var booksPurchased = "";
        for (var a = 0; a < bookArray.length; a++) {
            booksPurchased += bookArray[a] + ";";
        }
        $('#booksPurchased').val(booksPurchased);
        $('#modal_form').submit();
    });

    $('.cart_button').on('click', function (e) {
        $('.cart_content').empty();
        var total_prices = 0;
        for (var counter = 0; counter < bookArray.length; counter++) {
            var title = bookArray[counter].split(',')[2];
            var count = bookArray[counter].split(',')[1];
            var book_price = bookArray[counter].split(',')[3];
            $('.cart_content').append(' ' +
                '<div class="col-md-4 panel panel-default"' +
                'style="margin-left:4% ;width: 15%;font-size: 13px;padding-left: 0px;padding-right: 0px">' +
                '     <div class="panel-heading text-center">' +
                '         <h4><b>' + title + '</b></h4>' +
                '         <img src="./assets/image/book1.jpg" style="width: 50%">' +
                '     </div>' +
                '     <div class="panel-body text-center">' +
                '         <span><b>Count:</b>' + count + '</span>' +
                '         <br>' +
                '         <span><b>Book Price:</b>' + book_price + '$</span>' +
                '         <br>' +
                '         <span><b>Total Price:</b>' + parseInt(book_price) * parseInt(count) + '$</span>' +
                '         <br>' +
                '         <br>' +
                '     </div>' +
                '</div>');
            total_prices += parseInt(book_price) * parseInt(count);
        }
        $('#total_prices').val(total_prices + '$');
        if (bookArray.length === 0) {
            $('#total_prices').val('0$');
            $('.cart_content').append("<div class='text-center'>Add Item to the cart first!</div>")
        }
    })
</script>
</html>
