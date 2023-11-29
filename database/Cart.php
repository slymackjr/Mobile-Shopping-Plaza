<?php
include_once 'Shopping.php';
// php cart class
class Cart extends Shopping
{
    //fetch product data using getData method
    public function getCartData($userId,$table = 'product'): array
    {
        $result = $this->db->con->query("SELECT * FROM $table WHERE user_id=$userId");

        $resultArray = array();

        //fetch product data one by one
        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    //method to use for addToCart Method which insert items into cart table
    private function insertIntoCart($params = null)
    {
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", "cart",$columns,$values);

                // execute query
                return $this->db->con->query($query_string);
            }
        }
    }

    // Method to add items into cart table
    public function addToCart($userid,$itemId): void
    {
        if (isset($userid) && isset($itemId)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemId
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // reload page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
}

    //method to delete cart item using cart id
    public function deleteCart($itemId,$userId, $table = 'cart')
    {
        if (!isset($itemId)){
            $result = $this->db->con->prepare("DELETE FROM ? WHERE item_id=? AND user_id=?");
            $result->bind_param('sii',$table,$itemId,$userId);
            $success =$result->execute();
            if ($success){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //method to calculate subtotal
    public function getSum($arr){
        if (isset($arr)){
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }

    //method to get item_id of shopping cart list
    public function getCartId($cartArray = null,$key = "item_id")
    {
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    //method to save for later
    public function saveForLater($item_id,$userId, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO $saveTable SELECT * FROM $fromTable WHERE item_id=$item_id AND user_id=$userId;";
            $query .= "DELETE FROM $fromTable WHERE item_id=$item_id AND user_id=$userId;";

            //execute multiple query
            $result = $this->db->con->multi_query($query);
            if ($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}