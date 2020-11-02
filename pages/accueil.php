<div class="container">
    <div class="jumbotron">
        <h1 class="text-white"><?=$_Serveur_['General']['name'];?></h1>
        <p class="text-light">
            <?=$_Serveur_['General']['description'];?>
        </p>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn-ip btn btn-primary link" id="copierip" onClick="copierIP();" 
        data-container="body" data-toggle="popover" data-timeout="1200" data-placement="top" data-content="Vous avez copier l'Adresse IP du serveur !">
            <?=$_Serveur_['General']['ipTexte'];?>
        </button>
    </div>
    <input type="text" style="opacity: 0;display: block;" id="iptexteinput" name="iptexteinput" value="<?=$_Serveur_['General']['ipTexte'];?>">
</div>
<section id="accueil">
    <div class="container rounded box-of-acc" style="background-color: #1a1a1a !important;">
        <div class="row">

            <div class="col-md-8">
                
                <div id="slider">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
        
                            <div class="carousel-item active">
                                <img src="<?=$_Theme_['Slides'][1]['image']?>" class="img-fluid rounded" alt="<?=$_Theme_['Slides'][1]['image']?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carousel-caption-text" ><?=$_Theme_['Slides'][1]['message']?></h5>
                                </div>
                            </div>
                            <?php
                            for($i = 2; $i < count($_Theme_['Slides']) + 1; $i++)
                            { 
                                echo'
                                <div class="carousel-item">
                                    <img src="'.$_Theme_['Slides'][$i]['image'].'" class="img-fluid rounded" alt="'.$_Theme_['Slides'][$i]['image'].'">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="carousel-caption-text" >'.$_Theme_['Slides'][$i]['message'].'</h5>
                                    </div>
                                </div>';
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>

            </div>

                <?php
                echo '<section id="news">';
                $i = 0;
            if(isset($news) && count($news) > 0)
            {
                echo '
                <div class="d-flex justify-content-center" id="slider">
                    <h5 style="color:#f4f4f4">Actualité & Nouveauté</h5>
                </div>';
                for($i = 0; $i < 5; $i++)
                { 
                    if($i < count($news))
                    {  
                        unset($Img);
                        $Img = new ImgProfil($news[$i]['auteur'], 'pseudo');
                        $getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
                        $countCommentaires = $getCountCommentaires->rowCount();
                        $getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
                        $countLikesPlayers = $getcountLikesPlayers->rowCount();
                        $namesOfPlayers = $getcountLikesPlayers->fetchAll();
                        $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                    ?>
                    <div class="card mb-5 bg-primary border-1">
                        <div class="card-header bg-primary text-white">
                            <p class="float-left mb-0"
                                style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:sandybrown"><span
                                    class="text-muted">#<?php echo $news[$i]['id']; ?></span>
                                <?php echo $news[$i]['titre']; ?></p>
                            <p class="float-right mb-0"><a
                                    href="?page=profil&profil=<?php echo $news[$i]['auteur']; ?>"
                                    style="color: white;text-decoration: none !important;">
                                    <img class="hvr-rotate"
                                        src="<?=$Img->getImgToSize(24, $width, $height);?>" style="max-width: 24px;max-height: 24px;"/>
                                    <?php echo $news[$i]['auteur']; ?></a></p>
                        </div>
                        <div class="card-body news-content bg-primary" style="color: #F4F4F4 !important;">
                            <p class="text-content" style="color: #F4F4F4 !important;">
                                <?php echo $news[$i]['message']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="float-left text-muted mb-0">
                                <?php echo 'Posté le '.date('d/m/Y', $news[$i]['date']).' &agrave; '.date('H:i:s', $news[$i]['date']); ?>
                            </p>
                            <p class="float-right mb-0">

                            <?php
    						if(isset($_Joueur_)) {
	                            $reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
								$getCheckLike = $reqCheckLike->fetch(PDO::FETCH_ASSOC);
								$checkLike = $getCheckLike['pseudo'];
                                        if($_Joueur_['pseudo'] == $checkLike) {
                                            echo '
                                            <a href="#" data-toggle="collapse" data-target="#news'.$news[$i]['id'].'" class="card-link link"><i class="fas fa-comment" aria-hidden="true"></i> '.$countCommentaires.' Commentaires</a>
                                            ';
                                        } else {
                                            echo '
                                            <a href="#" class="card-link link" data-toggle="collapse" data-target="#news'.$news[$i]['id'].'"><i class="fas fa-comment" aria-hidden="true"></i>'.$countCommentaires.' Commentaires</a> |
                                            <a href="?&action=likeNews&id_news='.$news[$i]['id'].'" class="card-link link"><i class="fas fa-thumbs-up" aria-hidden="true"></i> J\'aime &nbsp;</a>';
                                        }
                                    } else {
							        echo '<a href="#" data-toggle="collapse" class="card-link link" data-target="#news'.$news[$i]['id'].'"><i class="fas fa-comment" aria-hidden="true"></i> '.$countCommentaires.' Commentaires</a>';
                                    }
                            if($countLikesPlayers != 0) {?>
                                <a tabindex="0" class="card-link link" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="bottom" 
                                data-content="
                                <?php
                                foreach ($namesOfPlayers as $likesPlayers) {
                                    echo $likesPlayers['pseudo'];
                                    echo ', ';
                                }
                                echo 'aiment ça';
                                ?>
                                "
                                >
                                <i class="fas fa-thumbs-up"></i> <?=$countLikesPlayers?>
                                </a>
                                <?php
                                }
                                ?>

                            </p>
                        </div>
                    </div>
                    <?php
                    unset($Img);
					if(isset($_Joueur_)) {
					    $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
						while($newsComments = $getNewsCommentaires->fetch(PDO::FETCH_ASSOC)) {
						        $reqEditCommentaire = $accueilNews->editCommentaire($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
								$getEditCommentaire = $reqEditCommentaire->fetch(PDO::FETCH_ASSOC);
								$editCommentaire = $getEditCommentaire['commentaire'];
							if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {  ?>

                                <div class="collapse" id="news<?php echo $news[$i]['id'].'-'.$newsComments['id'].'-edit'; ?>">
                                    <div class="row">
										<div class="col-md-12 card border-0 bg-primary">
                                            <div class="card-header" style="background-color: #121212">
                                                <span class="float-right">
                                                    <a data-toggle="collapse" style="color: #F4F4F4;" href="#news<?php echo $news[$i]['id'].'-'.$newsComments['id'].'-edit'; ?>" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </a>
                                                </span>
                                                <span class="float-left">
                                                <h4 class="card-title">
                                                 Edition du commentaire
                                                </h4>
                                            </div>
                                            <div class="card-body" style="background-color: #121212">
                                                <form action="?&action=edit_news_commentaire&id_news=<?php echo $news[$i]['id'].'&auteur='.$newsComments['pseudo'].'&id_comm='.$newsComments['id']; ?>" method="post">
	
                                                    <div class="from-group">
                                                        <label for="edit_commentaire">Votre commentaire</label>
                                                        <textarea name="edit_commentaire" id="edit_commentaire" class="form-control form-login" rows="3" style="resize: none;" maxlength="255" required><?php echo $editCommentaire; ?></textarea>
                                                        <small for="edit_commentaire" class="text-muted">Minimum 6 caractéres, Maximum 255 caractéres</small>
                                                    </div>
                                                    <div class="form-row">
                                                        <button type="submit" class="btn btn-primary btn-sm w-100">Editer</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>                            
                                </div>

                            <?php
                                }
                            }
                        }                        
                        ?>

                        <div class="collapse" id="<?php echo "news".$news[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="row">
                                <div class="col-md-12 card border-0 bg-primary">
                                    <div class="card-header" style="background-color: #121212 !important;">
                                        <span class="float-right">
                                            <a data-toggle="collapse" style="color: #F4F4F4;" href="#<?php echo "news".$news[$i]['id']; ?>" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </span>
                                        <span class="float-left">
                                            <h4 class="card-title">Commentaires <?php echo $news[$i]['titre']; ?></h4>
                                        </span>
                                    </div>
							        <div class="card-body bg-primary" style="background-color: #121212 !important">
							            <br>
							            <?php
                                    $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                                        while($newsComments = $getNewsCommentaires->fetch(PDO::FETCH_ASSOC)) {
                                            if(isset($_Joueur_)) {

                                                $getCheckReport = $accueilNews->checkReport($_Joueur_['pseudo'], $newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
                                                $checkReport = $getCheckReport->rowCount();

                                                $getCountReportsVictimes = $accueilNews->countReportsVictimes($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
                                                $countReportsVictimes = $getCountReportsVictimes->rowCount();
                                            }
                                            unset($Img);
                                            $Img = new ImgProfil($newsComments['pseudo'], 'pseudo');
										?>

							            <div class="container">
							                <div class="row">
							                    <div class="col-md-4 col-sm-12">
							                        <img class="rounded" src="<?=$Img->getImgToSize(64, $width, $height);?>"
							                            style="margin-left: auto; margin-right: auto; display: block; width: <?=$width;?>px; height: <?=$height;?>px;"
							                            alt="Auteur" />
							                        <p class="text-muted text-center username">
							                            <?php echo '<B> '.$newsComments['pseudo'].'</B>'; ?><br />
							                            <?php echo  '<b>'.gradeJoueur($newsComments['pseudo'], $bddConnection).'</b><br/>'; ?>
							                            <?php echo '<B>Le '.date('d/m', $newsComments['date_post']).' à '.date('H:i:s', $newsComments['date_post']).'</B>'; ?>
							                        </p>
							                        <?php if(isset($_Joueur_)) { ?>
							                        <span
							                            style="color: red;"><?php if($newsComments['nbrEdit'] != "0"){echo 'Nombre d\'édition: '.$newsComments['nbrEdit'].' | ';}if($countReportsVictimes != "0"){echo '<B>'.$countReportsVictimes.' Signalement</B> |';} ?></span>
							                        <div class="dropdown">
							                            <button class="btn btn-primary op-8 btn-sm" data-toggle="dropdown" style="font-size: 10px;">Action
							                                <b class="caret"></b></button>
							                            <ul class="dropdown-menu">
							                                <?php if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {
																		echo '<li><a href="#news'.$news[$i]['id'].'-'.$newsComments['id'].'-edit" class="dropdown-item link" data-toggle="collapse" data-target="#news'.$news[$i]['id'].'-'.$newsComments['id'].'-edit">Editer</a></li>';
																		echo '<li><a class="dropdown-item link text-danger" href="?&action=delete_news_commentaire&id_comm='.$newsComments['id'].'&id_news='.$news[$i]['id'].'&auteur='.$newsComments['pseudo'].'">Supprimer</a></li>';
																	}
																	if($newsComments['pseudo'] != $_Joueur_['pseudo']) {
																		if($checkReport == "0") {
																			echo '<li><a class="dropdown-item link" href="?&action=report_news_commentaire&id_news='.$news[$i]['id'].'&id_comm='.$newsComments['id'].'&victime='.$newsComments['pseudo'].'">Signaler</a></li>';
																		} else {
																			echo '<li><a class="dropdown-item link" href="#">Déjà report</a></li>';
																		}
																	} ?>
							                            </ul>
							                        </div> <!-- dropdown -->
							                        <?php } ?>
							                    </div>
							                    <div class="col-md-6 col-sm-12">
                                                    <p class="text-white">
    							                        <?php $com = espacement($newsComments['commentaire']); echo BBCode($com, $bddConnection); ?>
                                                    </p>
							                    </div>
							                </div> <!-- Ticket-Commentaire-->
							            </div> <!-- Panel Panel-Default -->
                                        <?php } ?>
							        </div> <!-- card-Body -->
							        <?php
										if(isset($_Joueur_)) { ?>
							        <div class="card-footer w-100" style="background-color: #121212 !important">
							            <form action="?&action=post_news_commentaire&id_news=<?php echo $news[$i]['id']; ?>" method="post"
							                class="w-100">
							                <textarea name="commentaire" id="commentaire" class="form-control form-login w-100" required></textarea>
							                <small class="text-center text-muted" for="commentaire">Minimum 6 caractères - Maximum 255
							                    caractères</small>
							            <div class="row">
							                <div class="col-md-12">
							                    <button type="submit" class="btn btn-success w-100 op-7 btn-block">Commenter</button>
							                </div>
                                        </div>
                                        </form>
							        </div>
							        <?php } else { ?>
							        <div class="card-footer text-center" style="background-color: #121212 !important">
							            <div class="alert alert-danger">Vous devez être connecté pour mettre un commentaire.</div>
							        </div> <!-- card-Footer -->
							        <?php } ?>
							    </div><!-- card-Footer -->
							</div> <!-- card-Content -->
                        </div>
                        <br/>

                    <?php
                            }
                        }
                    }
                    else
                        echo '<div class="card-body" style="margin-top: 50px">
                                <div class="alert alert-warning">
                                    <p class="text-center">Aucune news n\'a été créée à ce jour ! O_o
                                    </p>
                                </div>
                            </div>';
                     ?>

                </section>
            </div>
            <div class="col-md-4" id="infos">

                <div class="card mb-4 bg-primary border-1 infos rounded">
                    <?php if($_Serveur_['General']['statut'] == 0){?>
                    <div class="card-header bg-primary text-white clearfix">
                        <p class="float-left mb-0" style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:white">
                            <i class="fas fa-server"></i> Status du serveur</p>
                        <p class="float-right mb-0"
                            style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:darkred"><i
                                class="fa fa-warning"></i> Hors Ligne</p>
                    </div>
                    <div class="card-body bg-primary">
                    </div>
                    <?php }
                                    elseif($_Serveur_['General']['statut'] == 1){?>
                    <div class="card-header bg-primary text-white clearfix">
                        <p class="float-left mb-0" style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:white">
                            <i class="fas fa-server"></i> Status du serveur</p>
                        <p class="float-right mb-0"
                            style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:darkgreen"><i
                                class="fa fa-check-square"></i> En ligne</p>
                    </div>
                    <div class="card-body bg-primary">
                        <p class="float-left mb-0" style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:white">
                            <?php echo $playeronline ?> / <?php echo $maxPlayers ?> Joueurs en connecté</p>
                        <br />
                        <?php

                        function Pourcentage($Nombre, $Total) {
                            return $Nombre * 100 / $Total;
                        }
                        $Pourcent = Pourcentage($playeronline, $maxPlayers);
                        ?>
                        <div class="progress" style="background-color: #1a1a1a; border-radius: 2px;box-shadow: 0 2px 5px rgba(32, 32, 32, 0.9) inset;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width:<?php echo $Pourcent ?>%"></div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="card-header bg-primary text-white clearfix">
                        <p class="float-left mb-0" style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:white">
                            <i class="fas fa-server"></i> Status du serveur</p>
                        <p class="float-right mb-0"
                            style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:orange"><i
                                class="fa fa-check-square"></i> En maintenance</p>
                    </div>
                    <div class="card-body bg-primary">
                    </div>
                    
                    <?php } ?>

                </div>
                
                <div class="card mb-4 bg-primary border-1 rounded infos">
                    <?php if(isset($_Joueur_)){ 
                        unset($Img);
                        $Img = new ImgProfil($_Joueur_['pseudo'], 'pseudo');
                        ?>
                    <div class="card-header bg-primary text-center text-white">
                        <p class="float-left" style="font-size: 10px;"><img
                                src="<?=$Img->getImgToSize(20, $width, $height); ?>" width="20px" height="20px"> <?php echo $_Joueur_['pseudo']; ?>
                        </p>
                        <p class="float-right" style="font-size: 10px;">
                            <?php echo $_Forum_->gradeJoueur($_Joueur_['pseudo']); ?> </p>
                        </p>
                    </div>
                    <div class="card-body bg-primary text-center text-white">
                        <?php
                        $req_topic = $bddConnection->prepare('SELECT cmw_forum_topic_followed.pseudo, vu, cmw_forum_post.last_answer AS last_answer_pseudo
                                FROM cmw_forum_topic_followed INNER JOIN cmw_forum_post WHERE id_topic = cmw_forum_post.id AND cmw_forum_topic_followed.pseudo =: pseudo ');
                                $req_topic->execute(array(
                                    'pseudo' => $_Joueur_['pseudo']
                                )); $alerte = 0;
                                while ($td = $req_topic->fetch()) {
                                    if ($td['pseudo'] != $td['last_answer_pseudo'] AND $td['last_answer_pseudo'] != NULL AND $td['vu'] == 0) {
                                        $alerte++;
                                    }
                                }
                                $req_answer = $bddConnection->prepare('SELECT vu
                                    FROM cmw_forum_like INNER JOIN cmw_forum_answer WHERE id_answer = cmw_forum_answer.id AND cmw_forum_like.pseudo !=: pseudo AND cmw_forum_answer.pseudo =: pseudo ');
                                    $req_answer->execute(array(
                                        'pseudo' => $_Joueur_['pseudo'],
                                    ));
                                    while ($answer_liked = $req_answer->fetch()) {
                                        if ($answer_liked['vu'] == 0) {
                                            $alerte++;
                                        }
                                    }
                                    if ($_PGrades_['PermsPanel']['access'] == "on"
                                        OR $_Joueur_['rang'] == 1)
                                        echo '<a href="admin.php" class="dropdown-item text-success"><i class="fas fa-tachometer-alt"></i> Administration</a>';
                                    if ($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1) {
                                        $req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
                                        $signalement = $req_report->rowCount();
                                        echo '<a href="?page=signalement" class="dropdown-item text-warning"><i class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning" id="signalement">'.$signalement.
                                        '</span></a>';
                                    }
                                      								?>
                        <a class="dropdown-item text-info" href="?page=alert">
                                <i class="fa fa-envelope"></i> Alertes 
                                <span class="badge badge-pill badge-info" id="alerts"><?php echo $alerte; ?></span>
                        </a>
                        <a class="dropdown-item text-white" href="?page=token"><i class="ion-cash"></i> Jetons 
                            <?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens'] . ' '; ?><i
                                class="fas fa-gem"></i></a>
                        <a class="dropdown-item" href="?page=panier" style="color: purple !important;"><i
                                class="fa fa-shopping-basket"></i> Panier 
                            <?php echo $_Panier_->compterArticle().($_Panier_->compterArticle()>1 ? ' articles' : ' article') ?></a>
                        <div class="card-footer bg-primary text-center">
                            <a class="dropdown-item text-danger" href="?action=deco"><i class="fas fa-sign-out-alt"></i>
                                Se déconnecter</a>
                        </div>
                    </div></a>
                    <?php } else { ?>
                    <div class="card-body bg-primary text-white">
                        <div class="row">
                            <div class="col-md-12">
                            <a class="btn btn-primary w-100 btn-block text-center" href="#" data-toggle="modal"
                                data-target="#InscriptionSlide">Inscription</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary w-100 btn-block text-center" href="#" data-toggle="modal"
                                data-target="#ConnectionSlide">Connexion</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="card mb-4 bg-primary border-1 infos rounded">
                    <div class="card-header bg-primary text-left text-white">
                        <i class="fab fa-discord"></i> Discord
                    </div>
                    <div class="card-body bg-primary">

                        <button class="btn btn-sm w-100 text-center btn-primary" style="background-color: rgba(20,20,20,0.85);border-radius: 3px">Rejoindre</button>
                            <div class="page-wrapper" style="max-height: 400px;overflow-y: scroll">
                                <p class="discord-channel">En ligne (Chargement ...)</p>
                                <ul class="discord-userlist">
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
                
                <div class="card mb-4 bg-primary border-1 infos rounded">
                    <div class="card-header bg-primary text-left text-white">
                        <i class="fas fa-sitemap"></i> Statistiques
                    </div>
                    <div class="card-body bg-primary text-center text-white">
                        <p class="float-left" style="font-size: 10px;">Membres inscrit</p>
                        <?php
                        $req = $bddConnection->query('SELECT COUNT(id) AS count FROM cmw_users');
                        $fetch = $req->fetch();
                        ?>
                        <p class="float-right" style="font-size: 10px;"><?php echo $fetch['count']; ?></p>
                        <br /><br />
                        <p class="float-left" style="font-size: 10px;">Visites</p>
                        <?php
                        $req = $bddConnection->query('SELECT COUNT(id) AS visits FROM cmw_visits');
                        $fetch = $req->fetch();
                        ?>
                        <p class="float-right" style="font-size: 10px;"><?php echo $fetch['visits']; ?></p>
                    </div>
                </div>

                <div class="card mb-4 bg-primary border-1 infos rounded">
                    <div class="card-header bg-primary text-left text-white">
                        <i class="fas fa-globe"></i> Nos réseaux sociaux
                    </div>
                    <div class="card-body bg-primary text-center text-white">
                        <?php
                        if(!empty($_Theme_['Pied']['facebook']) AND $_Theme_['Pied']['facebook'] != "#"){
                            echo '
                            <a class="dropdown-item text-fb" href="'. $_Theme_['Pied']['facebook'].'" target="_blank">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            ';
                        }
                        if(!empty($_Theme_['Pied']['twitter']) AND $_Theme_['Pied']['twitter'] != "#"){
                            echo '
                            <a class="dropdown-item text-twitter" href="'. $_Theme_['Pied']['twitter'].'" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            ';
                        }
                        if(!empty($_Theme_['Pied']['discord']) AND $_Theme_['Pied']['discord'] != "#"){
                            echo '
                            <a class="dropdown-item text-discord" href="'. $_Theme_['Pied']['discord'].'" target="_blank">
                                <i class="fab fa-discord"></i> Discord
                            </a>
                            ';
                        }
                        if(!empty($_Theme_['Pied']['youtube']) AND $_Theme_['Pied']['youtube'] != "#"){
                            echo '
                            <a class="dropdown-item text-youtube" href="'. $_Theme_['Pied']['youtube'].'" target="_blank">
                                <i class="fab fa-youtube"></i> YouTube
                            </a>
                            ';
                        }
                        ?>
                    </div>
                </div>

                <div class="d-none d-md-flex minecraft">
 
                </div>

            </div>

        </div>