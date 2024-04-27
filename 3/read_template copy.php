<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate product object
$product = new Product($db);
$category = new Category($db);

// get search term and maximum price from URL query string
$search_term = isset($_GET['s']) ? $_GET['s'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// search the products
$stmt = $product->search($search_term, $max_price);
$num = $stmt->rowCount();

// set page headers
$page_title = "Search Products";
include_once "layout_header.php";

// display the search form
echo "<form role='search' action='search.php'>";
echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
$search_value = isset($search_term) ? "value='{$search_term}'" : "";
echo "<input type='text' class='form-control' placeholder='Ketik nama hewan' name='s' id='srch-term' required {$search_value} />";
echo "<input type='text' class='form-control' placeholder='Harga maksimum' name='max_price' value='{$max_price}' />";
echo "<div class='input-group-btn'>";
echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
echo "</div>";
echo "</div>";
echo "</form>";

// display the products if there are any
if ($num > 0) {

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Price</th>";
    echo "<th>Description</th>";
    echo "<th>Category</th>";
    echo "<th>Actions</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$price}</td>";
        echo "<td>{$description}</td>";
        echo "<td>";
        $category->id = $category_id;
        $category->readName();
        echo $category->name;
        echo "</td>";

        echo "<td>";

        // read product button
        echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>";
        echo "<span class='glyphicon glyphicon-list'></span> Lihat Hewan";
        echo "</a>";

        // edit product button
        echo "<a href='update_product.php?id={$id}' class='btn btn-info left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Ubah";
        echo "</a>";

        // delete product button
        echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Hapus";
        echo "</a>";

        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    // paging buttons
    include_once 'paging.php';
} else {
    echo "<div class='alert alert-danger'>yahh hewannya gada yang kek gituu.</div>";
}

// footer
include_once "layout_footer.php";
?>
