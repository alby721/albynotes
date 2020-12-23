<div class="row header">
    <!-- Right -->
    <div class="col-md-4 col-lg-3 navbar-right d-none d-md-inline">
        <div class="row p-3" style="border-right:1px solid #e9e9e9">
            <!-- Hamburger -->
            <div class="col-2 my-auto text-center">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <!-- Search -->
            <div class="col-8 my-auto text-center">
                <div class="active-cyan-4">
                    <input class="form-control" autocomplete="off" id="input-search" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <!-- Plus -->
            <div class="col-2 my-auto text-center">
                <i class="fas fa-plus" onclick="newNote()"></i>
            </div>
        </div>
    </div>
    <!-- /Right -->
    <!-- Left -->
    <div class="col-md-8 col-lg-9 navbar-left my-auto nav-note">
        <!-- Focus mode -->
        <div class="focus-mode">
            <a href="#">
                <i class="focus-mode-icon fas fa-caret-square-left" id="focus-mode-icon"></i>
            </a>
        </div>
        <!-- Menu left -->
        <div class="menu-left">
            <div class="note-menu">
            <a href="#">
            <i id="dark-mode" class="far fa-moon"></i>
                            </a>
                <a href="#">
                    <i class="fas fa-trash-alt" onclick="trashData()"></i>
                </a>
                <a href="#">
                    <i class="fas fa-info-circle"></i>
                </a>

            </div>

            <div class="menu-delete">
                <span class="delete-forever">
                    Delete Forever
                </span>
                <span class="restore-note">
                    Restore Note
                </span>
            </div>
        </div>

    </div>
    <!-- /Left -->
</div>

<div class="info-box">
<p class="info-box-p">
Open a note to see the info
</p>


</div>