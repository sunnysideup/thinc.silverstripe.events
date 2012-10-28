<h1>$Title</h1>
$Content

<div class="event-information">
    <h3 class="event-information-title">
        <%t Event.INFORMATION "__Event.INFORMATION__" %>
    </h3>
    
    <span class="event-label">
        <%t Event.DATE "__Event.DATE__" %>:
    </span>
    
    $DateFrom.FormatI18N("%x") 
    <% if TimeFrom %> 
        <%t Event.START_TIME "__Event.START_TIME__" %> $TimeFrom.Format("H:i")
    <% end_if %>
    
    <% if DateTo %>
        - $DateTo.FormatI18N("%x")
        <% if TimeTo %> 
            <%t Event.END_TIME "__END_TIME__" %> $TimeTo.Format("H:i")
        <% end_if %>
    <% end_if %>
    
    <% if City %>
        <br />
        <span class="event-label"><%t Event.CITY "__Event.CITY__" %>:</span>
        $City
    <% end_if %>
</div>

<a href="$Parent.Link" title="<%t Event.BACK "__Event.BACK__" %>">
    <%t Event.BACK "__Event.BACK__" %>
</a>