<?php /* C:\xampp\htdocs\gov\resources\views/public.blade.php */ ?>
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
                    <a href="<?php echo e(route('public')); ?>">
                        <img alt="logo" src="images/logo.png">
                    </a>
                </div>
                <div class="col-lg-4  mt-2">
                    <a class="navbar-brand" href="<?php echo e(route('public')); ?>" > <h2>চট্টগ্রাম বিভাগ</h2></a>

                </div>



            </div>


        </div>
    </nav>



    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $counter=0;
            ?>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if(++$counter==1): ?> active <?php endif; ?>" data-interval="3000">
                    <img src="<?php echo e($slider->path); ?>" class="d-block w-100 " height="300" alt="<?php echo e($slider->title); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <p><?php echo e($slider->title); ?></p>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                    <a class="nav-link" href="<?php echo e(route('public')); ?>" style="color:green">&#x1F3E0;হোম</a>
                </li>



                <?php $__currentLoopData = $global_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $global_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($global_menu->location=='nav_link'): ?>
                        <li class="nav-item ml-3">
                             <a class="nav-link" href="<?php echo e(route('attachment.index',$global_menu)); ?>" style="color:green"><?php echo e($global_menu->name); ?></a>
                        </li>




                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(auth()->guard()->check()): ?>
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

                                    <form class="form-inline" action="<?php echo e(route('menus.store')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="card_name" class="sr-only">card_name</label>
                                            <input type="text" class="form-control" id="card_name" name="card_name" value="<?php echo e(old('card_name')); ?>" placeholder="Card name">
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
                    <a class="nav-link" href="<?php echo e(route('slider.index')); ?>" style="color:green">Slider Settings</a>
                </li>
                <?php endif; ?>
                <li class="nav-item  ml-3">
                    <a class="nav-link" href="<?php echo e(route('admin')); ?>" style="color:green">Admin Panel</a>
                </li>




            </ul>

        </div>
    </nav>

    <!-- Example single danger button -->

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success mt-3">
            <ul>

                    <li><?php echo e(session()->get('success')); ?></li>

            </ul>
        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger mt-3">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>





   <div class="row mt-3">
       <div class="col-8">
       <?php $__currentLoopData = $global_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $global_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($global_menu->location=='body'): ?>


                   <div class="card mt-3">
                       <h5 class="card-header" style="background-color: #5c965c; color: white;"><?php echo e($global_menu->name); ?></h5>
                       <?php
                          $attachments=$global_menu->attachment()->orderBy('created_at','desc')->take(2)->get();
                       ?>
                       <div class="card-body badge-light">

                     <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if($attachment!=null&&$attachment->type=='link'): ?>
                               <?php ($link=$attachment->link); ?>
                               <ul>
                                   <li class="mt-3">
                                       <a href="<?php echo e($link->hyperlink); ?>" target="_blank"><?php echo e($link->text_to_display); ?></a>
                                   </li>
                               </ul>




                           <?php elseif($attachment!=null&&$attachment->type=='file'): ?>
                               <?php ($file=$attachment->file); ?>

                               <ul>
                                   <li>
                                       <a href="<?php echo e($file->path); ?>" target="_blank"><?php echo e($file->title); ?></a>
                                   </li>
                               </ul>



                           <?php elseif($attachment!=null&&$attachment->type=='page'): ?>
                               <?php ($page=$attachment->page); ?>

                               <ul>
                                   <li>
                                       <a href="<?php echo e(route('page',(object)$page)); ?>" target="_blank"><?php echo e($page['title']); ?></a>
                                   </li>
                               </ul>


                           <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






                           <h5 class="card-title"></h5>
                           <p class="card-text"></p>
                           <p align="right"><a  class="btn btn-sm btn-success" href="<?php echo e(route('attachment.index',$global_menu)); ?>" > সকল</a></p>

                       </div>
                   </div>
           <?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(auth()->guard()->check()): ?>
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

                           <form class="form-inline" action="<?php echo e(route('menus.store')); ?>" method="post">
                               <?php echo e(csrf_field()); ?>


                               <div class="form-group mx-sm-3 mb-2">
                                   <label for="card_name" class="sr-only">card_name</label>
                                   <input type="text" class="form-control" id="card_name" name="card_name" value="<?php echo e(old('card_name')); ?>" placeholder="Card name">
                                   <input type="text" hidden  name="location" value="body">
                                   <input type="text" hidden  name="parent_id" value="-1">
                               </div>
                               <button type="submit" class="btn btn-success">Save</button>

                           </form>
                       </div>

                   </div>
               </div>
           </div>

           <?php endif; ?>


       </div>



       <div class="col-4">
           <div class="list-group mt-3">
               <a href="#" class="list-group-item list-group-item-action active" style="background-color: #5c965c; color: white;" >
                   Links
               </a>

               <?php $__currentLoopData = $global_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $global_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($global_menu->location=='side_link'): ?>


                               <a href="<?php echo e(route('attachment.index',$global_menu)); ?>" class="list-group-item list-group-item-action" style="color: blue"><?php echo e($global_menu->name); ?></a>



                   <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       <?php if(auth()->guard()->check()): ?>
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

                               <form class="form-inline" action="<?php echo e(route('menus.store')); ?>" method="post">
                                   <?php echo e(csrf_field()); ?>


                                   <div class="form-group mx-sm-3 mb-2">
                                       <label for="card_name" class="sr-only">card_name</label>
                                       <input type="text" class="form-control" id="card_name" name="card_name" value="<?php echo e(old('card_name')); ?>" placeholder="Card name">
                                       <input type="text" hidden  name="location" value="side_link">
                                       <input type="text" hidden  name="parent_id" value="-1">
                                   </div>
                                   <button type="submit" class="btn btn-success">Save</button>

                               </form>
                           </div>

                       </div>
                   </div>
               </div>
       <?php endif; ?>
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

            <?php $__currentLoopData = $global_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $global_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($global_menu->location=='card'): ?>
                <div class="col-sm-4 ">
                    <div class="card m-3">
                        <div class="card-body badge-light">
                            <h5 class="card-title"><?php echo e($global_menu->name); ?></h5>
                                 <ul>

                                      <?php ($sub_menus=App\Menu::find($global_menu->id)->children); ?>

                                         <?php $__currentLoopData = $sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <li>
                                                 <a href="<?php echo e(route('attachment.index',$sub_menu)); ?>" style="color: black"> <?php echo e($sub_menu->name); ?></a>
                                              </li>

                                         <!-- Modal for sub menu action -->



                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </ul>




                            <?php if(auth()->guard()->check()): ?>
                            <div class="row">

                                <div class="col">

                                    <!--card menu edit button and action-->

                                    <a href="#" class=" btn btn-sm btn-outline-success"  data-toggle="modal" data-target="#card_<?php echo e($global_menu->id); ?>">edit</a>
                                    <div class="modal fade" id="card_<?php echo e($global_menu->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Card Name</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="<?php echo e(route('menus.update',$global_menu)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('PATCH')); ?>


                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control" id="card_name" name="card_name" value="<?php echo e($global_menu->name); ?>" placeholder="Card name">

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
                                    <form action="<?php echo e(route('menus.destroy',$global_menu)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                        <button type="submit" class="btn btn-sm btn-outline-danger ">Delete</button>

                                    </form>
                                </div>

                                <div class="col">

                                    <button  class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#submenu_<?php echo e($global_menu->id); ?>">Add Submenu</button>
                                    <div class="modal fade" id="submenu_<?php echo e($global_menu->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Sub menu</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="<?php echo e(route('menus.store')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>



                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control" id="menu_name" name="card_name" value="<?php echo e(old('card_name')); ?>" placeholder="Card name">
                                                            <input type="text" hidden  name="parent_id" value="<?php echo e($global_menu->id); ?>">
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

                            <?php endif; ?>





                        </div>
                    </div>
                </div>



                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php if(auth()->guard()->check()): ?>

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

                                <form class="form-inline" action="<?php echo e(route('menus.store')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="card_name" class="sr-only">card_name</label>
                                        <input type="text" class="form-control" id="card_name" name="card_name" value="<?php echo e(old('card_name')); ?>" placeholder="Card name">
                                        <input type="text" hidden  name="location" value="card">
                                        <input type="text" hidden  name="parent_id" value="-1">
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <?php endif; ?>



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