@include('admin.header')
@include('admin.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pending Orders</h1>
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
                                <th>Table</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Time of Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($pendingOrders)
                          @foreach ($pendingOrders as $pendingOrder)
                            <tr>
                                <td>Table #{{$pendingOrder->table}}</td>
                                <td>{{$pendingOrder->name}}</td>
                                <td>{{$pendingOrder->amount}}</td>
                                <td>{{$pendingOrder->quantity}}</td>
                                <td>{{$pendingOrder->category}}</td>
                                <td>{{ $pendingOrder->created_at->format('F j, Y g:ia') }}</td>
                                <td>{{$pendingOrder->status}}</td>
                                <td>
                                    <button class="btn btn-sm btn-success activate-btn" data-id=" {{ $pendingOrder->id }}">Delivered</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{-- {{ $datas->id }} --}}">Delete</button>
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

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024.</strong> Dads Burger & House of Unlimited.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>

<script>
    // Add an event listener to the "Delivered" button
document.addEventListener('DOMContentLoaded', function() {
    const deliveredButtons = document.querySelectorAll('.activate-btn');
    deliveredButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');
            updateOrderStatus(orderId);
        });
    });
});

// Function to send AJAX request to update order status
function updateOrderStatus(orderId) {
    fetch(`/admin/pending/${orderId}/updateStatus`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ status: 'delivered' }) // Assuming you only need to send the new status
    })
    .then(response => {
        if (response.ok) {
            alert('Order status updated successfully.');
            location.reload();
        } else {
            alert('Failed to update order status. Please try again later.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update order status. Please try again later.');
    });
}
</script>

<!-- Ensure you have jQuery and Bootstrap JS included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@include('admin.footer')
