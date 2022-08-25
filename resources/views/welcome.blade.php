<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Try Google Drive Upload</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-secondary text-white" >

      <div class="container mt-5 text-white"">
        <h1>Buat Create Folder </h1>

        <form action="create-sub-dir" method="get">
          @csrf
          <div class="row g-3 mb-4">
            <input type="text" class="form-control" placeholder="directory..." name="directory">

            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Folder Sub</label>
              <input type="text" class="form-control"  placeholder="Folder Sub" name="subDirectorySec">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>


        <br>
        <br>


        <h1>Upload File Berdasarkan Folder Yang Ingin Dicari</h1>

        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="directory" placeholder="Input folders...">
            <br />
            <input type="text" class="form-control" name="subDirectorySec" placeholder="Input Sub Dir...">
            <br />
            <input type="file" class="form-control" name="thing" id="">
            <br>
            <input name="ok" type="submit" value="submit" class="btn btn-success">
        </form>



      </div>

        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

</html>