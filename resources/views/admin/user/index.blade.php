@extends('admin.layout.layout')


@section('pageTitle')
    Users
@stop

@section('headerButton')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
@stop

@section('content')

    <table class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {!! Form::open(array('method' => 'post', 'route' => array('admin.user.reset', $user->id))) !!}
                        {!! Form::submit('Send Reset', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop