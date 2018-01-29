@extends('layouts.app') @section('content')
    <div class="columns">
        @include('depSideBar')
        <div class="column">
            <div class="content">
                <h3>Edit a department</h3>
                @if(Session::has('msg'))
                    <p class="is-success">{{ Session::get('msg') }}</p>
                @endif
                <form action="{{ route('admin.updateDep',$dep->name) }}" method="POST">
                    {{ csrf_field() }}
                    <h5>Department name : {{ ucwords($dep->name) }}</h5>
                    <div class="field">
                        <label class="label">History</label>
                        <div class="control">
                            <textarea name="history"
                                      class="textarea">{{ $dep->history }}</textarea> @if($errors->has('history'))
                                <p class="help is-danger">{{ $errors->first('history') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mission</label>
                        <div class="control">
                            <textarea name="mission"
                                      class="textarea">{{ $dep->mission }}</textarea> @if($errors->has('mission'))
                                <p class="help is-danger">{{ $errors->first('mission') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Vision</label>
                        <div class="control">
                            <textarea name="vision"
                                      class="textarea">{{ $dep->vision }}</textarea>@if($errors->has('vision'))
                                <p class="help is-danger">{{ $errors->first('vision') }}</p>
                            @endif
                        </div>
                    </div>
                    @if($dep->degrees->count() > 0)
                        <h4>Degrees</h4>
                        @foreach($dep->degrees as $index)
                            <div class="field additional-info" id="{{ $index->id.'deg' }}">
                                <div class="control">
                                    <input type="text" name="deg_title[{{ $index->id }}}]"
                                           value="{{ $index->deg_title }}"/>
                                    <a class="delete-deg" id="{{ $index->id }}">Delete this degree
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if($dep->research->count() > 0)
                        <h4>Research</h4>
                        @foreach($dep->research as $index)
                            <div class="field additional-info" id="{{ $index->id.'research' }}">
                                <img src="{{ asset('uploads/'.$index->img_dir) }}" class="image is-128x128">
                                <label class="label">Research title: </label>
                                <input type="text" name="title[{{ $index->id }}]" value="{{ $index->title }}">
                                <label class="label">Research Year: </label>
                                <input type="text" name="year[{{ $index->id }}]" value="{{ $index->year }}">
                                <label class="label">Description: </label>
                                <textarea class="textarea"
                                          name="description[{{ $index->id }}]">{{ $index->description }}</textarea>
                                <a class="delete-research" id="{{ $index->id }}">Delete this research
                                </a>
                            </div>
                        @endforeach
                    @endif
                    @if($dep->staff->count() > 0)
                        <h4>Staff </h4>
                        @foreach($dep->staff as $index)
                            <div class="field additional-info" id="{{$index->id.'staff'}}">
                                <img src="{{ asset('staff_photos/'.$index->img_dir) }}" class="image is-128x128">
                                <label class="label">Name:</label>
                                <input type="text" name="staff_name[{{ $index->id }}]" value="{{ $index->staff_name }}">
                                <label class="label">Title:</label>
                                <input type="text" name="staff_title[{{ $index->id }}]" value="{{ $index->title }}">
                                <label class="label">Research Area:</label>
                                <input type="text" name="research_area[{{ $index->id }}]"
                                       value="{{ $index->research_area }}">
                                <label class="label">Current Research:</label>
                                <input type="text" name="current_research[{{ $index->id }}]"
                                       value="{{ $index->current_research }}">
                                <a class="delete-staff" id="{{ $index->id }}">Delete this member
                                </a>
                            </div>
                        @endforeach
                    @endif
                    @if($dep->courses->count() > 0)
                        <h4>Courses</h4>
                        @foreach($dep->courses as $index)
                                <div class="field additional-info" id="{{ $index->id.'course' }}">
                                    <label class="label">Title:</label>
                                    <input type="text" name="course_title[{{ $index->id }}]" value="{{ $index->title }}">
                                    <label class="label">Course Number: </label>
                                    <input type="text" name="course_number[{{ $index->id }}]" value="{{ $index->course_number }}">
                                    <p>Course Type:  {{ $index->course_type }}</p>
                                    <p>Course Year: {{ $index->course_year }}</p>
                                    <a class="delete-course" id="{{ $index->id }}">Delete</a>
                                </div>
                        @endforeach
                    @endif
                    <div class="field">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete-deg').click(function (e) {
                e.preventDefault();
                if (confirm('Are you sure')) {
                    var id = $(this).attr('id');
                    $.get('/admin/delete_deg/' + id, function () {
                        $('#' + id + 'deg').remove();
                    });
                }
            });

            $('.delete-research').click(function (e) {
                if (confirm('Are you sure')) {
                    var id = $(this).attr('id');
                    $.get('/admin/delete_research/' + id, function () {
                        $('#' + id + 'research').remove();
                    });
                }
            });
            $('.delete-staff').click(function (e) {
                if (confirm('Are you sure')) {
                    var id = $(this).attr('id');
                    $.get('/admin/delete_staff/' + id, function () {
                        $('#' + id + 'staff').remove();
                    });
                }
            });
            $('.delete-course').click(function (e) {
                if (confirm('Are you sure')) {
                    var id = $(this).attr('id');
                    $.get('/admin/delete_course/' + id, function () {
                        $('#' + id + 'course').remove();
                    });
                }
            });
        });

    </script>
@endsection
@section('style')
    <style type="text/css">
        h4 {
            text-decoration: underline;
            color: #01579B;
        }

        div.additional-info {
            padding: 2em;
            border: #616161 1px solid;
            border-radius: 20px;
        }
    </style>
@endsection