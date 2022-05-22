@extends('layouts.app')

@section('title', 'Admin panel - List')

@section('content')
    <div class="mt-3">
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('admin.announcements.create') }}">Create announcement</a>
        </div>

        @if (!$announcements->isEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ $announcement->description }}</td>
                            <td>{{ $announcement->price }}</td>
                            <td>
                                <form
                                    method="POST"
                                    action="{{ route('admin.announcements.destroy', [
                                        'announcement' => $announcement,
                                    ]) }}"
                                >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            There is no announcements yet.
        @endif
    </div>
@endsection

