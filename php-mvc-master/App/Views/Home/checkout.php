
<html>
<head>
    <!-- Latest compiled and minified BootstrapCSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/cssCheckout/main.css" rel="stylesheet" type="text/css" media="all"/>



    <!--   Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700|Playfair+Display:400,700" rel="stylesheet">

    <title>
    </title>
</head>

<body>
<div class="wrapper">
    <h1>Checkout</h1>

    <div class="left col col-md-6" >
        <div class="customer-info">
            <h2><span>1</span> Customer</h2>
            <p><?php echo $customer['name']?></p>
        </div>
        <div class="customer-info">
            <h2><span>2</span> Total</h2>

                <?php
                $total_price = 0;
                $sub_total = 0;
                foreach ($cart as $item) {
                    $total_price = $item['quantity'] * $item['unit_price'];
                    $sub_total += $total_price;
                }
                ?>
            <label><?php echo $sub_total?> VND</label>
        </div>

        <div class="customer-pay">
            <h2><span>3</span> Payment</h2>


            <div class="form-group">
                <label for="usr">Ban vui long gui tien vao STK: 012343435</label><br>
                <label for="usr">Chu nguoi nhan: Bien Van Phuc</label><br>
                <label for="usr">Loi nhan: Phuc dep trai</label>

            </div>
            <form method="post">
                <label for="total">Total</label><br>
                <input type="text" id="total" name="total" value="<?php echo $sub_total?>VND" readonly><br>
                <label>Note</label><br>
                <input type="text" name="note"><br>
                <button class="btn btn-default" type="submit" name="submit">Submit</button>
            </form>

        </div>


    </div>



</div>



</body>
</html>
