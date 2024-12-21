<?php include VIEWPATH .'./canvas_editor/component/Header.php';?>
<style>
#idInput {
    position: absolute;
    display: none;
    z-index: 1000;
}

@media (max-width:768px) {
    .sidebar {
        display: none;
    }

    .canvas-container {
        transform: scale(0.8);
    }
    .content
    {
        padding:10px !important;
    }
}
</style>

<body style="background-color: rgb(46, 45, 45);">
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">BanerBox</a>
                    <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="form-group">
                            <input class="form-control me-2 object-color-input p-0" type="color" style="width:100px">
                        </div>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item d-none">
                                <button class="btn btn-light me-2"><i class="bi bi-arrow-90deg-left"></i></button>
                            </li>
                            <li class="nav-item d-none">
                                <button class="btn btn-light me-2"><i class="bi bi-arrow-90deg-right"></i></button>
                            </li>
                            <li class="nav-item <?=(isset($user_roll) && $user_roll == "user") ? 'd-none': ''?>">
                                <a class="btn btn-primary me-2" id="btn_save_template" data-bs-toggle="modal"
                                    data-bs-target="#saveTemplateModal">Save</a>
                            </li>
                        </ul>

                    </div>
                    <form class="d-flex">
                        <button class="btn btn-primary" type="button" id="export-image"><i
                                class="bi bi-download me-1"></i>Download</button>
                    </form>
                </div>
            </nav>
        </header>
        <div class="page">
            <div class="sidebar bg-dark">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" id="v-pills-filter-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-filter" type="button" role="tab" aria-controls="v-pills-filter"
                            aria-selected="true">
                            <i class="bi bi-images"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="v-pills-shapes-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-shapes" type="button" role="tab" aria-controls="v-pills-shapes"
                            aria-selected="false">
                            <i class="bi bi-bounding-box-circles"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="v-pills-liyer-pannel-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-liyer-pannel" type="button" role="tab"
                            aria-controls="v-pills-liyer-pannel" aria-selected="false">
                            <i class="bi bi-collection"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="v-pills-text-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-text" type="button" role="tab" aria-controls="v-pills-text"
                            aria-selected="false">
                            <i class="bi bi-fonts"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="v-pills-templates-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-templates" type="button" role="tab"
                            aria-controls="v-pills-templates" aria-selected="false">
                            <i class="bi bi-image"></i>
                        </a>
                    </li>

                </ul>

                <div class="tab-content text-light" id="v-pills-tabContent">
                    <div class="tab-pane fade show active p-3 h-100" id="v-pills-filter" role="tabpanel"
                        aria-labelledby="v-pills-filter-tab">
                        <p>Templates</p>

                    </div>
                    <div class="tab-pane fade show  p-3 h-100" id="v-pills-shapes" role="tabpanel"
                        aria-labelledby="v-pills-shapes-tab">
                        <p>Shapes</p>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/rectangle.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="rectangle">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/circle.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="circle">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/triangle.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="triangle">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/polygon.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="polygon">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/hexagon.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="hexagon">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/pentagon.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="pentagon">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/star.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="star">
                            </div>
                            <div class="col-md-6">
                                <img src="<?=base_url()?>assets/images/shapes/line.png" alt=""
                                    class="img-fluid mb-4 btn-shape" data-shape="line">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3 h-100" id="v-pills-text" role="tabpanel"
                        aria-labelledby="v-pills-text-tab">
                        <p class="text-light mb-2">Add text </p>
                        <button class="btn btn-outline-secondary w-100 mb-4" id="add-text">Add Text</button>

                        <div class="form-group mb-4">
                            <label for="">Fonts</label>
                            <select id="font-select" class="form-select bg-dark text-light">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Roboto">Roboto</option>
                                <option value="Lobster">Lobster</option>
                                <option value="Oswald">Oswald</option>
                                <option value="Poppins">Poppins</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Font size</label>
                            <input type="number" id="font-size" class="form-control bg-dark text-light" value="24">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Text alignment</label>
                            <div class="btn-group mb-3" role="group">
                                <button class="btn btn-outline-secondary" id="align-left">Left</button>
                                <button class="btn btn-outline-secondary" id="align-center">Center</button>
                                <button class="btn btn-outline-secondary" id="align-right">Right</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Opacity</label>
                            <input type="range" id="opacity-slider" min="0" max="1" step="0.1" value="1"
                                class="form-range">
                        </div>
                        <div class="form-group">
                            <label for="">Border Radius</label>
                            <input type="range" id="border-radius-slider" min="0" max="50" value="0" step="1"
                                class="form-range">
                        </div>

                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="color" id="object-color" class="form-control object-color-input">
                        </div>

                    </div>
                    <div class="tab-pane fade p-3 h-100" id="v-pills-templates" role="tabpanel"
                        aria-labelledby="v-pills-templates-tab">
                        <div class="form-group">
                            <label for="">Upload image</label>
                            <input type="file" id="upload-image" class="form-control bg-dark" accept="image/*">
                        </div>
                    </div>
                    <!-- ================= liyar panel ==================  -->
                    <div class="tab-pane fade p-3" id="v-pills-liyer-pannel" role="tabpanel"
                        aria-labelledby="v-pills-upload-image-tab">
                        <p>Management Liyar</p>
                        <div class="row">
                            <div class="col-12">
                                <div id="layer-list"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="content">
                <input type="text" id="idInput" placeholder="Enter ID" />
                <canvas id="canvas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <!-- profile modal  -->
    <div class="modal fade" id="saveTemplateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmTemplate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save Template</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="">Template Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="<?=(isset($template)) ? $template[0]->template_name : '';?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Category</label>
                            <select name="category" id="category" class="form-select">
                                <?php foreach($categories as $category){?>
                                <option value="<?=$category->id?>"><?=$category->category_name;?></option>
                                <?php } ?>
                            </select>
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
</body>
<?php include VIEWPATH .'./canvas_editor/component/Footer.php';?>
<script>
$(document).ready(function() {
    // const canvas = new fabric.Canvas('canvas');
    // save template 



    $('#frmTemplate').on('submit', function(e) {
        e.preventDefault();
        const canvasData = JSON.stringify(canvas.toJSON());
        const template_name = $('#name').val();
        const category = $('#category').val();
        const templateThumbnail = canvas.toDataURL();
        $.ajax({
            url: '<?=base_url()?><?=(isset($template)? 'admin/edit_canvas_template/'.$template[0]->id: 'admin/save_canvas_template')?>',
            type: 'POST',
            data: JSON.stringify({
                canvasData: canvasData,
                name: template_name,
                category: category,
                thumbnail: templateThumbnail,
            }),
            success: function(response) {

                Toastify({
                    text: "Template Save",
                    duration: 3000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();

                setTimeout(() => {
                    window.location.href =
                        "<?=base_url()?>admin/canvas-all-templates";
                }, 3000);

            },
            error: function(xhr, status, error) {
                console.error('Error saving template:', error);
            }
        })
    })

    // Load template
    <?php if (isset($template)) { ?>

    const templateJSON = <?= json_encode($template[0]->template_json); ?>;

    try {
        canvas.loadFromJSON(
            templateJSON,
            function() {
                canvas.renderAll();
                setUserData();
            },
            function(objectData, object) {
                // console.log("Processing object:", objectData);
                // console.log("Created object:", object);
            }
        );
    } catch (error) {
        console.error("Error during loadFromJSON:", error.message); // Log specific error
        console.error(error.stack); // Log stack trace for deeper debugging
    }

    try {
        const parsedJSON = JSON.parse(templateJSON);
    } catch (parseError) {
        console.error("JSON is invalid:", parseError.message);
    }


    <?php } else { ?>
    console.log("No template to load.");
    <?php } ?>

})
</script>

</html>