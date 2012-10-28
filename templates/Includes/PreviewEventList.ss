<br />
<% if Events %>

<% control Events(false,10) %>
<div class="event-preview">
    <h3>$Title</h3>
        <div class="event-date">$DateFrom.FormatI18N("%x")
        <% if TimeFrom %> 
            <%t Event.START_TIME "__Event.START_TIME__" %> $TimeFrom.Format(H:i)
        <% end_if %>
        
        <% if DateTo %> - $DateTo.FormatI18N("%x")
            <% if TimeTo %> 
                <%t Event.END_TIME "__END_TIME__" %> $TimeTo.Format(H:i)
            <% end_if %>
        <% end_if %>
        <% if City %>, $City<% end_if %>
        </div>   
    <p>
    $Content.Summary
    </p>
    <a href="$Link" title="$Title"><%t Event.MORE "__Event.MORE__" %></a>
</div>
<% end_control %>
<% else %>
    <%t Event.NO_EVENTS "__NO_EVENTS__" %>
<% end_if %>