<div class="$ExtraClass">
    <% if $ShowTitle %><h3>$Title</h3><% end_if %>

    <div id="carousel-{$ID}" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
            <% loop $Videos %>
                <div class="carousel-item <% if $First %>active <% end_if %>">
                    <video controls preload="auto" width="800" height="450" data-setup='{"fluid": true}' <% if $Image %>poster="$Image.Fill(800,450).AbsoluteURL"<% end_if %>>
                        <source src="$MP4Video.Link" type="video/mp4" />
                        <% if $WebMVideo %><source src="$WebMVideo.Link" type="video/webm" /><% end_if %>
                        <% if $OggVideo %><source src="$OggVideo.Link" type="video/ogg" /><% end_if %>
                    </video>
                    <h4>$Title</h4>
                    $Content
                </div>
            <% end_loop %>
        </div>
        <a class="carousel-control-prev" href="#carousel-{$ID}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-{$ID}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">
            <% loop $Videos %>
                <li data-target="#carousel-{$ID}" data-slide-to="$Ct"<% if $First %> class="active"><% end_if %></li>
            <% end_loop %>
        </ol>
    </div>

</div>
