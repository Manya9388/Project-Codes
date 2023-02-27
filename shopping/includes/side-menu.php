<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($conn,"SELECT cat_id,cat_Name  from tbl_category");
while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="category.php?cat_id=<?php echo $row['cat_id'];?>" class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
                <?php echo $row['cat_Name'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>