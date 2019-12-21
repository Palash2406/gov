<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body class="container">


<nav class="navbar navbar-dark mb-2 " style="background-color: #413463;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="{{route('public')}}">
                    <img alt="logo" src="../images/logo.png">
                </a>
            </div>
            <div class="col-lg-4  mt-2">
                <a class="navbar-brand" href="{{route('public')}}" > <h2>চট্টগ্রাম বিভাগ</h2></a>

            </div>



        </div>


    </div>
</nav>

<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @php
        $counter=0;
        @endphp
        @foreach($sliders as $slider)
            <div class="carousel-item @if(++$counter==1) active @endif" data-interval="3000">
                <img src="../{{$slider->path}}" class="d-block w-100 " height="300" alt="{{$slider->title}}">
                <div class="carousel-caption d-none d-md-block">
                    <p>{{$slider->title}}</p>

                </div>
            </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



@if (session()->has('success'))
    <div class="alert alert-success mt-3">
        <ul>

            <li>{{ session()->get('success') }}</li>

        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Title" required value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1"></label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" value="{{old('file')}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


</body>
</html>