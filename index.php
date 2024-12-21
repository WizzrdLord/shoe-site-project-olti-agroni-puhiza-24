<!--Webfaqja të ketë minimum 3 pages si p.sh: 
Faqen kryesore(Home/Dashboard), About us, Products, News, Contact us.
Page qe përmban (detajet e produktit, lajmit, ofertes, etj.)
Përdorimi i JavaScript për validim të kontakt formës dhe Login/Register
Të krijohet Login dhe Register page/form
Webfaqja duhet të jetë responsive - ( në këtë fazë nuk është e obligueshme, por rekomandohet që të bëhet pasi që në dorëzimin final dmth në fund të ushtrimeve/semestrit aktual, kjo do te jetë një kërkesë e projektit)
Përdorimi i slider është sipas dëshirës dhe mundësisë në projekt (do të jetë obligativ për dorëzimin e dytë).
Perdorimi i GIT.-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="css/index-stylesheet.css">
        
</head>
<body>
    
    <?php require "navbar.php"; ?>

    <main><div class="page-container">
        <section class="landing" id="home"><!--New Shoes Go Here-->
            <div class="new-container active">
                <div class="slide">
                    <div class="content">
                        <span>Nokia</span>
                        <h3>Uranium Runner 308</h3>
                        <p>
                            Engineered for speed and style, the Uranium Runner 308 combines lightweight design with durable grip and advanced cushioning. 
                            Perfect for runners who want a sleek edge on every stride.
                        </p>
                        <a href="" class="btn">Order</a>
                    </div>
                    <div class="image">
                        <img src="images\Uranium.png" class="shoe">
                    </div>
                </div>
            </div>
            <div class="new-container">
                <div class="slide">
                    <div class="content">
                        <span>Motorola</span>
                        <h3>Turbo Tread X500</h3>
                        <p>
                            A powerhouse sneaker built for speed and durability, 
                            the Turbo Tread X500 features advanced traction control and shock-absorbing tech for a smooth ride. 
                            Sleek, bold, and built to "dial up" your performance.
                        </p>
                        <a href="" class="btn">Order</a>
                    </div>
                    <div class="image">
                        <img src="images\Turbo.png" class="shoe">
                    </div>
                </div>
            </div>
            <div class="new-container">
                <div class="slide">
                    <div class="content">
                        <span>LG</span>
                        <h3>Velocity Vertex 3D</h3>
                        <p>
                            Step into ultimate comfort and futuristic style with the Velocity Vertex 3D. 
                            Designed for peak motion, its lightweight design and breathable build ensure you move fast while keeping life good.
                        </p>
                        <a href="" class="btn">Order</a>
                    </div>
                    <div class="image">
                        <img src="images\Velocity.png" class="shoe">
                    </div>
                </div>
            </div>
            <div class="new-container">
                <div class="slide">
                    <div class="content">
                        <span>Sony</span>
                        <h3>StrideMaster Pro XT</h3>
                        <p>
                            Master every stride with these high-tech sneakers, 
                            featuring precision cushioning and adaptive grip for any surface. 
                            The StrideMaster Pro XT brings cinematic style and comfort to every step.
                        </p>
                        <a href="" class="btn">Order</a>
                    </div>
                    <div class="image">
                        <img src="images\Stride.png" class="shoe">
                    </div>
                </div>
            </div>

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

        <section class="gallery" id="gallery"><!--All Shoes Go Here-->
            <h1 class="heading">Our <span>Products</span></h1>
            <div class="row-2x2">
                <div class="image-container">
                    <div class="small-image">
                        <img src="images/product1/1.jpg" class="featured-image">
                        <img src="images/product1/2.jpg" class="featured-image">
                        <img src="images/product1/3.jpg" class="featured-image">
                        <img src="images/product1/4.jpg" class="featured-image">
                    </div>
                    <div class="big-image">
                        <img src="images/product1/1.jpg" class="large-image">
                    </div>
                </div>
                <div class="content">
                    <h3>Big Boy Shoes</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat error delectus accusamus, voluptas commodi sit tenetur eveniet magnam quas aliquid non earum ut hic, soluta neque accusantium cupiditate! Explicabo, impedit?
                    </p>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="" class="btn">Order</a>
                </div>
            </div>

            <div class="row-2x2">
                <div class="image-container">
                    <div class="small-image">
                        <img src="images/product2/1.jpg" class="featured-image">
                        <img src="images/product2/2.jpg" class="featured-image">
                        <img src="images/product2/3.jpg" class="featured-image">
                        <img src="images/product2/4.jpg" class="featured-image">
                    </div>
                    <div class="big-image">
                        <img src="images/product2/1.jpg" class="large-image">
                    </div>
                </div>
                <div class="content">
                    <h3>Big Boy Shoes</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat error delectus accusamus, voluptas commodi sit tenetur eveniet magnam quas aliquid non earum ut hic, soluta neque accusantium cupiditate! Explicabo, impedit?
                    </p>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="" class="btn">Order</a>
                </div>
            </div>

            <div class="row-2x2">
                <div class="image-container">
                    <div class="small-image">
                        <img src="images/product3/1.jpg" class="featured-image">
                        <img src="images/product3/2.jpg" class="featured-image">
                        <img src="images/product3/3.jpg" class="featured-image">
                        <img src="images/product3/4.jpg" class="featured-image">
                    </div>
                    <div class="big-image">
                        <img src="images/product3/1.jpg" class="large-image">
                    </div>
                </div>
                <div class="content">
                    <h3>Big Boy Shoes</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat error delectus accusamus, voluptas commodi sit tenetur eveniet magnam quas aliquid non earum ut hic, soluta neque accusantium cupiditate! Explicabo, impedit?
                    </p>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="" class="btn">Order</a>
                </div>
            </div>

            <div class="row-2x2">
                <div class="image-container">
                    <div class="small-image">
                        <img src="images/product4/1.jpg" class="featured-image">
                        <img src="images/product4/2.jpg" class="featured-image">
                        <img src="images/product4/3.jpg" class="featured-image">
                        <img src="images/product4/5.jpg" class="featured-image">
                    </div>
                    <div class="big-image">
                        <img src="images/product4/1.jpg" class="large-image">
                    </div>
                </div>
                <div class="content">
                    <h3>Big Boy Shoes</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat error delectus accusamus, voluptas commodi sit tenetur eveniet magnam quas aliquid non earum ut hic, soluta neque accusantium cupiditate! Explicabo, impedit?
                    </p>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="" class="btn">Order</a>
                </div>
            </div>
        </section>
    </div></main>

    <footer>
        <p>&copy; 2024 Hat Shoes Store. All rights reserved.</p>
    </footer>
    <script src="./js/index.js"></script>
</body>
</html>