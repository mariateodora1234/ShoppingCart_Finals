<?php
    session_start();
    $arrProducts = array(
        array(
            'name' => "Brown Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "550",
            'picture1' => "produc1A.jpg",
            'picture2' => "produc1B.jpg",
        ),
        array(
            'name' => "Gray Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "550",
            'picture1' => "produc2A.jpg",
            'picture2' => "produc2B.jpg",
        ),
        array(
            'name' => "White Blazer",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "750",
            'picture1' => "produc3A.jpg",
            'picture2' => "produc3B.jpg", 
        ),
        array(
            'name' => "Dark Blue Polo Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "600",
            'picture1' => "produc4A.jpg",
            'picture2' => "produc4B.jpg",  
        ),
        array(
            'name' => "DarkBlueLongSleeves",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "800",
            'picture1' => "produc5A.jpg",
            'picture2' => "produc5B.jpg",
        ),    
        array(
            'name' => "White Long Sleeves",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "800",
            'picture1' => "produc6A.jpg",
            'picture2' => "produc6B.jpg",
        ),
        array(
            'name' => "Dark Blue Blazer",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "750",
            'picture1' => "produc7A.jpg",
            'picture2' => "produc7B.jpg",
        ),
        array(
            'name' => "Floral Polo",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "650",
            'picture1' => "produc8A.jpg",
            'picture2' => "produc8B.jpg",
        )
    );
    if(isset($_POST['btnProcess'])){
        if (isset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']]))
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] += $_POST['txtQuantity'];
        else
           $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] = $_POST['txtQuantity'];

       $_SESSION['totalQuantity'] += $_POST['txtQuantity'];
       header("location: confirm.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<title>Details</title>
</head>
<body>
	<div class="container pt-3">
    	<div class="row">
                <div class="col-lg-10 mt-5">
                <h3 class="h3 d-inline mt-5"><i class="fa-solid fa-store"></i>Learn IT Easy Online Shop</h3>                
                </div>
                <div class="col-md-2 mt-5">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <?php 
                        if(isset($_SESSION['totalQuantity']))
                            echo '<span class="badge badge-light">' . $_SESSION['totalQuantity'] . '</span>';
                        else
                            echo '<span class="badge badge-light">0</span>';
                    ?>    
                    </a>
                </div>
            </div>
        <hr>
    
    <form method="post"> 
        <div class="row">
            <?php if(isset($_GET['k']) && isset($arrProducts[$_GET['k']])): ?> 
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="product-grid card mb-4">
                        <div class="product-image">
                            <a href="details.php?k=<?php echo $key; ?>"></a>
                                <img class="pic-1" src="img/<?php echo $arrProducts[$_GET['k']]['picture1'];?>">
                                <img class="pic-2" src="img/<?php echo $arrProducts[$_GET['k']]['picture2'];?>">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="product-content">
                        <h3 class="title">
                            <?php echo $arrProducts[$_GET['k']]['name']; ?>
                            <span class="badge badge-dark">₱<?php echo $arrProducts[$_GET['k']]['price']; ?></span>
                        </h3>
                        <p><?php echo $arrProducts[$_GET['k']]['description']; ?></p>
                        <hr>
                        <input type="hidden" name="hdnKey" value="<?php echo $_GET['k']; ?>">
                        <h3>Select Size: </h3>
                        <input type="radio" name="radSize" id="radXS" value="XS"> <label for="radXS" class="pr-3">XS</label>
                        <input type="radio" name="radSize" id="radSM" value="SM"> <label for="radSM" class="pr-3">SM</label>
                        <input type="radio" name="radSize" id="radMD" value="MD"> <label for="radMD" class="pr-3">MD</label>
                        <input type="radio" name="radSize" id="radLG" value="LG"> <label for="radLG" class="pr-3">LG</label>
                        <input type="radio" name="radSize" id="radXL" value="XL"> <label for="radXL" class="pr-3">XL</label>
                        <br>
                        <hr>
                        <h3 class="title"></h3>
                        <h3>Enter Quantity: </h3>
                        <input type="number" name="txtQuantity" placeholder="0" class="form-control" min="1" max="100" required>
                        <br>
                        <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-check-circle"></i> Confirm Product Purchase</button>
                        <a href="index.php" class="btn btn-danger btn-lg"><i class="fa fa-left-arrow"></i> Cancel /Go Back</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </form>

   </div> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script></body>

</body>
</html>