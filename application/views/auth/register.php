<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

<style>
*{box-sizing:border-box;font-family:'Open Sans',sans-serif}

body{
  background:
    linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
    url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1600&q=80');
  background-size:cover;
  background-position:center;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
  margin:0;
}

.card{
  background:#fff;
  width:320px;
  padding:30px;
  border-radius:10px;
  box-shadow:0 10px 25px rgba(0,0,0,.2);
}

h2{text-align:center;margin-bottom:20px}

input{
  width:100%;
  padding:10px;
  margin:10px 0;
  border-radius:5px;
  border:1px solid #ccc;
}

button{
  width:100%;
  padding:10px;
  background:#ff4b2b;
  color:#fff;
  border:none;
  border-radius:20px;
  cursor:pointer;
  margin-top:10px;
}

p{
  text-align:center;
  margin-top:15px;
  font-size:14px;
}

a{
  color:#ff4b2b;
  text-decoration:none;
}
</style>
</head>

<body>

<div class="card">
  <h2>Register</h2>

  <form action="<?php echo base_url('auth/register'); ?>" method="post">
    <input type="text" name="username" placeholder="Full Name" value="<?= set_value('username') ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
    <input type="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" required>
    <button type="submit">Register</button>
  </form>

  <p>Sudah punya akun? <a href="<?php echo base_url('auth/login'); ?>">Login</a></p>
</div>

</body>
</html>
