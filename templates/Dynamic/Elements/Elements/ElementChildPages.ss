<div class="$ExtraClass">
        <% if $ShowTitle %><h3>$Title</h3><% end_if %>
        <% if $Content %>$Content<% end_if %>
        <% loop $CurrentPage.Children %>
            <p><a href="$Link.ATT">$Title</a></p>
        <% end_loop %>
</div>
