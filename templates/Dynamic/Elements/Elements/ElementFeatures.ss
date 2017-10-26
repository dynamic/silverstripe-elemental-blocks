<div class="element_content__content <% if $Style %>element_content__$CssStyle<% end_if %>">
	<% if $Headline %><h2 class="homeheadline">$Headline</h2><% end_if %>
	<% if $Image %><img src="$Image.SetWidth(400).URL" class="img-responsive pull-right"><% end_if %>
	$Content
    <div class="clearfix"></div>
</div>