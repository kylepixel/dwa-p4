@extends('layouts/default')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/resource.css') }}" />
@stop

@section('content')
    <h1>{{ $project->title }}</h1>
    <h2>Add Team Member</h2>
    <form id="form_create_member" class="form-resource" method="POST" action="{{ route('project_members.store', ['project_id' => $project->id]) }}">
        <label>
            <span>User</span>
            <select name="user_id">
                <option>Select a user</option>
                @foreach ($all_users as $user)
                    <option value="{{ $user->id }}"{{ old('user_id') == $user->id ? ' selected="selected"' : ''}}>{{ $user->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('user_id'))
                <span class="error">
                    {{ $errors->first('user_id') }}
                </span>
            @endif
        </label>
        <div class="form-resource__button-row">
            <a href="{{ route('projects.show', ['project_id' => $project->id]) }}">Cancel</a>
            <button class="main" form="form_create_member">Add Team Member</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop
