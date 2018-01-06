<div class="$ExtraClass">
	<% if $ShowTitle %><h3>$Title</h3><% end_if %>
	<% if $EmbeddedObject %>
        <div class="panel row">
            <div class="col-sm-12">
                <div class="embed-responsive embed-responsive-16by9">
					$EmbeddedObject
                </div>
            </div>
            <div class="col-sm-12">
                <h3>$EmbeddedObject.Title</h3>
                <p>$EmbeddedObject.Description.LimitCharacters(300)</p>
            </div>
            <div class="clearfix"></div>
        </div>
	<% end_if %>
</div>