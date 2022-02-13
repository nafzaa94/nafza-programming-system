<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-block align-items-start sidebar collapse p-4" style="margin-top: 80px; background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); height: 370px">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link fw-bold {{ Request::is('profile/*') ? 'active' : '' }} {{ Request::is('profileproject/*') ? 'active' : '' }}" style="color: #C0392B" aria-current="page" href="/profile/{{auth()->user()->id}}">
            <i class="bi bi-person-circle"></i>
            My Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" style="color: #C0392B" href="/orderproject/purchases/{{auth()->user()->id}}">
            <i class="bi bi-bag"></i>
            My Purchases
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold {{ Request::is('mypayment/*') ? 'active' : '' }}" style="color: #C0392B" href="/mypayment/{{auth()->user()->id}}">
              <i class="bi bi-credit-card-2-front"></i>
              My Payments
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" style="color: #C0392B" href="#">
            <i class="bi bi-bug"></i>
            Reports
          </a>
        </li>
      </ul>
    </div>
    <div class="position-sticky pt-3 mt-5">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link fw-bold" style="color: #C0392B" href="#">
                <i class="bi bi-gear"></i>
                Setting
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" style="color: #C0392B" href="#">
                <i class="bi bi-patch-question"></i>
                Help & Feedback
              </a>
            </li>
          </ul>
    </div>
</nav>