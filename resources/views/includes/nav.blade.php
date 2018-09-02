<nav class="navbar fixed-bottom navbar-expand-xs navbar-dark bg-dark navbar-laravel">
    <div class="container">
        @auth
        <div class="collapse" id="filter-form">
            <div class="bg-dark">
                <form class='form-inline' method='GET' action="{{ route('index') }}">
                    @csrf
                    <div class='form-group'>
                        <select name="category" id="category" class='custom-select custom-select-sm'>
                            <option value="">Category</option>
                            <option value="Income">Income</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Gas">Gas</option>
                            <option value="Groceries">Groceries</option>
                            <option value="Eating Out">Eating Out</option>
                            <option value="Shopping">Shopping</option>
                            <option value="Rent">Rent</option>
                            <option value="Phone">Phone</option>
                            <option value="Internet">Internet</option>
                            <option value="Electric">Electric</option>
                            <option value="Car Insurance">Car Insurance</option>
                            <option value="Health Insurance">Health Insurance</option>
                            <option value="Car">Car</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <select name="month" id="month" class="custom-select custom-select-sm">
                            <option value="">Month</option>
                            <option value=01>January</option>
                            <option value=02>February</option>
                            <option value=03>March</option>
                            <option value=04>April</option>
                            <option value=05>May</option>
                            <option value=06>June</option>
                            <option value=07>July</option>
                            <option value=08>August</option>
                            <option value=09>September</option>
                            <option value=10>October</option>
                            <option value=11>November</option>
                            <option value=12>December</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <select name="year" id="year" class="custom-select custom-select-sm">
                            <option value="">Year</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <button type='submit' class='btn btn-outline-success m-auto'>Submit</button>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-dark bg-dark mr-auto">
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#filter-form" aria-controls="filter-form" aria-expanded="false" aria-label="Toggle navigation">
                Filter
            </button>
        </nav>
        @endauth

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-right">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">View Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">Add Transaction</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>