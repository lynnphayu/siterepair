<!DOCTYPE html>
<html>

<head>
    <title>Mandalay Technological University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('mtu_small.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/montserrat.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> @yield('style')
</head>

<body>

    <main id='panel'>
        @yield('content')
    </main>
    <!-- footer  -->
    <div class="footer">
        <div class="columns">
            <div class="column sub_input">
                <div>
                    <input type="" name="" placeholder="Email">
                </div>
                <div>Subscribe</div>
            </div>
            <div class="column social">
                <div>
                    <p>Connect with us:</p>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-google" aria-hidden="true"></i>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">sadf</div>
            <div class="column footer_column">
                <h5>Contact</h5>
                <ul>
                    <li>Yankin Hill,Mandalay Canal</li>
                    <li>PatheinGyi Township</li>
                    <li>Myanmar</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>09-32431412</li>
                    <li><i class="fa fa-fax" aria-hidden="true"></i>09-32431412</li>
                </ul>
            </div>

            <div class="column footer_column more_info">
                <div>
                <h5>More Info</h5>
                <ul>
                    <li><a href="">About</a></li>
                    <li><a href="">Campus life</a></li>
                    <li><a href="">Departments</a></li>
                </ul>
                </div>
                <div class="footer_logo"><div class="image"><img src="{{ asset('./mtu.png') }}"></div></div>
            </div>
            
        </div>
    </div>
    <!-- Nav bar for mobile -->
    <nav id="menu" class="menu">
        <section class="menu-section">
            <h3 class="menu-section-title">Menu</h3>
            <ul class="menu-section-list">
                <li><a href="/">About</a></li>
                <li><a href="/">Research</a></li>
                <li><a href="/">Activities</a></li>
                <li><a href="/">Acedamic Plan</a></li>
                <li><a href="/">Departments</a></li>
            </ul>
        </section>
    </nav>
    <script type="text/javascript" src="{{ asset('js/slideout.js') }}"></script>
    <script>
    var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70,
        'side': 'right'
    });

    // Toggle button
    var toggle_btn = document.getElementById('toggle-button');
    if (toggle_btn) {
        document.querySelector('.toggle-button').addEventListener('click', function () {
            slideout.toggle();
        });
    }
</script>
@yield("script")
</body>

</html>
