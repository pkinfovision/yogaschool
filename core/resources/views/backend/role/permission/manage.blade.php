@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Roles</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{$role->name}}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Permissions Management</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Permissions Management</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.role.index')}}">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <form id="permissionsForm" class="" action="{{route('admin.role.permissions.update')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="role_id" value="{{Request::route('id')}}">

                @php
                  $permissions = $role->permissions;
                  if (!empty($role->permissions)) {
                    $permissions = json_decode($permissions, true);
                  }
                @endphp

                <div class="form-group">
                  <label for="">Permissions: </label>
                	<div class="selectgroup selectgroup-pills mt-2">
                		<label class="selectgroup-item">
                			<input type="hidden" name="permissions[]" value="Dashboard" class="selectgroup-input">
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Rooms Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Rooms Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Rooms Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Room Bookings" class="selectgroup-input" @if(is_array($permissions) && in_array('Room Bookings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Room Bookings</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Packages Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Packages Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Packages Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Package Bookings" class="selectgroup-input" @if(is_array($permissions) && in_array('Package Bookings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Package Bookings</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Home Page Sections" class="selectgroup-input" @if(is_array($permissions) && in_array('Home Page Sections', $permissions)) checked @endif>
                			<span class="selectgroup-button">Home Page Sections</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Footer" class="selectgroup-input" @if(is_array($permissions) && in_array('Footer', $permissions)) checked @endif>
                			<span class="selectgroup-button">Footer</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Services Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Services Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Services Management</span>
						</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Blogs Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Blogs Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Blogs Managements</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Gallery Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Gallery Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Gallery Management</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="FAQ Management" class="selectgroup-input" @if(is_array($permissions) && in_array('FAQ Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">FAQ Management</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Custom Pages" class="selectgroup-input" @if(is_array($permissions) && in_array('Custom Pages', $permissions)) checked @endif>
                			<span class="selectgroup-button">Custom Pages</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Announcement Popup" class="selectgroup-input" @if(is_array($permissions) && in_array('Announcement Popup', $permissions)) checked @endif>
                			<span class="selectgroup-button">Announcement Popup</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Users Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Users Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Users Management</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Payment Gateways" class="selectgroup-input" @if(is_array($permissions) && in_array('Payment Gateways', $permissions)) checked @endif>
                			<span class="selectgroup-button">Payment Gateways</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Theme & Home" class="selectgroup-input" @if(is_array($permissions) && in_array('Theme & Home', $permissions)) checked @endif>
                			<span class="selectgroup-button">Theme & Home</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Menu Builder" class="selectgroup-input" @if(is_array($permissions) && in_array('Menu Builder', $permissions)) checked @endif>
                			<span class="selectgroup-button">Drag & Drop Menu Builder</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Settings" class="selectgroup-input" @if(is_array($permissions) && in_array('Settings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Settings</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Language Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Language Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Language Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Admins Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Admins Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Admins Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Sitemap" class="selectgroup-input" @if(is_array($permissions) && in_array('Sitemap', $permissions)) checked @endif>
                			<span class="selectgroup-button">Sitemap</span>
                        </label>
                	</div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="permissionBtn" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
