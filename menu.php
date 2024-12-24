<?php
include("database.inc.php");
include("constrant.php");
include("function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="sweet.css">
</head>

<body>
    <div class="main">
        <nav>
            <div class="logo">
                <h3 class="logo-name" id="logo1">YumYard</h3>
            </div>

            <div class="navbar">
                <h4><a href="index.php" class="active">home</a></h4>
                <h4><a href="menu.php">menu</a> </h4>
                <h4><a href="about.php">about us</a> </h4>
            </div>
        </nav>
        <div class="about">
            <h1 class="abt-title">Food Menu</h1>
            <div class="move">
                <a href="" class="active">home</a>
                <div>/</div>
                <a href="" class="active">menu</a>
                <div>/</div>
                <a href="">about</a>
            </div>

        </div>

    </div>

    <div class="top-item">
        <h1 class="fd-title">&mdash; food menu &mdash;</h1>
        <h1 class="fd-subtitle">Most popular items</h1>
    </div>

    <div class="cat">
        <div class="items">
            <div class="menu-info">
                <h3 class="it-txt1">popular</h3>
                <h2 class="it-txt2">breakfast</h2>
            </div>

        </div>
        <div class="items">
            <div class="menu-info">
                <h3 class="it-txt1">popular</h3>
                <h2 class="it-txt2">lunch</h2>
            </div>
        </div>
        <div class="items">
            <div class="menu-info">
                <h3 class="it-txt1">popular</h3>
                <h2 class="it-txt2">dinner</h2>
            </div>
        </div>
    </div>

    <!--     
/*--------------------------------------option-------------------------*/ -->

    <?php
    $menu_res = mysqli_query($con, "select * from dish where status=1 order by dish desc");
    ?>


    <div class="option">
        <h1 class="rated"> &#8212 your menu &#8212</h1>
        <div class="food-names">
            <?php while ($product_row = mysqli_fetch_assoc($menu_res)) { ?>
                <div class="sub-name">
                    <img src="<?php echo SITE_DISH_IMAGE . $product_row['image']; ?>" alt="" class="pav">
                    <div class="rating">
                        <h1 class="top-head"><?php echo $product_row['dish']; ?></h1>
                    </div>


                    <?php
                    $dish_attr_res = mysqli_query($con, "select * from dish_dtl where status='1' and dish_id='" . $product_row['id'] . "'order by price asc");
                    ?>


                    <div class="btn">

                        <?php
                        while ($dish_attr_row = mysqli_fetch_assoc($dish_attr_res)) {
                            echo "<input type='radio' name='radio_".$product_row['id']."' value='". $dish_attr_row['id']."'/>";
                            echo "<div class='ct'><h3>" . $dish_attr_row['attribute'] . "</h3><h2>/</h2>";
                            echo "<h2>" . $dish_attr_row['price'] . "&#x20b9;</h2></div>";
                        }


                        ?>
                        <select class="qty" id="qtys<?php echo $product_row['id'];?>">
                            <option value="0">qty</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <button class="cart" onclick="add_cart('<?php echo $product_row['id'];?>','add')">add to cart</button>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div>


    <div class="cart-ic">
        <h5 class="cart-num">1</h5>
        <img src="assets/fontawsm/fontawesome-free-6.7.1-web/svgs/solid/cart-shopping.svg" class="cart-img">
    </div>
    <script src="gsap.min.js"></script>
    <script src="ScrollTrigger.min.js"></script>
    <script src="script.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="sweet2.js"></script>
    <script>
        function add_cart(id,type){
            const SITE_PATH = "<?php echo SITE_PATH; ?>";
          let qty=jQuery('#qtys'+id).val();
          let attr=jQuery('input[name="radio_'+id+'"]:checked').val()
          jQuery.ajax({
            url:SITE_PATH+'manage_cart.php',
            type:'post',
            data:'qty='+qty+'&attr='+attr+'&type='+type,
            success:function(res){
                Swal.fire({
             title: 'thanks!',
            text: 'added in cart',
             icon: 'success',
            confirmButtonText: 'okay'
      });
            }
          })
        }
    </script>
</body>

</html>