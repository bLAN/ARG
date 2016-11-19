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
<button id="" name="" class="btn btn-success">send</button>
</div>
</div>
</fieldset>
</form>
END;

$hintform = <<<END
<form class="form-horizontal">
<fieldset>
<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label" for="singlebutton"></label>
<div class="col-md-4">
<button id="hint" name="hint" value="1" class="btn btn-danger">Hint</button>
</div>
</div>
</fieldset>
</form>

END;

$finish = <<<END

<div class="jumbotron">
<h1> KONGE!!</h1>
<p class="lead">du er awsome</p>
</div>

END;


?>
