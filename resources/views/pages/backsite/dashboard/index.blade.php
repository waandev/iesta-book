@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- eCommerce statistic -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">850</h3>
                                <h6>Products Sold</h6>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">$748</h3>
                                <h6>Net Profit</h6>
                            </div>
                            <div>
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">146</h3>
                                <h6>New Customers</h6>
                            </div>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">99.89 %</h3>
                                <h6>Customer Satisfaction</h6>
                            </div>
                            <div>
                                <i class="icon-heart danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ eCommerce statistic -->

    <!-- Products sell and New Orders -->
    <div class="row match-height">
        <div class="col-xl-8 col-12" id="ecommerceChartView">
            <div class="card card-shadow">
                <div class="card-header card-header-transparent py-20">
                    <div class="btn-group dropdown">
                        <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS
                            SALES</a>
                        <div class="dropdown-menu animate" role="menu">
                            <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">profit</a>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                        <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                    </ul>
                </div>
                <div class="widget-content tab-content bg-white p-20">
                    <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Orders</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div id="new-orders" class="media-list position-relative">
                        <div class="table-responsive">
                            <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Product</th>
                                        <th class="border-top-0">Customers</th>
                                        <th class="border-top-0">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate">iPhone X</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Katherine Nichols"
                                                    class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-18.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-17.png"
                                                        alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+4 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">$8999</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">Pixel 2</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Alice Scott" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-16.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Charles Miller" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-15.png"
                                                        alt="Avatar">
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">$5550</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">OnePlus</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Christine Ramos"
                                                    class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-11.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Thomas Brewer" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-10.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Alice Chapman" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-9.png"
                                                        alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+3 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">$9000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">Galaxy</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Ryan Schneider" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-14.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Tiffany Oliver" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-13.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Joan Reid" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-12.png"
                                                        alt="Avatar">
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">$7500</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">Moto Z2</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Kimberly Simmons"
                                                    class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-8.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-7.png"
                                                        alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle"
                                                        src="../../../app-assets/images/portrait/small/avatar-s-6.png"
                                                        alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+1 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-truncate">$8500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Products sell and New Orders -->

    <!-- Recent Transactions -->
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Transactions</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                                    href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Invoice#</th>
                                    <th class="border-top-0">Customer Name</th>
                                    <th class="border-top-0">Products</th>
                                    <th class="border-top-0">Categories</th>
                                    <th class="border-top-0">Shipping</th>
                                    <th class="border-top-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate"><i
                                            class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                    <td class="text-truncate"><a href="#">INV-001001</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2"
                                                src="../../../app-assets/images/portrait/small/avatar-s-4.png"
                                                alt="avatar">
                                        </span>
                                        <span>Elizabeth W.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-1.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-2.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-4.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">
                                                <span class="badge badge-info">+1 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 1200.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                        Declined</td>
                                    <td class="text-truncate"><a href="#">INV-001002</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2"
                                                src="../../../app-assets/images/portrait/small/avatar-s-5.png"
                                                alt="avatar">
                                        </span>
                                        <span>Doris R.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-5.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-6.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">
                                                <span class="badge badge-info">+2 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-warning round">Electronics</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 1850.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><i
                                            class="la la-dot-circle-o warning font-medium-1 mr-1"></i> Pending</td>
                                    <td class="text-truncate"><a href="#">INV-001003</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2"
                                                src="../../../app-assets/images/portrait/small/avatar-s-6.png"
                                                alt="avatar">
                                        </span>
                                        <span>Megan S.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-2.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-5.jpg"
                                                    alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-success round">Groceries</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 3200.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><i
                                            class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                    <td class="text-truncate"><a href="#">INV-001004</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2"
                                                src="../../../app-assets/images/portrait/small/avatar-s-7.png"
                                                alt="avatar">
                                        </span>
                                        <span>Andrew D.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-6.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-1.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">
                                                <span class="badge badge-info">+1 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-info round">Apparels</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 4500.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><i
                                            class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                    <td class="text-truncate"><a href="#">INV-001005</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2"
                                                src="../../../app-assets/images/portrait/small/avatar-s-9.png"
                                                alt="avatar">
                                        </span>
                                        <span>Walter R.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-5.jpg"
                                                    alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                    src="../../../app-assets/images/portfolio/portfolio-3.jpg"
                                                    alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 1500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Recent Transactions -->
@endsection
