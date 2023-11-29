<?php
include_once 'Shopping.php';
// use to fetch product data
class Product extends Shopping
{

    //fetch product data using getData method
    public function getData($table = 'product'): array
    {
       $result = $this->db->con->query("SELECT * FROM $table");

       $resultArray = array();

       //fetch product data one by one
       while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    // get product using item_id
    public function getProduct($item_id = null,$table = 'product'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM $table WHERE item_id=$item_id");

            $resultArray = array();

            //fetch product data one by one
            while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    //fetch product reviews using getReviews method
    public function getReviews($table = 'product_reviews',$product_id = null): array
    {
        $result = $this->db->con->query("SELECT * FROM $table WHERE productId = $product_id");
        $resultArray = array();

        //fetch product reviews one by one
        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    //insert into product reviews table
    public function insertIntoProductReviews($params = null,$table = "product_reviews"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into product_reviews values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$columns,$values);

                // execute query
                return $this->db->con->query($query_string);
            }
        }
    }

    // get params and insert into product_reviews table
    public function addToProductReviews( $quality,$price,$value,$name,$summary,$review): void
    {
        $quality = $this->sanitizeString($quality);
        $price = $this->sanitizeString($price);
        $value = $this->sanitizeString($value);
        $name = $this->sanitizeString($name);
        $summary = $this->sanitizeString($summary);
        $review = $this->sanitizeString($review);
        if (!empty($quality) && !empty($price) && !empty($value) && !empty($name) && !empty($summary) && !empty($review)){
            $params = array(
                "quality" => $quality,
                "price" => $price,
                "value" => $value,
                "name" => $name,
                "summary" => $summary,
                "review" => $review
            );

            // insert params into product_reviews
            $result = $this->insertIntoProductReviews($params);
            if ($result){
                // reload page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    // count number of product reviews for a particular product_id.
    public function countProductReviews($table = 'product_reviews',$product_id = null): int
    {
        $result = $this->db->con->query("SELECT * FROM $table WHERE productId = $product_id");
        if (empty($result)){
            $result = 0;
        }
        return mysqli_num_rows($result);
    }

    // count all reviews for all products.
    public function countTotalProductReviews($table = 'product_reviews'): int
    {
        $result = $this->db->con->query("SELECT * FROM $table");
        if (empty($result)){
            $result = 0;
        }
        return mysqli_num_rows($result);
    }

    // get product descriptions as object array.
    public function getProductDescription($table = 'product_description',$product_id = null): array
    {
        $result = $this->db->con->query("SELECT * FROM $table WHERE item_id = $product_id");
        $resultArray = array();

        //fetch product data one by one
        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    private function slugify($string): array|string|null
    {
        $preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
        $pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
        $string = preg_replace($pattern, '', $string);
        $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
        $string = trim($string, '-');
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        $string = strtolower($string);
        return preg_replace('~[^-\w]+~', '', $string);

    }

    public function addProductIntoDB($submit,$item_brand,$item_name,$filename,$tmp_filename,$item_price,$quantity,$item_memory,$item_storage,$item_resolution,$item_camera,$item_processor,$item_battery,$availability,$shipping_charge,$item_register)
    {

        if (isset($submit)) {

            $stmt = $this->db->con->prepare("SELECT *, COUNT(*) AS numrows FROM product WHERE LOWER(item_name)=LOWER(?)");
            $stmt->bind_param('s',$item_name);
            $stmt->execute();
            // Fetch the result as an associative array
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row['numrows'] > 0) {
                $_SESSION['error'] = 'Product already exist';
            } else {
                if (!empty($filename)) {
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $name =$item_name;
                    $slug = $this->slugify($name);
                    $new_filename = $slug . '.' . $ext;
                    $item_image = "./assets/products/".$new_filename;
                    if (move_uploaded_file($tmp_filename, '../assets/products/' . $new_filename)){
                        try {

                            $stmt = $this->db->con->prepare("INSERT INTO product (item_brand,item_name,item_price,quantity,availability,shipping_charge,item_image,item_register) VALUES (?,?,?,?,?,?,?,?)");
                            $stmt->bind_param('ssdissss',$item_brand,$item_name,$item_price,$quantity,$availability,$shipping_charge,$item_image,$item_register);
                            $stmt->execute();

                            $result = $this->db->con->prepare("INSERT INTO product_description (item_memory,item_storage,item_resolution,item_camera,item_processor,item_battery) VALUES (?,?,?,?,?,?)");
                            $result->bind_param('ssssss',$item_memory,$item_storage,$item_resolution,$item_camera,$item_processor,$item_battery);
                            $result->execute();

                            if ($stmt->execute() && $result->execute()) {
                                $_SESSION['success'] = 'Product added successfully';
                            }
                        } catch (Exception $e) {
                            $_SESSION['error'] = $e->getMessage();
                        }
                    }
                }
            }

        } else {
            $_SESSION['error'] = 'Fill up product form first';
        }


    }

    public function getProductFullDetails($item_id,$table1 = "product",$table2 = "product_description"): array
    {
        $result = $this->db->con->prepare("SELECT * FROM $table1 NATURAL JOIN $table2 WHERE item_id=?");
        $result->bind_param('i',$item_id);
        $result->execute();
        // Fetch the result as an associative array
        $stmt = $result->get_result();
        return $stmt->fetch_assoc();
    }

    public function updateProductInfo($submit,$item_id,$item_brand,$item_name,$filename,$tmp_filename,$item_price,$quantity,$item_memory,$item_storage,$item_resolution,$item_camera,$item_processor,$item_battery,$availability,$shipping_charge,$item_register)
    {
            $item_image = '';
            $stmt = $this->db->con->prepare("SELECT * FROM product WHERE item_id=?");
            $stmt->bind_param('i',$item_id);
            $stmt->execute();

            $results = $stmt->get_result();
            $row = $results->fetch_assoc();

            if (!empty($filename)) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_filename = $row['item_image'] . '_' . time() . '.' . $ext;
                $item_image = "./assets/products/".$new_filename;
                move_uploaded_file($tmp_filename, '../assets/products/' . $new_filename);
            }


        if (isset($submit)) {
            try {
                $stmt = $this->db->con->prepare("UPDATE product SET item_brand=?,item_name=?,item_price=?,quantity=?,availability=?,shipping_charge=?,item_image=?,item_register=? WHERE item_id = ?");
                $stmt->bind_param('ssdissssi',$item_brand,$item_name,$item_price,$quantity,$availability,$shipping_charge,$item_image,$item_register,$item_id);
                $stmt->execute();

                $result = $this->db->con->prepare("UPDATE product_description SET item_memory=?,item_storage=?,item_resolution=?,item_camera=?,item_processor=?,item_battery=? WHERE item_id=?");
                $result->bind_param('ssssssi',$item_memory,$item_storage,$item_resolution,$item_camera,$item_processor,$item_battery,$item_id);
                $result->execute();

                if ($stmt->execute() && $result->execute()) {
                    $_SESSION['success'] = 'Product updated successfully';
                }

            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }

        } else {
            $_SESSION['error'] = 'Fill up edit product form first';
        }

    }

}