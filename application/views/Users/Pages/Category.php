<?php include VIEWPATH.'./Users/Components/Header.php'; ?>
<div class="simple-page-container p-4">
    <h4 class="mb-5">Category</h4>
    <?php 
    if (!empty($grouped_data)) {
    echo '<div class="categories">';
    foreach ($grouped_data as $category_name => $category_info) {
        ?>
    <a href="<?=base_url('banner-by-category/').htmlspecialchars($category_info['category_id']);?>"
        class="mb-4 btn btn-dark w-100">
        <h5><?=htmlspecialchars($category_name)?></h5>
    </a>
    <?php 
    }
    echo '</div>';
} else {
    echo '<p>No categories or templates found.</p>';
}
?>
</div>
<?php include VIEWPATH.'./Users/Components/Footer.php'; ?>

<script>

</script>