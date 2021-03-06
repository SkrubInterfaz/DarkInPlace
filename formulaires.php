<div class="modal fade" id="ConnectionSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-dark">
      <div class="modal-header" style="border-color: rgba(0,0,0,1);">
        <h5 class="modal-title" id="myModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="form-signin" role="form" method="post" action="?&action=connection">
      <div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group form-row">
					<label for="PseudoConectionForm" class="col-md-3 col-form-label">Pseudo </label>
					<div class="col-md-6">
						<input type="text" name="pseudo" class="form-control form-login" id="PseudoConectionForm" autocomplete="username" placeholder="Votre Pseudo" required autofocus>
					</div>
				</div>
				<div class="form-group form-row">
					<label for="MdpConnectionForm" class="col-md-3 col-form-label">Mot de passe </label>
					<div class="col-md-6">
						<input type="password" name="mdp" class="form-control form-login" id="MdpConnectionForm" autocomplete="currentpassword" placeholder="Votre mot de passe" required>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-9">
					  <div class="form-check">
						<label class="form-check-label">
						  <input class="form-check-input" name="reconnexion" type="checkbox"> Se souvenir de moi
						</label>
					  </div>
					</div>
				</div>	
				<a href="#" class="link text-muted" data-target="#passRecover" data-toggle="modal">Mot de passe oublié ?</a>
			</div>
			</div>
      </div>
      <div class="modal-footer" style="border-color: transparent;">
        <button type="submit" class="btn btn-success op-5 w-100 delop-hvr" style="background-color: darkgreen !important;">Connexion</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="passRecover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-dark" style="background-color: rgba(0,0,0,1) !important;">
      <div class="modal-header" style="border-color: #000">
        <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="-signin" role="form" method="post" action="?&action=passRecover">
      <div class="modal-body">
        <div class="form-row">
			<p class="text-justify text-center">Merci d'indiquer votre email utilisé à l'inscription , vous recevrez un lien pour réinitialiser votre mot de passe.</p>
			<div class="offset-md-2 col-md-8"><input type="email" name="email" autocomplete="" class="form-control form-login" id="EmailRecoverForm" placeholder="Email" required autofocus></div>
		</div>
      </div>
      <div class="modal-footer" style="border-color: #000">
        <button type="submit" class="btn btn-success w-100 delop-hvr" style="background-color: darkgreen !important;">Envoyer</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="InscriptionSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 0px !important;margin-bottom: 0px;margin-left: 0px !important;overflow: scroll;">
  <div class="modal-dialog modal-lg modal-xl h-100" role="document">
    <div class="modal-content modal-dark">
      <div class="modal-header" style="border-color: rgba(0,0,0,0.5);">
        <h5 class="modal-title" id="exampleModalLabel">Rejoignez nous ! - Inscription</h5>
        <button type="button" class="close" style="color: #F4F4F4" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form role="form" method="post" action="?&action=inscription">
      <div class="modal-body">

				<div class="form-group form-row">

						<div class="col-md-6 col-sm-12">
								<label for="PseudoInscriptionForm" class="col-form-label">Votre pseudo</label>
								<input type="text" name="pseudo" class="form-control form-login" id="PseudoInscriptionForm" placeholder="Votre pseudo exact In-Game" required>
						</div>

						<div class="col-md-6 col-sm-12">
								<label for="EmailInscriptionForm" class="col-form-label">Votre email</label>
								<input type="email" name="email" class="form-control form-login" id="EmailInscriptionForm" placeholder="Votre adresse email" required>
						</div>	

				</div>
				<div class="form-group form-row">

						<div class="col-md-6 col-sm-12">
								<label for="MdpInscriptionForm" class="col-form-label">Mot de passe</label>
								<input type="password" name="mdp" onKeyUp="securPass();" class="form-control form-login" id="MdpInscriptionForm" placeholder="************" required>
						</div>

						<div class="col-md-6 col-sm-12">
								<label for="EmailInscriptionForm" class="col-form-label">Confirmer le mot de passe</label>
								<input type="password" name="mdpConfirm" onKeyUp="securPass();" class="form-control form-login" id="MdpConfirmInscriptionForm" placeholder="************" required>
						</div>	
						<div class="form-group form-row d-none" id="progress">

							<div class="col-md-12">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated" id="progressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="offset-md-3 col-md-9">
								<p id="correspondance"></p>
							</div>

						</div>

				</div>
				<div class="form-group form-row">

						<div class="col-md-3 col-sm-6">
								<label for="MdpageForm" class="col-form-label">Age</label>
								<input type="number" name="age" class="form-control form-login" id="MdpageForm" value="0" min="5" max="126" placeholder="17">
						</div>

						<div class="offset-md-3 col-md-3 col-sm-6">

							<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="show_email" value="true" checked> 
										Rendre votre adresse email publique
									</label>
							</div>

							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="souvenir" checked disabled> Recevoir la newsletter.
								</label>
							</div>
							
						</div>	

				</div>
				<div class="form-group form-row">

					<div class="col-md-12">
						<img id="captcha" src="include/purecaptcha/purecaptcha_img.php?t=login_form" style="margin-left: 15px;"/>
					</div>
					<div class="col-md-12">
						<input type="text" name="CAPTCHA" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Quel caractéres lisez vous ci-dessus ? (Anti-Robot)" class="form-control form-login" required/>
					</div>

				</div>



			</div>
		</div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success w-100" id="InscriptionBtn" disabled>S'inscrire</button>
      </div>
		  </form>
    </div>
  </div>
</div>
<?php
if(isset($_GET['page']) && $_GET['page'] == "messagerie")
{
	?>
<div class="modal fade" id="modalRep" tabindex="-1" role="dialog" aria-labelledby="ModalRepLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalRepLabel">Nouveau message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=sendMessage" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="destinataire" class="col-form-label">Destinataire:</label>
            <input type="text" class="form-control" name="destinataire" id="destinataire" required maxlength="20">
          </div>
          <div class="form-group">
          	<div class="dropdown" style="display: inline">
			  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			   	 <i style="text-decoration:none;" class="fas fa-smile"></i>
			  	</a>
				<div class="dropdown-menu borderrond" aria-labelledby="font">
					<div class="topheaderdante" style="width: 500px">
						<p class="topheadertext">Clique pour ajouter un smiley!</p>
					</div>
				<?php 
					$smileys = getDonnees($bddConnection);
					for($i = 0; $i < count($smileys['symbole']); $i++)
					{
						echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'message\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
					}
				?>
				</div>
			</div>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="italique"><i class="fas fa-italic"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="souligné"><i class="fas fa-underline"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="barré"><i class="fas fa-strikethrough"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="aligné à gauche"><i class="fas fa-align-left"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="centré"><i class="fas fa-align-center"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="aligné à droite"><i class="fas fa-align-right"></i></a>
			<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="justifié"><i class="fas fa-align-justify"></i></a>
			<a href="javascript:ajout_text_complement('message', 'Ecrivez ici l\'adresse de votre lien', 'https://craftmywebsite.fr/forum', 'url', 'Entrez le titre de votre lien', 'CraftMyWebsite')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
			<a href="javascript:ajout_text_complement('message', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/img/cat6.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
			<a href="javascript:ajout_text_complement('message', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
			<a href="javascript:ajout_text_complement('message', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
			<div class="dropdown">
			  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			   	 <i class="fas fa-text-height"></i>
			  	</a>
				<div class="dropdown-menu" aria-labelledby="font">
			   		<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
			   		<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
			  	</div>
			</div>
            <label for="message" class="col-form-label">Message:</label>
            <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer le message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageLabel">Conversation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=sendMessage" method="POST">
      		<input type="hidden" name="destinataire" class="destinataire" />
	      	<div class="modal-body">
	      		<div class="container">
			         <div id="Conversation">
			         </div>
			    </div><br/>
			    <div class="container">
			    	<h3>Répondre :</h3>
			    	<div class="dropdown" style="display: inline">
					  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   	 <i style="text-decoration:none;" class="fas fa-smile"></i>
					  	</a>
						<div class="dropdown-menu borderrond" aria-labelledby="font">
							<div class="topheaderdante" style="width: 500px">
								<p class="topheadertext">Clique pour ajouter un smiley!</p>
							</div>
						<?php 
							$smileys = getDonnees($bddConnection);
							for($i = 0; $i < count($smileys['symbole']); $i++)
							{
								echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'contenue\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
							}
						?>
						</div>
					</div>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="italique"><i class="fas fa-italic"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="souligné"><i class="fas fa-underline"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="barré"><i class="fas fa-strikethrough"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="aligné à gauche"><i class="fas fa-align-left"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="centré"><i class="fas fa-align-center"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="aligné à droite"><i class="fas fa-align-right"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="justifié"><i class="fas fa-align-justify"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre lien', 'https://craftmywebsite.fr/forum', 'url', 'Entrez le titre de votre lien', 'CraftMyWebsite')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/img/cat6.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
					<div class="dropdown">
					  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   	 <i class="fas fa-text-height"></i>
					  	</a>
						<div class="dropdown-menu" aria-labelledby="font">
					   		<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
					   		<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
					  	</div>
					</div>
			    	<textarea rows="5" name="message" id="contenue" required class="form-control"></textarea>
			    </div>
	     	 </div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" style="flex: 1;" data-dismiss="modal">Fermer</button>
		        <button type="submit" class="btn btn-primary" style="flex: 1;">Envoyer le message</button>
		    </div>
		</form>
    </div>
  </div>
</div>
<?php 
}
?>
<div class="modal fade" id="NomForum" tabindex="-1" role="dialog" aria-labelledby="NomForumLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NomForumLabel">Modifier le nom du forum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=changeNomForum" method="post">
      <div class="modal-body">
        	<input type="hidden" name="id" id="id" value="">
        	<input type="hidden" name="entite" id="entite" value="">
        	<input type="text" class="form-control" name="nom" id="nom" />
        	<br/>
        	<label class="control-label col-sm-4" for="icone">Icone</label>
        	<input type="text" class="form-control col-sm-6" style="display: inline-block;" name="icone" value="" id="icone">
        	<p class="text-muted text-center"><a href="https://design.google.com/icons/" target="_blank">https://design.google.com/icons/</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </div>
  </div>
</div>