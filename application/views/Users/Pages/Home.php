<?php include VIEWPATH.'./Users/Components/Header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.3/sweetalert2.css"
    integrity="sha512-K1UvyLtJVqbWVNOZRvv1wqH97NXkV4fZRqxAJquVvMkOllS1qQ/BY+lMGKWxhPuQloqaYi6uZplZFMPUks3+lA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<div class="tab-content p-3" id="myTabContent">
    <div class="tab-pane fade show active" id="trending" role="tabpanel" aria-labelledby="trending-tab">

    </div>
    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">New content</div>
    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">Popular content</div>
    <!-- <div class="tab-pane fade" id="seasonal" role="tabpanel" aria-labelledby="seasonal-tab">Seasonal content</div> -->
</div>
<section class="popular-posters mb-4 p-3">
    <?php foreach ($grouped_data as $category_name => $templates): ?>
    <div class="mb-3">
        <label for="" class="mb-3"><?=$category_name;?></label>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($templates as $template){ ?>
                <div class="swiper-slide">
                    <a href="<?= base_url()?>view-poster/<?=$template['template_id']?>">
                        <div class="card h-100 bg-dark text-white">
                            <img src="<?=$template['template_thumbnail']?>" class="card-img-top btn-poster"
                                alt="Template 1">
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
    <?php endforeach; ?>
</section>

<!-- Modal -->
<div class="modal fade " id="profileModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Profile</h5>
                <!-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form id="profileForm" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label class="fs-6 mb-2">Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-dark" value="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="fs-6 mb-2">Business Name</label>
                        <input type="text" name="business_name" id="business_name"
                            class="form-control form-control-dark" value="" maxlength="25" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Mobile No</label>
                        <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-dark"
                            value=""  required >
                    </div>
                    <div class="form-group mb-4">
                        <label>Address</label>
                        <textarea name="address" id="address" class="form-control form-control-dark"  required maxlength="50" ></textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.3/sweetalert2.all.min.js"
    integrity="sha512-Zn2E4ZW5LTDHqcRZ27wyqHBiVTIKIDgmhhvvoIsliWx2sGgiSrDoRt0HxLSuOZfv9sM8lZkXZF3oX49c6cvalA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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