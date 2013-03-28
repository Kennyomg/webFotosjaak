<style>
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
</style>
<script>
$(document).ready(function() {
  $( "#selectable" ).selectable();
});
</script>

<ol id="selectable">
  <li>Item 1</li>
  <li>Item 2</li>
  <li>Item 3</li>
  <li>Item 4</li>
</ol>