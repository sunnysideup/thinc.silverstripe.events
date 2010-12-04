<h1>$Title</h1>
$Content

<div class="event-information">
<h3 class="event-information-title"><% _t('Event.INFORMATION', '__Event.INFORMATION__') %></h3>

<span class="event-label"><% _t('Event.DATE', '__Event.DATE__') %>:</span>
$DateFrom.FormatI18N(%x)<% if TimeFrom %> <% _t('Event.STARTTIME','__Event.STARTTIME__') %> $TimeFrom.Format(H:i)<% end_if %>
<% if DateTo %>
- $DateTo.FormatI18N(%x)<% if TimeTo %> <% _t('Event.until','bis') %> $TimeTo.Format(H:i)<% end_if %>
<% end_if %>
<% if City %>
<br />
<span class="event-label"><% _t('Event.CITY', '__Event.CITY__') %>:</span>
$City
<% end_if %>
</div>

<a href="$Parent.Link" title="<% _t('Event.BACKTOOVERVIEW','__Event.BACKTOOVERVIEW__') %>"><% _t('General.BACKTOOVERVIEW','__General.BACKTOOVERVIEW__') %></a>