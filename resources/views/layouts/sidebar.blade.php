<div class="left-side-menu">
  <div class="slimscroll-menu">
    <!-- Sidebar Menu -->
    <div id="sidebar-menu">
      <ul class="metismenu" id="side-menu">
        <li class="menu-title">Navigation</li>

        {{-- Looping menu tanpa parent --}}
        @foreach(auth()->user()->allMenus()->whereNull('parent_id')->sortBy('order_num') as $menu)
          <li>
            <a href="{{ $menu->route ? url($menu->route) : '#' }}">
              <i class="{{ $menu->icon }}"></i>
              <span> {{ $menu->title }} </span>
              @if($menu->children->count())
                <span class="menu-arrow"></span>
              @endif
            </a>

            {{-- Jika punya anak menu --}}
            @if ($menu->children->count())
              <ul class="nav-second-level" aria-expanded="false">
                @foreach($menu->children as $submenu)
                  @if(auth()->user()->allMenus()->contains($submenu))
                    <li><a href="{{ url($submenu->route) }}">{{ $submenu->title }}</a></li>
                  @endif
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach

      </ul>
    </div>
    <div class="clearfix"></div>
  </div> <!-- end slimscroll-menu-->
</div> <!-- end left-side-menu -->
