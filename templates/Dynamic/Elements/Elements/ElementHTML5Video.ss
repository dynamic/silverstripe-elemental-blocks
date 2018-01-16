<div class="$ExtraClass">
    <% if $ShowTitle %><h3>$Title</h3><% end_if %>
    <article>
        <% loop $Videos %>
            <h4>$Title</h4>
            <% if $MP4Video %>
                <div class="video-container">
                    <video controls preload="auto" width="800" height="450" data-setup='{"fluid": true}' <% if $Image %>poster="$Image.Fill(800,450).AbsoluteURL"<% end_if %>>
                        <source src="$MP4Video.Link" type="video/mp4" />
                        <% if $WebMVideo %><source src="$WebMVideo.Link" type="video/webm" /><% end_if %>
                        <% if $OggVideo %><source src="$OggVideo.Link" type="video/ogg" /><% end_if %>
                    </video>
                </div>
            <% end_if %>
            $Content
            <%-- Related Videos --%>
            <% if $RelatedVideos %>
                <hr>
                <h3>Other Videos</h3>
                <% loop $RelatedVideos.Limit(3).Sort('RAND()') %>
                    <div class="video unit size1of3">
                        <a href="$Link">
                            <% if $Image %>$Image.CroppedImage(400,225)<% else %><img src="/html5video/images/PreviewUnavailable.jpg"><% end_if %>
                        </a>
                        <h4><a href="$Link">$Title</a><% if $Time %> - $Time<% end_if %></h4>
                    </div>
                <% end_loop %>
            <% end_if %>
        </article>
    <% end_loop %>
</div>
