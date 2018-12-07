# Test ChooseMyCompany - dev back #

**Confidentiel - ne pas transmettre**


Pré-requis:
---
PHP + MySQL


Contexte:
---
choosemycompany.com est un site d'information sur les employeurs.
Grace aux enquêtes salariés que nous administrons, nous récoltons des notes par entreprises que nous pouvons mettre à la disposition des visiteurs.
Les visiteurs de notre site étant souvent en recherche d'emploi, nous avons souhaité leur proposer des offres directement sur le site choosemycompany.com.
Pour cela, notre partenaire - le site d'emploi Regionsjob.com - nous transmet ses offres d'emploi via un flux XML.
 
Le code de ce petit projet permet l'import de ces offres dans notre système en ligne de commande.
 
Un nouveau partenaire - le site Cadremploi.fr - nous propose également de rediffuser ses offres d'emploi.
(On peut supposer qu'il y aura probablement d'autres partenaires dans le futur…)


A réaliser en 1h :
---
- Mettez à jour le code (et le modèle de données si besoin) pour importer le nouveau flux cadremploi.xml (Le code de départ est très imparfait et conçu pour un seul partenaire. Faites le marcher pour le second partenaire, puis refactorez-le autant que vous voulez...)
- Si vous aviez plus de temps, quelles seraient les évolutions que vous proposeriez pour améliorer ce code (découpage, optimisations, sécurisation, gestion des erreurs...) ?