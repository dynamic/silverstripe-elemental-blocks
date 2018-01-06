<div class="$CSSClasses">
	<% if $EmbeddedObject %>
        <div class="panel row">
            <div class="col-sm-8">
                <div class="embed-responsive embed-responsive-16by9">
					$EmbeddedObject
                </div>
            </div>
            <div class="col-sm-4">
                <h2>$EmbeddedObject.Title</h2>
                <p>$EmbeddedObject.Description.LimitCharacters(300)</p>
            </div>
            <div class="clearfix"></div>
        </div>
	<% end_if %>
</div>