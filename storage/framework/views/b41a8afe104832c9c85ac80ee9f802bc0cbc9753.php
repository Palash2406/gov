<?php /* C:\xampp\htdocs\gov\resources\views/slider/show_all.blade.php */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slider</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>


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


    <a href="<?php echo e(route('slider.create')); ?>" type="button" class="btn btn-outline-success">Add Slide Image</a>



    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Slides</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php ($count=1); ?>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <tr>
                <th scope="row"><?php echo e($count++); ?></th>
                <td><a href="<?php echo e($slider->path); ?>" target="_blank"><img src="<?php echo e($slider->path); ?>" width="100" height="40" alt=" <?php echo e($slider->title); ?>"></a></td>
                <td><a href="<?php echo e($slider->path); ?>" target="_blank"><?php echo e($slider->title); ?></a></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" href="<?php echo e(route('slider.edit',$slider)); ?>" class="btn btn-success">Edit</a>

                        <form action="<?php echo e(route('slider.destroy',$slider)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="btn btn-danger">Delete</button>


                        </form>

                    </div>
                </td>
            </tr>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

</div>


</body>
</html>