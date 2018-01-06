<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	<% if $Content %>$Content<% end_if %>
 	<% if $PromoList %>
		<div class="row">
			<% loop $PromoList %>
                <div class="col-md-4">
					<% if $Title %><div class='block_title'><h4>$Title</h4></div><% end_if %>
					<% if $Image %><img src="$Image.URL" class="img-responsive" alt="$Title.ATT"><% end_if %>
					<% if $Content %><div class='block_content'>$Content</div><% end_if %>
					<% if $ElementLink %><p>$ElementLink</p><% end_if %>
                </div>
			<% end_loop %>
		</div>
	<% end_if %>
</div>
