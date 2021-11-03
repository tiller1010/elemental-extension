<div class="grid-element">
	<% if $GridSections %>
		<% loop $GridSections %>
			<div class="grid-section-container">
				$Content
			</div>
		<% end_loop %>
	<% end_if %>
</div>