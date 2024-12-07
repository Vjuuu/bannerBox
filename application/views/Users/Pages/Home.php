<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bannerbox</title>
</head>
<style>
* {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
}
</style>

<body>
    <div class="wapper">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">BannerBox.in</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                        <form class="d-none">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid p-0">
            <!-- banner  -->
            <div class="banner bg-primary  p-5 mb-4">
                <h2 class="text-center">BannerBox</h2>
            </div>
            <!-- banner :Close -->
            <!-- templates  -->
            <div class="container">
                <p class="fw-bold">Banners</p>
                <div class="row">
                    <?php foreach($templates as $template) {?>
                    <div class="col-md-2 mb-4">
                        <a href="<?= base_url()?>view-poster/<?=$template->id;?>" class="border d-block">
                            <img src="<?=$template->template_thumbnail?>" alt="" class="img-fluid">
                        </a>
                    </div>

                    <?php }?>
                </div>
            </div>
            <!-- templates:close  -->



        </div>
    </div>

    <!-- profile modal  -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="profileForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="" id="logoPreview" class="img-fluid" style="height: 60px;width: auto;">
                        <div class="form-group">

                            <label for="">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Business Name</label>
                            <input type="text" class="form-control" name="business_name" id="business_name">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile No.</label>
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control" name="address" id="address"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- profile modal : close  -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
<script>
// Profile Form Submission
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const logo = formData.get('logo');

    if (logo && logo.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onloadend = function() {
            localStorage.setItem('logo', reader.result);
            document.getElementById('logoPreview').src = reader.result;
        };
        reader.readAsDataURL(logo);
    }

    localStorage.setItem('business_name', formData.get('business_name'));
    localStorage.setItem('mobile_no', formData.get('mobile_no'));
    localStorage.setItem('address', formData.get('address'));

    if (confirm('Data saved to local storage! Would you like to proceed?')) {
        location.reload();
    } else {
        alert('You chose not to proceed.');
    }
});

// Logo Preview Update
document.getElementById('logo').addEventListener('change', function(e) {
    const logo = e.target.files[0];
    if (logo) {
        const reader = new FileReader();
        reader.onloadend = function() {
            document.getElementById('logoPreview').src = reader.result;
        };
        reader.readAsDataURL(logo);
    }
});

// Load User Data from LocalStorage
const userData = {
  business_name: localStorage.getItem('business_name'),
  phone_no: localStorage.getItem('mobile_no'),
  address: localStorage.getItem('address'),
  appLogo: localStorage.getItem('logo')
};

if (userData.business_name) {
  document.getElementById('business_name').value = userData.business_name;
  document.getElementById('mobile_no').value = userData.phone_no;
  document.getElementById('address').value = userData.address;
  document.getElementById('logoPreview').src=userData.appLogo
}
</script>

</html>