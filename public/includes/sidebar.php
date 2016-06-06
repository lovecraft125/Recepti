<!--SIDEBAR-->
<?php

    $categories = \libs\Category::find_all();

?>
           
            <div id="sidebar">
                <ul>
                    <li class="cat_head">Kategorije</li>
                    <?php foreach($categories as $category):?>
                    <li><a href="?page=category&cat=<?= $category->id;?>"><?= $category->category;?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <script>
                var category = document.getElementsByClassName("cat_head")[0];
                var sidebar = document.getElementById("sidebar");
                var sidebar_y = sidebar.style.height = "50px";
                category.addEventListener("click",function(){
                    if(parseInt(sidebar.style.height) <  70){
                        return sidebar.style.height = "auto";
                    }else{
                        return sidebar.style.height = "50px";
                    }    
                });            
            </script>