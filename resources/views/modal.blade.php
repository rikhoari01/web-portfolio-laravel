<div id="modal" class="modal">
      <div class="modal-content">
            <i class="bx bx-x modal-close"></i>

            <h3 class="modal-title"></h3>

            <form action="" class="modal-form" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="text" name="id" id="id" hidden>
                  <div class="form-group group-1">
                        <label for="" class="form-label label-1"></label>
                        <input type="text" name="" id="" class="form-input input-1" placeholder="" value="">
                  </div>
                  <div class="form-group group-2">
                        <label for="" class="form-label label-2"></label>
                        <input type="text" name="" id="" class="form-input input-2" placeholder="" value="">
                  </div>
                  <div class="form-group group-3">
                        <label for="" class="form-label label-3"></label>
                        <input type="text" name="" id="" class="form-input input-3" placeholder="" value="">
                  </div>
                  <div class="form-group group-4">
                        <label for="work_link" class="form-label label-4">Link</label>
                        <input type="url" name="work_link" id="work_link" class="form-input input-4" placeholder="Your Work Demo URL" value="">
                  </div>
                  <div class="form-group group-5">
                        <label for="work_category" class="form-label label-5">Category</label>
                        <select class="form-input input-5" name="work_category" id="work_category">
                              <option value="" hidden>Work Category</option>
                              <option value="web">Web</option>
                              <option value="app">App</option>
                              <option value="other">Other</option>
                        </select>
                  </div>
                  <div class="form-group group-6">
                        <label for="work_img" class="form-label label-6">Work Image</label>
                        <input type="file" name="work_img" id="work_img" class="form-input input-6" onchange="inputFile(this.id)">
                        <input type="text" name="old_work_img" id="old_work_img" hidden>
                        <input type="text" name="url_work_img" id="url_work_img" hidden>
                  </div>

                  <button class="button" id="modalBtn">
                        <div class="lds-dual-ring" style="display: none"></div>
                        <div class="btn-text">SAVE</div>
                  </button>
            </form>
      </div>
</div>

<div id="deleteModal" class="deleteModal">
      <div class="modal-content">
            <h3 class="delete-text">Are you sure to remove this skill?</h3>

            <div class="modal-button">
                  <button class="no-button">NO</button>
                  <form action="" method="POST" class="delete-form">
                        @csrf
                        @method('delete')
                        <input type="text" name="id" id="del_id" hidden>
                        <button class="yes-button button">YES</button>
                  </form>
            </div>
      </div>
</div>