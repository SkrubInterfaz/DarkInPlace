<section id="banlist" class="content">
    <div class="container rounded box-of-acc h-100" style="background-color: #1a1a1a !important;">
        <div class="pre-page">
            <h2>
                Boutique
            </h2>
        </div>
        <div class="row inside">

            <div class="col-md-12">
                <div class="card bg-primary border-0">
                    <div class="well text-white">
                        <h5 class="text-left text-white">Comment ça marche?</h5>
                            <p>
                                La boutique permet d'acheter du contenu In-Game depuis le site grâce à de l'argent réel, cela sert à payer l'hébergement du serveur.<br/>
                                La monnaie virtuelle utilisée sur la boutique est le "Jeton", vous pouvez obtenir des jetons en échange de dons <a href="?&page=token" class="activenav-item link">sur cette page</a>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">

                <?php 
                if(isset($_Joueur_)){ ?>
                                <div class="card bg-primary border-1">
                    <div class="card-header">
                        <h5 class="card-title">
                            Bienvenue <?=$_Joueur_['pseudo'];?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div id="tokens" class="boutique_info">
                                    <div class="card bg-primary">
                                        <div class="card-header">
                                            <h5 class="card-title"> Jetons</h5>
                                        </div>
                                        <div class="card-body link">
                                            <p>
                                                <?php echo $_Joueur_['pseudo']; ?>, vous avez actuellement :
                                            </p>
                                            <div style="text-align:center;">
                                                <?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?>
                                                <small><i class="fas fa-gem"></i></small>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="?page=tokens" class="btn btn-block w-100 btn-primary">
                                                        Acheter plus jetons
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="historique" class="boutique_info">
                                    <div class="card bg-primary">
                                        <div class="card-header">
                                            <h5 class="card-title"> Historique d'achat</h5>
                                        </div>
                                        <div class="card-body link">
                                            <p>
                                                <?php echo $_Joueur_['pseudo']; ?>, voici l'historique de vos achats :
                                            </p>
                                            <div style="text-align:center;">

                                                <style>
                                                    table {
                                                        border-collapse: collapse;
                                                    }

                                                    td {
                                                        border: 1px solid black;
                                                    }
                                                </style>
                                                <table class="table">
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Date</th>
                                                        <th><i class="fas fa-gem"></i></th>
                                                    </tr>
                                                    <?php
                                $historiqueReq = $bddConnection->prepare('SELECT cmw_boutique_stats.id AS id, cmw_boutique_stats.prix AS prixTotal, cmw_boutique_offres.prix AS prix, cmw_boutique_offres.nom AS titre, cmw_boutique_stats.date_achat AS date_achat FROM cmw_boutique_stats INNER JOIN cmw_boutique_offres ON offre_id = cmw_boutique_offres.id WHERE pseudo = :pseudo ORDER BY date_achat DESC LIMIT 0, 20');
                                $historiqueReq->execute(array(
                                    'pseudo' => $_Joueur_['pseudo'],
                                ));
                                $boutiqueListeData = $historiqueReq->fetchAll(PDO::FETCH_ASSOC);
                                if(!$boutiqueListeData)
                                {
                                    echo '<tr><td colspan="6"><center>Vous n\'avez aucun historique d\'achat</center></td></tr>';
                                }
                                else
                                    {
    
                                        foreach($boutiqueListeData as $donnees)
                                        {
                                        ?>
                                                    <tr class="text-muted">
                                                        <td class="w-60"><?=$donnees['titre'];?></td>
                                                        <td class="w-25">
                                                            <a class="text-muted" 
                                                            class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Achat le:<?=date('d-m-Y', strtotime($donnees['date_achat']));?>">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td class="w-15"><?=$donnees['prixTotal'];?></td>
                                                    </tr>
                                                    <?php
                                        }
                                    }
                                    ?>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="?page=panier" class="btn btn-block w-100 btn-primary">
                                    Aller au panier
                                    (<?php echo $_Panier_->compterArticle().($_Panier_->compterArticle()>1 ? ' articles' : ' article') ?>)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

               <div class="card bg-primary border-1" class="boutique_info" style="padding-top: 15px">
                    <div class="card-header">
                        <h5 class="card-title">
                            Catégorie
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php for($j = 0; $j < count($categories); $j++){
                                $categories[$j]['titre'] = str_replace(' ', '&#32;', $categories[$j]['titre']); ?>
                            <div class="col-md-12">
                                <a class="btn btn-primary border-1 w-100 btn-block text-center" href="#cat_<?php echo $categories[$j]['id']; ?>" data-toggle="collapse"
                                    data-target="#cat_<?php echo $categories[$j]['id']; ?>"> 
                                    <?php echo $categories[$j]['titre']; ?>
                                </a>
                                <hr/>
                            </div>
                        <?php } ?>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-md-8 col-sm-12">
            
                <div class="row" id="boutique_cat">
                            
                    <h4 class="card-title" style="padding-left: 5px">
                        Articles de la boutique:
                    </h4>

                    <?php for($j = 0; $j < count($categories); $j++){
                        $categories[$j]['titre'] = str_replace(' ', '&#32;', $categories[$j]['titre']); ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <div class="box-of-cat">
                            <a class="btn btn-primary active w-100 btn-block text-center" href="#" data-toggle="collapse"
                                data-target="#cat_<?php echo $categories[$j]['id']; ?>"> 
                                    <?php echo $categories[$j]['titre']; ?>
                            </a>
                            <div class="collapse <?php if($categories[$j]['id'] == 1){ echo 'show';}?>" id="cat_<?php echo $categories[$j]['id']; ?>">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="row">
                                    <?php if(!empty($categories[$j]['message'])){ ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-dismissable alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <div>
                                                    <p class="text-center">   
                                                        <?php echo espacement($categories[$j]['message']); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } 
									foreach($categories as $key => $value)
									{
										$categories[$key]['offres'] == 0;
									}
									for($i = 1; $i <= count($offresTableau); $i++)
									{
										if($offresTableau[$i]['categorie'] == $categories[$j]['id'])
										{
											echo '
											<div class="col-md-6 card bg-primary">
												<div class="card-body">
													<h5 class="card-title text-center text-white">'. (($offresTableau[$i]['nbre_vente'] == 0) ? "<s>".$offresTableau[$i]['nom']."</s>" : $offresTableau[$i]['nom']);
													echo'</h5>
														<div class="offre-description text-center card-text text-white ">' .espacement($offresTableau[$i]['description']). '</div>
    													</div>
													';
														if(isset($_Joueur_)) {
                                                            echo '<a href="?page=boutique&offre=' .$offresTableau[$i]['id']. '" class="btn btn-primary sh-info btn-block" title="Voir la fiche produit"><i class="fa fa-eye"></i></a>';
?>

                                            								<?php                                                          if($offresTableau[$i]['nbre_vente'] == 0){
                                                                echo '';
                                                                //<a href="#" class="btn btn-info btn-block btn-lg">En rupture de stock</a>
															} else {
																echo '<a href="?action=addOffrePanier&offre='. $offresTableau[$i]['id']. '&quantite=1" class="btn btn-primary sh-danger btn-block" title="Ajouter directement au panier une unité"><i class="fa fa-cart-arrow-down"></i></a>';
															}
														} else {
															echo'<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-primary sh-danger btn-block" ><span class="fas fa-user"></span> Se connecter</a>';
														}
														echo '<button class="btn btn-primary sh-success btn-block">Prix : ' . ($offresTableau[$i]['prix'] == '0' ? 'gratuit' : $offresTableau[$i]['prix'].'<i class="'. $_Theme_['All']['Tokens']['icon'] .'">') . ' </i></button>';
                                            if($offresTableau[$i]['nbre_vente'] > -1) {
                                                echo "<span style='font-size: 9pt;'>";
                                                if($offresTableau[$i]['nbre_vente'] == 0) {
                                                    echo "<button class='btn btn-primary sh-danger btn-block' style='margin-top: 5px;'>stock épuisé</button>";
                                                } else {
                                                    echo '<small class="text-muted" style="margin-top: 5px;text-align:center">Il en reste: '. $offresTableau[$i]['nbre_vente'].'</small>';
                                                }
                                                echo "</span>";
                                            }
                                            echo'</div>';
											$categories[$j]['offres']++;
										}
									}
								?>
                                <?php if($categories[$j]['offres'] == 0) {?>
                                    <div class="col-md-12">
                                        <div class="alert alert-dismissible alert-danger">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <center><strong>Oh zut !</strong> <?=$categories[$j]['titre']?>
                                                est encore vide, ré-essayez plus tard !.</center>
                                        </div>
                                    </div>
                        		<?php }?>
                                            </div>                   
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    <?php } ?>
            
                </div>  

                <div class="d-none d-md-flex minecraft">
 
                </div>
    
            </div>
                                    

    </div>