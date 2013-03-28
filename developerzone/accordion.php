<style>
#imgtab{
  height:200px;
}
</style>
<script>
$(document).ready(function() {
  $("#accordion").accordion();
});
</script>

<div id="accordion">
  <h3>tab 1</h3>
  <div>
    <p>
		tab 1
    </p>
  </div>
  <h3>tab 2</h3>
  <div>
    <p>
    	tab 2
    </p>
  </div>
  <h3>tab 3</h3>
  <div>
    <p>
    	tab 3
    </p>
  </div>
  <h3>tab 4</h3>
  <div id='imgtab'>
    <img src="./developerzone/img/kitten.jpg" alt="kitten"/>
  </div>
</div>