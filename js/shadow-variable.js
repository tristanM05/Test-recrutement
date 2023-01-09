const articleList = []; // In a real app this list would be full of articles.
var kudos = 5;

function calculateTotalKudos(articles) {
  var kudos = 0;
  
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);

// - La variable articleList est définie comme un tableau vide, mais dans une application réelle elle serait pleine d'articles.

// - La variable kudos est définie à 5 et est utilisée pour afficher le nombre maximal de kudos qui peuvent être donnés à un article.

// - La fonction calculateTotalKudos prend en argument un tableau d'articles et calcule le nombre total de kudos donnés à travers tous les articles en parcourant le tableau 
//   avec une boucle for et en ajoutant la propriété kudos de chaque article à la variable $kudos. La fonction retourne le nombre total de kudos.

// - Ensuite on affiche le nombres maximal de kudos que l'on peut donner à un article et le nombre total de kudos déjà donnés à travers tous les articles.

// Piste d'optimisation:

// 1. Utiliser une variable pour stocker le résultat du calcul plutôt que d'appeler la fonction calculateTotalKudos à chaque itération de la boucle.