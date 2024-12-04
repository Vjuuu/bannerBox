<?php $banner_url =  base_url().'assets/templates/'.$result->template_img ;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home page</title>
    <!-- plugins:css -->


    <link rel="stylesheet" href="<?=base_url().'assets/css/style.css';?>">
    <link rel="stylesheet" href="<?=base_url().'assets/library/icons-1.11.0/font/bootstrap-icons.min.css'?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<style>
.poster-container {
    background: url('<?php echo base_url().'assets/templates/'.$result->template_img ;?>');
    height: 450px;
    width: 450px;
    position: relative;
    background-size: cover;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.274);
}
</style>

<body class="bp4-dark">
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Status247</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="btn btn-secondary" href="<?=base_url();?>">Back<span
                                        class="sr-only">(current)</span></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>



            <div class="wraper ">

                <div id="editor_container" style="height:90vh;width:100%">
                </div>


            </div>

    </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <!-- // latest => last production version of the plugin, possible to replace with some earlier version (ex. 3.17.0) & if available will be requested -->
    <script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js">
    </script>
    <script>
    const {
        TABS,
        TOOLS
    } = FilerobotImageEditor;
    const config = {
        source: "<?=base_url().'assets/templates/'.$result->template_img;?>",
        onSave: (editedImageObject, designState) => {
            console.log('saved', editedImageObject, designState)
            a = document.createElement("a"); //Create <a>
            a.href = editedImageObject.imageBase64; //Image Base64 Goes here
            a.download = "Image.png"; //File name Here
            a.click();
        },
        annotationsCommon: {
            fill: '#ff0000',
        },
        Text: {
            // ...annotationsCommon,
            text: 'Filerobot...',
            fontFamily: 'Arial',
            fonts: [{
                    label: 'Arial',
                    value: 'Arial'
                },
                'Tahoma',
                'Sans-serif',
                {
                    label: 'Comic Sans',
                    value: 'Comic-sans'
                },
            ],
            fontSize: 16,
            letterSpacing: 0,
            lineHeight: 1,
            align: 'left',
            fontStyle: 'normal',
        },
        Rotate: {
            angle: 90,
            componentType: 'slider'
        },
        translations: {
            profile: 'Profile',
            coverPhoto: 'Cover photo',
            facebook: 'Facebook',
            socialMedia: 'Social Media',
            fbProfileSize: '180x180px',
            fbCoverPhotoSize: '820x312px',
        },
        Crop: {
            presetsItems: [{
                    titleKey: 'classicTv',
                    descriptionKey: '4:3',
                    ratio: 4 / 3,
                    // icon: CropClassicTv, // optional, CropClassicTv is a React Function component. Possible (React Function component, string or HTML Element)
                },
                {
                    titleKey: 'cinemascope',
                    descriptionKey: '21:9',
                    ratio: 21 / 9,
                    // icon: CropCinemaScope, // optional, CropCinemaScope is a React Function component.  Possible (React Function component, string or HTML Element)
                },
            ],
            presetsFolders: [{
                titleKey: 'socialMedia', // will be translated into Social Media as backend contains this translation key
                // icon: Social, // optional, Social is a React Function component. Possible (React Function component, string or HTML Element)
                groups: [{
                    titleKey: 'facebook',
                    items: [{
                            titleKey: 'profile',
                            width: 180,
                            height: 180,
                            descriptionKey: 'fbProfileSize',
                        },
                        {
                            titleKey: 'coverPhoto',
                            width: 820,
                            height: 312,
                            descriptionKey: 'fbCoverPhotoSize',
                        },
                    ],
                }, ],
            }, ],
        },
        tabsIds: [TABS.ADJUST, TABS.ANNOTATE, TABS.WATERMARK], // or ['Adjust', 'Annotate', 'Watermark']
        defaultTabId: TABS.ANNOTATE, // or 'Annotate'
        defaultToolId: TOOLS.TEXT, // or 'Text'
    };

    // Assuming we have a div with id="editor_container"
    const filerobotImageEditor = new FilerobotImageEditor(
        document.querySelector('#editor_container'),
        config,
    );




    filerobotImageEditor.render({
        // onClose: (closingReason) => {
        //     console.log('Closing reason', closingReason);
        //     filerobotImageEditor.terminate();
        // }  
        addText: ({
            text: 'Default Text',
            x: 200, // X-coordinate of the text position
            y: 200, // Y-coordinate of the text position
            color: '#FF0000', // Text color
            font: 'Arial', // Font family
            size: 24,
        }),

    });
    </script>
</body>

</html>