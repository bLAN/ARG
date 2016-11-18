<?php
$userform = <<<END
<form class="form-horizontal">
	<fieldset>


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="user">Brukernavn</label>  
		<div class="col-md-4">
		  <input id="user" name="user" type="text" placeholder="" class="form-control input-md" required="">

			</div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="send"></label>
				<div class="col-md-4">
					<button class="btn btn-primary">GO!!</button>
					  </div>
					  </div>

					  </fieldset>
					  </form></legend>
	</fieldset>

END;

$taskform = <<<END
	<form class="form-horizontal" autocomplete="off">
	<fieldset>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput"></label>
	   <div class="col-md-6">
			<input id="svar" name="svar" type="text" placeholder="svar" class="form-control input-md" required="">
		</div>
</div>
			<div class="form-group">
		<label class="col-md-4 control-label" for=""></label>
	   <div class="col-md-4">
	   <button id="" name="" class="btn btn-success">Button</button>
	 </div>
	 </div>

	 </fieldset>
	</form>
END;


?>
