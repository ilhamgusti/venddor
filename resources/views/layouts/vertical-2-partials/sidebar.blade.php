      <!-- Left Sidenav -->
      <div class="left-sidenav">
          <!-- LOGO -->
          <div class="topbar-left">
              <a href="/analytics/analytics-index" class="logo">
                  <span>
                      <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                  </span>
                  <span>
                      <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo-large"
                          class="logo-lg logo-light">
                      <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="logo-large"
                          class="logo-lg logo-dark">
                  </span>
              </a>
          </div>
          <!--end logo-->
          <div class="leftbar-profile p-3 w-100">
              <div class="media position-relative">
                  <div class="leftbar-user online">
                      <img src="{{ URL::asset('assets/images/users/user-9.jpg') }}" alt=""
                          class="thumb-md rounded-circle">
                  </div>
                  <div class="media-body align-self-center text-truncate ml-3">
                      <h5 class="mt-0 mb-1 font-weight-semibold">
                          {{ Auth::user()->vendor->name ?? Auth::user()->name }}
                      </h5>
                      <p class="text-uppercase mb-0 font-12">{{ Auth::user()->role }}</p>
                  </div>
                  <!--end media-body-->
              </div>
          </div>
          <ul class="metismenu left-sidenav-menu slimscroll">
              <li class="menu-label">Main</li>

              @yield('sidebarPortion')

              <li class="leftbar-menu-item">
                  <a href="/home" class="menu-link">
                      <i data-feather="monitor" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                      <span>Dashboard</span>
                      <span class="menu-arrow">
                          <i class="mdi mdi-chevron-right"></i>
                      </span>
                  </a>
              </li>
              @canany(['isControlUnit', 'isVendor'])
                  <li class="leftbar-menu-item">
                      <a href="{{ route('proyek.index') }}" class="menu-link">
                          <i data-feather="book-open" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>List Proyek</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isControlUnit', 'isVendor'])
                  <li class="leftbar-menu-item">
                      <a href="{{ route('kontrak.index') }}" class="menu-link">
                          <i data-feather="file-text" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>List Kontrak</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isControlUnit'])
                  <li class="leftbar-menu-item">
                      <a href="{{ route('invoice.index') }}" class="menu-link">
                          <i data-feather="inbox" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>List Invoice</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isSPV'])
                  <li class="leftbar-menu-item">
                      <a href="javascript: void(0);" class="menu-link">
                          <i data-feather="check-square"
                              class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>Approval SPV Proyek</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany

              @canany(['isManager'])
                  <li class="leftbar-menu-item">
                      <a href="javascript: void(0);" class="menu-link">
                          <i data-feather="check-square"
                              class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>App. Manager Proyek</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isDirektur'])
                  <li class="leftbar-menu-item">
                      <a href="javascript: void(0);" class="menu-link">
                          <i data-feather="check-square"
                              class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>App. Direktur Proyek</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isControlUnit', 'isKeuangan'])
                  <li class="leftbar-menu-item">
                      <a href="javascript: void(0);" class="menu-link">
                          <i data-feather="check-square"
                              class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>Approval. Invoice</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
              @canany(['isControlUnit'])
                  <li class="leftbar-menu-item">
                      <a href="javascript: void(0);" class="menu-link">
                          <i data-feather="check-square"
                              class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                          <span>Approval. Tahapan</span>
                          <span class="menu-arrow">
                              <i class="mdi mdi-chevron-right"></i>
                          </span>
                      </a>
                  </li>
              @endcanany
          </ul>

      </div>
      <!-- end left-sidenav-->
