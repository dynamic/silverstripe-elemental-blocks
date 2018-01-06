<div class="$CSSClasses grid">
	<% if $EmbeddedObject %>
        <div class="promo relative">
			<% if $EmbeddedObject.ThumbURL %>
                <img src="$EmbeddedObject.ThumbURL" class="scale-with-grid" alt="$EmbeddedObject.Title">
			<% end_if %>
            <div class="promo-text">
                <h3>$EmbeddedObject.Title</h3>
                <p>$EmbeddedObject.Description.LimitCharacters(500)</p>
                <a href="#" class="btn ghost" data-toggle="modal" data-target="#myModal">Watch Video</a>
            </div>
            <div class="clearfix"></div>
        </div>
	<% end_if %>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">$EmbeddedObject.Title</h4>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
					$EmbeddedObject
                </div>
            </div>
        </div>
    </div>
</div>