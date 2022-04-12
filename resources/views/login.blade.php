<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h2 style="text-align: center;">Laravel Project Login</h2>

      @if(isset(Auth::user()->email))
        <script>window.location="/main/successlogin";</script>
      @endif

      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
      @endif

      <form method="post" action="{{url('/main/checklogin')}}">
        {{csrf_field()}}
      <div class="form-group">
        <label>Email : </label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label>Password : </label>
        <input type="password" name="password" class="form-control">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
      <p>Don't have an account <a href="{{url('/register')}}">Register Here</a></p>
    </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>
