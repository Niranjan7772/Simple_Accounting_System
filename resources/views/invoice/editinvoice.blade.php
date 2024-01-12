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
            <button class="header__burger">
              <svg class="icon icon-burger">
                <use xlink:href="#icon-burger"></use>
              </svg>
            </button>
            <div class="header__wrap"><a class="header__logo" href="index.html"><img src="img/logo.svg" alt="Finlab"></a>
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
            <div class="page__text">Edit Invoice</div>
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


            <form id="invoiceForm" method="post" action="{{ route('invoice.update',$invoice->id) }}">
                @csrf
                @method('PATCH')
                 <div class="mt-4 row">
                    <div class="col-md-6">
                        <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="fw-bold">Customer name</label>
                            <select class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $customer->id == $invoice->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
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
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value={{ $invoice->date  }} required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                     @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ddate" class="fw-bold">Due Date</label>
                            <input type="date" class="form-control @error('ddate') is-invalid @enderror" name="ddate" id="ddate"  value={{ $invoice->due_date  }} required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                     @enderror
                        </div><br>
                    </div>


                    @foreach ($invoice_items as  $index => $item)

            <div class=" invoiceItems col-md-12">

                <div class="row invoice-item ">
                                     <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="description{{ $index }}" class="fw-bold">Description</label>
                                            <input type="text" class="form-control description" name="items[{{ $index }}][description]" id="description{{ $index }}" value="{{ $item->description }}" required>
                                        </div>
                                       </div>


                                     <div class="col-md-4">
                                           <div class="form-group">
                                                <label for="item_name" class="fw-bold">Item Name</label>
                                                  <input type="text" class="form-control item_name " name="items[{{ $index }}][item_name]" value="{{ $item->name }}" required>
                                                  @error('item_name')
                                                               <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                              </div>
                                         </div>

                                          <div class="col-md-4">
                                                <div class="form-group">
                                                     <label for="quantity" class="fw-bold">Quantity</label>
                                                     <input type="text" class="form-control quantity" name="quantity[{{ $index }}][quantity]"  value="{{ $item->quantity}}" required>
                                                     @error('quantity')
                                                     <span style="color: red">{{ $message }}</span>
                                              @enderror
                                                  </div><br>
                                            </div>

                                           <div class="col-md-4">
                                                       <div class="form-group">
                                                      <label for="unit" class="fw-bold">Unit Price</label>
                                                          <input type="number" class="form-control unit " name="unit[{{ $index }}][unit]"  value="{{ $item->unit_price}}" required>
                                                          @error('unit')
                                                          <span style="color: red">{{ $message }}</span>
                                                   @enderror
                                                       </div>
                                            </div>
                                         <div class="col-md-4">
                                                    <div class="form-group">
                                                           <label for="line" class="fw-bold">Line Total</label>
                                                             <input type="number" class="form-control liner" name="line[{{ $index }}][line]"  value="{{ $item->line_total}}" required readonly>
                                                             @error('line')
                                                             <span style="color: red">{{ $message }}</span>
                                                      @enderror
                                                      </div><br>
                                            </div>

                                            <div class="col-md-4">
                                                   <div class="form-group">
                                                    {{-- <button type="button" class="mt-3 btn btn-success" onclick="addInvoiceItem()" id="add">Add Item</button>
                                                    <button type="button" class="mt-3 btn btn-danger" onclick="removeInvoiceItem(this)">Remove Item</button> --}}
                                                       </div>
                                             </div><br>




                </div>

            </div>
            @endforeach


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
                        <tr>
                        </tr>
                </tbody>
               </table>
            <div id="totalAmount">Total Amount :0.00</div>
          </div>
        </div>
    </div>





                <input type="hidden" name="invoiceItems" id="invoiceItems" value="">

                       <!-- Add this input field to store the total amount -->
                    <input type="hidden" name="totalAmount" id="totalAmountInput" value="">


                <button type="submit" class="mt-5 btn btn-success">Update Invoice</button>

            </form>

            {{-- <button type="button" class="mt-3 btn btn-success" onclick="addNewInvoiceItem()">Add New Item</button>
            <button type="button" class="mt-3 btn btn-danger" onclick="removeInvoiceItem(this)">Remove Item</button> --}}

        </div>
        <div >

              </div>
            </div>


    </div>
  </body>

{{--
// -------------------

// Function to add a new invoice item form --}}
<script>
// Function to update the bill display
function updateBillDisplay() {
    var billItemsContainer = $('#billItems');
    billItemsContainer.empty(); // Clear existing items

    var totalAmount = 0;

    // Iterate through invoice items
    $('.invoice-item').each(function () {
        var item = {
            item_name: $(this).find('.item_name').val(),
            quantity: $(this).find('.quantity').val(),
            unit: $(this).find('.unit').val(),
            line: ($(this).find('.quantity').val() || 0) * ($(this).find('.unit').val() || 0)
        };

        // Set the line total value in the corresponding line input field
        $(this).find('.line').val(item.line.toFixed(2));

        // Create a new row in the bill table
        var row = '<tr>' +
            '<td>' + item.item_name + '</td>' +
            '<td>' + item.quantity + '</td>' +
            '<td>' + item.unit + '</td>' +
            '<td>' + item.line.toFixed(2) + '</td>' +
            '</tr>';

        // Append the row to the table
        billItemsContainer.append(row);

        // Update the total amount
        totalAmount += parseFloat(item.line);
    });

    // Update the total amount display
    $('#totalAmount').text('Total Amount: ' + totalAmount.toFixed(2));

    // Set the value of the hidden input field
    $('#totalAmountInput').val(totalAmount.toFixed(2));
}



// // Function to initialize the form with existing values
function initializeForm() {
    // Populate the form with existing values (fetch these values from your backend)
    // Example:
    $('.invoice-item .item_name').val({{ $invoice->item }});
    $('.invoice-item .quantity').val({{ $invoice->quantity }});
    $('.invoice-item .unit').val({{ $invoice->unit }});
    $('.invoice-item .line').val({{ $invoice->line }});

    // Update the bill display
    updateBillDisplay();
}



// Call the initialization function when the page loads
$(document).ready(function () {
    initializeForm();

    // Event listener for input changes in quantity and unit fields
    $('.invoice-item').on('input', '.item_name, .quantity, .unit', function () {
        updateBillDisplay();
    });

    // Handle backspace events for quantity and unit fields
    $('.invoice-item').on('keydown', '.item_name, .quantity, .unit', function (e) {
        if (e.keyCode === 8) { // Backspace key code
            updateBillDisplay();
        }
    });
});



</script>






</html>
