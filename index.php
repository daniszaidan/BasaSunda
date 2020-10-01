<!DOCTYPE html>
<html>

<head>
    <title>BasaSunda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/zero.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">

    <style>
        * {
             /*border: 1px solid black !important; */
        }
    </style>
</head>

<body id="body">

    <div id="overlay"></div>

    <div class="modal-frame modal-frame-delete">
        <div class="modal-box modal-box-delete" id="modal-top">
            <div class="modal-header">
                <h4>Delete Word</h4>
                <div class="modal-close" onclick="modalClose()"><i class="material-icons">close</i></div>
            </div>
            <div class="modal-body modal-body-delete">
                <div class="col-2 d-flex flex-center">
                    <img id="word-image-delete" src="assets/images/number_one.png" alt="image">
                </div>
                <div class="col-10">
                    <input type="hidden" id="word-id-delete">
                    <p>Delete <span id="word-label-delete">One</span> - <span id="word-sunda-delete">Hiji</span> ?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn ripple-effect" onclick="deleteData()">delete</button>
            </div>
        </div>
    </div>

    <div class="modal-frame modal-frame-add">
        <div class="modal-box modal-box-add" id="modal-top">
            <div class="modal-header">
                <h4>Add Word</h4>
                <div class="modal-close" onclick="modalClose()"><i class="material-icons">close</i></div>
            </div>
            <div class="modal-body">
                <form id="form-add" method="get">
                    <div class="form-input">
                        <input type="file" accept=".gif,.jpg,.jpeg,.png" name="image-add" id="image-add">
                        <label id="image-label-add">Image (Use a rectangular image)</label>
                    </div>
                    <div class="form-input">
                        <input type="text" required="" name="word-label-add" id="word-label-add">
                        <label>English Word</label>
                    </div>
                    <div class="form-input">
                        <input type="text" required="" name="word-sunda-add" id="word-sunda-add">
                        <label>Sunda Word</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn ripple-effect" id="button-submit-add">save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-frame modal-frame-edit">
        <div class="modal-box modal-box-edit" id="modal-top">
            <div class="modal-header">
                <h4>Edit Word</h4>
                <div class="modal-close" onclick="modalClose()"><i class="material-icons">close</i></div>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="get">
                    <input type="hidden" id="word-id-edit">
                    <div class="form-input">
                        <input type="file" id="image-edit" name="image-edit">
                        <label id="image-label-edit">Image</label>
                        <input type="hidden" id="current-image-edit" name="current-image-edit">
                    </div>
                    <div class="form-input">
                        <input type="text" required="" id="word-label-edit" name="word-label-edit">
                        <label>English Word</label>
                    </div>
                    <div class="form-input">
                        <input type="text" required="" id="word-sunda-edit" name="word-sunda-edit">
                        <label>Sunda Word</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn ripple-effect" id="button-submit-edit">Edit</button>
                </form>
            </div>
        </div>
    </div>


    <div class="dashboard">
        <div class="sidebar" id="sidebar-mobile">
            <nav>
                <ul>
                    <li class="li-logo">
                        <a href="javascript:void(0)">
                            <i class="material-icons f-left" onclick="toggleMenuOpen()" id="menu">menu</i>
                            <img src="assets/images/logo.png">
                        </a>
                    </li>
                    <li class="menu-number active" style="background-color: #FD8E09;">
                        <a href="index.php">
                            <div class="menu-icon-frame">
                                <img src="assets/images/menu_number.png">
                            </div>
                            <p class="f-left">Number</p>
                        </a>
                    </li>
                    <li class="menu-family">
                        <a href="family_view.php">
                            <div class="menu-icon-frame">
                                <img src="assets/images/menu_family.png">
                            </div>
                            <p class="f-left">Family</p>
                        </a>
                    </li>
                    <li class="menu-color">
                        <a href="color_view.php">
                            <div class="menu-icon-frame">
                                <img src="assets/images/menu_color.png">
                            </div>
                            <p class="f-left">Colors</p>
                        </a>
                    </li>
                    <li class="menu-phrase">
                        <a href="phrases_view.php">
                            <div class="menu-icon-frame">
                                <img src="assets/images/menu_phrase.png">
                            </div>
                            <p class="f-left">Phrases</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <div class="mainbar" id="mainbar">
            <header class="d-flex clearfix">
                <i class="material-icons f-left menu-phone" onclick="toggleMenuOpen()" id="menu">menu</i>
                <h5 class="f-left">Number Page</h5>
            </header>
            <button class="action-add ripple-effect" onclick="modalAdd()" style="background-color: #FD8E09;"><i class="material-icons">add</i></button>
            <div class="content" id="content">

            </div>

            <footer>
                <center>© basasunda 2020</center>
            </footer>

        </div>
    </div>

    <script src="js/zero_css_script.js"></script>
    <script src="js/number_script.js"></script>

</body>

</html>
