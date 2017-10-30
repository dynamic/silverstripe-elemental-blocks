<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	<% if $Content %>$Content<% end_if %>
	<% if $PostsList %>
		<% loop $PostsList %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
		<p><a href="$Blog.Link" class="btn btn-info">View all posts</a></p>
	<% end_if %>
</div>
