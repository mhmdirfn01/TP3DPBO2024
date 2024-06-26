<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$product = new Product($db);
$category = new Category($db);



// set page headers
$page_title = "Tambah Data";
include_once "layout_header.php";



// contents will be here
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>Lihat Data</a>";
echo "</div>";
?>



<!-- 'product' html form will be here -->

<!-- PHP post code will be here -->
<?php

if ($_POST) {

    // set product property values
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];

    // create the product
    if ($product->create()) {
        echo "<div class='alert alert-success'>Data telah ditambahkan.</div>";
    }

    // if unable to create the product, tell the user
    else {
        echo "<div class='alert alert-danger'>Gabisaaa.</div>";
    }
}
?>



<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nama</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Harga</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>

        <tr>
            <td>Ciri</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>Kategori</td>
            <td>


                <!-- categories from database will be here -->
                <?php
                // read the product categories from the database
                $stmt = $category->read();

                // put them in a select drop-down
                echo "<select class='form-control' name='category_id'>";
                echo "<option>Pilih kategori...</option>";

                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_category);
                    echo "<option value='{$id}'>{$name}</option>";
                }

                echo "</select>";
                ?>


            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Buat</button>
            </td>
        </tr>

    </table>
</form>



<?php
// footer
include_once "layout_footer.php";
?>