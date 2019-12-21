<?php /* C:\xampp\htdocs\gov\resources\views/show_attachment.blade.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>





    <title><?php echo e($menu->name); ?></title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src=<?php echo e(\Illuminate\Support\Facades\URL::to('tinymce_5.1.4\tinymce\js\tinymce\tinymce.min.js')); ?> ></script>

</head>

<body >

<div class="container">

    <nav class="navbar navbar-dark mb-2 " style="background-color: #413463;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="<?php echo e(route('public')); ?>">
                        <img alt="logo" src="../images/logo.png">
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
                    <img src="../<?php echo e($slider->path); ?>" class="d-block w-100 " height="300" alt="<?php echo e($slider->title); ?>">
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
        <div class="col">
            <div class="card">
                <h5 class="card-header "   style="background-color: #5c965c; color: white;"><?php echo e($menu->name); ?> <?php if(auth()->guard()->check()): ?> <a href="#" data-toggle="modal" data-target="#action<?php echo e($menu->id); ?>"> &#9998;</a> <?php endif; ?></h5>
                <?php if(auth()->guard()->check()): ?>
                <div class="modal fade" id="action<?php echo e($menu->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($menu->name); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <!-- card sub menu edit button and action-->

                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#submenu_edit<?php echo e($menu->id); ?>">edit</button>

                                    </div>



                                    <div class="modal fade" id="submenu_edit<?php echo e($menu->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit menu Name</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-inline" action="<?php echo e(route('menus.update',$menu)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('PATCH')); ?>


                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label for="card_name" class="sr-only">card_name</label>
                                                            <input type="text" class="form-control"  name="card_name" value="<?php echo e($menu->name); ?>" placeholder="name">

                                                        </div>
                                                        <button type="submit" class="btn btn-success">Update</button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!--card sub menu delete button and action-->
                                    <div class="col">
                                        <form action="<?php echo e(route('menus.destroy',$menu)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>


                                            <button type="submit" class="btn  btn-danger ">Delete</button>

                                        </form>
                                    </div>

                                    <div class="col">
                                        <div class="btn-group " role="group" aria-label="First group">
                                            <a type="button" href="<?php echo e(route('attachment_form',[$menu,'form_type'=>'link'])); ?>" class="btn btn-secondary">Add Hyperlink</a>
                                            <a type="button" href="<?php echo e(route('attachment_form',[$menu,'form_type'=>'file'])); ?>" class="btn btn-secondary">Add image/pdf</a>
                                            <a type="button" href="<?php echo e(route('attachment_form',[$menu,'form_type'=>'page'])); ?>" class="btn btn-secondary">Add Page</a>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php endif; ?>


                <div class="card-body badge-light">

                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th scope="col">ক্রমিক নং</th>
                            <th scope="col">টাইটেল</th>
                            <th scope="col">সংযুক্তি</th>
                            <th scope="col">হালনাগাদ</th>

                          <?php if(auth()->guard()->check()): ?> <th scope="col">অ্যাকশন</th> <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php ($count=1); ?>
                        <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($attachment->type=='link'): ?>
                              <?php ($link=$attachment->link); ?>
                            <tr>
                                <td scope="row"><?php echo e($count++); ?></td>
                                <td><a href="<?php echo e($link->hyperlink); ?>" target="_blank"><?php echo e($link->text_to_display); ?></a></td>
                                <td><a href="<?php echo e($link->hyperlink); ?>" target="_blank">Click here</a></td>
                                <td><?php echo e($attachment->updated_at); ?></td>
                     <?php if(auth()->guard()->check()): ?>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="<?php echo e(route('attachment_edit',['id'=>$link->id,'form_type'=>$attachment->type])); ?>" type="button" class="btn btn-success btn-sm">Edit</a>

                                        </div>

                                        <div class="col">

                                            <form action="<?php echo e(route('link.destroy',$link)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>


                                                <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                <?php endif; ?>



                          <?php elseif($attachment->type=='file'): ?>
                              <?php ($file=$attachment->file); ?>
                              <tr>
                                  <td scope="row"><?php echo e($count++); ?></td>
                                  <td><a href="<?php echo e("../".$file->path); ?>" target="_blank"><?php echo e($file->title); ?></a></td>
                                  <?php if($file->mime_type=='application/pdf'): ?>
                                      <td><a href="<?php echo e("../".$file->path); ?>" target="_blank"><img src="../images/pdf.png" width="50" height="50"></a></td>
                                  <?php else: ?>
                                      <td><a href="<?php echo e("../".$file->path); ?>" target="_blank"><img src="<?php echo e("../".$file->path); ?>" width="50" height="50"></a></td>
                                  <?php endif; ?>

                                  <td><?php echo e($attachment->updated_at); ?></td>


                                  <?php if(auth()->guard()->check()): ?>
                                  <td>

                                      <div class="row">
                                          <div class="col-3">
                                              <a href="<?php echo e(route('attachment_edit',['id'=>$file->id,'form_type'=>$attachment->type])); ?>" type="button" class="btn btn-success btn-sm">Edit</a>

                                          </div>

                                          <div class="col">

                                              <form action="<?php echo e(route('file.destroy',$file)); ?>" method="POST">
                                                  <?php echo e(csrf_field()); ?>

                                                  <?php echo e(method_field('DELETE')); ?>


                                                  <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                              </form>
                                          </div>
                                      </div>
                                  </td>

                                  <?php endif; ?>

                              </tr>

                          <?php elseif($attachment->type=='page'): ?>
                              <?php ($page=$attachment->page); ?>
                              <tr>
                                  <td scope="row"><?php echo e($count++); ?></td>
                                  <td> <a href="<?php echo e(route('page',(object)$page)); ?>" target="_blank"><?php echo e($page['title']); ?></a></td>
                                  <td><a href="<?php echo e(route('page',(object)$page)); ?>" target="_blank">Visit Page</a></td>
                                  <td><?php echo e($attachment->updated_at); ?></td>

                            <?php if(auth()->guard()->check()): ?>
                                  <td>
                                      <div class="row">
                                          <div class="col-3">
                                              <a href="<?php echo e(route('attachment_edit',['id'=>$page['id'],'form_type'=>$attachment->type])); ?>" type="button" class="btn btn-success btn-sm">Edit</a>

                                          </div>

                                          <div class="col">

                                              <form action="<?php echo e(route('page.destroy',$page)); ?>" method="POST">
                                                  <?php echo e(csrf_field()); ?>

                                                  <?php echo e(method_field('DELETE')); ?>


                                                  <button type="submit" class="btn btn-sm btn-danger ">Delete</button>

                                              </form>
                                          </div>
                                      </div>

                                  </td>
                                  <?php endif; ?>

                              </tr>

                          <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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