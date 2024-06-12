@include('admin.header')
@include('admin.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Paid Orders</h1>
                    <span>Total income this Day = &#8369; {{ $totalIncomeToday }}.00</span>
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
                              <th>Category</th>
                              <th>Amount</th>
                              <th>Quantity</th>
                              <th>Date Paid</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if ($paidOrders)
                          @foreach ($paidOrders as $paidOrder)
                          <tr>
                              <td>{{$paidOrder->table}}</td>
                              <td>{{$paidOrder->name}}</td>
                              <td>{{$paidOrder->category}}</td> 
                              <td>{{$paidOrder->amount}}</td>
                              <td>{{$paidOrder->quantity}}</td>
                              <td>{{$paidOrder->created_at->format('F j, Y')}}</td>
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

<!-- Ensure you have jQuery and Bootstrap JS included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@include('admin.footer')

