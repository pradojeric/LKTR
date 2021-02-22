<!-- Modal -->
<div class="modal fade" id="copyMoveModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="copyMoveModal"><span id="title"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="course mb-2">
                <select name="course" id="course_selectable" class="form-control">
                    <option selected hidden>Course</option>
                </select>
            </div>
            <div class="subject mb-2" hidden>
                <select name="subject" id="subject_selectable" class="form-control">
                    <option selected hidden>Subject</option>
                </select>
            </div>
            <div class="lesson" hidden>
                <select name="lesson" id="lesson_selectable" class="form-control">
                    <option selected hidden>Lesson</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a class="btn btn-danger disabled" id="confirm_button">Confirm</a>
        </div>
      </div>
    </div>
  </div>
