<?php include VIEWPATH.'./Users/Components/Header.php'; ?>


<div class="hero-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=base_url()?>assets/images/hero-section/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=base_url()?>assets/images/hero-section/3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=base_url()?>assets/images/hero-section/1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<nav class="nav nav-tabs nav-fill" id="myTab" role="tablist">
    <button class="nav-link active" id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending" type="button"
        role="tab" aria-controls="trending" aria-selected="true">
        <i class="fas fa-fire me-2"></i>Trending
    </button>
    <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab"
        aria-controls="new" aria-selected="false">
        <i class="fas fa-plus me-2"></i>New
    </button>
    <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab"
        aria-controls="popular" aria-selected="false">
        <i class="fas fa-star me-2"></i>Popular
    </button>
</nav>
<div class="tab-content p-3 d-none" id="myTabContent">
    <div class="tab-pane fade show active" id="trending" role="tabpanel" aria-labelledby="trending-tab">

    </div>
    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">New content</div>
    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">Popular content</div>
    <!-- <div class="tab-pane fade" id="seasonal" role="tabpanel" aria-labelledby="seasonal-tab">Seasonal content</div> -->
</div>
<section class="popular-posters mb-4 p-3">

    <?php
        if (!empty($grouped_data)) { 
   
    foreach ($grouped_data as $category_name => $category_info) { ?>
    <div class="category mb-4">
        <h3><?=htmlspecialchars($category_name);?></h3>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php  if (!empty($category_info['templates'])) { ?>

                <?php foreach ($category_info['templates'] as $template) {  ?>
                <div class="swiper-slide">
                    <a href="<?=base_url('view-poster/').htmlspecialchars($template['template_id'])?>">
                        <div class="card h-100 bg-dark text-white">
                            <img src="<?=htmlspecialchars($template['template_thumbnail'])?>" alt="Template Thumbnail"
                                class="card-img-top btn-poster" />
                        </div>
                    </a>
                </div>
                <?php } ?>

            </div>
        </div>
        <?php } else { ?>
        <p>No templates available in this category.</p>
        <?php } ?>
    </div>
    <?php } ?>
    </div>
    <?php } else { ?>
    <p>No categories or templates found.</p>
    <?php } ?>
</section>

<!-- Modal -->
<div class="modal fade " id="profileModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Profile</h5>
                <!-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form id="profileForm" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label class="fs-6 mb-2">Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-dark" value=""
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="fs-6 mb-2">Business Name</label>
                        <input type="text" name="business_name" id="business_name"
                            class="form-control form-control-dark" value="" maxlength="25" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Mobile No</label>
                        <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-dark"
                            value="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Address</label>
                        <textarea name="address" id="address" class="form-control form-control-dark" required
                            maxlength="50"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include VIEWPATH.'./Users/Components/Footer.php'; ?>

<script>
$(document).ready(function() {
    var businessName = localStorage.getItem('business_name');
    if (businessName === null || businessName === '') {
        $('#profileModel').modal('show');
    }
    document.getElementById('profileForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        // Storing data in localStorage
        localStorage.setItem('business_name', formData.get('business_name'));
        localStorage.setItem('mobile_no', formData.get('mobile_no'));
        localStorage.setItem('address', formData.get('address'));

        // Sending data to the server
        $.ajax({
            type: 'POST',
            url: '<?= base_url("save-user-info") ?>',
            data: {
                name: formData.get('name'),
                business_name: formData.get('business_name'),
                mobile_no: formData.get('mobile_no'),
                address: formData.get('address')
            },
            beforeSend: function() {
                $('.loaderContainer').removeClass('d-none');
            },
            success: function(response) {
                Swal.fire({
                    title: "Good job!",
                    text: "Your Profile has been created",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#profileModel').modal('hide');
                    }
                });
            },
            complete:function()
            {
                $('.loaderContainer').addClass('d-none');
            },
            error: function() {
                Swal.fire({
                    title: "Error!",
                    text: "Failed to save data.",
                    icon: "error"
                });
            }
        });
    });
});
</script>



