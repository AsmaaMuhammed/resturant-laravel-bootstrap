@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">About</div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4">
                                <a href="{{ url('/admin/about/create') }}" class="btn btn-success btn-sm"
                                   title="Add New About">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>

                            <div class="col-md-5">
                                <form method="GET" action="{{ url('/admin/about') }}" accept-charset="UTF-8"
                                      class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..."
                                               value="{{ request('search') }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-search" type="submit">
                                                <i class="fa fa-search fa-fw"></i>
                                                Search
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Desc</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($about as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ url('storage/'.$item->photo) }}" width="100%" height="50%" alt="" title="" /></td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <a href="{{ url('/admin/about/' . $item->id) }}" title="View About">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ url('/admin/about/' . $item->id . '/edit') }}"
                                               title="Edit About">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i> Edit
                                                </button>
                                            </a>

                                            <form method="POST" action="{{ url('/admin/about' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete About"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $about->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
