@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Rooms</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{ route('admin.dashboard') }}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Rooms Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Rooms</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title d-inline-block">Rooms</div>
            </div>

            <div class="col-lg-4 mt-2 mt-lg-0">
              <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left">
                <i class="fas fa-plus"></i> {{ __('Add') }}
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($rooms) == 0)
                <h3 class="text-center mt-2">NO ROOMS FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">Type</th>
                        <th scope="col">Building</th>
                        <th scope="col">Floor</th>
                        <th scope="col">Description</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($rooms as $room)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $room->name }}</td>
                          <td>{{ $room->type }}</td>
                          <td>{{ $room->getBuilding->name }}</td>
                          <td>{{ $room->floor }}</td>
                          <td>{{ $room->description }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $room->id }}" data-name="{{ $room->name }}" data-type="{{ $room->type }}" data-building="{{ $room->getBuilding->id }}" data-floor="{{ $room->floor }}" data-description="{{ $room->description }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ url('admin/roomsManagement/delete', ['id' => $room->id]) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                {{ __('Delete') }}
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card-footer"></div>
      </div>
    </div>
  </div>

  {{-- create modal --}}
  @includeIf('backend.roomsManagement.create')

  {{-- edit modal --}}
  @includeIf('backend.roomsManagement.edit')
@endsection
