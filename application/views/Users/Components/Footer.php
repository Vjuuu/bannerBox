<nav class="navbar fixed-bottom navbar-light" style="background-color: #1C1C1E;">
    <div class="container-fluid justify-content-around">
        <a class="nav-link d-flex flex-column align-items-center" href="<?=base_url()?>"><i
                class="fas fa-home mb-1"></i><span class="small">Home</span></a>
        <a class="nav-link d-flex flex-column align-items-center" href="<?=base_url()?>profile"><i class="fas fa-user mb-1"></i><span
                class="small">Profile</span></a>
        <a class="nav-link d-flex flex-column align-items-center" href="<?=base_url()?>category"><i class="fa-solid fa-layer-group mb-1"></i><span
                class="small">Category</span></a>
        <a class="nav-link d-flex flex-column align-items-center" href="#"><i class="fa-solid fa-crown mb-1 "></i><span
                class="small">Pro</span></a>

    </div>
</nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1.5,
    centeredSlides: false,
    spaceBetween: 30,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
</script>
</body>

</html>