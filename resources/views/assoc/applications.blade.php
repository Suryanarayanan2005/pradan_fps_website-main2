<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PRADAN - Professional Assistance for Development Action</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">




    <style>
        .edit-dropdown {
            z-index: 1000;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 5px 0;
            min-width: 180px;
        }

        .dropdown-item {
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            padding: 8px 16px;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }


        /*        
.list-group-item {
    padding: 10px 20px;
    font-size: 16px;
}

.list-group-item:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

.modal-header {
    background-color: #007bff;
    color: #fff;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
} */
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step3-container {
            display: flex;
            flex-direction: column;
            gap: 15px;

            /* Added spacing */
        }

        #land_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #land_table td,
        #land_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #land_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        #pond_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #pond_table td,
        #pond_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #pond_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        #plant_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #plant_table td,
        #plant_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #plant_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0.5rem;
            padding: 5px 10px;
        }

        /* General Table Styling */
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ccc;
            padding: 8px 12px;
            border-radius: 0.25rem;
            outline: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #4b49ac;
            box-shadow: 0 0 0 0.1rem rgba(75, 73, 172, 0.25);
        }

        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            margin: 0 2px;
            border-radius: 0.25rem;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #4b49ac;
            color: #fff !important;
            border-color: #4b49ac;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #134E13;
            color: white !important;
            border-color: #fff;
        }

        /* Table Info Text */
        .dataTables_wrapper .dataTables_info {
            font-size: 14px;
            margin-top: 10px;
        }

        /* Search Label */
        .dataTables_wrapper .dataTables_filter label {
            font-weight: 600;
            font-size: 14px;
        }

        /* Hide the default 'Search:' label text */
        .dataTables_wrapper .dataTables_filter label {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 0.5rem;
            font-size: 0;
            /* Hides text but keeps layout */
        }

        /* Search input styling */
        .dataTables_wrapper .dataTables_filter input {
            margin-top: 5px;
            margin-right: 3px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 8px 12px 8px 35px;
            /* left space for icon */
            border-radius: 25px;
            outline: none;
            font-size: 14px;
            transition: all 0.2s;
            width: 250px;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='gray' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 16px 16px;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #134E13;
            box-shadow: 0 0 0 2px rgba(75, 73, 172, 0.1);
            outline: none;
        }

        /* Responsive Wrapping Fix */
        @media (max-width: 768px) {

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_paginate {
                text-align: center;
                float: none !important;
            }
        }
    </style>

    </style>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{route('vol')}}"><img src="{{ asset('assets/images/icons/Pradan-logo-title.png')}}" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('vol')}}"><img src="{{asset('assets/images/icons/Pradan-logo-icon.png')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="assets/images/faces/face15.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-user text-primary"></i> Profile </a>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="ti-power-off text-primary"></i> Logout </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('vol')}}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Forms</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('form1')}}">Land Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('form2')}}">Pond Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('form3')}}">Plantation Form</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('application')}}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post_appl')}}">
                            <i class="ti-wallet menu-icon"></i>
                            <span class="menu-title">Post Funding</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <ul class="nav nav-tabs mb-3"
                                    style="border-radius: 10px 10px 10px 10px; overflow: hidden;" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#landform" role="tab"
                                            aria-selected="true">
                                            <i class="fas fa-seedling"></i><b>&nbsp;Land Form</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#pondform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-water"></i><b>&nbsp;Pond Form</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#plantform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-tree"></i><b>&nbsp;Plantation Form</b>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane p-20 active show" id="landform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Land Form</h4>
                                                <div class="table-responsive">
                                                    <table id="land_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Land Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp

                                                            @foreach($form1 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp
                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN-00{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="land_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}" class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>

                                                                <td>
                                                                    {{-- Show Edit if status is 1 (Submitted), 2 (Change Requested by TL/Coor), or 5 (Finance Change Request) --}}
                                                                    @if(in_array($f->status, [1, 2, 5]))
                                                                    <!-- Button to open modal -->
                                                                    <!-- Edit Button -->
                                                                    <!-- Wrapper to position dropdown relative to this container -->
                                                                    <div class="edit-dropdown-wrapper" style="position: relative; display: inline-block;">
                                                                        <button class="btn btn-warning edit-btn" value="{{ $f->id }}">Edit</button>

                                                                        <!-- Positioned absolutely inside relative parent -->
                                                                        <div class="edit-dropdown" id="edit-dropdown-{{ $f->id }}" style="display: none; position: absolute; top: 100%; left: 0;">
                                                                            <button class="dropdown-item detail-btn ed_farmer" value="{{ $f->id }}">Farmer Details</button>
                                                                            <button class="dropdown-item detail-btn ed_land" value="{{ $f->id }}">Land Details</button>
                                                                            <button class="dropdown-item detail-btn ed_bank" value="{{ $f->id }}">Bank Details</button>
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    <!-- Modal -->
                                                                    <!-- <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="detailsModalLabel">Edit Details</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="list-group">
                                                                                    <a href="#" class="list-group-item list-group-item-action editFarmerBtn" data-form-id="">Farmer's Details</a>
                                                                                <a href="#" class="list-group-item list-group-item-action" id="landDetails"  data-form-id="">Land Details</a>
                                                                                <a href="#" class="list-group-item list-group-item-action" id="bankDetails"  data-form-id="">Bank Details</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div> -->
                                                                    &nbsp;&nbsp;
                                                                    @endif

                                                                    {{-- Show Delete only if status is 1 (Submitted) --}}
                                                                    @if($f->status == 1)
                                                                    <button type="button" class="btn btn-danger delete-btn" 
        data-id="{{ $f->id }}" 
        data-type="land" 
        title="Delete">
    <i class="fas fa-trash-alt"></i>
</button>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @switch($f->status)
                                                                    @case(1)
                                                                    <button class="btn btn-inverse-info btn-fw">Submitted</button>
                                                                    @break

                                                                    @case(2)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Change Requested
                                                                        by Reviewer</button>
                                                                    @break

                                                                    @case(3)
                                                                    <button class="btn btn-inverse-danger btn-fw">Rejected by
                                                                        Reviewer</button>
                                                                    @break

                                                                    @case(4)
                                                                    <button class="btn btn-inverse-info btn-fw">Pending
                                                                        Finance</button>
                                                                    @break

                                                                    @case(5)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Finance
                                                                        Requested Change</button>
                                                                    @break

                                                                    @case(6)
                                                                    <button class="btn btn-inverse-success btn-fw">Final
                                                                        Approved</button>
                                                                    @break
                                                                    @endswitch
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="pondform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Pond Form</h4>
                                                <div class="table-responsive">
                                                    <table id="pond_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Pond Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp

                                                            @foreach($form2 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp

                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN-00{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="pond_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}" class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>


                                                                <td>
                                                                    {{-- Show Edit if status is 1 (Submitted), 2 (Change Requested by TL/Coor), or 5 (Finance Change Request) --}}
                                                                    @if(in_array($f->status, [1, 2, 5]))
                                                                    <!-- Wrapper to position dropdown relative to this container -->
                                                                    <div class="edit-dropdown-wrapper" style="position: relative; display: inline-block;">
                                                                        <button class="btn btn-warning edit-btn" value="{{ $f->id }}">Edit</button>

                                                                        <!-- Positioned absolutely inside relative parent -->
                                                                        <div class="edit-dropdown" id="edit-dropdown-{{ $f->id }}" style="display: none; position: absolute; top: 100%; left: 0;">
                                                                            <button class="dropdown-item detail-btn ed_farmer" value="{{ $f->id }}">Farmer Details</button>
                                                                            <button class="dropdown-item detail-btn ed_pond" value="{{ $f->id }}">Pond Details</button>
                                                                            <button class="dropdown-item detail-btn ed_bank" value="{{ $f->id }}">Bank Details</button>
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    <!-- Modal
                                                                         <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="detailsModalLabel">Edit Details</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="list-group">
                                                                                    <a href="#" class="list-group-item list-group-item-action editFarmerBtn" data-form-id="{{ $f->id }}">Farmer's Details</a>
                                                                                <a href="#" class="list-group-item list-group-item-action" id="landDetails"  data-form-id="{{ $f->id }}">Land Details</a>
                                                                                <a href="#" class="list-group-item list-group-item-action" id="bankDetails"  data-form-id="{{ $f->id }}">Bank Details</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div> -->
                                                                    @endif




                                                                    {{-- Show Delete only if status is 1 (Submitted) --}}
                                                                    @if($f->status == 1)
                                                                   <button type="button" class="btn btn-danger delete-btn" 
        data-id="{{ $f->id }}" 
        data-type="pond" 
        title="Delete">
    <i class="fas fa-trash-alt"></i>
</button>
                                                                    @endif
                                                                </td>



                                                                <td>
                                                                    @switch($f->status)
                                                                    @case(1)
                                                                    <button class="btn btn-inverse-info btn-fw">Submitted</button>
                                                                    @break

                                                                    @case(2)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Change Requested
                                                                        by Reviewer</button>
                                                                    @break

                                                                    @case(3)
                                                                    <button class="btn btn-inverse-danger btn-fw">Rejected by
                                                                        Reviewer</button>
                                                                    @break

                                                                    @case(4)
                                                                    <button class="btn btn-inverse-info btn-fw">Pending
                                                                        Finance</button>
                                                                    @break

                                                                    @case(5)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Finance
                                                                        Requested Change</button>
                                                                    @break

                                                                    @case(6)
                                                                    <button class="btn btn-inverse-success btn-fw">Final
                                                                        Approved</button>
                                                                    @break
                                                                    @endswitch
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="plantform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Plantation Form</h4>
                                                <div class="table-responsive">
                                                    <table id="plant_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Plantation Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp
                                                            @foreach($form3 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp
                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN-00{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="plant_detail"
                                                                        value="{{$f->id}}"><i class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}" class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>

                                                                <td>
                                                                    {{-- Show Edit if status is 1 (Submitted), 2 (Change Requested by TL/Coor), or 5 (Finance Change Request) --}}
                                                                    @if(in_array($f->status, [1, 2, 5]))
                                                                    <!-- Wrapper to position dropdown relative to this container -->
                                                                    <div class="edit-dropdown-wrapper" style="position: relative; display: inline-block;">
                                                                        <button class="btn btn-warning edit-btn" value="{{ $f->id }}">Edit</button>

                                                                        <!-- Positioned absolutely inside relative parent -->
                                                                        <div class="edit-dropdown" id="edit-dropdown-{{ $f->id }}" style="display: none; position: absolute; top: 100%; left: 0;">
                                                                            <button class="dropdown-item detail-btn ed_farmer" value="{{ $f->id }}">Farmer Details</button>
                                                                            <button class="dropdown-item detail-btn ed_plant" value="{{ $f->id }}">Plant Details</button>
                                                                            <button class="dropdown-item detail-btn ed_bank" value="{{ $f->id }}">Bank Details</button>
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    @endif

                                                                    {{-- Show Delete only if status is 1 (Submitted) --}}
                                                                    @if($f->status == 1)
                                                                    <button type="button" class="btn btn-danger delete-btn" 
        data-id="{{ $f->id }}" 
        data-type="plant" 
        title="Delete">
    <i class="fas fa-trash-alt"></i>
</button>
                                                                    @endif
                                                                </td>



                                                                <td>
                                                                    @switch($f->status)
                                                                    @case(1)
                                                                    <button class="btn btn-inverse-info btn-fw">Submitted</button>
                                                                    @break

                                                                    @case(2)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Change Requested
                                                                        by Reviewer</button>
                                                                    @break

                                                                    @case(3)
                                                                    <button class="btn btn-inverse-danger btn-fw">Rejected by
                                                                        Reviewer</button>
                                                                    @break

                                                                    @case(4)
                                                                    <button class="btn btn-inverse-info btn-fw">Pending
                                                                        Finance</button>
                                                                    @break

                                                                    @case(5)
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Finance
                                                                        Requested Change</button>
                                                                    @break

                                                                    @case(6)
                                                                    <button class="btn btn-inverse-success btn-fw">Final
                                                                        Approved</button>
                                                                    @break
                                                                    @endswitch
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.
                            Developed and Maintained By <b>TIH & Developers Unit</b>.
                            All rights reserved.</span>

                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Contact Us <a
                                href="https://www.linkedin.com/company/professional-assistance-for-development-action/"><i
                                    class="ti-linkedin ms-2"></a></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------- Modals ---------------------------------------------------------------->

    <!--  Farmer Detail Modal -->
    <div class="modal fade" id="farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Row 1 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Name:</strong> <span id="f_name"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Father/Spouse:</strong> <span id="f_spouse"></span>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Mobile:</strong> <span id="f_mobile"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Gender:</strong> <span id="f_gender"></span>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Card:</strong> <span id="f_card"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Members:</strong> <span id="f_member"></span>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Number:</strong> <span id="f_number"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Hamlet:</strong> <span id="f_hamlet"></span>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Panchayat:</strong> <span id="f_panchayat"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Block:</strong> <span id="f_block"></span>
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Household:</strong> <span id="f_household_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Special Category:</strong> <span id="f_special_category"></span>
                        </div>
                    </div>

                    <!-- Row 7 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Caste:</strong> <span id="f_caste"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Occupation:</strong> <span id="f_occupation"></span>
                        </div>
                    </div>

                    <!-- Row 8 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of House:</strong> <span id="f_house_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Drinking Water Source:</strong> <span id="f_drinking_water"></span>
                        </div>
                    </div>

                    <!-- Row 9 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Potability:</strong> <span id="f_potability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Domestic Water Source:</strong> <span id="f_domestic_water"></span>
                        </div>
                    </div>

                    <!-- Row 10 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Availability:</strong> <span id="f_toilet_availability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Condition:</strong> <span id="f_toilet_condition"></span>
                        </div>
                    </div>

                    <!-- Row 11 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>House Owner:</strong> <span id="f_house_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Household Education:</strong> <span id="f_household_education"></span>
                        </div>
                    </div>

                    <!-- Row 12 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Latitude:</strong> <span id="f_latitude"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Longitude:</strong> <span id="f_longitude"></span>
                        </div>
                    </div>

                    <!-- Row 13 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>MCode:</strong> <span id="f_mcode"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editable Farmer Detail Modal -->
    <div class="modal fade" id="edit_farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Repeatable Row Template -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <label><strong>Farmer Name:</strong></label>
                            <input type="text" class="form-control" id="input_f_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Father/Spouse:</strong></label>
                            <input type="text" class="form-control" id="input_f_spouse">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <label><strong>Mobile:</strong></label>
                            <input type="text" class="form-control" id="input_f_mobile">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Gender:</strong></label>
                            <input type="text" class="form-control" id="input_f_gender">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Id Card Type:</strong></label>
                            <input type="text" class="form-control" id="input_f_card">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Household Members:</strong></label>
                            <input type="text" class="form-control" id="input_f_member">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Id Number:</strong></label>
                            <input type="text" class="form-control" id="input_f_number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Hamlet:</strong></label>
                            <input type="text" class="form-control" id="input_f_hamlet">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Panchayat:</strong></label>
                            <input type="text" class="form-control" id="input_f_panchayat">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Block:</strong></label>
                            <input type="text" class="form-control" id="input_f_block">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Type of Household:</strong></label>
                            <input type="text" class="form-control" id="input_f_household_type">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Special Category:</strong></label>
                            <input type="text" class="form-control" id="input_f_special_category">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Caste:</strong></label>
                            <input type="text" class="form-control" id="input_f_caste">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Occupation:</strong></label>
                            <input type="text" class="form-control" id="input_f_occupation">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Type of House:</strong></label>
                            <input type="text" class="form-control" id="input_f_house_type">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Drinking Water Source:</strong></label>
                            <input type="text" class="form-control" id="input_f_drinking_water">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Potability:</strong></label>
                            <input type="text" class="form-control" id="input_f_potability">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Domestic Water Source:</strong></label>
                            <input type="text" class="form-control" id="input_f_domestic_water">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Toilet Availability:</strong></label>
                            <input type="text" class="form-control" id="input_f_toilet_availability">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Toilet Condition:</strong></label>
                            <input type="text" class="form-control" id="input_f_toilet_condition">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>House Owner:</strong></label>
                            <input type="text" class="form-control" id="input_f_house_owner">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Household Education:</strong></label>
                            <input type="text" class="form-control" id="input_f_household_education">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Latitude:</strong></label>
                            <input type="text" class="form-control" id="input_f_latitude">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Longitude:</strong></label>
                            <input type="text" class="form-control" id="input_f_longitude">
                        </div>
                    </div>



                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Land Detail Modal -->
    <div class="modal fade" id="landdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Land Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rows for Land Details -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Ownership:</strong> <span id="l_ownership"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="l_well_irrigation"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Area Irrigated:</strong> <span id="l_area_irrigated"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="l_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="l_patta"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Area:</strong> <span id="l_tarea"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Revenue Village:</strong> <span id="l_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>S.F No:</strong> <span id="l_sf"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="l_soil"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Land to Benefit:</strong> <span id="l_benefit"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="l_field"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="l_site"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="l_doi"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="l_doa"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="l_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Benefits:</strong> <span id="l_area"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Other Works:</strong> <span id="l_oth"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="l_pradan"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="l_farmer"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Amount:</strong> <span id="l_total"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Land Form Modal -->
    <div class="modal fade" id="editlanddet_modal" tabindex="-1" aria-labelledby="editLandModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="editLandModalLabel">Edit Land Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff;"></button>
                </div>
                <form id="editlandEditForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="ed_land_id" id="ed_land_id">

                        <div class="row g-3">
                            <div class="col-md-6"><label>Ownership</label><input type="text" class="form-control" name="ownership" id="ownership"></div>
                            <div class="col-md-6"><label>Well Irrigation</label><input type="text" class="form-control" name="well_irrigation" id="well_irrigation"></div>
                            <div class="col-md-6"><label>Area Irrigated</label><input type="text" class="form-control" name="area_irrigated" id="area_irrigated"></div>
                            <div class="col-md-6"><label>Irrigated Lands</label><input type="text" class="form-control" name="irrigated_lands" id="irrigated_lands"></div>
                            <div class="col-md-6"><label>Patta</label><input type="text" class="form-control" name="patta" id="patta"></div>
                            <div class="col-md-6"><label>Total Area</label><input type="text" class="form-control" name="total_area" id="total_area"></div>
                            <div class="col-md-6"><label>Revenue</label><input type="text" class="form-control" name="revenue" id="revenue"></div>
                            <div class="col-md-6"><label>Crop Season</label><input type="text" class="form-control" name="crop_season" id="crop_season"></div>
                            <div class="col-md-6"><label>Livestocks</label><input type="text" class="form-control" name="livestocks" id="livestocks"></div>
                            <div class="col-md-6"><label>SF Number</label><input type="text" class="form-control" name="sf_number" id="sf_number"></div>
                            <div class="col-md-6"><label>Soil Type</label><input type="text" class="form-control" name="soil_type" id="soil_type"></div>
                            <div class="col-md-6"><label>Land Benefit</label><input type="text" class="form-control" name="land_to_benefit" id="land_to_benefit"></div>
                            <div class="col-md-6"><label>Field Inspection</label><input type="text" class="form-control" name="field_insp" id="field_insp"></div>
                            <div class="col-md-6"><label>Site Approved</label><input type="text" class="form-control" name="site_app" id="site_app"></div>
                            <div class="col-md-6"><label>Date of Inspection</label><input type="date" class="form-control" name="date_of_ins" id="date_of_ins"></div>
                            <div class="col-md-6"><label>Date of Approval</label><input type="date" class="form-control" name="date_of_app" id="date_of_app"></div>
                            <div class="col-md-6"><label>Type of Work</label><input type="text" class="form-control" name="type_of_work" id="type_of_work"></div>
                            <div class="col-md-6"><label>Area Benefited</label><input type="text" class="form-control" name="area_benefited" id="area_benefited"></div>
                            <div class="col-md-6"><label>Other Works</label><input type="text" class="form-control" name="any_other_works" id="any_other_works"></div>
                            <div class="col-md-6"><label>Pradan Contribution</label><input type="text" class="form-control" name="p_contribution" id="p_contribution"></div>
                            <div class="col-md-6"><label>Farmer Contribution</label><input type="text" class="form-control" name="f_contribution" id="f_contribution"></div>
                            <div class="col-md-6"><label>Total Estimate Amount</label><input type="text" class="form-control" name="total_est" id="total_est"></div>
                            <div class="col-md-6"><label>Area PF</label><input type="text" class="form-control" name="area_benefited_postfunding" id="area_benefited_postfunding"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Pond Detail Modal -->
    <div class="modal fade" id="ponddet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pond Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rows for Pond Details -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land Owner:</strong> <span id="p_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="p_patta"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Total Area:</strong> <span id="p_tarea"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="p_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Revenue:</strong> <span id="p_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Livestock:</strong> <span id="p_livestock"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Crop Season:</strong> <span id="p_crop_season"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="p_well_irrigation"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>SF No:</strong> <span id="p_sf"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="p_soil"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land to Serve:</strong> <span id="p_land"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="p_field"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="p_site"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="p_type_of_work"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="p_doi"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="p_doa"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Length:</strong> <span id="p_len"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Depth:</strong> <span id="p_dep"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Breadth:</strong> <span id="p_breadth"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Volume:</strong> <span id="p_vol"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="p_pcont"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="p_fcont"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Total:</strong> <span id="total_est"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Editable Pond Detail Modal - New Version -->
    <div class="modal fade" id="editponddet_modal_2" tabindex="-1" aria-labelledby="editPondLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <form id="pondEditForm2">
                @csrf

                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                    <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                        <h5 class="modal-title text-white" id="editPondLabel">Edit Pond Details</h5>
                        <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="p2_pond_id" name="pond_id">

                        <!-- Form Fields (All IDs prefixed with p2_) -->
                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land Owner:</strong></label>
                                <input type="text" class="form-control" id="p2_owner" name="p_owner">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Patta No:</strong></label>
                                <input type="text" class="form-control" id="p2_patta" name="p_patta">
                            </div>
                        </div>

                        <!-- Repeat for remaining fields using p2_ prefix -->
                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Total Area:</strong></label>
                                <input type="text" class="form-control" id="p2_tarea" name="p_tarea">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Irrigated Lands:</strong></label>
                                <input type="text" class="form-control" id="p2_irrigated_lands" name="p_irrigated_lands">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Revenue:</strong></label>
                                <input type="text" class="form-control" id="p2_revenue" name="p_revenue">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Livestock:</strong></label>
                                <input type="text" class="form-control" id="p2_livestock" name="p_livestock">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Crop Season:</strong></label>
                                <input type="text" class="form-control" id="p2_crop_season" name="p_crop_season">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Well Irrigation:</strong></label>
                                <input type="text" class="form-control" id="p2_well_irrigation" name="p_well_irrigation">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>SF No:</strong></label>
                                <input type="text" class="form-control" id="p2_sf" name="p_sf">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Soil Type:</strong></label>
                                <input type="text" class="form-control" id="p2_soil" name="p_soil">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land to Serve:</strong></label>
                                <input type="text" class="form-control" id="p2_land" name="p_land">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Field Inspection:</strong></label>
                                <input type="text" class="form-control" id="p2_field" name="p_field">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Site Approval:</strong></label>
                                <input type="text" class="form-control" id="p2_site" name="p_site">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Type of Work:</strong></label>
                                <input type="text" class="form-control" id="p2_type_of_work" name="p_type_of_work">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Inspection:</strong></label>
                                <input type="date" class="form-control" id="p2_doi" name="p_doi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Approval:</strong></label>
                                <input type="date" class="form-control" id="p2_doa" name="p_doa">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Length:</strong></label>
                                <input type="text" class="form-control" id="p2_len" name="p_len">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Depth:</strong></label>
                                <input type="text" class="form-control" id="p2_dep" name="p_dep">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Breadth:</strong></label>
                                <input type="text" class="form-control" id="p2_breadth" name="p_breadth">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Volume:</strong></label>
                                <input type="text" class="form-control" id="p2_vol" name="p_vol">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Pradan Contribution:</strong></label>
                                <input type="text" class="form-control" id="p2_pcont" name="p_pcont">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Farmer Contribution:</strong></label>
                                <input type="text" class="form-control" id="p2_fcont" name="p_fcont">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Total:</strong></label>
                                <input type="text" class="form-control" id="p2_total" name="total_est">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <!-- Bank Detail Modal -->
    <div class="modal fade" id="bankdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="background-color: #134E13; border-bottom: 2px solid #dee2e6;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Bank Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Holder Name:</strong> <span id="b_hname"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Account Number:</strong> <span id="b_no"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Bank Name:</strong> <span id="b_name"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Branch:</strong> <span id="b_branch"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>IFSC Code:</strong> <span id="b_ifsc"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Detail Edit Modal -->
    <div class="modal fade" id="edit_bankdet_modal" tabindex="-1" aria-labelledby="bankDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="background-color: #134E13; border-bottom: 2px solid #dee2e6;">
                    <h5 class="modal-title text-white" id="bankDetailModalLabel">Edit Bank Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editbankDetailForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" id="edit_form_id" name="form_id">

                            <label for="edit_holder_name" class="form-label"><strong>Holder Name:</strong></label>
                            <input type="text" class="form-control" id="edit_holder_name" name="holder_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_account_number" class="form-label"><strong>Account Number:</strong></label>
                            <input type="text" class="form-control" id="edit_account_number" name="account_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_bank_name" class="form-label"><strong>Bank Name:</strong></label>
                            <input type="text" class="form-control" id="edit_bank_name" name="bank_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_branch" class="form-label"><strong>Branch:</strong></label>
                            <input type="text" class="form-control" id="edit_branch" name="branch" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_ifsc" class="form-label"><strong>IFSC Code:</strong></label>
                            <input type="text" class="form-control" id="edit_ifsc" name="ifsc_code" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Plant Detail Modal -->
    <!-- Plantation Detail Modal -->
    <div class="modal fade" id="plantdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Plantation Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Grouped Row Blocks -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Ownership:</strong> <span id="plant_ownership"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="plant_well_irrigation"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Irrigated:</strong> <span id="plant_area_irrigated"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="plant_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="plant_patta"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Area:</strong> <span id="plant_total_area"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Revenue Village:</strong> <span id="plant_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Crop Season:</strong> <span id="plant_crop_season"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Livestock:</strong> <span id="plant_livestock"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Plantation Type:</strong> <span id="plant_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>SF No:</strong> <span id="plant_sf_no"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="plant_soil_type"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land to Benefit:</strong> <span id="plant_land_benefit"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="plant_field_inspection"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="plant_site_approval"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="plant_date_of_inspection"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="plant_date_of_approval"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="plant_type_of_work"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Benefit:</strong> <span id="plant_area_benefit"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Other Works:</strong> <span id="plant_other_works"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="plant_pradan_contribution"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="plant_farmer_contribution"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Amount:</strong> <span id="plant_total_amount"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editable Plant Detail Modal -->
    <div class="modal fade" id="editplantdet_modal" tabindex="-1" aria-labelledby="editPlantLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <form id="plantEditForm">
                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                    <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #3c763d;">
                        <h5 class="modal-title text-white" id="editPlantLabel">Edit Plantation Details</h5>
                        <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="pl_plant_id" name="plant_id">

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Ownership:</strong></label>
                                <input type="text" class="form-control" id="pl_ownership" name="pl_ownership">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Well Irrigation:</strong></label>
                                <input type="text" class="form-control" id="pl_well_irrigation" name="pl_well_irrigation">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Area Irrigated:</strong></label>
                                <input type="text" class="form-control" id="pl_area_irrigated" name="pl_area_irrigated">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Irrigated Lands:</strong></label>
                                <input type="text" class="form-control" id="pl_irrigated_lands" name="pl_irrigated_lands">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Patta No:</strong></label>
                                <input type="text" class="form-control" id="pl_patta" name="pl_patta">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Total Area:</strong></label>
                                <input type="text" class="form-control" id="pl_total_area" name="pl_total_area">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Revenue Village:</strong></label>
                                <input type="text" class="form-control" id="pl_revenue" name="pl_revenue">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Crop Season:</strong></label>
                                <input type="text" class="form-control" id="pl_crop_season" name="pl_crop_season">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Livestock:</strong></label>
                                <input type="text" class="form-control" id="pl_livestock" name="pl_livestock">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Plantation Type:</strong></label>
                                <input type="text" class="form-control" id="pl_type" name="pl_type">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>SF No:</strong></label>
                                <input type="text" class="form-control" id="pl_sf_no" name="pl_sf_no">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Soil Type:</strong></label>
                                <input type="text" class="form-control" id="pl_soil_type" name="pl_soil_type">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land to Benefit:</strong></label>
                                <input type="text" class="form-control" id="pl_land_benefit" name="pl_land_benefit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Field Inspection:</strong></label>
                                <input type="text" class="form-control" id="pl_field_inspection" name="pl_field_inspection">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Site Approval:</strong></label>
                                <input type="text" class="form-control" id="pl_site_approval" name="pl_site_approval">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Inspection:</strong></label>
                                <input type="date" class="form-control" id="pl_date_of_inspection" name="pl_date_of_inspection">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Approval:</strong></label>
                                <input type="date" class="form-control" id="pl_date_of_approval" name="pl_date_of_approval">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Type of Work:</strong></label>
                                <input type="text" class="form-control" id="pl_type_of_work" name="pl_type_of_work">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Area Benefit:</strong></label>
                                <input type="text" class="form-control" id="pl_area_benefit" name="pl_area_benefit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Other Works:</strong></label>
                                <input type="text" class="form-control" id="pl_other_works" name="pl_other_works">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Pradan Contribution:</strong></label>
                                <input type="text" class="form-control" id="pl_pradan_contribution" name="pl_pradan_contribution">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Farmer Contribution:</strong></label>
                                <input type="text" class="form-control" id="pl_farmer_contribution" name="pl_farmer_contribution">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6">
                                <label><strong>Total Amount:</strong></label>
                                <input type="text" class="form-control" id="pl_total_amount" name="pl_total_amount">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Measurement Modal -->
    <div class="modal fade" id="measure_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="measurement_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Measurements</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="meas_id" name="meas_id" hidden>
                        <div class="mb-3">
                            <label for="length" class="form-label">Length (m)</label>
                            <input type="number" step="0.01" class="form-control" id="length" name="length" required>
                        </div>
                        <div class="mb-3">
                            <label for="breadth" class="form-label">Breadth (m)</label>
                            <input type="number" step="0.01" class="form-control" id="breadth" name="breadth" required>
                        </div>
                        <div class="mb-3">
                            <label for="depth" class="form-label">Depth (m)</label>
                            <input type="number" step="0.01" class="form-control" id="depth" name="depth" required>
                        </div>
                        <div class="mb-3">
                            <label for="volume" class="form-label">Volume (m³)</label>
                            <input type="text" class="form-control" id="volume" name="volume" readonly>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="view_rem_modal" tabindex="-1" aria-labelledby="remarksLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remarks from TL/Coordinator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="view_remark_text" class="text-dark"></p>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Submitted Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="document-buttons">
                    <!-- Buttons will be added here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- File Viewer Modal -->
    <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-labelledby="fileViewerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Document Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <iframe id="docPreview" src="" width="80%" height="400px" style="border: none;"></iframe>
                    <br>
                    <a id="docDownload" class="btn btn-success mt-3" href="#" download target="_blank">Download</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Farmer Modal llllllllllllllllllll
<div class="modal fade" id="editFarmerModal" tabindex="-1" aria-labelledby="editFarmerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="editFarmerModalLabel">Edit Farmer Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="edit_farmer_form">
          <div class="row">
            <div class="col-md-6">
            
              <input type="hidden" id="form-id">
              <label>Farmer Name</label>
              <input type="text" class="form-control" id="edit_farmer_name">
              <label>Father/Spouse</label>
              <input type="text" class="form-control" id="edit_father_spouse">
              <label>Mobile</label>
              <input type="text" class="form-control" id="edit_mobile_number">
              <label>Gender</label>
              <input type="text" class="form-control" id="edit_gender">
              <label>Identity Card</label>
              <input type="text" class="form-control" id="edit_identity_card_type">
              <label>Household Members</label>
              <input type="number" class="form-control" id="edit_household_members">
              <label>Identity Number</label>
              <input type="text" class="form-control" id="edit_identity_card_number">
              <label>Hamlet</label>
              <input type="text" class="form-control" id="edit_hamlet">
              <label>Panchayat</label>
              <input type="text" class="form-control" id="edit_panchayat">
              <label>Block</label>
              <input type="text" class="form-control" id="edit_block">
              <label>Latitude</label>
              <input type="text" class="form-control" id="edit_lat">
              <label>Longitude</label>
              <input type="text" class="form-control" id="edit_lon">
            </div>
            
            <div class="col-md-6">
              <label>Type of Households</label>
              <input type="text" class="form-control" id="edit_type_of_households">
              <label>Special Category</label>
              <input type="text" class="form-control" id="edit_special_catog">
              <label>Caste</label>
              <input type="text" class="form-control" id="edit_caste">
              <label>Occupation</label>
              <input type="text" class="form-control" id="edit_hh_occupation">
              <label>Type of House</label>
              <input type="text" class="form-control" id="edit_type_of_house">
              <label>Drinking Water</label>
              <input type="text" class="form-control" id="edit_drinking_water">
              <label>Potability</label>
              <input type="text" class="form-control" id="edit_potability">
              <label>Domestic Water</label>
              <input type="text" class="form-control" id="edit_domestic_water">
              <label>Toilet Availability</label>
              <input type="text" class="form-control" id="edit_toilet_availability">
              <label>Toilet Condition</label>
              <input type="text" class="form-control" id="edit_toilet_cond">
              <label>House Owner</label>
              <input type="text" class="form-control" id="edit_house_owner">
              <label>Household Education</label>
              <input type="text" class="form-control" id="edit_household_education">
              <label><b>MCode (readonly)</b></label>
              <input type="text" class="form-control" id="edit_mcode" readonly>
            </div>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update_farmer_btn">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
      
    </div>
  </div>
</div> -->



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#land_table').DataTable({
                lengthChange: false
            });
            $('#pond_table').DataTable({
                lengthChange: false
            });
            $('#plant_table').DataTable({
                lengthChange: false
            });
            $('#land_table_filter input[type="search"]').attr('placeholder', 'Search...');
            $('#pond_table_filter input[type="search"]').attr('placeholder', 'Search...');
            $('#plant_table_filter input[type="search"]').attr('placeholder', 'Search...');

        });

        $(document).ready(function() {
            $('#length, #breadth, #depth').on('input', function() {
                let length = parseFloat($('#length').val()) || 0;
                let breadth = parseFloat($('#breadth').val()) || 0;
                let depth = parseFloat($('#depth').val()) || 0;
                let volume = length * breadth * depth;
                $('#volume').val(volume.toFixed(2));
            });


        });
    </script>

    <script>
        function nextStep(current, next) {
            document.getElementById('step' + current).style.display = 'none';
            document.getElementById('step' + next).style.display = 'block';
        }

        function prevStep(current, prev) {
            document.getElementById('step' + current).style.display = 'none';
            document.getElementById('step' + prev).style.display = 'block';
        }



        function updateIdentityTitle() {
            const selectedIdentity = document.querySelector('input[name="identityCard"]:checked');
            const fileUploadLabel = document.getElementById("fileUploadLabel");
            if (selectedIdentity) {
                fileUploadLabel.textContent = `Upload ${selectedIdentity.value} Proof`;
            }
        }

        function nextStep(current, next) {
            document.getElementById("step" + current).style.display = "none";
            document.getElementById("step" + next).style.display = "block";
        }

        function prevStep(current, previous) {
            document.getElementById("step" + current).style.display = "none";
            document.getElementById("step" + previous).style.display = "block";
        };

        $(document).on("submit", "#landform", function(e) {
            e.preventDefault();
            var form = new FormData(this);
            $.ajax({
                type: "POST",
                url: "/form_land",
                data: form,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success!",
                            text: "Form Submitted Successfully",
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                }
            })

        })


        $(document).on("click", "#farmer_detail", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            $.ajax({
                type: "GET",
                url: `/fetch_farmer_det/${form_id}`,
                success: function(response) {
                    if (response.status == 200) {
                        console.log(response.data);
                        $("#f_name").text(response.data.farmer_name);
                        $("#f_spouse").text(response.data.spouse);
                        $("#f_mobile").text(response.data.mobile);
                        $("#f_gender").text(response.data.gender);
                        $("#f_card").text(response.data.id_type);
                        $("#f_member").text(response.data.h_members);
                        $("#f_number").text(response.data.id_number);
                        $("#f_hamlet").text(response.data.hamlet);
                        $("#f_panchayat").text(response.data.panchayat);
                        $("#f_block").text(response.data.block);
                        $("#f_household_type").text(response.data.type_of_households);
                        $("#f_special_category").text(response.data.special_catog);
                        $("#f_caste").text(response.data.caste);
                        $("#f_occupation").text(response.data.hh_occupation);
                        $("#f_house_type").text(response.data.type_of_house);
                        $("#f_drinking_water").text(response.data.drinking_water);
                        $("#f_potability").text(response.data.potability);
                        $("#f_domestic_water").text(response.data.domestic_water);
                        $("#f_toilet_availability").text(response.data.toilet_avail);
                        $("#f_toilet_condition").text(response.data.toilet_cond);
                        $("#f_house_owner").text(response.data.house_owner);
                        $("#f_household_education").text(response.data.household_education);
                        $("#f_latitude").text(response.data.lat);
                        $("#f_longitude").text(response.data.lon);
                        $("#f_mcode").text(response.data.mcode);

                        $("#farmerdet_modal").modal("show");
                    }

                }

            })
        });

        $(document).on("click", "#land_detail", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            $.ajax({
                type: "GET",
                url: `/fetch_land_det/${form_id}`,
                success: function(response) {
                    if (response.status == 200) {
                        $("#l_ownership").text(response.data.ownership);
                        $("#l_well_irrigation").text(response.data.well_irrigation); // Newly added
                        $("#l_area_irrigated").text(response.data.area_irrigated); // Newly added
                        $("#l_irrigated_lands").text(response.data.irrigated_lands); // Newly added
                        $("#l_patta").text(response.data.patta);
                        $("#l_tarea").text(response.data.total_area);
                        $("#l_revenue").text(response.data.revenue);
                        $("#l_sf").text(response.data.sf_number);
                        $("#l_soil").text(response.data.soil_type);
                        $("#l_benefit").text(response.data.land_to_benefit);
                        $("#l_field").text(response.data.field_insp);
                        $("#l_site").text(response.data.site_app);
                        $("#l_doi").text(response.data.date_of_ins);
                        $("#l_doa").text(response.data.date_of_app);
                        $("#l_type").text(response.data.type_of_work);
                        $("#l_area").text(response.data.area_benefited);
                        $("#l_oth").text(response.data.any_other_works);
                        $("#l_pradan").text(response.data.p_contribution);
                        $("#l_farmer").text(response.data.f_contribution);
                        $("#l_total").text(response.data.total_est);

                        $("#landdet_modal").modal("show");

                    }
                }

            })
        });

        $(document).on("click", "#bank_detail", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            $.ajax({
                type: "GET",
                url: `/fetch_bank_det/${form_id}`,
                success: function(response) {
                    if (response.status == 200) {


                        $("#b_hname").text(response.data.account_holder_name);
                        $("#b_no").text(response.data.account_number);
                        $("#b_name").text(response.data.bank_name);
                        $("#b_branch").text(response.data.branch);
                        $("#b_ifsc").text(response.data.ifsc_code);
                        $("#bankdet_modal").modal("show");


                    }
                }

            })


        });

        $(document).on("click", "#pond_detail", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            console.log("deiiii")
            $.ajax({
                type: "GET",
                url: `/fetch_pond_det/${form_id}`,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        $("#p_owner").text(response.data.ownership);
                        $("#p_patta").text(response.data.patta);
                        $("#p_tarea").text(response.data.total_area);
                        $("#p_irrigated_lands").text(response.data.irrigated_lands); // Newly added
                        $("#p_revenue").text(response.data.revenue);
                        $("#p_livestock").text(response.data.livestocks); // Newly added
                        $("#p_crop_season").text(response.data.crop_season); // Newly added
                        $("#p_well_irrigation").text(response.data.well_irrigation); // Newly added
                        $("#p_sf").text(response.data.sf_number);
                        $("#p_soil").text(response.data.soil_type);
                        $("#p_land").text(response.data.land_serve);
                        $("#p_field").text(response.data.field_insp);
                        $("#p_site").text(response.data.site_app);
                        $("#p_type_of_work").text(response.data.type_of_work); // Newly added
                        $("#p_doi").text(response.data.date_of_ins);
                        $("#p_doa").text(response.data.date_of_app);
                        $("#p_len").text(response.data.length);
                        $("#p_dep").text(response.data.depth);
                        $("#p_breadth").text(response.data.breadth); // Newly added
                        $("#p_vol").text(response.data.volume);
                        $("#p_pcont").text(response.data.p_contribution);
                        $("#p_fcont").text(response.data.f_contribution);
                        $("#total_est").text(response.data.total_est);

                        $("#ponddet_modal").modal("show");


                    }
                }

            })


        });


        $(document).on("click", "#plant_detail", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            console.log("deiiii")
            $.ajax({
                type: "GET",
                url: `/fetch_plant_det/${form_id}`,
                success: function(response) {
                    console.log(response);
                    $("#plant_ownership").text(response.data.ownership);
                    $("#plant_well_irrigation").text(response.data.well_irrigation);
                    $("#plant_area_irrigated").text(response.data.area_irrigated);
                    $("#plant_irrigated_lands").text(response.data.irrigated_lands);
                    $("#plant_patta").text(response.data.patta);
                    $("#plant_total_area").text(response.data.total_area);
                    $("#plant_revenue").text(response.data.revenue);
                    $("#plant_crop_season").text(response.data.crop_season);
                    $("#plant_livestock").text(response.data.livestocks);
                    $("#plant_type").text(response.data.plantaions);
                    $("#plant_sf_no").text(response.data.sf_number);
                    $("#plant_soil_type").text(response.data.soil_type);
                    $("#plant_land_benefit").text(response.data.land_to_benefit);
                    $("#plant_field_inspection").text(response.data.field_insp);
                    $("#plant_site_approval").text(response.data.site_app);
                    $("#plant_date_of_inspection").text(response.data.date_of_ins);
                    $("#plant_date_of_approval").text(response.data.date_of_app);
                    $("#plant_type_of_work").text(response.data.type_of_work);
                    $("#plant_area_benefit").text(response.data.area_benefited_by_proposal
);
                    $("#plant_other_works").text(response.data.any_other_works);
                    $("#plant_pradan_contribution").text(response.data.p_contribution);
                    $("#plant_farmer_contribution").text(response.data.f_contribution);
                    $("#plant_total_amount").text(response.data.total_est);

                    $("#plantdet_modal").modal("show");
                }

            })


        });

        $(document).on("click", ".meas", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            $("#meas_id").val(form_id);
            $("#measure_modal").modal('show');


        });

        $(document).on("submit", "#measurement_form", function(e) {
            e.preventDefault();

            var form = new FormData(this); // collect all form fields including CSRF token if it's inside the form

            $.ajax({
                type: "POST",
                url: "/measure_submit",
                data: form,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success!",
                            text: "Measurement submitted and forwarded to TL",
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                }
            });
        });

        $(document).on("click", ".showrem", function(e) {
            e.preventDefault();

            var formId = $(this).val(); // get form ID from button value

            // Fetch the remarks using AJAX
            $.ajax({
                type: "GET",
                url: "/getfm-remarks/" + formId,
                success: function(response) {
                    if (response.success == 200) {
                        $('#view_remark_text').text(response.remarks); // Set the remarks
                        $('#view_rem_modal').modal('show'); // Show modal
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Remarks not found",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        title: "Error!",
                        text: "Server error",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });


        $(document).on("click", "#doc_view", function(e) {
            e.preventDefault();
            let formId = $(this).val();

            // Clear previous buttons
            $('#document-buttons').html('');

            // List of document labels
            let labels = ['Patta', 'FMB', 'Passbook', 'Identity', 'Photo'];

            labels.forEach(function(label) {
                let button = `
            <button class="btn btn-outline-primary m-2 doc-file-btn" 
                    value="${formId}">
                ${label}
            </button>`;
                $('#document-buttons').append(button);
            });

            // Open the modal
            $('#documentModal').modal('show');
        });

        $(document).on("click", ".doc-file-btn", function() {
            let form_id = $(this).val();
            let type = $(this).text().trim().toLowerCase(); // 'patta', 'identity', etc.

            $.ajax({
                url: "/get-document",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    form_id: form_id,
                    type: type
                },
                success: function(response) {
                    if (response.file_url) {
                        $('#docPreview').attr('src', response.file_url);
                        $('#docDownload').attr('href', response.file_url);
                        $('#fileViewerModal').modal('show');
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "File not found",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();

                    // Hide all other dropdowns
                    document.querySelectorAll('.edit-dropdown').forEach(d => d.style.display = 'none');

                    const id = this.value;
                    const dropdown = document.getElementById('edit-dropdown-' + id);
                    dropdown.style.display = 'block';
                });
            });

            document.addEventListener('click', function() {
                document.querySelectorAll('.edit-dropdown').forEach(d => d.style.display = 'none');
            });

            document.querySelectorAll('.detail-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const clickedId = this.id;
                });
            });
        });


        $(document).on("click", ".ed_bank", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            $.ajax({
                url: '/get-bank-details/' + form_id, // endpoint in MainController
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        let bank = response.data;
                        $('#edit_form_id').val(form_id); // hidden field to use during update

                        $('#edit_holder_name').val(bank.account_holder_name);
                        $('#edit_account_number').val(bank.account_number);
                        $('#edit_bank_name').val(bank.bank_name);
                        $('#edit_branch').val(bank.branch);
                        $('#edit_ifsc').val(bank.ifsc_code);
                        $('#edit_bankdet_modal').modal('show');
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Bank details not found",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "Error fetching bank details",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });

        $(document).on("click", ".ed_farmer", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            console.log(form_id);

            $.ajax({
                url: '/get-farmer-details/' + form_id,
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#input_f_name').val(response.farmer_name);
                    $('#input_f_spouse').val(response.spouse);
                    $('#input_f_mobile').val(response.mobile);
                    $('#input_f_gender').val(response.gender);
                    $('#input_f_card').val(response.id_type);
                    $('#input_f_member').val(response.h_members);
                    $('#input_f_number').val(response.id_number);
                    $('#input_f_hamlet').val(response.hamlet);
                    $('#input_f_panchayat').val(response.panchayat);
                    $('#input_f_block').val(response.block);
                    $('#input_f_household_type').val(response.type_of_households);
                    $('#input_f_special_category').val(response.special_catog);
                    $('#input_f_caste').val(response.caste);
                    $('#input_f_occupation').val(response.hh_occupation);
                    $('#input_f_house_type').val(response.type_of_house);
                    $('#input_f_drinking_water').val(response.drinking_water);
                    $('#input_f_potability').val(response.potability);
                    $('#input_f_domestic_water').val(response.domestic_water);
                    $('#input_f_toilet_availability').val(response.toilet_avail);
                    $('#input_f_toilet_condition').val(response.toilet_cond);
                    $('#input_f_house_owner').val(response.house_owner);
                    $('#input_f_household_education').val(response.household_education);
                    $('#input_f_latitude').val(response.lat);
                    $('#input_f_longitude').val(response.lon);
                    $('#input_f_mcode').val(response.mcode);

                    $('#edit_farmerdet_modal').modal('show');
                    $('#edit_farmerdet_modal').data('form-id', form_id); // Store ID for update
                }
            });
        });

        $(document).on("click", ".ed_pond", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            console.log(form_id);

            $.ajax({
                url: '/get-pond-details/' + form_id,
                method: 'GET',
                success: function(res) {
                    console.log(res);
                    $('#p2_pond_id').val(res.id);
                    $('#p2_owner').val(res.ownership);
                    $('#p2_patta').val(res.patta);
                    $('#p2_tarea').val(res.total_area);
                    $('#p2_irrigated_lands').val(res.irrigated_lands);
                    $('#p2_revenue').val(res.revenue);
                    $('#p2_livestock').val(res.livestocks);
                    $('#p2_crop_season').val(res.crop_season);
                    $('#p2_well_irrigation').val(res.well_irrigation);
                    $('#p2_sf').val(res.sf_number);
                    $('#p2_soil').val(res.soil_type);
                    $('#p2_land').val(res.land_serve);
                    $('#p2_field').val(res.field_insp);
                    $('#p2_site').val(res.site_app);
                    $('#p2_doi').val(res.date_of_ins);
                    $('#p2_doa').val(res.date_of_app);
                    $('#p2_len').val(res.length);
                    $('#p2_dep').val(res.depth);
                    $('#p2_breadth').val(res.breadth);
                    $('#p2_vol').val(res.volume);
                    $('#p2_pcont').val(res.p_contribution);
                    $('#p2_fcont').val(res.f_contribution);
                    $('#p2_total').val(res.total_est);

                    $('#editponddet_modal_2').modal('show');
                }
            });
        });


        $(document).on("click", ".ed_plant", function(e) {
            e.preventDefault();
            var form_id = $(this).val();
            console.log("Editing plant form ID:", form_id);

            $.ajax({
                url: "/get-plant-form", // route to your controller
                type: "GET",
                data: {
                    form_id: form_id
                },
                success: function(response) {
                    if (response.success) {
                        let d = response.data;

                        $("#pl_plant_id").val(d.id); // primary key
                        $("#pl_ownership").val(d.ownership);
                        $("#pl_well_irrigation").val(d.well_irrigation);
                        $("#pl_area_irrigated").val(d.area_irrigated);
                        $("#pl_irrigated_lands").val(d.irrigated_lands);
                        $("#pl_patta").val(d.patta);
                        $("#pl_total_area").val(d.total_area);
                        $("#pl_revenue").val(d.revenue);
                        $("#pl_crop_season").val(d.crop_season);
                        $("#pl_livestock").val(d.livestocks);
                        $("#pl_type").val(d.plantaions);
                        $("#pl_sf_no").val(d.sf_number);
                        $("#pl_soil_type").val(d.soil_type);
                        $("#pl_land_benefit").val(d.land_to_benefit);
                        $("#pl_field_inspection").val(d.field_insp);
                        $("#pl_site_approval").val(d.site_app);
                        $("#pl_date_of_inspection").val(d.date_of_ins);
                        $("#pl_date_of_approval").val(d.date_of_app);
                        $("#pl_type_of_work").val(d.type_of_work);
                        $("#pl_area_benefit").val(d.area_benefited_by_proposal);
                        $("#pl_other_works").val(d.any_other_works);
                        $("#pl_pradan_contribution").val(d.p_contribution);
                        $("#pl_farmer_contribution").val(d.f_contribution);
                        $("#pl_total_amount").val(d.total_est);

                        $("#editplantdet_modal").modal("show");
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Data not found",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function(err) {
                    Swal.fire({
                        title: "Error!",
                        text: "Error loading data",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });

        $(document).on("click", ".ed_land", function(e) {
            e.preventDefault();
            var form_id = $(this).val();

            $.ajax({
                url: "/landform/edit/" + form_id,
                type: "GET",
                success: function(res) {
                    $.each(res, function(key, value) {
                        $("#" + key).val(value);
                    });
                    $("#ed_land_id").val(form_id);
                    $("#editlanddet_modal").modal("show");
                }
            });
        });



        $('#editbankDetailForm').on('submit', function(e) {
            e.preventDefault();

            var formData = {
                form_id: $('#edit_form_id').val(),
                holder_name: $('#edit_holder_name').val(),
                account_number: $('#edit_account_number').val(),
                bank_name: $('#edit_bank_name').val(),
                branch: $('#edit_branch').val(),
                ifsc_code: $('#edit_ifsc').val(),
                _token: $('meta[name="csrf-token"]').attr('content') // if CSRF is required
            };

            $.ajax({
                url: '/update-bank-details',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                        $('#edit_bankdet_modal').modal('hide');
                        // Optionally refresh table or data
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Update failed: " + response.message,
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred during update",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });

        $('#edit_farmerdet_modal .btn-success').on('click', function() {
            var form_id = $('#edit_farmerdet_modal').data('form-id');

            $.ajax({
                url: '/update-farmer-details',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    form_id: form_id,
                    farmer_name: $('#input_f_name').val(),
                    spouse: $('#input_f_spouse').val(),
                    mobile: $('#input_f_mobile').val(),
                    gender: $('#input_f_gender').val(),
                    id_type: $('#input_f_card').val(),
                    h_members: $('#input_f_member').val(),
                    id_number: $('#input_f_number').val(),
                    hamlet: $('#input_f_hamlet').val(),
                    panchayat: $('#input_f_panchayat').val(),
                    block: $('#input_f_block').val(),
                    type_of_households: $('#input_f_household_type').val(),
                    special_catog: $('#input_f_special_category').val(),
                    caste: $('#input_f_caste').val(),
                    hh_occupation: $('#input_f_occupation').val(),
                    type_of_house: $('#input_f_house_type').val(),
                    drinking_water: $('#input_f_drinking_water').val(),
                    potability: $('#input_f_potability').val(),
                    domestic_water: $('#input_f_domestic_water').val(),
                    toilet_avail: $('#input_f_toilet_availability').val(),
                    toilet_cond: $('#input_f_toilet_condition').val(),
                    house_owner: $('#input_f_house_owner').val(),
                    household_education: $('#input_f_household_education').val(),
                    lat: $('#input_f_latitude').val(),
                    lon: $('#input_f_longitude').val(),
                    mcode: $('#input_f_mcode').val(),
                },
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                    $('#edit_farmerdet_modal').modal('hide');
                    // Optionally reload table or page
                }
            });
        });


        $(document).ready(function() {
            $('#pondEditForm2').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '/postfunding/pond/update', // Laravel route
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Show success message or reload table
                        Swal.fire({
                            title: "Success!",
                            text: "Pond details updated successfully!",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#editponddet_modal_2').modal('hide');
                                location.reload();
                            }
                        });
                        console.error(xhr.responseText);
                    },
                    error: function(xhr) {
                        // Show error
                        Swal.fire({
                            title: "Error!",
                            text: "Error updating pond details",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                        console.error(xhr.responseText);
                    }
                });
            });
        });


        $("#plantEditForm").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url: "/update-plant-form",
                method: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: "Plantation form updated successfully",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#editplantdet_modal").modal("hide");
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to update",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "Error during update",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });



        $("#editlandEditForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "/landform/update",
                type: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    Swal.fire({
                        title: "Success!",
                        text: res.success,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#editlanddet_modal").modal("hide");
                            location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "Update failed. Please try again",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });
       $(document).on('click', '.delete-btn', function () {
    let formId = $(this).data('id');
    let formType = $(this).data('type');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will permanently delete the form.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/form/delete",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: formId,
                    type: formType
                },
                success: function (res) {
                    Swal.fire({
                        title: "Deleted!",
                        text: res.success,
                        icon: "success"
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire({
                        title: "Error!",
                        text: "Delete failed. Please try again.",
                        icon: "error"
                    });
                }
            });
        }
    });
});

    </script>


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script> -->

    <!-- <script>
  $(document).ready(function() {
    $('#pondDetails').on('click', function(e) {
      e.preventDefault();

      var formId = $(this).data('form-id');

      $.ajax({
        url: '/fetch_pond_det/' + formId,
        method: 'GET',
        success: function(data) {
          // Fill modal with pond data
          $('#p_name').text(data.pond_name || '-');
          $('#p_area').text(data.area || '-');
          $('#p_type').text(data.type || '-');
          $('#p_water_source').text(data.water_source || '-');
          $('#p_depth').text(data.depth || '-');
          $('#p_date').text(data.excavation_date || '-');
          $('#p_location').text(data.location || '-');
          $('#p_latitude').text(data.latitude || '-');
          $('#p_longitude').text(data.longitude || '-');
          $('#p_notes').text(data.notes || '-');

          // Show the modal
          $('#ponddet_modal').modal('show');
        },
        error: function(err) {
          console.error(err);
          alert('Unable to fetch pond details.');
        }
      });
    });
  }); 


/*   $(document).on('click', '.editFarmerBtn', function (e) {
    e.preventDefault();
    
    let formId = $(this).data('form-id');

    // Store form ID on modal for use in update
    $('#editFarmerModal').data('form-id', formId);

    // Fetch data from backend using the updated controller
    $.ajax({
        url: '/fetch_farmer_det/' + formId, // Use the appropriate route
        type: 'GET',
        success: function (response) {
            if (response.status === 200) {
                let farmer = response.data;

                // Populate modal fields with fetched farmer details
                $('#edit_farmer_name').val(farmer.farmer_name);
                $('#edit_father_spouse').val(farmer.spouse);
                $('#edit_mobile_number').val(farmer.mobile);
                $('#edit_gender').val(farmer.gender);
                $('#edit_identity_card_type').val(farmer.id_type);
                $('#edit_household_members').val(farmer.h_members);
                $('#edit_identity_card_number').val(farmer.id_number);
                $('#edit_hamlet').val(farmer.hamlet);
                $('#edit_panchayat').val(farmer.panchayat);
                $('#edit_block').val(farmer.block);
                $('#edit_lat').val(farmer.lat);
                $('#edit_lon').val(farmer.lon);
                $('#edit_type_of_households').val(farmer.type_of_households);
                $('#edit_special_catog').val(farmer.special_catog);
                $('#edit_caste').val(farmer.caste);
                $('#edit_hh_occupation').val(farmer.hh_occupation);
                $('#edit_type_of_house').val(farmer.type_of_house);
                $('#edit_drinking_water').val(farmer.drinking_water);
                $('#edit_potability').val(farmer.potability);
                $('#edit_domestic_water').val(farmer.domestic_water);
                $('#edit_toilet_availability').val(farmer.toilet_avail);
                $('#edit_toilet_cond').val(farmer.toilet_cond);
                $('#edit_house_owner').val(farmer.house_owner);
                $('#edit_household_education').val(farmer.household_education);

                // Disable the mcode field as it's read-only
                $('#edit_mcode').val(farmer.mcode).prop('disabled', true);

                // Open modal
                $('#editFarmerModal').modal('show');
            } else {
                alert("Farmer not found.");
            }
        },
        error: function () {
            alert("Error fetching data.");
        }
    });
}); */

// When the Edit button is clicked
$(document).on("click", ".edit-btn", function() {
    var form_id = $(this).val();  // Retrieve the form_id from the data-form-id attribute
    console.log(form_id);  // Print the form_id in the console
    
    // Set the form_id into the hidden input field
    $("data-form-id").val(form_id);
    // Open the modal
    $('#detailsModal').modal('show');
});


</script>-->





</body>

</html>