<div class="$CSSClasses">
	<% if $PromoList %>
		<div class="row">
			<% loop $PromoList %>
                <div class="col-md-4">
					<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
					<% if $Image %><img src="$Image.URL" class="img-responsive" alt="$Title.ATT"><% end_if %>
					<% if $Content %><div class='block_content'>$Content</div><% end_if %>
					<% if $LinkType != None %><a href="<% if $LinkType == 'External'%>$ExternalLink<% else_if $LinkType == 'Internal'%>$PageLink.Link<% end_if %>"<% if $LinkType == 'External' %> target="_blank"<% end_if %> title="$PageLink.MenuTitle.XML"><% end_if %>
					$LinkLabel
					<% if $LinkType != None %></a><% end_if %>
                </div>
			<% end_loop %>
		</div>
	<% end_if %>
</div>
