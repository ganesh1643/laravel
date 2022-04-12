<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
      <h2 style="text-align: center;">Laravel Project Register</h2>
      @if($message = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
      @endif
      <form method="post" action="{{url('/store')}}">
        {{csrf_field()}}
      <div class="form-group">
        <label>Full Name : </label>
        <input type="text" name="fullname" class="form-control">
        <input type="hidden" name="token" class="form-control" value="{{csrf_token()}}">
      </div>
      <div class="form-group">
        <label>Email : </label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label>Password : </label>
        <input type="password" name="password" class="form-control">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Register</button>
      <p>Already have an account <a href="{{url('/main')}}">Login Here</a></p>
    </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>
