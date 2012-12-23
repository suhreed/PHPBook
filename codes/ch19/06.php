<?php

$image = $_POST['image'];

if (isset($image) && file_exists($image)) {
    header("Content-type: image/gif");
    passthru("giftopnm $image | pnmscale -xscale .5 -yscale .5 | ppmtogif");
    } else {
      echo "<p>The image $image could not be found</p>";
 }

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
Image: <input type="text" value="<?php isset($image)?$image:'...'; ?>" name="image" />
<input type="submit" />
</form>
<?php isset($image)?'<img src="$image" />':''; ?>
