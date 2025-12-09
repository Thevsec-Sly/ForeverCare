<body class="body">
            <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            </div>
  <div class="flex">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div>
        <div class="sidebar-header">Tailwind School</div>

        <nav class="nav-section">
          <div class="nav-item">
            <div class="nav-icon-label">
              <span>🏠</span><span>Dashboard</span>
            </div>
            <span class="nav-badge">5</span>
          </div>

          <div @click="openMenu === 'Upload' ? openMenu = null : openMenu = 'Upload'" class="nav-item">
            <div class="nav-icon-label">
              <span>🖼️</span><span>Facilities Images</span>
            </div>
          </div>
          <div x-show="openMenu === 'Upload'" class="ml-6 space-y-2 text-sm text-blue-200">
            <div>Brochures</div>
            <div>Fee Structures</div>
            <div>Admission Forms</div>
          </div>

          <div @click="openMenu === 'Announcements' ? openMenu = null : openMenu = 'Announcements'" class="nav-item">
            <div class="nav-icon-label">
              <span>📢</span><span>Announcements</span>
            </div>
          </div>
          <div x-show="openMenu === 'Announcements'" class="ml-6 space-y-2 text-sm text-blue-200">
            <div>Brochures</div>
            <div>Fee Structures</div>
            <div>Admission Forms</div>
          </div>

        <div @click="openMenu === 'Events' ? openMenu = null : openMenu = 'Events'" class="nav-item">
            <div class="nav-icon-label">
              <span>📅</span><span>Events</span>
            </div>
          </div>
          <div x-show="openMenu === 'Events'" class="ml-6 space-y-2 text-sm text-blue-200">
            <div>Brochures</div>
            <div>Fee Structures</div>
            <div>Admission Forms</div>
          </div>

        <div @click="openMenu === 'Upload' ? openMenu = null : openMenu = 'Upload'" class="nav-item">
            <div class="nav-icon-label">
              <span>🖼️</span><span>Facilities Images</span>
            </div>
          </div>
          <div x-show="openMenu === 'Upload'" class="ml-6 space-y-2 text-sm text-blue-200">
            <div>Brochures</div>
            <div>Fee Structures</div>
            <div>Admission Forms</div>
          </div>

          <div @click="openMenu === 'Admission' ? openMenu = null : openMenu = 'Admission'" class="nav-item">
            <div class="nav-icon-label">
              <span>📝</span><span>Admission Info</span>
            </div>
          </div>
          <div x-show="openMenu === 'Admission'" class="ml-6 space-y-2 text-sm text-blue-200">
            <div>Brochures</div>
            <div>Fee Structures</div>
            <div>Admission Forms</div>
          </div>

          <div class="nav-item">
            <div class="nav-icon-label">
              <span>📊</span><span>Reports</span>
            </div>
          </div>
        </nav>

        <div class="team-section">
          <div class="team-title">Your Teams</div>
          <div class="team-item"><span>🅗</span><span>Heroicons</span></div>
          <div class="team-item"><span>🅣</span><span>Tailwind Labs</span></div>
          <div class="team-item"><span>🅦</span><span>Workcation</span></div>
        </div>
      </div>

      <div class="profile-section">
        <img src="https://i.pravatar.cc/40?img=12" alt="Tom Cook" class="profile-avatar" />
        <div class="profile-name">Tom Cook</div>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <!-- Content goes here -->
    </main>
  </div>

</body>