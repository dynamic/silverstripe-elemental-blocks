<div class="element_content__content <% if $Style %>element_content__$ExtraClass<% end_if %>">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
    <% if $Content %>$Content<% end_if %>
	<% if $Panels %>
		<% loop $Panels %>
			<div class="panel clearfix">
				<% if $Image %>
                    <div class="col-md-4">
                        <img src="$Image.URL" class="img-responsive" alt="$Title.ATT">
                    </div>
                <div class="col-md-8">
				<% else %>
                <div class="col-md-12">
				<% end_if %>
                	<h4>$Title</h4>
					$Content
				</div>
			</div>
		<% end_loop %>
	<% end_if %>
	<div class="clearfix"></div>
</div>
