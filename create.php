<?php
include 'db.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    // $thumbnail = isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '';


    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO product VALUES (?, ?, ?)');
    $stmt->execute([$id, $nama, $harga]);
    // Output message
    $msg = 'Berhasil Ditambahkan!';
}
?>


<?=template_header()?>

<div class="col-md-12 mb-3">
    <h5><strong><i class="fa fa-pencil-square-o"></i>  Tambah Produk</strong></h5>
</div>

<form action="create.php" method="post">
<!-- thumbnail form -->
<!-- <div class="col-2">
    <label for="" class="col-form-label-sm">Thumbnail</label>
</div>
<div class="col-md-10">
    <div class="form-group form-group-md mb-3">
        <input class="form-control form-control-sm" id="formFileSm" type="file">
    </div>
</div> -->

<!-- title -->
<div class="col-2">
    <label for="nama" class="col-form-label-sm">Nama Produk *</label>
</div>
<div class="col-md-10">
    <input type="text" name="nama" id="nama" class="form-control form-control-sm mb-3" placeholder="Apa Nama Produkmu?" required>
</div>

<!-- release year -->
<div class="col-2">
    <label for="harga" class="col-form-label-sm">Harga</label>
</div>
<div class="col-md-10">
    <input type="number" name="harga" id="harga" class="form-control form-control-sm mb-3" placeholder="Berapaan?" required>
</div>

<div class="col-md-2"></div>
<div class="col-md-10">
    <input type="submit" class="btn btn-primary btn-sm" value="Create">
    <a href="index.php" class="btn btn-secondary btn-sm"><i class="fa fa-angle-left"></i>  Back</a>
</div>

</form>
<?php if ($msg): ?>
<p><?=$msg?></p>
<?php endif; ?>


<?=template_footer()?>
