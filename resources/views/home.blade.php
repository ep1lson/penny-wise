<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Penny-Wise &mdash; Dashboard</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <div class="dashboard-antique">
            <h1 class="dashboard-title">Penny-Wise &mdash; Dashboard</h1>
            <p>
                <a href="{{ url('/') }}">[ Logout ]</a>
                <span class="here">You are here: [ <span id="locator">Home</span> ]</span>
                <span class="cutting-edge">
                    Try out the latest
                    <a href="{{ url('/modern-home') }}" id="ce-anchor">PennyWise (Cutting Edge)</a>
                    <!--<aside class="backdrop" id="ce-backdrop">
                        <h1>The Next Major Update</h1>
                    </aside>
                    -->
                </span>
            </p>
            <hr>

            <section class="dash-tabs" id="dash-tabs-tracker" aria-label="Dashboard sections">
                <!-- State trackers -->
                <input type="radio" name="dash-tab" value="Home" id="dash-tab-overview" checked>
                <input type="radio" name="dash-tab" value="Expenses" id="dash-tab-expenses">
                <input type="radio" name="dash-tab" value="Accounts" id="dash-tab-accounts">
                <input type="radio" name="dash-tab" value="Settings" id="dash-tab-settings">

                <div class="dash-tab-labels" role="tablist">
                    <label for="dash-tab-overview" role="tab">Overview</label>
                    <label for="dash-tab-expenses" role="tab">Expenses</label>
                    <label for="dash-tab-accounts" role="tab">Accounts</label>
                    <label for="dash-tab-settings" role="tab">Settings</label>
                </div>

                <div class="dash-panels">
                    <div class="dash-panel dash-panel--overview" role="tabpanel">
                        <h3>Overview</h3>
                        <p>Welcome {{ $alias }}</p>
                        <table cellpadding="4" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Budget sync</td>
                                    <td>Idle</td>
                                </tr>
                                <tr>
                                    <td>Alerts</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="dash-panel dash-panel--expenses" role="tabpanel">
                        <h3>Expense Managements</h3>
                        <form id="add-expense-form">
                            <fieldset>
                                <legend>Add an expense</legend>

                                <label for="title">Title: </label>
                                <input id="title" name="title" type="text" required><br>

                                <label>Type: </label><br>
                                <input type="radio" name="type" id="recurring" value="recurring" checked required> <label for="recurring">Recurring</label><br>
                                <input type="radio" name="type" id="one-time" value="one-time"> <label for="one-time">One Time</label><br>

                                <div class="for-recurring">
                                    <label for="period">Period: </label>
                                    <select name="period" id="period" required>
                                        <option value="month">Daily</option>
                                        <option value="month">Monthly</option>
                                        <option value="month">Quarterly</option>
                                        <option value="month">Annually</option>
                                    </select><br>
                                </div>
                                <div class="for-onetime">
                                    
                                </div>
                                <label for="amount" required>Amount: </label>
                                <input id="amount" name="amount" type="number" min="0" required><br>
                                <label for="labels">Labels: </label>
                                <button id="open-label-browser" type="button">Expand</button>
                                <section id="label-browser" class="label-browser" hidden>
                                    <div class="expense-label">
                                        Type A
                                    </div>
                                    <div class="expense-label">
                                        Type B
                                    </div>
                                    <div class="expense-label">
                                        Type C
                                    </div>
                                    <div class="expense-label">
                                        Type D
                                    </div>
                                </section>

                                <p id="notifier" hidden></p>

                                <button type="submit" style="display: block;">Save</button>
                            </fieldset>
                        </form>
                    </div>

                    <div class="dash-panel dash-panel--accounts" role="tabpanel">
                        <h3>Accounts</h3>
                        <p>List your checking, savings, and cash envelopes here (static demo).</p>
                        <ul>
                            <li>Primary checking &mdash; (not linked)</li>
                            <li>Savings &mdash; (not linked)</li>
                        </ul>
                    </div>

                    <div class="dash-panel dash-panel--settings" role="tabpanel">
                        <h3>Settings</h3>
                        <p>Customize <i>Penny-Wise</i> to your needs:</p>
                        <form action="#" method="get" onsubmit="return false;">
                            <p>
                                <label>
                                    <input type="checkbox" name="digest" value="1">
                                    Send Weekly Digest
                                </label><br>

                                <label>
                                    <input type="checkbox" name="digest" value="1">
                                    Enable SmartAnalysis
                                </label><br>

                                <label>
                                    <input type="checkbox" name="digest" value="1" disabled>
                                    Graphs and Trends
                                </label><br>

                                <label>
                                    <input type="checkbox" name="digest" value="1" disabled>
                                    Enable Inferred Labels (Experimental)
                                </label>
                            </p>
                            <p>
                                <label for="currency">Currency display:</label><br>
                                <select id="currency" name="currency">
                                    <option>USD ($)</option>
                                    <option>EUR (&euro;)</option>
                                </select>
                            </p>
                            <p>
                                <button type="button">Save</button>
                                <button type="button">Export Settings</button>
                            </p>
                        </form>
                    </div>
                </div>
            </section>

            <hr>
            <address class="footer-old">
                <p>
                    Something not working? Contact the
                    <a href="mailto:webmaster@example.com">webmaster</a>
                </p>
            </address>
        </div>
        @vite(['resources/js/locatorSwitch.js'])
        @vite(['resources/js/home.js'])
    </body>
</html>
