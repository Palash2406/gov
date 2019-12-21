<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>





    <title>আনোয়ারা উপজেলা</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</head>

<body >

<div class="container">

    <nav class="navbar navbar-dark mb-2 " style="background-color: #413463;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="">
                        <img alt="logo" src="images/logo.png">
                    </a>
                </div>
                <div class="col-lg-4  mt-2">
                    <a class="navbar-brand" href="#" > <h2>আনোয়ারা উপজেলা</h2></a>

                </div>


            </div>


        </div>
    </nav>


    <div id="carouselExampleInterval " class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000">
                <img src="images/parki.png" class="d-block w-100 " height="300%" alt="...">

            </div>
            <div class="carousel-item" data-interval="5000">
                <img src="images/shah Mohasan awlia.jpg" class="d-block w-100" height="300%" alt="...">

            </div>

        </div>
        <a class="carousel-control-prev" href="" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

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
        <div class="col-sm-8">
            <div class="card">
                <h5 class="card-header "   style="background-color: #5c965c; color: white;">নোটিশ বোর্ড</h5>
                <div class="card-body badge-light">
                 <?php if($form_type=='link'): ?>



                        <form >
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Hyperlink</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://www.something.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Title</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="title">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>


                 <?php elseif($form_type=='file'): ?>



                        <form >
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Add Image or PDF</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Title</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="title">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>



                 <?php elseif($form_type=='page'): ?>

                        <form >
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Title</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Body</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </form>




                 <?php endif; ?>







            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body badge-light">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                </p>
                <a href="#" class="btn btn-sm btn-success">Go somewhere</a>
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
</html><?php /**PATH C:\xampp\htdocs\gov\resources\views/submenu_element.blade.php ENDPATH**/ ?>