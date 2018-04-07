<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#e3e3e3">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @if (env('APP_ENV') != 'production') ({{env('APP_ENV')}})@endif</title>

    <!-- Styles -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flex.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                        @if (env('APP_ENV') != 'production')
                            (Development)
                        @endif
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="js/app.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer="false"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" defer="false"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sortable').DataTable();
        });
    </script>
        <script type="text/javascript" src="http://selectize.github.io/selectize.js/js/selectize.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/selectize.css">
    <script>
                // <select id="select-to"></select>
                var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
                                  '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';
                var formatName = function(item) {
                    return $.trim((item.first_name || '') + ' ' + (item.last_name || ''));
                };
                $('#taggable').selectize({
                    persist: false,
                    maxItems: null,
                    valueField: 'email',
                    labelField: 'name',
                    searchField: ['tag_name', 'email'],
                    sortField: [
                        {field: 'tag_name', direction: 'asc'}
                    ],
                    options: [
                        {email: 'nikola@tesla.com', tag_name: 'ProposesSolution'},
                        {email: 'brian@thirdroute.com', tag_name: 'IdentifiesProblem'},
                        {email: 'someone@gmail.com', tag_name: 'NHSTFlaw'}
                    ],
                    render: {
                        item: function(item, escape) {
                            var name = item.tag_name;
                            return '<div>' +
                                (name ? '<span class="name">' + escape(name) + '</span>' : ' ') +
                            '</div>';
                        },
                        option: function(item, escape) {
                            var name = item.tag_name;
                            var label = name;
                            var caption = name;
                            return '<div>' +
                                (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                            '</div>';
                        }
                    },
                    createFilter: function(input) {
                        var regexpA = new RegExp('^' + REGEX_EMAIL + '$', 'i');
                        var regexpB = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
                        return regexpA.test(input) || regexpB.test(input);
                    },
                    create: function(input) {
                        if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                            return {email: input};
                        }
                        var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
                        if (match) {
                            var name       = $.trim(match[1]);
                            var pos_space  = name.indexOf(' ');
                            var first_name = name.substring(0, pos_space);
                            var last_name  = name.substring(pos_space + 1);
                            return {
                                email: match[2],
                                first_name: first_name,
                                last_name: last_name
                            };
                        }
                        alert('Invalid email address.');
                        return false;
                    }
                });
                </script>
</body>
</html>
