
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            <div class="header__wrap"><a class="header__logo" href="index.html"><img src="img/logo.svg" alt="Finlab"></a>
              <nav class="header__navigation">
                <a class="header__link " href="/d2">Dashboard</a>
                <a class="header__link" href="{{ route('users.index') }}">Users</a>
                <a class="header__link active" href="{{ route('accounts.index') }}">Accounts</a>
                <a class="header__link" href="{{ route('invoice.index') }}">Invoice</a>
                <a class="header__link" href="{{ route('expense.index') }}">Expense</a>
                <a class="header__link " href="{{ route('role.index') }}">Roles</a>
                <a class="header__link" href="{{ route('audit.index') }}">Audit</a>
                <a class="header__logout" href="login.html">Log Out</a></nav>
              <button class="header__close">
                <svg class="icon icon-close">
                  <use xlink:href="#icon-close"></use>
                </svg>
              </button>
            </div>
            <div class="header__control">
              <button class="header__search-open">
                <svg class="icon icon-search">
                  <use xlink:href="#icon-search"></use>
                </svg>
              </button>
              <div class="header__box">
                {{-- <form class="search search_light" action="">
                  <input class="search__input" type="text" name="search" placeholder="Search anything here" required="required"/>
                  <button class="search__button">
                    <svg class="icon icon-search">
                      <use xlink:href="#icon-search"></use>
                    </svg>
                  </button>
                </form> --}}
                <button class="header__search-close">
                  <svg class="icon icon-close">
                    <use xlink:href="#icon-close"></use>
                  </svg>
                </button>
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
                  {{-- <a class="button-stroke button-wide" href="notification.html">See more Notification</a> --}}
                </div>
              </div>
              {{-- <a class="header__avatar" href="settings.html"><img src="img/content/avatar.jpg" alt=""></a> --}}
            </div>
            <div class="header__overlay"></div>
          </header>
          {{-- <div class="page__title">Welcome back, Rainer Yaeger 👏🏻</div> --}}
          <div class="page__breadcrumbs"><a class="page__link" href="/accounts"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 17px;"></i></a>
            <svg class="icon icon-arrow-next">
              <use xlink:href="#icon-arrow-next"></use>
            </svg>
            <div class="page__text">Transfer</div>
          </div>
          <div class="page__line">
            {{-- <div class="page__nav"><a class="page__link" href="index.html">Overview</a><a class="page__link active" href="transaction.html">Transaction</a><a class="page__link" href="statistics.html">Statistics</a></div> --}}
            {{-- <div class="page__nav"><a class="page__link active" href="transaction.html">All Users</a></div> --}}
            <div class="page__nav"><a class="page__link" href="{{ route('accounts.index') }}">Account</a><a class="page__link active" href="{{ route('transfer.index') }}">Transfer</a><a class="page__link " href="{{ route('transaction.index') }}">Transaction</a></div>
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

               <div class="card" style="background-color: rgb(17, 14, 111)">
                <h5 class="text-light">Money Transfer</h5>
               <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('transfer.store') }}" enctype="multipart/form-data">
                                @csrf

                               <div class="row">
                                <div class="col-md-4 form-group">
                                    <h5> <label for="from" class="fw-bold">From</label></h5>
                                    <select class="form-control" type="text" name="from" placeholder="Sender account">
                                        <option  disabled selected> Select account</option>
                                          @foreach ($user_acc->accounts as $account)
                                          <option  name="from" value="{{ $account->id }}" @if(old('from') == $account->id) selected @endif>{{ $account->name }}</option>
                                          @endforeach
                                </select>
                                     @error('from')
                                     <span style="color: red">{{ $message }}</span>
                                     @enderror
                                   </div>


                                   <div class="col-md-4 form-group">
                                    <h5> <label for="from" class="fw-bold">To</label></h5>
                                    <select class="form-control" type="text" name="to" placeholder="Sender account" required>
                                        <option  disabled selected> Select account</option>
                                        @foreach ($all_accounts as $account)
                                        <option name="to" value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                                </select>
                                     @error('to')
                                     <span style="color: red">{{ $message }}</span>
                                     @enderror
                                   </div>


                                   <div class="col-md-4 form-group">
                                    <h5> <label for="date" class="fw-bold">Date</label></h5>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" >
                                   @error('date')
                                   <span style="color: red">{{ $message }}</span>
                                   @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <h5> <label for="description" class="fw-bold">Description</label></h5>
                                    <textarea  rows="2"  class="form-control  @error('description') is-invalid @enderror"  name="description"></textarea>
                                    @error('description')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                   </div>

                                <div class="col-md-4 form-group">
                                    <h5> <label for="address" class="fw-bold">Amount</label></h5>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" placeholder="Enter Amount" min="1">
                                   @error('amount')
                                   <span style="color: red">{{ $message }}</span>
                                   @enderror
                                </div>





                                  <div class="col-md-4">
                                <button type="submit" class="mt-4 btn btn-danger"   style="width: 200px;border-radius: 50px">Transfer</button>
                            </div>


                              </form>

                            </div>



                        </div>
                    </div>
                </div></div>
















              </div>
            </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fromDropdown = document.querySelector('[name="from"]');
            var toDropdown = document.querySelector('[name="to"]');


            var initialToOptions = Array.from(toDropdown.options);

            fromDropdown.addEventListener('change', function () {

                toDropdown.disabled = (this.value === "");


                if (this.value !== "") {

                    toDropdown.innerHTML = '';
                    initialToOptions.forEach(function (option) {
                        toDropdown.add(option.cloneNode(true));
                    });


                    var selectedFromAccountId = this.value;
                    Array.from(toDropdown.options).forEach(function (option) {
                        if (option.value == selectedFromAccountId) {
                            option.remove();
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>


</html>
