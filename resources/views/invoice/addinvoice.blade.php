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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <!-- page-->
    <div class="page">
      <div class="page__head">
        <div class="container page__container">
          <header class="header">
            {{-- <button class="header__burger"> --}}
              {{-- <svg class="icon icon-burger">
                <use xlink:href="#icon-burger"></use>
              </svg> --}}
            {{-- </button> --}}
            <div class="header__wrap">
                {{-- <a class="header__logo" href="index.html">
                    <img src="img/logo.svg" alt="Finlab"></a> --}}
              <nav class="header__navigation">
                <a class="header__link " href="/d2">Dashboard</a>
                @if (Auth::user()->hasPermission('view_user'))

                <a class="header__link " href="{{ route('users.index') }}">Users</a>
                @endif
                @if (Auth::user()->hasPermission('view_account'))

                <a class="header__link " href="{{ route('accounts.index') }}">Accounts</a>
                @endif

                @if (Auth::user()->hasPermission('view_invoice'))
                <a class="header__link active" href="{{ route('invoice.index') }}">Invoice</a>
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
                <a class="header__logout" href="login.html">Log Out</a></nav>
              {{-- <button class="header__close">
                <svg class="icon icon-close">
                  <use xlink:href="#icon-close"></use>
                </svg>
              </button> --}}
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
                  </div><a class="button-stroke button-wide" href="notification.html">See more Notification</a>
                </div>
              </div>
              {{-- <a class="header__avatar" href="settings.html"><img src="img/content/avatar.jpg" alt=""></a> --}}
            </div>
            <div class="header__overlay"></div>
          </header>
          {{-- <div class="page__title">Welcome back, Rainer Yaeger 👏🏻</div> --}}
          <div class="page__breadcrumbs"><a class="page__link" href="/invoice"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 17px;"></i></a>
            <svg class="icon icon-arrow-next">
              <use xlink:href="#icon-arrow-next"></use>
            </svg>
            <div class="page__text">Add Invoice</div>
          </div>
          <div class="page__line">
            {{-- <div class="page__nav"><a class="page__link" href="index.html">Overview</a><a class="page__link active" href="transaction.html">Transaction</a><a class="page__link" href="statistics.html">Statistics</a></div> --}}
            <div class="page__nav">
                <a class="page__link active" href="{{ route('invoice.index') }}">Invoice</a><a class="page__link" href="{{ route('customer.index') }}">Customer</a></div>
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

            <h1>Add invoice</h1><br>
            <form id="invoiceForm" method="post" action="{{ route('invoice.store') }}">
                @csrf

                 <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="fw-bold">Customer name</label>
                            <select class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name')}}" required>
                                {{-- <option  disabled selected> Select Customer</option> --}}
                                   @foreach ($customers as $customer)
                                       <option value="{{ $customer->id }}"  {{ old('name') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                   @endforeach
                            </select>
                        </div>
                        @error('name')
                               <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="date" class="fw-bold">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date')}}" required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                     @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ddate" class="fw-bold">Due Date</label>
                            <input type="date" class="form-control @error('ddate') is-invalid @enderror" name="ddate" id="ddate" value="{{ old('ddate')}}" required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                     @enderror
                        </div><br>
                    </div>






            <div class=" invoiceItems col-md-12">
                <div class="row invoice-item ">
                                     <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="description" class="fw-bold">Description</label>
                                                 <input type="text" class="form-control description @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description')}}" required>
                                                        @error('description')
                                                               <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                             </div>
                                       </div>


                                     <div class="col-md-4">
                                           <div class="form-group">
                                                <label for="item_name" class="fw-bold">Item Name</label>
                                                  <input type="text" class="form-control item_name  @error('item_name') is-invalid @enderror" name="item_name" id="item_name" value="{{ old('item_name')}}" required>
                                                  @error('item_name')
                                                               <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                              </div>
                                         </div>

                                          <div class="col-md-4">
                                                <div class="form-group">
                                                     <label for="quantity" class="fw-bold">Quantity</label>
                                                     <input type="text" class="form-control quantity  @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity')}}" required>
                                                     @error('quantity')
                                                     <span style="color: red">{{ $message }}</span>
                                              @enderror
                                                  </div><br>
                                            </div>

                                           <div class="col-md-4">
                                                       <div class="form-group">
                                                      <label for="unit" class="fw-bold">Unit Price</label>
                                                          <input type="number" class="form-control unit @error('unit') is-invalid @enderror" name="unit" id="unit" value="{{ old('unit')}}" required>
                                                          @error('unit')
                                                          <span style="color: red">{{ $message }}</span>
                                                   @enderror
                                                       </div>
                                            </div>
                                         <div class="col-md-4">
                                                    <div class="form-group">
                                                           <label for="line" class="fw-bold">Line Total</label>
                                                             <input type="number" class="form-control line @error('line') is-invalid @enderror" name="line" id="line" value="{{ old('line')}}" required readonly>
                                                             @error('line')
                                                             <span style="color: red">{{ $message }}</span>
                                                      @enderror
                                                      </div>
                                            </div>

                                            <div class="col-md-4">
                                                   <div class="form-group">
                                                    <button type="button" class="mt-3 btn btn-success" onclick="addInvoiceItem()" id="add">Add Item</button>
                                                    <button type="button" class="mt-3 btn btn-danger" onclick="removeInvoiceItem(this)">Remove Item</button>
                                                       </div><br>
                                             </div>




                </div>

            </div>


                          </div>
                           </div>


        <div class="col-md-6">
        <div  class="text-center ">
            <h5>Bill</h5>
            <table class="table">
                 <thead>
                       <tr>
                       <th>Item Name</th>
                     <th>Quantity</th>
                      <th>Unit Price</th>
                     <th>Line Total</th>
                        </tr>
                  </thead>
               <tbody id="billItems">
                   <td></td>
                </tbody>
               </table>
            <div id="totalAmount">Total Amount: 0.00</div>
          </div>
        </div>
    </div>



                <input type="hidden" name="invoiceItems" id="invoiceItems" value="">

                       <!-- Add this input field to store the total amount -->
                    <input type="hidden" name="totalAmount" id="totalAmountInput" value="">


                <button type="submit" class="mt-5 btn btn-primary">Add Invoice</button>

            </form>

        </div>
        <div >

              </div>
            </div>


    </div>
  </body>
  <script>

// -------------------


var invoiceItems = [];

function addInvoiceItem() {

    var newItem = {
        description: $('.description').last().val(),
        item_name: $('.item_name').last().val(),
        quantity: $('.quantity').last().val(),
        unit: $('.unit').last().val(),
        line: $('.line').last().val()

    };


    invoiceItems.push(newItem);


    $('#invoiceItems').val(JSON.stringify(invoiceItems));



    console.log(invoiceItems);


    var newRow = $('.invoice-item:last').clone();


    var index = $('.invoice-item').length;

    newRow.find('input[type="text"], input[type="number"]').each(function () {
        var currentName = $(this).attr('name');
        var newName = currentName.replace(/\[\d+\]/, '[' + index + ']');
        $(this).attr('name', newName);
    });


    newRow.find('input[type="text"], input[type="number"]').val('');


    $('.invoiceItems').append(newRow);
}

// Function to update the bill display
function updateBillDisplay() {
    var billItemsContainer = $('#billItems');
    billItemsContainer.empty();

    var totalAmount = 0;


    $('.invoiceItems .invoice-item').each(function () {
        var item = {
            item_name: $(this).find('.item_name').val(),
            quantity: $(this).find('.quantity').val(),
            unit: $(this).find('.unit').val(),
            line: ($(this).find('.quantity').val() || 0) * ($(this).find('.unit').val() || 0)
        };

        $(this).find('.line').val(item.line.toFixed(2));


        var row = '<tr>' +
            '<td>' + item.item_name + '</td>' +
            '<td>' + item.quantity + '</td>' +
            '<td>' + item.unit + '</td>' +
            '<td>' + item.line + '</td>' +
            '</tr>';


        billItemsContainer.append(row);

        totalAmount += parseFloat(item.line);
    });


    $('#totalAmount').text('Total Amount: ' + totalAmount.toFixed(2));


      $('#totalAmountInput').val(totalAmount.toFixed(2));
}


$('.invoiceItems').on('input', ' .item_name , .quantity, .unit', function () {
    updateBillDisplay();
});


$('.invoiceItems').on('keydown', ' .item_name , .quantity, .unit', function (e) {
        updateBillDisplay();

});




function removeInvoiceItem(button) {

    var removedRow = $(button).closest('.invoice-item');


    if (!removedRow.is(':first-child')) {

        removedRow.remove();


        updateBillDisplay();
    } else {
        alert("Cannot remove the first item. It is mandatory.");
    }
}

  </script>
</html>
