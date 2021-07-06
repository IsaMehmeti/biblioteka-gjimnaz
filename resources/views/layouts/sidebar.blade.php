<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="/">Paneli Kryesor</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class="active"><a href="/"><i class="icon mdi mdi-home"></i><span>Paneli Kryesor</span></a></li>
            <li class="parent {{ Request::is('books*') ? 'open' : '' }}">
              <a href="{{ route('books.index') }}"><i class="icon mdi mdi-book"></i><span>Librat</span></a>
              <ul class="sub-menu">
                <li><a href="{{route('books.index')}}">Librat</a></li>
                <li><a href="{{route('books.create')}}">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('categories*') ? 'open' : '' }}">
              <a href="{{ route('categories.index') }}"><i class="icon mdi mdi-filter-list"></i><span>Kategoritë</span></a>
              <ul class="sub-menu">
                <li><a href="{{route('categories.index')}}">Kategoritë</a></li>
                <li><a href="{{route('categories.create')}}">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('authors*') ? 'open' : '' }}"><a href="{{ route('authors.index') }}"><i class="icon mdi mdi-accounts"></i><span>Autort</span></a>
              <ul class="sub-menu">
                <li><a href="{{route('authors.index')}}">Autort</a></li>
                <li><a href="{{route('authors.create')}}">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('students*') ? 'open' : '' }}">
              <a href="{{ route('students.index') }}"><i class="icon mdi mdi-accounts-alt"></i><span>Nxënsat</span></a>
              <ul class="sub-menu">
                <li><a href="{{route('students.index')}}">Nxënsat</a></li>
                <li><a href="{{route('students.create')}}">Shto</a></li>
              </ul>
            </li>
             <li class="parent {{ Request::is('borrows*') ? 'open' : '' }}">
              <a href="{{ route('borrows.index') }}"><i class="icon mdi mdi-book"></i><span>Huazimet</span></a>
              <ul class="sub-menu">
                <li><a href="{{route('borrows.index')}}">Huazimet</a></li>
                <li><a href="{{route('borrows.create')}}">Shto</a></li>
                <li><a href="{{route('archive.index')}}">Arkivat</a></li>
              </ul>
            </li> 
          </ul>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>