<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>3B Depom</title>
  </head>
  <body style="background-color:#bfbfbf">
    <header>
    <?php
    include 'navbar.php';
    ?>
    </header>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Tasarım Ekle</h1>
                <form method="POST" action="./upload.php" autocomplete="on" enctype="multipart/form-data">
                    <input required type="text" class="form-control" name="name" placeholder="Tasarım Adı Nedir?"><br>
                    <input required type="text" class="form-control" name="description" placeholder="Tasarım Açıklaması"><br>
                    <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
                    <div class="form-group col-md-4">
                    <select id="category_id" class="form-control" required name="category_id">
                    <option value="" disabled selected hidden>Lütfen Kategori Seçiniz</option>
                    <option value="1" >Oyuncak</option>
                    </select>
                    </div>
                    Tasarım Dosyası(stl):
                    <input type="file" class="form-control" name="File" id="File" value="Tasarım dosyası(stl)"><br>
                    Tasarım Görseli:
                    <input type="file" class="form-control" name="Image" id="Image" value="Tasarım görseli"><br>
                    <input class="btn btn-primary btn-dark" type="submit" name="submit" value="Yeni Tasarım Ekle" />
                </form>
            </div>
            </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>