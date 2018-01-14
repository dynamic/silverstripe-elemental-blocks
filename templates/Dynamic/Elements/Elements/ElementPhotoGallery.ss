<div class="clearfix<% if $ExtraClass  %> $ExtraClass<% end_if %>">
    <div class="home-news-events">
        <div class="overlay"></div>
        <% if $ShowTitle %>$Title<% end_if %>
        <% if $Content %>$Content<% end_if %>
        <% if $Images %>
            <% loop $Images.Limit(1) %>
                <% with $Image %>
                    <img class="lazy scale-with-grid" src="$Fill(555,555).URL" alt="<% if $Headline %>$Headline<% else %>$Name<% end_if %> Thumbnail">
                <% end_with %>
            <% end_loop %>
        <% else %>
            <img src="https://placem.at/things?w=555&h=484&random=1" class="scale-with-grid">
        <% end_if %>
        <div class="text-overlay">
            <div class="inner">
                <h3 class="NewsHeader">$Title</h3>
                <p>$Content</p>
                <% if $Images %>
                    <% with $Images.First %>
                        <a href="$Image.URL" class="btn ghost" data-lightbox="$Up.Up.Title" data-title="<h4>$Title</h4> $Content">Explore</a>
                    <% end_with %>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
<% require css('dynamic/silverstripe-elemental-blocks: thirdparty/lightbox/lightbox.css') %>
<% require javascript('silverstripe/admin: thirdparty/jquery/jquery.js') %>
<% require javascript('dynamic/silverstripe-elemental-blocks: thirdparty/lightbox/lightbox.min.js') %>
