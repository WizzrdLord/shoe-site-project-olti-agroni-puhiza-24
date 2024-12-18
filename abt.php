<!--
Webfaqja të ketë minimum 3 pages si p.sh: 
Faqen kryesore(Home/Dashboard), About us, Products, News, Contact us, 
Page qe përmban (detajet e produktit, lajmit, ofertes, etj.)
Përdorimi i JavaScript për validim të kontakt formës dhe Login/Register
Të krijohet Login dhe Register page/form
Webfaqja duhet të jetë responsive - ( në këtë fazë nuk është e obligueshme, por rekomandohet që të bëhet pasi që në dorëzimin final dmth në fund të ushtrimeve/semestrit aktual, kjo do te jetë një kërkesë e projektit)
Përdorimi i slider është sipas dëshirës dhe mundësisë në projekt (do të jetë obligativ për dorëzimin e dytë).
Perdorimi i GIT.
-->



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="css/abt.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    
    <?php require "navbar.php";?>   

    <main style="background-image: url('images/offices.png'); ">
        <div class="center-container">
            <div class="card">
                <h2 class="card-header">Sales</h2>
                <p class="card-text">Interested in ordering in mass, changing your order or canceling an order before shipment? You can contact our hard-working staff that will be able to help you each step of the way!</p>
                <button class="card-button">Contact Sales</button>
            </div>
            <div class="card">
                <h2 class="card-header">Support</h2>
                <p class="card-text">Do you have any questions or problems with your order? Contact our around-the-clock responsive staff that will take all your suggestions and complaints and take them to appropriate departments!</p>
                <button class="card-button">Contact Support</button>
            </div>
            <div class="card">
                <h2 class="card-header">Legal</h2>
                <p class="card-text">For any legal manners that you might be interested into contacting us in, please use this button to contact our legal team, working hours are 10:00-19:00 EST.</p>
                <button class="card-button">Contact Legal</button>
            </div>
        </div>
    </main>
</body>
</html>