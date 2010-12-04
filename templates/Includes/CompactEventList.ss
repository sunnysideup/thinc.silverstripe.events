<% control EventSections %>
    <div class="event-year">
    <h2>$Label</h2>
    <% control Events %>
        <div class="event-month">
        <h3>$Label</h3>
            <table class="event-table-list">
                <tbody>
            <% control Events %>
            <tr>
                <td class="event-table-middle">
                $DateFrom.FormatI18N(%x) <% if TimeFrom %> <% _t('Event.STARTTIME','__Event.STARTTIME__') %> $TimeFrom.Format(H:i)<% end_if %>
                <% if DateTo %>
                - $DateTo.FormatI18N(%x)
                <% end_if %>
                </td>
                <td class="event-table-large"><a href="$Link" title="$Title">$Title</a></td>
                <td class="event-table-middle">$City</td>
            </tr>            
            <% end_control %>
                </tbody>
            </table>
            </div>
    <% end_control %>
    </div>
<% end_control %>