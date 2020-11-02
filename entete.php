<header id="navbarheader" class="">

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand wow fadeInDown link" href="#"
            data-wow-delay="1.2s"><?php echo $_Serveur_['General']['name']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation" style="color: #f4f4f4 !important;">
            <i class="fas fa-bar"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <?php
					for($i = 0; $i < count($_Menu_['MenuTexte']); $i++)
					{
						if(isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]))
						{
							?>
                <li class="nav-item dropdown">
                    <a id="Listdefil<?php echo $i; ?>" href="#" class="nav-link noactive-item dropdown-toggle wow fadeInDown link"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        data-wow-delay="<?php echo $i/10; ?>s"><?php echo $_Menu_['MenuTexte'][$i]; ?></a>
                    <div class="dropdown-menu" aria-labelledby="Listdefil<?php echo $i; ?>">
                        <?php
							for($k = 0; $k < count($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]); $k++)
							{

								if($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == '-divider-')
								{
									echo'<div class="dropdown-divider"></div>';
								}
								else
								{
									echo '<a href="' .$_Menu_['MenuListeDeroulanteLien'][$_Menu_['MenuTexteBB'][$i]][$k]. '" class="dropdown-item link">' .$_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k]. '</a>';
								}
							}
							?>
                    </div>
                </li>
                <?php
						}
						else
						{
							$quellePage = str_replace('index.php?&page=', '', $_Menu_['MenuLien'][$i]);
							$quellePage1 = str_replace('?&page=', '', $_Menu_['MenuLien'][$i]);
							$quellePage2 = str_replace('?page=', '', $_Menu_['MenuLien'][$i]);

							if(isset($_GET['page']) AND ($quellePage == $_GET['page'] OR $quellePage1 == $_GET['page'] OR $quellePage2 == $_GET['page']))
								$active = ' activenav-item active';

							elseif(!isset($_GET['page']) AND $i == 0)
								$active = ' activenav-item active';

							else $active = 'noactive-item';

							echo '<li class="nav-item"><a href="' .$_Menu_['MenuLien'][$i]. '" class="nav-link link wow fadeInDown ' .$active. '" data-wow-delay="'. $i/10 .'s">' .$_Menu_['MenuTexte'][$i]. '</a></li>';
						}
					} ?>
            </ul>
            <?php
					if(isset($_Joueur_))
					{
						$Img = new ImgProfil($_Joueur_['id']);
					?>
            <div class="btn-group" role="group" aria-label="Dropdown Membres">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop3" type="button"
                        class="btn btn-outline-primary dropdown-toggle wow fadeInDown link" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-wow-delay="<?php echo ($i+1)/10; ?>s">&nbsp;<img
                            src="<?=$Img->getImgToSize(20, $width, $height); ?>"
                            style="margin-left: -10px; width: <?=$width;?>px; height: <?=$height;?>px;">
                        <?php echo $_Joueur_['pseudo']; ?></button>
                    <div class="dropdown-menu  dropdown-menu-right animated fadeIn" aria-labelledby="btnGroupDrop3">
                        <?php
					        $req_topic = $bddConnection->prepare('SELECT cmw_forum_topic_followed.pseudo, vu, cmw_forum_post.last_answer AS last_answer_pseudo
					          FROM cmw_forum_topic_followed
					          INNER JOIN cmw_forum_post WHERE id_topic = cmw_forum_post.id AND cmw_forum_topic_followed.pseudo = :pseudo');
					        $req_topic->execute(array(
					          'pseudo' => $_Joueur_['pseudo']
					        ));
					        $alerte = 0;
					        while($td = $req_topic->fetch())
					        {
					          if($td['pseudo'] != $td['last_answer_pseudo'] AND $td['last_answer_pseudo'] != NULL AND $td['vu'] == 0)
					          {
					            $alerte++;
					          }
					        }
					        $req_answer = $bddConnection->prepare('SELECT vu
					        FROM cmw_forum_like INNER JOIN cmw_forum_answer WHERE id_answer = cmw_forum_answer.id
					        AND cmw_forum_like.pseudo != :pseudo AND cmw_forum_answer.pseudo = :pseudo');
					        $req_answer->execute(array(
					          'pseudo' => $_Joueur_['pseudo'],
					        ));
					        while($answer_liked = $req_answer->fetch())
					        {
					          if($answer_liked['vu'] == 0)
					          {
					            $alerte++;
					          }
					        }
					        if($_PGrades_['PermsPanel']['access'] == "on" OR $_Joueur_['rang'] == 1)
					          echo '<a href="admin.php" class="dropdown-item text-success"><i class="fas fa-tachometer-alt"></i> Administration</a>';
					        if($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1)
					        {
					          $req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
					          $signalement = $req_report->rowCount();
					          echo '<a href="?page=signalement" class="dropdown-item text-warning"><i class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning" id="signalement">' . $signalement . '</span></a>';
					        }
					      ?>

                        <a class="dropdown-item link" href="?page=profil&profil=<?php echo $_Joueur_['pseudo']; ?>"><i
                                class="fa fa-user"></i> Mon Profil</a>
                        <a class="dropdown-item link" href="?page=alert"><i class="fa fa-envelope"></i> Alertes : <span
                                class="badge badge-pill badge-primary" id="alerts"><?php echo $alerte; ?></span></a>
                        <a class="dropdown-item link" href="?page=token"> Mon solde :
                            <?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens'] . ' '; ?><i
                                class="fas fa-gem"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="?action=deco"><i class="fas fa-sign-out-alt"></i> Se
                            déconnecter</a>
                    </div>
                </div>
            </div>
            <?php }else{ ?>

                <a class="nav-link wow fadeInDown link"
                    data-toggle="collapse" href="#dropdown-login" role="button" 
                    data-wow-delay="<?php echo ($i+1)/10;?>s" style="margin-right: 32px;">
                    <i class="fa fa-user"></i> Mon Compte
                </a>

            

            <?php } ?>
        </div>
    </nav>
    <div class="collapse" id="dropdown-login">
        <form class="px-4 py-3" action="?&action=connection" method="post" role="form">
            <div class="form-group">
                <label for="pseudodropdown" class="label-login">Pseudo</label>
                <input type="text" class="form-control form-login" id="pseudodropdown" name="pseudo" placeholder="PinglsDzn">
            </div>
            <div class="form-group">
                <label for="mdpdropdown" class="label-login">Mot de passe</label>
                <input type="password" class="form-control form-login" id="mdpdropdown" name="mdp" placeholder="********">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label label-login" name="reconnexion" for="dropdownCheck">
                    Se souvenir de moi
                </label>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm">Connexion</button>
            </div>
        </form>
        <button class="btn btn-sm button-login w-100" href="#" data-toggle="modal" data-target="#InscriptionSlide">Inscription</button>
        <button class="btn btn-sm button-login w-100" href="#" href="#" data-toggle="modal" data-target="#passRecover">Mot de passe oublié ?</button>
    </div>

</header>