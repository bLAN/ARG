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
<input id="svar" name="svar" type="text" placeholder="svar" class="col-md-8 form-control input-md" required="">
<button id="" name="" class="btn btn-success pull-right col-md-4">send</button>
</div>
</fieldset>
</form>
END;

$hintform = <<<END
<form class="form-horizontal">
<fieldset>
<!-- Button -->
<div class="form-group">
<button id="hint" name="hint" value="1" class="btn btn-danger pull-right col-md-4">Hint</button
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
