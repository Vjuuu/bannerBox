<?php include VIEWPATH.'./Users/Components/Header.php'; ?>
<div class="simple-page-container p-4">
    

    <?php

if (!empty($banner)) {
    foreach ($banner as $category_name => $category_info) {?>
       <h4 class="mb-5"><?=htmlspecialchars($category_name);?></h4>
    <div class="row">
            <?php if (!empty($category_info['templates'])) { 
                    
                        foreach ($category_info['templates'] as $template) {?>
                             <div class="col-6 col-md-3 col-lg-4 col-xl-2" >
                                <a href="<?=base_url('view-poster/').htmlspecialchars($template['template_id'])?>">
                                    <div class="card mb-4">
                                    <img src="<?= htmlspecialchars($template['template_thumbnail']);?>" alt="" class="img-fluid">
                                    </div>
                                </a>
                             </div>
                           
                    <?php }
                        
                    } else { ?>
                        echo '<p>No templates available in this category.</p>';
                <?php }
                    
                }
  echo "</div>";
   
} else {
   
}
?>

    
</div>
<?php include VIEWPATH.'./Users/Components/Footer.php'; ?>

<script>

</script>