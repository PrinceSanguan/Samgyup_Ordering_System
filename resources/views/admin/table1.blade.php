@include('admin.header')
@include('admin.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Table 1 Orders</h1>
                    <span>Running Balance = &#8369;{{ $runningBalance }}.00</span>
                </div>
                 <div class="col-sm-6 text-right"> <!-- Moved the button container to the right -->
                    <button class="btn btn-sm btn-success mt-2" onclick="payAllBalances()">Already Paid</button>
                    <button class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#productModal">Add Orders</button>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.content-header -->

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

    <!--Main Content Here --->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>quantity</th>
                              <th>Date ordered</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if ($table1Orders)
                          @foreach ($table1Orders as $table1Order)
                          <tr>
                              <td>{{$table1Order->name}}</td>
                              <td>{{$table1Order->category}}</td> 
                              <td>{{$table1Order->amount}}</td>
                              <td>{{$table1Order->quantity}}</td>
                              <td>{{$table1Order->created_at->format('F j, Y g:ia')}}</td>
                              <td>{{$table1Order->status}}</td>
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

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024.</strong> Dads Burger & House of Unlimited.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>
<!-- Main Footer -->

<!-- The Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.addOrder') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <label>Table Name</label>
                        <input type="text" class="form-control" name="table" value="1" readonly>
                    </div>

                    <div class="form-group">
                        <label>What unli did they avail?</label>
                        <select class="form-control" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Unli Samgyup 199">Unli Samgyup 199</option>
                            <option value="Unli Samgyup 219">Unli Samgyup 219</option>
                            <option value="Unli Samgyup 299">Unli Samgyup 299</option>
                            <option value="Unli Wings 289">Unli Wings 289</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="amount" >
                    </div>

                    <div class="form-group">
                        <label>How many person avail the Unli?</label>
                        <input type="number" class="form-control" name="quantity" >
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
  <!-- The Modal -->

<script>
    // Function to handle the "Pay All" button click
    function payAllBalances() {
        if (confirm('Is this already paid?')) {
            fetch(`/admin/table1/paidorder`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('The customer is already paid.');
                    location.reload();
                } else {
                    alert('Failed to mark all balances as paid. Please try again later.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to mark all balances as paid. Please try again later.');
            });
        }
    }
</script>

<!-- Ensure you have jQuery and Bootstrap JS included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@include('admin.footer')

