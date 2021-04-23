<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<title>login page</title>
<body>
<div class="log-form">
  <form method="POST" action="logauth">
    @method('POST')
    @csrf
    <input type="text" name="email" placeholder="email" />
    <input type="password" name="password" placeholder="password" />
    <button type="submit" class="btn">Login</button>
  </form>
</div>
</body>