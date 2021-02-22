<!-- Modal -->
<div class="modal fade" id="versionModal" tabindex="-1" role="dialog" aria-labelledby="versionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="versionModal">Version <span id="versionTitle"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="version-form">
            @csrf
            <span id="version_num"></span>
            <input type="text" name="version" class="form-control" id="version">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('version-form').submit();">Confirm</button>
        </div>
      </div>
    </div>
  </div>
