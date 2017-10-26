<% if $PromoList %>
    <% loop $PromoList %>
        <h2>$Headline</h2>
        <% if $Image %>
            <img src="$Image.Link" />
        <% end_if %>
        <div>$Content</div>
    <% end_loop %>
<% end_if %>
