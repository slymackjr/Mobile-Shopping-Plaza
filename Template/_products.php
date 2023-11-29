<!-- product -->
<?php
if(isset($_POST['submit']))
{
    $qty=$_POST['quality'];
    $price=$_POST['price'];
    $value=$_POST['value'];
    $name=$_POST['name'];
    $summary=$_POST['summary'];
    $review=$_POST['review'];
    $product->addToProductReviews($qty,$price,$value,$name,$summary,$review);
}

$item_id = $_GET['item_id']??1;
foreach ($product->getData() as $item):
    if ($item['item_id']==$item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "assets/products/1.png";?>" alt="product" class="img-fluid">
                <div class="row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Buy</button>
                    </div>
                    <div class="col">
                        <?php
                        if (isset($_SESSION['user'])):
                        if (in_array($item['item_id'],$Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In The Cart</button>';
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                        }
                        else:
                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown";?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand";?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star-half-stroke"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14" style="text-decoration-line: none"><?php echo $product->countProductReviews('product_reviews',$item_id);?> reviews | <?php echo $product->countTotalProductReviews();?> total reviews</a>
                </div>
                <hr class="m-0">

                <!-- product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P: </td>
                        <td><strike>Tsh<?php echo $item['item_price'] ?? 0;?></strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Availability:</td>
                        <td><span class="font-size-16 text-danger"> <?php echo $item['availability'] ?? "out of stock";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">Tsh <span><?php echo $item['item_price'] ?? 0;?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">Tsh <?php echo $item['item_price'] ?? 0;?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Shipping Charges:&nbsp;</td>
                        <td><span class="font-size-16 text-danger"> <?php echo $item['shipping_charge'] ?? "out of stock";?></span></td>
                    </tr>
                </table>
                <!-- product price end -->

                <!-- policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="retun text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12" style="text-decoration-line: none">10 Days <br> Replacement</a>
                        </div>
                        <div class="retun text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12" style="text-decoration-line: none">Daily Services <br> Delivered</a>
                        </div>
                        <div class="retun text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12" style="text-decoration-line: none">1 Year <br> Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- policy end -->
                <hr>

                <!-- order details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by May 29 - Dec 12</small>
                    <small>Sold by <a href="#" style="text-decoration-line: none">Daily Electronics Minions </a>(4.5 out 5 | 19,123 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 434394</small>
                </div>
                <!-- order details end -->

                <div class="row">
                    <div class="col-6">
                        <!-- color -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                            </div>
                        </div>
                        <!-- color end -->
                    </div>
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- product qty section end -->
                    </div>
                </div>

                <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size:</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- size end -->

            </div>
            <?php
            endif;
            endforeach;

            foreach ($product->getProductDescription('product_description', $item_id) as $description):
            if ($description['item_id'] == $item_id):

            ?>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Memory Sizes:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary"><?php echo $description['item_memory'] ?? " ";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Storage Sizes:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary"> <?php echo $description['item_storage'] ?? " ";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Resolution Sizes:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary">Tsh <?php echo $description['item_resolution'] ?? " ";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Camera Properties:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary"> <?php echo $description['item_camera'] ?? " ";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Processor Properties:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary"> <?php echo $description['item_processor'] ?? " ";?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Battery Properties:&nbsp;</td>
                        <td><span class="font-size-16 text-body-primary"> <?php echo $description['item_battery'] ?? " ";?></span></td>
                    </tr>
                </table>
            </div>
            <?php
            endif;
            endforeach;
            ?>
            <div class="col-12">
                <h6 class="font-rubik">Customers Reviews</h6>
                <hr>
                <div class="container-lg">
                    <?php
                    foreach ($product->getReviews('product_reviews',$item_id) as $review):
                    if ($review['productId']==$item_id):
                    ?>
                    <div class="p-1 p-lg-2">
                        <div class="card">
                            <div class="card-header"><span class="summary"><?php echo htmlentities($review['summary']);?></span><span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($review['reviewDate']);?></span></span></div>

                            <div class="card-body">"<?php echo htmlentities($review['review']);?>"</div>
                            <div class="card-body"><b>Quality :</b>  <?php echo htmlentities($review['quality']);?> Star</div>
                            <div class="card-body"><b>Price :</b>  <?php echo htmlentities($review['price']);?> Star</div>
                            <div class="card-body"><b>value :</b>  <?php echo htmlentities($review['value']);?> Star</div>
                            <div class="card-footer"><i class="fa fa-pencil-square-o"></i> <span class="name"><?php echo htmlentities($review['name']);?></span></div>
                        </div>

                    </div>
                    <?php
                    endif;
                    endforeach;
                    ?>
                </div><!-- /.product-reviews -->
                <form role="form" class=" " name="review" method="post">
                    <div class="container-lg p-3">
                        <div class="container-lg">
                            <div class="table-responsive-xxl">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="font-size-16">&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-size-16">Quality</td>
                                        <td><input type="radio" name="quality" class="" value="1"></td>
                                        <td><input type="radio" name="quality" class="" value="2"></td>
                                        <td><input type="radio" name="quality" class="" value="3"></td>
                                        <td><input type="radio" name="quality" class="" value="4"></td>
                                        <td><input type="radio" name="quality" class="" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-size-16">Price</td>
                                        <td><input type="radio" name="price" class="" value="1"></td>
                                        <td><input type="radio" name="price" class="" value="2"></td>
                                        <td><input type="radio" name="price" class="" value="3"></td>
                                        <td><input type="radio" name="price" class="" value="4"></td>
                                        <td><input type="radio" name="price" class="" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-size-16">Value</td>
                                        <td><input type="radio" name="value" class="" value="1"></td>
                                        <td><input type="radio" name="value" class="" value="2"></td>
                                        <td><input type="radio" name="value" class="" value="3"></td>
                                        <td><input type="radio" name="value" class="" value="4"></td>
                                        <td><input type="radio" name="value" class="" value="5"></td>
                                    </tr>
                                    </tbody>
                                </table><!-- /.table .table-bordered -->
                            </div><!-- /.table-responsive -->
                        </div><!-- /.review-table -->

                        <div class="container-lg">
                            <div class="form-floating">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                            <input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                            <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
                                        </div><!-- /.form-group -->
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputReview">Review <span class="astk">*</span></label>

                                            <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div><!-- /.row -->

                                <div class="action text-right">
                                    <button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                </div><!-- /.action -->

                </form>
            </div>
        </div>
    </div>
</section>
<!-- product end -->
