<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('dashboard') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- All Statics Pages -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
      </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Static Pages</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Sliders</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="{{ route('about.manage') }}" class="menu-link">
                  <div data-i18n="Account">About</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Services</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Team</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Newsletter</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Testimonial</div>
                </a>
              </li>
        </ul>
      </li>

      <!-- All Options -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Options</span>
      </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Main Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="pages-account-settings-account.html" class="menu-link">
              <div data-i18n="Account">Settings</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>
