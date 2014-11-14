<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12"><?php if($books){$name = $books[0];} else {$name['category_name']="Nothing to show";}?>
            <h1 class="page-header"><?php echo $name['category_name']; ?>
                <small>Category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a>
                </li>
                <li class="active">Three Column Portfolio</li>
            </ol>
        </div>
    </div>

    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
    <?php
    $i=1;
    foreach($books as $row)
    {
    ?>
        <div class="col-md-4 img-portfolio">
            <a href="<?php echo base_url()?>posts/item/<?php echo $row['material_id']?>">
                <img class="img-responsive img-hover" src="/ucsc-digital-library/assets/images/700x400.jpg" alt="">
            </a>
            <h3>
                <a href="<?php echo base_url()?>posts/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
            </h3>
            <p>by <?php echo $row['author']; ?></p>
        </div>
        <?php
        if($i%3==0)
        { ?>
    </div>
    <?php if($i==9)
    {   break;}
    else
    { ?>
    <div class="row"><?php } } ?>
    <?php

        $i = $i+1;

    } ?>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->

    <hr>