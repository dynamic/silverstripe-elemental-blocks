<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	$Content
	<% if $FeaturesList %>
		<% loop $FeaturesList %>
        	<div class="row form-group">
				<% if $Image %>
                <div class="col-md-4<% if $Up.Alternate && $Even %> col-md-push-8<% end_if %>">
					<img src="$Image.URL" class="img-responsive" alt="$Title.ATT">
				</div>
				<div class="col-md-8<% if $Up.Alternate && $Even %> col-md-pull-4<% end_if %>">
				<% else %>
                <div class="col-md-12">
				<% end_if %>
					<% if $Title %><div class='block_title'><h4>$Title</h4></div><% end_if %>
					<% if $Content %><div class='block_content'>$Content</div><% end_if %>
					<p>link = <% if $PageLink %>$PageLink<% end_if %></p>
                </div>
        	</div>
		<% end_loop %>
	<% end_if %>
</div>
