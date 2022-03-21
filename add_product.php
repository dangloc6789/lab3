<?php
    require_once("/xampp/htdocs/1-lab3/entities/product.class.php");
    require_once("/xampp/htdocs/1-lab3/entities/category.class.php");
    if(isset($POST["btnsubmit"])){
        $productName=$_POST["txtName"];
        $cateID=$_POST["txtCateID"];
        $price=$_POST["txtprice"];
        $quantity=$_POST["txtquantity"];
        $description=$_POST["txtdesc"];
        $picture=$_FILES["txtpic"];

        $newProduct=new Product($productName, $cateID,$price,$quantity,$description,$picture);
        $result=$newProduct->save();
        if($result){
            header("Location:add_product.php?failure");
        }
        else{
            header("Location:add_product.php?inserted");
        }
    }
?>
<?php
    if(isset($_GET["inserted"])){
        echo"<h2>Thêm sản phẩm thành công</h2>";
    }
?>

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="lbltitle">
            <label>Tên sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Mô tả sản phẩm</label>
        </div>
        <div class="lblinput">
            <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?>" ></textarea>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Số lượng sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtsl" value="<?php echo isset($_POST["txtsl"]) ? $_POST["txtsl"] : "" ; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Giá bán</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtgia" value="<?php echo isset($_POST["txtgia"]) ? $_POST["txtgia"] : "" ; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Chọn loại sản phẩm</label>
        </div>
        <div class="lblinput">
            <select name="txtCateID">
                <option value="" selected>--Chọn loại--</option>
                <?php
                    $cates=Category::list_category();
                    foreach($cateID as $item){
                        echo "<option value=".$item['CateID'].">".$item['CategoryName']."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="lbltitle">
            <label>Đường dẫn hình</label>
        </div>
        <div class="lblinput">
            <input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG"/>
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name ="btnsubmit" value="Thêm sản phẩm"/>
        </div>
    </div>
</form>
<?php include_once("footer.php");?>