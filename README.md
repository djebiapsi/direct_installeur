# direct_installeur
Formulaire de contact pour une société d'instalateur de pompe à challeur

1. Création de la base de données.

Tu peux retrouver le script de la base de données dans le dossier "bdd".
Voici les étapes pour importer une base de données sur phpMyAdmin :

Ouvre phpMyAdmin en te connectant à ton hôte web.

Clique sur l'onglet "Import" dans le menu de navigation de phpMyAdmin.

Clique sur le bouton "Parcourir" pour sélectionner le fichier de base de données que tu souhaites importer. Assure-toi que le fichier est au format SQL.

Sélectionne la méthode d'import de ton choix. Il existe plusieurs options, comme "Complete inserts", "Extended inserts" et "Transactions".

Sélectionne la base de données dans laquelle tu souhaites importer les données. Si tu n'as pas encore créé de base de données, tu peux en créer une en saisissant un nom dans le champ "Créer une base de données".

Clique sur le bouton "Exécuter" pour importer le fichier de base de données dans ta base de données sélectionnée.

Tu peux vérifier si l'import a réussi en parcourant les tables de la base de données sélectionnée dans phpMyAdmin.

-----------------------------------

2. Traitement du formulaire.

Le formulaire est séparé en deux : une partie sur la page et une autre dans un modal (sorte de fenêtre qui s'ouvre quand tu cliques sur le bouton "simuler").
Cela ne change rien à la manière de le traiter à part que ! c'est le bouton "envoyer" qui doit valider le formulaire !
Pour faire ça tu peux utiliser une balise de ce type :
<button type="submit" form="form1" value="Submit">Envoyer</button>
avec juste à form = l'id de la balise du formulaire
