@include('admin.header')
@include('admin.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div>
                <div class="col-sm-6 text-right"> <!-- Moved the button container to the right -->
                  <button class="btn btn-sm btn-info" id="" data-toggle="modal" data-target="#productModal" >Add Product</button>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!--Main Content Here --->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->

                @if(session('success'))
                <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 5000);
                </script>
                @endif

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Date Added</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if ($products)
                          @foreach ($products as $product)
                          <tr>
                              <td><img src="{{ asset('upload-image/' . $product->image) }}" alt="Featured Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->category }}</td> 
                              <td>{{ $product->amount ?? 'Unlimited' }}</td>
                              <td>{{ $product->created_at->format('F j, Y g:ia') }}</td>
                              <td>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $product->id }}">Delete</button>
                            </td>
                          </tr>
                      </tbody>
                        @endforeach  
                      @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!--/.Main Content Here--->
</div>
<!-- /.content-wrapper -->

<!-- The Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="productModalLabel">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.add_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                  </div>
                  <div class="form-group">
                      <label>Product Image</label>
                      <input type="file" class="form-control-file" name="file" required>
                  </div>
                  <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="category" required>
                          <option value="">Select Category</option>
                          <option value="Unli Samgyup 199">Unli Samgyup 199</option>
                          <option value="Unli Samgyup 219">Unli Samgyup 219</option>
                          <option value="Unli Samgyup 299">Unli Samgyup 299</option>
                          <option value="Unli Wings 289">Unli Wings 289</option>
                          <option value="Beverage">Beverage</option>
                          <option value="Chicken Wings">Chicken Wings</option>
                          <option value="Burger">Burger</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Amount</label>
                      <input type="number" class="form-control" name="amount" placeholder="If Unlimited dont put price">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>

      </div>
  </div>
</div>

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024.</strong> Dads Burger & House of Unlimited.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>

<script>
    $(document).ready(function() {
        // Event delegation for dynamically loaded elements
        $(document).on('click', '.delete-btn', function() {
            var productId = $(this).data('id'); // Change userId to productId for consistency
            $.ajax({
                type: 'POST',
                url: '/admin/product/' + productId + '/delete',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function(response) {
                    // Handle success response
                    alert('Product deleted successfully.');
                    location.reload(); // Refresh the page after successful deletion
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>

<!-- Ensure you have jQuery and Bootstrap JS included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@include('admin.footer')

