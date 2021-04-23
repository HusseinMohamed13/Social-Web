<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="top-nav">
<div class="search-form">
  <form method="post" action="follow">
    @method('POST')
    @csrf
    <input type="text" name="username" placeholder="username" > </input>
    <button type="submit" class="btn">Follow</button>
  </form>
</div>
<div class="createpost">
    <form method="post" action="post">
      @method('POST')
      @csrf
      <input type="text" class="Text" placeholder="What's on your mind ?" name="content" size="70"> </input>
      <button type="submit" name="btnpost">Post</button>
    </form>
    </div>
</div>


<div class="row">
  <div class="leftcolumn">
    <?php foreach($posts as $post) : ?>
    
    <div class="card">
      <h2>{{ $post->username }}</h2>
      <h5>{{ $post->created_at }}</h5>
      <p>{{ $post->content }}</p>
    </div>

    <?php endforeach?> 
  </div>
</div>

</body>
</html>