<?php
  $comsResult = pg_query($dbconn, "SELECT art_com FROM articles");
  $content .= boucleCom($comsResult, $rowLog[0]);
  $id = htmlspecialchars($_GET['id']);
  var_dump($id);

  function boucleCom($arg1, $arg2){
  	$content .= '<div class="row" id="listComs">'
  	$content .= '<div class="row list"><h3>Commentaires</h3><br>
  				<ul class="pagination"></ul>';
  	while($row = pg_fetch_row($arg1)){
  		$content .= '<div class="col-xs-offset-1 col-xs-10 well well-lg comment"><p>'.$row[0].'</p></div>';

      if($_SESSION['nickname'] == $arg2){
      	//Add com autor later
      	//|| $_SESSION['nickname'] == $row[8]){
        $content .= '<div class="col-xs-12 text-justify">
                    <ul class="list-inline">
                      <li><a href="modify.php?id='.$row[0].'">Modifier</a></li>
                      <li><a href="delete.php?id='.$row[0].'">Supprimer</a></li>
                    </ul>
                    </div>';
      };
  	}
      $content.= '<div class="col-xs-offset-1 col-xs-10 well text-justify"><p><strong>Ecrire un commentaire</strong></p>
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