<html lang = "en">
<head>
    <!-- Required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel = "stylesheet" href = "https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin = "anonymous">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.1/css/perfect-scrollbar.css" integrity = "sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" crossorigin = "anonymous" referrerpolicy = "no-referrer"/>
    <link href = "https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel = "stylesheet">
    <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity = "sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin = "anonymous">
    <link href = "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel = "stylesheet"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity = "sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin = "anonymous" referrerpolicy = "no-referrer"/>
    <link href = "https://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel = "stylesheet"/>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <title>SMS-@yield('pageTitle')</title>
    <style>
        .ui-datepicker-calendar,.ui-datepicker-month {
            display: none;
        }
        .text-white .text-muted {
            color: rgb(255 255 255)!important;
        }
        @media (min-width: 992px) {
            .modal-lg, .modal-xl {
                max-width: 80%;
            !important;
            }
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 80%;
            !important;
                margin: 1.75rem auto;
            }
        }
        @media print {
            /* styling goes here */
            .noPrint {
                display: none;
            }
        }
    </style>
</head>
<body class = "c-app">
@include('partials.sidebar')
<div class = "c-sidebar c-sidebar-lg c-sidebar-light c-sidebar-right c-sidebar-overlaid" id = "aside">
    <button class = "c-sidebar-close c-class-toggler" type = "button" data-target = "_parent" data-class = "c-sidebar-show" responsive = "true">
        <svg class = "c-icon">
            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-x"></use>
        </svg>
    </button>
    <ul class = "nav nav-tabs nav-underline nav-underline-primary" role = "tablist">
        <li class = "nav-item"><a class = "nav-link active" data-toggle = "tab" href = "#timeline" role = "tab">
                <svg class = "c-icon">
                    <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>
            </a></li>
        <li class = "nav-item"><a class = "nav-link" data-toggle = "tab" href = "#messages" role = "tab">
                <svg class = "c-icon">
                    <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-speech"></use>
                </svg>
            </a></li>
        <li class = "nav-item"><a class = "nav-link" data-toggle = "tab" href = "#settings" role = "tab">
                <svg class = "c-icon">
                    <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
            </a></li>
    </ul>

    <div class = "tab-content">
        <div class = "tab-pane active" id = "timeline" role = "tabpanel">
            <div class = "list-group list-group-accent">
                <div class = "list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase c-small">Today</div>
                <div class = "list-group-item list-group-item-accent-warning list-group-item-divider">
                    <div class = "c-avatar float-right">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"></div>
                    <div>Meeting with <strong>Lucas</strong></div>
                    <small class = "text-muted mr-3">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg>&nbsp; 1 - 3pm</small><small class = "text-muted">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-location-pin"></use>
                        </svg>&nbsp; Palo Alto, CA</small>
                </div>
                <div class = "list-group-item list-group-item-accent-info">
                    <div class = "c-avatar float-right">
                        <img class = "c-avatar-img" src = "assets/img/avatars/4.jpg" alt = "user@email.com"></div>
                    <div>Skype with <strong>Megan</strong></div>
                    <small class = "text-muted mr-3">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg>&nbsp; 4 - 5pm</small><small class = "text-muted">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/brand.svg#cib-skype"></use>
                        </svg>&nbsp; On-line</small>
                </div>
                <div class = "list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase c-small">Tomorrow</div>
                <div class = "list-group-item list-group-item-accent-danger list-group-item-divider">
                    <div>New UI Project - <strong>deadline</strong></div>
                    <small class = "text-muted mr-3">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg>&nbsp; 10 - 11pm</small><small class = "text-muted">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                        </svg>&nbsp; creativeLabs HQ</small>
                    <div class = "c-avatars-stack mt-2">
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/2.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/3.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/4.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/5.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/6.jpg" alt = "user@email.com"></div>
                    </div>
                </div>
                <div class = "list-group-item list-group-item-accent-success list-group-item-divider">
                    <div><strong>#10 Startups.Garden</strong> Meetup</div>
                    <small class = "text-muted mr-3">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg>&nbsp; 1 - 3pm</small><small class = "text-muted">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-location-pin"></use>
                        </svg>&nbsp; Palo Alto, CA</small>
                </div>
                <div class = "list-group-item list-group-item-accent-primary list-group-item-divider">
                    <div><strong>Team meeting</strong></div>
                    <small class = "text-muted mr-3">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg>&nbsp; 4 - 6pm</small><small class = "text-muted">
                        <svg class = "c-icon">
                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                        </svg>&nbsp; creativeLabs HQ</small>
                    <div class = "c-avatars-stack mt-2">
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/2.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/3.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/4.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/5.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/6.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"></div>
                        <div class = "c-avatar c-avatar-xs">
                            <img class = "c-avatar-img" src = "assets/img/avatars/8.jpg" alt = "user@email.com"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "tab-pane p-3" id = "messages" role = "tabpanel">
            <div class = "message">
                <div class = "py-3 pb-5 mr-3 float-left">
                    <div class = "c-avatar">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>
                    </div>
                </div>
                <div>
                    <small class = "text-muted">Lukasz Holeczek</small><small class = "text-muted float-right mt-1">1:52 PM</small>
                </div>
                <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class = "message">
                <div class = "py-3 pb-5 mr-3 float-left">
                    <div class = "c-avatar">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>
                    </div>
                </div>
                <div>
                    <small class = "text-muted">Lukasz Holeczek</small><small class = "text-muted float-right mt-1">1:52 PM</small>
                </div>
                <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class = "message">
                <div class = "py-3 pb-5 mr-3 float-left">
                    <div class = "c-avatar">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>
                    </div>
                </div>
                <div>
                    <small class = "text-muted">Lukasz Holeczek</small><small class = "text-muted float-right mt-1">1:52 PM</small>
                </div>
                <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class = "message">
                <div class = "py-3 pb-5 mr-3 float-left">
                    <div class = "c-avatar">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>
                    </div>
                </div>
                <div>
                    <small class = "text-muted">Lukasz Holeczek</small><small class = "text-muted float-right mt-1">1:52 PM</small>
                </div>
                <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class = "message">
                <div class = "py-3 pb-5 mr-3 float-left">
                    <div class = "c-avatar">
                        <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>
                    </div>
                </div>
                <div>
                    <small class = "text-muted">Lukasz Holeczek</small><small class = "text-muted float-right mt-1">1:52 PM</small>
                </div>
                <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
        </div>
        <div class = "tab-pane p-3" id = "settings" role = "tabpanel">
            <h6>Settings</h6>
            <div class = "c-aside-options">
                <div class = "clearfix mt-4"><small><b>Option 1</b></small>
                    <label class = "c-switch c-switch-label c-switch-pill c-switch-success c-switch-sm float-right">
                        <input class = "c-switch-input" type = "checkbox" checked = ""><span class = "c-switch-slider" data-checked = "On" data-unchecked = "Off"></span>
                    </label>
                </div>
                <div>
                    <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                </div>
            </div>
            <div class = "c-aside-options">
                <div class = "clearfix mt-3"><small><b>Option 2</b></small>
                    <label class = "c-switch c-switch-label c-switch-pill c-switch-success c-switch-sm float-right">
                        <input class = "c-switch-input" type = "checkbox"><span class = "c-switch-slider" data-checked = "On" data-unchecked = "Off"></span>
                    </label>
                </div>
                <div>
                    <small class = "text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                </div>
            </div>
            <div class = "c-aside-options">
                <div class = "clearfix mt-3"><small><b>Option 3</b></small>
                    <label class = "c-switch c-switch-label c-switch-pill c-switch-success c-switch-sm float-right">
                        <input class = "c-switch-input" type = "checkbox"><span class = "c-switch-slider" data-checked = "On" data-unchecked = "Off"></span>
                    </label>
                </div>
            </div>
            <div class = "c-aside-options">
                <div class = "clearfix mt-3"><small><b>Option 4</b></small>
                    <label class = "c-switch c-switch-label c-switch-pill c-switch-success c-switch-sm float-right">
                        <input class = "c-switch-input" type = "checkbox" checked = ""><span class = "c-switch-slider" data-checked = "On" data-unchecked = "Off"></span>
                    </label>
                </div>
            </div>
            <hr>
            <h6>System Utilization</h6>
            <div class = "text-uppercase mb-1 mt-4"><small><b>CPU Usage</b></small></div>
            <div class = "progress progress-xs">
                <div class = "progress-bar bg-info" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
            </div>
            <small class = "text-muted">348 Processes. 1/4 Cores.</small>
            <div class = "text-uppercase mb-1 mt-2"><small><b>Memory Usage</b></small></div>
            <div class = "progress progress-xs">
                <div class = "progress-bar bg-warning" role = "progressbar" style = "width: 70%" aria-valuenow = "70" aria-valuemin = "0" aria-valuemax = "100"></div>
            </div>
            <small class = "text-muted">11444GB/16384MB</small>
            <div class = "text-uppercase mb-1 mt-2"><small><b>SSD 1 Usage</b></small></div>
            <div class = "progress progress-xs">
                <div class = "progress-bar bg-danger" role = "progressbar" style = "width: 95%" aria-valuenow = "95" aria-valuemin = "0" aria-valuemax = "100"></div>
            </div>
            <small class = "text-muted">243GB/256GB</small>
            <div class = "text-uppercase mb-1 mt-2"><small><b>SSD 2 Usage</b></small></div>
            <div class = "progress progress-xs">
                <div class = "progress-bar bg-success" role = "progressbar" style = "width: 10%" aria-valuenow = "10" aria-valuemin = "0" aria-valuemax = "100"></div>
            </div>
            <small class = "text-muted">25GB/256GB</small>
        </div>
    </div>
</div>
<div class = "c-wrapper">
    <header class = "c-header c-header-light c-header-fixed noPrint">
        <button class = "c-header-toggler c-class-toggler d-lg-none mfe-auto" type = "button" data-target = "#sidebar" data-class = "c-sidebar-show">
            <svg class = "c-icon c-icon-lg">
                <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>
        <a class = "c-header-brand d-lg-none c-header-brand-sm-up-center" href = "#">
            <svg width = "118" height = "46" alt = "CoreUI Logo">
                <use xlink:href = "assets/brand/coreui-pro.svg#full"></use>
            </svg>
        </a>
        <button class = "c-header-toggler c-class-toggler mfs-3 d-md-down-none" type = "button" data-target = "#sidebar" data-class = "c-sidebar-lg-show" responsive = "true">
            <svg class = "c-icon c-icon-lg">
                <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
            </svg>
        </button>

        <ul class = "c-header-nav mfs-auto">
            <li class = "c-header-nav-item px-3 c-d-legacy-none">
                <?= 'Welcome ' . auth()->user()->name   ?>
            </li>
        </ul>
        {{--        <ul class = "c-header-nav">--}}
        {{--            <li class = "c-header-nav-item dropdown d-md-down-none mx-2">--}}
        {{--                <a class = "c-header-nav-link" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">--}}
        {{--                    <svg class = "c-icon">--}}
        {{--                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-bell"></use>--}}
        {{--                    </svg>--}}
        {{--                    <span class = "badge badge-pill badge-danger">5</span></a>--}}
        {{--                <div class = "dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">--}}
        {{--                    <div class = "dropdown-header bg-light"><strong>You have 5 notifications</strong></div>--}}
        {{--                    <a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2 text-success">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>--}}
        {{--                        </svg>--}}
        {{--                        New user registered</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2 text-danger">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-user-unfollow"></use>--}}
        {{--                        </svg>--}}
        {{--                        User deleted</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2 text-info">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-chart"></use>--}}
        {{--                        </svg>--}}
        {{--                        Sales report is ready</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2 text-success">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-basket"></use>--}}
        {{--                        </svg>--}}
        {{--                        New client</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2 text-warning">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>--}}
        {{--                        </svg>--}}
        {{--                        Server overloaded</a>--}}
        {{--                    <div class = "dropdown-header bg-light"><strong>Server</strong></div>--}}
        {{--                    <a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "text-uppercase mb-1"><small><b>CPU Usage</b></small></div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-info" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span><small class = "text-muted">348 Processes. 1/4 Cores.</small>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "text-uppercase mb-1"><small><b>Memory Usage</b></small></div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{-- <div class = "progress-bar bg-warning" role = "progressbar" style = "width: 70%" aria-valuenow = "70" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span><small class = "text-muted">11444GB/16384MB</small>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-danger" role = "progressbar" style = "width: 95%" aria-valuenow = "95" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span><small class = "text-muted">243GB/256GB</small>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        {{--            <li class = "c-header-nav-item dropdown d-md-down-none mx-2">--}}
        {{--                <a class = "c-header-nav-link" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">--}}
        {{--                    <svg class = "c-icon">--}}
        {{--                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>--}}
        {{--                    </svg>--}}
        {{--                    <span class = "badge badge-pill badge-warning">15</span></a>--}}
        {{--                <div class = "dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">--}}
        {{--                    <div class = "dropdown-header bg-light"><strong>You have 5 pending tasks</strong></div>--}}
        {{--                    <a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "small mb-1">Upgrade NPM &amp; Bower<span class = "float-right"><strong>0%</strong></span>--}}
        {{--                        </div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-info" role = "progressbar" style = "width: 0%" aria-valuenow = "0" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "small mb-1">ReactJS Version<span class = "float-right"><strong>25%</strong></span>--}}
        {{--                        </div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-danger" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "small mb-1">VueJS Version<span class = "float-right"><strong>50%</strong></span>--}}
        {{--                        </div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-warning" role = "progressbar" style = "width: 50%" aria-valuenow = "50" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "small mb-1">Add new layouts<span class = "float-right"><strong>75%</strong></span>--}}
        {{--                        </div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-info" role = "progressbar" style = "width: 75%" aria-valuenow = "75" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span>--}}
        {{--                    </a><a class = "dropdown-item d-block" href = "#">--}}
        {{--                        <div class = "small mb-1">Angular 8 Version<span class = "float-right"><strong>100%</strong></span>--}}
        {{--                        </div>--}}
        {{--                        <span class = "progress progress-xs">--}}
        {{--<div class = "progress-bar bg-success" role = "progressbar" style = "width: 100%" aria-valuenow = "100" aria-valuemin = "0" aria-valuemax = "100"></div>--}}
        {{--</span>--}}
        {{--                    </a><a class = "dropdown-item text-center border-top" href = "#"><strong>View all tasks</strong></a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        {{--            <li class = "c-header-nav-item dropdown d-md-down-none mx-2">--}}
        {{--                <a class = "c-header-nav-link" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">--}}
        {{--                    <svg class = "c-icon">--}}
        {{--                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>--}}
        {{--                    </svg>--}}
        {{--                    <span class = "badge badge-pill badge-info">7</span></a>--}}
        {{--                <div class = "dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">--}}
        {{--                    <div class = "dropdown-header bg-light"><strong>You have 4 messages</strong></div>--}}
        {{--                    <a class = "dropdown-item" href = "#">--}}
        {{--                        <div class = "message">--}}
        {{--                            <div class = "py-3 mfe-3 float-left">--}}
        {{--                                <div class = "c-avatar">--}}
        {{--                                    <img class = "c-avatar-img" src = "assets/img/avatars/7.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-success"></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div>--}}
        {{--                                <small class = "text-muted">John Doe</small><small class = "text-muted float-right mt-1">Just now</small>--}}
        {{--                            </div>--}}
        {{--                            <div class = "text-truncate font-weight-bold">--}}
        {{--                                <span class = "text-danger">!</span> Important message--}}
        {{--                            </div>--}}
        {{--                            <div class = "small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>--}}
        {{--                        </div>--}}
        {{--                    </a><a class = "dropdown-item" href = "#">--}}
        {{--                        <div class = "message">--}}
        {{--                            <div class = "py-3 mfe-3 float-left">--}}
        {{--                                <div class = "c-avatar">--}}
        {{--                                    <img class = "c-avatar-img" src = "assets/img/avatars/6.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-warning"></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div>--}}
        {{--                                <small class = "text-muted">John Doe</small><small class = "text-muted float-right mt-1">5 minutes ago</small>--}}
        {{--                            </div>--}}
        {{--                            <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>--}}
        {{--                            <div class = "small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>--}}
        {{--                        </div>--}}
        {{--                    </a><a class = "dropdown-item" href = "#">--}}
        {{--                        <div class = "message">--}}
        {{--                            <div class = "py-3 mfe-3 float-left">--}}
        {{--                                <div class = "c-avatar">--}}
        {{--                                    <img class = "c-avatar-img" src = "assets/img/avatars/5.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-danger"></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div>--}}
        {{--                                <small class = "text-muted">John Doe</small><small class = "text-muted float-right mt-1">1:52 PM</small>--}}
        {{--                            </div>--}}
        {{--                            <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>--}}
        {{--                            <div class = "small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>--}}
        {{--                        </div>--}}
        {{--                    </a><a class = "dropdown-item" href = "#">--}}
        {{--                        <div class = "message">--}}
        {{--                            <div class = "py-3 mfe-3 float-left">--}}
        {{--                                <div class = "c-avatar">--}}
        {{--                                    <img class = "c-avatar-img" src = "assets/img/avatars/4.jpg" alt = "user@email.com"><span class = "c-avatar-status bg-info"></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div>--}}
        {{--                                <small class = "text-muted">John Doe</small><small class = "text-muted float-right mt-1">4:03 PM</small>--}}
        {{--                            </div>--}}
        {{--                            <div class = "text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>--}}
        {{--                            <div class = "small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>--}}
        {{--                        </div>--}}
        {{--                    </a><a class = "dropdown-item text-center border-top" href = "#"><strong>View all messages</strong></a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        {{--            <li class = "c-header-nav-item dropdown">--}}
        {{--                <a class = "c-header-nav-link" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">--}}
        {{--                    <div class = "c-avatar">--}}
        {{--                        <img class = "c-avatar-img" src = "assets/img/avatars/6.jpg" alt = "user@email.com"></div>--}}
        {{--                </a>--}}
        {{--                <div class = "dropdown-menu dropdown-menu-right pt-0">--}}
        {{--                    <div class = "dropdown-header bg-light py-2"><strong>Account</strong></div>--}}
        {{--                    <a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-bell"></use>--}}
        {{--                        </svg>--}}
        {{--                        Updates<span class = "badge badge-info mfs-auto">42</span></a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>--}}
        {{--                        </svg>--}}
        {{--                        Messages<span class = "badge badge-success mfs-auto">42</span></a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-task"></use>--}}
        {{--                        </svg>--}}
        {{--                        Tasks<span class = "badge badge-danger mfs-auto">42</span></a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>--}}
        {{--                        </svg>--}}
        {{--                        Comments<span class = "badge badge-warning mfs-auto">42</span></a>--}}
        {{--                    <div class = "dropdown-header bg-light py-2"><strong>Settings</strong></div>--}}
        {{--                    <a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-user"></use>--}}
        {{--                        </svg>--}}
        {{--                        Profile</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
        {{--                        </svg>--}}
        {{--                        Settings</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>--}}
        {{--                        </svg>--}}
        {{--                        Payments<span class = "badge badge-secondary mfs-auto">42</span></a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-file"></use>--}}
        {{--                        </svg>--}}
        {{--                        Projects<span class = "badge badge-primary mfs-auto">42</span></a>--}}
        {{--                    <div class = "dropdown-divider"></div>--}}
        {{--                    <a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>--}}
        {{--                        </svg>--}}
        {{--                        Lock Account</a><a class = "dropdown-item" href = "#">--}}
        {{--                        <svg class = "c-icon mfe-2">--}}
        {{--                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>--}}
        {{--                        </svg>--}}
        {{--                        Logout</a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        {{--            <button class = "c-header-toggler c-class-toggler mfe-md-3" type = "button" data-target = "#aside" data-class = "c-sidebar-show">--}}
        {{--                <svg class = "c-icon c-icon-lg">--}}
        {{--                    <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>--}}
        {{--                </svg>--}}
        {{--            </button>--}}
        {{--        </ul>--}}

    </header>
    <div class = "c-body">
        <main class = "c-main">
            @yield('content')
        </main>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- Popper.js first, then CoreUI JS -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
    src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity = "sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin = "anonymous"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.1/perfect-scrollbar.min.js" integrity = "sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin = "anonymous" referrerpolicy = "no-referrer"></script>
<script src = "https://unpkg.com/@popperjs/core@2"></script>
<script src = "https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src = "https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src = "https:////cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src = "https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src = "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js" integrity="sha512-jzL0FvPiDtXef2o2XZJWgaEpVAihqquZT/tT89qCVaxVuHwJ/1DFcJ+8TBMXplSJXE8gLbVAUv+Lj20qHpGx+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src = "vendors/@coreui/chartjs/js/chartjs-bundel.js"></script>
<script src = "{{asset('js/utils.js')}}"></script>
<script src = "{{asset('js/widgets.js')}}"></script>
<script src = "{{asset('js/custom.js')}}"></script>

</body>
</html>
{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}
