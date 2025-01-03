<?php
include ("database.inc.php");
include ("function.php");
include("constrant.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YumYard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <div class="main">
        <nav>
            <div class="logo">
                <h3 class="logo-name" id="logo1">YumYard</h3>
            </div>
            <div class="navbar">
                <h4><a href="" class="active">home</a></h4>
                <h4><a href="about.php">about us </a> </h4>
                <h4><a href="menu.php">menu</a></h4>
                <div class="drp-down">
                <?php
                    if(isset($_SESSION['FOOD_USER_NAME'])){
                        echo "<div class='drp-down'>
                        <h4><a>hello, ".$_SESSION['FOOD_USER_NAME']." 👋</a></h4>
                        <div class='drp-content'>
                        <a href='#'>profile</a>
                        <a href='#'>order history</a>
                        <a href='logout.php'>log out</a>
                        
                    </div>
                      </div>";
                        
                    }else{?>
                    <h4><a>login/register</a></h4>
                    <div class="drp-content">
                    <a href="login_user.php">User</a>
                    <a href="login.php">Admin</a>
                    
                </div>
                <?php } ?>
                </div>
                
            </div>
           

            <!-- <div class="r-dtl">
            <h4> <a href=""></a>+91 9510532823</h4>
            <h4><a href=""> login</a>  </h4>
            <h4><a href="">cart</a> </h4>
        </div> -->
        </nav>



        <!-- ==================landing pagr============================= -->
        <div class="main-2">
            <div class="body">
                <div class="left">
                    <h1 class="top-head">99&#x20b9;</h1>
                    <h1 class="head">explore the all verity of burger </h1>
                    <div class="buy">
                        <a href="menu.php" class="buy-now">Buy now</a>

                    </div>



                </div>


                <div class="right">
                    <img src="img/hero-01-free-img.png" alt="Burger" class="m1-img">
                    <!-- <h3 class="donut">"Indulge in Delight: The <span class="active">Perfect</span>  Donut Experience"</h3> -->
                    <!-- <img src="img/pizza-png.png" alt="" class="img pizz">
                    <img src="img/pasta png.png" alt="" class="img pizz"> -->


                </div>
            </div>



        </div>
    </div>

    <hr>


    <!-- ===========================welcome title------------------------- -->
    <div class="main-4">
        <div class="welcome">welcome to our <br><span class="f-store">food store</span><br></div>

        <div class="ex-btn">
            <a href="#m-3" class="explore">explore now</a>
        </div>
    </div>


    <!-- -----------------------------cata-logs-------------------------------- -->

    <div class="main-3" id="m-3">
        <h3 class="q-menu">quick <span class="active">menu</span></h3>

        <div class="card">

            <div class="cards">
                <img src="img/burger-2.png" alt="" class="c-img ">
                <div class="c-title">
                    <h3>burgers</h3>
                </div>
            </div>

            <div class="cards">
                <img src="img/pizza-2.png" alt="" class="c-img ">
                <div class="c-title">
                    <h3>pizza</h3>
                </div>
            </div>

            <div class="cards">
                <img src="img/pasta.png" alt="" class="c-img ">
                <div class="c-title">
                    <h3>chawmin</h3>
                </div>
            </div>

            <div class="cards">
                <img src="img/soda.png" alt="" class="c-img ">
                <div class="c-title">
                    <h3>cold drinks</h3>
                </div>
            </div>

            <div class="cards">
                <img src="img/vegi.png" alt="" class="c-img ">
                <div class="c-title">
                    <h3>vegiee</h3>
                </div>
            </div>


        </div>
        <div class="c-more">
            <a href="menu.php" class="more">view more</a>
        </div>

    </div>

    <!-- --------------------------------------------------menus------------------------------- -->
    <div class="main-5">
        <div class="main-left">

            <h3 class="m-5_title">Chef Recommend</h3>
            <h3 class="food-name">allo tikki burger <span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">large | medium | small</h3>

            <h3 class="food-name">all veg pizza<span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">120&#x20b9;</span>
            </h3>
            <h3 class="food-cata">large | medium | small</h3>

            <h3 class="food-name">pav bhaji <span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">full | half </h3>

            <h3 class="food-name">chole kulche<span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">full | half</h3>


        </div>
        <div class="main-right">
            <img src="img/main-5 menu-1.png" alt="">
        </div>
    </div>

    <div class="line">
        <div class="vl"></div>
    </div>


    <!-- -----------------------------------------------main-5.2=============== -->
    <div class="main-5">

        <div class="main-right">
            <img src="img/main-5 menu-2.png" alt="">
        </div>

        <div class="main-left">

            <h3 class="m-5_title">Customer Recommend</h3>
            <h3 class="food-name">allo tikki burger <span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">large | medium | small</h3>

            <h3 class="food-name">all veg pizza<span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">120&#x20b9;</span>
            </h3>
            <h3 class="food-cata">large | medium | small</h3>

            <h3 class="food-name">pav bhaji <span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">full | half </h3>

            <h3 class="food-name">chole kulche<span class="dotted">&#x2022; &#x2022; &#x2022; &#x2022; &#x2022;
                    &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;</span>
                <span class="food-price">99&#x20b9;</span>
            </h3>
            <h3 class="food-cata">full | half</h3>


        </div>
    </div>
    <div class="line">
        <div class="vl"></div>
    </div>


    <!-- ----------------------------------------testimonial-------------------------- -->

    <div class="review">
        <h1 class="rev-titles">customer feedback</h1>
        <div class="rev-card">
            <div class="rev-cards">
                <div class="rev-img">
                    <img src="img/woman.png" alt="" class="rev-imgs">
                </div>
                <h3 class="rev-name">munna bhaiya</h3>
                <p class="rev-decs">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum sint deserunt sunt.
                </p>
                <p class="rev-stars">★ ★ ★ ★ ★</p>

            </div>
            <div class="rev-cards">
                <div class="rev-img">
                    <img src="img/woman.png" alt="" class="rev-imgs">
                </div>
                <h3 class="rev-name"> guddu pandit</h3>
                <p class="rev-decs">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum sint deserunt sunt.
                </p>
                <p class="rev-stars">★ ★ ★ ★ ★</p>

            </div>
            <div class="rev-cards">
                <div class="rev-img">
                    <img src="img/woman.png" alt="" class="rev-imgs">
                </div>
                <h3 class="rev-name">kaleen bhaiya</h3>
                <p class="rev-decs">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum sint deserunt sunt.
                </p>
                <p class="rev-stars">★ ★ ★ ★ ★</p>

            </div>
            <div class="rev-cards">
                <div class="rev-img">
                    <img src="img/woman.png" alt="" class="rev-imgs">
                </div>
                <h3 class="rev-name">sharad shukla</h3>
                <p class="rev-decs">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum sint deserunt sunt.
                </p>
                <p class="rev-stars">★ ★ ★ ★ ★</p>

            </div>
        </div>
    </div>


    <script src="gsap.min.js"></script>
    <script src="ScrollTrigger.min.js"></script>
    <script src="script.js"></script>
</body>

</html>