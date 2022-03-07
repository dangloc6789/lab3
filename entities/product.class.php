<?php
    require_once("/config/db.class.php");
    class Product{
        public $productID;
        public $productName;
        public $cateID;
        public $price;
        public $quantity;
        public $description;
        public $picture;

        public function _construction($pro_name,$cate_id,$price,$quantity,$desc,$picture){
            $this->productName=$pro_name;
            $this->cateID=$cate_id;
            $this->price=$price;
            $this->quantity=$quantity;
            $this->description=$desc;
            $this->picture=$picture;
        }
        public function save(){
            $db = new Db();
            $sql="INSERT INTO Product (ProductName, CateID, Price, Quantuty, Decription, Picture,) VALUES ('$this->productName','$this->cateID', '$this->price','$this->quantity','$this->decription','$this->picture')";
            $result = $db->query_execute($sql);
            return $result;
        }
    }
?>