
<!-- Modal -->
<div class="modal modal-effect" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog-effect modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">OK</button>
        </div>
    </div>
    </div>
</div>


<!-- MODAL CATEGORY EDIT -->
<div class="modal fade" id="categoryEdit" tabindex="-1" role="dialog" aria-labelledby="categoryEditTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit <span id="categoryEditTitle"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="category-name">Category Name</label>
                  <input type="text" class="form-control form-control-lg" id="category-name" aria-describedby="emailHelp" placeholder="Enter Category">
                </div>
                <div class="form-group">
                    <label for="category-slug">Example textarea</label>
                    <textarea class="form-control form-control-lg" id="category-slug" rows="3"></textarea>
                </div>
                {{-- <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
                <div class="row">
                    <div class="col-6">
                        <button id="save-category-edit" type="" class="btn btn-success btn-lg btn-block">Submit</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </form>
        </div>
        {{-- <div class="modal-footer">
        </div> --}}
    </div>
    </div>
</div>
{{-- MODAL END CATEGORY EDIT --}}


<script>
    $('.modal-effect').on('show.bs.modal', function (e) {
        $('.modal-effect .modal-dialog-effect').attr('class', 'modal-dialog  flipInX  animated modal-dialog modal-dialog-centered');
    })
        $('.modal-effect').on('hide.bs.modal', function (e) {
        $('.modal-effect .modal-dialog-effect').attr('class', 'modal-dialog  flipOutX  animated modal-dialog modal-dialog-centered');
    })
</script>
