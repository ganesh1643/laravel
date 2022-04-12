<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
    	<h1 style="text-align: center;">Welcome To Dashboard</h1>
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
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h2>Product List</h2>

      <!-- Create button to add product -->
      <button class="btn btn-info add_product">Add Product</button>

      <!-- Product Table -->
<table class="table table-striped table-bordered">
    <thead class="btn-primary">
      <tr>
        <th>S.No</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; 
      foreach ($products as $product) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $product->product_name; ?></td>
        <td><?php echo $product->product_price; ?></td>
        <td><?php echo $product->product_quantity; ?></td>
        <td>
<?php if($product->status == '1'){ ?> 
  <a href="{{url('/status-update',$product->id)}}" class="btn btn-success">Active</a>
<?php }else{ ?> 
  <a href="{{url('/status-update',$product->id)}}" class="btn btn-danger">Inactive</a>
<?php } ?>
        </td>
        <td>
          <a href="{{url('/edit-product',$product->id)}}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
       <?php $i++; } ?>
    </tbody>
</table>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>

<!-- Open Modal Popup Code Start Here-->
<div id="add_modal_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Product</h4>
      </div>
      <!-- Add Product Form -->
      <form method="post" action="{{url('/add-product')}}">
        {{csrf_field()}}
        <div class="modal-body">
          <label>Product Name : </label>
          <input type="text" class="form-control" name="product_name" required>
          <br>
          <label>Product Price : </label>
          <input type="text" class="form-control" name="product_price" required>
          <br>
          <label>Product Quantity : </label>
          <input type="text" class="form-control" name="product_quantity" required>
          <br>
          <label>Status : </label>
          <select name="status" class="form-control" required>
            <option value="">---Select Status---</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button class="btn btn-success" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Open Modal Popup Code End Here-->


<script type="text/javascript">
  $(document).ready(function(){

      //Create jquery code to open modal popup
      $('.add_product').click(function(){
          $('#add_modal_popup').modal('show');
      });

  });
</script>
</body>
</html>
