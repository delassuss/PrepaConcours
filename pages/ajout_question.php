<?php
	
	$MessageErreur = "";
	$MessageValider = "";
	
	
	    // Enregistrement des questions et des réponses
		if (isset($_POST['Enregistrer']))
		{
			// Inc
			include('../Formulaires/ParametresBase.php');
			// On vérifie si au moins une des réponses est bonne
			if (!isset($_POST['BonneRep1']) && !isset($_POST['BonneRep2']) && !isset($_POST['BonneRep3']) && !isset($_POST['BonneRep4']) && !isset($_POST['BonneRep5']))
			{
				$MessageErreur = "Il n'y a pas de réponse insérée ou aucune n'est sélectionnée comme bonne";
			}
			else
			{
				// On se connecte a la base de données
				$bdd = new PDO("mysql:host=$Serveur;dbname=$Base","$User","$MDPUser");
				
				// On ajoute les données de la table question
				
				$Type = $_POST['ListeType'];
				$IDSousCategorie = $_POST['ListeSousCategorie'];
				$req = $bdd->prepare ("INSERT INTO question (Type, IDSousCategorie) VALUES (:ListeType, :ListeSousCategorie)");
				$req->bindParam('ListeType',$Type);
				$req->bindParam('ListeSousCategorie',$IDSousCategorie);
				$req->execute();
                
				// On enregistre l'ID de la question qui vient d'être ajoutée
				$DerniereQuestion = $bdd->lastInsertId();
				
				// On détermine le type de la question pour enregistrer dans les table correspondante
				if($_POST['ListeType'] == '3')
				{
					$Libelle = $_POST['Question'];
					$req = $bdd->prepare ("INSERT INTO texte (IDQuestion, Libelle) VALUES (:DerniereQuestion, :Question)");
					$req->bindParam('Question',$Libelle);
					$req->bindParam('DerniereQuestion', $DerniereQuestion);
					$req->execute();
					$Libelle = $_POST['ImageQuestion'];
					$req = $bdd->prepare ("INSERT INTO image (IDQuestion, Libelle) VALUES (:DerniereQuestion, :ImageQuestion)");
					$req->bindParam('ImageQuestion',$Libelle);
					$req->bindParam('DerniereQuestion', $DerniereQuestion);
					$req->execute();
				}
				else if ($_POST['ListeType'] == '1')
				{
					$Libelle = $_POST['Question'];
					$req = $bdd->prepare ("INSERT INTO texte (IDQuestion, Libelle) VALUES (:DerniereQuestion, :Question)");
					$req->bindParam('Question',$Libelle);
					$req->bindParam('DerniereQuestion', $DerniereQuestion);
					$req->execute();
				}
				else
				{
					$Libelle = $_POST['ImageQuestion'];
					$req = $bdd->prepare ("INSERT INTO image (IDQuestion, Libelle) VALUES (:DerniereQuestion, :ImageQuestion)");
					$req->bindParam('ImageQuestion',$Libelle);
					$req->bindParam('DerniereQuestion', $DerniereQuestion);
					$req->execute();
				}
				
				// Maintenant, on ajoute les réponses 1
				$Texte = $_POST['Q1'];
				$Image = $_POST['Image1'];	
				
				if(isset($_POST['BonneRep1']))
				{
					if ($_POST['BonneRep1'] == '1')
					{
						$BonneReponse=true;
					}
					else
					{
						$BonneReponse=false;
					}
				}
				else
				{
					$BonneReponse=false;
				}
				$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
				
				$req->bindParam('DerniereQuestion', $DerniereQuestion);
				$req->bindParam('Texte',$Texte);
				$req->bindParam('Image',$Image);
				$req->bindParam('BonneReponse', $BonneReponse);
				$req->execute();
				
				// Maintenant, on ajoute les réponses 2
				if (isset($_POST['Q2']) && (isset($_POST['Image2'])))
				{
					$Texte = $_POST['Q2'];
					$Image = $_POST['Image2'];
					if(isset($_POST['BonneRep2']))
					{
						if ($_POST['BonneRep2'] == '1')
						{
							$BonneReponse=true;
						}
						else
						{
							$BonneReponse=false;
						}
					}
					else
					{
						$BonneReponse=false;
					}
					$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
					$req->bindParam('DerniereQuestion', $DerniereQuestion);
					$req->bindParam('Texte',$Texte);
					$req->bindParam('Image',$Image);
					$req->bindParam('BonneReponse', $BonneReponse);
					$req->execute();
					
					// Maintenant, on ajoute les réponses 3
					if (isset($_POST['Q3']) && (isset($_POST['Image3'])))
					{
						$Texte = $_POST['Q3'];
						$mage = $_POST['Image3'];
						if(isset($_POST['BonneRep3']))
						{
							if ($_POST['BonneRep3'] == '1')
							{
								$BonneReponse=true;
							}
							else
							{
								$BonneReponse=false;
							}
						}
						else
						{
							$BonneReponse=false;
						}
						$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
						$req->bindParam('DerniereQuestion', $DerniereQuestion);
						$req->bindParam('Texte',$Texte);
						$req->bindParam('Image',$Image);
						$req->bindParam('BonneReponse', $BonneReponse);
						$req->execute();
						
						// Maintenant, on ajoute les réponses 4
						if (isset($_POST['Q4']) && (isset($_POST['Image4'])))
						{
							$Texte =  $_POST['Q4'];
							$Image = $_POST['Image4'];
							if(isset($_POST['BonneRep4']))
							{
								if ($_POST['BonneRep4'] == '1')
								{
									$BonneReponse=true;
								}
								else
								{
									$BonneReponse=false;
								}
							}
							else
							{
								$BonneReponse=false;
							}
							$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
							$req->bindParam('DerniereQuestion', $DerniereQuestion);
							$req->bindParam('Texte',$Texte);
							$req->bindParam('Image',$Image);
							$req->bindParam('BonneReponse', $BonneReponse);
							$req->execute();
							
							// Maintenant, on ajoute les réponses 5
							if (isset($_POST['Q5']) && (isset($_POST['Image5'])))
							{
								$Texte =  $_POST['Q5'];
								$Image = $_POST['Image5'];
								if(isset($_POST['BonneRep5']))
								{
									if ($_POST['BonneRep5'] == '1')
									{
										$BonneReponse=true;
									}
									else
									{
										$BonneReponse=false;
									}
								}
								else
								{
									$BonneReponse=false;
								}
								$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
								$req->bindParam('DerniereQuestion', $DerniereQuestion);
								$req->bindParam('Texte',$Texte);
								$req->bindParam('Image',$Image);
								$req->bindParam('BonneReponse', $BonneReponse);
								$req->execute();
							    
								// Maintenant, on ajoute les réponses 6
								if (isset($_POST['Q6']) && (isset($_POST['Image6'])))
								{
									$Texte =  $_POST['Q6'];
									$Image = $_POST['Image6'];
									if(isset($_POST['BonneRep6']))
									{
										if ($_POST['BonneRep6'] == '1')
										{
											$BonneReponse=true;
										}
										else
										{
											$BonneReponse=false;
										}
									}
									else
									{
										$BonneReponse=false;
									}
									$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
									$req->bindParam('DerniereQuestion', $DerniereQuestion);
									$req->bindParam('Texte',$Texte);
									$req->bindParam('Image',$Image);
									$req->bindParam('BonneReponse', $BonneReponse);
									$req->execute();
								
									// Maintenant, on ajoute les réponses 7
									if (isset($_POST['Q7']) && (isset($_POST['Image7'])))
									{
										$Texte =  $_POST['Q7'];
										$Image = $_POST['Image7'];
										if(isset($_POST['BonneRep7']))
										{
											if ($_POST['BonneRep7'] == '1')
											{
												$BonneReponse=true;
											}
											else
											{
												$BonneReponse=false;
											}
										}
										else
										{
											$BonneReponse=false;
										}
										$req = $bdd->prepare ("INSERT INTO reponses (IDQuestion, Texte, Image, BonneReponse) VALUES (:DerniereQuestion, :Texte, :Image, :BonneReponse)");
										$req->bindParam('DerniereQuestion', $DerniereQuestion);
										$req->bindParam('Texte',$Texte);
										$req->bindParam('Image',$Image);
										$req->bindParam('BonneReponse', $BonneReponse);
										$req->execute();
									}									
								}								
							}							
						}						
					}					
				}
				$MessageValider = "La question &agrave; bien &eacute;t&eacute; ajout&eacute;e !";
			}	
		}
		
	echo'
	<head>
		<title>Ajouter une question - Prepa concours IFSI</title>
		<link href="Styles/Style_Gestion.css" media="screen" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
			var NumQuestion=2;
			$(\'[name="ajouter choix"]\').live("click", function()
			{ 
				if (NumQuestion<=7)
				{
					$(this).before (+NumQuestion+" : <input type=\"text\" id=\"Q"+NumQuestion+"\" name=\"Q"+NumQuestion+"\" maxlength=\"100\" size=\"30\" value=\"\" title=\"Entrez votre choix de r&eacute;ponse\" /> <input type=\"file\" name=\"Image"+NumQuestion+"\"><input type=\"checkbox\" name=\"BonneRep"+NumQuestion+"\" id=\"BonneRep"+NumQuestion+"\" value=\"1\" /> <label for=\"BonneRep"+NumQuestion+"\">Bonne r&eacute;ponse</label> </br></br>");
					NumQuestion=NumQuestion+1;
				}
			});
		</script>
	<head>
	
	<body>
		<div class="Intro">
			Veuillez remplir le formulaire pour cr&eacute;er une question et un ou plusieurs choix de r&eacute;ponse(s)</br>Les choix de réponses sont au nombre maximum de 7
			</br>
			</br>';
			echo' <div class="MessageErreur">';  echo $MessageErreur;  echo'</div>
			<div class="MessageValider">';  echo $MessageValider;  echo '</div>
			</br>
		</div>
		<div class="Creation">
			<form method="POST" href ="IndexProf.php#page3.php" action="pages/ajout_question.php">
				<div class="Question">
					<div class="enonce">Question</div>
					</br>
					S&eacute;lectionnez la sous cat&eacute;gorie &agrave; laquel appartient la question :
					<select name="ListeSousCategorie">';
					
						
							$connect = mysql_connect ('localhost', 'root', 'root');
							mysql_select_db ('prepaconcours', $connect);
						
							$sql='SELECT ID, Libelle FROM sous_categorie';
							$list = mysql_query($sql);
							while ($data = mysql_fetch_array($list))
							{
								echo'<option value='.$data['ID'].'>'.$data['Libelle'].'</option>';
							}
						
				echo'	</select>
					
					 </br>
					</br>
					S&eacute;lectionnez le type de question :
					<select name="ListeType">';
					
						
							$connect = mysql_connect ('localhost', 'root', 'root');
							mysql_select_db ('prepaconcours', $connect);
						
							$sql='SELECT ID, Libelle FROM type';
							$list = mysql_query($sql);
							while ($data = mysql_fetch_array($list))
							{
								echo'<option value='.$data['ID'].'>'.$data['Libelle'].'</option>';
							}
						
					echo '</select>
					</br>
					</br>
					<textarea name="Question" id="Question" cols="110" rows="5"></textarea>
					</br>
					</br>
					Image :
					<input type="file" id="ImageQuestion" name="ImageQuestion">
					</br>
					</br>
					<div class="Reponse">
						<div class="enonce">Choix de r&eacute;ponse(s)</div>
						</br>
						1 : 
						<input type="text" id="Q1" name="Q1" maxlength="100" size="30" value="" title="Entrez votre choix de r&eacute;ponse" /> <input type="file" name="Image1">
						<input type="checkbox" name="BonneRep1" id="BonneRep1" value="1" /><label for="BonneRep1">Bonne r&eacute;ponse</label>
						</br>
						</br>
						
						<input type="button" name="ajouter choix" value="Ajouter un choix de r&eacute;ponse" />
						<input type="reset" name="Reset" value="R&eacute;initialiser le formulaire" />
						</br>
						</br>
						
						<script type="text/javascript">
							$("#msg").ajaxError(function(request, settings)
							{
								$(this).append("Erreur de retour.");
							});
						</script>
						<script type="text/javascript">
								$("#msg").ajaxSuccess(function(request, settings)
								{
									$(this).append("Requête réussie.");
								});
						</script>
							
						<input type="submit" name="Enregistrer" value="Enregistrer la nouvelle question" />
					</div>
				</div>
			</form>
		</div>
	</body>';
?>