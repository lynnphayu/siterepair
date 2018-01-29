@extends('layouts.app')
@section('content')
    <div class="columns">
        @include('depSideBar')
        <div class="column">
            @if(Session::has('msg'))
                <p class="is-success">{{ Session::get('msg') }}</p>
            @endif
            <form action="{{ route('admin.insert_course') }}" method="POST">
                {{ csrf_field() }}
                <h3>Select a major</h3>
                <div class="field">
                    @include('admin.selectDep')
                </div>
                <div class="field">
                    <label class="label">
                        Course title
                    </label>
                    <div class="control">
                        <input type="text" name="title" required class="input">
                        @if($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Course Number</label>
                    <div class="control">
                        <input type="text" name="course_number" class="input" required placeholder="ME-20134,etc..."> @if($errors->has('course_number'))
                            <p class="help is-danger">{{ $errors->first('course_number') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Course Type</label>
                    <div class="control">
                        <select name="course_type" class="select">
                            <option value="first">First Semester</option>
                            <option value="second">Second Semester</option>
                        </select> @if($errors->has('course_type'))
                            <p class="help is-danger">{{ $errors->first('course_type') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Course Year</label>
                    <div class="control">
                        <select name="course_year" class="select">
                            <option value="first">First Year</option>
                            <option value="second">Second Year</option>
                            <option value="third">Third Year</option>
                            <option value="fourth">Fourth Year</option>
                            <option value="fifth">Fifth Year</option>
                            <option value="final">Fianl Year</option>
                        </select> @if($errors->has('course_year'))
                            <p class="help is-danger">{{ $errors->first('course_year') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection