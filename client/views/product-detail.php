<link rel="stylesheet" href="./../assets/Css/product-detail.css">
<style>
    .sizeActive {
        background-color: #000;
        color: #ffff;
    }

    .colorActive {
        border: 4px solid #319DA0;
    }
    </style>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <img id="expandedImg" src="./../upload/<?=$product[0]["sp_image"]?>" style="width:100%">
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
            <form action="index.php?url=add-gio-hang" method="POST">
                        <input type="text" name="id" hidden value="<?=$product[0]["sp_id"]?>">
                <div class="h-100 bg-light p-30">
                        <h3 class="product-name"><?=$product[0]["sp_name"]?></h3>
                    <div class="d-flex mb-3">
                        <p class="alert-product-number">Còn <?=$product[0]['sp_quantity']?> sản phẩm</p>
                        <p style="color : #8E0007;font-weight:bold"><?=$error?></p>
                    </div>
                    <div class="product-item_price-wraper">
                    <div class="product-price-main">
                        <?=number_format($product[0]['sp_price'],0,",",".")?>đ
                    </div>
                    <div class="product-price_sale color-text">
                        <?=number_format(trim($product[0]['sp_sale']),0,",",".")?>đ
                    </div>
                </div>
                    <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                        clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                        Nonumy</p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Sizes:</strong>
                        <form>
                            <?php
                                foreach ($size as $key) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="<?= $key['kt_id'] ?>" hidden name="size" value="<?=$key['kt_name']?>">
                                <label class="custom-control-label" for="<?= $key['kt_id'] ?>"><?= $key['kt_name'] ?></label>
                            </div>
                               <?php } ?>
                            
                        </form>
                    </div>
                    <div class="product-atribute_box">
                    <p>Màu sắc : </p>
                    <ul class="product-atribute_list-color">
                        <?php  
                    foreach ($color as $key) {
                     ?>
                        <label onClick="chooseColor()" for="color-<?=$key["ma_color"]?>" class="color_label"
                            style="background-color: <?=$key["ma_color"]?>"></label>
                        <input id="color-<?=$key["ma_color"]?>" hidden name="color" value="<?=$key["kt_name"]?>" type="radio">
                        <?php  }  ?>             
                    </ul>
                </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="number-input">
                        <a class="btn-control" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus"><i class="fa-solid fa-minus"></i></a>
                        <input class="quantity" min="0" name="quantity" value="1" type="number">
                        <a class="btn-control" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus"><i class="fa-solid fa-plus"></i></a>
                    </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm giỏ hàng</button>
                    </div>

                </div>
            </div>
        </form>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                      </ul> 
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                      </ul> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <?php foreach ($productRelate as $item) { ?>
                <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src=".././upload/" alt="<?=$item['sp_image']?>">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="index.php?url=san-pham-chi-tiet&id<?=$item['sp_id']?>">
                            <p><?=$item['sp_name']?></p></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5 class="color_price">
                                    <?=number_format($item['sp_price'],0,",",".")?>đ
                                </h5>
                                <h6 class="text-muted ml-2">
                                    <del><?=number_format($item['sp_sale'],0,",",".")?>đ </del>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php  } ?>
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function chooseColor() {
        const colors = document.querySelectorAll('.color_label');
        colors.forEach(element => {
        element.classList.remove("colorActive");
        element.addEventListener('click', () => {
        element.classList.add("colorActive");
        })
    });
}
    </script>
    <script src="./../assets/js/tab-slider.js"></script>
    <script src="./../assets/js/tab-component.js"></script>
    <script src="./../assets/js/list-cart.js"></script>
    <script src="./../assets/js/click-dropdown.js"></script>
    <script src="./../assets/js/back-top.js"></script>