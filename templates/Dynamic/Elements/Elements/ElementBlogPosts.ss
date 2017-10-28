<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	<% if $Content %>$Content<% end_if %>
	<% if $Blog.BlogPosts %>
		<% loop $Blog.BlogPosts.Limit($Limit) %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
		<p><a href="#">View all $Blog.Title Posts</a></p>
	<% end_if %>
</div>
