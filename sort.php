<?php
if (isset($_POST['sort'])) :
    require_once 'db.php';
    $sort = $_POST['sort'];

    $query = mysqli_query($database, "SELECT * FROM photocard ORDER BY namaPhoto " . $sort . "");
    while ($row = mysqli_fetch_object($query)) :
?>
        <div class="col-sm">
            <div class="card" style="width: 15rem">
                <img src="<?= $row->gambar; ?>" class="card-img-top" alt="" />
                <div class="card-body">
                  <h5 class="card-title"><?= $row->namaPhoto; ?></h5>
                  <div class="card-title text-secondary">Rp <?= $row->harga; ?></div>
                      <p class="card-text"> <?= $row->deskripsi; ?></p>
    									<a href="#" class="btn btn-outline-info btn-sm mb-3">Buy Now</a>
    									<a href="#" class="btn btn-outline-primary btn-sm float-end ms-1"><i class="bi bi-pencil-square"></i></a>
    									<a href="#" class="btn btn-outline-secondary btn-sm float-end "><i class="bi bi-trash3"></i></a>
                  </div>
                </div>
              </div>

<?php
    endwhile;
endif;
?>
