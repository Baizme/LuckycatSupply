<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
      body {
        background-color: #1e1e1e;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding-left: 350px;
      }
      .logo-container {
        display: flex;
      }
      .logo {
        margin-right: 75px;
      }
      .logo img {
        border-radius: 50%;
        max-width: 300px;
        height: auto;
      }
      .authentic-text {
        color: #7c43f8;
        font-size: 48px;
        font-weight: bold;
        margin-top: -25px;
      }
      .btn-primary {
        background-color: #7c43f8;
        border-color: #7c43f8;
        color: white;
        width: 225px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="logo-container">
        <div class="logo">
          <img src="images/luckycat_logo.jpg" alt="Luckycat Logo" />
        </div>
        <div class="text">
          <p class="mt-2 authentic-text">100%</p>
          <p class="authentic-text">Authentic</p>
          <p class="font-weight-bold">Dengan Harga Terbaik <span class="d-block">di Luckycatsupply</span></p>
          <a href="/login" class="btn btn-primary mt-2 align-self-start font-weight-bold">Let's Buy</a>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
