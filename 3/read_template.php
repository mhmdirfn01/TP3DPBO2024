<?php
$search_value=isset($search_term) ? "value='{$search_term}'" : "";
// search form
?>

<form role='search' action='search.php'>
    <div class='input-group col-md-3 pull-left margin-right-1em'>

        <input type='text' class='form-control' placeholder='Ketik nama hewan' name='s' id='srch-term' required <?= $search_value ?> />
        <div class='input-group-btn'>
            <button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
        </div>
    </div>
</form>

<?php 
// create product button
echo "<div class='right-button-margin'>";
    echo "<a href='create_product.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Tambah Data";
    echo "</a>";
echo "</div>";
 
// display the products if there are any
if($total_rows>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Kode</th>";
            echo "<th>Hewan</th>";
            echo "<th>Harga</th>";
            echo "<th>Ciri</th>";
            echo "<th>Kategori</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$id}</td>";
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
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>yahh hewannya gada yang kek gituu.</div>";
}
?>