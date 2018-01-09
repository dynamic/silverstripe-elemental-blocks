<div class="row $ExtraClass">
    <%--
    <div class="col-md-4">
        $AddressMap(300,300)
    </div>
    --%>
    <div class="col-md-8">
        <h4>$Title</h4>
        <p>
            $Address<br><% if $Address2 %>$Address2<br><% end_if %>
            $City, $State $PostalCode<br>
            $Country
        </p>
        <p>
            <a href="tel:{$Phone}">$Phone</a><br>
            <a href="emalto:{$Email}">$Email</a><br>
            <a href="$Website" target="_blank">$Website</a>
        </p>
    </div>
</div>
