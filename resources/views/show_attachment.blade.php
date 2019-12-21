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


                @auth
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
                @endauth

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
                <h5 class="card-header "   style="background-color: #5c965c; color: white;">{{$menu->name}} @auth <a href="#" data-toggle="modal" data-target="#action{{$menu->id}}"> &#9998;</a> @endauth</h5>
                @auth
                <div class="modal fade" id="action{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$menu->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <!-- card sub menu edit button and action-->

                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#submenu_edit{{$menu->id}}">edit</button>

                                    </div>



                                    <div class="modal fade" id="submenu_edit{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit menu Name</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="{{route('menus.update',$menu)}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}

                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control"  name="card_name" value="{{$menu->name}}" placeholder="name">

                                                        </div>
                                                        <button type="submit" class="btn btn-success">Update</button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!--card sub menu delete button and action-->
                                    <div class="col">
                                        <form action="{{route('menus.destroy',$menu)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}

                                            <button type="submit" class="btn  btn-danger ">Delete</button>

                                        </form>
                                    </div>

                                    <div class="col">
                                        <div class="btn-group " role="group" aria-label="First group">
                                            <a type="button" href="{{route('attachment_form',[$menu,'form_type'=>'link'])}}" class="btn btn-secondary">Add Hyperlink</a>
                                            <a type="button" href="{{route('attachment_form',[$menu,'form_type'=>'file'])}}" class="btn btn-secondary">Add image/pdf</a>
                                            <a type="button" href="{{route('attachment_form',[$menu,'form_type'=>'page'])}}" class="btn btn-secondary">Add Page</a>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @endauth


                <div class="card-body badge-light">

                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th scope="col">ক্রমিক নং</th>
                            <th scope="col">টাইটেল</th>
                            <th scope="col">সংযুক্তি</th>
                            <th scope="col">হালনাগাদ</th>

                          @auth <th scope="col">অ্যাকশন</th> @endauth
                        </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                        @foreach($attachments as $attachment)
                          @if($attachment->type=='link')
                              @php($link=$attachment->link)
                            <tr>
                                <td scope="row">{{$count++}}</td>
                                <td><a href="{{$link->hyperlink}}" target="_blank">{{$link->text_to_display}}</a></td>
                                <td><a href="{{$link->hyperlink}}" target="_blank">Click here</a></td>
                                <td>{{$attachment->updated_at}}</td>
                     @auth
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{route('attachment_edit',['id'=>$link->id,'form_type'=>$attachment->type])}}" type="button" class="btn btn-success btn-sm">Edit</a>

                                        </div>

                                        <div class="col">

                                            <form action="{{route('link.destroy',$link)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                @endauth



                          @elseif($attachment->type=='file')
                              @php($file=$attachment->file)
                              <tr>
                                  <td scope="row">{{$count++}}</td>
                                  <td><a href="{{"../".$file->path}}" target="_blank">{{$file->title}}</a></td>
                                  @if($file->mime_type=='application/pdf')
                                      <td><a href="{{"../".$file->path}}" target="_blank"><img src="../images/pdf.png" width="50" height="50"></a></td>
                                  @else
                                      <td><a href="{{"../".$file->path}}" target="_blank"><img src="{{"../".$file->path}}" width="50" height="50"></a></td>
                                  @endif

                                  <td>{{$attachment->updated_at}}</td>


                                  @auth
                                  <td>

                                      <div class="row">
                                          <div class="col-3">
                                              <a href="{{route('attachment_edit',['id'=>$file->id,'form_type'=>$attachment->type])}}" type="button" class="btn btn-success btn-sm">Edit</a>

                                          </div>

                                          <div class="col">

                                              <form action="{{route('file.destroy',$file)}}" method="POST">
                                                  {{csrf_field()}}
                                                  {{method_field('DELETE')}}

                                                  <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                              </form>
                                          </div>
                                      </div>
                                  </td>

                                  @endauth

                              </tr>

                          @elseif($attachment->type=='page')
                              @php($page=$attachment->page)
                              <tr>
                                  <td scope="row">{{$count++}}</td>
                                  <td> <a href="{{route('page',(object)$page)}}" target="_blank">{{$page['title']}}</a></td>
                                  <td><a href="{{route('page',(object)$page)}}" target="_blank">Visit Page</a></td>
                                  <td>{{$attachment->updated_at}}</td>

                            @auth
                                  <td>
                                      <div class="row">
                                          <div class="col-3">
                                              <a href="{{route('attachment_edit',['id'=>$page['id'],'form_type'=>$attachment->type])}}" type="button" class="btn btn-success btn-sm">Edit</a>

                                          </div>

                                          <div class="col">

                                              <form action="{{route('page.destroy',$page)}}" method="POST">
                                                  {{csrf_field()}}
                                                  {{method_field('DELETE')}}

                                                  <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                              </form>
                                          </div>
                                      </div>

                                  </td>
                                  @endauth

                              </tr>

                          @endif


                            @endforeach


                        </tbody>
                    </table>






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