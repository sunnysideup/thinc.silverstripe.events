<% if Events %>

<% control Events(false,10) %>
<div class="event-full">
	<h3>$Title</h3>
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
</div>
<% end_control %>
<% else %>
    <% _t('Event.NOEVENTS','__NOEVENTS__') %>
<% end_if %>