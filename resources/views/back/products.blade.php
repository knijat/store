@extends('back.main')
@section('products')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>

                               @foreach($products as $product)
                                <tr>
                                    <td>{{$product['id']}}</td>
                                    <td class="w-25"> <img src="/images/{{$product['image']}}" class="img-fluid img-thumbnail" alt="{{$product['image']}}" width="100" height="100"></td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['id_category']}}</td>
                                    <td>{{$product['price']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>show</td>
                                    <td>edit</td>

                                </tr>
                                   @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
    @endsection
@section('js')
    <script type="text/javascript">
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    @endsection
@section('css')
    <link rel="stylesheet" href="/back/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection