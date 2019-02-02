<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Pictures from Previous Interuniversity Gliding Competitions</div>
    <div class="panel-body text-justify">

		<?php
    // This is so anti-blade it makes my eyes hurt...
    
		$dir = 'img/previous_interunis';

		//only display images with those file formats
		$file_display = array('jpg', 'jpeg', 'png', 'gif');

		//get all file names from folder
		$dir_contents = scandir($dir);

		$count = 0;

		echo "<div class='row'>";

		//for loop has been added to allow every file in the images/Gallery to be displayed
		foreach ($dir_contents as $file)
			{
			//get file type of current file
			$temp1 = explode('.', $file);
			$temp2 = end($temp1);
			$file_type = strtolower($temp2);

			//if the file name is valid and the file type is valid
			if($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true)
				{
				//get filename
				$name = basename($file);

				echo "<div class='col-md-4'>";
					echo "<div class='thumbnail img-responsive'>";
						echo "<a href='/img/previous_interunis/{$name}'>";
							echo "<img src='/img/previous_interunis_resized/{$name}'>";
						echo "</a>";
					echo "</div>";
				echo "</div>";
				}
			}

		echo "</div>";
		?>

    </div>
</div>
