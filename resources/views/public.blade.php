<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>





    <title>চট্টগ্রাম বিভাগ</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</head>

<body >

<div class="container">

    <nav class="navbar navbar-dark mb-2 " style="background-color: #413463;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{route('public')}}">
                        <img alt="logo" src="images/logo.png">
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
                    <img src="{{$slider->path}}" class="d-block w-100 " height="300" alt="{{$slider->title}}">
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
                <li class="nav-item  ml-3">
                    <a class="nav-link" href="{{route('slider.index')}}" style="color:green">Slider Settings</a>
                </li>
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
       <div class="col-8">
       @foreach($global_menus as $global_menu)
           @if($global_menu->location=='body')


                   <div class="card mt-3">
                       <h5 class="card-header" style="background-color: #5c965c; color: white;">{{$global_menu->name}}</h5>
                       @php
                          $attachments=$global_menu->attachment()->orderBy('created_at','desc')->take(2)->get();
                       @endphp
                       <div class="card-body badge-light">

                     @foreach($attachments as $attachment)
                               @if($attachment!=null&&$attachment->type=='link')
                               @php($link=$attachment->link)
                               <ul>
                                   <li class="mt-3">
                                       <a href="{{$link->hyperlink}}" target="_blank">{{$link->text_to_display}}</a>
                                   </li>
                               </ul>




                           @elseif($attachment!=null&&$attachment->type=='file')
                               @php($file=$attachment->file)

                               <ul>
                                   <li>
                                       <a href="{{$file->path}}" target="_blank">{{$file->title}}</a>
                                   </li>
                               </ul>



                           @elseif($attachment!=null&&$attachment->type=='page')
                               @php($page=$attachment->page)

                               <ul>
                                   <li>
                                       <a href="{{route('page',(object)$page)}}" target="_blank">{{$page['title']}}</a>
                                   </li>
                               </ul>


                           @endif
                         @endforeach






                           <h5 class="card-title"></h5>
                           <p class="card-text"></p>
                           <p align="right"><a  class="btn btn-sm btn-success" href="{{route('attachment.index',$global_menu)}}" > সকল</a></p>

                       </div>
                   </div>
           @endif
       @endforeach

    @auth
           <div class="card mt-3">

               <div class="card-body">
                   <button type="button" class="btn btn-outline-success btn-sm "  data-toggle="modal" data-target="#body_card_add">Add Card</button>

               </div>
           </div>





           <div class="modal fade" id="body_card_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Add Card</h5>
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
                                   <input type="text" hidden  name="location" value="body">
                                   <input type="text" hidden  name="parent_id" value="-1">
                               </div>
                               <button type="submit" class="btn btn-success">Save</button>

                           </form>
                       </div>

                   </div>
               </div>
           </div>

           @endauth


       </div>



       <div class="col-4">
           <div class="list-group mt-3">
               <a href="#" class="list-group-item list-group-item-action active" style="background-color: #5c965c; color: white;" >
                   Links
               </a>

               @foreach($global_menus as $global_menu)
                   @if($global_menu->location=='side_link')


                               <a href="{{route('attachment.index',$global_menu)}}" class="list-group-item list-group-item-action" style="color: blue">{{$global_menu->name}}</a>



                   @endif
               @endforeach

       @auth
               <a type="button" class="list-group-item list-group-item-action "  data-toggle="modal" data-target="#side_link_card_add">&#x271A;</a>

               <div class="modal fade" id="side_link_card_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                       <input type="text" hidden  name="location" value="side_link">
                                       <input type="text" hidden  name="parent_id" value="-1">
                                   </div>
                                   <button type="submit" class="btn btn-success">Save</button>

                               </form>
                           </div>

                       </div>
                   </div>
               </div>
       @endauth
               <a href="#" class="list-group-item list-group-item-action "  >
                   জাতীয় সংগীত

                   <audio controls="" style="width:100%">
                       <source src="https://cabinet.portal.gov.bd/sites/default/files/files/cabinet.portal.gov.bd/page/e5f25d4e_f0a7_4b2a_a07c_3ec69a793516/bd_national_anthem.mp3" type="audio/mp3">
                   </audio>
               </a>




           </div>


       </div>

   </div>




<div class="card mt-3">
    <div class="card-header" style="background-color: #5c965c; color: white;">
        Featured
    </div>
    <div class="card-body " >
        <div class="row">

            @foreach($global_menus as $global_menu)
                @if($global_menu->location=='card')
                <div class="col-sm-4 ">
                    <div class="card m-3">
                        <div class="card-body badge-light">
                            <h5 class="card-title">{{$global_menu->name}}</h5>
                                 <ul>

                                      @php($sub_menus=App\Menu::find($global_menu->id)->children)

                                         @foreach($sub_menus as $sub_menu )
                                              <li>
                                                 <a href="{{route('attachment.index',$sub_menu)}}" style="color: black"> {{$sub_menu->name}}</a>
                                              </li>

                                         <!-- Modal for sub menu action -->



                                         @endforeach

                                 </ul>




                            @auth
                            <div class="row">

                                <div class="col">

                                    <!--card menu edit button and action-->

                                    <a href="#" class=" btn btn-sm btn-outline-success"  data-toggle="modal" data-target="#card_{{$global_menu->id}}">edit</a>
                                    <div class="modal fade" id="card_{{$global_menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Card Name</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="{{route('menus.update',$global_menu)}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}

                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control" id="card_name" name="card_name" value="{{$global_menu->name}}" placeholder="Card name">

                                                        </div>
                                                        <button type="submit" class="btn btn-success">Update</button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!--sub menu edit button and action-->

                                <div class="col">
                                    <form action="{{route('menus.destroy',$global_menu)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                        <button type="submit" class="btn btn-sm btn-outline-danger ">Delete</button>

                                    </form>
                                </div>

                                <div class="col">

                                    <button  class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#submenu_{{$global_menu->id}}">Add Submenu</button>
                                    <div class="modal fade" id="submenu_{{$global_menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Sub menu</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="{{route('menus.store')}}" method="post">
                                                        {{ csrf_field() }}


                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control" id="menu_name" name="card_name" value="{{old('card_name')}}" placeholder="Card name">
                                                            <input type="text" hidden  name="parent_id" value="{{$global_menu->id}}">
                                                            <input type="text" hidden  name="location" value="-1">
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Add</button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endauth





                        </div>
                    </div>
                </div>



                @endif
            @endforeach


            @auth

                <div class="col-sm-4 ">
                    <div class="card m-3">
                        <div class="card-body badge-light">
                            <button type="button" class="btn btn-outline-success btn-sm "  data-toggle="modal" data-target="#exampleModalCenter">Add Card</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Card</h5>
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
                                        <input type="text" hidden  name="location" value="card">
                                        <input type="text" hidden  name="parent_id" value="-1">
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                @endauth



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




</div>
</body>
</html>