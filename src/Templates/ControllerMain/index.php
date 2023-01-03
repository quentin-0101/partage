
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/icofont.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/ar-style.css"> -->

    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <title> Amazon </title>
</head>

<body>

<div class="loader">
    <img src="images/spin.gif" class="img-fluid">
</div>

<!--  START BASIC HEADER -->

<header class="site-header">

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="left-text">
                        <ul class="links-service">
                            <li><a href="#"> Get the app </a></li>
                            <li><a href="#"> Sell on Multistore </a></li>
                            <li><a href="#"> Customer Care </a></li>
                            <li><a href="#"> Track my order </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="right-text">
                        <ul class="user-links">
                            <li class="main-li">
                                    <span class="result-data">
                                            <img src="images/France.jpg" alt="France"/>
                                            France
                                            <i class="icofont-thin-down"></i>
                                    </span>
                                <ul class="drop-list">
                                    <li> <a href="#"> <img src="images/France.jpg" alt="France"/>  France </a> </li>
                                    <li> <a href="#"> <img src="images/English.jpg" alt="France"/>  English </a> </li>
                                    <li> <a href="#"> <img src="images/Spain.jpg" alt="France"/>  Spain </a> </li>
                                </ul>
                            </li>
                            <li class="main-li">
                                    <span class="result-data">
                                        EUR
                                        <i class="icofont-thin-down"></i>
                                    </span>
                                <ul class="drop-list">
                                    <li> <a href="#">   EUR </a> </li>
                                    <li> <a href="#">   USD </a> </li>
                                </ul>
                            </li>
                            <li class="main-li form-hover">
                                <?php use App\Models\DataObject\categorie\CategoriePrincipale;
                                use App\Models\DataObject\categorie\CategorieProduit;
                                use App\Models\DataObject\produit\Produit;
                                use App\Models\Lib\Panier;

                                if(isset($login) && $login): ?>
                                    <a href="http://127.0.0.1:8001/?controller=utilisateur&action=account">
                                        <span class="result-data"> <i class="icofont-pencil-alt-2"></i> <?php echo $user->getEmail() ?>  </span>
                                    </a>
                                <?php else: ?>
                                    <a href="http://127.0.0.1:8001/?controller=utilisateur&action=connect">
                                        <span class="result-data"> <i class="icofont-pencil-alt-2"></i> Sign In  </span>
                                    </a>
                                    <a href="http://127.0.0.1:8001/?controller=utilisateur&action=connect">
                                        <span class="result-data"><i class="icofont-sign-in"></i> Join free </span>
                                    </a>
                                <?php endif; ?>

                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="?" >Marketplace</a> </li>
                                        <!--
                                        <li> <a href="blog.html" >Blog</a> </li>
                                        <li> <a href="faq.html" >FAQ</a> </li>
                                        <li> <a href="store-locator.html" >Store Locator</a> </li> -->
                                        <li> <a href="?controller=utilisateur&action=account"> <i class="icofont-user"></i> Your Account	</a> </li>
                                        <li> <a href="?controller=commande&action=account_orders"> <i class="icofont-bag"></i>  Your Order	</a> </li>
                                        <?php if(isset($login) && $login) : ?>
                                            <li> <a href="?controller=utilisateur&action=disconnect"> <i class="icofont-bag"></i>  Disconnect	</a> </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="images/logo_amazon.png" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <form action="">
                        <div class="search-box">
                            <div class="filter-box">
                                <span id="result"> Shop by category </span>
                            </div>
                            <input type="text" placeholder="what are you looking for">
                            <button class="btn-search" type="submit"> <i class="icofont-search"></i> </button>
                        </div>

                        <div class="search-categ">
                            <div class="head">
                                <div class="expand"> Expand All </div>
                                <div class="colapse"> Collapse All </div>
                            </div>
                            <ul>
                                <li>
                                    <p> <span class="plus"></span>  <input id="1" value="Jewelry" type="checkbox" onclick="myCatSelect(this)">Jewelry </p>
                                    <ul>
                                        <li>
                                            <p> <span class="plus"></span>  <input id="2" value="Necklaces" type="checkbox" onclick="myCatSelect(this)"> Necklaces</p>
                                            <ul>
                                                <li> <p>  <input type="checkbox" id="3" value="Necklaces" onclick="myCatSelect(this)"> Beaded Necklaces</p></li>
                                                <li> <p>  <input type="checkbox" id="4" value="Pendants" onclick="myCatSelect(this)"> Pendants</p> </li>
                                                <li> <p>  <input type="checkbox" id="5" value="Necklaces" onclick="myCatSelect(this)"> Necklaces</p></li>
                                                <li> <p>  <input type="checkbox" id="6" value="Charm Necklaces" onclick="myCatSelect(this)"> Charm Necklaces</p></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p> <span class="plus"></span><input type="checkbox" id="6" value="Earrings" onclick="myCatSelect(this)"> Earrings </p>
                                            <ul>
                                                <li> <p>  <input type="checkbox" id="7" value="Hoop Earrings" onclick="myCatSelect(this)"> Hoop Earrings </p></li>
                                                <li> <p>  <input type="checkbox" id="8" value="Stud Earrings" onclick="myCatSelect(this)"> Stud Earrings </p></li>
                                                <li> <p>  <input type="checkbox" id="9" value="Chandelier Earrings" onclick="myCatSelect(this)"> Chandelier Earrings </p></li>
                                                <li> <p>  <input type="checkbox" id="10" value="Cluster Earrings" onclick="myCatSelect(this)"> Cluster Earrings </p></li>
                                            </ul>
                                        </li>
                                        <li> <p>  <input type="checkbox" id="11" value="Brooches" onclick="myCatSelect(this)"> Brooches </p></li>
                                        <li> <p>  <input type="checkbox" id="12" value="Bracelets" onclick="myCatSelect(this)"> Bracelets </p></li>
                                        <li> <p>  <input type="checkbox" id="13" value="Rings" onclick="myCatSelect(this)"> Rings </p></li>
                                    </ul>
                                </li>
                                <li>
                                    <p> <span class="plus"></span> <input type="checkbox" id="11" value="Brooches" onclick="myCatSelect(this)"> Sports </p>
                                    <ul>
                                        <li>
                                            <p>  <input type="checkbox" id="12" value="Football" onclick="myCatSelect(this)"> Football  </p>
                                            <ul>
                                                <li> <p>  <input type="checkbox" id="13" value="Nike" onclick="myCatSelect(this)"> Nike </p></li>
                                                <li> <p>  <input type="checkbox" id="14" value="Puma" onclick="myCatSelect(this)"> Puma </p></li>
                                                <li> <p>  <input type="checkbox" id="15" value="Adidas" onclick="myCatSelect(this)"> Adidas</p></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p>  <input type="checkbox"> Football  </p>
                                            <ul>
                                                <li> <p>  <input type="checkbox" id="16" value="Nike" onclick="myCatSelect(this)"> Nike </p></li>
                                                <li> <p>  <input type="checkbox" id="17" value="Puma" onclick="myCatSelect(this)"> Puma </p></li>
                                                <li> <p>  <input type="checkbox" id="18" value="Adidas" onclick="myCatSelect(this)"> Adidas</p></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p>  <input type="checkbox" id="19" value="Adidas" onclick="myCatSelect(this)"> Football  </p>
                                            <ul>
                                                <li> <p>  <input type="checkbox" id="20" value="Nike" onclick="myCatSelect(this)"> Nike </p></li>
                                                <li> <p>  <input type="checkbox" id="21" value="Puma" onclick="myCatSelect(this)"> Puma </p></li>
                                                <li> <p>  <input type="checkbox" id="22" value="Adidas" onclick="myCatSelect(this)"> Adidas</p></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <p> <span class="plus"></span> <input type="checkbox" id="23" value="Computers" onclick="myCatSelect(this)"> Computers</p>
                                    <ul>
                                        <li> <p>  <input type="checkbox" id="24" value="Accessories" onclick="myCatSelect(this)"> Accessories </p></li>
                                        <li> <p>  <input type="checkbox" id="25" value="Storage" onclick="myCatSelect(this)"> Storage </p></li>
                                        <li> <p>  <input type="checkbox" id="26" value="Printers" onclick="myCatSelect(this)"> Printers </p></li>
                                        <li> <p>  <input type="checkbox" id="27" value="Components" onclick="myCatSelect(this)"> Network Components </p></li>
                                    </ul>
                                </li>
                                <li>
                                    <p> <span class="plus"></span> <input type="checkbox" id="28" value=" Headphones & Headsets" onclick="myCatSelect(this)"> Headphones & Headsets </p>
                                    <ul>
                                        <li> <p>  <input type="checkbox" id="29" value="Accessories" onclick="myCatSelect(this)"> Accessories </p></li>
                                        <li> <p>  <input type="checkbox" id="30" value="Storage" onclick="myCatSelect(this)"> Storage </p></li>
                                        <li> <p>  <input type="checkbox" id="31" value="Printers" onclick="myCatSelect(this)"> Printers </p></li>
                                        <li> <p>  <input type="checkbox" id="32" value="Components" onclick="myCatSelect(this)"> Network Components </p></li>
                                    </ul>
                                </li>
                                <li> <p>  <input type="checkbox" id="33" value="Food" onclick="myCatSelect(this)"> Food  </p></li>
                                <li> <p>  <input type="checkbox" id="34" value="Books" onclick="myCatSelect(this)"> Books  </p></li>
                                <li> <p>  <input type="checkbox" id="35" value="Fashion" onclick="myCatSelect(this)"> Fashion </p></li>
                                <li> <p>  <input type="checkbox" id="36" value="Infant Toys " onclick="myCatSelect(this)"> Infant Toys  </p></li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="col-3">
                    <div class="cart-header">
                        <img src="images/cart-ico.png" alt="cart" class="img-fluid">
                        <span class="cart-count"> <?php echo $nbProduits ?> </span>
                        <span> ITEM (S) </span>
                    </div>
                    <div class="cart-dropdown">
                        <div class="top-info">
                   <!--         <div class="counts"> 1 item  <span class="close"> <i class="icofont-close-line"></i> </span> </div> -->
                            <p> <label> Cart Subtotal : </label> <?php echo $prixTotal ?> $</p>
                            <a class="btn-orange" href="?controller=commande&action=checkout"> Go to Checkout </a>
                        </div>

                        <div class="dropdown-items">
                            <?php foreach ($produitsPanier as $p) : ?>

                                <?php
                                /** @var Produit $p */
                                $quantite = Panier::getQuantite($p->getId())
                                ?>
                                <div class="item-box">
                                    <img src="upload/<?php echo $p->getListImages()[0]?>" alt="prod" class="img-fluid">
                                    <div class="data">
                                        <a class="descr" href="?controller=produit&action=show&id=<?php echo $p->getId() ?>"> <?php echo $p->getNom() ?> </a>
                                        <h3> <?php echo $p->getPrix() ?> $ </h3>
                                        <div class="item-footer">
                                            <p>  Qty :   <input type="text" value="<?php echo $quantite ?>"> </p>
                                            <div class="actions">
                                                <a href="?controller=produit&action=supprimerProduit&idProduit=<?php echo rawurlencode($p->getId()) ?>"> <i class="icofont-ui-delete"></i> </a>
                                                <a href="#"> <i class="icofont-gear"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <div class="bottom-info">
                            <a class="btn-orange" href="?controller=commande&action=cart"> View and edit cart </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bootom-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="btn-menu">
                        <button class="btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        All Category
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="hot-links">
                        <li><span>hot</span> <a href="#">Daniel Wellington watch - Hot trend 2016</a></li>
                        <li><span>hot</span> <a href="#">Haki Women Fashion 50% OFF</a></li>
                        <li><span>hot</span> <a href="#">Hot deal from Printer</a></li>
                        <li><span>hot</span> <a href="#">Samsung Smart phone 20% OFF</a></li>
                    </ul>
                </div>
            </div>

            <div class="site-menu">
                <div  class="main-list">
                    <ul class="main-ul fixed-height">

                        <?php /** @var CategoriePrincipale $catPrincipale */
                             /** @var CategorieProduit $catProduit */
                             /** @var \App\Models\DataObject\produit\Marque $marque */
                        foreach($tabCategoriePrincipale as $catPrincipale): ?>
                            <li class="main-list-li list-cat">
                                <a class="main-a" href="?controller=main&action=search&categoriePrincipale=<?php echo $catPrincipale->getId() ?>">
                                    <span class="cat-icon"> <i class="icofont-camera"></i>  </span>
                                    <span> <?php echo $catPrincipale->getNom() ?> </span>
                                    <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                                </a>
                                <div class="cat-popup-list">
                                    <div class="menue-block">
                                        <ul>
                                            <?php foreach ($catPrincipale->getListCategorieProduit() as $catProduit): ?>
                                                <li>
                                                    <a href="?controller=main&action=search&categoriePrincipale=<?php echo $catPrincipale->getId() ?>&categorieProduit=<?php echo $catProduit->getId() ?>" class="item-branch"> <?php echo $catProduit->getNom() ?> </a>
                                                    <ul class="itemsubmenu">

                                                        <?php foreach ($catProduit->getListeMarque() as $marque): ?>
                                                            <li>
                                                                <a href="?controller=main&action=search&categoriePrincipale=<?php echo $catPrincipale->getId() ?>&categorieProduit=<?php echo $catProduit->getId() ?>&marque=<?php echo $marque->getId() ?>"><?php echo $marque->getNom() ?> </a>
                                                            </li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="show-more-cat">
                        <i class="icofont-plus"></i>
                        <i class="icofont-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="mobile-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="left-text">
                        <ul class="user-links">
                            <li class="main-li">
                                    <span class="result-data">
                                        <img src="images/France.jpg" alt="France"/>
                                    </span>
                                <ul class="drop-list">
                                    <li> <a href="#"> <img src="images/France.jpg" alt="France"/>  France </a> </li>
                                    <li> <a href="#"> <img src="images/English.jpg" alt="France"/>  English </a> </li>
                                    <li> <a href="#"> <img src="images/Spain.jpg" alt="France"/>  Spain </a> </li>
                                </ul>
                            </li>
                            <li class="main-li">
                                <span class="result-data">   EUR </span>
                                <ul class="drop-list">
                                    <li> <a href="#">   EUR </a> </li>
                                    <li> <a href="#">   USD </a> </li>
                                </ul>
                            </li>
                            <li class="main-li form-hover">
                                <a href="?controller=utilisateur&action=connect"> <span class="result-data"> <i class="icofont-pencil-alt-2"></i>  </span> </a>
                                <a href="?controller=utilisateur&action=register"> <span class="result-data"><i class="icofont-sign-in"></i> </span>  </a>

                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="?" >Marketplace</a> </li>
                                        <!--
                                        <li> <a href="blog.html" >Blog</a> </li>
                                        <li> <a href="faq.html" >FAQ</a> </li>
                                        <li> <a href="store-locator.html" >Store Locator</a> </li> -->
                                        <li> <a href="?controller=utilisateur&action=account"> <i class="icofont-user"></i> Your Account	</a> </li>
                                        <li> <a href="?controller=commande&action=account_orders"> <i class="icofont-bag"></i>  Your Order	</a> </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-6">
                    <div class="right-text">
                        <div class="open-search"> <i class="icofont-search"></i>  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header">
        <div class="container">
            <button class="side-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="logo-box">
                <a href="index.html">
                    <img src="images/logo_amazon.png" alt="logo" class="img-fluid">
                </a>
            </div>
            <div class="cart-header">
                <img src="images/cart-ico.png" alt="cart" class="img-fluid">
                <span class="cart-count"> 2 </span>
                <span> ITEM (S) </span>
            </div>
            <div class="cart-dropdown">
                <div class="top-info">
                    <div class="counts"> 1 item  <span class="close"> <i class="icofont-close-line"></i> </span> </div>
                    <p> <label> Cart Subtotal : </label> 200,00 $</p>
                    <a class="btn-orange" href="cart.html"> Go to Checkout </a>
                </div>

                <div class="dropdown-items">

                    <?php foreach ($produitsPanier as $p) : ?>

                        <?php
                        /** @var Produit $p */
                        $quantite = Panier::getQuantite($p->getId())
                        ?>
                        <div class="item-box">
                            <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                            <div class="data">
                                <a class="descr" href="#"> <?php echo $p->getNom() ?> </a>
                                <h3> <?php echo $p->getPrix() ?> $ </h3>
                                <div class="item-footer">
                                    <p>  Qty :   <input type="text" value="<?php echo $quantite ?>"> </p>
                                    <div class="actions">
                                        <a href="?controller=produit&action=supprimerProduit&idProduit=<?php echo rawurlencode($p->getId()) ?>"> <i class="icofont-ui-delete"></i> </a>
                                        <a href="#"> <i class="icofont-gear"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="bottom-info">
                    <a class="btn-orange" href="?controller=commande&action=cart"> View and edit cart </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END BASIC HEADER -->

<div class="main-slider">
    <div class="owl-carousel owl-theme main-owl">
        <div class="item">
            <img src="images/slider-1.jpg" alt="slider" class="img-fluid">
            <div class="item-text">
                <p> Limted Time Offer </p>
                <h2> Big Sale <span> 70% </span> Off  </h2>
                <h5> For All Collections 2018 - 2019 </h5>
                <a href="#" class="btn"> Shop Now </a>
            </div>
        </div>
        <div class="item">
            <img src="images/slider-2.jpg" alt="slider" class="img-fluid">
            <div class="item-text">
                <p  class="fadeInDown"> Limted Time Offer </p>
                <h2 class="fadeIn"> Big Sale <span> 70% </span> Off  </h2>
                <h5 class="fadeIn"> For All Collections 2018 - 2019 </h5>
                <a  class="fadeInUp" href="#" class="btn"> Shop Now </a>
            </div>
        </div>
        <div class="item">
            <img src="images/slider-3.jpg" alt="slider" class="img-fluid">
            <div class="item-text">
                <p  class="fadeInDown"> Limted Time Offer </p>
                <h2 class="fadeIn"> Big Sale <span> 70% </span> Off  </h2>
                <h5 class="fadeIn"> For All Collections 2018 - 2019 </h5>
                <a  class="fadeInUp" href="#" class="btn"> Shop Now </a>
            </div>
        </div>
    </div>
</div>

<div class="products-section">
    <div class="container">
        <div class="head">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <h2> TOUS les produits </h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="count-box">
                        <span class="days" id="days"></span>
                        <span class="hours" id="hours"></span>
                        <span class="minuts" id="minuts"></span>
                        <span class="seconds" id="seconds"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-5">
                    <div class="tablist-slider">
                        <div class="owl-carousel owl-theme tablist-owl">
                            <?php foreach ($tabCategoriePrincipale as $catPrincipale): ?>
                                <div class="item"> <a class="" href="#tab_content_1"> <?php echo $catPrincipale->getNom() ?> </a></div>
                            <?php endforeach; ?>
                            <!--
                            <div class="item"> <a class="active-item" href="#tab_content_1"> Jewelry </a></div>
                            <div class="item"> <a href="#tab_content_2"> Sports </a></div>
                            <div class="item"> <a href="#tab_content_1"> Smartphone </a></div>
                            <div class="item"> <a href="#tab_content_2"> Computers </a></div>
                            <div class="item"> <a href="#tab_content_2"> Beauty, Health </a></div>
                            <div class="item"> <a href="#tab_content_1"> Food </a></div>
                            <div class="item"> <a href="#tab_content_2"> Furniture </a></div>
                            <div class="item"> <a href="#tab_content_1"> Books </a></div>
                            <div class="item"> <a href="#tab_content_2"> Infant </a></div>
                            <div class="item"> <a href="#tab_content_1"> Toys </a></div>
                            <div class="item"> <a href="#tab_content_2"> Fashion  </a></div>
                            <div class="item"> <a href="#tab_content_1"> Electronics </a></div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="tab_content active" id="tab_content_1">
                <div class="owl-carousel owl-theme tabcontent-owl">


                        <?php /** @var Produit $produit */
                        foreach ($listProduit as $produit): ?>

                            <div class="item">
                                <div class="product-card">
                                    <div class="img-box">
                                        <img src="https://webinfo.iutmontp.univ-montp2.fr/~gaunyq/sae-projet-php-eshop/public/upload/<?php echo $produit->getListImages()[0]?>" alt="product" class="img-fluid">
                                    </div>
                                    <a href="?controller=produit&action=show&id=<?php echo rawurlencode($produit->getId()) ?>" class="title"> <?php echo $produit->getNom() ?> </a>


                                    <ul>
                                        <li> <i class="icofont-star"></i> </li>
                                        <li> <i class="icofont-star"></i> </li>
                                        <li> <i class="icofont-star"></i> </li>
                                        <li> <i class="icofont-star"></i> </li>
                                        <li> <i class="icofont-star"></i> </li>
                                    </ul>
                                    <div class="price">
                                        <span class="new"> <?php echo $produit->getPrix() ?> $ </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products-section">
    <div class="container">
        <div class="head">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-5">
                    <h2> Les plus récents </h2>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="tab_content active" id="tab_content_7">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <?php foreach ($listProduitOrdre as $produit) : ?>
                        <div class="item">
                            <div class="product-card">
                                <div class="img-box">
                                    <img src="https://webinfo.iutmontp.univ-montp2.fr/~gaunyq/sae-projet-php-eshop/public/upload/<?php echo $produit->getListImages()[0]?>" alt="product" class="img-fluid">
                                </div>
                                <a href="?controller=produit&action=show&id=<?php echo rawurlencode($produit->getId()) ?>" class="title"> <?php echo $produit->getNom() ?> </a>


                                <ul>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                </ul>
                                <div class="price">
                                    <span class="new"> <?php echo $produit->getPrix() ?> $ </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/edit.js"></script>


</body>

</html>