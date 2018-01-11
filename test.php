<?php include('/includes/head.inc.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil</title>
  </head>
  <?php include('/includes/menu.inc.php'); ?>

    <div class="container-fluid">
    <h1>Présentation du site</h1>
    <br />
    <p>
	<?php
	$chaine = "SI (système d'information): Le système d'information est un ensemble organisé de ressources qui permet de collecter, stocker, traiter et distribuer de l'information, en général grâce à un ordinateur. Ensemble d'éléments ( personnel, matériel, logiciel...) permettant d'acquérir, traiter, mémoriser et communiquer des informations. 
Définition n2 : Assemblage de logiciels qui produisent des services pour exécuter ou assister des processus.
TMA (tierce maintenance applicative) : maintenance de logiciel de la part d'un acteur extérieur à l'entreprise.
back-office : logiciel permettant le bon fonctionnement de l'entreprise en interne (ex : intranet, logiciel de comptabilité...).
front-office : logiciel ou site internet accessible au client ou utilisateur final.
DSI (directeur de système d'information) : responsable de l'ensemble des composants matériels et logiciels du système d'information.
missions du DSI: définir et mettre en œuvre la politique informatique en accord avec la stratégie générale de l'entreprise et ses objectifs de performance. Il permet de faire évoluer le SI et d'assurer son fonctionnement au quotidien
Intégration : Le terme intégration désigne la conception et la réalisation d'un SI intégré par la mise en relation (interfaçage) de différents logiciels ou matériels existants. L’intégration d’un progiciel ne se limite pas à l’installation d’un ensemble de programmes et à leurs tests, mais doit comprendre les étapes permettant de fondre le progiciel dans le S.I., autant du coté applicatif que du coté des utilisateurs.
GCL(gestion de configuration logiciel) ou SCM(Software Configuration Management) : reproduire un résultat déjà obtenu en essayant de l'améliorer.
(Software Configuration Management) ou GCL(Gestion de Configuration Logiciel : ensemble de logiciels permettant de gérer de façon optimale la totalité des flux d'information, des flux physiques et des flux financiers entre les différents acteurs qu'implique la fabrication d'un produit ou l'offre d'un service. Cela permet de prendre en charge la planification et le contrôle des activités avant et après vente dans une organisation.

Chaîne logistique : réseau d'organisations et de processus qui relie les fournisseurs, les usines, les centres de distribution, les points de vente et les clients

Logiciels de SCM : logiciels de gestion de la chaîne logistique. Ensemble de logiciels permettant de gérer de façon optimale la totalité des flux d'information, des flux physiques et des flux financiers entre les différents acteurs qu'implique la fabrication d'un produit ou l'offre d'un service. On distingue les systèmes de planification et les systèmes d'exécution. Ces systèmes concernent les fonctions ventes, production et logistique tant amont qu'aval (stockage, transport).
GCL(gestion de chaîne logistique) ou SCM(Suply Chain Managment) : outils et méthodes visant à améliorer et automatiser l’approvisionnement en réduisant les stocks et les délais de livraison.
Chaîne logistique : réseau d’organisations et de processus qui relie les fournisseurs, les usines, les centres de distribution, les points de vente et les clients.
TI (Technologie de l'Information) : Ensemble des matériels, logiciels et services utilisée pour la collecte, le traitement et la transmission de l’information. 
Économies d'échelle : la centralisation de ressources(matérielles ou techniques) permet de produire autant avec moins de ressources ou produire plus avec autant de ressources. Désigne les situations dans lesquelles une augmentation de la production d'une entreprise engendre une diminution du coût unitaire moyen d'un produit ou d'un service.
Système de planification (APS) : C'est un des composant de la gestion de la chaîne logistique. Il permet la planification de la demande, de l’ordonnancement et de la fabrication, de la distribution, du transport … 
Système d'exécution (SCE) : C'est un des composant de la gestion de la chaîne logistique. Il permet de gérer le réapprovisionnement, la production, l'organisation de l’entrepôt, la préparation des commandes, l'élaboration des tournées de livraison … 
Stratégie :  ensemble des décisions prises par une entreprise en fonction de l'environnement et qui l'engage à long terme.  Ces décisions ont pour objectif l'obtention d'un avantage concurrentiel
Avantage concurrentiel : Ensemble de facteur que l'entreprise cherche à valoriser pour dépasser les concurrents (ex : coût,qualité...)
Chaine de valeur : Ensemble des activités qu'une entreprise met en œuvre pour servir ses clients.
Forces concurrentielles : Il y en a 5 qui sont : Produit substitut(1) - Pouvoir de négociation des clients(2) - Pouvoir de négociation des fournisseur(3) - Menace des nouveaux entrants(4) - Concurrence directe(5) .
(1) :Lutter contre des produits substituts (ex: améliorer le rapport performance/prix ...).
(2) : (ex: augmenter coût de changements pour le client...)
(3) : (ex: élargir la base de sélection des fournisseurs..)
(4) :Lutter contre la menace des nouveaux entrants (ex: baisse des prix...)
(5) :Faire face à la concurrence actuelle (ex : réduire les coût ou différencier produits et services...)
Alignement stratégique : Démarche visant à intégrer l'évolution des TI dans la démarche de réflexion stratégique et visant à faire coïncider la stratégie SI sur la ou les stratégies métiers de l'entreprise pour renforcer la valeurs d'usages du système d’information.
Cartographe du SI (vues et enjeux, norme BPMN) : notation graphique standardisée pour modéliser des procédures d’entreprise, en vue de leur exécution par un moteur de workflow.
Le principal objectif du standard BPMN (Business Process Model and Notation) est de fournir un langage de modélisation commun, permettant de combler le vide entre la conception des processus métier (modèle métier) et leur implémentation technologique (modèle technique).
Les 4 niveaux d'analyse de la cartographie :
1--> La vue métier: Présentation cartographique des processus de l'organisation.
2--> La vue fonctionnelle : Description des fonctionnalités offertes par la SI pour supporter les processus métiers.
3--> La vue applicative : Description de l'ensemble des éléments du SI implémentant les services sous forme d'éléments logiciel.
4--> La vue technique : Description de l'infrastructure de fonctionnement des éléments logiciels du système informatique.
Externaliser : confier la gestion d'une activité auparavant internalisée, à un prestataire extérieur qui devient alors un partenaire. Quand il s'agit de l'externalisation du système d'information, partielle ou totale, il est alors question d'infogérance partielle ou globale, ou outsourcing en anglais.
Infogérance : En d'autres termes, c'est l'externalisation de tout ou partie de la gestion et de l'exploitation du SI à un prestataire informatique tiers (SSII). Cette mission doit s'effectuer dans la durée et non de manière ponctuelle.
Gains d'expérience : le gain d'expérience est le gain procuré par le temps passé à réaliser la même tache. Plus la tâche est réalisée, plus la personne progresse. Le gain d'expérience permet de gagner en rentabilité.
TMA : Tierce Maintenance Applicative est la maintenance appliquée à un logiciel ( « applicative » ) et assurée par un prestataire externe.
IaaS : Infrastructure as a Service.  La ressource, le matériel informatique est virtualisée. Le service peut inclure des offres telles que l'espace serveur, des connections réseau, la bande passante, les adresses IP et les load balancers. 
SaaS : Software as a Service. Se réfère à tout service Cloud permettant aux clients d'avoir accès à des applications logicielles sur Internet. Ces applications sont hébergées dans le Cloud et peuvent être utilisées pour un large éventail de tâches, tant par les personnes privées que par les organisations. Google, Twitter, Facebook et Flickr sont tous des exemples de SaaS.
PaaS : Platform as a Service est une catégorie de services de Cloud computing qui fournit la plateforme et l'environnement informatique nécessaire aux développeurs pour mettre en place leurs différents services et applications sur Internet. Les services PaaS sont hébergés dans le Cloud et les utilisateurs y accèdent simplement, par leur navigateur web.
BPO : Business Process Outsourcing . Désigne la sous-traitance d'une tâche métier spécifique, par exemple la paye, à un fournisseur de services externe à l'entreprise.
SIRH : Système d'information de gestion des ressources humaines, couvre l'ensemble des processus de gestion d'une DRH, de la gestion des recrutements à celle des formations et des carrières.
ERP(Enterprise Resource Planning) ou PGI(Progiciel Gestion Intégrés) : Ensemble logiciel cohérent capable d'intégrer tous les processus qui relèvent des différentes fonctions de l'organisation (approvisionnement, production, commercialisation, finance, ressources humaines, qualité, etc.).
Le progiciel de gestion intégré s'appuie sur une structure modulaire paramétrable organisée autour d'une base de données unique. 
CRM(Customer Relationship Management) ou GRC(gestion de la relation client) : Application informatique qui prend en charge la planification et le contrôle des activités avant et après vente d'une organisation. Le CRM (customer relationship management) est un ensemble de systèmes permettant d'optimiser la relation qu'entretient la marque avec ses clients, afin de les fidéliser et d'augmenter le chiffre d'affaires de l'entreprise par client. Le CRM permet de coordonner un parcours client multicanal (point de vente, mobile, Internet) afin d'offrir une expérience client unifiée. Le CRM regroupe l'analyse des données clients et les actions marketing mises en place.
BI(Business Intelligence ou Informatique décisionnelle) DSS(Decision Support System) :  Englobe les solutions informatiques apportant une aide à la décision avec, en bout de chaîne, rapports et tableaux de bord de suivi à la fois analytiques et prospectifs.
Modélisation des processus : Ensemble d’activités corrélées ou interactives qui transforment des éléments d'entrée en élément de sortie.
Investissement (SI) : Réalisation ou achat ainsi que déploiement d'un nouvel outil logiciel pour les utilisateurs SI.
Investissement (financier) : C'est la dépense immédiate suivie d'un profit futur.
Il y a plusieurs flux d'investissement:
1--> C'est la dépense Initial (I) réglé en une ou plusieurs fois.
2--> C'est le Flux Net de Trésorerie (FNT ou CAsh-Flow). Ce sont les recettes et dépenses d'exploitation durant toute la durée de vie du matériel.
Capitalisation des intérêts : C'est le placement de la somme K (en euros) accompagné d'un taux d'intérêt i durant n année(s) :     
K.(1+i%)^n                                 
Valeur Actuelle : valeur actuelle des flux futurs espérés, qui est actualisée au taux de rentabilité exigé par les investisseurs. 
Valeur Actualisée Nette (VAN) : VAN= -(Io + (I1/1+i%) + (I2/(1+i%)²) + ...) + (FNT/(1+i%) + (FNT/(1+i%)²) + ... + (FNT/(1+i%)^n))
C'est la somme des FNT des différentes années - la somme des investissements sur les différentes années.
Si VAN > 0 alors l'investissement est dit Rentable et plus le VAN est grand plus l’investissent est rentable.
ROI (Retour sur Investissement) : rapport des gains générés par l’investissement sur les dépenses engagées.
Investissement dans les SI : réalisation (ou l’achat) et le déploiement d’un nouvel outil logiciel pour les utilisateurs du SI. Financièrement : c’est une dépense immédiate suivie d'un profit futur.
Industrialiser : identifier les moyens et les méthodes qui permettent de fournir un service de manière reproductible en
utilisant des outils maîtrisés et fiables et en répétant des gestes et actions éprouvés ( ≠ Artisanat).
";
	$chaine = preg_replace("#[^a-zA-Z ]#", "", $chaine);
	echo $chaine;
	?>
	</p>
    </div>
  </body>
</html>
