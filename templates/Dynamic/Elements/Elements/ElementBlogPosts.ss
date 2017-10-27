<div class="$ExtraClass">
	<% if $Blog.BlogPosts %>
		<% loop $Blog.BlogPosts.Limit($Limit) %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
		<p><a href="#">View all $Blog.Title Articles</a></p>
	<% end_if %>
</div>
