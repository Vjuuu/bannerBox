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
<div class="tab-content p-3" id="myTabContent">
    <div class="tab-pane fade show active" id="trending" role="tabpanel" aria-labelledby="trending-tab">
        <div class="mb-3">
            <label for="" class="mb-3">Morning Motivations</label>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($templates as $template) {?>
                    <div class="swiper-slide">
                        <a href="<?= base_url()?>view-poster/<?=$template->id;?>">
                            <div class="card h-100 bg-dark text-white">
                                <img src="<?=$template->template_thumbnail?>" class="card-img-top btn-poster"
                                    alt="Template 1">
                            </div>
                        </a>
                    </div>
                    <?php }?>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">New content</div>
    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">Popular content</div>
    <!-- <div class="tab-pane fade" id="seasonal" role="tabpanel" aria-labelledby="seasonal-tab">Seasonal content</div> -->
</div>
<section class="popular-posters mb-4 p-3">
    <h3 class="h5 mb-3">Posters</h3>
    <div class="row g-4">
        <?php foreach($templates as $template) {?>
        <div class="col-6 col-md-3 col-xl-4">
            <a href="<?= base_url()?>view-poster/<?=$template->id;?>">
                <div class="card h-100 bg-dark text-white">
                    <img src="<?=$template->template_thumbnail?>" class="card-img-top btn-poster" alt="Template 1">
                </div>
            </a>
        </div>
        <?php }?>
    </div>
</section>
<?php include VIEWPATH.'./Users/Components/Footer.php'; ?>
