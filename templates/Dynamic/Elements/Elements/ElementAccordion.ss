<div class="element_content__content <% if $Style %>element_content__$CssStyle<% end_if %>">
	<% if $Headline %><h2>$Headline</h2><% end_if %>
	$HTML
	<% if $Panels %>
		<% loop $Panels %>
			<div class="panel clearfix">
                <h4>$Title</h4>
				<% if $Image %><img src="$Image.SetWidth(400).URL" class="img-responsive pull-right"><% end_if %>
				$Content
			</div>
		<% end_loop %>
	<% end_if %>
	<div class="clearfix"></div>
</div>