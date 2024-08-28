<?php
include('connection.php');
include('templates/header.php');
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">New Arrival</div>
                <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCTS    ------------------------------------>
<section class="flat-spacing-1">
    <div class="container">
        <div class="tf-shop-control grid-3 align-items-center">
            <div class="tf-control-filter">
                <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
            </div>
            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                    <div class="item"><span class="icon icon-grid-2"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                    <div class="item"><span class="icon icon-grid-4"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                    <div class="item"><span class="icon icon-grid-5"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                    <div class="item"><span class="icon icon-grid-6"></span></div>
                </li>
            </ul>
        </div>
        <div class="grid-layout wrapper-shop" data-grid="grid-4">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <!-- card product -->
                <div class="card-product d-flex flex-column h-100">
                    <div class="card-product-wrapper flex-grow-1">
                        <a href="product_detail.php?id=<?php echo $row['id'] ?>" class="product-img d-block h-100">
                            <img class="lazyload img-product w-100 h-100 object-fit-cover" data-src="admin/<?php echo $row['image'] ?>" src="admin/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                            <img class="lazyload img-hover w-100 h-100 object-fit-cover" data-src="admin/<?php echo $row['image'] ?>" src="admin/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                        </a>
                        <div class="list-product-btn absolute-2">
                            <a href="#quick_add_<?php echo $row['id'] ?>" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                <span class="icon icon-bag"></span>
                                <span class="tooltip">Quick Add</span>
                            </a>
                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                <span class="icon icon-heart"></span>
                                <span class="tooltip">Add to Wishlist</span>
                                <span class="icon icon-delete"></span>
                            </a>
                            <a href="#quick_view_<?php echo $row['id']; ?>" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                <span class="icon icon-view"></span>
                                <span class="tooltip">Quick View</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-product-info">
                        <a href="product-detail.php" class="title link"><?php echo $row['name'] ?></a>
                        <span class="price"><?php echo $row['price'] ?>$</span>
                        <p class="description"><?php echo substr($row['discription'], 0, 100) . '...'; ?></p>
                        <p class="description"></p>
                        <ul class="list-color-product">
                            <li class="list-color-item color-swatch active">
                                <span class="tooltip">Orange</span>
                                <span class="swatch-value bg_orange-3"></span>
                                <img class="lazyload" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                            </li>
                            <li class="list-color-item color-swatch">
                                <span class="tooltip">Black</span>
                                <span class="swatch-value bg_dark"></span>
                                <img class="lazyload" data-src="images/products/black-1.jpg" src="images/products/black-1.jpg" alt="image-product">
                            </li>
                            <li class="list-color-item color-swatch">
                                <span class="tooltip">White</span>
                                <span class="swatch-value bg_white"></span>
                                <img class="lazyload" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" modal fade modalDemo" id="quick_add_<?php echo $row['id']; ?>">
                    <div class="modal-dialog modal-dialog-centered" style="width:50%">
                        <div class="modal-content">
                            <form action="addtocartcode.php" method="post" class="">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                                <input type="hidden" name="product_model" value="<?php echo $row['model']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                                <div class="header">
                                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                                </div>
                                <div class="wrap">
                                    <div class="tf-product-info-item">
                                        <div href="" class="product-img">
                                            <img class="" data-src="admin/<?php echo $row['image']; ?>" src="admin/<?php echo $row['image']; ?>" style="width: 200px; height: 200px; object-fit: contain;">
                                        </div>
                                        <div class="content">
                                            <a href="product_detail.php?id=<?php echo $row['id'] ?>">
                                                <h5><?php echo $row['name'] ?></h5>
                                            </a>
                                            <span><?php echo $row['model'] ?></span>
                                            <div class="tf-product-info-price">
                                                <span class=""><?php echo $row['discription'] ?></span>
                                            </div>
                                            <div class="tf-product-info-price">
                                                <div class="price"><?php echo $row['price'] ?>$</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-quantity mb_15">
                                        <div class="quantity-title fw-6">Quantity</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity minus-btn">-</span>
                                            <input type="text" name="quantity" value="1">
                                            <span class="btn-quantity plus-btn">+</span>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-buy-button text-center">
                                        <button type="submit" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn "><span>Add to cart - </span><span class="tf-qty-price"><?php echo $row['price'] ?></span></button>
                                        <div class="w-100">
                                            <button type="submit" class="w-50 tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center" style="background-color: #ffa500 !important; border: unset;"><span>Pay with <img src="assets/frontend/images/payments/paypal.png" alt=""></span></button>
                                            <a href="stripe_form.php" class="w-50 mt-1 tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center" style="background-color: #000000 !important; border: unset;"><span>Pay with <img width="55px" src="assets/frontend/images/payments/stripe.png" alt=""></span></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal quick_view -->
                <div class="modal fade modalDemo" id="quick_view_<?php echo $row['id'] ?>">
                    <div class="modal-dialog modal-dialog-centered" style="width:50%">
                        <div class=" modal-content">
                            <div class="header">
                                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                            </div>
                            <div class="wrap">
                                <div class="item">
                                    <img class="w-25" data-src="admin/<?php echo $row['image']; ?>" src="admin/<?php echo $row['image']; ?>">
                                </div>
                                <div class="tf-product-info-wrap position-relative">
                                    <div class="tf-product-info-list">
                                        <div class="tf-product-info-title">
                                            <h5><a class="link" href="product_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h5>
                                        </div>
                                        <div class="tf-product-info-badges">
                                            <div class="badges text-uppercase">Best seller</div>
                                            <div class="product-status-content">
                                                <i class="icon-lightning"></i>
                                                <p class="fw-6">Selling fast! 48 people have this in their carts.</p>
                                            </div>
                                        </div>
                                        <div class="tf-product-info-price">
                                            <div class="price"><?php echo $row['price'] ?>$</div>
                                        </div>
                                        <div class="tf-product-description">
                                            <p><?php echo $row['discription'] ?></p>
                                        </div>
                                        <div>
                                            <a href="product_detail.php?id=<?php echo $row['id']; ?>" class="tf-btn fw-6 btn-line">View full details<i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- pagination -->
        <ul class="tf-pagination-wrap tf-pagination-list">
            <li class="active">
                <a href="#" class="pagination-link">1</a>
            </li>
            <li>
                <a href="#" class="pagination-link animate-hover-btn">2</a>
            </li>
            <li>
                <a href="#" class="pagination-link animate-hover-btn">3</a>
            </li>
            <li>
                <a href="#" class="pagination-link animate-hover-btn">4</a>
            </li>
            <li>
                <a href="#" class="pagination-link animate-hover-btn">
                    <span class="icon icon-arrow-right"></span>
                </a>
            </li>
        </ul>
    </div>
</section>

<!-- footer -->
<footer id="footer" class="footer">
    <div class="footer-wrap">
        <div class="footer-body">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="footer-infor">
                            <div class="footer-logo">
                                <a href="index.php">
                                    <img src="images/logo/logo.svg" alt="">
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <p>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</p>
                                </li>
                                <li>
                                    <p>Email: <a href="#">info@fashionshop.com</a></p>
                                </li>
                                <li>
                                    <p>Phone: <a href="#">(212) 555-1234</a></p>
                                </li>
                            </ul>
                            <a href="contact-1.php" class="tf-btn btn-line">Get direction<i class="icon icon-arrow1-top-left"></i></a>
                            <ul class="tf-social-icon d-flex gap-10">
                                <li><a href="#" class="box-icon w_34 round social-facebook border-line-black"><i class="icon fs-14 icon-fb"></i></a></li>
                                <li><a href="#" class="box-icon w_34 round social-twiter border-line-black"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                <li><a href="#" class="box-icon w_34 round social-instagram border-line-black"><i class="icon fs-14 icon-instagram"></i></a></li>
                                <li><a href="#" class="box-icon w_34 round social-tiktok border-line-black"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                <li><a href="#" class="box-icon w_34 round social-pinterest border-line-black"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                        <div class="footer-heading footer-heading-desktop">
                            <h6>Help</h6>
                        </div>
                        <div class="footer-heading footer-heading-moblie">
                            <h6>Help</h6>
                        </div>
                        <ul class="footer-menu-list tf-collapse-content">
                            <li>
                                <a href="privacy-policy.php" class="footer-menu_item">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="delivery-return.php" class="footer-menu_item"> Returns + Exchanges </a>
                            </li>
                            <li>
                                <a href="shipping-delivery.php" class="footer-menu_item">Shipping</a>
                            </li>
                            <li>
                                <a href="terms-conditions.php" class="footer-menu_item">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="faq-1.php" class="footer-menu_item">FAQ’s</a>
                            </li>
                            <li>
                                <a href="compare.php" class="footer-menu_item">Compare</a>
                            </li>
                            <li>
                                <a href="wishlist.php" class="footer-menu_item">My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                        <div class="footer-heading footer-heading-desktop">
                            <h6>About us</h6>
                        </div>
                        <div class="footer-heading footer-heading-moblie">
                            <h6>About us</h6>
                        </div>
                        <ul class="footer-menu-list tf-collapse-content">
                            <li>
                                <a href="about-us.php" class="footer-menu_item">Our Story</a>
                            </li>
                            <li>
                                <a href="our-store.php" class="footer-menu_item">Visit Our Store</a>
                            </li>
                            <li>
                                <a href="contact-1.php" class="footer-menu_item">Contact Us</a>
                            </li>
                            <li>
                                <a href="login.php" class="footer-menu_item">Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="footer-newsletter footer-col-block">
                            <div class="footer-heading footer-heading-desktop">
                                <h6>Sign Up for Email</h6>
                            </div>
                            <div class="footer-heading footer-heading-moblie">
                                <h6>Sign Up for Email</h6>
                            </div>
                            <div class="tf-collapse-content">
                                <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales, exclusive content, events and more!</div>
                                <form class="form-newsletter" id="subscribe-form" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                                    <div id="subscribe-content">
                                        <fieldset class="email">
                                            <input type="email" name="email-form" id="subscribe-email" placeholder="Enter your email...." tabindex="0" aria-required="true">
                                        </fieldset>
                                        <div class="button-submit">
                                            <button id="subscribe-button" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn" type="button">Subscribe<i class="icon icon-arrow1-top-left"></i></button>
                                        </div>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                                <div class="tf-cur">
                                    <div class="tf-currencies">
                                        <select class="image-select center style-default type-currencies">
                                            <option data-thumbnail="images/country/fr.svg">EUR <span>€ | France</span></option>
                                            <option data-thumbnail="images/country/de.svg">EUR <span>€ | Germany</span></option>
                                            <option selected data-thumbnail="images/country/us.svg">USD <span>$ | United States</span></option>
                                            <option data-thumbnail="images/country/vn.svg">VND <span>₫ | Vietnam</span></option>
                                        </select>
                                    </div>
                                    <div class="tf-languages">
                                        <select class="image-select center style-default type-languages">
                                            <option>English</option>
                                            <option>العربية</option>
                                            <option>简体中文</option>
                                            <option>اردو</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                            <div class="footer-menu_item">© 2024 Ecomus Store. All Rights Reserved</div>
                            <div class="tf-payment">
                                <img src="images/payments/visa.png" alt="">
                                <img src="images/payments/img-1.png" alt="">
                                <img src="images/payments/img-2.png" alt="">
                                <img src="images/payments/img-3.png" alt="">
                                <img src="images/payments/img-4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->

</div>

<!-- gotop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
    </svg>
</div>
<!-- /gotop -->

<!-- toolbar-bottom -->
<div class="tf-toolbar-bottom type-1150">
    <div class="toolbar-item active">
        <a href="#toolbarShopmb" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
            <div class="toolbar-icon">
                <i class="icon-shop"></i>
            </div>
            <div class="toolbar-label">Shop</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
            <div class="toolbar-icon">
                <i class="icon-fill"></i>
            </div>
            <div class="toolbar-label">Filter</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
            <div class="toolbar-icon">
                <i class="icon-search"></i>
            </div>
            <div class="toolbar-label">Search</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#login" data-bs-toggle="modal">
            <div class="toolbar-icon">
                <i class="icon-account"></i>
            </div>
            <div class="toolbar-label">Account</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="wishlist.php">
            <div class="toolbar-icon">
                <i class="icon-heart"></i>
                <div class="toolbar-count">0</div>
            </div>
            <div class="toolbar-label">Wishlist</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#shoppingCart" data-bs-toggle="modal">
            <div class="toolbar-icon">
                <i class="icon-bag"></i>
                <div class="toolbar-count">1</div>
            </div>
            <div class="toolbar-label">Cart</div>
        </a>
    </div>
</div>
<!-- /toolbar-bottom -->

<!-- mobile menu -->
<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-one" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-one">
                        <span>Home</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-one" class="collapse">
                        <ul class="sub-nav-menu">
                            <li><a href="index.php" class="sub-nav-link">Home Fashion 01</a></li>
                            <li><a href="home-02.php" class="sub-nav-link">Home Fashion 02</a></li>
                            <li><a href="home-03.php" class="sub-nav-link">Home Fashion 03</a></li>
                            <li><a href="home-04.php" class="sub-nav-link">Home Fashion 04</a></li>
                            <li><a href="home-05.php" class="sub-nav-link">Home Fashion 05</a></li>
                            <li><a href="home-06.php" class="sub-nav-link">Home Fashion 06</a></li>
                            <li><a href="home-07.php" class="sub-nav-link">Home Fashion 07</a></li>
                            <li><a href="home-08.php" class="sub-nav-link">Home Fashion 08</a></li>
                            <li><a href="home-giftcard.php" class="sub-nav-link">Home Gift Card</a></li>
                            <li><a href="home-headphone.php" class="sub-nav-link">Home Headphone</a></li>
                            <li><a href="home-multi-brand.php" class="sub-nav-link">Home Multi Brand</a></li>
                            <li><a href="home-skincare.php" class="sub-nav-link">Home skincare</a></li>
                        </ul>
                    </div>

                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-two" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-two">
                        <span>Shop</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-two" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            <li><a href="#sub-shop-one" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-one">
                                    <span>Shop layouts</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-shop-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li><a href="shop-default.php" class="sub-nav-link">Default</a></li>
                                        <li><a href="shop-left-sidebar.php" class="sub-nav-link">Left sidebar</a></li>
                                        <li><a href="shop-right-sidebar.php" class="sub-nav-link">Right sidebar</a></li>
                                        <li><a href="shop-fullwidth.php" class="sub-nav-link">Fullwidth</a></li>
                                        <li><a href="shop-collection-sub.php" class="sub-nav-link">Sub collection</a></li>
                                        <li><a href="shop-collection-list.php" class="sub-nav-link">Collections list</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sub-shop-two" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-two">
                                    <span>Features</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-shop-two" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li><a href="shop-link.php" class="sub-nav-link">Pagination links</a></li>
                                        <li><a href="shop-loadmore.php" class="sub-nav-link">Pagination loadmore</a></li>
                                        <li><a href="shop-infinite-scrolling.php" class="sub-nav-link">Pagination infinite scrolling</a></li>
                                        <li><a href="shop-filter-sidebar.php" class="sub-nav-link">Filter sidebar</a></li>
                                        <li><a href="shop-filter-hidden.php" class="sub-nav-link">Filter hidden</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sub-shop-three" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-three">
                                    <span>Product styles</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-shop-three" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">

                                        <li><a href="product-style-01.php" class="sub-nav-link">Product style 01</a></li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-three">
                        <span>Products</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-three" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            <li>
                                <a href="#sub-product-one" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-product-one">
                                    <span>Product layouts</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-product-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li><a href="product-detail.php" class="sub-nav-link">Product default</a></li>
                                        <li><a href="product-grid-1.php" class="sub-nav-link">Product grid 1</a></li>
                                        <li><a href="product-grid-2.php" class="sub-nav-link">Product grid 2</a></li>
                                        <li><a href="product-stacked.php" class="sub-nav-link">Product stacked</a></li>
                                        <li><a href="product-right-thumbnails.php" class="sub-nav-link">Product right thumbnails</a></li>
                                        <li><a href="product-bottom-thumbnails.php" class="sub-nav-link">Product bottom thumbnails</a></li>
                                        <li><a href="product-drawer-sidebar.php" class="sub-nav-link">Product drawer sidebar</a></li>
                                        <li><a href="product-description-accordion.php" class="sub-nav-link">Product description accordion</a></li>
                                        <li><a href="product-description-list.php" class="sub-nav-link">Product description list</a></li>
                                        <li><a href="product-description-vertical.php" class="sub-nav-link">Product description vertical</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sub-product-two" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-product-two">
                                    <span>Product details</span>
                                    <span class="btn-open-sub"></span>
                                </a>

                            </li>

                            <li>
                                <a href="#sub-product-four" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-product-four">
                                    <span>Product features</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-product-four" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li><a href="product-frequently-bought-together.php" class="sub-nav-link">Frequently bought together</a></li>
                                        <li><a href="product-frequently-bought-together-2.php" class="sub-nav-link">Frequently bought together 2</a></li>
                                        <li><a href="product-upsell-features.php" class="sub-nav-link">Product upsell features</a></li>
                                        <li><a href="product-pre-orders.php" class="sub-nav-link">Product pre-orders</a></li>
                                        <li><a href="product-notification.php" class="sub-nav-link">Back in stock notification</a></li>
                                        <li><a href="product-pickup.php" class="sub-nav-link">Product pickup</a></li>
                                        <li><a href="product-images-grouped.php" class="sub-nav-link">Variant images grouped</a></li>
                                        <li><a href="product-complimentary.php" class="sub-nav-link">Complimentary products</a></li>
                                        <li><a href="product-quick-order-list.php" class="sub-nav-link line-clamp">Quick order list<div class="demo-label"><span class="demo-new">New</span></div></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-four">
                        <span>Pages</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-four" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            <li><a href="about-us.php" class="sub-nav-link">About us</a></li>
                            <li><a href="brands.php" class="sub-nav-link line-clamp">Brands<div class="demo-label"><span class="demo-new">New</span></div></a></li>
                            <li><a href="brands-v2.php" class="sub-nav-link">Brands V2</a></li>
                            <li><a href="contact-1.php" class="sub-nav-link">Contact 1</a></li>
                            <li><a href="contact-2.php" class="sub-nav-link">Contact 2</a></li>
                            <li><a href="faq-1.php" class="sub-nav-link">FAQ 01</a></li>
                            <li><a href="faq-2.php" class="sub-nav-link">FAQ 02</a></li>
                            <li><a href="our-store.php" class="sub-nav-link">Our store</a></li>
                            <li><a href="store-locations.php" class="sub-nav-link">Store locator</a></li>
                            <li><a href="timeline.php" class="sub-nav-link line-clamp">Timeline<div class="demo-label"><span class="demo-new">New</span></div></a></li>
                            <li><a href="view-cart.php" class="sub-nav-link line-clamp">View cart</a></li>
                        </ul>
                    </div>

                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-five">
                        <span>Blog</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-five" class="collapse">
                        <ul class="sub-nav-menu">
                            <li><a href="blog-grid.php" class="sub-nav-link">Grid layout</a></li>
                            <li><a href="blog-sidebar-left.php" class="sub-nav-link">Left sidebar</a></li>
                            <li><a href="blog-sidebar-right.php" class="sub-nav-link">Right sidebar</a></li>
                            <li><a href="blog-list.php" class="sub-nav-link">Blog list</a></li>
                            <li><a href="blog-detail.php" class="sub-nav-link">Single Post</a></li>
                        </ul>
                    </div>

                </li>
                <li class="nav-mb-item">
                    <a href="#" class="mb-menu-link">Buy now</a>
                </li>
            </ul>
            <div class="mb-other-content">
                <div class="d-flex group-icon">
                    <a href="wishlist.php" class="site-nav-icon"><i class="icon icon-heart"></i>Wishlist</a>
                    <a href="#" class="site-nav-icon"><i class="icon icon-search"></i>Search</a>
                </div>
                <div class="mb-notice">
                    <a href="contact-1.php" class="text-need">Need help ?</a>
                </div>
                <ul class="mb-info">
                    <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                    <li>Email: <b>info@fashionshop.com</b></li>
                    <li>Phone: <b>(212) 555-1234</b></li>
                </ul>
            </div>
        </div>
        <div class="mb-bottom">
            <a href="login.php" class="site-nav-icon"><i class="icon icon-account"></i>Login</a>
            <div class="bottom-bar-language">
                <div class="tf-currencies">
                    <select class="image-select center style-default type-currencies">
                        <option data-thumbnail="images/country/fr.svg">EUR <span>€ | France</span></option>
                        <option data-thumbnail="images/country/de.svg">EUR <span>€ | Germany</span></option>
                        <option selected data-thumbnail="images/country/us.svg">USD <span>$ | United States</span></option>
                        <option data-thumbnail="images/country/vn.svg">VND <span>₫ | Vietnam</span></option>
                    </select>
                </div>
                <div class="tf-languages">
                    <select class="image-select center style-default type-languages">
                        <option>English</option>
                        <option>العربية</option>
                        <option>简体中文</option>
                        <option>اردو</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /mobile menu -->

<!-- Filter -->
<div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
    <div class="canvas-wrapper">
        <header class="canvas-header">
            <div class="filter-icon">
                <span class="icon icon-filter"></span>
                <span>Filter</span>
            </div>
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </header>
        <div class="canvas-body">
            <div class="widget-facet wd-categories">
                <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                    <span>Product categories</span>
                    <span class="icon icon-arrow-up"></span>
                </div>
                <div id="categories" class="collapse show">
                    <ul class="list-categoris current-scrollbar mb_36">
                        <li class="cate-item current"><a href="shop-default.php"><span>Fashion</span></a></li>
                        <li class="cate-item"><a href="shop-default.php"><span>Men</span></a></li>
                        <li class="cate-item"><a href="shop-default.php"><span>Women</span></a></li>
                        <li class="cate-item"><a href="shop-default.php"><span>Denim</span></a></li>
                        <li class="cate-item"><a href="shop-default.php"><span>Dress</span></a></li>
                    </ul>
                </div>
            </div>
            <form action="#" id="facet-filter-form" class="facet-filter-form">
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                        <span>Availability</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="availability" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="availability-1">
                                <label for="availability-1" class="label"><span>In stock</span>&nbsp;<span>(14)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="availability-2">
                                <label for="availability-2" class="label"><span>Out of stock</span>&nbsp;<span>(2)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                        <span>Price</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="price" class="collapse show">
                        <div class="widget-price">
                            <div id="slider-range"></div>
                            <div class="box-title-price">
                                <span class="title-price">Price :</span>
                                <div class="caption-price">
                                    <div>
                                        <span>$</span>
                                        <span id="slider-range-value1" class=""></span>
                                    </div>
                                    <span>-</span>
                                    <div>
                                        <span>$</span>
                                        <span id="slider-range-value2" class=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#brand" data-bs-toggle="collapse" aria-expanded="true" aria-controls="brand">
                        <span>Brand</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="brand" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="brand" class="tf-check" id="brand-1">
                                <label for="brand-1" class="label"><span>Ecomus</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="brand" class="tf-check" id="brand-2">
                                <label for="brand-2" class="label"><span>M&H</span>&nbsp;<span>(8)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true" aria-controls="color">
                        <span>Color</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="color" class="collapse show">
                        <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_beige" id="beige">
                                <label for="beige" class="label"><span>Beige</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark" id="black">
                                <label for="black" class="label"><span>Black</span>&nbsp;<span>(18)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_blue-2" id="blue">
                                <label for="blue" class="label"><span>Blue</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_brown" id="brown">
                                <label for="brown" class="label"><span>Brown</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_cream" id="cream">
                                <label for="cream" class="label"><span>Cream</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-beige" id="dark-beige">
                                <label for="dark-beige" class="label"><span>Dark Beige</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-blue" id="dark-blue">
                                <label for="dark-blue" class="label"><span>Dark Blue</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-green" id="dark-green">
                                <label for="dark-green" class="label"><span>Dark Green</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-grey" id="dark-grey">
                                <label for="dark-grey" class="label"><span>Dark Grey</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_grey" id="grey">
                                <label for="grey" class="label"><span>Grey</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-blue" id="light-blue">
                                <label for="light-blue" class="label"><span>Light Blue</span>&nbsp;<span>(5)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-green" id="light-green">
                                <label for="light-green" class="label"><span>Light Green</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-grey" id="light-grey">
                                <label for="light-grey" class="label"><span>Light Grey</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-pink" id="light-pink">
                                <label for="light-pink" class="label"><span>Light Pink</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_purple" id="light-purple">
                                <label for="light-purple" class="label"><span>Light Purple</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-yellow" id="light-yellow">
                                <label for="light-yellow" class="label"><span>Light Yellow</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_orange" id="orange">
                                <label for="orange" class="label"><span>Orange</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_pink" id="pink">
                                <label for="pink" class="label"><span>Pink</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_taupe" id="taupe">
                                <label for="taupe" class="label"><span>Taupe</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_white" id="white">
                                <label for="white" class="label"><span>White</span>&nbsp;<span>(14)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_yellow" id="yellow">
                                <label for="yellow" class="label"><span>Yellow</span>&nbsp;<span>(1)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#size" data-bs-toggle="collapse" aria-expanded="true" aria-controls="size">
                        <span>Size</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="size" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check" id="s">
                                <label for="s" class="label"><span>S</span>&nbsp;<span>(7)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check" id="m">
                                <label for="m" class="label"><span>M</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check" id="l">
                                <label for="l" class="label"><span>L</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check" id="xl">
                                <label for="xl" class="label"><span>XL</span>&nbsp;<span>(6)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- End Filter -->

<!-- canvasSearch -->
<div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
    <div class="canvas-wrapper">
        <header class="tf-search-head">
            <div class="title fw-5">
                Search our site
                <div class="close">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </div>
            </div>
            <div class="tf-search-sticky">
                <form class="tf-mini-search-frm">
                    <fieldset class="text">
                        <input type="text" placeholder="Search" class="" name="text" tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <button class="" type="submit"><i class="icon-search"></i></button>
                </form>
            </div>
        </header>
        <div class="canvas-body p-0">
            <div class="tf-search-content">
                <div class="tf-cart-hide-has-results">
                    <div class="tf-col-quicklink">
                        <div class="tf-search-content-title fw-5">Quick link</div>
                        <ul class="tf-quicklink-list">
                            <li class="tf-quicklink-item">
                                <a href="shop-default.php" class="">Fashion</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.php" class="">Men</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.php" class="">Women</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.php" class="">Accessories</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tf-col-content">
                        <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                        <div class="tf-search-hidden-inner">
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.php">
                                        <img src="images/products/white-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.php">Cotton jersey top</a>
                                    <div class="tf-product-info-price">
                                        <div class="compare-at-price">$10.00</div>
                                        <div class="price-on-sale fw-6">$8.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.php">
                                        <img src="images/products/white-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.php">Mini crossbody bag</a>
                                    <div class="tf-product-info-price">
                                        <div class="price fw-6">$18.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.php">
                                        <img src="images/products/white-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.php">Oversized Printed T-shirt</a>
                                    <div class="tf-product-info-price">
                                        <div class="price fw-6">$18.00</div>
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
<!-- /canvasSearch -->

<!-- toolbarShopmb -->
<div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate1.jpg" alt="">
                        </div>
                        <span>Accessories</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate2.jpg" alt="">
                        </div>
                        <span>Dog</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate3.jpg" alt="">
                        </div>
                        <span>Grocery</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate4.png" alt="">
                        </div>
                        <span>Handbag</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-one" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-one">
                        <div class="image">
                            <img src="images/shop/cate/cate5.jpg" alt="">
                        </div>
                        <span>Fashion</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-one" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation">
                            <li>
                                <a href="#cate-shop-one" class="tf-category-link has-children sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-one">
                                    <div class="image">
                                        <img src="images/shop/cate/cate6.jpg" alt="">
                                    </div>
                                    <span>Mens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="images/shop/cate/cate1.jpg" alt="">
                                                </div>
                                                <span>Accessories</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="images/shop/cate/cate8.jpg" alt="">
                                                </div>
                                                <span>Shoes</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#cate-shop-two" class="tf-category-link has-children sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-two">
                                    <div class="image">
                                        <img src="images/shop/cate/cate9.jpg" alt="">
                                    </div>
                                    <span>Womens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-two" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="images/shop/cate/cate4.png" alt="">
                                                </div>
                                                <span>Handbag</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="images/shop/cate/cate7.jpg" alt="">
                                                </div>
                                                <span>Tee</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-two" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-two">
                        <div class="image">
                            <img src="images/shop/cate/cate6.jpg" alt="">
                        </div>
                        <span>Men</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-two" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation1">
                            <li>
                                <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="images/shop/cate/cate1.jpg" alt="">
                                    </div>
                                    <span>Accessories</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="images/shop/cate/cate8.jpg" alt="">
                                    </div>
                                    <span>Shoes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate7.jpg" alt="">
                        </div>
                        <span>Tee</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.php" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="images/shop/cate/cate8.jpg" alt="">
                        </div>
                        <span>Shoes</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-three" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-three">
                        <div class="image">
                            <img src="images/shop/cate/cate9.jpg" alt="">
                        </div>
                        <span>Women</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-three" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation2">
                            <li>
                                <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="images/shop/cate/cate4.png" alt="">
                                    </div>
                                    <span>Handbag</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.php" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="images/shop/cate/cate7.jpg" alt="">
                                    </div>
                                    <span>Tee</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-bottom">
            <a href="shop-default.php" class="tf-btn fw-5 btn-line">View all collection<i class="icon icon-arrow1-top-left"></i></a>
        </div>
    </div>
</div>
<!-- /toolbarShopmb -->

<!-- shoppingCart -->
<?php
include('templates/cart.php');
?>
<!-- /shoppingCart -->
<!-- // footer scripts// -->
<?php
include('templates/footerscripts.php');
?>
</body>
</html>