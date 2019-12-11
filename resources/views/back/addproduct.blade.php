@extends('back.main')
@section('addproduct')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#addproduct" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Add-product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#addcategory" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Add-category</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="addproduct" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-12">
                                            <!-- general form elements -->
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Add Product</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                @if(session('success'))

                                                    <div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Success!</strong> {{session('success')}}
                                                    </div>

                                                @endif
                                                @if(session('unsuccess'))

                                                    <div class="alert alert-danger alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Danger!</strong> {{session('unsuccess')}}
                                                    </div>

                                                @endif


                                                {{--<form role="form" id="addpro" method="post" action=""  enctype="multipart/form-data">--}}
                                                 {!! Form::open(['method'=>'post','files'=>true,'url'=>'','id'=>'addpro']) !!}
                                                    {!! csrf_field() !!}
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            {!! Form::label('','Name of product') !!}
                                                            <p style="color:red"> {{$errors->first('name')}}</p>
                                                       {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Name of product']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('','Description of product') !!}
                                                            <p style="color:red">{{$errors->first('description')}}</p>
                                                            {!! Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description of product','rows'=>5,'cols'=>4]) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('', 'Price of product', ['for' => 'price']) !!}
                                                            <p style="color:red">{{$errors->first('price')}}</p>
                                                        {!! Form::number('price','',['class'=>'form-control','placeholder'=>'Price of product']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                            {!! Form::label('', 'Quantity of product', ['for' => 'quantity']) !!}
                                                            <p style="color:red">{{$errors->first('price')}}</p>
                                                        {!! Form::number('quantity','',['class'=>'form-control','placeholder'=>'Quantity of product']) !!}
                                                        </div>
                                                        <div class="col-sm-6">
                                                            @php
                                                            $category_select=[];
                                                            foreach($categories as $category){

                                                                $category_select[$category->id]=$category->name;
                                                            }
                                                            @endphp
                                                            <div class="form-group">
                                                                {!! Form::label('','Category of product') !!}
                                                                 {!! Form::select('category',$category_select,'',['multiple'=>'true','class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <label for="customFile">Custom File</label> -->
                                                            {!! Form::label('','Image of product') !!}
                                                            <div class="custom-file">
                                                                <p style="color:red">{{$errors->first('image')}}</p>
                                                                {!! Form::file('image',['id'=>'customFile']) !!}

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="card-footer">
                                                        {!! Form::submit('Add Product',['class'=>'btn btn-primary']) !!}
                                                        {{--<button type="submit" class="btn btn-primary">Add product</button>--}}
                                                    </div>
                                                {!! Form::close() !!}
                                                {{--</form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                        <div class="tab-pane fade" id="addcategory" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-12">
                                            <!-- general form elements -->
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Add Category</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                @if(session('success'))

                                                    <div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Success!</strong> {{session('success')}}
                                                    </div>

                                                @endif
                                                @if(session('unsuccess'))

                                                    <div class="alert alert-danger alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Danger!</strong> {{session('unsuccess')}}
                                                    </div>

                                                @endif


                                                {{--<form role="form" id="addpro" method="post" action=""  enctype="multipart/form-data">--}}
                                                    {!! Form::open(['url'=>'','method'=>'post','id'=>'addcateg']) !!}
                                                    {!! csrf_field() !!}
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            {{--<label for="name">Name of product</label>--}}
                                                            {!! Form::label('','Name of category') !!}
                                                            <p style="color:red"> {{$errors->first('name')}}</p>
                                                            {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Name of product']) !!}
                                                            {{--<input type="text" class="form-control" name="name" placeholder="Name of product">--}}
                                                        </div>

                                                        <div class="form-group">
                                                            {{--<label for="name">Name of product</label>--}}
                                                            {!! Form::label('','Description of category') !!}
                                                            <p style="color:red"> {{$errors->first('description')}}</p>
                                                            {!! Form::text('description','',['class'=>'form-control','placeholder'=>'Description of category']) !!}
                                                            {{--<input type="text" class="form-control" name="name" placeholder="Name of product">--}}
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="card-footer">
                                                        {{--<button type="submit" class="btn btn-primary">Add product</button>--}}
                                                        {!! Form::submit('Add category',['class'=>'btn btn-primary']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                {{--</form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
 </div>



    @endsection
@section('js')

    <script src="/back/plugins/jquery/jquery.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){


    $('form').submit(function(e){

        var post_url='';
        var form_name='';
    e.preventDefault();
    // $form_name=$('input[name=image]').val();
    form_name=$(this).closest("form").attr('id');
    if(form_name=='addpro'){
        post_url='addproduct';
    }else{
        post_url='addcategory';
    }
    var datas=new FormData(this);
    $.ajax({
    type:'POST',
    url:'/admin/'+post_url,
    data:datas,
        beforeSend:function(){
            let timerInterval
            Swal.fire({
                title: 'Auto close alert!',
                html: 'Process is ongoing,please wait little bit.. <b></b>.',
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    })
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            });
        },
    success:function (result) {
        Swal.fire(
            'Good job!',
            'Process is completed successuflly!',
            'success'
        )
    },
    error:function(result){
        Swal.fire(
            'Error!',
            'There is some problem to add!',
            'error'
        )
        },
        cache: false,
        contentType: false,
        processData: false
    })
    })

    })
</script>
    @endsection
@section('css')

    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    @endsection