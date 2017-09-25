<?php
  $comsResult = pg_query($dbconn, "SELECT art_com FROM article ORDER BY com_oid DESC");
  $content .= boucleCom($comsResult, $rowLog[0]);

  function boucleCom($arg1, $arg2){
  	$content .= '<div class="row"><h3>Commentaires</h3>';
  	while($row = pg_fetch_row($arg1)){
  		$content .= '<div class="col-xs-offset-2 col-xs-10 well well-lg article"><div class="row"><p>'.$row[0].'</p></div>';

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
  	}
      $content.= '<div class="col-xs-offset-2 col-xs-10 well text-right"><p><strong>Ecrire un commentaire</strong></p>
			      <form action="postedComment.php?id="'.$id.'" method="post">
			      	<ul class="list-unstyled">
			      		<li><textarea name="commentContent" id="contenu" cols="65" rows="3" placeholder="Votre texte..." maxlength="250" required></textarea></li>
			      		<li><input type="submit" value="Poster"></li>
			      	</ul>
			      </form>
			  </div>
			</div>';
    
    return $content;
  }

?>