

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
                                use App\Models\DataObject\produit\Image;
                                use App\Models\DataObject\produit\Produit;

                                if($login): ?>
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
                       <!--     <div class="counts"> 1 item  <span class="close"> <i class="icofont-close-line"></i> </span> </div> -->
                            <p> <label> Cart Subtotal : </label> <?php echo $prixTotal ?> $</p>
                            <a class="btn-orange" href="?controller=commande&action=cart"> Go to Checkout </a>
                        </div>

                        <div class="dropdown-items">
                            <?php foreach ($produitsPanier as $p) : ?>

                                <?php
                                /** @var Produit $p */
                                $quantite = \App\Models\Lib\Panier::getQuantite($p->getId())
                                ?>
                                <div class="item-box">
                                    <img src="https://webinfo.iutmontp.univ-montp2.fr/~gaunyq/sae-projet-php-eshop/public/upload/<?php echo $p->getListImages()[0]?>" alt="prod" class="img-fluid">
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

                        <li class="main-list-li">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-book-alt"></i>  </span>
                                <span> Books  </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="menue-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="side-menue">
                                            <ul>
                                                <li>
                                                    <a class="tab-link" href="#content-1"> Bookse <i class="icofont-thin-right"></i> </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-2"> Gifts Card
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-3"> Home Gifts
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-2"> Teens Book
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-3"> Kids Book
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-1"> Gifts Card
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-2"> Kids Book
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-1"> Movies & TV
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-3"> Newsstand
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-2"> Music
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-1"> Game
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-2"> Gifts Card
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tab-link" href="#content-3"> Newsstand
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="cotents">
                                            <div class="block-contnet active-content" id="content-1">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="#" href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" href="#" class="book-box">
                                                            <img src="images/book-2.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="view-more">
                                                    <a href="#"> View More </a>
                                                </div>
                                            </div>
                                            <div class="block-contnet" id="content-2">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-2.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="view-more">
                                                    <a href="#"> View More </a>
                                                </div>
                                            </div>
                                            <div class="block-contnet" id="content-3">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-2.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book-3.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" class="book-box">
                                                            <img src="images/book.png" alt="ads" class="img-fluid">
                                                            <h5> Name The Wine </h5>
                                                            <p> 200,00 $ </p>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="view-more">
                                                    <a href="#"> View More </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-panda"></i>  </span>
                                <span> Infant Toys </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Baby Kid Toys </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Activity </a> 	</li>
                                                <li> <a href="#"> Kid Hand Toys </a> </li>
                                                <li> <a href="#"> Kid Hand Toys </a>  </li>
                                                <li> <a href="#"> Kid Hand Toys </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Baby Activity Toys </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Baby Activity Toys </a> 	</li>
                                                <li> <a href="#"> Kid Hand Toys </a> </li>
                                                <li> <a href="#"> Baby Activity Toys </a>  </li>
                                                <li> <a href="#"> Kid Hand Toys </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Kid Hand Toys  </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Kid Hand Toys </a> 	</li>
                                                <li> <a href="#"> Kid Hand Toys </a> </li>
                                                <li> <a href="#"> Kid Hand Toys </a>  </li>
                                                <li> <a href="#"> Health Toys </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Health Toys </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Health Toys </a> 	</li>
                                                <li> <a href="#"> Health Toys </a> </li>
                                                <li> <a href="#"> Health Toys </a>  </li>
                                                <li> <a href="#"> Health Toys </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-headphone-alt-1"></i>  </span>
                                <span> Accessories </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Storage </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#">Canon </a> 	</li>
                                                <li> <a href="#">Sony</a> </li>
                                                <li> <a href="#">Nikon</a>  </li>
                                                <li> <a href="#">Samsung</a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Headphones </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#">Apple </a> 	</li>
                                                <li> <a href="#">Sony</a> </li>
                                                <li> <a href="#">Xiaomi</a>  </li>
                                                <li> <a href="#">Samsung</a> </li>
                                                <li> <a href="#">Oppo</a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Audio </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#">Apple </a> 	</li>
                                                <li> <a href="#">Sony</a> </li>
                                                <li> <a href="#">Xiaomi</a>  </li>
                                                <li> <a href="#">Samsung</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
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
                                <a href="login.html"> <span class="result-data"> <i class="icofont-pencil-alt-2"></i>  </span> </a>
                                <a href="register.html"> <span class="result-data"><i class="icofont-sign-in"></i> </span>  </a>

                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="marketplace.html" >Marketplace</a> </li>
                                        <li> <a href="blog.html" >Blog</a> </li>
                                        <li> <a href="faq.html" >FAQ</a> </li>
                                        <li> <a href="store-locator.html" >Store Locator</a> </li>
                                        <li> <a href="account.html"> <i class="icofont-user"></i> Your Account	</a> </li>
                                        <li> <a href="account-orders.html"> <i class="icofont-bag"></i>  Your Order	</a> </li>
                                        <li> <a href="account-wishlist.html" class="Wishlist"> <i class="icofont-heart"></i> Your Wishlist </a> </li>
                                        <li> <a href="#"> <i class="icofont-eye-alt"></i>  Your Product Reviews  </a> </li>
                                        <li> <a href="account-news.html"> <i class="icofont-envelope"></i>  Newsletter Subscription</a> </li>
                                        <li> <a href="#"> <i class="icofont-checked"></i>  Billing Agreements	</a>  </li>
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
                <span class="cart-count"> <?php echo $nbProduits ?> </span>
                <span> ITEM (S) </span>
            </div>
            <div class="cart-dropdown">
                <div class="top-info">
                    <!--          <div class="counts"> 1 item  <span class="close"> <i class="icofont-close-line"></i> </span> </div> -->
                    <p> <label> Cart Subtotal : </label> <?php echo $prixTotal ?> $</p>
                    <a class="btn-orange" href="cart.html"> Go to Checkout </a>
                </div>

                <div class="dropdown-items">
                    <?php foreach ($produitsPanier as $p) : ?>

                        <?php
                        /** @var Produit $p */
                        $quantite = \App\Models\Lib\Panier::getQuantite($p->getId())
                        ?>
                        <div class="item-box">
                            <img src="https://webinfo.iutmontp.univ-montp2.fr/~gaunyq/sae-projet-php-eshop/public/upload/<?php echo $p->getListImages()[0]?>" alt="prod" class="img-fluid">
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

<div class="mobile-side-menu">
    <div class="overlay"></div>
    <ul class="main-ul">
        <li class="main-li">
            <div class="colapse-btn">   Computers  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#">  All Computers </a>
                <div class="list">
                    <a href="#"> Accessories </a>
                    <ul>
                        <li> <a href="#"> Storage </a> </li>
                        <li> <a href="#"> Computer Accessories </a> </li>
                        <li> <a href="#"> Printers & Accessories </a> </li>
                        <li> <a href="#"> Network Components </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Televisions </a>
                    <ul>
                        <li> <a href="#"> 24 Inches & Below </a> </li>
                        <li> <a href="#"> 33 - 42 Inches </a> </li>
                        <li> <a href="#"> 43 - 54 Inches </a> </li>
                        <li> <a href="#"> TVs by City </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Laptops </a>
                    <ul>
                        <li> <a href="#"> Gaming </a> </li>
                        <li> <a href="#"> Netbooks </a> </li>
                        <li> <a href="#"> Ultrabooks </a> </li>
                        <li> <a href="#"> Macbooks </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Audio </a>
                    <ul>
                        <li> <a href="#"> Headphones & Headsets </a> </li>
                        <li> <a href="#"> Portable Speakers </a> </li>
                        <li> <a href="#"> Home Audio & Theater </a> </li>
                        <li> <a href="#"> Audio Players </a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn"> Smartphone  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Smartphone  </a>
                <div class="list">
                    <a href="#"> Apple </a>
                    <ul>
                        <li> <a href="#"> Iphone 5  </a></li>
                        <li> <a href="#"> Iphone 5s </a> </li>
                        <li> <a href="#"> Iphone 6  </a> </li>
                        <li> <a href="#"> Iphone 6s </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> SamSung </a>
                    <ul>
                        <li> <a href="#"> Galaxy S6 </a></li>
                        <li> <a href="#"> Galaxy S7 </a></li>
                        <li> <a href="#"> Galaxy Note 6 </a></li>
                        <li> <a href="#"> Galaxy Note 7 </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Oppo  </a>
                    <ul>
                        <li> <a href="#"> Oppo f1s </a></li>
                        <li> <a href="#"> Oppo neo 7 </a> </li>
                        <li> <a href="#"> Oppo neo 9  </a></li>
                        <li> <a href="#"> Oppo neo 3 </a></li>
                    </ul>
                </div>
                <ldiv class="list"i>
                    <a href="#"> Xiaomi </a>
                    <ul>
                        <li> <a href="#"> Xiaomi mi5s </a></li>
                        <li> <a href="#"> Xiaomi mi5s plus </a></li>
                        <li> <a href="#"> Xiaomi mi5 </a></li>
                        <li> <a href="#"> Xiaomi mi4 </a></li>
                    </ul>
                </ldiv>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">   Electronics   <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Electronics    </a>
                <div class="list">
                    <a href="#"> Camera  </a>
                    <ul>
                        <li>  <a href="#"> Canon   </a> </li>
                        <li>  <a href="#"> Sony   </a> </li>
                        <li>  <a href="#"> Samsung   </a> </li>
                        <li>  <a href="#"> Nikon   </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> HeadPhone </a>
                    <ul>
                        <li> <a href="#"> Samsung  </a> </li>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Sennheiser </a> </li>
                        <li> <a href="#"> Sony  </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Phone </a>
                    <ul>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Samsung  </a> </li>
                        <li>  <a href="#"> Nokia  </a> </li>
                        <li>  <a href="#"> Xiaomi </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#">  Audio </a>
                    <ul>
                        <li>  <a href="#"> Sennheiser </a> </li>
                        <li>  <a href="#"> Samsung </a> </li>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Sennheiser  </a> </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">  Jewelry    <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Jewelry  </a>
                <div class="list">
                    <a href="#"> Necklaces </a>
                    <ul>
                        <li> <a href="#"> Pendants  </a></li>
                        <li> <a href="#"> Beaded Necklaces  </a></li>
                        <li> <a href="#"> Charm Necklaces  </a></li>
                        <li> <a href="#"> Chokers </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Earrings </a>
                    <ul>
                        <li> <a href="#"> Hoop Earrings </a></li>
                        <li> <a href="#"> Stud Earrings </a></li>
                        <li> <a href="#"> Chandelier Earrings </a></li>
                        <li> <a href="#"> Cluster Earrings </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Rings   </a>
                    <ul>
                        <li> <a href="#"> Wedding Engagement </a></li>
                        <li> <a href="#"> Statement Rings  </a></li>
                        <li> <a href="#"> Solitaire Rings </a></li>
                        <li> <a href="#"> Stackable Rings</a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Bracelets  </a>
                    <ul>
                        <li> <a href="#"> Beaded Bracelets </a></li>
                        <li> <a href="#"> Charm Bracelets </a></li>
                        <li> <a href="#"> Bangles </a></li>
                        <li> <a href="#"> Cuff Bracelets </a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">  Sports  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Sports  </a>
                <div class="list">
                    <a href="#"> Football </a>
                    <ul>
                        <li> <a href="#"> Nike   </a> </li>
                        <li> <a href="#"> Puma   </a> </li>
                        <li> <a href="#"> Adidas   </a> </li>
                        <li> <a href="#"> Neo   </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Tennis </a>
                    <ul>
                        <li> <a href="#"> Balls  </a> </li>
                        <li> <a href="#"> Racquet Bag  </a> </li>
                        <li> <a href="#"> Drink bottle  </a> </li>
                        <li> <a href="#"> Sunscreen </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Baseball  </a>
                    <ul>
                        <li> <a href="#"> Baseball  </a> </li>
                        <li> <a href="#"> Batting cage  </a> </li>
                        <li> <a href="#"> Batting Glove  </a> </li>
                        <li> <a href="#"> Rosin Bag  </a> </li>
                        <li> <a href="#"> Sports Equipment  </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Basketball </a>
                    <ul>
                        <li> <a href="#"> Balls </a>  </li>
                        <li> <a href="#"> Racquet  </a> </li>
                        <li> <a href="#"> Drink Bottle  </a> </li>
                        <li> <a href="#"> Sunscreen  </a> </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">   Fashion  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#">  All Fashion </a>
                <div class="list">
                    <a href="#"> Bags </a>
                    <ul>
                        <li> <a href="#"> Fashion </a> </li>
                        <li> <a href="#"> Fashion Accessories </a> </li>
                        <li> <a href="#"> Fashion & Accessories </a> </li>
                        <li> <a href="#"> Fashion Components </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Clothing  </a>
                    <ul>
                        <li> <a href="#"> 24 Inches & Below </a> </li>
                        <li> <a href="#"> 33 - 42 Inches </a> </li>
                        <li> <a href="#"> 43 - 54 Inches </a> </li>
                        <li> <a href="#"> TVs by City </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Bands </a>
                    <ul>
                        <li> <a href="#"> Gaming </a> </li>
                        <li> <a href="#"> Netbooks </a> </li>
                        <li> <a href="#"> Ultrabooks </a> </li>
                        <li> <a href="#"> Macbooks </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Handbag </a>
                    <ul>
                        <li> <a href="#"> Headphones & Headsets </a> </li>
                        <li> <a href="#"> Portable Speakers </a> </li>
                        <li> <a href="#"> Home Audio & Theater </a> </li>
                        <li> <a href="#"> Audio Players </a> </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">   Computers  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#">  All Computers </a>
                <div class="list">
                    <a href="#"> Accessories </a>
                    <ul>
                        <li> <a href="#"> Storage </a> </li>
                        <li> <a href="#"> Computer Accessories </a> </li>
                        <li> <a href="#"> Printers & Accessories </a> </li>
                        <li> <a href="#"> Network Components </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Televisions </a>
                    <ul>
                        <li> <a href="#"> 24 Inches & Below </a> </li>
                        <li> <a href="#"> 33 - 42 Inches </a> </li>
                        <li> <a href="#"> 43 - 54 Inches </a> </li>
                        <li> <a href="#"> TVs by City </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Laptops </a>
                    <ul>
                        <li> <a href="#"> Gaming </a> </li>
                        <li> <a href="#"> Netbooks </a> </li>
                        <li> <a href="#"> Ultrabooks </a> </li>
                        <li> <a href="#"> Macbooks </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Audio </a>
                    <ul>
                        <li> <a href="#"> Headphones & Headsets </a></li>
                        <li> <a href="#"> Portable Speakers </a></li>
                        <li> <a href="#"> Home Audio & Theater </a></li>
                        <li> <a href="#"> Audio Players </a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn"> Smartphone  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Smartphone  </a>
                <div class="list">
                    <a href="#"> Apple </a>
                    <ul>
                        <li> <a href="#"> Iphone 5  </a></li>
                        <li> <a href="#"> Iphone 5s </a> </li>
                        <li> <a href="#"> Iphone 6  </a> </li>
                        <li> <a href="#"> Iphone 6s </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> SamSung </a>
                    <ul>
                        <li> <a href="#"> Galaxy S6 </a></li>
                        <li> <a href="#"> Galaxy S7 </a></li>
                        <li> <a href="#"> Galaxy Note 6 </a></li>
                        <li> <a href="#"> Galaxy Note 7 </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Oppo  </a>
                    <ul>
                        <li> <a href="#"> Oppo f1s </a></li>
                        <li> <a href="#"> Oppo neo 7 </a> </li>
                        <li> <a href="#"> Oppo neo 9  </a></li>
                        <li> <a href="#"> Oppo neo 3 </a></li>
                    </ul>
                </div>
                <ldiv class="list"i>
                    <a href="#"> Xiaomi </a>
                    <ul>
                        <li> <a href="#"> Xiaomi mi5s </a></li>
                        <li> <a href="#"> Xiaomi mi5s plus </a></li>
                        <li> <a href="#"> Xiaomi mi5 </a></li>
                        <li> <a href="#"> Xiaomi mi4 </a></li>
                    </ul>
                </ldiv>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">   Electronics   <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Electronics    </a>
                <div class="list">
                    <a href="#"> Camera  </a>
                    <ul>
                        <li>  <a href="#"> Canon   </a> </li>
                        <li>  <a href="#"> Sony   </a> </li>
                        <li>  <a href="#"> Samsung   </a> </li>
                        <li>  <a href="#"> Nikon   </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> HeadPhone </a>
                    <ul>
                        <li> <a href="#"> Samsung  </a> </li>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Sennheiser </a> </li>
                        <li> <a href="#"> Sony  </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Phone </a>
                    <ul>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Samsung  </a> </li>
                        <li>  <a href="#"> Nokia  </a> </li>
                        <li>  <a href="#"> Xiaomi </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#">  Audio </a>
                    <ul>
                        <li>  <a href="#"> Sennheiser </a> </li>
                        <li>  <a href="#"> Samsung </a> </li>
                        <li>  <a href="#"> Apple </a> </li>
                        <li>  <a href="#"> Sennheiser  </a> </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">  Jewelry    <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Jewelry  </a>
                <div class="list">
                    <a href="#"> Necklaces </a>
                    <ul>
                        <li> <a href="#"> Pendants  </a></li>
                        <li> <a href="#"> Beaded Necklaces  </a></li>
                        <li> <a href="#"> Charm Necklaces  </a></li>
                        <li> <a href="#"> Chokers </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Earrings </a>
                    <ul>
                        <li> <a href="#"> Hoop Earrings </a></li>
                        <li> <a href="#"> Stud Earrings </a></li>
                        <li> <a href="#"> Chandelier Earrings </a></li>
                        <li> <a href="#"> Cluster Earrings </a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Rings   </a>
                    <ul>
                        <li> <a href="#"> Wedding Engagement </a></li>
                        <li> <a href="#"> Statement Rings  </a></li>
                        <li> <a href="#"> Solitaire Rings </a></li>
                        <li> <a href="#"> Stackable Rings</a></li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Bracelets  </a>
                    <ul>
                        <li> <a href="#"> Beaded Bracelets </a></li>
                        <li> <a href="#"> Charm Bracelets </a></li>
                        <li> <a href="#"> Bangles </a></li>
                        <li> <a href="#"> Cuff Bracelets </a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">  Sports  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#"> All Sports  </a>
                <div class="list">
                    <a href="#"> Football </a>
                    <ul>
                        <li> <a href="#"> Nike   </a> </li>
                        <li> <a href="#"> Puma   </a> </li>
                        <li> <a href="#"> Adidas   </a> </li>
                        <li> <a href="#"> Neo   </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Tennis </a>
                    <ul>
                        <li> <a href="#"> Balls  </a> </li>
                        <li> <a href="#"> Racquet Bag  </a> </li>
                        <li> <a href="#"> Drink bottle  </a> </li>
                        <li> <a href="#"> Sunscreen </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Baseball  </a>
                    <ul>
                        <li> <a href="#"> Baseball  </a> </li>
                        <li> <a href="#"> Batting cage  </a> </li>
                        <li> <a href="#"> Batting Glove  </a> </li>
                        <li> <a href="#"> Rosin Bag  </a> </li>
                        <li> <a href="#"> Sports Equipment  </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Basketball </a>
                    <ul>
                        <li> <a href="#"> Balls </a>  </li>
                        <li> <a href="#"> Racquet  </a> </li>
                        <li> <a href="#"> Drink Bottle  </a> </li>
                        <li> <a href="#"> Sunscreen  </a> </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="main-li">
            <div class="colapse-btn">   Fashion  <span class="icon"> <i class="icofont-thin-down"></i> </span> </div>
            <div class="colapse-body">
                <a href="#">  All Fashion </a>
                <div class="list">
                    <a href="#"> Bags </a>
                    <ul>
                        <li> <a href="#"> Fashion </a> </li>
                        <li> <a href="#"> Fashion Accessories </a> </li>
                        <li> <a href="#"> Fashion & Accessories </a> </li>
                        <li> <a href="#"> Fashion Components </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Clothing  </a>
                    <ul>
                        <li> <a href="#"> 24 Inches & Below </a> </li>
                        <li> <a href="#"> 33 - 42 Inches </a> </li>
                        <li> <a href="#"> 43 - 54 Inches </a> </li>
                        <li> <a href="#"> TVs by City </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Bands </a>
                    <ul>
                        <li> <a href="#"> Gaming </a> </li>
                        <li> <a href="#"> Netbooks </a> </li>
                        <li> <a href="#"> Ultrabooks </a> </li>
                        <li> <a href="#"> Macbooks </a> </li>
                    </ul>
                </div>
                <div class="list">
                    <a href="#"> Handbag </a>
                    <ul>
                        <li> <a href="#"> Headphones & Headsets </a></li>
                        <li> <a href="#"> Portable Speakers </a></li>
                        <li> <a href="#"> Home Audio & Theater </a></li>
                        <li> <a href="#"> Audio Players </a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>

<div class="search-popup">
    <div class="search-block">
        <form action="">
            <input type="text" placeholder="what are you looking for">
            <button class="btn-search" type="submit"> <i class="icofont-search"></i> </button>
        </form>
    </div>
    <div class="close-search"> <i class="icofont-close-line"></i> </div>
</div>

<!-- END BASIC HEADER -->

<div class="products-section">
    <div class="container">

        <div class="content">
            <div class="tab_content active" id="tab_content_1">
                <div class="owl-carousel owl-theme tabcontent-owl">

                    <?php /** @var Produit $produit */
                    /** @var array $produits */
                    /** @var Image $img */
                    foreach ($produits as $produit): ?>

                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <?php foreach($produit->getListImages() as $img): ?>
                                    <img src="upload/<?php echo $img->getFile() ?>" alt="product" class="img-fluid">
                                <?php break; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="data">
                                <a href="?controller=produit&action=show&id=<?php echo rawurlencode($produit->getId()) ?>" class="title">
                                    <?php echo $produit->getNom() ?>
                                </a>
                                <ul>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                    <li> <i class="icofont-star"></i> </li>
                                </ul>
                                <div class="price">
                                  <!--  <soan class="old"> 136.00$ </soan> -->
                                    <span class="new"> <?php echo $produit->getPrix() ?> $ </span>
                                </div>
                                <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                    <i class="icofont-opencart"></i>  Add To Cart
                                </a>
                                <span class="discount"> 26 % </span>
                                <div class="overlay">
                                    <div class="actions">
                                        <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                        <a href="#"> <i class="icofont-refresh"></i> </a>
                                        <a href="#"> <i class="icofont-heart"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>


                </div>
            </div>
            <div class="tab_content" id="tab_content_2">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-1.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <h2> BEST SELLERS </h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-7">
                    <div class="tablist-slider">
                        <div class="owl-carousel owl-theme tablist-owl">
                            <div class="item"> <a class="active-item" href="#tab_content_7"> Jewelry </a></div>
                            <div class="item"> <a href="#tab_content_8"> Sports </a></div>
                            <div class="item"> <a href="#tab_content_7"> Smartphone </a></div>
                            <div class="item"> <a href="#tab_content_8"> Computers </a></div>
                            <div class="item"> <a href="#tab_content_8"> Beauty, Health </a></div>
                            <div class="item"> <a href="#tab_content_7"> Food </a></div>
                            <div class="item"> <a href="#tab_content_8"> Furniture </a></div>
                            <div class="item"> <a href="#tab_content_7"> Books </a></div>
                            <div class="item"> <a href="#tab_content_8"> Infant </a></div>
                            <div class="item"> <a href="#tab_content_7"> Toys </a></div>
                            <div class="item"> <a href="#tab_content_8"> Fashion  </a></div>
                            <div class="item"> <a href="#tab_content_7"> Electronics </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="tab_content active" id="tab_content_7">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-1.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab_content" id="tab_content_8">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="new-blocks">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-1.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-2.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-3.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-4.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-5.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-6.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-7.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="new-block img-hover">
                    <a href="#">
                        <img src="images/ad-8.jpg" alt="ad" class="img-fluid">
                    </a>
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
                    <h2> NEW PRODUCTS  </h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-7">
                    <div class="tablist-slider">
                        <div class="owl-carousel owl-theme tablist-owl">
                            <div class="item"> <a class="active-item" href="#tab_content_4"> Jewelry </a></div>
                            <div class="item"> <a href="#tab_content_3"> Sports </a></div>
                            <div class="item"> <a href="#tab_content_4"> Smartphone </a></div>
                            <div class="item"> <a href="#tab_content_3"> Computers </a></div>
                            <div class="item"> <a href="#tab_content_3"> Beauty, Health </a></div>
                            <div class="item"> <a href="#tab_content_4"> Food </a></div>
                            <div class="item"> <a href="#tab_content_3"> Furniture </a></div>
                            <div class="item"> <a href="#tab_content_4"> Books </a></div>
                            <div class="item"> <a href="#tab_content_3"> Infant </a></div>
                            <div class="item"> <a href="#tab_content_4"> Toys </a></div>
                            <div class="item"> <a href="#tab_content_3"> Fashion  </a></div>
                            <div class="item"> <a href="#tab_content_4"> Electronics </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="tab_content active" id="tab_content_3">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-1.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab_content" id="tab_content_4">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <h2> FEATURE PRODUCTS  </h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-7">
                    <div class="tablist-slider">
                        <div class="owl-carousel owl-theme tablist-owl">
                            <div class="item"> <a class="active-item" href="#tab_content_6"> Jewelry </a></div>
                            <div class="item"> <a href="#tab_content_5"> Sports </a></div>
                            <div class="item"> <a href="#tab_content_5"> Smartphone </a></div>
                            <div class="item"> <a href="#tab_content_6"> Computers </a></div>
                            <div class="item"> <a href="#tab_content_6"> Beauty, Health </a></div>
                            <div class="item"> <a href="#tab_content_5"> Food </a></div>
                            <div class="item"> <a href="#tab_content_6"> Furniture </a></div>
                            <div class="item"> <a href="#tab_content_5"> Books </a></div>
                            <div class="item"> <a href="#tab_content_6"> Infant </a></div>
                            <div class="item"> <a href="#tab_content_5"> Toys </a></div>
                            <div class="item"> <a href="#tab_content_6"> Fashion  </a></div>
                            <div class="item"> <a href="#tab_content_5"> Electronics </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="tab_content active" id="tab_content_5">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-1.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ring-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab_content" id="tab_content_6">
                <div class="owl-carousel owl-theme tabcontent-owl">
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-2.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"><i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-3.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal" data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-card">
                            <div class="img-box">
                                <img src="images/ad-4.jpg" alt="product" class="img-fluid">
                            </div>
                            <h3> Philips Sonicare FlexCare Black </h3>
                            <ul>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                                <li> <i class="icofont-star"></i> </li>
                            </ul>
                            <div class="price">
                                <soan class="old"> 136.00$ </soan>
                                <span class="new"> 100.00$ </span>
                            </div>
                            <a href="#" class="add-to-cart" data-toggle="modal" data-target="#cart-product-modal">
                                <i class="icofont-opencart"></i>  Add To Cart
                            </a>
                            <span class="discount"> 26 % </span>
                            <div class="overlay">
                                <div class="actions">
                                    <a class="show-product-modal"  data-toggle="modal" data-target="#product-modal"> <i class="icofont-search"></i> </a>
                                    <a href="#"> <i class="icofont-refresh"></i> </a>
                                    <a href="#"> <i class="icofont-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-wrapper">
    <div class="container">
        <div class="banner-box img-zoom">
            <a href="#"> <img src="images/banner.jpg" alt="img" class="img-fluid"> </a>
        </div>
    </div>
</div>


<!-- START BASIC FOOTER  -->
<div class="footer-links">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <h3> ABOUT MARKET </h3>
                <ul>
                    <li> <a href="#"> About </a> </li>
                    <li> <a href="#"> UsContactPrivacy </a> </li>
                    <li> <a href="#"> PolicySite </a> </li>
                    <li> <a href="#"> Map </a> </li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <h3> MAKE MONEY WITH US </h3>
                <ul>
                    <li> <a href="#"> Martketplace </a> </li>
                    <li> <a href="#"> Compensation </a> </li>
                    <li> <a href="#"> FirstMy </a> </li>
                    <li> <a href="#"> AccountReturn </a> </li>
                    <li> <a href="#"> PolicyAffiliate </a> </li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <h3> PAYMENT & SHIPPING </h3>
                <ul>
                    <li> <a href="#"> Terms of Use </a> </li>
                    <li> <a href="#"> Payment Methods </a> </li>
                    <li> <a href="#"> Shipping Methods </a> </li>
                    <li> <a href="#"> Locations We Ship To </a> </li>
                    <li> <a href="#"> Estimated Delivery Time </a> </li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <h3> LET US HELP YOU </h3>
                <ul>
                    <li> <a href="#"> Join Free </a> </li>
                    <li> <a href="#"> Blog </a> </li>
                    <li> <a href="#"> Faqs </a> </li>
                    <li> <a href="#"> Store Location </a> </li>
                    <li> <a href="#"> Shop By Brands </a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="logo"> <img src="images/logo_amazon.png" alt="img" class="img-fluid"> </div>
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <h4> Contact </h4>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="info-box">
                            <div class="icon"> <i class="icofont-google-map"></i> </div>
                            <div class="data">
                                <span> PO Box CT16122 Collins Street  </span>
                                <span> West,Victoria 8007, Australia </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="info-box">
                            <div class="icon"> <i class="icofont-ui-call"></i> </div>
                            <div class="data">
                                <span> Phone: +1 (2) 345 6789 </span>
                                <span> Fax: +1 (2) 345 6789 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="info-box">
                            <div class="icon"> <i class="icofont-envelope"></i> </div>
                            <div class="data">
                                <span> contact@yourdomain.com </span>
                                <span> Support@yourdomain.com </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <h4> FOLLOW US </h4>
                <ul class="footer-social">
                    <li class="facebook"> <a href="#"> <i class="icofont-facebook"></i> </a> </li>
                    <li class="twitter"> <a href="#"> <i class="icofont-twitter"></i> </a> </li>
                    <li class="google"> <a href="#"> <i class="icofont-google-plus"></i> </a> </li>
                    <li class="linked"> <a href="#"> <i class="icofont-linkedin"></i> </a> </li>
                    <li class="pintrest"> <a href="#"> <i class="icofont-pinterest"></i> </a> </li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> MOBILES & TABLETS </h5>
                    <p> Nokia, Samsung, Sony, Blackberry, Asus, HTC, Oppo, Lenovo, Alcatel, iPhone 4s, iPhone 5s, iPhone 6, Apple iPhone 6s, iPad, Samsung Tablet, Acer Tablet, Lenovo Tablet... </p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> COMPUTERS & LAPTOPS </h5>
                    <p> Dell, Asus, Macbook, Sony, Lenovo, Acer... </p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> TELEVISIONS </h5>
                    <p> Sony TV, LG TV, Toshiba TV, Samsung TV, Panasonic TV, Sharp TV, LCD TV, Samsung LCD TV, LG LCD TV, Sharp LCD TV, LED TV, Sony LED TV, Samsung LED TV... </p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> REFRIGERATORS </h5>
                    <p>Mini Refrigerators, Sanyo, Electrolux, Panasonic, Toshiba, Samsung...</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> HEALTH & BEAUTY </h5>
                    <p>Bourjois, L'oreal, The Body Shop, Maybeline, Shiseido...</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5>  CAMERAS  </h5>
                    <p>Canon, Nikon, Sony, Fujifilm, Bridge Cameras, DSLR Sets, Video &  Action Camcorders...</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> AIR CONDITIONERS </h5>
                    <p>Daikin, Electrolux, LG, Mitsubishi, Panasonic, Samsung, Sharp, Toshiba, Gree...</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="section-box">
                    <h5> WASHING MACHINES </h5>
                    <p>Electrolux, Sanyo, Toshiba, Sanyo, Hitachi, Panasonic, Samsung, LG...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copy-right">
    <div class="container">
        <h4>
            Designed by <a href="#"> awamer. </a> Copyright <i class="icofont-copyright"></i> 2006 - 2017. All Rights Reserved.
            <img src="images/icon-footer.png" alt="img" class="img-fluid">
        </h4>
    </div>
</div>
<!-- END BASIC FOOTER  -->


<!-- DELETE MODAL  -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close-modal" data-dismiss="modal"> <i class="icofont-close-line"></i> </div>
            </div>
            <div class="modal-body">
                <h4> Are you sure you would like to remove this item from the shopping cart? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal" data-dismiss="modal"> cancel </button>
                <button type="button" class="btn-modal"> ok </button>
            </div>
        </div>
    </div>
</div>

<!-- CART PRODUCT MODAL  -->
<div class="modal fade" id="cart-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2> Confirmable Information </h2>
            </div>
            <div class="modal-body">
                <h3> You have added <a href="#"> Philips Sonicare  </a> to cart </h3>
                <div class="img-box">
                    <img src="images/ring-3.jpg" alt="product" class="img-fluid">
                </div>
                <h5>  There are <span> 10  </span> Items in your cart </h5>
                <p>  Cart Subtotal: <span> $1.00 </span> </p>
                <a href="?controller=commande&action=cart" class="view-cart"> View Cart </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn continue-btn" data-dismiss="modal">
                    <span> Continue Shopping </span> (
                    <span id="count-num"> 10 </span> )
                </button>
                <button type="button" class="btn checkout-btn"> Go to Checkout </button>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCT DETAILS  MODAL  -->
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5">
                            <div class="proSlider">
                                <div id="owl-hash-URL2" class="owl-carousel owl-hash-slider">
                                    <div class="item" data-hash="1">
                                        <img src="images/ring-1.jpg" class="img-fluid" />
                                    </div>
                                    <div class="item" data-hash="2">
                                        <img src="images/ring-2.jpg" class="img-fluid" />
                                    </div>
                                    <div class="item" data-hash="3">
                                        <img src="images/ring-3.jpg" class="img-fluid" />
                                    </div>
                                    <div class="item" data-hash="4">
                                        <img src="images/ring-4.jpg" class="img-fluid" />
                                    </div>
                                </div>

                                <div class="owl-hash-nav">
                                    <div class="item">
                                        <a href="#1" > <img src="images/ring-1.jpg" class="img-fluid" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#2"> <img src="images/ring-2.jpg" class="img-fluid" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#3"> <img src="images/ring-3.jpg" class="img-fluid" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#4"> <img src="images/ring-4.jpg" class="img-fluid" /> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7">
                            <div class="product-details">
                                <h3> Baguette Diamond Rhodium Over Brass </h3>
                                <p> <label> Price : </label> <span> $136.00 </span> </p>
                                <p> <label title="availabilty"> In stock :  </label> <span> 10 </span>  </p>
                                <p> <label> SKU :</label> <span> Baguette Diamond Rhodium Over Brass </span>  </p>
                                <h4> Features </h4>
                                <ul>
                                    <li>  1.6 GHz dual-core Intel Core i5 (Turbo Boost up to 2.7 GHz) with 3 MB shared L3 cachet </li>
                                    <li> 8 GB of 1600 MHz LPDDR3 RAM; 256 GB PCIe-based flash storage </li>
                                    <li> 13.3-Inch (diagonal) LED-backlit Glossy Widescreen Display, 1440 x 900 resolution </li>
                                    <li> Intel HD Graphics 6000 </li>
                                    <li> OS X El Capitan, Up to 12 Hours of Battery Life </li>
                                    <li> 1 Year Warranty </li>
                                </ul>

                                <div class="actions">
                                    <div class="counter shrink">
                                        <button class="btn plus"> <i class="icofont-plus"></i> </button>
                                        <button class="btn minus"> <i class="icofont-minus"></i>  </button>
                                        <span class="num">0</span>
                                        <input class="product_num" name="product_num" value="0" type="hidden">
                                    </div>

                                    <a href="#" class="btn-link add-to-cart"> <i class="icofont-cart"></i> ADD TO Cart </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="ship-box">
                                <img src="images/bg-1.jpg" alt="bg" class="img-fluid">
                                <div class="secription">
                                    <div class="box">
                                        <div class="icon">   <i class="icofont-vehicle-delivery-van"></i> </div>
                                        <div class="data">
                                            <h3>  Free Shipping  </h3>
                                            <h6>  On all orders $199.00  </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="ship-box">
                                <img src="images/bg-2.jpg" alt="bg" class="img-fluid">
                                <div class="secription">
                                    <div class="box">
                                        <div class="icon"> <i class="icofont-money-bag"></i> </div>
                                        <div class="data">
                                            <h3> 90 Day   </h3>
                                            <h6>  Money Come Black  </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="ship-box">
                                <img src="images/bg-3.jpg" alt="bg" class="img-fluid">
                                <div class="secription">
                                    <div class="box">
                                        <div class="icon"> <i class="icofont-safety"></i>  </div>
                                        <div class="data">
                                            <h3>  Safe Shopping  </h3>
                                            <h6> Guarantee 100%  </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/edit.js"></script>


</body>

</html>