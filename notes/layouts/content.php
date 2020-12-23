<div class="row content">
    <!-- Sidebar -->
    <div class="col-md-4 col-lg-3 right-column d-none d-md-inline">
        <!-- List -->
        <div class="row flex-fill p-0 m-0">
            <div class="col-12 note-list mh-100" style="overflow-y: scroll;">
            
            </div>
        </div>
        <!-- /List -->
    </div>
    <!-- /Sidebar -->
    <!-- Note -->
    <div class="col-md-8 col-lg-9 left-column h-100">
        <!-- List -->
        <div class="row flex-fill p-3 h-100">
            <div class="col-12 note-detail" style="overflow-y: scroll;height: 100%">
            <input type="hidden" id="current_note_id" value="">
            <input type="hidden" id="note_created_at" value="">
            <input type="hidden" id="note_updated_at" value="">
            <input type="text" class="form-control" placeholder="Title..." aria-label="title" id="title" autocomplete="off">
                <div id="editor">

                </div>
            </div>
            <!--
            <div class="in-detail-tags">
            http://sliptree.github.io/bootstrap-tokenfield/
            <input type="text" class="form-control" id="tokenfield" value="red,green,blue" />

                <span class="single-tag">
                    Generale
                </span>
                <span class="add-tag">
                    Add tag...
                </span>
            </div>-->
        </div>
        <!-- /List -->
    </div>

    <!-- /Note -->

</div>