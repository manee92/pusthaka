<!-- Page Content -->
<script>
  function do_search(){
      var a = $('#search_box2').val();
      if(a.length<3)
      {
          $('#search_box2').css("color","red");
      }
      else
      {
          location = '<?php echo ASSET_PATH;   echo '/search/quick/';?>'+a;
      }
  }
</script>


<div class="container">

    <!-- Page Heading/Breadcrumbs -->
     
 <div class="row row-centered">

  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/mytable"><i class="fa fa-fw fa-dashboard"></i>My Table</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/collections"><i class="fa fa-fw fa-table"></i>My Collections</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div>

    <div class="col-md-3 col-centered" style="left: 69px;">
        
    </div>


    <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control" id="search_box2">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="do_search()" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
       
    <!-- /.row -->
    </br>
    <!-- Projects Row -->
    <div class="row">
    
    <?php
    $i=1;
    foreach($data['quick_results'] as $row)
    {
    ?>
        <div class="col-md-6 img-portfolio">
            <a href="<?php echo ASSET_PATH?>posts/item/<?php echo $row['material_id']?>">

            </a>
            <h4>
                <a href="<?php echo ASSET_PATH?>/main/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
            </h4>
            <p>by <?php echo $row['author']; ?></p>

            <?php if(isset($_SESSION['user_name']) and $_SESSION['user_type']=="librarian")
                {  ?>
            <a href="<?php echo ASSET_PATH;?>/Lpanel/review/<?php echo $row['material_id']; ?>">Review Book</a>
            <?php }?>
        </div>

        <?php 
        if($i%2==0)
        { ?>
    </div>
    <?php if($i==16)
    {   break;}
    else
    { ?>
    <div class="row"><?php } } ?>
    <?php

        $i = $i+1;

    } ?></div>

     </div>
    <div class="col-lg-4">
            <a href="<?php echo ASSET_PATH; echo '/search'; ?>">Use the advance search</a>
        </div>
    </div>
    <!-- /.row -->



    <!-- Pagination
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
    </div>-->
    <!-- /.row -->
