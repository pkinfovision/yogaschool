<ul class="nav nav-pills flex-column">
  @foreach($root_folders as $root_folder)
    <li class="nav-item">
      <a class="nav-link" href="#" data-type="0" onclick="moveToNewFolder(`{{$root_folder->url}}`)">
        @php
            if ($root_folder->name == 'Files') {
                $root_folder->name = 'My Files';
            }
        @endphp
        <i class="fa fa-folder fa-fw"></i> {{ $root_folder->name }}
        <input type="hidden" id="goToFolder" name="goToFolder" value="{{ $root_folder->url }}">
        <div id="items">
          @foreach($items as $i)
            <input type="hidden" id="{{ $i }}" name="items[]" value="{{ $i }}">
          @endforeach
        </div>
      </a>
    </li>
    @foreach($root_folder->children as $directory)
    <li class="nav-item sub-item">
      <a class="nav-link" href="#" data-type="0" onclick="moveToNewFolder(`{{$directory->url}}`)">
        <i class="fa fa-folder fa-fw"></i> {{ $directory->name }}
        <input type="hidden" id="goToFolder" name="goToFolder" value="{{ $directory->url }}">
        <div id="items">
          @foreach($items as $i)
            <input type="hidden" id="{{ $i }}" name="items[]" value="{{ $i }}">
          @endforeach
        </div>
      </a>
    </li>
    @endforeach
  @endforeach
</ul>

<script src="{{asset('assets/js/file-manager-tools.js')}}"></script>
