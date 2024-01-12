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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

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
            <div class="header__wrap"><a class="header__logo" href="index.html"><img src="img/logo.svg" alt="Finlab"></a>
              <nav class="header__navigation">
                <a class="header__link " href="/d2">Dashboard</a>
                @if (Auth::user()->hasPermission('view_user'))

                <a class="header__link" href="{{ route('users.index') }}">Users</a>
                @endif
                @if (Auth::user()->hasPermission('view_account'))

                <a class="header__link" href="{{ route('accounts.index') }}">Accounts</a>
                @endif

                @if (Auth::user()->hasPermission('view_invoice'))
                <a class="header__link active" href="{{ route('invoice.index') }}">Invoice</a>
                @endif

                @if (Auth::user()->hasPermission('view_expense'))
                <a class="header__link " href="{{ route('expense.index') }}">Expense</a>
                @endif

                @if (Auth::user()->hasPermission('view_roles'))
                <a class="header__link" href="{{ route('role.index') }}">Roles</a>
                @endif
                @if (Auth::user()->hasPermission('view_audit'))
                <a class="header__link" href="{{ route('audit.index') }}">Audit</a>
                @endif


                </a></nav>
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
                  </div><a class="button-stroke button-wide" href="/notification">See more Notification</a>
                </div>
              </div>
              {{-- <a class="header__avatar" href="settings.html"><img src="img/content/avatar.jpg" alt=""></a> --}}
            </div>
            <div class="header__overlay"></div>
          </header>
          {{-- <div class="page__title">Welcome back, Rainer Yaeger 👏🏻</div> --}}
          <div class="page__breadcrumbs"><a class="page__link" href="/d2">Dashboard</a>
            <svg class="icon icon-arrow-next">
              <use xlink:href="#icon-arrow-next"></use>
            </svg>
            <div class="page__text">Customer</div>
          </div>
          <div class="page__line">
            <div class="page__nav">
                <div class="page__nav"><a class="page__link " href="{{ route('invoice.index') }}">Invoice</a><a class="page__link active" href="{{ route('customer.index') }}">Customer</a></div>
            </div>
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
            <div class="transactions__head">
              {{-- <form class="search" action="">
                <input class="search__input" type="text" id="search" name="search" placeholder="Search for transaction here" required="required"/>

                <button class="search__button">
                  <svg class="icon icon-search">
                    <use xlink:href="#icon-search"></use>
                  </svg>
                </button>
              </form> --}}
               <div class="transactions__btns">
                {{-- <button class="button-stroke transactions__button transactions__filter">
                  <svg class="icon icon-filter">
                    <use xlink:href="#icon-filter"></use>
                  </svg><span>Filter</span>
                </button> --}}
                 {{-- <a class="button-stroke transactions__button js-popup-open" href="#popup-export" data-type="inline" data-effect="mfp-zoom-in"> --}}
                  {{-- <svg class="icon icon-export">
                    <use xlink:href="#icon-export"></use>
                  </svg><span>Export</span></a> --}}



              </div>
            </div>
            <div class="transactions__filters">
              <div class="transactions__form">
                <!-- drop-->
                <form id="filterForm">
                    <div class="form-group">
                        <label for="transactionType">Transaction Type:</label>
                        <select class="form-control" id="transactionType" name="transactionType">
                            <option value="all">All</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Expense">Expense</option>
                            <option value="Invoice">Invoice</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                </form>
                <!-- drop-->
                {{-- <div class="drop drop_medium js-drop">
                  <div class="drop__head js-drop-head"> --}}
                    {{-- <div class="drop__title js-drop-title">Business type</div> --}}
                    {{-- <div class="drop__icon">
                      <svg class="icon icon-arrow-down">
                        <use xlink:href="#icon-arrow-down"></use>
                      </svg>
                    </div>
                  </div>
                  <div class="drop__body js-drop-body"><a class="drop__option js-drop-option selected" href="#">
                      <div class="drop__text js-drop-text">Software</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">Freelance platform</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">Coffehouse</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">Fast Food Restaurant</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">E-Commerce Company</div></a></div>
                  <input class="drop__input js-drop-input" type="hidden" name="business-type">
                </div>
                <div class="field field_medium field_icon-after">
                  <div class="field__wrap field__wrap_date">
                    <input class="field__input js-date-range" type="text" name="date" data-format="MM.DD.yyyy" data-single-month="true" data-single-date="false" data-container=".field__wrap_date" placeholder="Date range" readonly>
                    <div class="field__icon">
                      <svg class="icon icon-calendar">
                        <use xlink:href="#icon-calendar"></use>
                      </svg>
                    </div>
                  </div>
                </div> --}}
                <!-- drop-->
                 {{-- <div class="drop drop_medium js-drop">
                  <div class="drop__head js-drop-head">
                    <div class="drop__title js-drop-title">Status</div>
                    <div class="drop__icon">
                      <svg class="icon icon-arrow-down">
                        <use xlink:href="#icon-arrow-down"></use>
                      </svg>
                    </div>
                  </div>
                  <div class="drop__body js-drop-body"><a class="drop__option js-drop-option selected" href="#">
                      <div class="drop__text js-drop-text">Success</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">Pending</div></a><a class="drop__option js-drop-option" href="#">
                      <div class="drop__text js-drop-text">Canceled</div></a></div>
                  <input class="drop__input js-drop-input" type="hidden" name="status">
                </div> --}}
              </div>
            </div>
            <div class="transactions__inner">
              <div class="transactions__table">
                {{-- <form id="filterForm">
                    <div class="row">
                        <div class="col-md-3">
                    <div class="form-group">
                        <label for="transactionType">Transaction Type:</label>
                        <select class="form-control" id="transactionType" name="transactionType">
                            <option value="all">All</option>
                            <option value="transfer">Transfer</option>
                            <option value="expense">Expense</option>
                            <option value="invoice">Invoice</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                </div>

            <div class="mt-4 col-md-1">
                    <button type="button" class="btn btn-primary" onclick="filterData()">Filter</button>
                </div>
            </div>
                </form> --}}

                @if (session()->has('created'))
                <div class="alert alert-success">
                    {{ session()->get('created') }}
                     </div>

                     @elseif(session()->has('updated'))
                     <div class="alert alert-primary">
                        {{ session()->get('updated') }}
                         </div>

             @elseif(session()->has('deleted'))
             <div class="alert alert-danger">
                {{ session()->get('deleted') }}
                 </div>


                @endif
                <div class="row">
                    @if (Auth::user()->hasPermission('add_customer'))
                      <div class="mb-3 col-md-1">
                          <a class="page__link"  href="{{ route('customer.create') }}"> <button class="btn btn-dark">Add Customer</button></a>
                      </div>
                      @endif
               </div>
                  <table class="table mt-3 table-striped" id="myTable">
                    <thead>
                        <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key=>$customer)
                        <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $customer->name }}</td>
                             <td>{{ $customer->email }}</td>
                             <td>{{ $customer->mobile }}</td>
                             <td>{{ $customer->address }}</td>
                             <td> @if (Auth::user()->hasPermission('edit_customer'))
                                <a href="{{ route('customer.edit',$customer->id) }}"> <i class="fa fa-pencil-square-o" style="font-size:30px;color:green" ></i></a>
                                @endif
                                @if (Auth::user()->hasPermission('delete_customer'))
                                <a type="button" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $customer->id }}">
                                    <i class="fa fa-trash-o" style="font-size:30px;color:red"></i>
                                  </a>
                                  @endif
                                  <div class="modal fade" id="exampleModal{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h5> Do You want to delete</h5>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <form method="POST" action="{{ route('customer.destroy',$customer->id) }}">
                                            @csrf
                                            @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Yes</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>




              </div>
            </div>
            <div class="transactions__foot">
              <!-- pagination-->
              {{--  --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- popup-->
    <div class="popup popup_export mfp-hide" id="popup-export">
      <div class="popup__head">
        <div class="popup__title">Export Data</div>
        <div class="popup__info">export data into document form</div>
      </div>
      <!-- field-->
      <div class="field">
        <div class="field__label">Choose type of document</div>
        <div class="field__wrap">
          <!-- drop-->
          <div class="drop js-drop">
            <div class="drop__head js-drop-head">
              <div class="drop__title js-drop-title"></div>
              <div class="drop__icon">
                <svg class="icon icon-arrow-down">
                  <use xlink:href="#icon-arrow-down"></use>
                </svg>
              </div>
            </div>
            <div class="drop__body js-drop-body"><a class="drop__option js-drop-option selected" href="#">
                <div class="drop__text js-drop-text">PDF</div></a><a class="drop__option js-drop-option" href="#">
                <div class="drop__text js-drop-text">DOC</div></a></div>
            <input class="drop__input js-drop-input" type="hidden" name="type-document">
          </div>
        </div>
      </div><a class="button-wide popup__button js-popup-open" href="#popup-thanks" data-type="inline" data-effect="mfp-zoom-in">Confirm</a>
    </div>
    <!-- popup-->
    <div class="popup popup_thanks mfp-hide" id="popup-thanks">
      <div class="popup__icon">
        <svg class="icon icon-check-circle">
          <use xlink:href="#icon-check-circle"></use>
        </svg>
      </div>
      <div class="popup__head">
        <div class="popup__title">Export Sucessfully</div>
        <div class="popup__info">Please check your document, and open your document file</div>
      </div>
      <button class="button-wide popup__button js-popup-close">Done</button>
    </div>
    <!-- popup-->
    <div class="popup popup_remove-transaction mfp-hide" id="popup-remove-transaction">
      <div class="popup__icon">
        <svg class="icon icon-trash">
          <use xlink:href="#icon-trash"></use>
        </svg>
      </div>
      <div class="popup__head">
        <div class="popup__title">Delete Transaction ?</div>
        <div class="popup__info">Are you sure you want to delete this transaction history?</div>
      </div>
      <div class="popup__btns">
        <button class="button-stroke popup__button js-popup-close">Cancel</button>
        <button class="button popup__button js-popup-close">Yes</button>
      </div>
    </div>
    <!-- scripts-->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/moment.min.js"></script>
    <script src="js/lib/jquery.daterangepicker.min.js"></script>
    <script src="js/lib/tooltipster.bundle.min.js"></script>
    <script src="js/lib/apexcharts.min.js"></script>
    <script src="js/lib/scroll-lock.min.js"></script>
    <script src="js/lib/swiper-bundle.min.js"></script>
    <script src="js/lib/jquery.magnific-popup.min.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/app.js"></script>
    <!-- svg sprite-->
    <div style="display: none"><svg width="0" height="0">
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-down">
<path d="M3.55 7.92a.75.75 0 0 1 .977-.073l.084.073 6.52 6.52c.445.445 1.159.475 1.64.089l.099-.089 6.52-6.52a.75.75 0 0 1 1.133.977l-.073.084-6.52 6.52c-1.019 1.019-2.654 1.061-3.724.127l-.136-.127-6.52-6.52a.75.75 0 0 1 0-1.061z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-left">
<path d="M10.1 5.4a.75.75 0 0 1 .073.977l-.073.084-4.789 4.79H20.5a.75.75 0 0 1 .102 1.493l-.102.007H5.311l4.789 4.79a.75.75 0 0 1 .073.977l-.073.084a.75.75 0 0 1-.977.073L9.04 18.6l-6.07-6.07a.75.75 0 0 1-.073-.977l.073-.084L9.04 5.4a.75.75 0 0 1 1.061 0z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-next">
<path d="M9.096 20.556a.9.9 0 0 1-1.36-1.172l.087-.101 6.52-6.52c.384-.384.416-.996.096-1.417l-.096-.11-6.52-6.52a.9.9 0 0 1 1.172-1.36l.101.087 6.52 6.52c1.07 1.071 1.119 2.786.146 3.916l-.146.157-6.52 6.52z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-prev">
<path d="M14.921 3.444a.9.9 0 0 1 1.36 1.172l-.087.101-6.52 6.52c-.384.384-.416.996-.096 1.417l.096.11 6.52 6.52a.9.9 0 0 1-1.172 1.36l-.101-.087-6.52-6.52c-1.07-1.071-1.119-2.786-.146-3.916l.146-.157 6.52-6.52z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-swap">
<path d="M8.301 21.214l-5.02-5.01a1 1 0 0 1 1.301-1.512l.112.097 3.314 3.306.001-14.588a1 1 0 0 1 1.991-.136l.009.136v17l-.002.04-.002.032.003-.072c0 .182-.049.353-.134.5-.112.186-.265.324-.448.409l-.028.012a.8.8 0 0 1-.085.032l-.104.027-.04.007a.75.75 0 0 1-.074.01l-.04.002-.047.002-.034-.001-.031-.002.065.002a1.01 1.01 0 0 1-.148-.011l-.037-.006-.072-.016-.045-.013-.06-.021-.056-.024-.047-.023-.046-.026-.056-.036-.03-.021-.013-.01c-.032-.025-.063-.051-.092-.08l-.007-.007zm6.686-18.707h.023l.048.002-.072-.003a1.01 1.01 0 0 1 .149.011l.031.005.079.018.036.01.071.025.047.02.046.023.052.029.055.035.028.02.013.01c.033.025.064.052.093.081l.006.006 5.02 5.01a1 1 0 0 1-1.301 1.512l-.112-.097-3.314-3.307v14.589a1 1 0 0 1-1.991.136l-.009-.136v-17-.018l.004-.07-.004.088a1.01 1.01 0 0 1 .011-.151l.008-.047.017-.073.011-.036.024-.066.022-.05.026-.052.027-.048.048-.07.018-.023a1.01 1.01 0 0 1 .169-.169l-.089.079c.038-.038.078-.072.12-.103l.062-.042.044-.026.057-.029.048-.021.057-.021.056-.017.057-.014.049-.009.066-.008.059-.004.033-.001z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-thick-down">
<path d="M12.002 2.211c.651 0 1.189.484 1.274 1.111l.012.174-.001 13.896 3.876-3.875c.456-.456 1.171-.498 1.674-.124l.144.124c.456.456.498 1.171.124 1.674l-.124.144-6.07 6.07c-.456.456-1.171.498-1.674.124l-.144-.124-6.07-6.07c-.502-.502-.502-1.316 0-1.818.456-.456 1.171-.498 1.674-.124l.144.124 3.875 3.874V3.497c0-.71.576-1.286 1.286-1.286z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-arrow-thick-right">
<path d="M15.192 4.898l.144.124 6.07 6.07c.456.456.498 1.171.124 1.674l-.124.144-6.07 6.07c-.502.502-1.316.502-1.818 0-.456-.456-.498-1.171-.125-1.674l.124-.144 3.875-3.876-13.896.001c-.71 0-1.286-.576-1.286-1.286 0-.651.484-1.189 1.111-1.274l.174-.012h13.895l-3.874-3.875c-.456-.456-.498-1.171-.124-1.674l.124-.144c.456-.456 1.171-.498 1.674-.124z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-burger">
<path d="M21 6.175a.82.82 0 0 1 .818.818.82.82 0 0 1-.707.811L21 7.811H3a.82.82 0 0 1-.818-.818.82.82 0 0 1 .707-.811L3 6.175h18zm0 5a.82.82 0 0 1 .818.818.82.82 0 0 1-.707.811l-.111.007H3a.82.82 0 0 1-.818-.818.82.82 0 0 1 .707-.811L3 11.175h18zm0 5a.82.82 0 0 1 .818.818.82.82 0 0 1-.707.811l-.111.007H3a.82.82 0 0 1-.818-.818.82.82 0 0 1 .707-.811L3 16.175h18z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-calendar">
<path d="M16 1.25a.75.75 0 0 1 .743.648L16.75 2l.001.781c3.183.267 4.911 2.269 4.996 5.471l.003.248V17c0 3.511-1.909 5.649-5.491 5.747L16 22.75H8c-3.661 0-5.656-2.056-5.747-5.502L2.25 17V8.5c0-3.347 1.735-5.446 5-5.72V2a.75.75 0 0 1 1.493-.102L8.75 2v.75h6.5V2a.75.75 0 0 1 .75-.75zm4.25 8.589H3.75V17c0 2.708 1.277 4.163 3.999 4.246L8 21.25h8c2.809 0 4.169-1.375 4.246-4.007L20.25 17V9.839zM15.704 15.7a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm-3.699 0a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm-3.701 0a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm7.4-3a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm-3.699 0a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm-3.701 0a1 1 0 0 1 .117 1.993l-.117.007c-.561 0-1.009-.448-1.009-1a1 1 0 0 1 .883-.993l.126-.007zm6.947-8.45h-6.5V5a.75.75 0 0 1-1.493.102L7.25 5v-.714c-2.303.232-3.427 1.586-3.497 3.972l-.002.081h16.495l-.001-.082c-.07-2.386-1.194-3.739-3.496-3.971L16.75 5a.75.75 0 0 1-1.493.102L15.25 5v-.75z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-check-circle">
<path d="M12 2A10.02 10.02 0 0 0 2 12a10.02 10.02 0 0 0 10 10 10.02 10.02 0 0 0 10-10A10.02 10.02 0 0 0 12 2zm4.78 7.7l-5.67 5.67a.75.75 0 0 1-1.06 0l-2.83-2.83c-.29-.29-.29-.77 0-1.06s.77-.29 1.06 0l2.3 2.3 5.14-5.14c.29-.29.77-.29 1.06 0s.29.76 0 1.06z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-close">
<path d="M5.447 4.397l.084.073L12 10.938l6.469-6.468a.75.75 0 0 1 1.133.977l-.073.084-6.468 6.469 6.469 6.47a.75.75 0 0 1-.977 1.133l-.084-.073L12 13.06l-6.47 6.469a.75.75 0 0 1-1.133-.977l.073-.084 6.469-6.47L4.471 5.53a.75.75 0 0 1 .977-1.133z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-dollar-circle">
<path d="M12 1.25c5.937 0 10.75 4.813 10.75 10.75S17.937 22.75 12 22.75 1.25 17.937 1.25 12 6.063 1.25 12 1.25zm0 1.5a9.25 9.25 0 1 0 0 18.5 9.25 9.25 0 1 0 0-18.5zm0 2.5a.75.75 0 0 1 .743.648L12.75 6v.589l.372.001c1.652 0 2.97 1.383 2.97 3.08a.75.75 0 1 1-1.5 0c0-.835-.591-1.502-1.337-1.574l-.133-.006-.372-.001v3.375l1.522.529c1.21.429 1.819 1.206 1.819 2.637 0 1.47-1.111 2.687-2.525 2.775l-.165.005-.652-.001V18a.75.75 0 0 1-1.493.102L11.25 18v-.591l-.358.001c-1.652 0-2.97-1.383-2.97-3.08a.75.75 0 0 1 1.493-.102l.007.102c0 .835.591 1.502 1.337 1.574l.133.006.358-.001V12.53l-1.509-.523c-1.21-.429-1.819-1.206-1.819-2.637 0-1.47 1.111-2.687 2.525-2.775l.165-.005.638-.001V6a.75.75 0 0 1 .75-.75zm.75 7.802v2.857l.652.001c.648 0 1.19-.567 1.19-1.28s-.16-.964-.695-1.176l-.121-.045-1.026-.356zm-1.5-4.963l-.638.001c-.648 0-1.19.567-1.19 1.28s.16.964.695 1.176l.121.045 1.012.352V8.089z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-drop">
<path d="M18.74 9.05c.82 1.51 1.37 3.15 1.36 4.86 0 4.46-3.63 8.09-8.1 8.09a8.06 8.06 0 0 1-4.81-1.58c-.49-.36-.53-1.08-.1-1.51L17.16 8.84c.47-.47 1.26-.37 1.58.21zm-7.358-6.841a1.01 1.01 0 0 1 1.069-.101h0l.041.024.114.075A26.67 26.67 0 0 1 16.64 6.04c.341.401.319 1.001-.05 1.37h0L6.31 17.69c-.439.439-1.15.385-1.526-.128h0l-.061-.104A8.13 8.13 0 0 1 3.9 13.9h0l.005-.323c.083-2.366 1.173-4.738 3.015-7.049 1.343-1.685 2.916-3.14 4.461-4.32z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-eye">
<path d="M11.995 2.98c3.787 0 7.312 2.206 9.742 6.026 1.057 1.656 1.057 4.341.001 5.996-2.431 3.822-5.955 6.027-9.743 6.027s-7.312-2.206-9.742-6.026c-1.057-1.656-1.057-4.341-.001-5.996C4.683 5.186 8.208 2.98 11.995 2.98zm0 1.5c-3.239 0-6.306 1.919-8.478 5.334-.743 1.164-.743 3.219.001 4.384 2.171 3.413 5.238 5.333 8.477 5.333s6.306-1.919 8.478-5.334c.743-1.164.743-3.219-.001-4.384-2.171-3.413-5.238-5.333-8.477-5.333zm0 3.2c2.394 0 4.33 1.936 4.33 4.33s-1.936 4.33-4.33 4.33-4.33-1.936-4.33-4.33 1.936-4.33 4.33-4.33zm0 1.5c-1.566 0-2.83 1.264-2.83 2.83s1.264 2.83 2.83 2.83 2.83-1.264 2.83-2.83-1.264-2.83-2.83-2.83z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-eye-fill">
<path d="M11.992 3.432c3.56 0 6.94 2.09 9.25 5.72 1 1.57 1 4.13 0 5.69-1.16 1.82-2.58 3.25-4.16 4.23-1.58.97-3.31 1.49-5.09 1.49-3.56 0-6.94-2.08-9.25-5.72-1-1.57-1-4.12 0-5.69 1.16-1.82 2.58-3.25 4.16-4.23 1.58-.97 3.31-1.49 5.09-1.49zm0 4.53c-2.24 0-4.04 1.81-4.04 4.04s1.8 4.04 4.04 4.04 4.04-1.81 4.04-4.04-1.8-4.04-4.04-4.04zm0 1.179c1.57 0 2.86 1.29 2.86 2.86s-1.29 2.85-2.86 2.85-2.85-1.28-2.85-2.85c0-1.58 1.28-2.86 2.85-2.86z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-eye-slash">
<path d="M2.53 22.53a.75.75 0 0 1-1.133-.977l.073-.084 3.37-3.372-.08-.072c-.926-.855-1.771-1.874-2.502-3.022-1.057-1.656-1.057-4.341-.001-5.996C4.688 5.186 8.213 2.98 12 2.98c2.105 0 4.157.687 5.981 1.978l3.489-3.489a.75.75 0 0 1 1.133.977l-.073.084-20 20zM20.634 7.46c.412.512.781 1.021 1.108 1.537 1.057 1.656 1.057 4.341.001 5.996-2.431 3.822-5.955 6.027-9.743 6.027-1.314 0-2.623-.273-3.871-.799a.75.75 0 0 1 .582-1.382c1.067.449 2.178.681 3.289.681 3.239 0 6.306-1.919 8.478-5.334.743-1.164.743-3.219-.001-4.385-.297-.467-.633-.931-1.011-1.402a.75.75 0 0 1 1.169-.94zM12 4.48c-3.239 0-6.306 1.919-8.478 5.334-.743 1.164-.743 3.219 0 4.384.697 1.093 1.502 2.053 2.38 2.841l2.552-2.554A4.3 4.3 0 0 1 7.67 12c0-2.394 1.936-4.33 4.33-4.33a4.3 4.3 0 0 1 2.484.785l2.418-2.418C15.382 5.015 13.706 4.48 12 4.48zm3.545 7.471l.101.012a.75.75 0 0 1 .602.874c-.316 1.716-1.706 3.105-3.422 3.422a.75.75 0 1 1-.272-1.475c1.104-.204 2.015-1.114 2.218-2.218a.75.75 0 0 1 .772-.613zM12 9.17c-1.566 0-2.83 1.264-2.83 2.83 0 .485.121.948.346 1.357h0l.025.04 3.856-3.856-.04-.025c-.351-.193-.741-.31-1.15-.339h0z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-export">
<path d="M20 11.28a.75.75 0 0 1 .75.75c0 5.037-3.527 8.75-8.75 8.75s-8.75-3.713-8.75-8.75a.75.75 0 1 1 1.5 0c0 4.225 2.873 7.25 7.25 7.25s7.25-3.025 7.25-7.25a.75.75 0 0 1 .75-.75zm-7.674-7.913l.084.073L14.97 6a.75.75 0 0 1-.977 1.133l-.084-.073-1.28-1.28.001 8.429a.75.75 0 0 1-1.493.102l-.007-.102-.001-8.427L9.85 7.06a.75.75 0 0 1-.977.073l-.084-.073a.75.75 0 0 1-.073-.977L8.789 6l2.56-2.56a.75.75 0 0 1 .977-.073"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-filter">
<path d="M18.6 1.35c1.514 0 2.75 1.236 2.75 2.75h0v2.2c0 .959-.543 2.154-1.253 2.862h0l-4.317 3.814c-.402.335-.73 1.109-.73 1.724h0V19c0 .869-.541 1.909-1.244 2.331h0l-1.412.908c-1.816 1.118-4.243-.17-4.243-2.339h0v-5.3c0-.467-.296-1.207-.594-1.583h0l-3.92-4.128C3.07 8.244 2.65 7.253 2.65 6.5h0V4.2c0-1.593 1.215-2.85 2.75-2.85h0zm0 1.5h-7.254l-4.512 7.23 1.852 1.952c.495.619.893 1.562.956 2.356l.009.213v5.3c0 .976 1.125 1.573 1.944 1.069h0l1.42-.912c.253-.152.536-.695.536-1.057h0v-4.3c0-1.042.509-2.242 1.253-2.862h0L19.07 8.07c.407-.407.78-1.228.78-1.77h0V4.1c0-.686-.564-1.25-1.25-1.25h0zm-9.023 0H5.4c-.695 0-1.25.574-1.25 1.35h0v2.3c0 .397.319 1.108.694 1.483h0l.923.972 3.81-6.106z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-info-circle">
<path d="M12 1c6.052 0 11 4.948 11 11s-4.948 11-11 11S1 18.052 1 12 5.948 1 12 1zm0 2c-4.948 0-9 4.052-9 9s4.052 9 9 9 9-4.052 9-9-4.052-9-9-9zm.004 11.667c.736 0 1.333.597 1.333 1.333 0 .684-.515 1.247-1.178 1.324l-.155.009c-.745 0-1.342-.597-1.342-1.333 0-.684.515-1.247 1.178-1.324l.164-.009zM12 7a1 1 0 0 1 .991.864L13 8v5a1 1 0 0 1-1.991.136L11 13V8a1 1 0 0 1 1-1z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-like">
<path d="M14.018 2.043c1.207.402 2.007 1.678 1.834 2.866l-.03.161-.499 3.19c-.027.189.056.311.195.338l.063.006h4c1.957 0 3.204 1.611 2.668 3.415l-2.44 7.417c-.363 1.452-1.833 2.575-3.339 2.663l-.188.005h-3.8c-.812 0-1.746-.249-2.244-.653l-.115-.104-2.205-1.707c-.369.922-1.216 1.364-2.536 1.364h0-1c-1.831 0-2.75-.849-2.75-2.65h0v-9.8c0-1.801.919-2.65 2.75-2.65h0 1c1.41 0 2.279.503 2.604 1.558l2.972-4.423c.614-.922 1.994-1.396 3.061-.995zM12.27 3.788l-.067.086-4.073 6.06v7.976l2.981 2.315c.175.175.734.346 1.225.376l.145.005h3.8a2.3 2.3 0 0 0 2.044-1.44l.044-.145 2.406-7.318c.305-.854-.149-1.531-1.055-1.593l-.139-.005h-4c-1.036 0-1.831-.851-1.757-1.919l.016-.147.509-3.247c.114-.514-.26-1.144-.831-1.335-.393-.147-.972.028-1.247.331zM5.38 7.405h-1c-1.028 0-1.25.205-1.25 1.15h0l.002 9.936c.022.829.272 1.014 1.248 1.014h0l1.148-.002c.901-.021 1.102-.251 1.102-1.148h0v-9.8c0-.945-.222-1.15-1.25-1.15h0z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-like-fill">
<path d="M14.018 2.043c1.207.402 2.007 1.678 1.834 2.866l-.03.161-.499 3.19c-.027.189.056.311.195.338l.063.006h4c1.957 0 3.204 1.611 2.668 3.415l-2.44 7.417c-.363 1.452-1.833 2.575-3.339 2.663l-.188.005h-3.8c-.812 0-1.746-.249-2.244-.653l-.115-.104-2.205-1.707c-.347.868-1.118 1.311-2.308 1.36l-.228.005h-1c-1.763 0-2.681-.787-2.746-2.454l-.004-.196v-9.8c0-1.735.853-2.586 2.55-2.647l.2-.003h1c1.41 0 2.279.503 2.604 1.558l2.972-4.423c.614-.922 1.994-1.396 3.061-.995z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-logout">
<path d="M10 3a1 1 0 1 1 0 2l-.649.003-.591.011-.363.014-.339.021-.315.029-.293.038c-1.457.22-2.052.845-2.292 2.588l-.042.351-.034.381-.027.411-.021.442-.021.724-.008.526-.006.855v1.212l.006.855.008.526.021.724.021.442.027.411.034.381.042.351c.24 1.743.835 2.368 2.292 2.588l.293.038.315.029.339.021.363.014.591.011L10 19a1 1 0 1 1 0 2l-.519-.004-.493-.011-.468-.02-.444-.029-.213-.018-.408-.045c-2.646-.333-3.772-1.411-4.209-4.24l-.06-.438-.027-.229-.046-.478-.02-.25-.033-.521-.025-.55-.018-.58-.006-.302-.01-.952.002-.992.008-.627.015-.596.022-.565.014-.271.033-.521.042-.492.051-.465.06-.438c.437-2.829 1.563-3.907 4.209-4.24l.408-.045.432-.034.456-.024.48-.016.506-.007L10 3zm6.613 4.21l.094.083 4 4c.028.028.055.059.08.09l-.08-.09a1.01 1.01 0 0 1 .097.112l.05.075.021.037.032.063.019.043.024.067.016.054.013.053.01.056.007.061.003.055V12v.033l-.003.052L21 12a1.01 1.01 0 0 1-.011.149l-.01.056-.012.053-.016.054-.024.066-.019.043-.032.063-.021.036-.05.074-.013.018-.083.094-4 4a1 1 0 0 1-1.497-1.32l.083-.094L17.585 13H9a1 1 0 0 1-.117-1.993L9 11h8.585l-2.292-2.293a1 1 0 0 1-.083-1.32l.083-.094a1 1 0 0 1 1.32-.083z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-notification">
<path d="M12.026 1.19c1.013 0 1.923.554 2.396 1.413 2.539.971 4.353 3.436 4.353 6.308h0v2.89c0 .468.22 1.27.453 1.673h0l1.151 1.911c.906 1.511.18 3.477-1.485 4.027a21.71 21.71 0 0 1-3.308.823 3.76 3.76 0 0 1-3.559 2.575 3.76 3.76 0 0 1-2.65-1.1c-.414-.414-.725-.92-.909-1.473a21.8 21.8 0 0 1-3.321-.826c-1.755-.594-2.438-2.438-1.482-4.027h0l1.148-1.907c.243-.407.464-1.205.464-1.676h0V8.91c0-2.882 1.811-5.345 4.356-6.312.474-.855 1.383-1.408 2.394-1.408zm1.759 19.268l-.085.007c-1.142.089-2.29.087-3.432-.006.051.066.108.13.169.191a2.26 2.26 0 0 0 1.59.66 2.25 2.25 0 0 0 1.759-.852zm-.962-16.714c-.855-.107-1.672-.047-2.438.176l.049-.014c-2.12.675-3.659 2.662-3.659 5.004h0v2.89a5.51 5.51 0 0 1-.677 2.447h0l-1.15 1.91c-.461.766-.173 1.545.675 1.832 4.156 1.388 8.639 1.388 12.797-.001.754-.249 1.085-1.145.673-1.831h0l-1.157-1.922a5.64 5.64 0 0 1-.66-2.435h0V8.91c0-2.35-1.568-4.354-3.708-5.017-.254-.07-.5-.119-.744-.149z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-preferences">
<path d="M15.992 1.092c3.615 0 4.845 1.15 4.898 4.657l.002.243.001 1.067c1.333.428 1.943 1.485 1.995 3.266l.004.257v8.56c0 2.549-1.04 3.674-3.491 3.746l-.259.004h-4.28c-1.954 0-3.071-.611-3.519-2l-2.319.001-.032.001-.033-.003-3.018.001a.9.9 0 0 1-.122-1.792l.122-.008 2.15-.001v-2.499H5.992c-3.615 0-4.845-1.15-4.898-4.657l-.002-.028.001-.028-.001-.186v-5.7c0-3.615 1.15-4.845 4.657-4.898l.243-.002h10zm3.15 7.54h-4.281l-.298.004-.052.002-.16.008-.121.009h0l-.115.012-.039.005-.013.002.004-.001-.007.001-.005.001h-.001l-.034.005.024-.004-.026.004-.056.009.031-.005-.052.008.021-.003-.022.003-.048.01h0l.038-.008-.036.007h0l-.052.011.05-.01-.103.023.039-.01-.047.011-.008.002-.025.007.01-.003.015-.004.007-.002-.008.003-.014.003-.029.008.003-.001-.004.002-.009.002-.045.014h0l-.028.009-.015.006-.008.002-.004.003-.034.013h0l-.02.008.006-.002-.041.018h0l.01-.005-.049.024h0l-.043.023.024-.013-.023.013h0l-.034.021.029-.019-.069.045.035-.023c-.141.091-.244.213-.32.374l-.003.004-.007.017-.01.022.01-.022-.028.07c-.024.063-.044.132-.06.207h0l-.007.029h0l-.006.027.007-.028-.006.029h0l-.006.029-.003.019h0l-.005.026-.001.006-.004.028h0l-.003.017-.004.033h0-.001l-.002.012-.004.033-.001.01-.002.017-.007.075h0l-.017.245-.007.243-.002 8.741.006.369.021.321c.1.993.501 1.237 1.731 1.258l4.471.002c1.446 0 1.857-.238 1.935-1.414l.014-.345.002-8.751c0-1.433-.246-1.783-1.207-1.906l-.253-.025-.489-.019zm-2.141 5.33c.741 0 1.443.268 1.998.747a3.1 3.1 0 0 1 .967 1.625 3.01 3.01 0 0 1 .075.668c0 1.677-1.363 3.04-3.04 3.04-.299 0-.589-.043-.862-.124l-.162-.053a3.02 3.02 0 0 1-.312-.132l-.149-.078a3.06 3.06 0 0 1-.887-.752l-.101-.133a3.03 3.03 0 0 1-.567-1.767 3.02 3.02 0 0 1 .047-.528c.086-.487.291-.946.594-1.336a3.04 3.04 0 0 1 2.4-1.177zm-5.89 2.631h-1.22v2.499h1.22v-2.499zm5.89-.831c-.386 0-.744.181-.98.483a1.24 1.24 0 0 0-.192.354 1.23 1.23 0 0 0-.069.403c0 .683.557 1.24 1.24 1.24s1.24-.557 1.24-1.24c0-.138-.024-.274-.069-.403a1.29 1.29 0 0 0-.36-.536c-.185-.16-.414-.262-.661-.292l-.15-.009h0zm-5.89-2.969l-8.183.002c.123 1.473.611 1.89 2.193 1.978l.19.009.442.01h5.358v-1.999zm5.89-3.11l.147.005a1.97 1.97 0 0 1-.147 3.935 1.97 1.97 0 1 1 0-3.94zm-.77-6.789H5.753l-.442.01c-1.817.069-2.302.495-2.398 2.218l-.009.19-.01.442v5.239h8.218l.001-.41c0-2.549 1.04-3.674 3.491-3.746l.259-.004h4.23v-.84l-.005-.466-.016-.418c-.094-1.65-.552-2.103-2.209-2.195l-.189-.009-.442-.01z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-range">
<path d="M22 5.75a.75.75 0 0 1 .102 1.493L22 7.25h-6a.75.75 0 0 1-.102-1.493L16 5.75h6zm-12-3.5a4.25 4.25 0 1 1 0 8.5 4.25 4.25 0 0 1-4.184-3.499L2 7.25a.75.75 0 0 1-.102-1.493L2 5.75h3.816A4.25 4.25 0 0 1 10 2.25zm0 1.5a2.75 2.75 0 1 0 0 5.5 2.75 2.75 0 1 0 0-5.5zm4 9.5a4.25 4.25 0 0 1 4.184 3.5H22a.75.75 0 0 1 .102 1.493L22 18.25l-3.816.001A4.25 4.25 0 0 1 9.75 17.5 4.25 4.25 0 0 1 14 13.25zm0 1.5a2.75 2.75 0 1 0 0 5.5 2.75 2.75 0 1 0 0-5.5zm-6 2a.75.75 0 0 1 .102 1.493L8 18.25H2a.75.75 0 0 1-.102-1.493L2 16.75h6z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-receive">
<path d="M14.5 2.75a.75.75 0 0 1 .102 1.493l-.102.007-8.275.001-.414.008-.381.017-.179.013-.334.034c-1.593.2-2.062.873-2.151 2.75l-.013.392-.003.208-.001.077H14.5a.75.75 0 0 1 .102 1.493l-.102.007H2.75l.001 7.072.003.208.013.392.023.36.034.329c.182 1.414.753 1.931 2.253 2.084l.349.028.186.01.397.013.431.004 11.335-.001.405-.008.19-.007.358-.022.328-.032c1.515-.184 2.026-.785 2.156-2.419l.022-.353.012-.384.004-.415v-2.08a.75.75 0 0 1 1.493-.102l.007.102v2.08c0 3.843-1.176 5.087-4.941 5.138l-.249.002H6.44c-3.878 0-5.137-1.163-5.188-4.893l-.002-.247V7.89c0-3.843 1.176-5.087 4.941-5.138l.249-.002h8.06zm-6.5 13a.75.75 0 0 1 .102 1.493L8 17.25H6a.75.75 0 0 1-.102-1.493L6 15.75h2zm6.5 0a.75.75 0 0 1 .102 1.493l-.102.007h-4a.75.75 0 0 1-.102-1.493l.102-.007h4zm5.5-13a.75.75 0 0 1 .743.648l.007.102v4.188l.72-.718a.75.75 0 0 1 .977-.073l.084.073a.75.75 0 0 1 .073.977l-.073.084-2 2-.073.063-.038.029h0c-.163.113-.35.148-.527.121l-.014-.003-.037-.007-.056-.015-.051-.017-.054-.023-.038-.019a.76.76 0 0 1-.187-.141L17.47 8.03a.75.75 0 0 1 .977-1.133l.084.073.72.719V3.5a.75.75 0 0 1 .75-.75z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-search">
<path d="M20.446 19.397l.084.073 2 2a.75.75 0 0 1-.977 1.133l-.084-.073-2-2a.75.75 0 0 1 .977-1.133zM11.5 1.25c5.661 0 10.25 4.589 10.25 10.25S17.161 21.75 11.5 21.75 1.25 17.161 1.25 11.5 5.839 1.25 11.5 1.25zm0 1.5a8.75 8.75 0 1 0 0 17.5 8.75 8.75 0 1 0 0-17.5z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-security">
<path d="M11.992 1.092c4.851 0 6.812 2.301 6.897 6.604l.003.296.001 1.213c2.928.397 3.948 1.921 3.997 5.509l.002.28v2c0 4.409-1.348 5.844-5.639 5.898l-.261.002-10.295-.002c-4.176-.061-5.549-1.443-5.603-5.632l-.002-.266v-2c0-3.789.996-5.381 3.998-5.789l.001-1.213c0-4.494 1.938-6.9 6.9-6.9zm5 9.802l-10.257.001-.125.001h0l-.122.002-.462.015-.109.006h0l-.107.007-.403.035c-1.662.182-2.267.787-2.448 2.448l-.019.196-.028.422-.015.462-.004.247h0l-.001.257.001 2.257.01.495.01.231h0l.013.221.037.411c.207 1.825.936 2.36 3.048 2.464l.223.009.494.011h10.521l.495-.01.231-.01h0l.221-.013.411-.037c1.76-.2 2.32-.885 2.452-2.827l.012-.213.016-.473.004-.253h0l.001-.264-.001-2.257-.01-.483-.021-.442c-.13-1.969-.693-2.655-2.483-2.851l-.196-.019-.422-.028-.462-.015-.504-.005zm-5 1.699a3.4 3.4 0 1 1 0 6.8 3.4 3.4 0 0 1 0-6.8zm0 1.8a1.6 1.6 0 1 0 0 3.2 1.6 1.6 0 1 0 0-3.2zm0-11.501c-3.77 0-5.034 1.446-5.097 4.822l-.003.278-.001 1.102h.101 10.1 0V7.992c0-3.575-1.229-5.1-5.1-5.1z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-send">
<path d="M15.655 2.777c4.394-1.465 7.024 1.169 5.569 5.567h0l-2.83 8.491c-2.128 6.394-6.216 6.394-8.343 0h0l-.723-2.165-2.162-.72C.86 11.852.773 7.859 6.903 5.697h0l.263-.09zM19.8 7.873c1.067-3.227-.45-4.747-3.671-3.673h0L7.401 7.111l-.455.166-.424.168c-3.604 1.496-3.535 3.274.207 4.753h0l.439.166.471.163h0l1.904.635.038-.044 3.58-3.59a.75.75 0 0 1 1.135.975l-.073.084-3.504 3.513.835 2.5.041.117.041.115.166.439c1.423 3.601 3.129 3.801 4.584.6h0l.17-.392.413-1.118h0z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-transfer">
<path d="M14.5 2.752a.75.75 0 0 1 .102 1.493l-.102.007H6.225l-.414.008-.381.017-.179.013-.334.034c-1.593.2-2.062.873-2.151 2.75l-.013.392-.003.208-.001.076 11.75.001a.75.75 0 0 1 .102 1.493l-.102.007-11.75-.001.001 7.072.003.208.013.392.023.36.034.329c.182 1.414.753 1.931 2.253 2.084l.349.028.186.01.397.013.431.004 11.335-.001.405-.008.19-.007.358-.022.328-.032c1.515-.184 2.026-.785 2.156-2.419l.022-.353.012-.384.004-.415v-2.08a.75.75 0 0 1 1.493-.102l.007.102v2.08c0 3.843-1.176 5.087-4.941 5.138l-.249.002H6.44c-3.878 0-5.137-1.163-5.188-4.893l-.002-.247v-8.22c0-3.843 1.176-5.087 4.941-5.138l.249-.002h8.06zm-6.5 13a.75.75 0 0 1 .102 1.493L8 17.252H6a.75.75 0 0 1-.102-1.493L6 15.752h2zm6.5 0a.75.75 0 0 1 .102 1.493l-.102.007h-4a.75.75 0 0 1-.102-1.493l.102-.007h4zm5.866-12.906l.071.047.093.079 2 2a.75.75 0 0 1-.977 1.133l-.084-.073-.72-.719v4.189a.75.75 0 0 1-.648.743l-.102.007a.75.75 0 0 1-.743-.648l-.007-.102V5.311l-.72.721a.75.75 0 0 1-1.133-.977l.073-.084 1.982-1.983a.76.76 0 0 1 .189-.144l.032-.016.054-.024.054-.019.041-.011.042-.009c.026-.005.052-.009.079-.011a.73.73 0 0 1 .424.093z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-trash">
<path d="M21.068 5.228l-4.84-.37v-.01l-.22-1.3c-.15-.92-.37-2.3-2.71-2.3h-2.62c-2.33 0-2.55 1.32-2.71 2.29l-.21 1.28-2.79.21-2.04.2a.75.75 0 0 0-.68.82c.04.41.4.71.82.67l2.04-.2c5.24-.52 10.52-.32 15.82.21h.08a.76.76 0 0 0 .75-.68c.03-.41-.27-.78-.69-.82zm-1.84 2.909c-.24-.25-.57-.39-.91-.39H5.677c-.34 0-.68.14-.91.39a1.29 1.29 0 0 0-.34.94l.62 10.26c.11 1.52.25 3.42 3.74 3.42h6.42c3.49 0 3.63-1.89 3.74-3.42l.62-10.25c.02-.36-.11-.7-.34-.95zm-5.57 9.61h-3.33c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h3.33c.41 0 .75.34.75.75s-.34.75-.75.75zm.84-4h-5c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h5c.41 0 .75.34.75.75s-.34.75-.75.75z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-trash-stroke">
<path d="M13.31 1.25c1.782 0 2.399.632 2.678 2.113l.252 1.482.002.024 4.832.366a.75.75 0 1 1-.148 1.493L10.98 6.23l-4.888.206-.978.091-2.04.2a.75.75 0 0 1-.247-1.476l.101-.017 2.038-.2 2.8-.217.216-1.282c.264-1.57.81-2.236 2.508-2.283l.201-.003h2.62zm.144 1.501h-2.903l-.252.006c-.529.025-.661.14-.769.646l-.046.242-.187 1.11 1.683-.024 3.73.07-.216-1.273-.046-.215c-.105-.417-.26-.528-.745-.555l-.249-.007zM5.885 8.991l.013.101.65 10.066.027.345c.121 1.353.371 1.683 1.692 1.738l.338.008h6.791l.338-.008c1.162-.049 1.495-.31 1.641-1.292l.036-.286.029-.324.013-.177.65-10.07a.75.75 0 0 1 1.497-.005v.102l-.65 10.074-.036.418c-.225 2.149-.991 3.017-3.465 3.067l-.237.002H8.79c-2.582 0-3.419-.802-3.68-2.875l-.042-.404-.017-.213-.65-10.07a.75.75 0 0 1 1.483-.198zm7.775 6.759a.75.75 0 0 1 .102 1.493l-.102.007h-3.33a.75.75 0 0 1-.102-1.493l.102-.007h3.33zm.84-4a.75.75 0 0 1 .102 1.493l-.102.007h-5a.75.75 0 0 1-.102-1.493l.102-.007h5z"></path>
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-user">
<path d="M11.997 1.092a5.9 5.9 0 0 0 0 11.8 5.9 5.9 0 0 0 0-11.8zm0 1.8a4.1 4.1 0 0 1 0 8.2 4.1 4.1 0 0 1 0-8.2zm.001 11.201c5.204 0 9.49 3.49 9.49 7.9a.9.9 0 1 1-1.8 0c0-3.325-3.408-6.1-7.69-6.1s-7.69 2.775-7.69 6.1a.9.9 0 0 1-1.8 0c0-4.41 4.286-7.9 9.49-7.9z"></path>
</symbol>
</svg>
    </div>



  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





  <script>

$(document).ready(function()
{
   $('#myTable').DataTable();
})

$(document).ready(function () {
    var dataTable = $('#myTable').DataTable();
    $('#myTable_filter input').on('input', function () {
        var isSearching = $(this).val().trim() !== '';
        // Toggle the visibility of the pagination control
        $('.dataTables_paginate').toggle(!isSearching);
    });
});

$(document).ready(function () {
    var dataTable = $('#myTable').DataTable();

    function applyFilters() {
        var transactionType = $('#transactionType').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        // Clear previous search
        dataTable.search('').draw();

        // Apply new search based on filter options
        if (transactionType !== 'all') {
            dataTable.columns(1).search(transactionType).draw();
        }

        if (startDate) {
            // Filter based on start date
            dataTable.columns(7).search(startDate).draw();
        }

        if (endDate) {
            // Filter based on start date
            dataTable.columns(7).search(endDate).draw();
        }
    }

    // Attach change event to form elements
    $('#transactionType,#startDate, #endDate').on('change', function () {
        applyFilters();
    });
});







    //  $(document).ready(function()
    //  {
    //     $('#search').on('keyup',function()
    //     {
    //         var query=$(this).val();
    //         $.ajax({
    //             url:"search",
    //             type:"GET",
    //             data:{'search':query},
    //             success:function(data){
    //                 $('#search_list').html(data);
    //             }
    //         });
    //     });
    // });





  </script>


 </body>

</html>

