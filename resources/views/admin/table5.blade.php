@include('admin.header')
@include('admin.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Table 5 Orders</h1>
                    <span>Running Balance = &#8369;{{ $runningBalance }}.00</span>
                </div>
                <div class="col-sm-6 text-right"> <!-- Moved the button container to the right -->
                    <button class="btn btn-sm btn-success mt-2" onclick="payAllBalances()">Already Paid</button>
                    <button class="btn btn-sm btn-danger mt-2" onclick="addOrders()">Add Orders</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

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
                        @if ($table5Orders)
                          @foreach ($table5Orders as $table5Order)
                          <tr>
                              <td>{{$table5Order->name}}</td>
                              <td>{{$table5Order->category}}</td> 
                              <td>{{$table5Order->amount}}</td>
                              <td>{{$table5Order->quantity}}</td>
                              <td>{{$table5Order->created_at->format('F j, Y g:ia')}}</td>
                              <td>{{$table5Order->status}}</td>
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

<script>
    // Function to handle the "Pay All" button click
    function payAllBalances() {
        if (confirm('Is this already paid?')) {
            fetch(`/admin/table5/paidorder`, {
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