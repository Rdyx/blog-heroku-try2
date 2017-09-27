<?php
  $comsResult = pg_query($dbconn, "SELECT * FROM comments WHERE com_art_oid = '".$id."' ORDER BY com_oid DESC");

    $content .= '<div class="row well" id="listComs"><h3>Commentaires</h3>
				  <div class="col-xs-12">
				  	<ul class="pagination"></ul>
				  </div>
				  <div class="row list">';

  $content .= boucleCom($comsResult, $rowLog[0], $id);


  function boucleCom($arg1, $arg2, $arg3){
  	while($row = pg_fetch_row($arg1)){
  		$content = '<div class="col-xs-offset-1 col-xs-10 well well-lg comment">';

     if($_SESSION['nickname'] == 'Invité'){
      } elseif($_SESSION['nickname'] == $arg2 || $_SESSION['nickname'] == $row[3]){
        $content .= '<div class="text-right">
                    <ul class="list-inline">
                      <li><a href="modifyCom.php?id='.$arg3.'&postId='.$row[0].'"><img alt="edit" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgg_qIWXYRQEceGlHvFqC2xe1K3IZkHlYLJbq5zfD8k0N9wpDBcA"></a></li>
                      <li><a href="deleteCom.php?id='.$arg3.'&postId='.$row[0].'"><img alt="delete" src="http://www.lejournaldesarts.fr/images/entete/outils/popup_connexion_croix.gif"></a></li>
                    </ul>
                    </div>';


      };

  		$content .= '<div class="row text-left"><p>Posté par <strong>'.$row[3].'</strong> le <strong>'.$row[4].'</strong></p></div>
  			<div class="row well well-sm"><p>'.$row[1].'</p></div></div>';

  	}
      $content.= '</div>
      			<div class="col-xs-offset-1 col-xs-10 text-right"><p><strong>Ecrire un commentaire</strong></p>
			      <form action="postedComment.php?id='.$arg3.'" method="post">
			      	<ul class="list-unstyled">
			      		<li><textarea name="commentContent" id="contenu" cols="65" rows="3" placeholder="Votre texte..." maxlength="250"></textarea></li>
			      		<li><input type="submit" value="Poster"></li>
			      	</ul>
			      </form>
			  </div>
			</div>';
    
    return $content;
  }

?>