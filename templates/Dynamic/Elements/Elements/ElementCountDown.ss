<% require javascript('silverstripe/admin: thirdparty/jquery/jquery.js') %>
<% require javascript('dynamic/silverstripe-elemental-blocks: thirdparty/jquery.countdown-2.1.0/jquery.countdown.min.js') %>
$CountDownJS
<h3>$Title</h3>
<div id="countdown-$ID" class="countdown">
    <% if $ShowMonths %>
        <span class="months">0</span> Months
    <% end_if %>
    <span class="days">0</span> Days
    <span class="hours">0</span> Hours
    <span class="minutes">0</span> Miuntes
    <% if $ShowSeconds %>
        <span class="seconds">0</span> Seconds
    <% end_if %>
</div>
