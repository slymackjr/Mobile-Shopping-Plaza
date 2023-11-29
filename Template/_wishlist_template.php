<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit']) && isset($_SESSION['user'])){
        $deletedrecord = $Cart->deleteCart($_POST['item_id'],$_SESSION['user']);
    }

    if (isset($_POST['cart-submit']) && isset($_SESSION['user'])){
        $Cart->saveForLater($_POST['item_id'],$_SESSION['user'],'cart','wishlist');
    }
}
?>
<!-- shopping cart section -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlist</h5>

        <!-- shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($Cart->getCartData($_SESSION['user'],'wishlist') as $item):
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                        ?>
                        <!-- cart items  -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown";?></h5>
                                <small>by <?php echo $item['item_brand'] ?? "Brand";?></small>
                                <!-- product ratings -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star-half"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">23,904 ratings</a>
                                </div>
                                <!-- product ratings end -->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0;?>" name="item_id">
                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger ps-0 pe-3 border-end">Delete</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0;?>" name="item_id">
                                        <button type="submit" name="cart-submit" class="btn font-baloo text-danger">Add to Cart</button>
                                    </form>

                                </div>
                                <!-- product qty end -->

                            </div>

                            <div class="col-sm-2 text-end">
                                <div class="font-size-20 text-danger font-baloo">
                                    Tsh<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo $item['item_price'] ?? 0;?></span>
                                </div>
                            </div>
                        </div>
                        <!-- cart items end -->
                        <?php
                        return $item['item_price'];
                    },$cart); // closing array map function
                endforeach;
                ?>
            </div>
        </div>
        <!-- shopping cart items end -->
    </div>
</section>
<!-- shopping cart section end -->