<?php
  session_start();
  require_once __DIR__ . '../data.php';
  require_once __DIR__ . '../functions.php';

  if (!empty($_POST)) {
    $fields = load($fields);
    if ($errors = validate($fields)) {
      $res = ['answer' => 'error', 'errors' => $errors];
    } else{
      $res = ['answer' => 'Ok', 'data' => $fields, 'captcha' => set_captcha()];
    }
    exit(json_encode($res));
  }
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head


  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">

          <form method="post" id = "form" class="row g-3 needs-validation" novalidate>

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="invalid-feedback">
                Введите имя.
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="invalid-feedback">
                Введите email.
            </div>

            <div class="form-group">
                <label for="adress">Адрес</label>
                <input type="text" class="form-control" id="adress" name="adress">
            </div>

            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="invalid-feedback">
                Введите телефон.
            </div>


            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="captcha" id = "label-captcha"><?= set_captcha()?></label>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>
            <div class="invalid-feedback">
                Введите капчу.
            </div>


            <div class="form-group form-check">
                <label class="form-check-label" for="agree">Соглашаюсь с обработкой персональных данных</label>
                <input name="agree" type="checkbox" class="form-check-input" id="agree" required>
            </div>
            <div class="invalid-feedback">
                Согласитесь с обработкой персональных данных
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mt-3" id="answer">

            </div>

            <div class="loader">
              <img src="animation.svg" alt="не нашел">
            </div>

          </form>

        </div>
      </div>
    </div>


    <script src="jquery-3.6.1.min.js"></script>
    <script src = 'main.js'></script>

  </body>
</html>
