<?php
  $comsResult = pg_query($dbconn, "SELECT * FROM comments ORDER BY com_oid DESC");
  $connect = pg_query($dbconn, "SELECT adm_name FROM admin");
  $rowLog = pg_fetch_row($connect);
  $content .= boucleCom($comsResult, $rowLog[0]);


  $content .= '<div class="row"><h3>Commentaires</h3>';

  function boucleCom($arg1, $arg2){
  	while($row = pg_fetch_row($arg1)){
  		$content .= '<div class="col-xs-offset-2 col-xs-10 well well-lg article"><div class="row"><p>'.$row[1].'</p></div>';

      if($_SESSION['nickname'] == $arg2){
      	//Add com autor later
      	//|| $_SESSION['nickname'] == $row[8]){
        $content .= '<div class="col-xs-12 text-right">
                    <ul class="list-inline">
                      <li><a href="modify.php?id='.$row[0].'">Modifier</a></li>
                      <li><a href="delete.php?id='.$row[0].'">Supprimer</a></li>
                    </ul>
                    </div>';
      };

      $content.= '<div class="col-xs-offset-2 col-xs-10 well text-right"><p><strong>Ecrire un commentaire</strong></p>
			      <form action="postedComment.php" method="post">
			      	<ul class="list-unstyled">
			      		<li><textarea name="commentContent" id="contenu" cols="75" rows="10" placeholder="Votre texte..." maxlength="1000" required></textarea></li>
			      		<li><input type="submit" value="Poster"></li>
			      	</ul>
			      </form>
			  </div>
			</div>';
    }
    return $content;
  }

?>