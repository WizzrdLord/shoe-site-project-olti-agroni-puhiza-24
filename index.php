<!--1. Webfaqja te kete minimum 5 pages si p.sh: Faqen kryesore (index.php), About us, Products, News, Contact us
2. Te kete login dhe register funksional -> si dhe gjate procesit te logimit te kete role psh admin dhe perdorues i thjeshte.
3. Varesisht faqeve qe keni p.sh News/Portfolio/Products etj te jane teresisht te populluara nga databaza
       3.1 Gjate regjistrimit te te dhenave eshte e mundshme te shihet se cili perdorues ka shtuar/modifikuar nje lajm, produkt varesisht llojit te faqes,
       3.2 Duhet te kete tekst dhe foto ne lajmin/produktin e shtuar ose pdf file,
       3.3 Te dhenat nga faqja me kontakt form te ruhen ne databaze dhe te kete mundesi me u lexu nga administratori me vone nga pjesa e Dashboard.
4. Te kete nje dashboard te thjesht per administratorin, i cili menaxhon faqen me loginin e tij me te drejtat specifike te tij.
5. Ne faqen kryesore, ne about us dhe pothuajse ne secilin faqe te dhenat te lexohen nga databaza dmth mos te kete shume permbajtje statike ne pergjithesi.
6. Te kete validim te te dhenave ne front end dhe backend si dhe kodi ne PHP te jete i shkruar bazuar ne Objekte: Object Oriented PHP
    6.1 Ne qofte se kodi eshte i shkruar ne forme Procedurale, projekti vleresohet me maksimumi 30 pike.
7. Webfaqja duhet te jete responsive dhe te kete slider ne njerin nga faqes p.sh index.php ose diku tjeter ne about us etj
8. Te demostrohet perdorimi i GitHUB/BitBucket me GIT nga grupi qe secili ka punuar ne pjesen e tij. Perdorimi i ketyre platformave eshte obligativ. 
    8.1 Detyrat duhet te jene te ndara ne menyre te barabarte per secilin anetare. Secili nga anetare duhet te kete njohuri ne HTML, CSS, JS dhe PHP ne menyre te barabarte.
9. Projektet te cilat nuk kane back end por vetëm HTML/CSS/Javascript, apo anasjelltas, nuk pranohen per mbrojtje.
10. Mbrojtja do te behet ne menyre individuale. Vleresimi pozitiv nga mbrojtja behet vetem nese studenti arrin te mbroje punen e tij ne kontekstin full-stack (HTML, CSS, JS dhe PHP). 
-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hat Shoes Store</title>
    <link rel="icon" href="images\logo_new.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="css/index-stylesheet.css?v=1.0">
</head>
<body>
    
    <?php require "navbar.php"; ?>
    <?php include "config.php"; ?>
    <main><div class="page-container">
        <section class="landing" id="home">
            <?php if (!$db_connected): ?>
                <div style="color: red; font-size: 1.5rem; font-weight:bolder; text-align:center; padding: 24% 0 24% 0">
                    Database not online some features may not work!
                </div>
            <?php else: ?>
                <?php
                $sql = "SELECT * FROM shoes ORDER BY date_added DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $shoes = [];
                    while ($row = $result->fetch_assoc()) {
                        $shoes[] = $row;
                    }
                } else {
                    echo "No shoes found.";
                }
                $conn->close();
                ?>

                <!-- New Shoes Go Here -->
                <?php 
                $counter = 0;
                foreach ($shoes as $shoe):
                if ($counter >= 4) break;
                $activeClass = ($counter == 0) ? 'active' : ''; 
                ?>
                    <div class="new-container <?php echo $activeClass; ?>">
                        <div class="slide">
                            <div class="content">
                                <span><?php echo htmlspecialchars($shoe['brand']); ?></span>
                                <h3><?php echo htmlspecialchars($shoe['name']); ?></h3>
                                <p>
                                    <?php echo htmlspecialchars($shoe['description']); ?>
                                </p>
                                <a href="#" class="btn">Order</a>
                            </div>
                            <div class="image">
                                <img src="images/<?php echo htmlspecialchars($shoe['image_path']); ?>" class="shoe">
                            </div>
                        </div>
                    </div>
                <?php 
                $counter++;
                endforeach; 
                ?>
            <?php endif; ?>
            
            <div id="prev" class="unselectable arrow-left" onclick="prev()">&#11164;</div>
            <div id="next" class="unselectable arrow-right" onclick="next()">&#11166;</div>
        </section>

        <section class="product" id="product"><!--Popular Products Go Here 6X2-Grid-->
            <h1 class="heading">Popular <span>Products</span></h1>
            <div class="box-container">
                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <img src="images/PngItem_109181.png" alt="">
                        <h3>Abibas Shoe</h3>
                        <div class="price">$200 <span>$150</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery" id="gallery"><!-- All Shoes Go Here -->
        <h1 class="heading">Our <span>Products</span></h1>
            <?php foreach ($shoes as $shoe): ?>
                <div class="row-2x2">
                    <div class="image-container">
                        <div class="small-image">
                            <?php if (!empty($shoe['image_path'])): ?>
                                <img src="images/<?php echo htmlspecialchars($shoe['image_path']); ?>" class="featured-image">
                            <?php endif; ?>
                            <?php if (!empty($shoe['image2'])): ?>
                                <img src="images/<?php echo htmlspecialchars($shoe['image2']); ?>" class="featured-image">
                            <?php endif; ?>
                            <?php if (!empty($shoe['image3'])): ?>
                                <img src="images/<?php echo htmlspecialchars($shoe['image3']); ?>" class="featured-image">
                            <?php endif; ?>
                            <?php if (!empty($shoe['image4'])): ?>
                                <img src="images/<?php echo htmlspecialchars($shoe['image4']); ?>" class="featured-image">
                            <?php endif; ?>
                        </div>
                        <div class="big-image">
                            <img src="images/<?php echo htmlspecialchars($shoe['image_path']); ?>" class="large-image">
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo htmlspecialchars($shoe['name']); ?></h3>
                        <p>
                            <?php echo htmlspecialchars($shoe['description']); ?>
                        </p>
                        <div class="price">
                            <?php
                            if (!empty($shoe['discount']) && $shoe['discount'] > 0): 
                                $discounted_price = $shoe['price'] - ($shoe['price'] * ($shoe['discount'] / 100));
                            ?>
                                $<?php echo number_format($discounted_price, 2); ?> 
                                <span>$<?php echo number_format($shoe['price'], 2); ?></span>
                            <?php else: ?>
                                $<?php echo number_format($shoe['price'], 2); ?>
                            <?php endif; ?>
                        </div>
                        <a href="#" class="btn">Order</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div></main>

    <footer>
        <p>&copy; 2024 Hat Shoes Store. All rights reserved.</p>
    </footer>
    <script src="js/theme-toggle.js"></script>
    <script src="js\index.js"></script>
</body>
</html>