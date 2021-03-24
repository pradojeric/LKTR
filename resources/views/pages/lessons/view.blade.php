@extends('layouts.app')

@section('content')
<div class="container-fluid">
@include('pages.questions._modal')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h3 class="text-center text-white my-5">{{ $lesson->name }}</h3>
        <h6 class="text-center text-white">{{ $lesson->subject->course->name }}</h6>
    </div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-11">
        <a href="{{ route('subjects.lessons.index', $lesson->subject) }}" type="button" class="btn btn-danger my-3"><i class="fa fa-arrow-left mr-1"></i>Back</a>
        <a href="{{ route('lessons.questions.create', $lesson) }}" type="button" class="btn btn-primary my-3"><i class="fa fa-plus mr-1"></i>Add Question</a>
            <div class="card p-4 shadow-sm rounded">
                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th width="1%">No.</th>
                        <th width="30%">Questions</th>
                        <th width="30%">Choices</th>
                        <th width="30%">Justification</th>
                        <th width="9%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lesson->questions as $question)
                            <tr>
                                <td class="question_row">{{ $loop->iteration }}</td>
                                <td style="white-space: pre-wrap">{{ $question->question_text }}</td>
                                <td>
                                    @foreach($question->answers as $answer)
                                        <div class="col-sm-12 @if($answer->correct == 1) bg-info text-white @endif border border-dark">{{ $answer->choice_text }}</div>
                                    @endforeach
                                </td>
                                <td style="white-space: pre-wrap">{{ $question->justification }}</td>
                                <td>
                                    <button type="button" data-id={{ $question->id }} id="enable_button" data-enabled={{ $question->enabled }}  class="dropdown-item
                                        @if($question->enabled == 1)
                                            text-success"><i class="fa fa-check mr-1"></i>Enabled
                                        @else
                                            text-danger"><i class="fa fa-times mr-1"></i>Disabled
                                        @endif
                                    </button>
                                    <button type="button" class="dropdown-item copy" data-question="{{ $question->id }}"><i class="fa fa-copy mr-1"></i>Copy</button>
                                    <button type="button" class="dropdown-item move" data-question="{{ $question->id }}"><i class="fa fa-paste mr-1"></i>Move</button>
                                    <a href="{{ route('questions.edit', $question) }}" class="dropdown-item text-info">
                                        <i class="fa fa-edit mr-1"></i>Edit
                                    </a>
                                    @can('admin-only')
                                        <form action="{{ route('questions.destroy', $question) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.table').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });

    $(document).ready(function(){

        //ENABLE BUTTON
        $(document).on('click', '#enable_button', function(event){
            event.preventDefault();

            var id = $(this).data('id');
            var button = $(this);
            var row = button.closest('tr');
            var enable = $(this).data('enabled');
            var url = "{{ url('question/enable') }}/" + id;
            var _token = $('meta[name=csrf-token]').attr('content');
            var status;
            if(enable == 1) status = 0;
            else if(enable == 0) status = 1;

            $.ajax({
                url: url,
                type: 'post',
                data: { _token: _token, question: id, enabled: status },
                beforeSend: function(){
                    button.attr('disabled', true);
                },
                success: function(data){
                    button.attr('disabled', false);
                    button.data('enabled', data.enabled);
                    if(data.enabled == 1)
                    {
                        button.removeClass('text-danger');
                        button.addClass('text-success');
                        button.html('<i class="fa fa-check mr-1"></i>Enabled')
                    }
                    else
                    {
                        button.removeClass('text-success');
                        button.addClass('text-danger');
                        button.html('<i class="fa fa-times mr-1"></i>Disabled')
                    }
                },
            });
        });
        //END ENABLE BUTTON


        //COPY OR MOVE
        var modal = $('#copyMoveModal');
        var course_id, subject_id, lesson_id, question_id, url_action;

        function setAction(action, url){
            modal.find('#title').text(action);
            $.ajax({
                url: url,
                success: function(data){
                    modal.find('#course_selectable').append(data);
                    modal.modal('show');
                },
            });
        }

        $(document).on('click', '.copy', function(event){
            event.preventDefault();
            var action = "Copy to";
            question_id = $(this).data('question');
            url_action = "{{ url('/question/copy') }}";
            var url = "{{ url('/question/get_courses') }}";

            setAction(action, url);

        });

        $(document).on('click', '.move', function(event){
            event.preventDefault();
            var action = "Move to";
            url_action = "{{ url('/question/move') }}";
            question_id = $(this).data('question');
            var modal = $('#copyMoveModal');
            var url = "{{ url('/question/get_courses') }}";

            setAction(action, url);
        });

        $('#course_selectable').on('change', function(event){
            var url = "{{ url('/question/get_subjects') }}/" + $(this).val();
            $.ajax({
                url: url,
                success: function(data){
                    modal.find('.s').remove();
                    modal.find('.lesson').attr('hidden', true);
                    modal.find('#subject_selectable').append(data);
                    modal.find('.subject').attr('hidden', false);
                },
            });
        });

        $('#subject_selectable').on('change', function(event){
            var url = "{{ url('/question/get_lessons') }}/" + $(this).val();
            $.ajax({
                url: url,
                success: function(data){
                    modal.find('.l').remove();
                    modal.find('#lesson_selectable').append(data);
                    modal.find('.lesson').attr('hidden', false);
                },
            });
        });

        $('#lesson_selectable').on('change', function(event){
            lesson_id = $(this).val();
            url_action += "/" + lesson_id + "/" + question_id;

            $('#confirm_button').removeClass('disabled');
            $('#confirm_button').attr('href', url_action);
        });

        modal.on('hidden.bs.modal', function(event){
            modal.find('.subject').attr('hidden', true);
            modal.find('.lesson').attr('hidden', true);
            modal.find('.c').remove();
            modal.find('.s').remove();
            modal.find('.l').remove();

            $('#confirm_button').addClass('disabled');
        });

        //END COPY OR MOVE
    });
</script>
@endsection
