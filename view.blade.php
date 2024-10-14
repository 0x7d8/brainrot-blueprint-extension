<?php
	$type = $blueprint->dbGet('brainrot', 'type');
?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">My awesome box</h3>
  </div>
  <div class="box-body">
    <p>
      This extension is called <b>{name}</b>. <br>
      <code>{identifier}</code> is the identifier of this extension. <br>
      The current version is <i>{version}</i>. <br>
    </p>
  </div>

	<div class="box-footer">
		<form method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="type">Brainrot Type</label>
				<select name="type" id="type" class="form-control">
					<option value="none" @if($type == 'none') selected @endif>None</option>
					<option value="random" @if($type == 'random') selected @endif>Random</option>
					<option value="subwaysurfers" @if($type == 'subwaysurfers') selected @endif>Subway Surfers</option>
					<option value="minecraft" @if($type == 'minecraft') selected @endif>Minecraft</option>
					<option value="andrewtate" @if($type == 'andrewtate') selected @endif>Andrew Tate</option>
					<option value="slime" @if($type == 'slime') selected @endif>Slime</option>
					<option value="memes" @if($type == 'memes') selected @endif>Memes</option>
					<option value="skibiditoilet" @if($type == 'skibiditoilet') selected @endif>Skibidi Toilet</option>
					<option value="gegagedigedagedago" @if($type == 'gegagedigedagedago') selected @endif>Gegagedigedagedago</option>
					<option value="custom" @if($type == 'custom') selected @endif>Custom</option>
				</select>

				<label for="custom" style="margin-top: 4px">Custom Brainrot</label>
				<input type="text" placeholder="84p36OjjE64" name="custom" id="custom" class="form-control" value="{{ $blueprint->dbGet('brainrot', 'custom') }}">
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>