<div class="$ExtraClass">
    <% if $CurrentPage.Children %>
        <h4>$CurrentPage.MenuTitle</h4>
        <% loop $CurrentPage.Children %>
            <p><a href="$Link.ATT">$Title</a></p>
        <% end_loop %>
    <% end_if %>
</div>
