<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="custom.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>202410101045_Pertemuan3</title>
</head>

<body>
  <div class="container">
    <h1 class="text-dark text-center">POCA SHOP</h1>

    <button type="button" class="btn btn-primary float-end"><i class="fas fa-plus-circle"></i> Create</button>

    <div class="row">
      <div class="col-sm input-group mb-3">
        <input type="text" class="form-control" id="search" placeholder="Search photocard..." aria-label="Recipient's username" aria-describedby="button-addon2" />
        <span class="input-group-text"><i class="bi bi-search-heart"></i></span>
      </div>
      <div class="col-sm input-group mb-3">
        <select class="form-select" id="filter" aria-label="Default select example">
          <option class="text-muted" selected>Filter Harga</option>
          <option value="0 AND 80000">0 - 80.000</option>
          <option value="80000 AND 150000">80.000 - 150.000</option>
          <option value="150000 AND 300000">150.000 - 300.000</option>
        </select>
      </div>
      <div class="col-sm input-group mb-3">
        <select class="form-select" id="sort" aria-label="Default select example">
          <option value="ASC">Sort by Name Ascending</option>
          <option value="DESC">Sort by Name Descending</option>
        </select>
      </div>
    </div>
    <div class="row" id="content">
      <?php
      require_once 'db.php';
      $query = mysqli_query($database, "SELECT * FROM photocard");
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
      <?php endwhile; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

  <script type="text/javascript">

    $(document).ready(function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      $('#filter').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'filter.php',
          data: {
            filter: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      $('#sort').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'sort.php',
          data: {
            sort: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });
    });
  </script>
</body>

</html>
