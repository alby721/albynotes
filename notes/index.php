<?php
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');
include($root_path . '/notes/login/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlbyNotes - Your notes everywhere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.bubble.css">
    <link rel="icon" href="assets/icon.png" type="image/png" />

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <!-- Tags Section -->
    <?php include('layouts/tags-section.php') ?>
    <!-- /Tags Section -->

    <!-- Container -->
    <div class="container-fluid h-100">

        <!-- Navbar -->
        <?php include('layouts/navbar.php') ?>
        <!-- /Navbar -->

        <!-- Content -->
        <?php include('layouts/content.php') ?>
        <!-- Content -->

    </div>
    <!-- /Container -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--<script src="/node_modules/@ckeditor/ckeditor5-build-balloon/build/ckeditor.js"></script>-->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="assets/main.js"></script>
    <script src="app.js"></script>

    <script>
        $(document).ready(function() {
            var user_id = <?php echo $_SESSION['id']; ?>;
            localStorage.setItem('user_id', user_id);
        });

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            /*[{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript*/
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            /*[{
                'direction': 'rtl'
            }], // text direction*/

            /*[{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],*/

            /*[{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],*/
            [{
                'align': []
            }],
            ['link', ], // add's image support

            /*
                        ['clean'] // remove formatting button*/
        ];
        var quill = new Quill('#editor', {
            theme: 'bubble', // Specify theme in configuration
            bounds: '#editor',
            modules: {
                toolbar: toolbarOptions,
                clipboard: {
            matchVisual: false
        }
            }
        });
        quill.enable(false)
    </script>

</body>

</html>