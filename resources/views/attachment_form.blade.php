<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>





    <title>{{$menu->name}}</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src={{\Illuminate\Support\Facades\URL::to('tinymce_5.1.4\tinymce\js\tinymce\tinymce.min.js')}} ></script>

</head>

<body >

<div class="container">

    <nav class="navbar navbar-dark mb-2 " style="background-color: #413463;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{route('public')}}">
                        <img alt="logo" src="../../images/logo.png">
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
                    <img src="../../{{$slider->path}}" class="d-block w-100 " height="300" alt="{{$slider->title}}">
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




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  ml-3">
                    <a class="nav-link" href="{{route('public')}}" style="color:green">&#x1F3E0;হোম</a>
                </li>


                @foreach($global_menus as $global_menu)
                    @if($global_menu->location=='nav_link')
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="{{route('attachment.index',$global_menu)}}" style="color:green">{{$global_menu->name}}</a>
                        </li>




                    @endif
                @endforeach


                <li class="nav-item ml-3">
                    <a type="button" class="list-group-item list-group-item-action "  data-toggle="modal" data-target="#nav_link_card_add">&#x271A;</a>

                </li>



                <div class="modal fade" id="nav_link_card_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="form-inline" action="{{route('menus.store')}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="card_name" class="sr-only">card_name</label>
                                        <input type="text" class="form-control" id="card_name" name="card_name" value="{{old('card_name')}}" placeholder="Card name">
                                        <input type="text" hidden  name="location" value="nav_link">
                                        <input type="text" hidden  name="parent_id" value="-1">
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <li class="nav-item  ml-3">
                    <a class="nav-link" href="{{route('admin')}}" style="color:green">Admin Panel</a>
                </li>


            </ul>

        </div>
    </nav>

    <!-- Example single danger button -->

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


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header "   style="background-color: #5c965c; color: white;">{{$menu->name}}/attachment</h5>
                <div class="card-body badge-light">
                 @if($form_type=='link')



                        <form  action="{{route('attachment.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Hyperlink</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="hyperlink" placeholder="http://www.something.com" value="{{old('hyperlink')}}">
                                <input type="text" name="menu_id" value="{{$menu->id}}" hidden >
                                <input type="text" name="type" value="{{$form_type}}"  hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Text for display</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" name="text_for_display" placeholder="title" value="{{old('text_for_display')}}">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>


                 @elseif($form_type=='file')



                        <form action="{{route('attachment.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Add Image or PDF</label>
                                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1" value="{{old('file')}}">
                                <input type="text" name="menu_id" value="{{$menu->id}}" hidden >
                                <input type="text" name="type" value="{{$form_type}}"  hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Title</label>
                                <input type="text" class="form-control" name="title" id="exampleFormControlInput2" value="{{old('title')}}" placeholder="title">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>



                 @elseif($form_type=='page')

                        <script type="text/javascript">
                            tinymce.init({
                                selector: '#mytextarea',
                               // width: 600,
                               height: 500,
                                plugins: [
                                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                                    'table emoticons template paste help'
                                ],
                                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |' +
                                ' bullist numlist outdent indent | link image | print preview media fullpage | ' +
                                'forecolor backcolor emoticons | help',
                                menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
                                },
                                menubar: 'favs file edit view insert format tools table help',
                                content_css: 'css/content.css'
                            });
                        </script>
                        <form action="{{route('attachment.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Title</label>
                                <input type="text" class="form-control"  id="exampleFormControlInput2" name="title" placeholder="title">
                                <input type="text" name="menu_id" value="{{$menu->id}}" hidden >
                                <input type="text" name="type" value="{{$form_type}}"  hidden>
                            </div>
                            <div class="form-group">
                                <label for="mytextarea">Body</label>
                                <textarea name="body" class="form-control " id="mytextarea">{!! old('body') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>









                 @endif







            </div>
        </div>
    </div>

</div>











<div class="card text-center mt-3">

    <div class="card-body "  style="background-color: #5c965c; " >
        <h5 class="card-title">© 2019 All rights reserved</h5>
        <p class="card-text">
            Developed By Palash Chakraborty</p>

    </div>

</div>


<!---Modal for card entry-->

</body>
</html>