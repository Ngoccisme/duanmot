<link rel="stylesheet" href="./../assets/Css/product-detail.css">
<style>
    .sizeActive {
        background-color: #000;
        color: #ffff;
    }

    .colorActive {
        border: 4px solid #319DA0;
    }
    .form-control-cmtt {
                display: flex;
                justify-content: start;
                align-items: center;
            }

            .cmtt__item {
                display: flex;
                justify-content: start;
                align-items: start;
                margin: 20px;

            }

            .form-control-input-box {
                padding-bottom: 5px;
                border-bottom: 1px solid #ccc;
                display: flex;
                margin-left: 20px;
                width: 100%;
            }

            .form-control-input {
                outline: none;
                border: none;
                width: 100%;
                font-size: 15px;
            }

            .form-cmtt {
                margin: 0px 20px;
            }

            .avatar-cmtt {
                width: 40px;
                height: 40px;
                border-radius: 50px
            }

            .cmtt__content {
                text-align: justify;
                background-color: #F1F1F1;
                margin-top: 5px;
                padding: 10px;
                border-radius: 10px;
            }

            .all__cmtt::-webkit-scrollbar {
                width: 3px;
                background-color: rgb(235, 232, 232);
            }

            .all__cmtt::-webkit-scrollbar-thumb {
                background-color: #999;
                border-radius: 6px;
            }

            .all__cmtt {
                height: 400px;
                overflow-y: auto;
            }

            .cmtt__info {
                margin-left: 15px;
            }

            .btn__submit {
                cursor: pointer;
                color: #999;
                background-color: #ffff;
                border: none;
                font-size: 18px;
            }

            .btn__submit:hover {
                color: #555;
            }

            .cmtt__content-box {
                display: flex;
                justify-content: start;
                align-items: center;
            }

            .cmtt__delete {
                margin-left: 10px;
                color: #8E0007;
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
                        <?=number_format($product[0]['sp_sale'],0,",",".")?>đ
                    </div>
                    <div class="product-price_sale color-text">
                        <?=number_format(trim($product[0]['sp_price']),0,",",".")?>đ
                    </div>
                </div>
                    <!-- <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                        clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                        Nonumy</p> -->
                        <hr>
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
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Đánh giá</a>
                        <!-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> -->
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <?=$product[0]['sp_description'] ?>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Đánh giá</h4>
                            <?php if(isset($_SESSION["user"])){ ?>
                                <form action="?url=binh-luan" method="POST" class="form-cmtt">
                                    <input type="text" value="<?=$product[0]['sp_id']?>" name="sp_id" hidden>
                                    <div class="form-control-cmtt">
                                        <img class="avatar-cmtt" src="./../upload/<?=$_SESSION["user"]["kh_avatar"]?>" alt="">
                                        <div class="form-control-input-box">
                                            <input class="form-control-input" name="content" type="text"
                                                placeholder="Đánh giá của bạn ...">
                                            <button class="btn__submit" type="submit"> <i class="fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                                <div class="all__cmtt">
                                    <?php foreach ($comments as $key) { ?>
                                    <div class="cmtt__item">
                                        <img class="avatar-cmtt" src="./../upload/<?= $key["kh_avatar"]?>" alt="">
                                        <div class="cmtt__info">
                                            <h5 class="cmtt__user"><?= $key["kh_name"]?></h5>
                                            <div class="cmtt__content-box">
                                                <p class="cmtt__content"><?= $key["content"]?>
                                                </p>
                                                <?php if(isset($_SESSION["user"])){
                                                    if($_SESSION["user"]["kh_id"] ==  $key["kh_id"]){ ?>
                                                    <a  onclick="return confirm('Bạn có muốn xoá danh mục này ?')"  href="index.php?url=binh-luan-delete&id=<?= $key["cntt_id"]?>"   class="cmtt__delete"><i class="fa-solid fa-xmark"></i></a>
                                                    <?php   } ?>
                                                <?php   } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                        </div>
                        <!-- <div class="tab-pane fade" id="tab-pane-3">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <style>
        .img-fluid {
        max-width: 100%;
        height: 400px;
    }
    </style>
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm liên quan</span></h2>
        <div class="row px-xl-5">
        <?php foreach($productRelate as $item){ ?> 
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                                <!-- ảnh sản phẩm  -->
                                <a href="index.php?url=san-pham-chi-tiet&id=<?= $item["sp_id"] ?>"><img class="img-fluid w-100" src=".././upload/<?=$item["sp_image"] ?>" alt=""></a>
                        </div>
                        <div class="text-center py-4">
                            <!-- tên sản phẩm -->
                            <a class="h6 text-decoration-none text-truncate" href="index.php?url=san-pham-chi-tiet&id=<?=$item["sp_id"] ?>">
                                <p><?=$item["sp_name"] ?></p>
                            </a>

                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <!-- gia sản phẩm -->
                                
                                <h5 class="color_price">
                                    <?=number_format($item['sp_sale'],0,",",".")?>đ
                                </h5>
                                <h6 class="text-muted ml-2">
                                    <del><?=number_format($item['sp_price'],0,",",".")?>đ </del>
                                </h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ========= -->
                <?php } ?>
            
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