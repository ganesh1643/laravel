<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-sm-12">
    	<h1 style="text-align: center;">Edit Product</h1>
      @if(isset(Auth::user()->email))
      <div class="alert alert-success success-block" style="text-align: center;">
        <strong>
             Welcome : {{ Auth::user()->name }} | {{ Auth::user()->email }}<br> 
            <a href="{{url('/main/logout')}}">Logout</a>
        </strong>
      </div>
      @else
        <script>window.location="/main";</script>
      @endif

      @if($message = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
     <!--  <h2>Edit Product</h2> -->
       <form action="{{url('/update-product')}}" method="post">
          {{csrf_field()}}
          <label>Product Name : </label>
          <input type="text" class="form-control" name="product_name" value="<?php echo $product->product_name; ?>" required>
          <input type="hidden" class="form-control" name="product_id" value="<?php echo $product->id; ?>" required>
          <br>
          <label>Product Price : </label>
          <input type="text" class="form-control" name="product_price" value="<?php echo $product->product_price; ?>" required>
          <br>
          <label>Product Quantity : </label>
          <input type="text" class="form-control" name="product_quantity" value="<?php echo $product->product_quantity; ?>" required>
          <br>
          <label>Status : </label>
          <select name="status" class="form-control" required>
            <option value="">---Select Status---</option>
            <option value="1" <?php if($product->status == '1'){echo'selected';} ?>>Active</option>
            <option value="0" <?php if($product->status == '0'){echo'selected';} ?>>Inactive</option>
          </select>
          <br>
          <button class="btn btn-success" type="submit">Update Product</button>
        </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>

</body>
</html>
