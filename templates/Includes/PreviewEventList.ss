<% if Events %>

<% control Events(false,10) %>
<div class="event-preview">
    <h3>$Title</h3>
    <div class="event-date">$DateFrom.FormatI18N(%x)<% if TimeFrom %> <% _t('Event.STARTTIME','__Event.STARTTIME__') %> $TimeFrom.Format(H:i)<% end_if %><% if DateTo %> - $DateTo.FormatI18N(%x)<% if TimeTo %> <% _t('Event.until','bis') %> $TimeTo.Format(H:i)<% end_if %><% end_if %><% if City %>, $City<% end_if %></div>   
    <p>
    $Content.Summary
    </p>
    <a href="$Link" title="$Title"><% _t('Event.READMORE','__Event.READMORE__') %></a>
</div>
<% end_control %>
<% else %>
    <% _t('Event.NOEVENTS','__NOEVENTS__') %>
<% end_if %>