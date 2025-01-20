<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('passage.create') }}">
          <i class="bi bi-person"></i>
          <span>Set Passage</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('passage.list') }}">
          <i class="bi bi-question-circle"></i>
          <span>All Passage</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.list') }}">
          <i class="bi bi-question-circle"></i>
          <span>All Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('setting.create') }}">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
        </a>
      </li>
    </ul>

  </aside>
