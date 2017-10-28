<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	$Content
	<% if $FeaturesList %>
		<% loop $FeaturesList %>
        	<div class="row clearfix">
				<% if $Image %>
                <div class="col-md-4">
					<img src="$Image.URL" class="img-responsive" alt="$Title.ATT">
				</div>
				<div class="col-md-8">
				<% else %>
                <div class="col-md-12">
				<% end_if %>
					<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
					<% if $Content %><div class='block_content'>$Content</div><% end_if %>
					<% if $LinkType != None %><a href="<% if $LinkType == 'External'%>$ExternalLink<% else_if $LinkType == 'Internal'%>$PageLink.Link<% end_if %>"<% if $LinkType == 'External' %> target="_blank"<% end_if %> title="$PageLink.MenuTitle.XML"><% end_if %>
					$LinkLabel
					<% if $LinkType != None %></a><% end_if %>
                </div>
        	</div>
		<% end_loop %>
	<% end_if %>
</div>
