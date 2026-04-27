<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Penny-Wise &mdash; Member Access</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="page-antique">
        <h1 class="site-header">
            Penny-Wise Budgeting Management Panel<br>
            <span>Build your savings, penny by penny<span>
        </h1>

        <p class="nav-old">
            Navigation &nbsp;|&nbsp;
            <a href="{{ url('/home') }}" @guest class="unavailable" @endguest>[ Dashboard ]</a>
            <span class="here">You are here: [ Login ]</span>
        </p>

        <hr>

        <table class="login-table" cellpadding="6" cellspacing="0" width="100%">
            <tr>
                <td valign="top" width="33%">
                    <h2>Login</h2>
                    <form id="login-form">
                        <p>
                            <label for="login-email">E-mail:</label><br>
                            <input type="email" id="login-email" name="email" size="28">
                        </p>
                        <p>
                            <label for="login-password">Password:</label><br>
                            <input type="password" id="login-password" name="password" size="28">
                        </p>
                        <p id="notifier-login" hidden></p>
                        <p><button type="submit">Submit</button></p>
                    </form>
                </td>
                <td valign="top" width="34%">
                    <h2>Change Log</h2>
                    <p><strong>Version a0.1</strong> // Updates</p>
                    <ul>
                        <li>Initial release.</li>
                    </ul>
                </td>
                <td valign="top" width="33%">
                    <h2>Create an account</h2>
                    <form id="signup-form">
                        <p>
                            <label for="signup-email">E-mail:</label><br>
                            <input type="email" id="signup-email" name="email" size="28">
                        </p>
                        <p>
                            <label for="signup-alias">Alias:</label><br>
                            <input type="text" id="signup-alias" name="alias" size="28">
                        </p>
                        <p>
                            <label for="signup-password">Password:</label><br>
                            <input type="password" id="signup-password" name="password" size="28">
                        </p>
                        <p>
                            <label for="confirm-password">Confirm password:</label><br>
                            <input id="confirm-password" type="password" size="28">
                        </p>
                        <p id="notifier-signup" hidden></p>
                        <p><button type="submit">Create</button></p>
                    </form>
                </td>
            </tr>
        </table>

        <hr>

        <address class="footer-old">
            Questions? Mail the <a href="mailto:webmaster@localhost">webmaster</a>.
            <br>
            Last updated: {{ date('Y-m-d') }}
        </address>

        @vite(['resources/js/app.js'])
        @vite(['resources/js/processUnavail.js'])
    </body>
</html>
