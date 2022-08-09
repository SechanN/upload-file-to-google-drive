<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Try Google Drive Upload</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="thing" id="">
            <br>
            <input name="ok" type="submit" value="submit">
        </form>


  </body>

</html>