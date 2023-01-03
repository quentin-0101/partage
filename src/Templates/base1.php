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
    <title> ACCOUNT  </title>
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
                                <?php if(isset($login) && $login): ?>
                                    <a href="?controller=utilisateur&action=account">
                                        <span class="result-data"> <i class="icofont-pencil-alt-2"></i> <?php echo $user->getEmail() ?>  </span>
                                    </a>

                            <?php else: ?>
                                    <a href="?controller=utilisateur&action=connect">
                                        <span class="result-data"> <i class="icofont-pencil-alt-2"></i> Sign In  </span>
                                    </a>
                                    <a href="?controller=utilisateur&action=connect">
                                        <span class="result-data"><i class="icofont-sign-in"></i> Join free </span>
                                    </a>

                            <?php endif; ?>



                                <div class="hover-content">
                                    <ul>
                                        <li> <a href="?" >Marketplace</a> </li>
                                        <li> <a href="?controller=utilisateur&action=account"> <i class="icofont-user"></i> Your Account	</a> </li>
                                        <li> <a href="?controller=commande&action=account_orders"> <i class="icofont-bag"></i>  Your Order	</a> </li>
                                        <li> <a href="?controller=utilisateur&action=disconnect"> <i class="icofont-bag"></i>  Disconnect	</a> </li>

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
                        <a href="?">
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
                                    <p> <span class="plus"></span> <input type="checkbox" id="23" value="Computers" onclick="myCatSelect(this)"> Computers </p>
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
                        <span class="cart-count"> 2 </span>
                        <span> ITEM (S) </span>
                    </div>
                    <div class="cart-dropdown">
                        <div class="top-info">
                            <div class="counts"> 1 item  <span class="close"> <i class="icofont-close-line"></i> </span> </div>
                            <p> <label> Cart Subtotal : </label> 200,00 $</p>
                            <a class="btn-orange" href="#"> Go to Checkout </a>
                        </div>

                        <div class="dropdown-items">
                            <div class="item-box">
                                <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                                <div class="data">
                                    <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                                    <h3> 20,00 $ </h3>
                                    <div class="item-footer">
                                        <p>  Qty :   <input type="text" value="1"> </p>
                                        <div class="actions">
                                            <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                            <a href="#"> <i class="icofont-gear"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-box">
                                <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                                <div class="data">
                                    <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                                    <h3> 20,00 $ </h3>
                                    <div class="item-footer">
                                        <p>  Qty :   <input type="text" value="1"> </p>
                                        <div class="actions">
                                            <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                            <a href="#"> <i class="icofont-gear"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-box">
                                <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                                <div class="data">
                                    <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                                    <h3> 20,00 $ </h3>
                                    <div class="item-footer">
                                        <p>  Qty :   <input type="text" value="1"> </p>
                                        <div class="actions">
                                            <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                            <a href="#"> <i class="icofont-gear"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-info">
                            <a class="btn-orange" href="#"> View and edit cart </a>
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
                        <li class="main-list-li">
                            <a  class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-laptop"></i>  </span> Computers
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="menue-content">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="menue-block">
                                            <div class="title"> <a href="#"  > Accessories </a> </div>
                                            <a href="#" class=""> Storage</a>
                                            <a href="#" class=""> Computer Accessories</a>
                                            <a href="#" class=""> Printers & Accessories</a>
                                            <a href="#" class=""> Network Components</a>
                                            <img src="images/categorie01.jpg" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="menue-block">
                                            <div class="title"> <a href="#"  >Televisions</a> </div>
                                            <a href="#" class=""> 24 Inches & Below</a>
                                            <a href="#" class=""> 33 - 42 Inches</a>
                                            <a href="#" class=""> 43 - 54 Inches</a>
                                            <a href="#" class=""> TVs by City</a>
                                            <img src="images/categorie02.jpg" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="menue-block">
                                            <div class="title"> <a href="#"  >Laptops</a> </div>
                                            <a href="#" class=""> Gaming</a>
                                            <a href="#" class=""> Netbooks</a>
                                            <a href="#" class=""> Ultrabooks</a>
                                            <a href="#" class=""> Macbooks</a>
                                            <img src="images/categorie03.jpg" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="menue-block">
                                            <div class="title"> <a href="#"  >Audio</a> </div>
                                            <a href="#" class=""> Headphones & Headsets</a>
                                            <a href="#" class=""> Portable Speakers</a>
                                            <a href="#" class=""> Home Audio & Theater</a>
                                            <a href="#" class=""> Audio Players</a>
                                            <img src="images/categorie04.jpg" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <img src="images/categorie05.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-smart-phone"></i>  </span>
                                <span> Smart Phones </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Iphone </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#">Iphone 5</a> 	</li>
                                                <li> <a href="#">Iphone 5s</a> </li>
                                                <li> <a href="#">Iphone 6</a>  </li>
                                                <li> <a href="#">Iphone 6s</a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> SamSung </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Galaxy S6 </a> 	</li>
                                                <li> <a href="#"> Galaxy S7 </a> </li>
                                                <li> <a href="#"> Galaxy S6 </a>  </li>
                                                <li> <a href="#"> Galaxy S6</a> </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#" class="item-branch"> SONY </a> </li>
                                        <li> <a href="#" class="item-branch"> HUWAWI </a> </li>
                                        <li>
                                            <a href="#" class="item-branch"> OPPO </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#">Oppo f1s</a> </li>
                                                <li> <a href="#">Oppo neo 7</a>	</li>
                                                <li> <a href="#">Oppo neo 9</a> </li>
                                                <li> <a href="#">Oppo neo 3</a> </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#" class="item-branch"> Xiaomi </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-camera"></i>  </span>
                                <span> Electronics </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Camera </a>
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
                        <li class="main-list-li">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-diamond"></i>  </span>
                                <span> Jewelry </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="menue-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  > NECKLACES </a> </div>
                                                    <a href="#" class=""> Pendants </a>
                                                    <a href="#" class=""> Beaded Necklaces </a>
                                                    <a href="#" class=""> Charm Necklaces </a>
                                                    <a href="#" class=""> Chokers </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  > EARRINGS </a> </div>
                                                    <a href="#" class=""> Hoop Earrings </a>
                                                    <a href="#" class=""> Stud Earrings </a>
                                                    <a href="#" class=""> Chandelier Earrings </a>
                                                    <a href="#" class=""> Cluster Earrings </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  > RINGS </a> </div>
                                                    <a href="#" class=""> Wedding Engagement </a>
                                                    <a href="#" class=""> Statement Rings </a>
                                                    <a href="#" class=""> Solitaire Rings </a>
                                                    <a href="#" class=""> Stackable Rings  </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  >BRACELETS</a> </div>
                                                    <a href="#" class=""> Beaded Bracelets </a>
                                                    <a href="#" class=""> Charm Bracelets </a>
                                                    <a href="#" class=""> Bangles </a>
                                                    <a href="#" class=""> Cuff Bracelets </a>
                                                    <a href="#" class=""> Stackable Rings </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  > BROOCHES </a> </div>
                                                    <a href="#" class=""> Anklets </a>
                                                    <a href="#" class=""> Hair Jewelry </a>
                                                    <a href="#" class=""> Barbells </a>
                                                    <a href="#" class=""> Arm Bands </a>
                                                    <a href="#" class=""> Stackable Rings </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="menue-block">
                                                    <div class="title"> <a href="#"  > JEWELRY SETS </a> </div>
                                                    <a href="#" class=""> Midi Rings </a>
                                                    <a href="#" class=""> Signet Rings </a>
                                                    <a href="#" class=""> Ring Guards & Spacers </a>
                                                    <a href="#" class=""> Stackable Rings </a>
                                                    <a href="#" class=""> Jewelry Love </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="images/womn.jpg" class="img-fluid">
                                    </div>
                                    <div class="col-12">
                                        <div class="brands-slider">
                                            <div class="owl-carousel owl-theme brands-owl">
                                                <div class="item"> <a href=""> <img src="images/brand-1.png" class="img-fluid"> </a> </div>
                                                <div class="item"> <a href=""> <img src="images/brand-2.png" class="img-fluid"> </a> </div>
                                                <div class="item"> <a href=""> <img src="images/brand-3.png" class="img-fluid"> </a> </div>
                                                <div class="item"> <a href=""> <img src="images/brand-4.png" class="img-fluid"> </a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-football"></i>  </span>
                                <span> Sports </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Football </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Nike </a> 	</li>
                                                <li> <a href="#"> Puma </a> </li>
                                                <li> <a href="#"> Adidas </a>  </li>
                                                <li> <a href="#"> Neo </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Tennis </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Balls </a> 	</li>
                                                <li> <a href="#">Sony </a> </li>
                                                <li> <a href="#"> Racquet Bag </a>  </li>
                                                <li> <a href="#"> Drink Bottle </a> </li>
                                                <li> <a href="#"> Sun Screen </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Baseball  </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Batting Cage  </a> 	</li>
                                                <li> <a href="#"> Glove </a> </li>
                                                <li> <a href="#"> Rosin Bag </a>  </li>
                                                <li> <a href="#"> Sports Equpiment </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> BasketBall </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Balls </a> 	</li>
                                                <li> <a href="#"> Sony </a> </li>
                                                <li> <a href="#"> Racquet Bag </a>  </li>
                                                <li> <a href="#"> Drink Bottle </a> </li>
                                                <li> <a href="#"> Sun Screen </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-jacket"></i>  </span>
                                <span> Fashion </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="menue-content">
                                <div class="full-title">
                                    <h3> Best-Selling Products 2016</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-7">
                                                <img src="images/menu-sale.jpg" alt="ads" class="img-fluid">
                                            </div>
                                            <div class="col-lg-5">
                                                <ul class="itemsubmenu sub-internal-menu">
                                                    <li> <a href="#"> Bals  </a> 	</li>
                                                    <li> <a href="#"> Clothes </a> </li>
                                                    <li> <a href="#"> Bands  </a>  </li>
                                                    <li> <a href="#"> Hand Bag </a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-6">
                                                <a class="prod-block">
                                                    <h4> Feature Product </h4>
                                                    <div class="pic">
                                                        <img src="images/ad-2.jpg" alt="ads" class="img-fluid">
                                                    </div>
                                                    <h5> Samsung KS8000-Series 65-Class SUHD Smart LED TV </h5>
                                                    <p> Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur.</p>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="prod-block">
                                                    <h4> New Product </h4>
                                                    <div class="pic">
                                                        <img src="images/ad-2.jpg" alt="ads" class="img-fluid">
                                                    </div>
                                                    <h5> Splendido Oro(Tm) 14k Yellow </h5>
                                                    <p> Splendido Oro(Tm) 14k Yellow Gold 1mm Clover Link 22 Inch Chain
                                                        1.6 GHz Intel Core I5 (Broadwell) 4GB Yellow Gold 1mm Clover Link 22 Inch Chain
                                                        1.6 GHz Intel Core I5 (Broadwell) 4GB
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="images/menu-footer.jpg" alt="ads" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-heart-beat-alt"></i>  </span>
                                <span> Beauty, Health </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> Paint  </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Dove </a> 	</li>
                                                <li> <a href="#"> Hazeline </a> </li>
                                                <li> <a href="#"> Olay </a>  </li>
                                                <li> <a href="#"> Pond </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Part </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Dove </a> 	</li>
                                                <li> <a href="#"> Hazeline </a> </li>
                                                <li> <a href="#"> Olay </a>  </li>
                                                <li> <a href="#"> Pond </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Tonic  </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Dove </a> 	</li>
                                                <li> <a href="#"> Hazeline </a> </li>
                                                <li> <a href="#"> Olay </a>  </li>
                                                <li> <a href="#"> Pond </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Body medicine </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Dove </a> 	</li>
                                                <li> <a href="#"> Hazeline </a> </li>
                                                <li> <a href="#"> Olay </a>  </li>
                                                <li> <a href="#"> Pond </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li list-cat">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-fast-food"></i>  </span>
                                <span> Food </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="cat-popup-list">
                                <div class="menue-block">
                                    <ul>
                                        <li>
                                            <a href="#" class="item-branch"> KFC </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Humberger </a> 	</li>
                                                <li> <a href="#"> Drink </a> </li>
                                                <li> <a href="#"> Cakes </a>  </li>
                                                <li> <a href="#"> Humberger </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> McDonald's </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> KFC </a> 	</li>
                                                <li> <a href="#"> Hazeline </a> </li>
                                                <li> <a href="#"> Subway </a>  </li>
                                                <li> <a href="#"> Arbys </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Drink  </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> Cocacola </a> 	</li>
                                                <li> <a href="#"> Tea </a> </li>
                                                <li> <a href="#"> Subway </a>  </li>
                                                <li> <a href="#"> Pepsico </a> </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="item-branch"> Cakes </a>
                                            <ul class="itemsubmenu">
                                                <li> <a href="#"> McDonald's </a> 	</li>
                                                <li> <a href="#"> KFC </a> </li>
                                                <li> <a href="#"> Subway </a>  </li>
                                                <li> <a href="#"> Arbys </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="main-list-li">
                            <a class="main-a" href="#">
                                <span class="cat-icon"> <i class="icofont-wheelchair"></i>  </span>
                                <span> Furniture </span>
                                <span class="right-icon"> <i class="icofont-thin-right"></i> </span>
                            </a>
                            <div class="menue-content">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-1.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-2.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-3.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-3.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-1.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="prod-box">
                                            <img src="images/fur-2.jpg" alt="ads" class="img-fluid">
                                            <h4> Driven Backpack K </h4>
                                            <p> 200,00 $ </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
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
                                        <li> <a href="orders.html"> <i class="icofont-bag"></i>  Your Order	</a> </li>
                                        <li> <a href="Wishlist.html" class="Wishlist"> <i class="icofont-heart"></i> Your Wishlist </a> </li>
                                        <li> <a href="product-review.html"> <i class="icofont-eye-alt"></i>  Your Product Reviews  </a> </li>
                                        <li> <a href="news-subscribe.html"> <i class="icofont-envelope"></i>  Newsletter Subscription</a> </li>
                                        <li> <a href="billing-agreements.html"> <i class="icofont-checked"></i>  Billing Agreements	</a>  </li>
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
                    <a class="btn-orange" href="#"> Go to Checkout </a>
                </div>

                <div class="dropdown-items">
                    <div class="item-box">
                        <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                        <div class="data">
                            <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                            <h3> 20,00 $ </h3>
                            <div class="item-footer">
                                <p>  Qty :   <input type="text" value="1"> </p>
                                <div class="actions">
                                    <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                    <a href="#"> <i class="icofont-gear"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-box">
                        <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                        <div class="data">
                            <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                            <h3> 20,00 $ </h3>
                            <div class="item-footer">
                                <p>  Qty :   <input type="text" value="1"> </p>
                                <div class="actions">
                                    <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                    <a href="#"> <i class="icofont-gear"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-box">
                        <img src="images/phone-2.jpg" alt="prod" class="img-fluid">
                        <div class="data">
                            <a class="descr" href="#"> SALE 22% OFF - Actual Personalized Necklace - Handwriting Jewelry </a>
                            <h3> 20,00 $ </h3>
                            <div class="item-footer">
                                <p>  Qty :   <input type="text" value="1"> </p>
                                <div class="actions">
                                    <a data-toggle="modal" data-target="#delete-modal"> <i class="icofont-ui-delete"></i> </a>
                                    <a href="#"> <i class="icofont-gear"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-info">
                    <a class="btn-orange" href="#"> View and edit cart </a>
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

<?php if($dashboard) : ?>

<div class="internal-page-introduction">
    <img src="images/account-bg.png" alt="img" class="img-fluid">
    <div class="text">
        <h2> ACCOUNT CONTROL PANEL </h2>
        <ul class="breadcrumb-ul">
            <li class="breadcrumb-li"><a href="index.html"> Home </a></li>
            <li class="breadcrumb-li active"> ACCOUNT </li>
        </ul>
    </div>
</div>

<?php endif; ?>


<div class="internal-main-content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="main-side">
                    <div class="profile-links">
                        <ul>

                            <?php

                                $items = [];
                                $items[] = '<a href="seller.html"> <i class="icofont-user"></i> Become a Seller  </a>';
                                $items[] = '<a href="?controller=utilisateur&action=account"> <i class="icofont-user"></i> Account Dashboard </a>';
                                $items[] = '<a href="?controller=utilisateur&action=account_info"> <i class="icofont-info"></i>  Account Information </a>';
                                $items[] = '<a href="?controller=utilisateurLivraison&action=account_address"> <i class="icofont-paper-plane"></i> Address Book  </a>';
                                $items[] = '<a href="?controller=commande&action=account_orders"> <i class="icofont-numbered"></i> My Orders </a>';
                                $items[] = '<a href="account-pay.html"> <i class="icofont-credit-card"></i>My Credit Cards </a>';
                                $items[] = '<a href="account-wishlist.html"> <i class="icofont-heart"></i> Wishlist </a>';
                          //      $items[] = '<a href="?controller=commande&action=vendor"> <i class="icofont-heart"></i> Vendre ? </a>';

                                $i = 1;
                                foreach ($items as $value){
                                    if($i == $id) echo '<li class="active">';
                                    else echo '<li>';
                                    echo $value;
                                    echo '</li>';

                                    $i++;
                                }

                            ?>
                        </ul>
                    </div>

                    <div class="featured-brands">
                        <h2> FEATURED BRANDS  </h2>

                        <div class="brand">
                            <a href="brand.html">
                                <div class="brand-img">  <img src="images/br-iphone.jpg" class="img-fluid"> </div>
                                <div class="data">
                                    <h3> iPhone </h3>
                                    <p>  ( 15 ) </p>
                                </div>
                            </a>
                        </div>
                        <div class="brand">
                            <a href="brand.html">
                                <div class="brand-img"> <img src="images/br-samsung.jpeg" class="img-fluid"> </div>
                                <div class="data">
                                    <h3> Samsung </h3>
                                    <p>  ( 1 ) </p>
                                </div>
                            </a>
                        </div>
                        <div class="brand">
                            <a href="brand.html">
                                <div class="brand-img"> <img src="images/br-dell.jpg" class="img-fluid"> </div>
                                <div class="data">
                                    <h3> Dell </h3>
                                    <p> ( 9 ) </p>
                                </div>
                            </a>
                        </div>

                        <a href="all-brands.html" class="btn btn-orange"> VIEW ALL </a>
                    </div>
                    <div class="compare-products">
                        <h2> Compare Products  <span> 3 items </span> </h2>
                        <div class="prod">
                            <span class="delete"> <i class="icofont-close-line"></i> </span>
                            <h5> SALE 22% OFF - Actual Personalize Actual Personalize  </h5>
                        </div>
                        <div class="prod">
                            <span class="delete"> <i class="icofont-close-line"></i> </span>
                            <h5> SALE 22% OFF - Actual Personalize Actual Personalize  </h5>
                        </div>
                        <div class="prod">
                            <span class="delete"> <i class="icofont-close-line"></i> </span>
                            <h5> SALE 22% OFF - Actual Personalize Actual Personalize  </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="profile-content">

                    <?php

                    use App\Models\Lib\MessageFlash;

                    $messages = MessageFlash::lireTousMessages();

                    foreach ($messages as $type)
                    {
                        foreach ($type as $m){
                            echo $m;
                        }
                    }

                    ?>

                    <?php
                        echo $data;
                    ?>
                </div>
            </div>
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



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/edit.js"></script>


</body>

</html>