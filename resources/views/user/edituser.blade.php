<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Finlab</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="Finlab: coded finance dashboard" content="Production-ready finance dashboard coded in ReactJS and HTML">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ui8">
    <meta name="twitter:title" content="Finlab: coded finance dashboard">
    <meta name="twitter:description" content="Production-ready finance dashboard coded in ReactJS and HTML">
    <meta name="twitter:creator" content="@ui8">
    <meta name="twitter:image" content="https://ui8-finlab.herokuapp.com/img/twitter-card.jpg">
    <meta property="og:title" content="Finlab: coded finance dashboard">
    <meta property="og:type" content="Article">
    <meta property="og:url" content="https://ui8.net/pickolab-studio/products/finlab---finance-dashboard-ui">
    <meta property="og:image" content="https://ui8-finlab.herokuapp.com/img/fb-og-image.jpg">
    <meta property="og:description" content="Production-ready finance dashboard coded in ReactJS and HTML">
    <meta property="og:site_name" content="Finlab: coded finance dashboard">
    <meta property="fb:admins" content="132951670226590">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="all" href="{{ asset('css/app.min.css') }}">



    <script>
      let viewportmeta = document.querySelector('meta[name="viewport"]');
      if (viewportmeta) {
        if (screen.width < 375) {
          let newScale = screen.width / 375;
          viewportmeta.content = 'width=375, minimum-scale=' + newScale + ', maximum-scale=1.0, user-scalable=no, initial-scale=' + newScale + '';
        } else {
          viewportmeta.content = 'width=device-width, maximum-scale=1.0, initial-scale=1.0';
        }
      }
    </script>



  </head>
  <body>
    <!-- page-->
    <div class="page">
      <div class="page__head">
        <div class="container page__container">
          <header class="header">
            <button class="header__burger">
              <svg class="icon icon-burger">
                <use xlink:href="#icon-burger"></use>
              </svg>
            </button>
            <div class="header__wrap">
                 <a class="header__logo" href="index.html">
                    {{-- <img src="img/logo.svg" alt="Finlab"> --}}
                </a>
              <nav class="header__navigation">
                <a class="header__link " href="/d2">Dashboard</a>
                @if (Auth::user()->hasPermission('view_user'))

                <a class="header__link active" href="{{ route('users.index') }}">Users</a>
                @endif
                @if (Auth::user()->hasPermission('view_account'))

                <a class="header__link" href="{{ route('accounts.index') }}">Accounts</a>
                @endif

                @if (Auth::user()->hasPermission('view_invoice'))
                <a class="header__link" href="{{ route('invoice.index') }}">Invoice</a>
                @endif

                @if (Auth::user()->hasPermission('view_expense'))
                <a class="header__link" href="{{ route('expense.index') }}">Expense</a>
                @endif

                @if (Auth::user()->hasPermission('view_roles'))
                <a class="header__link" href="{{ route('role.index') }}">Roles</a>
                @endif
                @if (Auth::user()->hasPermission('view_audit'))
                <a class="header__link" href="{{ route('audit.index') }}">Audit</a>
                @endif
                {{-- <a class="header__logout" href="login.html">Log Out</a> --}}
            </nav>
              <button class="header__close">
                <svg class="icon icon-close">
                  <use xlink:href="#icon-close"></use>
                </svg>
              </button>
            </div>
            <div class="header__control">
              {{-- <button class="header__search-open">
                <svg class="icon icon-search">
                  <use xlink:href="#icon-search"></use>
                </svg>
              </button> --}}
              <div class="header__box">
                {{-- <form class="search search_light" action="">
                  <input class="search__input" type="text" name="search" placeholder="Search anything here" required="required"/>
                  <button class="search__button">
                    <svg class="icon icon-search">
                      <use xlink:href="#icon-search"></use>
                    </svg>
                  </button>
                </form> --}}
                {{-- <button class="header__search-close">
                  <svg class="icon icon-close">
                    <use xlink:href="#icon-close"></use>
                  </svg>
                </button> --}}
              </div>
              <!-- notification-->
              <div class="notification">
                {{-- <button class="notification__button">
                  <svg class="icon icon-notification">
                    <use xlink:href="#icon-notification"></use>
                  </svg>
                </button> --}}
                <div class="notification__body">
                  <div class="notification__title">Notification</div>
                  <div class="notification__group">
                    <div class="notification__item">
                      <div class="notification__icon"><img src="img/content/success.svg" alt=""></div>
                      <div class="notification__details">
                        <div class="notification__line">
                          <div class="notification__subtitle">Transfer Success</div>
                          <div class="notification__time">2 m</div>
                          <div class="notification__new"></div>
                        </div>
                        <div class="notification__info">You have successfully sent <span>johnatan</span> $10.00</div>
                      </div>
                    </div>
                    <div class="notification__item">
                      <div class="notification__icon"><img src="img/content/success.svg" alt=""></div>
                      <div class="notification__details">
                        <div class="notification__line">
                          <div class="notification__subtitle">Transfer Success</div>
                          <div class="notification__time">30 m</div>
                          <div class="notification__new"></div>
                        </div>
                        <div class="notification__info">You have successfully sent <span>Startbucks</span> $532.11</div>
                      </div>
                    </div>
                    <div class="notification__item">
                      <div class="notification__icon"><img src="img/content/recheive.svg" alt=""></div>
                      <div class="notification__details">
                        <div class="notification__line">
                          <div class="notification__subtitle">Recheive $100.00</div>
                          <div class="notification__time">3h</div>
                        </div>
                        <div class="notification__info">You received a payment from <span>Fiver Inter</span> of $100.00</div>
                      </div>
                    </div>
                    <div class="notification__item">
                      <div class="notification__icon"><img src="img/content/recheive.svg" alt=""></div>
                      <div class="notification__details">
                        <div class="notification__line">
                          <div class="notification__subtitle">Recheive $155.00</div>
                          <div class="notification__time">4h</div>
                        </div>
                        <div class="notification__info">You received a payment from <span>Fiver Inter</span> of $155.00</div>
                      </div>
                    </div>
                  </div>
                  <a class="button-stroke button-wide" href="notification.html">See more Notification</a>
                </div>
              </div>
              {{-- <a class="header__avatar" href="settings.html"><img src="img/content/avatar.jpg" alt=""></a> --}}
            </div>
            <div class="header__overlay"></div>
          </header>
          {{-- <div class="page__title">Welcome back, Rainer Yaeger 👏🏻</div> --}}
          <div class="page__breadcrumbs"><a class="page__link" href="/users"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 17px;"></i></a>
            <svg class="icon icon-arrow-next">
              <use xlink:href="#icon-arrow-next"></use>
            </svg>
            <div class="page__text">Edit Users</div>
          </div>
          <div class="page__line">
            {{-- <div class="page__nav"><a class="page__link" href="index.html">Overview</a><a class="page__link active" href="transaction.html">Transaction</a><a class="page__link" href="statistics.html">Statistics</a></div> --}}
            {{-- <div class="page__nav"><a class="page__link active" href="transaction.html">Add Users</a></div> --}}
            <div class="page__nav"><a class="page__link active" href="{{ route('users.index') }}">Users</a></div>
            <div class="page__date">
                {{-- <input class="js-date-range" type="text" name="date" data-format="MMM DD,YYYY" data-single-month="true" data-single-date="true" data-container=".page__date" readonly>
                <svg class="icon icon-calendar">
                  <use xlink:href="#icon-calendar"></use>
                </svg> --}}
              </div>
          </div>
        </div>
      </div>
      <div class="page__body">
        <div class="container page__container">
          <!-- transactions-->

          <div class="transactions">
            <form method="post" action="{{ route('users.update',$users->id) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                 <h5> <label for="name" class="fw-bold">Name</label></h5>
                  <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value="{{ $users->name}}">
                  <div>@error('name')
                      <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>
            </div> <br>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <h5> <label for="email" class="fw-bold">Email</label></h5>
                     <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email"  value="{{ $users->email}}">
                   <div>@error('email')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
            </div><br>
        </div>
        <div class="col-md-6">
                   <div class="form-group">
                    <h5> <label for="phone" class="fw-bold">Phone</label></h5>
                     <input type="number" class="form-control  @error('phone') is-invalid @enderror"     name="phone" id="phone"   value="{{ $users->phone}}"   placeholder="Enter  phone">
                   <div>@error('phone')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
            </div><br>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <h5><label for="account" class="fw-bold">Account</label></h5>
                <div class="dropdown">
                    <button class="border btn btn-light dropdown-toggle w-100" type="button" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select accounts
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="accountDropdown">
                        @foreach ($allAccounts as $account)
                            <div class="px-5 form-check">
                                <input class="form-check-input" type="checkbox" name="accounts[]" id="account{{ $account->id }}" value="{{ $account->id }}" style="font-size: 18px;"
                                {{ $users->accounts->contains($account->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="account{{ $account->id }}">
                                    {{ $account->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                    </div>
                </div>



        <div class="col-md-6">
                   <div class="form-group">
                    <h5> <label for="password" class="fw-bold">Password</label></h5>
                     <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password')}}" placeholder="Enter Password">
                   <div>@error('password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
            </div><br>
        </div>


        <div class="col-md-6">
                   <div class="form-group">
                    <h5> <label for="cpassword" class="fw-bold">Confirm Password</label></h5>
                     <input type="password" class="form-control  @error('cpassword') is-invalid @enderror"    name="cpassword" id="cpassword" placeholder="">
                   <div>@error('cpassword')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
            </div><br>
        </div>
        <div class="col-md-6">
                   <div class="form-group">
                    <h5> <label for="role" class="fw-bold">Role</label></h5>
                 <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                    @if($role->id!==1)
                    <option value={{ $role->id }} class="form-control"  style="font-size: 18px;"
                        {{ $users->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endif
                  @endforeach
                 </select>

                   </div><br>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <h5> <label for="status" class="fw-bold">Status</label></h5>
                 <select name="status" id="status" class="form-control">
                    <option value="0" class="form-control"{{ $users->status == 0 ? 'selected' : '' }}>disable</option>
                    <option value="1" class="form-control"{{ $users->status == 1 ? 'selected' : '' }}>enable</option>

                 </select>

                   </div>
                </div>


                </div>
                <button type="submit" class="mt-5 btn btn-primary">Edit User</button>
              </form>

              </div>
            </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
