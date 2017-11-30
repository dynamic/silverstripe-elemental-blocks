<div class="element_content__content <% if $Style %>element_content__$ExtraClass<% end_if %>">
    <% if $ShowTitle %><h3>$Title</h3><% end_if %>
    <% if $Content %>$Content<% end_if %>
    <% if $Panels %>
        <div id="accordion$Title" role="tablist">
            <% loop $Panels %>
                <div class="card">
                    <div class="card-header" role="tab" id="heading$ID">
                        <h5 class="mb-0">
                            <a <% if not $First %>class="collapsed"<% end_if %>
                               data-toggle="collapse"
                               href="#collapse$ID" data-target="#collapse$ID"
                               aria-expanded="true" aria-controls="collapse$ID">
                                $Title
                            </a>
                        </h5>
                    </div>

                    <div id="collapse$ID" class="collapse<% if $First %> show<% end_if %>"
                         role="tabpanel" aria-labelledby="heading$ID"
                         data-parent="#accordion$Up.Title">
                        <div class="card-body">
                            <% if $Image %>
                                <div class="col-md-4">
                                    <img src="$Image.URL" class="img-responsive" alt="$Title.ATT">
                                </div>
                            <% end_if %>
                            $Content
                            <% if $PageLink %>$PageLink<% end_if %>
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
</div>

<% require css('dynamic/dynamic-elements: thirdparty/bootstrap/dist/css/bootstrap.min.css') %>
<% require javascript('silverstripe/admin: thirdparty/jquery/jquery.js') %>
<% require javascript('silverstripe/admin: thirdparty/bootstrap/js/dist/util.js') %>
<% require javascript('silverstripe/admin: thirdparty/bootstrap/js/dist/collapse.js') %>
