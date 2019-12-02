<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <router-link :to="{ name: 'Dashboard' }"
                class="nav-link"
                active-class="active"
                exact>
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                    Dashboard
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'BankAccount' }"
                class="nav-link"
                active-class="active">
                <i class="nav-icon fa fa-cube"></i>
                <p>
                    Bank Account
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link :to="{ name: 'Setting' }"
                class="nav-link"
                active-class="active">
                <i class="nav-icon fa fa-cube"></i>
                <p>
                    Company Info
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-cube"></i>
                <p>
                    Logout
                </p>
            </a>
            <form id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</nav>