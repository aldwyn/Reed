<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title></title>
</head>

<body>
  <h2>Sign-up!</h2>
  <div id="signup">
    <?= form_open('user/create'); ?>
      <input type="text" name="username" placeholder="Username" /><br/>
      <input type="email" name="email" placeholder="Email Address" /><br/>
      <input type="password" name="password" placeholder="Enter Password"/><br/>
      <input type="password" name="confirm_pw" placeholder="Confirm Password"/><br/>
      <input type="submit" />
    <?= form_close(); ?>
  </div>

  <h2>Log-in!</h2>
  <div id="login">
    <?= form_open('user/find'); ?>
      <input type="text" name="username" placeholder="Username" /><br/>
      <input type="password" name="password" placeholder="Enter Password" /><br/>
      <input type="submit" />
    <?= form_close(); ?>
  </div>
</body>

</html>