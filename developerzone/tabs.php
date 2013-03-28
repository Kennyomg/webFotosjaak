<script>
$(document).ready(function() {
  $( "#tabs" ).tabs({
  });
  $("#sortable").sortable();
});
</script>

<div id="tabs">
  <ul id="sortable">
    <li><a href="#tabs-1">1</a></li>
    <li><a href="#tabs-2">2</a></li>
    <li><a href="#tabs-3 img">3</a></li>
    <li><a href="#tabs-4">4</a></li>
  </ul>
  <div id="tabs-1">
    <p>Tab 1 lacks kittens</p>
  </div>
  <div id="tabs-2">
    <p>I think I hear a kitten.</p>
  </div>
  <div id="tabs-3">
    <img src="./developerzone/img/kitten.jpg" alt="kitten"/>
  </div>
  <div id="tabs-4"><p>The kitten broke this tab</p></div>
</div>