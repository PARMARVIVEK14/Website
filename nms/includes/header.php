<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="header-top">
        <div class="wrap">
            <div class="header-top-left">

                <a href="index.php"> <img src="./images/Logo_1.png" alt="" class="logo"></a>


                <div class="clear"></div>
            </div>
          

            <div class="cssmenu">
                <ul>
                    <?php if (strlen($_SESSION['nmsuid']>0)) {?>
                    <li class="active"><a href="cart.php">Cart</a></li> |
                    <li><a href="wishlist.php">Wishlist</a></li> |
                    <li><a href="checkout.php">Checkout</a></li> |

                    <li><a href="logout.php">Logout</a></li><?php }?>
                    <?php if (strlen($_SESSION['nmsuid']==0)) {?>
                    <li><a href="login.php">Log In</a></li> |
                    <li><a href="register.php">Sign Up</a></li><?php }?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap">
            <div class="header-bottom-left">

                <div class="menu">
                    <ul class="megamenu skyblue">
                        <li class="active grid"><a href="index.php">Home</a></li>
                        <?php if (strlen($_SESSION['nmsuid']>0)) {?>
                        <li><a class="color4" href="#">My Account</a>
                            <div class="megapanel">
                                <div class="row">
                                    <div class="col1">
                                        <div class="h_nav">

                                            <ul class="mm">
                                                <li><a href="profile.php">Profile</a></li>
                                                <li><a href="setting.php">Setting</a></li>
                                                <li><a href="logout.php">Logout</a></li>

                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </li>
                        <li><a class="color6" href="my-orders.php">My Orders</a></li><?php }?>
                        <li><a class="color5" href="#">Category</a>
                            <div class="megapanel">
                                <div class="col1">
                                    <div class="h_nav">

                                        <ul class="mm">
                                            <?php
                                    $ret=mysqli_query($con,"select * from tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                                            <li ><a  
                                                    href="products.php?cid=<?php  echo $row['ID'];?>&&catname=<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></a>
                                            </li><?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a class="color6" href="about.php">About Us</a></li>
                        <li><a class="color7" href="contact.php">Contact Us</a></li>
                        <?php if (strlen($_SESSION['nmsuid']==0)) {?>
                        <li><a class="color7" href="admin/">Admin login</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="header-bottom-right">

                <div class="tag-list">

                    <ul class="icon1 sub-icon1 profile_img">
                        <?php
                            $userid= $_SESSION['nmsuid'];
$ret2=mysqli_query($con,"select sum(tblproducts.shippingCharge+tblproducts.productPrice) as total,COUNT(orders.PId) as totalp from orders join tblproducts on tblproducts.ID=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
$resultss=mysqli_fetch_array($ret2);

?>
                        <li><a class="active-icon c2" href="#"> </a>
                            <ul class="sub-icon1 list">
                                <li>
                                    <h3><?php echo $resultss['totalp'];?> Products</h3><a href="cart.php"></a>
                                </li>
                                <li>
                                    <p>Total Price: &#x20b9; <?php echo $resultss['total'];?></p>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="last">
                        <li><a href="cart.php">Cart(<?php echo $resultss['totalp'];?>)
                                <?php echo $resultss['total'];?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <style type="text/css">
    table,
    th,
    td {
        border: 1px solid;
        padding: 15px;

    }

    .logo {
        width: 10%;
    }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>